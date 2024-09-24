@extends('role.purchasing.layoutsmrmanager.main')
@section('main-container')


<link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
<div class="main-panel">
    <style>
        p{
                font-family: "Inter", sans-serif;
                font-optical-sizing: auto;
                font-weight: <weight>;
                    font-style: normal;
                    font-variation-settings:
                    "slnt" 0;
        }
        .table-responsive1 {
        overflow-y: auto;
        max-height: 400px; /* Atur ketinggian maksimum jika diperlukan */
        }

        /* Atur posisi dan z-index untuk thead */
        .table1 thead th {
        background-color: #F0F0F0;
        position: sticky;
        top: 0;
        z-index: 100; /* Atur z-index untuk memastikan thead di atas konten tabel */
        }

        /* Atur z-index konten tabel agar berada di bawah thead yang ditempel */
        .table1 tbody {
        position: relative;
        z-index: 0;
        }
    </style>
    @foreach ( $job as $data )
        <div class="modal fade" id="exampleModalToggle{{ $data->id }}" aria-hidden="true"
            aria-labelledby="exampleModalToggleLabel{{ $data->id }}" tabindex="-1">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header pt-1 pb-0 mb-0">
                        <div class="text-center container-xl pb-0 mb-0">
                            <h1 class="text-center modal-title" style="font-size: 25px" id="exampleModalToggleLabel{{ $data->id }}">JOB ORDER</h1>
                        </div>
                        <button type="button" class="float-end btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body pb-4">
                        <div class="container-xl">
                            <div class="border shadow border-secondary" style="background:#F0F0F0">
                                <div class="container">
                                    <div class="">
                                        <p style="font-size:18px" class="fw-bold py-2 mb-1">Sales Contract - {{ $data->nosc }}</p>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg">
                                            <p  style="font-size:14px" class="mb-1"><span style="font-weight: 600">Purchase Order &nbsp;&nbsp;&nbsp;:</span> 
                                                <a style="text-decoration:none;" href="{{ asset('storage/path/to/your/image/' . $data->fileponoprice) }}" target="_blank">
                                                    {{ $data->po }}
                                                </a>
                                            </p>
                                            <p  style="font-size:14px" class="mb-1"><span style="font-weight: 600">Customer &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </span>{{ $data->customer }}</p>
                                            <p  style="font-size:14px" class="mb-1"><span style="font-weight: 600">Plant &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span> {{ $data->plantcode }}</p>
                                        </div>
                                        <div class="col-lg">
                                            <p  style="font-size:14px" class="mb-1"><span style="font-weight: 600">Product &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span> {{ $data->product }}</p>
                                            <p  style="font-size:14px" class="mb-1"><span style="font-weight: 600">SAP &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span> {{ $data->sap }}</p>
                                            <p  style="font-size:14px" class="mb-1"><span style="font-weight: 600">Quantity &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span> {{ $data->qty }} {{ $data->unit }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="border border-black" style="background: rgb(255, 255, 255)">
                                    <div class="container-xl border " style="height:450px">
                                        <div class="py-4 " >
                                            <div class="border shadow-sm table-responsive table-responsive1" style="height:400px">
                                                <table class="table table1 table-bordered border-secondary">
                                                    <thead class="">
                                                        <tr style="background:#F0F0F0; top:10px" class="">
                                                            <th class="pt-2 pb-2 col-sm-4 fw-bold">Information (Packaging, Color, Specs)</th>
                                                            <th class="pt-2 pb-2 col-sm-8 fw-bold">Value</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr style="" class="table-secondary">
                                                            <td  class="pt-2 pb-2 fst-italic" style="font-weight: 600" colspan="2">Information</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">JOB Number </td>
                                                            <td class="pt-2 pb-2 col-sm-8">{{ $data->id }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">JOB Date </td>
                                                            <td class="pt-2 pb-2 col-sm-8">{{ \Carbon\Carbon::parse($data->created_at)->format('j M y')}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">File Received Date </td>
                                                            <td class="pt-2 pb-2 col-sm-8">{{ \Carbon\Carbon::parse($data->tanggalterima)->format('j M y')}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">Docket </td>
                                                            <td class="pt-2 pb-2 col-sm-8">{{ $data->designno }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">Status Design </td>
                                                            <td class="pt-2 pb-2 col-sm-8">{{ $data->statusdesign }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">Original </td>
                                                            <td class="pt-2 pb-2 col-sm-8">{{ $data->original }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">Design </td>
                                                            <td class="pt-2 pb-2 col-sm-8">{{ $data->design }}</td>
                                                        </tr>
                                                        <tr style="" class="table-secondary">
                                                            <td class="pt-2 pb-2 fst-italic " style="font-weight: 600" colspan="2">Specification Product</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">Finishing Specs</td>
                                                            <td class="pt-2 pb-2 col-sm-8">{{ $data->finishing }}</td>
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
                                                            <td class="pt-2 pb-2 col-sm-4">Up :</td>
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
                                                            <td class="pt-2 pb-2 fst-italic " style="font-weight: 600" colspan="2">Color</td>
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
    @foreach($job as $user)
        <div class="modal fade" id="editStatusModal{{ $user->id }}"
            tabindex="-1" role="dialog"
            aria-labelledby="editStatusModalLabel{{ $user->id }}"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"
                            id="editStatusModalLabel{{ $user->id }}"> Approval JOB
                        </h5>
                    </div>
                    <div class="modal-body">
                        <!-- Form untuk mengedit status -->
                           <form action="{{ route('updateStatusJobManager', $user->id) }}"
                                method="POST">
                                @csrf
                                @method('PUT')
                                <div class="">
                                    <h5>Accept Revisi</h5>
                                    <label class="btn btn-info px-5">
                                        <input type="radio" value="Waiting"
                                            id="newStatus" name="newStatus">
                                        Accept 
                                    </label>
                                </div>
                                <div class="mt-5">
                                    <h5>Note Edit : {{$user->noteedit}}</h5>
                                </div>
                                <hr>
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="submit"
                                    class="btn btn-primary">Save
                                    changes</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class=" content-wrapper" style="background-color: #f6f6fb">
        <style>
            #myForm {
                display: none;
            }
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <div class="row" id='row'>
            <div class="">
                <div class="shadow card rounded-xl">
                    <div class="border shadow card-body">
                        <h3 class="pb-3 text-center">JOB ORDER</h3>
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
                                        <th style="font-size: 14px; width:20px;" scope="col" class="sticky"> 
                                                <div class="dropdown">
                                                    <a class="absolute text-dark text-decoration-none dropdown-toggle"
                                                        href="#" role="button" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        JOB
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a href="/manager/prodev" class="dropdown-item ">
                                                                <span class="px-2 align-middle material-symbols-outlined"
                                                                    style="font-size: 20px">
                                                                    clear_all
                                                                </span>Clear
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <form action="" method="GET" novalidate="novalidate">
                                                                <input type="hidden" name="sort_by" value="asc">
                                                                <button type="submit" class="dropdown-item ">
                                                                    <span
                                                                        class="px-2 align-middle material-symbols-outlined"
                                                                        style="font-size: 20px">
                                                                        text_rotate_up
                                                                    </span>Sort A to Z
                                                                </button>
                                                            </form>
                                                        </li>
                                                        <li>
                                                            <form action="" method="GET" novalidate="novalidate">
                                                                <input type="hidden" name="sort_by" value="desc">
                                                                <button type="submit" class="dropdown-item ">
                                                                    <span
                                                                        class="px-2 align-middle material-symbols-outlined"
                                                                        style="font-size: 20px">
                                                                        text_rotation_down
                                                                    </span>Sort Z to A
                                                                </button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </th>                                        
                                        <th style="font-size: 14px;" scope="col" class="">SC</th>
                                        <th style="font-size: 14px;" scope="col" class="">STS</th>
                                        <th style="font-size: 14px;" scope="col" class="">PRODUCT</th>
                                        <th style="font-size: 14px;" scope="col" class="">PO</th>
                                        <th style="font-size: 14px;" scope="col" class="">DATE REC</th>
                                        <th style="font-size: 14px;" scope="col" class=""> 
                                                <div class="dropdown">
                                                    <a class="absolute text-dark text-decoration-none dropdown-toggle"
                                                        href="#" role="button" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        DATE CR
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a href="/manager/prodev" class="dropdown-item ">
                                                                <span class="px-2 align-middle material-symbols-outlined"
                                                                    style="font-size: 20px">
                                                                    clear_all
                                                                </span>Clear
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <form action="" method="GET" novalidate="novalidate">
                                                                <input type="hidden" name="sort_by" value="asccreated">
                                                                <button type="submit" class="dropdown-item ">
                                                                    <span
                                                                        class="px-2 align-middle material-symbols-outlined"
                                                                        style="font-size: 20px">
                                                                        text_rotate_up
                                                                    </span>Sort A to Z
                                                                </button>
                                                            </form>
                                                        </li>
                                                        <li>
                                                            <form action="" method="GET" novalidate="novalidate">
                                                                <input type="hidden" name="sort_by" value="desccreated">
                                                                <button type="submit" class="dropdown-item ">
                                                                    <span
                                                                        class="px-2 align-middle material-symbols-outlined"
                                                                        style="font-size: 20px">
                                                                        text_rotation_down
                                                                    </span>Sort Z to A
                                                                </button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </th>                                        
                                        <th style="font-size: 14px;" scope="col" class=""> 
                                                <div class="dropdown">
                                                    <a class="absolute text-dark text-decoration-none dropdown-toggle"
                                                        href="#" role="button" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        DATE ED
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a href="/manager/prodev" class="dropdown-item ">
                                                                <span class="px-2 align-middle material-symbols-outlined"
                                                                    style="font-size: 20px">
                                                                    clear_all
                                                                </span>Clear
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <form action="" method="GET" novalidate="novalidate">
                                                                <input type="hidden" name="sort_by" value="ascupdated">
                                                                <button type="submit" class="dropdown-item ">
                                                                    <span
                                                                        class="px-2 align-middle material-symbols-outlined"
                                                                        style="font-size: 20px">
                                                                        text_rotate_up
                                                                    </span>Sort A to Z
                                                                </button>
                                                            </form>
                                                        </li>
                                                        <li>
                                                            <form action="" method="GET" novalidate="novalidate">
                                                                <input type="hidden" name="sort_by" value="descupdated">
                                                                <button type="submit" class="dropdown-item ">
                                                                    <span
                                                                        class="px-2 align-middle material-symbols-outlined"
                                                                        style="font-size: 20px">
                                                                        text_rotation_down
                                                                    </span>Sort Z to A
                                                                </button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </th>                                        
                                        <th style="font-size: 14px;" scope="col" class="">NOTE EDIT</th>
                                        <th style="font-size: 14px;" scope="col" class="">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($job as $data)
                                    <tr>
                                        <td style="font-size: 14px; width:20px; padding-top:2px; padding-bottom:2px;"
                                            scope="col" class="sticky">{{ $data->id}}</td>
                                        <td style="padding-top:2px; padding-bottom:2px;">{{ $data->nosc}}</td>
                                        <td style="padding-top:2px; padding-bottom:2px;">
                                            @if ($data->statusjob == 'Approve')
                                            <span class="material-symbols-outlined text-success" style='font-size:18px'>
                                                check_circle
                                            </span>
                                            @elseif ($data->statusjob == 'Waiting')
                                            <span class="material-symbols-outlined text-warning" style='font-size:18px'>
                                                hourglass_top
                                            </span>
                                            @elseif ($data->statusjob == 'Revised')
                                            <span class="material-symbols-outlined text-dark" style='font-size:18px'>
                                                edit
                                            </span>
                                            @elseif ($data->statusjob == 'Declined')
                                            <span class="material-symbols-outlined text-danger" style='font-size:18px'>
                                                cancel
                                            </span>
                                            @endif
                                        </td>
                                        <td style="padding-top:2px; padding-bottom:2px;">{{ $data->product}}</td>
                                        <td style="padding-top:2px; padding-bottom:2px;">{{ $data->po}}</td>
                                        <td style="padding-top:2px; padding-bottom:2px;">{{ \Carbon\Carbon::parse($data->tanggalterima)->format('j M y')}}</td>
                                        <td style="padding-top:2px; padding-bottom:2px;">{{ \Carbon\Carbon::parse($data->created_at)->format('j M y')}}</td>
                                        <td style="padding-top:2px; padding-bottom:2px;">{{ \Carbon\Carbon::parse($data->updated_at)->format('j M y')}}</td>
                                        <td style="padding-top:2px; padding-bottom:2px;">{{ $data->noteedit}}</td>

                                        <td style="padding-top: 3px; padding-bottom:3px;" class="d-flex ">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-primary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    Manage
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item" href="" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModalToggle{{ $data->id }}">
                                                            Detail
                                                        </a>
                                                    </li>
                                                    @if($data->statusjob == "Revised")
                                                    <li>
                                                        <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editStatusModal{{ $data->id }}" >Approve</button>
                                                    </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="exampleModalToggle{{ $data->id }}" aria-hidden="true"
                                        aria-labelledby="exampleModalToggleLabel{{ $data->id }}" tabindex="-1">
                                        @include('role.prodev.prodevkadept.job.show', ['details' => $data])
                                    </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-3">
                            {{ $job->appends(request()->query())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





@endsection
