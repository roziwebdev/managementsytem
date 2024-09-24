@extends('role.purchasing.layoutmrkadept.main')
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
            <button class="btn btn-info">Add Docket</button>
        </div>
        <div class="row" id='row'>
            <div class="col-12 stretch-card grid-margin" id="myForm">
                <div class="border rounded card">
                    <div class="border rounded shadow card-body">
                        <h4 class="mb-3 card-title">Form New Docket</h4>
                        <form class="form-sample" method="POST" action="{{ route('kadeptdocket.store') }}"
                            id="pricelistForm">
                            @csrf
                            <div class="shadow row" style="background-color: #f1f1f6">
                                <div class="mt-3 col-md ">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Docket</label>
                                        <input type="text" class="form-control form-control-sm" name="nodocket" required>
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Product</label>
                                        <input type="text" class="form-control form-control-sm " name="product"
                                            placeholder="" required>
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Prepress</label>
                                        <input type="text" class="form-control form-control-sm " name="prepress"
                                            placeholder="" required>
                                    </div>
                                </div>
                            </div>
                            <div class="shadow row " style="background-color: #f1f1f6">
                               <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Effective Date</label>
                                        <input type="date" class="form-control form-control-sm " name="tglefektif"
                                            placeholder="" required>
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Due Date</label>
                                        <input type="date" class="form-control form-control-sm " name="duedate"
                                            placeholder="" required>
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Product Size</label>
                                        <input type="text" class="form-control form-control-sm " name="productsize"
                                            placeholder="" required>
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Diecut Date</label>
                                        <input type="text" class="form-control form-control-sm " name="diecutsize"
                                            placeholder="" required>
                                    </div>
                                </div>
                            </div>
                            <div class="shadow row " style="background-color: #f1f1f6">
                                <div class="mt-3 col-md ">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Remarks</label>
                                        <input type="text" class="form-control form-control-sm" name="remarks"
                                            required>
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
                        <h3 class="pb-3 text-center">DOCKET LIST</h3>
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
                                        <th style="font-size: 14px; width:20px;" scope="col" class="sticky">DOCKET</th>
                                        <th style="font-size: 14px;" scope="col" class="">PRODUCT</th>
                                        <th style="font-size: 14px;" scope="col" class="">PREPRESS</th>
                                        <th style="font-size: 14px;" scope="col" class="">DUE DATE</th>
                                        <th style="font-size: 14px;" scope="col" class="">EFFECTIVE DATE</th>
                                        <th style="font-size: 14px;" scope="col" class="">PRODUCT SIZE</th>
                                        <th style="font-size: 14px;" scope="col" class="">DIECUT SIZE</th>
                                        <th style="font-size: 14px;" scope="col" class="">REMARKS</th>
                                        <th style="font-size: 14px;" scope="col" class="">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dockets as $docket )
                                    <tr>
                                        <td style="font-size: 14px;  padding-top:2px; padding-bottom:2px;"scope="col" class="sticky">{{ $docket->nodocket }}</td>
                                        <td style="font-size: 14px;  padding-top:2px; padding-bottom:2px;">{{ $docket->product }}</td>
                                        <td style="font-size: 14px;  padding-top:2px; padding-bottom:2px;">{{ $docket->prepress }}</td>
                                        <td style="font-size: 14px;  padding-top:2px; padding-bottom:2px;">{{ $docket->productsize }}</td>
                                        <td style="font-size: 14px;  padding-top:2px; padding-bottom:2px;">{{ $docket->diecutsize }}</td>
                                        <td style="font-size: 14px;  padding-top:2px; padding-bottom:2px;">{{ $docket->remarks }}</td>
                                        <td style="font-size: 14px;  padding-top:2px; padding-bottom:2px;">
                                            <button class="btn btn-primary btn-sm">
                                                Manage
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div class="pt-4">
                            {{ $dockets->appends(request()->query())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    @endsection