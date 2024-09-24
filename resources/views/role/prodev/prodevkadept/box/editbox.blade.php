@extends('role.purchasing.layoutmrkadept.main')
@section('main-container')

<link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
<div class="main-panel">
    <div class=" content-wrapper" style="background-color: #f6f6fb">
        <div class="page-header">
            <h3 class="page-title">
                <span class="text-white page-title-icon bg-gradient-info me-2">
                    <i class="mdi mdi-home"></i>
                </span> Dashboard
            </h3>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <span></span>Overview <i
                            class="align-middle mdi mdi-alert-circle-outline icon-sm text-primary"></i>
                    </li>
                </ul>
            </nav>
        </div>
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

        <div class="row" id='row'>
            <div class="col-12 stretch-card grid-margin" id="">
                <div class="border rounded card">
                    <div class="border rounded shadow card-body">
                        <h4 class="mb-3 card-title">Form New Box</h4>
                        <form class="form-sample" method="POST" action="{{ route('kadeptboxes.update', $boxes->id) }}"
                            id="pricelistForm">
                            @method('PUT')
                            @csrf
                            <div class="shadow row stretch-card grid-margin" style="background-color: #f1f1f6">
                                <div class="mt-3 col-md ">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">BOX NAME</label>
                                        <input type="text" class="form-control form-control-sm" name="boxname" required value="{{$boxes->boxname}}">
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">SPECS</label> 
                                        <input type="text" class="form-control form-control-sm " name="specs" value="{{$boxes->specs}}"
                                            placeholder="" required>
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">SIZE</label>
                                        <input type="text" class="form-control form-control-sm " name="size" value="{{$boxes->size}}"
                                            placeholder="" required>
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">TOLERANSI</label>
                                        <input type="text" class="form-control form-control-sm " name="toleransi" value="{{$boxes->toleransi}}"
                                            placeholder="" required>
                                    </div>
                                </div>
                            </div>
                            <div class="shadow row " style="background-color: #f1f1f6">
                                    <div class="mt-3 col-md ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">NOTE 1</label>
                                            <input type="text" class="form-control form-control-sm" name="note1"  value="{{$boxes->note1}}">
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold ">NOTE 2</label>
                                            <input type="text" class="form-control form-control-sm " name="note2" placeholder="" value="{{$boxes->note2}}">
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold ">NOTE 3</label>
                                            <input type="text" class="form-control form-control-sm " name="note3" placeholder="" value="{{$boxes->note3}}" >
                                        </div>
                                    </div>
                                </div>
                            <div>
                                <button type="submit" class="mt-2 btn-rounded btn btn-gradient-info float-end">
                                    Submit
                                </button>
                            </div>
                            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




    @endsection
