@extends('role.purchasing.layoutsmrdept.main')
@section('main-container')


<link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
<div class="main-panel">
    <div class=" content-wrapper" style="background-color: #f6f6fb">
        <div class="row ">
            <div class="col-12 stretch-card grid-margin">
                <div class="border rounded card">
                    <div class="border rounded shadow card-body" id="myForm">
                        <h4 class="mb-3 card-title">Form Edit Customer</h4>
                        <form class="form-sample" method="POST" action="{{ route('customer.update', $cust->id) }}" id="pricelistForm" enctype="multipart/form-data" >
                            @method("PUT")
                            @csrf
                            <div class="row stretch-card" style="background-color: #f1f1f6">
                                <div class="mt-3 col-md ">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Code Cust</label>
                                        <input type="text" class="form-control form-control-sm" name="kodecust" value="{{$cust->kodecust}}" required>
                                    </div>
                                </div>
                                <div class="mt-3 col-md ">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Customer</label>
                                        <input type="text" class="form-control form-control-sm" name="customer" value="{{$cust->customer}}" required>
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">UP</label>
                                        <input type="text" class="form-control form-control-sm" name="up" value="{{$cust->up}}" required>
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Address</label>
                                        <input type="text" class="form-control form-control-sm" name="address" required value="{{$cust->address}}">
                                    </div>
                                </div>
                            </div>
                            <div class="shadow row stretch-card grid-margin" style="background-color: #f1f1f6">
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">NPWP</label>
                                        <input type="text" class="form-control form-control-sm " name="npwp" value="{{$cust->npwp}}" required>
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Phone</label>
                                        <input type="text" class="form-control form-control-sm " name="phone" value="{{$cust->phone}}">
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Email</label>
                                        <input type="text" class="form-control form-control-sm " name="email" value="{{$cust->email}}">
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Company Image</label>
                                        <input type="file" class="form-control form-control-sm " name="image" >
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="mt-2 btn-rounded btn btn-gradient-info float-end">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>





    @endsection
