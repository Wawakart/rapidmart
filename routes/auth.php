<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HumanResource\Applicant\CreateApplicantController;
use App\Http\Controllers\HumanResource\Interview\AppointmentController;
use App\Http\Controllers\HumanResource\Applicant\PendingApplicantController;
use App\Http\Controllers\HumanResource\Applicant\RejectedApplicantController;
use App\Http\Controllers\HumanResource\ApplicantController;
use App\Http\Controllers\HumanResource\EmployeeController;
use App\Http\Controllers\HumanResource\Interview\InterviewController;
use App\Http\Controllers\Sales\SalesReportController;
use App\Http\Controllers\Sales\CheckInventoryController;
use App\Http\Controllers\Sales\PromoInformationController;


// * CREATE A MIDDLEWARE FOR YOUR OWN PART
// * THE ROLEMIDDLEWARE IS ALREADY CONFIGURED JUST ASSIGN THE POSITIONS OR ACCESS LEVEL OF YOUR AUTHORIZED ACCOUNTS
// * role:hr IS AN EXAMPLE FOR HUMAN RESOURCE MANAGEMENT PART WHERE THE AUTHORIZED ACCOUNT ONLY IS THE HR MANAGER AND THE RECRUITER

Route::middleware(['auth', 'verified'])->group( function() {
    Route::get('/', DashboardController::class)->name('home');
   
    Route::middleware(['role:hr'])->group(function (){
        Route::prefix('employees')->middleware(['auth'])->group(function () {
            Route::get('/', EmployeeController::class)->name('employee.index');
        });
      
        // ? APPLICANT ROUTES
        // ?
        Route::prefix('applicants')->middleware(['auth'])->group(function () {
            Route::get('/', ApplicantController::class)->name('applicant.index');

            // * PENDING APPLICANT ROUTE
            Route::get('/pending', [PendingApplicantController::class, 'index'])->name('applicant.pending.index');
            Route::put('/pending/reject/{applicant_id}', [RejectedApplicantController::class, 'store'])->name('applicant.reject');

            Route::get('/rejected', [RejectedApplicantController::class, 'index'])->name('applicant.rejected.index');
            // ! DELETE APPLICANT
            Route::delete('/rejected/delete/{applicant_id}', [RejectedApplicantController::class, 'destroy'])->name('applicant.destroy');
            // ! CLEAR ALL APPLICANTS ROW ROUTE
            Route::delete('/rejected/delete/all', [RejectedApplicantController::class, 'clear'])->name('applicant.destroy.all');
            // * CREATE APPLICANT ROUTE
            Route::get('/create', [CreateApplicantController::class, 'index'])->name('applicant.store');
            Route::post('/create', [CreateApplicantController::class, 'store'])->name('applicant.verify.store');

            // ? UPDATE APPLICANT ROUTE
            Route::get('/edit/{applicant_id}', [EditApplicantController::class, 'index'])->name('applicant.view.edit');
            Route::put('/edit/{applicant_id}', [EditApplicantController::class, 'edit'])->name('applicant.edit');

        });


    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::fallback(DashboardController::class);

      Route::middleware(['role:sales'])->group(function (){
          Route::prefix('sales')->group(function (){
              Route::get('/',[SalesReportController::class,'index'])->name('sales.salesreport.index');
              Route::get('/check-inventory',[CheckInventoryController::class,'index'])->name('sales.checkinventory.index');
              Route::get('/check-inventory/search',[CheckInventoryController::class,'search'])->name('sales.checkinventory.search');   
          });
      });
    });
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // ? TESTING EMAIL TEMPLATE
    Route::get('/testing/email', fn() => view('mail.appointment-applicant'));
    Route::fallback(DashboardController::class);
});
