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
            <button class="btn btn-info">Add Customer</button>
        </div>
        <div class="row ">
            <div class="col-12 stretch-card grid-margin">
                <div class="border rounded card">
                    <div class="border rounded shadow card-body" id="myForm">
                        <h4 class="mb-3 card-title">Form New Customer</h4>
                        <form class="form-sample" method="POST" action="{{ route('customer.store') }}" id="pricelistForm" enctype="multipart/form-data">
                            @csrf
                            <div class="shadow row stretch-card grid-margin" style="background-color: #f1f1f6">
                                <div class="mt-3 col-md ">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Code Customer</label>
                                        <input type="text" class="form-control form-control-sm" name="kodecust">
                                    </div>
                                </div>
                                <div class="mt-3 col-md ">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Customer</label>
                                        <input type="text" class="form-control form-control-sm" name="customer">
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">UP</label>
                                        <input type="text" class="form-control form-control-sm" name="up"
                                            required>
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Address</label>
                                        <input type="text" class="form-control form-control-sm" name="address"
                                            required>
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">NPWP</label>
                                        <input type="text" class="form-control form-control-sm " name="npwp"
                                            placeholder="" required>
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Phone</label>
                                        <input type="text" class="form-control form-control-sm " name="phone">
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Email</label>
                                        <input type="text" class="form-control form-control-sm " name="email">
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Company Image</label>
                                        <input type="file" class="form-control form-control-sm " name="image">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="mt-2 btn-rounded btn btn-gradient-info float-end">
                                    Submit
                                </button>
                            </div>
                            <!-- Add this modal at the bottom of your Blade file -->
                            <div class="modal fade" id="successModal" tabindex="-1" role="dialog"
                                aria-labelledby="successModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="successModalLabel">Success!</h5>

                                        </div>
                                        <div class="modal-body">
                                            Customer berhasil di tambahkan.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                        </form>
                    </div>
                </div>
            </div>



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
                                        <th style="font-size: 14px;" scope="col" class="">MANAGE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cust as $data)
                                     <tr>
                                         <td style="padding-top:3px; padding-bottom:3px; font-size:14px;">{{ $data->id}}</td>
                                         <td style="padding-top:3px; padding-bottom:3px; font-size:14px;">{{ $data->customer}}</td>
                                         <td style="padding-top:3px; padding-bottom:3px; font-size:14px;">{{ $data->up}}</td>
                                         <td style="padding-top:3px; padding-bottom:3px; font-size:14px;">{{ $data->address}}</td>
                                         <td style="padding-top:3px; padding-bottom:3px; font-size:14px;">{{ $data->npwp}}</td>
                                         <td style="padding-top:3px; padding-bottom:3px; font-size:14px;">{{ $data->phone}}</td>
                                         <td style="padding-top:3px; padding-bottom:3px; font-size:14px;">{{ $data->email}}</td>
                                         <td style="padding-top:3px; padding-bottom:3px; font-size:14px;">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-primary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    Manage
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="{{ route('customer.edit', $data->id) }}">Edit</a></li>
                                                    <li><a class="dropdown-item" href="{{ route('customer.show', $data->id) }}">Detail</a></li>
                                                    <li>
                                                        <form id="deleteForm{{ $data->id }}" action="{{ route('customer.destroy', $data->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="dropdown-item" type="button" onclick="confirmDelete({{ $data->id }})">Delete</button>
                                                        </form>
                                                    </li>
                                                    <script>
                                                        function confirmDelete(id) {
                                                            if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
                                                                document.getElementById('deleteForm' + id).submit();
                                                            }
                                                        }
                                                    </script>
                                                </ul>
                                            </div>
                                        </td>
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
