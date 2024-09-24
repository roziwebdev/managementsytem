@extends('role.purchasing.layoutmrkadept.main')
@section('main-container')


<link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
<div class="main-panel">
    <div class=" content-wrapper" style="background-color: #f6f6fb">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <div class="row ">
            <div class="">
                <div class="shadow card rounded-xl">
                    <div class="border shadow card-body">
                        <h3 class="pb-3 text-center">Customer</h3>
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
                                        <th style="font-size: 14px; width: 70px; " class=" " scope="col" class="sticky">
                                        <div class="dropdown">
                                            <a class=" text-dark text-decoration-none dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                ID CUST
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="/sales/customer" class="dropdown-item ">
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
                                                    CUSTOMER
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="/sales/customer" class="dropdown-item ">
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
                                        <th style="font-size: 14px;" scope="col" class="">CLIENT</th>
                                        <th style="font-size: 14px;" scope="col" class="">ADDRES</th>
                                        <th style="font-size: 14px;" scope="col" class="">NPWP</th>
                                        <th style="font-size: 14px;" scope="col" class="">PHONE</th>
                                        <th style="font-size: 14px;" scope="col" class="">EMAIL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cust as $data)
                                     <tr>
                                         <td style="padding-top:8px; padding-bottom:8px; font-size:14px;">{{ $data->id}}</td>
                                         <td style="padding-top:8px; padding-bottom:8px; font-size:14px;">{{ $data->customer}}</td>
                                         <td style="padding-top:8px; padding-bottom:8px; font-size:14px;">{{ $data->up}}</td>
                                         <td style="padding-top:8px; padding-bottom:8px; font-size:14px;">{{ $data->address}}</td>
                                         <td style="padding-top:8px; padding-bottom:8px; font-size:14px;">{{ $data->npwp}}</td>
                                         <td style="padding-top:8px; padding-bottom:8px; font-size:14px;">{{ $data->phone}}</td>
                                         <td style="padding-top:8px; padding-bottom:8px; font-size:14px;">{{ $data->email}}</td>
                                         
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-2">
                            {{ $cust->appends(request()->query())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>





    @endsection
