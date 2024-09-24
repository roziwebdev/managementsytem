@extends('role.purchasing.layoutmrkadept.main')
@section('main-container')



<link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
<div class="main-panel">
    <div class=" content-wrapper" style="background-color: #f6f6fb">
        <div class="row ">

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



            <div class="">
                <div class="shadow card rounded-xl">
                    <div class="border shadow card-body">
                        <h3 class="pb-3 text-center">PLANT</h3>
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
                                        <th style="font-size: 14px; width: 70px; " class="sticky " scope="col"
                                            class="sticky">
                                            <div class="dropdown">
                                                <a class=" text-dark text-decoration-none dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    ID PLANT
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="/sales/plant" class="dropdown-item ">
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
                                        <th style="font-size: 14px;" scope="col" class="">CUSTOMER</th>
                                        <th style="font-size: 14px;" scope="col" class="">PLANT</th>
                                        <th style="font-size: 14px;" scope="col" class="">ADDRESS</th>
                                        <th style="font-size: 14px;" scope="col" class="">PHONE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($plant as $data)
                                    <tr>
                                        <td style="font-size: 14px; padding-top:8px; padding-bottom:8px;">{{ $data->id}}</td>
                                        <td style="font-size: 14px; padding-top:8px; padding-bottom:8px;">{{ $data->customer}}</td>
                                        <td style="font-size: 14px; padding-top:8px; padding-bottom:8px;">{{ $data->plant}}</td>
                                        <td style="font-size: 14px; padding-top:8px; padding-bottom:8px;">{{ $data->address}}</td>
                                        <td style="font-size: 14px; padding-top:8px; padding-bottom:8px;">{{ $data->phone}}</td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-2">
                            {{ $plant->appends(request()->query())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>





    @endsection
