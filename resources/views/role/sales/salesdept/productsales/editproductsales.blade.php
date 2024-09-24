@extends('role.purchasing.layoutsmrdept.main')
@section('main-container')

<link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
<div class="main-panel">
    <div class=" content-wrapper" style="background-color: #f6f6fb">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   
        
        <div class="row ">
            <div class="col-12 stretch-card grid-margin">
                <div class="border rounded card">
                    <div class="border rounded shadow card-body" id="myForm">
                        <h4 class="mb-3 card-title">Form Product</h4>
                        <form class="form-sample" method="POST" action="{{ route('productsales.update', $productsales->id) }}" id="">
                            @method('PUT')
                            @csrf
                            <div class="shadow row stretch-card grid-margin" style="background-color: #f1f1f6">
                                <div class="mt-3 col-md ">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Product</label>
                                        <input type="text" class="form-control form-control-sm" name="product" value="{{$productsales->product}}">
                                    </div>
                                </div>
                                <div class="mt-3 col-md ">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">SAP</label>
                                        <input type="text" class="form-control form-control-sm" name="sap" value="{{$productsales->sap}}">
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Specs</label>
                                        <input type="text" class="form-control form-control-sm" name="specs" value="{{$productsales->specs}}"
                                            required>
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Size</label>
                                        <input type="text" class="form-control form-control-sm" name="size" value="{{$productsales->size}}"
                                            required>
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Material</label>
                                        <input type="text" class="form-control form-control-sm " name="material" value="{{$productsales->material}}"
                                            placeholder="" required>
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Finishing</label>
                                        <input type="text" class="form-control form-control-sm " name="finishing" value="{{$productsales->finishing}}">
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Toleransi</label>
                                        <input type="text" class="form-control form-control-sm " name="toleransi" value="{{$productsales->toleransi}}">
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Unit</label>
                                        <input type="text" class="form-control form-control-sm " name="unit" value="{{$productsales->unit}}">
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



        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>





    @endsection
