@extends('role.purchasing.layouts.main')
@section('main-container')
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
    <div class="main-panel">
        <div class="    content-wrapper" style="background-color: #f6f6fb">
            <div class="page-header">
                <h3 class="page-title">
                    <span class="page-title-icon bg-gradient-info text-white me-2">
                        <i class="mdi mdi-home"></i>
                    </span> Dashboard
                </h3>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">
                            <span></span>Overview <i
                                class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="row ">
                <div class="col-12 stretch-card grid-margin">
                    <div class="card border rounded">
                        <div class="card-body shadow  border rounded">
                            <h4 class="card-title mb-3">Form Pricelist</h4>
                            <form class="form-sample" method="POST" action="{{ route('pricelist.update', $pricelist->id) }}" id="pricelistForm">
                                @method('PUT')
                                @csrf
                                <div class="row stretch-card " style="background-color: #f1f1f6">
                                    <div class="col-md mt-3 ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Item</label>
                                            <input type="text" class="form-control form-control-sm " name="item" value='{{$pricelist->item}}'>
                                        </div>
                                    </div>

                                    <div class="col-md mt-3">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Specs</label>
                                            <input type="text" class="form-control form-control-sm " name="specs" value='{{$pricelist->specs}}'>
                                        </div>
                                    </div>

                                    <div class="col-md mt-3">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Sizes</label>
                                            <input type="text" class="form-control form-control-sm " name="size" value='{{$pricelist->size}}'>
                                        </div>
                                    </div>
                                </div>
                                <div class="row stretch-card " style="background-color: #f1f1f6">
                                    <div class="col-md mt-3 ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Type</label>
                                            <input type="text" class="form-control form-control-sm " name="type" value='{{$pricelist->type}}'>
                                        </div>
                                    </div>

                                    <div class="col-md mt-3">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Unit</label>
                                            <input type="text" class="form-control form-control-sm " name="unit" value='{{$pricelist->unit}}'>
                                        </div>
                                    </div>

                                    <div class="col-md mt-3">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Serat</label>
                                            <input type="text" class="form-control form-control-sm " name="arahserat" list="serat" value='{{$pricelist->arahserat}}'>
                                            <datalist id="serat">
                                                <option value="&harr;">
                                                <option value="&#8597;">
                                            </datalist>
                                        </div>
                                    </div>
                                    <div class="col-md mt-3">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Price</label>
                                            <input type="text" class="form-control form-control-sm " name="price" value='{{$pricelist->price}}'> 
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button type="submit" 
                                        class="btn-rounded btn btn-gradient-info float-end mt-2">
                                        Submit
                                    </button>
                                </div>
                            
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- content-wrapper ends -->
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


@endsection
