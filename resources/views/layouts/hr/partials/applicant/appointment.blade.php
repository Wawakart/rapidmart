

@extends('layouts.dashboard')

@section('title', 'Appoint Applicant')

@section('content')
    <div class="w-full p-5 relative">
        <nav class="flex px-5 py-3 mb-4 text-gray-700 border border-gray-200 rounded-lg bg-gray-50">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{ route('home') }}" class="inline-flex items-center font-medium text-lg text-gray-700 hover:text-secondary transition-colors ease-in-out duration-200">
                        <svg class="w- h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                        </svg>
                        Dashboard
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <a href="{{ route('applicant.index') }}" class="ms-1 text-lg text-gray-700 hover:text-secondary transition-colors duration-200 ease-in-out font-medium">Hiring Management</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180  w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <a href="{{ route('applicant.index') }}" class="ms-1 text-lg text-gray-700 hover:text-secondary transition-colors duration-200 ease-in-out font-medium">Applicants</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180  w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <a href="{{ route('applicant.index') }}" class="ms-1 text-lg text-gray-700 hover:text-secondary transition-colors duration-200 ease-in-out font-medium">Pending Applicants</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                    <svg class="rtl:rotate-180  w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                        <span class="ms-1 text-lg font-medium text-secondary md:ms-2">Appointment</span>
                    </div>
                </li>
                
            </ol>
        </nav>
        
        <div class="relative w-full h-fit flex justify-center py-5">
            <form action="{{ route('interview.store') }}" method="post" class="w-full sm:w-[80vw] md:w-[50vw] py-4 px-6 h-fit space-y-5 bg-white rounded-xl fade-in-early" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="applicant_id" value="{{ $applicant->id }}">
                <div class="col-span-6"> 
                    <h3 class="text-xl font-sans text-gray-700">
                        Invite <strong>{{ $applicant->last_name }}, {{ $applicant->first_name }}</strong> for an interview
                    </h3>
                </div>
                    @error ($errors->any())
                    <div class="col-span-6">
                        @foreach($errors->all() as $error )

                            <p class="text-xs text-red-600 font-semibold">{{ $error }}</p>
                        @endforeach
                        
                    </div>
                @enderror
                <div class="relative w-full gap-3 grid grid-cols-6">
                    <div class="col-span-6">

                        <label for="interview_date" class="block">Interview Date</label>
                        <input datepicker datepicker-format="mm-dd-yyyy" type="text" required autocomplete="off" name="interview_date" id="interview_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-auto ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                    </div>
                </div>

                <div class="relative w-full gap-3 grid grid-cols-6">
                   
                    <div class="col-span-6">
                        
                        <label for="interview_time" class="block">Interview Time</label>
                        <input type="time" id="interview_time" name="interview_time" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-auto" value="00:00" required />                
                    </div>
                </div>
                <div class="col-span-6">
                    <label for="interviewer_id" class="block">Interviewer</label>
                    <select id="interviewer_id" name="interviewer_id" class="bg-gray-50 border focus:border-none outline-none border-gray-500 text-gray-700 rounded-lg focus:ring-1 focus:ring-secondary focus:border-secondary w-auto p-2">
                        <option selected disabled>Choose a interviewer</option>
                        @foreach ($interviewers as $interviewer)
                            <option value="{{ $interviewer->id }}">{{ $interviewer->last_name }}, {{ $interviewer->first_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="relative w-full gap-3 grid grid-cols-6">
                    <div class="col-span-6">
                        <label for="interview_note" class="block">Notes</label>
                        <textarea id="interview_note" name="interview_note" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-700 focus:border-none focus:ring-secondary focus:ring-1 outline-none" placeholder="Write your notes here..."></textarea>
                    </div>
                </div>
                <div class="w-full h-fit flex items-center justify-end gap-4">
                    <a href="{{ route('applicant.index' ) }}" class="rounded text-black hover:bg-gray-300 bg-gray-200 px-4 py-2 transition-colors duration-200 ease-in-out">Cancel</a>
                    <button type="submit" class="rounded bg-secondary px-4 py-2 text-white transition-colors duration-200 ease-in-out hover:bg-secondary/80">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection