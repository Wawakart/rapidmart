@extends('layouts.dashboard')
@section('content')
<div class=" h-fit  p-2">

    @include('includes.INV.Toast')

    <div id="add-product-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-full max-h-full">
        @include('includes.INV.AddModals')
    </div>

    <div id="edit-product-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-full max-h-full">
        @include('includes.INV.EditModals')
    </div>

    <div id="delete-product-modal" data-modal-target="delete-product-modal" tabindex="-1"  aria-hidden="true"  class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        @include('includes.INV.DeleteModals')
    </div>


    <nav class="flex px-5 py-3 mb-4 text-gray-700 border border-gray-200 bg-gray-50 rounded-md ">
        <ol class="inline-flex items-center space-x-1 md:space-x-2">
            <li class="inline-flex items-center">
                <a href="{{ route('home') }}" class="inline-flex items-center font-medium text-[12px] sm:text-lg text-gray-700 hover:text-secondary transition-colors ease-in-out duration-200">
                    <svg class="w-4 h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                    </svg>
                    Dashboard
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400  " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <a href="{{ route('product.index') }}" class="ms-1 text-lg text-gray-700 text-[12px] sm:text-lghover:text-secondary transition-colors duration-200 ease-in-out font-medium">Inventory</a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                <svg class="rtl:rotate-180  w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                    <span class="ms-1 text-lg font-medium text-secondary md:ms-2 text-[12px] sm:text-lg">Warehouse</span>
                </div>
            </li>
        </ol>
    </nav>

    <div>
        <div class=" flex justify-between items-center w-full mb-4">
            <h1 class="text-sm font-extrabold leading-none tracking-tight text-gray-900 md:text-xl lg:text-2xl dark:text-white">Warehouse</h1>
            <div class="flex items-center">
                <button id="addproduct" type="button" class="flex items-center focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-3 py-2 mr-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"><svg class="w-6 h-6  text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
                  </svg> Add Product
                  </button>
            <form class="">
                    <div class="relative w-full">
                        <input type="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Search..." required />
                        <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        </div>


        <div class="relative overflow-x-auto">

            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Product name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Picture
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Quantity
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Price
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Barcode
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ( $products as $product)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4">
                            <h6 class="action font-medium text-gray-900 whitespace-nowrap dark:text-white hover:text-blue-600 hover:font-bold cursor-pointer w-fit" data-id='{{$product->id}}'>{{$product->product_name}}</h6>
                        </th>
                        <td class="mx-6 py-4">
                            <img class=" w-[100px] h-[100px] border border-solid rounded-lg" src="{{ asset('storage/'.$product->image) }}" alt="">
                        </td>
                        <td class="px-6 py-4">
                           {{$product->stocks}}
                        </td>
                        <td class="px-6 py-4">
                            ₱{{$product->price}}
                        </td>
                        <td class="px-6 py-4">
                           {!! DNS1D::getBarcodeHTML("$product->barcode",'C39') !!}
                        </td>
                    </tr>
                    @empty
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4 text-center" colspan="5" >Empty Data Set</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            {{$products->onEachSide(4)->links() }}
        </div>

    </div>


</div>
@endsection
@section('scripts')
@vite(['resources/js/Invjs/MainProduct'])
<script type="module">

$.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

$(document).ready(()=>{



    $('#storeProduct').on('submit',function(e){
        e.preventDefault();
        let formData = new FormData($("#storeProduct")[0]);

        $.ajax({
        url: '{{ route('product.store') }}',
        data: formData,
        type: "POST",
        contentType: false,
        processData: false,
        beforeSend: () => {
            $("#submitProduct").prop("disabled", true);
        },
        complete: () => {
            $("#submitProduct").prop("disabled", false);
        },
        success: (result) => {
        console.log("🚀 ~ $ ~ result:", result)

            if (result.status == "success") {
                new iv.closeModal('add-product-modal');
                $("#storeProduct").find("span").text("");
                $("#storeProduct")[0].reset();
                new iv.openModal('static-modal')
                setTimeout(location.reload(true), 1000);
            } else if (result.status == "error") {
                $("#storeProduct").find("span").text("");
                $.each(result.errors, function (key, value) {
                    var showerror = $(document).find("#" + key + "_erroradd");
                    showerror.html(value);
                });
            }
        },
        error: (error) => {
            console.log(error);
        },
    });
    })

    $(".action").on("click", function (){
        var productId = $(this).attr('data-id')
        var url = '{{route('product.data','id')}}';
        url = url.replace('id',productId)

        $.ajax({
            url: url,
            type: "GET",
            contentType: false,
            processData: false,
            success: (result) => {
            console.log("🚀 ~ $ ~ result:", result)
            $('#edit_product_name').val(result.data[0].product_name)
            $('#edit_stock').val(result.data[0].stocks)
            $('#edit_price').val(result.data[0].price)
            $('#product_id').val(result.data[0].id)

            },
            error: (error) => {
                console.log(error);
            },
        })

       new iv.openModal("edit-product-modal");

       $(".deleteProduct").on('click',function(){
            new iv.closeModal('edit-product-modal');
            new iv.openModal('delete-product-modal');

            $("#remove").on("click",function(){
                var url = '{{route('product.delete','id')}}';
                url = url.replace('id',productId);

                $.ajax({
                    url: url,
                    type: "GET",
                    contentType: false,
                    processData: false,
                    beforeSend: () => {
                        $("remove").prop("disabled", true);
                    },
                    complete: () => {
                        $("remove").prop("disabled", false);
                    },
                    success: (result) => {
                        new iv.closeModal('edit-product-modal')
                        new iv.closeModal('delete-modal')
                        setTimeout(location.reload(true), 1000);
                    },
                    error: (error) => {
                        console.log(error.responseText);
                    },

                })
             })


        })
    })





    $('#editProduct').on('submit',function(e){
        e.preventDefault();
        let formData = new FormData($("#editProduct")[0]);

        $.ajax({
            url: '{{ route('product.edit') }}',
            data: formData,
            type: "POST",
            contentType: false,
            processData: false,
            beforeSend: () => {
                $("#submit_editProduct").prop("disabled", true);
            },
            complete: () => {
                $("#submit_editProduct").prop("disabled", false);
            },
            success: (result) => {
            console.log("🚀 ~ $ ~ result:", result)

                if (result.status == "success") {
                    new iv.closeModal('edit-product-modal');
                    $("#editProduct").find("span").text("");
                    $("#editProduct")[0].reset();
                    new iv.openModal('edit-modal')
                    setTimeout(location.reload(true), 1000);
                } else if (result.status == "error") {
                    $("#editProduct").find("span").text("");
                    $.each(result.errors, function (key, value) {
                        var showerror = $(document).find("#" + key + "_erroredit");
                        showerror.html(value);
                    });
                }
            },
            error: (error) => {
                console.log(error);
            },
        });

    })
})


</script>
@endsection
