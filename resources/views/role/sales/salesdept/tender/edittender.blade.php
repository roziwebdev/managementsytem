@extends('role.purchasing.layoutsmrdept.main')
@section('main-container')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
<div class="main-panel">
    <div class=" content-wrapper" style="background-color: #f6f6fb">
        <div class="row" id='row'>
            <div class="col-12 stretch-card grid-margin" id="">
                <div class="border rounded card">
                    <div class="border rounded shadow card-body">
                        <h4 class="mb-3 card-title">Form Edit Tender</h4>
                        <form class="form-sample" method="POST"
                            action="{{ route('tender.update', $tender->id) }}" id="pricelistForm">
                            @csrf
                            @method('PUT')
                            <div class="shadow row stretch-card grid-margin" style="background-color: #f1f1f6">
                                <div class="mt-3 col-md ">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Product</label>
                                        <input value="{{ $tender->product }}" type="text"
                                        class="form-control form-control-sm clickable" name="product" required>
                                        <input value="{{ $tender->product }}" name="historyproduct" type="hidden"/>
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">SAP</label>
                                        <input value="{{ $tender->sap }}" type="text"
                                            class="form-control form-control-sm clickable" name="sap" required>
                                        <input value="{{ $tender->sap }}" name="historysap" type="hidden"/>
                                    </div>
                                </div>
                                <!-- Add this modal at the bottom of your Blade file -->
                                
                                <div class="py-2">
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
    </div>



    @endsection