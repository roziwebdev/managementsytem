@extends('role.purchasing.layoutsmrdept.main')
@section('main-container')

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
<style>
    p {
        font-family: "Inter", sans-serif;
        font-optical-sizing: auto;
        font-weight: <weight>;
        font-style: normal;
        font-variation-settings:
            "slnt" 0;
    }

    .table-responsive1 {
        overflow-y: auto;
        max-height: 400px;
        /* Atur ketinggian maksimum jika diperlukan */
    }

    /* Atur posisi dan z-index untuk thead */
    .table1 thead th {
        background-color: #F0F0F0;
        position: sticky;
        top: 0;
        z-index: 100;
        /* Atur z-index untuk memastikan thead di atas konten tabel */
    }

    /* Atur z-index konten tabel agar berada di bawah thead yang ditempel */
    .table1 tbody {
        position: relative;
        z-index: 0;
    }
</style>
<div class="main-panel">
    
    @foreach ( $designs as $data )
    <div class="modal fade" id="exampleModalToggle{{ $data->id }}" aria-hidden="true"
        aria-labelledby="exampleModalToggleLabel{{ $data->id }}" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header pt-1 pb-0 mb-0">
                    <div class="text-center container-xl pb-0 mb-0">
                        <h1 class="text-center modal-title" style="font-size: 25px"
                            id="exampleModalToggleLabel{{ $data->id }}">Docket</h1>
                    </div>
                    <button type="button" class="float-end btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-4">
                    <div class="container-xl">
                        <div class="border shadow border-secondary" style="background:#F0F0F0">
                            <div class="container">
                                <div class="">
                                    <p style="font-size:18px" class="fw-bold py-2 mb-1">Design Number - {{ $data->designno }}
                                    </p>
                                </div>
                                <div class="row">
                                    <div class="col-lg">
                                        <p style="font-size:14px" class="mb-1"><span style="font-weight: 600">Product
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span>
                                            {{ $data->product }}</p>
                                        <p style="font-size:14px" class="mb-1"><span style="font-weight: 600">Status Order
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span>
                                            {{ $data->statusorder }}</p>
                                        <p style="font-size:14px" class="mb-1"><span style="font-weight: 600">Received Date
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span>
                                            {{ $data->tanggalterima }}</p>
                                    </div>
                                    <div class="col-lg">
                                        <p style="font-size:14px" class="mb-1"><span style="font-weight: 600">Original
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span>
                                            {{ $data->original }}</p>
                                        <p style="font-size:14px" class="mb-1"><span style="font-weight: 600">File
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span>
                                            {{ $data->design }}</p>
                                        <p style="font-size:14px" class="mb-1"><span style="font-weight: 600"> Created Date
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span>
                                            {{ $data->created_at }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="border border-black" style="background: rgb(255, 255, 255)">
                                <div class="container-xl border " style="height:450px">
                                    <div class="py-4 ">
                                        <div class="border shadow-sm table-responsive table-responsive1"
                                            style="height:400px">
                                            <table class="table table1 table-bordered border-secondary">
                                                <thead class="">
                                                    <tr style="background:#F0F0F0; top:10px" class="">
                                                        <th class="pt-2 pb-2 col-sm-4 fw-bold">Information (Packaging,
                                                            Color, Specs)</th>
                                                        <th class="pt-2 pb-2 col-sm-8 fw-bold">Value</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr style="" class="table-secondary">
                                                        <td class="pt-2 pb-2 fst-italic " style="font-weight: 600"
                                                            colspan="2">Specification Product</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">Actual Proses </td>
                                                        <td class="pt-2 pb-2 col-sm-8">{{ $data->finishingjob }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">Application </td>
                                                        <td class="pt-2 pb-2 col-sm-8">{{ $data->aplikasi }} </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">Up </td>
                                                        <td class="pt-2 pb-2 col-sm-8">{{ $data->up }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">Layout </td>
                                                        <td class="pt-2 pb-2 col-sm-8">{{ $data->layout }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">Uk Press Layout </td>
                                                        <td class="pt-2 pb-2 col-sm-8">{{ $data->ukpresslayout }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">Material 1 </td>
                                                        <td class="pt-2 pb-2 col-sm-8">{{ $data->mat1 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">Material 2 </td>
                                                        <td class="pt-2 pb-2 col-sm-8">{{ $data->mat2 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">Material 3 </td>
                                                        <td class="pt-2 pb-2 col-sm-8">{{ $data->mat3 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">Arah Serat 1 </td>
                                                        <td class="pt-2 pb-2 col-sm-8">{{ $data->as1 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">Arah Serat 2 </td>
                                                        <td class="pt-2 pb-2 col-sm-8">{{ $data->as2 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">Arah Serat 3 </td>
                                                        <td class="pt-2 pb-2 col-sm-8">{{ $data->as3 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">Pisau </td>
                                                        <td class="pt-2 pb-2 col-sm-8">{{ $data->pisau }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">Citto </td>
                                                        <td class="pt-2 pb-2 col-sm-8">{{ $data->citto }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">Emboss</td>
                                                        <td class="pt-2 pb-2 col-sm-8">{{ $data->emboss }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">Hotprint</td>
                                                        <td class="pt-2 pb-2 col-sm-8">{{ $data->hotprint }}</td>
                                                    </tr>
                                                    <tr style="" class="table-secondary">
                                                        <td class="pt-2 pb-2 fst-italic " style="font-weight: 600"
                                                            colspan="2">Color</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">Actual Color</td>
                                                        <td class="pt-2 pb-2 col-sm-8">{{ $data->actcolor }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">Acuan Warna</td>
                                                        <td class="pt-2 pb-2 col-sm-8">{{ $data->acuanwarna }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">Front 1</td>
                                                        <td class="pt-2 pb-2 col-sm-8">{{ $data->f1 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">Front 2</td>
                                                        <td class="pt-2 pb-2 col-sm-8">{{ $data->f2 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">Front 3</td>
                                                        <td class="pt-2 pb-2 col-sm-8">{{ $data->f3 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">Front 4</td>
                                                        <td class="pt-2 pb-2 col-sm-8">{{ $data->f4 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">Front 5</td>
                                                        <td class="pt-2 pb-2 col-sm-8">{{ $data->f5 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">Front 6</td>
                                                        <td class="pt-2 pb-2 col-sm-8">{{ $data->f6 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">Back 1</td>
                                                        <td class="pt-2 pb-2 col-sm-8">{{ $data->b1 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">Back 2</td>
                                                        <td class="pt-2 pb-2 col-sm-8">{{ $data->b2 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">Back 3</td>
                                                        <td class="pt-2 pb-2 col-sm-8">{{ $data->b3 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">Back 4</td>
                                                        <td class="pt-2 pb-2 col-sm-8">{{ $data->b4 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">Back 5</td>
                                                        <td class="pt-2 pb-2 col-sm-8">{{ $data->b5 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">Back 6</td>
                                                        <td class="pt-2 pb-2 col-sm-8">{{ $data->b6 }}</td>
                                                    </tr>
                                                    <tr style="" class="table-secondary">
                                                        <td class="pt-2 pb-2 fst-italic fw-bold" colspan="2">Packaging</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">No Packaging System</td>
                                                        <td class="pt-2 pb-2 col-sm-8">{{ $data->nops }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">Packaging</td>
                                                        <td class="pt-2 pb-2 col-sm-8">{{ $data->packing }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">Box Name</td>
                                                        <td class="pt-2 pb-2 col-sm-8">{{ $data->boxname }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">Box Size</td>
                                                        <td class="pt-2 pb-2 col-sm-8">{{ $data->boxsize }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">Box Specs</td>
                                                        <td class="pt-2 pb-2 col-sm-8">{{ $data->boxspecs }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">NW Box</td>
                                                        <td class="pt-2 pb-2 col-sm-8">{{ $data->nwbox }}</td>
                                                    </tr>
                                                    <tr style="" class="table-secondary">
                                                        <td class="pt-2 pb-2 fst-italic fw-bold" colspan="2">Note</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2" colspan="2">{{ $data->note1 }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
            </div>
        </div>
    </div>
    @endforeach

    @foreach ($designs as $design)
    <!-- Modal untuk mengedit status -->
    <div class="modal fade" id="editInputModal{{ $design->id }}" tabindex="-1" role="dialog"
        aria-labelledby="editInputModalLabel{{ $design->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editInputModalLabel{{ $design->id }}">
                        File Design Request
                    </h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('updateFileDesign', $design->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="">
                            <input class="form-control  bg-light rounded-lg" type="file" name="filedesign" required />
                        </div>
                        <hr>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save
                            changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal untuk mengedit status -->
    <div class="modal fade" id="editStatusModal{{ $design->id }}" tabindex="-1" role="dialog"
        aria-labelledby="editStatusModalLabel{{ $design->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editStatusModalLabel{{ $design->id }}">
                        Status Docket
                    </h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('updateStatusDocket', $design->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="">
                            <label class="btn btn-success ">
                                <input type="radio" value="Done" id="newStatusDocket" name="newStatusDocket" required />
                                Done
                            </label>
                        </div>
                        <hr>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save
                            changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editStatusLayoutModal{{ $design->id }}" tabindex="-1" role="dialog"
        aria-labelledby="editStatusLayoutModalLabel{{ $design->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editStatusLayoutModalLabel{{ $design->id }}">
                        Approve Layout
                    </h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('updateStatusLayout', $design->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="">
                            <label class="btn btn-success ">
                                <input type="radio" value="Approve" id="newStatusLayout" name="newStatusLayout" required />
                                Approve
                            </label>
                        </div>
                        <hr>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save
                            changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <div class=" content-wrapper px-3" style="background-color: #f6f6fb">
        <style>
            #myForm {
                display: none;
            }
            label{
                font-size: 13px;
                padding-bottom: 6px
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
        <!--<div id="myButton" class="py-2 justify-content-end d-flex">-->
        <!--    <button class="btn btn-info">Add Docket</button>-->
        <!--</div>-->
        <div class="row" id='row'>
            <div class="col-12 stretch-card grid-margin" id="myForm">
                <div class="border rounded card">
                    <div class="border rounded shadow card-body">
                        <div style="font-size: 25px" class="mt-3 mb-4 text-center font-bold ">Form Docket</div>
                        <form class="form-sample" method="POST" action="{{route('designnumber.store')}}">
                            @csrf
                            <div class="row pt-4 px-4" style="background-color: #f1f1f6">
                                <div class="col">
                                    <label class="pt-2" for="input1">Docket</label>
                                    <input style="border-radius: 10px;" list="docket" type="text" class="form-control py-2 clickable shadow-sm" name="designno" id="inputdocket" required />
                                </div>
                                <div class="col">
                                    <label class="pt-2" class="pt-2" for="input2">Product</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="product" id="getProduct"
                                        required list="listproduct"/>
                                    <datalist id="listproduct">
                                        @foreach($uniqueProducts as $product)
                                        <option value="{{ $product }}">{{ $product }}</option>
                                        @endforeach
                                    </datalist>
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input3">Status Design</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="statusorder"
                                        placeholder="" required>
                                </div>
                            </div>
                            <div class="row px-4" style="background-color: #f1f1f6">
                                <div class="col-sm">
                                    <label class="pt-2" for="input1">Original</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="original" required>
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input2">Bentuk Design</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="design" placeholder=""
                                        required>
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input3">Act Color</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="actcolor" placeholder=""
                                        required>
                                </div>
                            </div>
                            <div class="row px-4" style="background-color: #f1f1f6">
                                <div class="col-sm">
                                    <label class="pt-2" for="input1">Acuan Warna</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="acuanwarna"
                                        placeholder="">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input2">Finishing</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="finishingjob"
                                        placeholder="">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input3">Hotprint</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="hotprint"
                                        placeholder="">
                                </div>
                            </div>
                            <div class="row px-4" style="background-color: #f1f1f6">
                                <div class="col">
                                    <label class="pt-2" for="input1">F1</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="f1" placeholder="">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input2">F2</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="f2" placeholder="">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input3">F3</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="f3" placeholder="">
                                </div>
                            </div>
                            <div class="row px-4" style="background-color: #f1f1f6">
                                <div class="col">
                                    <label class="pt-2" for="input1">F4</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable " name="f4" placeholder="">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input2">F5</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="f5" placeholder="">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input3">F6</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="f6" placeholder="">
                                </div>
                            </div>
                            <div class="row px-4" style="background-color: #f1f1f6">
                                <div class="col">
                                    <label class="pt-2" for="input1">B1</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="b1" placeholder="">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input2">B2</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="b2" placeholder="">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input3">B3</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable " name="b3" placeholder="">
                                </div>
                            </div>
                            <div class="row px-4" style="background-color: #f1f1f6">
                                <div class="col">
                                    <label class="pt-2" for="input1">B4</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="b4" placeholder="">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input2">B5</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable " name="b5" placeholder="">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input3">B6</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="b6" placeholder="">
                                </div>
                            </div>
                            <div class="row px-4" style="background-color: #f1f1f6">
                                <div class="col">
                                    <label class="pt-2" for="input1">Packing</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable " name="packing"
                                        placeholder="">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input2">No PS</label>
                                    <input style="border-radius: 10px;" list="pn" type="text" class="shadow-sm form-control py-2 clickable " name="nops"
                                        id="inputpn" placeholder="" required>
                                    <datalist id="pn">
                                        @foreach ($packaging as $packaging )
                                            <option value="{{ $packaging->pn }}">
                                        @endforeach
                                    </datalist>
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input3">NW Box</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="nwbox" id="getNwbox">
                                </div>
                            </div>
                            <div class="row px-4" style="background-color: #f1f1f6">
                                <div class="col">
                                    <label class="pt-2" for="input1">Box Name</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="boxname"
                                        id="getBoxname">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input2">Box Specs</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="boxspecs"
                                        id="getBoxspecs" placeholder="">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input3">Box Size</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="boxsize" id="getBoxsize"
                                        placeholder="">
                                </div>
                            </div>
                            <div class="row px-4" style="background-color: #f1f1f6">
                                <div class="col">
                                    <label class="pt-2" for="input1">Application</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="aplikasi"
                                        placeholder="">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input2">Layout</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="layout">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input3">UP</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="up" placeholder="">
                                </div>
                            </div>
                            <div class="row px-4" style="background-color: #f1f1f6">
                                <div class="col">
                                    <label class="pt-2" for="input1">Uk Press Layout</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable " name="ukpresslayout"
                                        placeholder="">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input2">Emboss</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable " name="emboss" placeholder="">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input3">Citto</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable " name="citto" placeholder="">
                                </div>
                            </div>
                            <div class="row px-4" style="background-color: #f1f1f6">
                                <div class="col">
                                    <label class="pt-2" for="input1">MAT 1</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="mat1" placeholder="">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input2">MAT 2</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="mat2" placeholder="">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input3">MAT 3</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="mat3" placeholder="">
                                </div>
                            </div>
                            <div class="row px-4" style="background-color: #f1f1f6">
                                <div class="col">
                                    <label class="pt-2" for="input1">AS 1</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="as1" placeholder="">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input2">AS 2</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="as2" placeholder="">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input3">AS 3</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="as3" placeholder="">
                                </div>
                            </div>
                            <div class="row px-4" style="background-color: #f1f1f6">
                                <div class="col">
                                    <label class="pt-2" for="input1">Pisau</label>
                                    <input  style=" border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="pisau" placeholder="">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input1">Tanggal Terima</label>
                                    <input  style=" border-radius: 10px;" type="date" class="shadow-sm form-control py-2 clickable" name="tanggalterima" placeholder="">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input1">File Design</label>
                                    <input style="background-color:#ffffff; border-radius: 10px;" type="file" class="shadow-sm form-control py-2 clickable" name="filedesign" placeholder="">
                                </div>
                            </div>
                            <div class="row px-4" style="background-color: #f1f1f6">
                                <div class="">
                                    <label class="pt-2" for="input1">Note JOB</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="note1" placeholder="">
                                </div>
                                <div class="pb-4">
                                    <label class="pt-2" for="input1">Note Design Request</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="notedesignrequest" placeholder="">
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
            <div class="">
                <div class="shadow card rounded-xl">
                    <div class="border shadow card-body">
                        <h3 class="pb-3 text-center">DOCKET OLD</h3>
                        <form action="" method="GET" novalidate="novalidate">
                            <div class="pb-2 d-flex">
                                <input type="text" name="search" type="search" class="form-control py-2">
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
                                        <th style="font-size: 14px; width:20px;" scope="col" class="sticky">Docket
                                        </th>
                                        <th style="font-size: 14px;" scope="col" class="">Product</th>
                                        <th style="font-size: 14px;" scope="col" class="">Original</th>
                                        <th style="font-size: 14px;" scope="col" class="">Design</th>
                                        <th style="font-size: 14px;" scope="col" class="">Status Design</th>
                                        <th style="font-size: 14px;" scope="col" class="">File Design</th>
                                        <th style="font-size: 14px;" scope="col" class="">File Layout</th>
                                        <th style="font-size: 14px;" scope="col" class="">Date Created</th>
                                        <th style="font-size: 14px;" scope="col" class="">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($designs as $design )
                                    <tr>
                                        <td style="font-size: 14px; width:20px; padding-top:2px; padding-bottom:2px;" scope="col" class="sticky">{{ $design->designno }}</td>
                                        <td style="font-size: 14px; padding-top:4px; padding-bottom:4px;">{{$design->product }}</td>
                                        <td style="font-size: 14px; padding-top:4px; padding-bottom:4px;">{{$design->original }}</td>
                                        <td style="font-size: 14px; padding-top:4px; padding-bottom:4px;">{{$design->design }}</td>
                                        <td style="font-size: 14px; padding-top:4px; padding-bottom:4px;">{{$design->statusorder }}</td>
                                        <td style="font-size: 14px; padding-top:4px; padding-bottom:4px;">
                                            @if($design->filedesign != null)
                                            <button class="badge btn-success rounded" style="width:90px">Uploaded</button>
                                            @else
                                            <button class="badge btn-info rounded" style="width:90px"
                                              data-bs-toggle="modal" data-bs-target="#editInputModal{{ $design->id }}">Unuploaded
                                            </button>
                                            @endif
                                        </td>
                                        <td style="font-size: 14px; padding-top:4px; padding-bottom:4px;">
                                            @if($design->filelayout != null && $design->statuslayout == 'Approve')
                                            <button class="badge btn-success rounded" style="width:90px">Uploaded</button>
                                            @elseif ($design->filelayout != null && $design->statuslayout == 'Send')
                                            <button class="badge btn-warning rounded" style="width:90px" data-bs-toggle="modal" data-bs-target="#editStatusLayoutModal{{ $design->id }}">Send</button>
                                            @else
                                            <button class="badge btn-info rounded" style="width:90px" >Unuploaded</button>
                                            @endif
                                        <td style="font-size: 14px; padding-top:4px; padding-bottom:4px;">{{$design->created_at }}</td>
                                        <td style="font-size: 14px; padding-top:4px; padding-bottom:4px;">
                                           <div class="dropdown">
                                            <a class="btn btn-sm btn-primary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                Manage
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModalToggle{{ $design->id }}">Detail</a></li>
                                                <li><a class="dropdown-item" href="{{ route('designnumber.edit', $design->id) }}">Edit</a></li>
                                            </ul>
                                        </div>
                                        </td>
                                        <div class="modal fade" id="exampleModalToggle{{ $design->id }}" aria-hidden="true"
                                            aria-labelledby="exampleModalToggleLabel{{ $design->id }}" tabindex="-1">
                                            @include('role.prodev.prodevdept.design.show', ['details' => $design])
                                        </div>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="pt-4">
                            {{ $designs->appends(request()->query())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            // Fungsi yang dipanggil saat nilai input pertama berubah
            $('#inputdocket').change(function () {
                // Mendapatkan nilai yang dipilih pada input pertama
                var selectedDocket = $(this).val();
                // Melakukan Ajax request ke server untuk mendapatkan data client dan address berdasarkan namacustomer
                $.ajax({
                    type: 'GET',
                    url: '/get-job-datadocket/' + selectedDocket, // Gantilah dengan URL endpoint yang sesuai di Laravel
                    success: function (data) {
                        // Mengisi nilai pada input kedua dan ketiga
                        $('#getProduct').val(data.product);
                    },
                    error: function () {
                        alert('Gagal mengambil data Product.');
                    }
                });
            });
        });

        $(document).ready(function () {
            // Fungsi yang dipanggil saat nilai input pertama berubah
            $('#inputpn').change(function () {
                // Mendapatkan nilai yang dipilih pada input pertama
                var selectedPackaging = $(this).val();
                // Melakukan Ajax request ke server untuk mendapatkan data client dan address berdasarkan namacustomer
                $.ajax({
                    type: 'GET',
                    url: '/get-job-datapackaging/' + selectedPackaging, // Gantilah dengan URL endpoint yang sesuai di Laravel
                    success: function (data) {
                        // Mengisi nilai pada input kedua dan ketiga
                        $('#getNwbox').val(data.boxkg);
                        $('#getBoxname').val(data.boxname);
                        $('#getBoxspecs').val(data.boxspecs);
                        $('#getBoxsize').val(data.boxsize);
                    },
                    error: function () {
                        alert('Gagal mengambil data Packaging.');
                    }
                });
            });
        });
    </script>




    @endsection