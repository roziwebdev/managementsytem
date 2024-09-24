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
            <button class="btn btn-info">Add Box</button>
        </div>
        <div class="row" id='row'>
            <div class="col-12 stretch-card grid-margin" id="myForm">
                <div class="border rounded card">
                    <div class="border rounded shadow card-body">
                        <h4 class="mb-3 card-title">Form New Box</h4>
                        <form class="form-sample" method="POST" action="{{ route('boxes.store') }}"
                            id="pricelistForm">
                            @csrf
                            <div class="shadow row stretch-card grid-margin" style="background-color: #f1f1f6">
                                <div class="mt-3 col-md ">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">BOX NAME</label>
                                        <input type="text" class="form-control form-control-sm" name="boxname" required>
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">SPECS</label>
                                        <input type="text" class="form-control form-control-sm " name="specs"
                                            placeholder="" required>
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">SIZE</label>
                                        <input type="text" class="form-control form-control-sm " name="size"
                                            placeholder="" required>
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">TOLERANSI</label>
                                        <input type="text" class="form-control form-control-sm " name="toleransi"
                                            placeholder="" required>
                                    </div>
                                </div>
                            </div>
                            <div class="shadow row " style="background-color: #f1f1f6">
                                    <div class="mt-3 col-md ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">NOTE 1</label>
                                            <input type="text" class="form-control form-control-sm" name="note1" >
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold ">NOTE 2</label>
                                            <input type="text" class="form-control form-control-sm " name="note2" placeholder="" >
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold ">NOTE 3</label>
                                            <input type="text" class="form-control form-control-sm " name="note3" placeholder="" >
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
                        <h3 class="pb-3 text-center">BOXES LIST</h3>
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

                                td.sticky {
                                    position: sticky;
                                    left: 0;
                                    background-color: #ffffff;
                                }
                            </style>
                            <table class="table" id="materialRequestTable">
                                <thead>
                                    <tr style="background-color: #f1f1f6">
                                        <th style="font-size: 14px; width:20px;" scope="col" class="sticky">Code Box</th>
                                        <th style="font-size: 14px;" scope="col" class="">BOX NAME</th>
                                        <th style="font-size: 14px;" scope="col" class="">SPECS</th>
                                        <th style="font-size: 14px;" scope="col" class="">SIZE</th>
                                        <th style="font-size: 14px;" scope="col" class="">TOLERANSI</th>
                                        <th style="font-size: 14px;" scope="col" class="">NOTE 1</th>
                                        <th style="font-size: 14px;" scope="col" class="">NOTE 2</th>
                                        <th style="font-size: 14px;" scope="col" class="">NOTE 3</th>
                                        <th style="font-size: 14px;" scope="col" class="">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($boxes as $box )
                                    <tr>
                                        <td style="font-size: 14px; width:20px; padding-top:2px; padding-bottom:2px;" scope="col" class="sticky">{{
                                            $box->id}}</td>
                                        <td style="font-size: 14px; width:20px; padding-top:2px; padding-bottom:2px;">{{ $box->boxname }}</td>
                                        <td style="font-size: 14px; width:20px; padding-top:2px; padding-bottom:2px;">{{ $box->specs }}</td>
                                        <td style="font-size: 14px; width:20px; padding-top:2px; padding-bottom:2px;">{{ $box->size }}</td>
                                        <td style="font-size: 14px; width:20px; padding-top:2px; padding-bottom:2px;">{{ $box->toleransi }}</td>
                                        <td style="font-size: 14px; width:20px; padding-top:2px; padding-bottom:2px;">{{ $box->note1 }}</td>
                                        <td style="font-size: 14px; width:20px; padding-top:2px; padding-bottom:2px;">{{ $box->note2}}</td>
                                        <td style="font-size: 14px; width:20px; padding-top:2px; padding-bottom:2px;">{{ $box->note3}}</td>
                                        <td style="font-size: 14px; width:20px; padding-top:2px; padding-bottom:2px;">
                                            <button class="btn btn-info btn-sm">Manage</button>
                                        </td>

                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    @endsection
