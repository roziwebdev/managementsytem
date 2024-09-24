@extends('role.purchasing.layoutsmrdept.main')
@section('main-container')

<link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
<div class="main-panel">
    <div class=" content-wrapper" style="background-color: #f6f6fb">
        <style>
            #myForm {
                display: none;
            }
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                                    $("#myButton").click(function(){
                                        $("#myForm").fadeToggle();
                                    });
                                });
        </script>
        <div id="myButton" class="py-2 justify-content-end d-flex">
            <button class="btn btn-info">Add Product</button>
        </div>
        <div class="row ">
            <div class="col-12 stretch-card grid-margin">
                <div class="border rounded card">
                    <div class="border rounded shadow card-body" id="myForm">
                        <h4 class="mb-3 card-title">Form Product</h4>
                        <form class="form-sample" method="POST" action="{{ route('productsales.store') }}" id="pricelistForm">
                            @csrf
                            <div class="shadow row stretch-card grid-margin" style="background-color: #f1f1f6">
                                <div class="mt-3 col-md ">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Product</label>
                                        <input type="text" class="form-control form-control-sm" name="product">
                                    </div>
                                </div>
                                <div class="mt-3 col-md ">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">SAP</label>
                                        <input type="text" class="form-control form-control-sm" name="sap">
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Specs</label>
                                        <input type="text" class="form-control form-control-sm" name="specs"
                                            required>
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Size</label>
                                        <input type="text" class="form-control form-control-sm" name="size"
                                            required>
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Material</label>
                                        <input type="text" class="form-control form-control-sm " name="material"
                                            placeholder="" required>
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Finishing</label>
                                        <input type="text" class="form-control form-control-sm " name="finishing">
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Toleransi</label>
                                        <input type="text" class="form-control form-control-sm " name="toleransi">
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Unit</label>
                                        <input type="text" class="form-control form-control-sm " name="unit">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="mt-2 btn-rounded btn btn-gradient-info float-end">
                                    Submit
                                </button>
                            </div>
                            <!-- Add this modal at the bottom of your Blade file -->
                        </form>
                    </div>
                </div>
            </div>



            <div class="">
                <div class="shadow card rounded-xl">
                    <div class="border shadow card-body">
                        <h3 class="pb-3 text-center">Products</h3>
                        <form action="" method="GET" novalidate="novalidate">
                            <div class="pb-2 d-flex">
                                <input type="text" name="search" type="search" class="form-control form-control-sm">
                                <button type="submit" class="btn btn-sm btn-gradient-success ">Search</button>
                            </div>
                        </form>

                        <div class="table-responsive">
                            <style>
                                th.sticky {
                                    position: sticky;
                                    left: 0;
                                    background-color: #f1f1f6;
                                }
                            </style>
                            <table class="table" id="materialRequestTable">
                                <thead>
                                    <tr style="background-color: #f1f1f6">
                                        <th style="font-size: 14px; width: 70px; " class="sticky " scope="col" class="sticky">
                                        <div class="dropdown">
                                            <a class=" text-dark text-decoration-none dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                ID
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="/productsales" class="dropdown-item ">
                                                        <span class="px-2 align-middle material-symbols-outlined" style="font-size: 20px">
                                                            clear_all
                                                        </span>Clear
                                                    </a>
                                                </li>
                                                <li>
                                                    <form action="" method="GET" novalidate="novalidate">
                                                        <input type="hidden" name="sort_by" value="asc">
                                                        <button type="submit" class="dropdown-item ">
                                                            <span class="px-2 align-middle material-symbols-outlined" style="font-size: 20px">
                                                                text_rotate_up
                                                            </span>Sort A to Z
                                                        </button>
                                                    </form>
                                                </li>
                                                <li>
                                                    <form action="" method="GET" novalidate="novalidate">
                                                        <input type="hidden" name="sort_by" value="desc">
                                                        <button type="submit" class="dropdown-item ">
                                                            <span class="px-2 align-middle material-symbols-outlined" style="font-size: 20px">
                                                                text_rotation_down
                                                            </span>Sort Z to A
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                        </th>
                                        <th style="font-size: 14px; width:20px;" scope="col">
                                            <div class="dropdown">
                                                <a class=" text-dark text-decoration-none dropdown-toggle" href="#" role="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    Product
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="/productsales" class="dropdown-item ">
                                                            <span class="px-2 align-middle material-symbols-outlined" style="font-size: 20px">
                                                                clear_all
                                                            </span>Clear
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <form action="" method="GET" novalidate="novalidate">
                                                            <input type="hidden" name="sort_by" value="asccustomer">
                                                            <button type="submit" class="dropdown-item ">
                                                                <span class="px-2 align-middle material-symbols-outlined" style="font-size: 20px">
                                                                    text_rotate_up
                                                                </span>Sort A to Z
                                                            </button>
                                                        </form>
                                                    </li>
                                                    <li>
                                                        <form action="" method="GET" novalidate="novalidate">
                                                            <input type="hidden" name="sort_by" value="desccustomer">
                                                            <button type="submit" class="dropdown-item ">
                                                                <span class="px-2 align-middle material-symbols-outlined" style="font-size: 20px">
                                                                    text_rotation_down
                                                                </span>Sort Z to A
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </th>
                                        <th style="font-size: 14px;" scope="col" class="">SAP</th>
                                        <th style="font-size: 14px;" scope="col" class="">SPECS</th>
                                        <th style="font-size: 14px;" scope="col" class="">SIZE</th>
                                        <th style="font-size: 14px;" scope="col" class="">MATERIAL</th>
                                        <th style="font-size: 14px;" scope="col" class="">FINISHING</th>
                                        <th style="font-size: 14px;" scope="col" class="">TOLERANSI</th>
                                        <th style="font-size: 14px;" scope="col" class="">UNIT</th>
                                        <th style="font-size: 14px;" scope="col" class="">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productsales as $data)
                                     <tr>
                                         <td style="font-size: 14px; padding-top:2px; padding-bottom:2px;">{{ $data->id}}</td>
                                         <td style="font-size: 14px; padding-top:2px; padding-bottom:2px;">{{ $data->product}}</td>
                                         <td style="font-size: 14px; padding-top:2px; padding-bottom:2px;">{{ $data->sap}}</td>
                                         <td style="font-size: 14px; padding-top:2px; padding-bottom:2px;">{{ $data->specs}}</td>
                                         <td style="font-size: 14px; padding-top:2px; padding-bottom:2px;">{{ $data->size}}</td>
                                         <td style="font-size: 14px; padding-top:2px; padding-bottom:2px;">{{ $data->material}}</td>
                                         <td style="font-size: 14px; padding-top:2px; padding-bottom:2px;">{{ $data->finishing}}</td>
                                         <td style="font-size: 14px; padding-top:2px; padding-bottom:2px;">{{ $data->toleransi}}</td>
                                         <td style="font-size: 14px; padding-top:2px; padding-bottom:2px;">{{ $data->unit}}</td>
                                         <td style="font-size: 14px; padding-top:2px; padding-bottom:2px;">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-primary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    Manage
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="{{ route('productsales.edit', $data->id) }}">Edit</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-2">
                            {{ $productsales->appends(request()->query())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>





    @endsection
