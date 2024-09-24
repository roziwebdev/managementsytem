@extends('role.purchasing.layoutmrkadept.main')
@section('main-container')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
<div class="main-panel">
    
    @foreach ( $designrequests as $data )
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
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span>
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
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span>
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
                                                    <tr style="" class="table-secondary">
                                                        <td class="pt-2 pb-2 fst-italic fw-bold" colspan="2">Layout</td>
                                                    </tr>
                                                    <form action="{{ route('updateLayoutKadept', $data->id) }}"  method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method("PUT")
                                                        @if($data->a == "A" && $data->filea == null)
                                                        <tr>
                                                            <td class="pt-2 pb-2" colspan="2">
                                                                <label for="" class="form-label">Layout {{$data->a}}</label>
                                                                <input class="form-control" type="file" id="" name="filea">
                                                                <input type="hidden" id="newStatusa" name="newStatusa" value="Send"/>
                                                            </td>
                                                        </tr>
                                                        @elseif($data->a == "A" && $data->filea != null)
                                                        <tr>
                                                            <td class="pt-2 pb-2" colspan="2">
                                                                <a class="badge badge-primary">Send</a>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($data->b == "B" && $data->fileb == null)
                                                        <tr>
                                                            <td class="pt-2 pb-2" colspan="2">
                                                                <label for="" class="form-label">Layout {{$data->b}}</label>
                                                                <input class="form-control" type="file" id="" name="fileb">
                                                                <input type="hidden" id="newStatusb" name="newStatusb" value="Send"/>
                                                            </td>
                                                        </tr>
                                                        @elseif($data->b == "B" && $data->fileb != null)
                                                        <tr>
                                                            <td class="pt-2 pb-2" colspan="2">
                                                                Preview
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($data->c == "C" && $data->filec == null)
                                                        <tr>
                                                            <td class="pt-2 pb-2" colspan="2">
                                                                <label for="" class="form-label">Layout {{$data->c}}</label>
                                                                <input class="form-control" type="file" id="" name="filec">
                                                                <input type="hidden" id="newStatusc" name="newStatusc" value="Send"/>
                                                            </td>
                                                        </tr>
                                                        @elseif($data->c == "C" && $data->filec != null)
                                                        <tr>
                                                            <td class="pt-2 pb-2" colspan="2">
                                                                Preview
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($data->d == "D" && $data->filed == null)
                                                        <tr>
                                                            <td class="pt-2 pb-2" colspan="2">
                                                                <label for="" class="form-label">Layout {{$data->d}}</label>
                                                                <input class="form-control" type="file" id="" name="filed">
                                                                <input type="hidden" id="newStatusd" name="newStatusd" value="Send"/>
                                                            </td>
                                                        </tr>
                                                        @elseif($data->d == "D" && $data->filed != null)
                                                        <tr>
                                                            <td class="pt-2 pb-2" colspan="2">
                                                                Preview
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($data->e == "E" && $data->filee == null)
                                                        <tr>
                                                            <td class="pt-2 pb-2" colspan="2">
                                                                <label for="" class="form-label">Layout {{$data->e}}</label>
                                                                <input class="form-control" type="file" id="" name="filee">
                                                                <input type="hidden" id="newStatuse" name="newStatuse" value="Send"/>
                                                            </td>
                                                        </tr>
                                                        @elseif($data->e == "R" && $data->filee != null)
                                                        <tr>
                                                            <td class="pt-2 pb-2" colspan="2">
                                                                Preview
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($data->f == "F" && $data->filef == null)
                                                        <tr>
                                                            <td class="pt-2 pb-2" colspan="2">
                                                                <label for="" class="form-label">Layout {{$data->f}}</label>
                                                                <input class="form-control" type="file" id="" name="filef">
                                                                <input type="hidden" id="newStatusf" name="newStatusf" value="Send"/>
                                                            </td>
                                                        </tr>
                                                        @elseif($data->f == "F" && $data->filef != null)
                                                        <tr>
                                                            <td class="pt-2 pb-2" colspan="2">
                                                                Preview
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($data->g == "G" && $data->fileg == null)
                                                        <tr>
                                                            <td class="pt-2 pb-2" colspan="2">
                                                                <label for="" class="form-label">Layout {{$data->g}}</label>
                                                                <input class="form-control" type="file" id="" name="fileg">
                                                                <input type="hidden" id="newStatusg" name="newStatusg" value="Send"/>
                                                            </td>
                                                        </tr>
                                                        @elseif($data->g == "G" && $data->fileg != null)
                                                        <tr>
                                                            <td class="pt-2 pb-2" colspan="2">
                                                                Preview
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($data->h == "H" && $data->fileh == null)
                                                        <tr>
                                                            <td class="pt-2 pb-2" colspan="2">
                                                                <label for="" class="form-label">Layout {{$data->h}}</label>
                                                                <input class="form-control" type="file" id="" name="fileh">
                                                                <input type="hidden" id="newStatush" name="newStatush" value="Send"/>
                                                            </td>
                                                        </tr>
                                                        @elseif($data->h == "H" && $data->fileh != null)
                                                        <tr>
                                                            <td class="pt-2 pb-2" colspan="2">
                                                                Preview
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($data->i == "I" && $data->filei == null)
                                                        <tr>
                                                            <td class="pt-2 pb-2" colspan="2">
                                                                <label for="" class="form-label">Layout {{$data->i}}</label>
                                                                <input class="form-control" type="file" id="" name="filei">
                                                                <input type="hidden" id="newStatusi" name="newStatusi" value="Send"/>
                                                            </td>
                                                        </tr>
                                                        @elseif($data->i == "I" && $data->filei != null)
                                                        <tr>
                                                            <td class="pt-2 pb-2" colspan="2" >
                                                                Preview
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($data->j == "J" && $data->filej == null)
                                                        <tr>
                                                            <td class="pt-2 pb-2" colspan="2">
                                                                <label for="" class="form-label">Layout {{$data->j}}</label>
                                                                <input class="form-control" type="file" id="" name="filej">
                                                                <input type="hidden" id="newStatusj" name="newStatusj" value="Send"/>
                                                            </td>
                                                        </tr>
                                                        @elseif($data->j == "J" && $data->filej != null)
                                                        <tr>
                                                            <td class="pt-2 pb-2" colspan="2">
                                                                Preview
                                                            </td>
                                                        </tr>
                                                        @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex py-4 float-end">
                            <div class="px-1">
                                <button type="submit" class="btn btn-sm btn-success">
                                    Submit
                                </button>
                            </div>
                            <div class="px-1">
                                <button data-bs-dismiss="modal" type="button" class="btn btn-sm btn-secondary">
                                    Close
                                </button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    
    @foreach ($designrequests as $design)
    <!-- Modal untuk mengedit status -->
    <div class="modal fade" id="editInputModal{{ $design->id }}" tabindex="-1" role="dialog"
        aria-labelledby="editInputModalLabel{{ $design->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editInputModalLabel{{ $design->id }}">
                        File Production Layout
                    </h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('designrequestkadept.update', $design->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="">
                            <input class="form-control  bg-light rounded-lg" type="file"  name="filelayout" required/>
                            <input type="hidden" id="newStatusLayout" name="newStatusLayout" value="Send"/>
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
                        Send Design
                    </h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('updateStatusDesignKadept', $design->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="">
                            <label class="btn btn-info ">
                                <input type="radio" value="Send" id="newStatus" name="newStatus" required/>
                                Send
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
    <div class=" content-wrapper" style="background-color: #f6f6fb">
        <div class="row" id='row'>
            <div class="">
                <div class="shadow card rounded-xl">
                    <div class="border shadow card-body">
                        <h3 class="pb-3 text-center">DESIGN REQUEST</h3>
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
                            <style>
                                .no-download {
                                    -webkit-user-select: none;
                                    -moz-user-select: none;
                                    -ms-user-select: none;
                                    user-select: none;
                                }
                            </style>
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    document.addEventListener('contextmenu', function(e) {
                                        if (e.target.tagName === 'IMG') {
                                            e.preventDefault();
                                        }
                                    });
                                });
                            </script>
                            <table class="table" id="materialRequestTable">
                                <thead>
                                    <tr style="background-color: #f1f1f6">
                                        <th style="font-size: 14px; width:;" scope="col">Docket</th>
                                        <th style="font-size: 14px; width:;" scope="col">Status</th>
                                        <th style="font-size: 14px; width:;" scope="col">Product</th>
                                        <th style="font-size: 14px; width:;" scope="col">File Design</th>
                                        <th style="font-size: 14px; width:;" scope="col"> 
                                                <div class="dropdown">
                                                    <a class="absolute text-dark text-decoration-none dropdown-toggle"
                                                        href="#" role="button" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        File Layout
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                   <li>
                                                    <a href="/designkadept/designrequestkadept"
                                                        class="dropdown-item ">
                                                        All Status
                                                    </a>
                                                    </li>
                                                    <li>
                                                         <form action="" method="GET"
                                                            novalidate="novalidate">
                                                            <input type="hidden" name="statuslayout"
                                                                value="Send">
                                                            <button type="submit"
                                                                class="dropdown-item ">
                                                                Send
                                                            </button>
                                                        </form>
                                                    </li>
                                                    <li>
                                                         <form action="" method="GET"
                                                            novalidate="novalidate">
                                                            <input type="hidden" name="statuslayout"
                                                                value="Approve">
                                                            <button type="submit"
                                                                class="dropdown-item ">
                                                                Approve
                                                            </button>
                                                        </form>
                                                    </li>
                                                    <li>
                                                         <form action="" method="GET"
                                                            novalidate="novalidate">
                                                            <input type="hidden" name="statuslayout"
                                                                value="null">
                                                            <button type="submit"
                                                                class="dropdown-item ">
                                                                Unploaded
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                                </div>
                                            </th>
                                        <th style="font-size: 14px; width:;" scope="col">Date Created</th>
                                        <th style="font-size: 14px;" scope="col" class="">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($designrequests as $designrequest)
                                    <tr>
                                        <td style="padding-top: 5px; padding-bottom: 5px">{{ $designrequest->id }}</td>
                                        <td style="padding-top: 5px; padding-bottom: 5px">
                                            @if($designrequest->statusdocket == 'Open' )
                                            <span class="material-symbols-outlined text-warning" style='font-size:18px'>
                                                error
                                            </span>
                                            @elseif ($designrequest->statusdocket == 'Send')
                                            <span class="material-symbols-outlined text-primary" style='font-size:18px'>
                                                hourglass_top
                                            </span>
                                            @elseif ($designrequest->statusdocket == 'Done')
                                            <span class="material-symbols-outlined text-success" style='font-size:18px'>
                                                check_circle
                                            </span>
                                            @endif
                                        </td>
                                        <td style="padding-top: 5px; padding-bottom: 5px">{{ $designrequest->product }}</td>
                                        <td style="padding-top: 5px; padding-bottom: 5px">
                                            @if(isset($designrequest->filedesign) )
                                                <button class="badge btn-success rounded" style="width:90px">Uploaded</button>
                                            @else
                                                <button class="badge btn-info rounded" style="width:90px" onclick="document.getElementById('fileInput').click();">Unuploaded</button>
                                            @endif
                                        </td>
                                        <td style="padding-top: 5px; padding-bottom: 5px">
                                            @if($designrequest->filelayout != null && $designrequest->statuslayout == 'Approve')
                                            <button class="badge btn-success rounded" style="width:90px">Uploaded</button>
                                            @elseif ($designrequest->filelayout != null && $designrequest->statuslayout == 'Send')
                                            <div class="no-download">
                                                <a href="javascript:void(0)" onclick="openImageInNewWindow('{{ asset('storage/path/to/your/image/' . $designrequest->filelayout) }}')">
                                                    <button class="badge btn-warning rounded" style="width:90px">Send</button>
                                                </a>
                                            </div>
                                            <script>
                                                function openImageInNewWindow(url) {
                                                    var newWindow = window.open();
                                                    newWindow.document.write('<html><head><style>img{pointer-events:none;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;}</style></head><body><img src="' + url + '" alt="Design Image"></body></html>');
                                                }
                                            </script>
                                            @else
                                            <button class="badge btn-info rounded" style="width:90px" data-bs-toggle="modal" data-bs-target="#editInputModal{{ $designrequest->id }}">Unuploaded</button>
                                            @endif
                                        </td>
                                        <td style="padding-top: 5px; padding-bottom: 5px">{{ \Carbon\Carbon::parse($designrequest->created_at)->format('j M y') }}</td>
                                        <td style="padding-top: 5px; padding-bottom:5px;" class="d-flex ">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-gradient-primary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    Manage
                                                </a>
                                                <ul class="dropdown-menu">
                                                    @if ($designrequest->statusdocket == 'Open')
                                                        <li>
                                                            <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editStatusModal{{ $designrequest->id }}">
                                                                Approve
                                                            </button>
                                                        </li>
                                                    @endif
                                                    <li><a class="dropdown-item" href="" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModalToggle{{ $designrequest->id }}">Detail</a></li>
                                                    <li>
                                                        <a class="dropdown-item" href="">
                                                            Download
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-2">
                            {{ $designrequests->appends(request()->query())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    @endsection