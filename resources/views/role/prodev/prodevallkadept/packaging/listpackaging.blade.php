@extends('role.purchasing.layoutmrkadept.main')
@section('main-container')

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/datalist-polyfill@1.23.0/dist/datalist-polyfill.min.js"></script>
<div class="main-panel">
    <div class=" content-wrapper" style="background-color: #f6f6fb">

        <style>
            #myForm {
                display: none;
            }
        </style> 
        
        
    @foreach ( $packagings as $data )
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
                                        <p style="font-size:18px" class="fw-bold py-2 mb-1">NO PN - {{ $data->pn }}</p>
                               
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
                                                            <td class="pt-2 pb-2 col-sm-8">{{ $data->estimasipackaging }} </td>
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
                                                            <td class="pt-2 pb-2 col-sm-8">P {{ $data->boxdalampanjang }} X L {{$data->boxdalamlebar}} X T {{$data->boxdalamtinggi}}  MM</td>
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
        

        <div class="row" id='row'>
            <div class="">
                <div class="shadow card rounded-xl">
                    <div class="border shadow card-body">
                        <h3 class="pb-3 text-center">PACKAGING LIST</h3>
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
                                        <th style="font-size: 14px; width:20px;" scope="col" class="sticky">PN</th>
                                        <th style="font-size: 14px;" scope="col" class="">DOCKET</th>
                                        <th style="font-size: 14px;" scope="col" class="">PRODUCT</th>
                                        <th style="font-size: 14px;" scope="col" class="">SAP</th>
                                        <th style="font-size: 14px;" scope="col" class="">NW @PCS (Gr)</th>
                                        <th style="font-size: 14px;" scope="col" class="">ISI @BOX</th>
                                        <th style="font-size: 14px;" scope="col" class="">NW @BOX (Kg)</th>
                                        <th style="font-size: 14px;" scope="col" class="">BOX NAME</th>
                                        <th style="font-size: 14px;" scope="col" class="">BOX SPECS</th>
                                        <th style="font-size: 14px;" scope="col" class="">BOX SIZE</th>
                                        <th style="font-size: 14px;" scope="col" class="">EFFECTIVE DATE</th>
                                        <th style="font-size: 14px;" scope="col" class="">STATUS</th>
                                        <th style="font-size: 14px;" scope="col" class="">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($packagings as $packaging )
                                    <tr>
                                        <td style="font-size: 14px; padding-top:2px; padding-bottom:2px;" scope="col" class="sticky">{{ $packaging->pn }}</td>
                                        <td style="font-size: 14px; padding-top:2px; padding-bottom:2px;">{{ $packaging->designno }}</td>
                                        <td style="font-size: 14px; padding-top:2px; padding-bottom:2px;">{{ $packaging->product }}</td>
                                        <td style="font-size: 14px; padding-top:2px; padding-bottom:2px;">{{ $packaging->sap }}</td>
                                        <td style="font-size: 14px; padding-top:2px; padding-bottom:2px;">{{ $packaging->nwpcs }}</td>
                                        <td style="font-size: 14px; padding-top:2px; padding-bottom:2px;">{{ $packaging->isibox }}</td>
                                        <td style="font-size: 14px; padding-top:2px; padding-bottom:2px;">{{ $packaging->boxkg }}</td>
                                        <td style="font-size: 14px; padding-top:2px; padding-bottom:2px;">{{ $packaging->boxname }}</td>
                                        <td style="font-size: 14px; padding-top:2px; padding-bottom:2px;">{{ $packaging->boxspecs }}</td>
                                        <td style="font-size: 14px; padding-top:2px; padding-bottom:2px;">{{ $packaging->boxsize }}</td>
                                        <td style="font-size: 14px; padding-top:2px; padding-bottom:2px;">{{ $packaging->effective }}</td>
                                        <td style="font-size: 14px; padding-top:2px; padding-bottom:2px;">{{ $packaging->status }}</td>
                                        <td style="font-size: 14px; padding-top:2px; padding-bottom:2px;" class="d-flex">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-primary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    Manage
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item" href="" data-bs-toggle="modal"data-bs-target="#packagingModal{{ $packaging->id }}">Detail</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="pt-4">
                            {{ $packagings->appends(request()->query())->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>





    @endsection