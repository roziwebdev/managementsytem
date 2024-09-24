@extends('role.purchasing.layoutmrkadept.main')
@section('main-container')


<link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" /> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>    
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
        <div class="modal fade" id="packagingModal{{ $data->id }}" aria-hidden="true"
            aria-labelledby="packagingModalLabel{{ $data->id }}" tabindex="-1">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header pt-1 pb-0 mb-0">
                        <div class="text-center container-xl pb-0 mb-0">
                            <h1 class="text-center modal-title" style="font-size: 25px" id="packagingModalLabel{{ $data->id }}">Packaging System</h1>
                        </div>
                        <button type="button" class="float-end btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body pb-4">
                        <div class="container-xl">
                            <div class="border shadow border-secondary" style="background:#F0F0F0">
                                        <p style="font-size:18px" class="fw-bold py-2 mb-1">NO PN - {{ $data->nops }}</p>
                               
                                <div class="border border-black" style="background: rgb(255, 255, 255)">
                                    <div class="container-xl border " style="height:600px">
                                        <div class="py-4 " >
                                            <div class="border shadow-sm table-responsive table-" style="height:550px">
                                                <table class="table table1 table-bordered border-secondary">
                                                    <thead class="">
                                                        <tr style="background:#F0F0F0; top:10px" class="">
                                                            <th class="pt-2 pb-2 col-sm-4 fw-bold">Information (Product & Packaging)</th>
                                                            <th class="pt-2 pb-2 col-sm-8 fw-bold">Value</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr style="" class="table-secondary">
                                                            <td  class="pt-2 pb-2 fst-italic" style="font-weight: 600" colspan="2">Information</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">Product </td>
                                                            <td class="pt-2 pb-2 col-sm-8">{{ $data->product }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">Docket </td>
                                                            <td class="pt-2 pb-2 col-sm-8">{{ $data->designno }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">SAP </td>
                                                            <td class="pt-2 pb-2 col-sm-8">{{ $data->sap }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">Effective Date </td>
                                                            <td class="pt-2 pb-2 col-sm-8">
                                                                @if($data->effective)
                                                                    {{ \Carbon\Carbon::parse($data->effective)->format('j M y')}}
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">Prepared Date </td>
                                                            <td class="pt-2 pb-2 col-sm-8">
                                                                @if($data->preparedate)
                                                                    {{ \Carbon\Carbon::parse($data->preparedate)->format('j M y')}}
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr style="" class="table-secondary">
                                                            <td class="pt-2 pb-2 fst-italic " style="font-weight: 600" colspan="2">Specification Packing</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">Isi</td>
                                                            <td class="pt-2 pb-2 col-sm-8">{{ $data->isi }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">Estimasi NW (PCS)</td>
                                                            <td class="pt-2 pb-2 col-sm-8">{{ $data->nwpcs }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">Estimasi Uk Packing </td>
                                                            <td class="pt-2 pb-2 col-sm-8">{{ $data->estimasipacking }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">Susunan</td>
                                                            <td class="pt-2 pb-2 col-sm-8">{{ $data->susunan }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">Isi Box SAP/Bendel</td>
                                                            <td class="pt-2 pb-2 col-sm-8">
                                                                {{ $data->isiboxsap }} 
                                                                    @if($data->isiboxsap)
                                                                        <span>/</span> 
                                                                    @endif
                                                                {{$data->sapataubendel}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">NW Box (KG)</td>
                                                            <td class="pt-2 pb-2 col-sm-8">{{ $data->boxkg }}</td>
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
                                                            <td class="pt-2 pb-2 col-sm-4">Uk Box Dalam</td>
                                                            <td class="pt-2 pb-2 col-sm-8">P {{ $data->boxdalampanjang }} X L {{$data->boxdalamplebar}} X T {{$data->boxdalamtinggi}}  MM</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">Uk Box Luar</td>
                                                            <td class="pt-2 pb-2 col-sm-8">P {{ $data->boxluarpanjang }} X L {{$data->boxluarlebar}} X T {{$data->boxluartinggi}} MM</td>
                                                        </tr>
                                                        <tr style="" class="table-secondary">
                                                            <td class="pt-2 pb-2 fst-italic fw-bold" colspan="2">Note</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2" colspan="2">{{ $data->notepackaging }}</td>
                                                        </tr>
                                                        <tr style="" class="table-secondary">
                                                            <td class="pt-2 pb-2 fst-italic " style="font-weight: 600" colspan="2">Drawing Susunan Packing</td>
                                                        </tr>
                                                        <tr class="">
                                                            <td colspan="2" style="height:200px">
                                                                @if($data->gambar1)
                                                                <a target="_blank" href="{{ asset('storage/path/to/your/image/' . $data->gambar1) }}">
                                                                    <img  style="width:200px; height:200px"  src="{{ asset('storage/path/to/your/image/' . $data->gambar1) }}"/>
                                                                </a>
                                                                @endif
                                                                @if($data->gambar2)
                                                                <a target="_blank" href="{{ asset('storage/path/to/your/image/' . $data->gambar2) }}">
                                                                    <img style="width:200px; height:200px"  src="{{ asset('storage/path/to/your/image/' . $data->gambar2) }}"/>
                                                                </a>
                                                                @endif
                                                                @if($data->gambar3)
                                                                <a target="_blank" href="{{ asset('storage/path/to/your/image/' . $data->gambar3) }}">
                                                                    <img style="width:200px; height:200px"  src="{{ asset('storage/path/to/your/image/' . $data->gambar3) }}"/>
                                                                </a>
                                                                @endif
                                                                @if($data->gambar4)
                                                                <a target="_blank" href="{{ asset('storage/path/to/your/image/' . $data->gambar4) }}">
                                                                    <img style="width:200px; height:200px"  src="{{ asset('storage/path/to/your/image/' . $data->gambar4) }}"/>
                                                                </a>
                                                                @endif
                                                                @if($data->gambar5)
                                                                <a target="_blank" href="{{ asset('storage/path/to/your/image/' . $data->gambar5) }}">
                                                                    <img style="width:200px; height:200px"  src="{{ asset('storage/path/to/your/image/' . $data->gambar5) }}"/>
                                                                </a>
                                                                @endif
                                                            </td>
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
                                    <div class="">
                                        <p style="font-size:18px" class="fw-bold py-2 mb-1">Sales Contract - {{ $data->nosc }}</p>
                                    </div>
                                <div class="px-2">
                                    <div class="row">
                                        <div class="col-lg">
                                            <p  style="font-size:14px" class="mb-1"><span style="font-weight: 600">Purchase Order &nbsp;&nbsp;&nbsp;:</span>
                                                 <a style="text-decoration:none;" href="{{ asset('storage/path/to/your/image/' . $data->fileponoprice) }}" target="_blank">
                                                    {{ $data->po }}
                                                </a>
                                            </p>
                                            <p  style="font-size:14px" class="mb-1"><span style="font-weight: 600">Customer &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </span>{{ $data->customer }}</p>
                                            <p  style="font-size:14px" class="mb-1"><span style="font-weight: 600">Plant &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span> {{ $data->plantcode }}</p>
                                            <p  style="font-size:14px" class="mb-1"><span style="font-weight: 600">Due Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span> {{ \Carbon\Carbon::parse($data->etauser)->format('j M y')}}</p>

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
                                                            <td class="pt-2 pb-2 fst-italic fw-bold" colspan="2">Layout</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">Layout {{$data->namalayout}}</td>
                                                            <td class="pt-2 pb-2 col-sm-8">
                                                                <a href="javascript:void(0)" onclick="openImageInNewWindow('{{ asset('storage/path/to/your/image/' . $data->filelayout) }}')" style="text-decoration:none;"class="badge badge-success">
                                                                    Preview
                                                                </a>    
                                                            </td>
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
   
    <div style="display: none">
        <table id="data-table" class=" ">
            <thead>
                <tr>
                    <th>ED JOB</th>
                    <th>CR JOB</th>
                    <th>ED SC</th>
                    <th>CR SC</th>
                    <th>GEN</th>
                    <th>NO SC</th>
                    <th>STAT</th>
                    <th>NOTE SC</th>
                    <th>JOB</th>
                    <th>STATUS</th>
                    <th>TGL JOB</th>
                    <th>TGL SC</th>
                    <th>PO</th>
                    <th>TGL PO</th>
                    <th>S-CODE</th>
                    <th>CUSTOMER</th>
                    <th>ID</th>
                    <th>ETA</th>
                    <th>CLIENT</th>
                    <th>PLANT</th>
                    <th>PRODUCT</th>
                    <th>MATERIAL</th>
                    <th>SAP</th>
                    <th>SIZE</th>
                    <th>SPECS</th>
                    <th>FINISHING</th>
                    <th>QTY</th>
                    <th>UNIT</th>
                    <th>TOLERANSI</th>
                    <th>ORIGINAL SAMPLE</th>
                    <th>DESIGN BENTUK</th>
                    <th>TGL TERIMA</th>
                    <th>DESIGN NO</th>
                    <th>STATUS</th>
                    <th>ACT COLOR</th>
                    <th>F1</th>
                    <th>F2</th>
                    <th>F3</th>
                    <th>F4</th>
                    <th>F5</th>
                    <th>F6</th>
                    <th>B1</th>
                    <th>B2</th>
                    <th>B3</th>
                    <th>B4</th>
                    <th>B5</th>
                    <th>B6</th>
                    <th>FINISHING2</th>
                    <th>ACUAN WARNA</th>
                    <th>PACKING</th>
                    <th>NO PS</th>
                    <th>BOX CODE</th>
                    <th>BOX</th>
                    <th>BOX SPECS</th>
                    <th>BOX SIZE</th>
                    <th>NW/BOX</th>
                    <th>APPLICATION</th>
                    <th>LAYOUT</th>
                    <th>UP</th>
                    <th>UK PRESS LAYOUT</th>
                    <th>MAT1</th>
                    <th>AS1</th>
                    <th>MAT2</th>
                    <th>AS1</th>
                    <th>MAT3</th>
                    <th>AS3</th>
                    <th>PISAU</th>
                    <th>CITTO</th>
                    <th>EMBOSS</th>
                    <th>HOTPRINT</th>
                    <th>NOTE</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($job as $data)
                <tr>
                <td>{{ $data->updated_at ?? '' }}</td>0
                <td>{{ $data->created_at ?? '' }}</td>1
                <td>{{ $data->updatedsc ?? '' }}</td>2
                <td>{{ $data->createdsc ?? '' }}</td>3
                <td>{{ $data->gen ?? '' }}</td>4
                <td>{{ $data->nosc ?? '' }}</td>5
                <td>{{ $data->statussc ?? '' }}</td>6
                <td>{{ $data->notesc ?? '' }}</td>7
                <td>{{ $data->id ?? '' }}</td>8
                <td>{{ $data->status ?? '' }}</td>9
                <td>{{ $data->created_at ?? '' }}</td>10
                <td>{{ $data->createdsc ?? '' }}</td>11
                <td>{{ $data->po ?? '' }}</td>12
                <td>{{ $data->tanggalpo ?? '' }}</td>13
                <td>{{ $data->scode ?? '' }}</td>14
                <td>{{ $data->customer ?? '' }}</td>15
                <td>{{ $data->idcust ?? '' }}</td>16
                <td>{{ $data->etauser ?? '' }}</td>17
                <td>{{ $data->client ?? '' }}</td>18
                <td>{{ $data->plantcode ?? '' }}</td>19
                <td>{{ $data->product ?? '' }}</td>20
                <td>{{ $data->material ?? '' }}</td>21
                <td>{{ $data->sap ?? '' }}</td>22
                <td>{{ $data->size ?? '' }}</td>23
                <td>{{ $data->specs ?? '' }}</td>24
                <td>{{ $data->finishing ?? '' }}</td>25
                <td>{{ $data->qty ?? '' }}</td>26
                <td>{{ $data->unit ?? '' }}</td>27
                <td>{{ $data->toleransi ?? '' }}</td>28
                <td>{{ $data->original ?? '' }}</td>29
                <td>{{ $data->design ?? '' }}</td>30
                <td>{{ $data->tanggalterima ?? '' }}</td>31
                <td>{{ $data->designno ?? '' }}</td>32
                <td>{{ $data->statusdesign ?? '' }}</td>33
                <td>{{ $data->actcolor ?? '' }}</td>34
                <td>{{ $data->f1 ?? '' }}</td>35
                <td>{{ $data->f2 ?? '' }}</td>36
                <td>{{ $data->f3 ?? '' }}</td>37
                <td>{{ $data->f4 ?? '' }}</td>38
                <td>{{ $data->f5 ?? '' }}</td>39
                <td>{{ $data->f6 ?? '' }}</td>40
                <td>{{ $data->b1 ?? '' }}</td>41
                <td>{{ $data->b2 ?? '' }}</td>42
                <td>{{ $data->b3 ?? '' }}</td>43
                <td>{{ $data->b4 ?? '' }}</td>44
                <td>{{ $data->b5 ?? '' }}</td>45
                <td>{{ $data->b6 ?? '' }}</td>46
                <td>{{ $data->finishingjob ?? '' }}</td>47
                <td>{{ $data->acuanwarna ?? '' }}</td>48
                <td>{{ $data->packing ?? '' }}</td>49
                <td>{{ $data->nops ?? '' }}</td>50
                <td>{{ $data->box_code ?? '' }}</td>51
                <td>{{ $data->boxname ?? '' }}</td>52
                <td>{{ $data->boxspecs ?? '' }}</td>53
                <td>{{ $data->boxsize ?? '' }}</td>54
                <td>{{ $data->nwbox ?? '' }}</td>55
                <td>{{ $data->aplikasi ?? '' }}</td>56
                <td>{{ $data->layout ?? '' }}</td>57
                <td>{{ $data->up ?? '' }}</td>58
                <td>{{ $data->ukpresslayout ?? '' }}</td>59
                <td>{{ $data->mat1 ?? '' }}</td>60
                <td>{{ $data->as1 ?? '' }}</td>61
                <td>{{ $data->mat2 ?? '' }}</td>62
                <td>{{ $data->as2 ?? '' }}</td>63
                <td>{{ $data->mat3 ?? '' }}</td>64
                <td>{{ $data->as3 ?? '' }}</td>65
                <td>{{ $data->pisau ?? '' }}</td>66
                <td>{{ $data->citto ?? '' }}</td>67
                <td>{{ $data->emboss ?? '' }}</td>68
                <td>{{ $data->hotprint ?? '' }}</td>69
                <td>{{ $data->note1 ?? '' }}</td>70
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
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
                            <div class="d-flex pb-2">
                                <input type="text" name="search" type="search" class="form-control form-control-sm">
                                <button type="submit" class="btn btn-sm btn-gradient-success ">Search</button>
                            </div>

                        </form>
                        <script>
                            function exportToExcel() {
                                const wb = XLSX.utils.book_new();
                                wb.Props = {
                                    Title: "Data",
                                    Subject: "Data Export",
                                    Author: "Your Name",
                                    CreatedDate: new Date()
                                };
                                wb.SheetNames.push("Data");
                                const ws_data = [];
                                const table = document.getElementById("data-table");
                                const rows = table.getElementsByTagName("tr");
                                for (let i = 0; i < rows.length; i++) {
                                    const row = [], cols = rows[i].querySelectorAll("td, th");
                                    for (let j = 0; j < cols.length; j++) {
                                        let cellData = cols[j].innerText;
                                        // Kolom dengan indeks 1, 2, 3, 4, 10, 11, 13, 17, 31 dianggap sebagai format tanggal
                                        if ([0,1, 2, 3, 9, 10,11,13,17, 31].includes(j)) {
                                            const date = new Date(cellData);
                                            if (!isNaN(date.getTime())) {
                                                cellData = date;
                                            } else {
                                                // Jika format tanggal tidak dapat di-parse, gunakan teks saja
                                                cellData = cellData.trim();
                                            }
                                        }
                                        // Kolom dengan indeks 26 dianggap sebagai format angka
                                        else if ([26].includes(j)) {
                                            cellData = Number(cellData);
                                        }
                                        row.push(cellData);
                                    }
                                    ws_data.push(row);
                                }
                                const ws = XLSX.utils.aoa_to_sheet(ws_data);
                                wb.Sheets["Data"] = ws;
                                const wbout = XLSX.write(wb, { bookType: 'xlsx', type: 'binary' });
                                function s2ab(s) {
                                    const buf = new ArrayBuffer(s.length);
                                    const view = new Uint8Array(buf);
                                    for (let i = 0; i < s.length; i++) view[i] = s.charCodeAt(i) & 0xFF;
                                    return buf;
                                }
        
                                const blob = new Blob([s2ab(wbout)], { type: "application/octet-stream" });
                                const link = document.createElement("a");
                                link.href = URL.createObjectURL(blob);
                                link.download = "DatabaseJOB.xlsx";
                                link.click();
                            }
                        </script>
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
                                                            <a href="/jobapprove" class="dropdown-item ">
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
                                        <th style="font-size: 14px;" scope="col" class="">QTY</th>
                                        <th style="font-size: 14px;" scope="col" class="">DOCKET</th>
                                        <th style="font-size: 14px;" scope="col" class="">PACKAGING</th>
                                        <th style="font-size: 14px;" scope="col" class="">DUE DATE</th>
                                        <th style="font-size: 14px;" scope="col" class=""> 
                                                <div class="dropdown">
                                                    <a class="absolute text-dark text-decoration-none dropdown-toggle"
                                                        href="#" role="button" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        DATE CR
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a href="/kadeptprodev/kadeptlistjob" class="dropdown-item ">
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
                                                            <a href="/kadeptprodev/kadeptlistjob" class="dropdown-item ">
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
                                        <th style="font-size: 14px;" scope="col" class="text-center">NOTE EDIT</th>
                                        <th style="font-size: 14px;" scope="col" class="text-center">NOTE SC</th>
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
                                        <td style="padding-top:2px; padding-bottom:2px;">{{ $data->qty}}</td>
                                        <td style="padding-top:2px; padding-bottom:2px;">{{ $data->designno}}</td>
                                        <td style="padding-top:2px; padding-bottom:2px;" >
                                            <a class="text-primary cursor-pointer"  role="button"  data-bs-toggle="modal" data-bs-target="#packagingModal{{ $data->id }}">
                                                {{ $data->nops}}
                                            </a>
                                        </td>
                                        <td style="padding-top:2px; padding-bottom:2px;">{{ \Carbon\Carbon::parse($data->etauser)->format('j M y')}}</td>
                                        <td style="padding-top:2px; padding-bottom:2px;">{{ \Carbon\Carbon::parse($data->created_at)->format('j M y')}}</td>
                                        <td style="padding-top:2px; padding-bottom:2px;">{{ \Carbon\Carbon::parse($data->updated_at)->format('j M y')}}</td>
                                        <style>
                                          .container {
                                            display: flex;
                                            align-items: center;
                                          }
                                          .content {
                                            display: inline-block;
                                            overflow: hidden;
                                            white-space: nowrap;
                                            text-overflow: ellipsis;
                                            vertical-align: middle;
                                          }
                                          .readMoreButton {
                                            display: inline-block;
                                            vertical-align: middle;
                                            margin-left: 10px; /* Jarak antara teks dan tombol */
                                          }
                                        </style>
                                        <td style="padding-top:2px; padding-bottom:2px;" class="">
                                            <div class="container">
                                                <div class="content" data-full="{{ $data->noteedit }}">
                                                          {{ $data->noteedit }}
                                                </div>
                                                <span class="readMoreButton" style="display: none; cursor:pointer;"><a  class="text-primary" onclick="toggleReadMore(this)">Lihat Selengkapnya</a></span>
                                            </div>
                                        </td>
                                        <td style="padding-top:2px; padding-bottom:2px;">{{ $data->notesc}}</td>

                                        <td style="padding-top: 3px; padding-bottom:3px;" class="d-flex ">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-primary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    Manage
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#exampleModalToggle{{ $data->id }}">Detail</a></li>
                                                    <li><a class="dropdown-item" href="{{ route('kadeptjob.print', $data->id) }}">Print</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
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
        <script>
        function openImageInNewWindow(url) {
            var newWindow = window.open();
            newWindow.document.write('<html><head><style>img{pointer-events:none;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;}</style></head><body><img src="' + url + '" alt="Design Image"></body></html>');
        }
    </script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
function toggleReadMore(button) {
  var content = button.closest('.container').querySelector('.content');
  var isFullText = content.dataset.fulltext === "true";

  if (isFullText) {
    content.textContent = content.dataset.truncated + '...';
    content.dataset.fulltext = "false";
    button.innerHTML = "Lihat Selengkapnya";
  } else {
    content.textContent = content.dataset.full;
    content.dataset.fulltext = "true";
    button.innerHTML = "Sembunyikan";
  }
}

window.onload = function() {
  var contents = document.querySelectorAll('.content');
  var buttons = document.querySelectorAll('.readMoreButton');

  contents.forEach(function(content, index) {
    var text = content.dataset.full;
    var truncatedText = text.slice(0, 10);

    if (text.length > 10) {
      content.textContent = truncatedText + '...';
      content.dataset.truncated = truncatedText;
      content.dataset.fulltext = "false";
      buttons[index].style.display = "inline";
    } else {
      content.textContent = text;
    }
  });
}
</script>




@endsection
