@extends('role.purchasing.layoutsmrmanager.main')
@section('main-container')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
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
        .custom-font  {
            font-size: 0.8rem; /* Ukuran font standar */
        }
        
        /* CSS khusus untuk layar kecil */
        @media (max-width: 576px) {
            .custom-font {
                font-size: 0.75rem; /* Ukuran font lebih kecil untuk layar kecil */
            }
        }
    
       .custom-row td {
            font-size: 0.8rem; /* Ukuran font standar */
            padding-top: 0.5rem; /* Padding atas standar */
            padding-bottom: 0.5rem; /* Padding bawah standar */
        }
        
        /* CSS khusus untuk layar kecil */
        @media (max-width: 576px) {
            .custom-row td {
                font-size: 0.75rem; /* Ukuran font lebih kecil untuk layar kecil */
                padding-top: 0.2rem; /* Padding atas lebih kecil untuk layar kecil */
                padding-bottom: 0.2rem; /* Padding bawah lebih kecil untuk layar kecil */
            }
        }
        
        .custom-table th,
        .custom-table span,
        .custom-table td {
            font-size: 1rem; /* Ukuran font standar */
            padding-top: 0.5rem; /* Padding atas standar */
            padding-bottom: 0.5rem; /* Padding bawah standar */
        }
        
        /* CSS khusus untuk layar kecil */
        @media (max-width: 576px) {
            .custom-table th ,
            .custom-table span ,
            .custom-table td  {
                font-size: 0.7rem; /* Ukuran font lebih kecil untuk layar kecil */
                padding-top: 0.3rem; /* Padding atas lebih kecil untuk layar kecil */
                padding-bottom: 0.3rem; /* Padding bawah lebih kecil untuk layar kecil */
            }
        }
        
            .custom-fonth3 h3{
                font-size: 1.5rem; /* Ukuran font lebih kecil untuk layar kecil */
            }
        @media (max-width: 576px) {
            .custom-fonth3 h3{
                font-size: 1rem; /* Ukuran font lebih kecil untuk layar kecil */
            }
        }
    </style>
<div class="main-panel">

    <div>
        <div class="">
            <div class="">
                <div class="modal-header pt-3 pb-0 mb-0">
                    <div class="text-center container-xl pb-0 mb-0">
                        <h1 class="text-center modal-title" style="font-size: 25px"
                            id="exampleModalToggleLabel{{ $data->id }}">SALES CONTRACT</h1>
                    </div>
                </div>
                <div class="modal-body pb-2">
                    
                    <div class="">
                        <div class="border shadow border-secondary rounded" style="background:#F0F0F0">
                            <div class="container">
                                <div class="">
                                    <p style="font-size:18px" class="fw-bold py-2 mb-1">Sales Contract - {{ $data->id }} / Quotation {{$data->idquotation}} - 
                                    </p>
                                </div>
                                <div class="row">
                                    <div class="col-lg">
                                        <p style="" class="mb-1 custom-font"><span style="font-weight: 600">Purchase Order
                                                &nbsp;&nbsp;&nbsp;&nbsp;:</span>
                                            <a href="{{ asset('storage/path/to/your/image/' . $data->filepo) }}" target="_blank" style="text-decoration:none;">
                                                {{ $data->po }}
                                            </a>
                                        </p>
                                        <p  class="mb-1 custom-font"><span style="font-weight: 600">PO Date
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                :
                                            </span>{{
                                            \Carbon\Carbon::parse($data->tanggalpo)->format('j M y')}}</p>
                                        <p  class="mb-1 custom-font"><span style="font-weight: 600">SC Date
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                :
                                            </span>{{ 
                                            \Carbon\Carbon::parse($data->created_at)->format('j M y')}}</p>
                                    </div>
                                    <div class="col-lg">
                                        <p  class="mb-1 custom-font"><span style="font-weight: 600">Customer
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span>
                                            {{ $data->customer }}</p>
                                        <p  class="mb-1 custom-font"><span style="font-weight: 600">Client
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span>
                                            {{ $data->up }}</p>
                                        <p  class="mb-1 custom-font"><span style="font-weight: 600">Sales
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span>
                                            {{ $data->sellerowner }}</p>
                                    </div>
                                    <div class="col-lg">
                                        <p class="mb-1 custom-font"><span style="font-weight: 600">Plant&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</span>
                                            {{ $data->plantcode }}</p>

                                    </div>
                                    
                                </div>
                            </div>
                            <div class="border border-black" style="background: rgb(255, 255, 255)">
                                <div class=" border" style="height:500px">
                                    <div class="py-4">
                                        <div class="border shadow-sm " style="height:450px; overflow:auto" >
                                            <table class="table  table-bordered border-secondary">
                                                <thead class="">
                                                    <tr style="background:#F0F0F0; top:10px" class="">
                                                        <th class="pt-2 pb-2 col-sm-4 fw-bold custom-font">Information</th>
                                                        <th class="pt-2 pb-2 col-sm-8 fw-bold custom-font">Value</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $products = json_decode($data->product);
                                                        $saps = json_decode($data->sap);
                                                        $materials = json_decode($data->material);
                                                        $sizes = json_decode($data->size);
                                                        $finishings = json_decode($data->finishing);
                                                        $specs = json_decode($data->specs);
                                                        $qtys = json_decode($data->qty);
                                                        $units = json_decode($data->unit);
                                                        $prices = json_decode($data->price);
                                                        $totals = json_decode($data->total);
                                                        $etausers = json_decode($data->etauser);
                                                        $toleransis = json_decode($data->toleransi);
                                                        $notessc = json_decode($data->notesc);
                                                        $statusproduct = json_decode($data->statusproduct);
                                                        $lastqtys = json_decode($data->lastqty);
                                                        $lastprices = json_decode($data->lastprice);
                                                        $lastorders = json_decode($data->lastorder);
                                                        $lastscs = json_decode($data->lastsc);
                                                        $combinedData = array_map(null,$products,$saps,$materials,$sizes,$finishings,$specs,$qtys,$units,$prices,$totals,$etausers,$toleransis,$notessc,$statusproduct,$lastqtys,$lastprices,$lastorders,$lastscs);
                                                    @endphp
                                                    @foreach ($combinedData as $index => $datas)
                                                    
                                                    <tr class="table-secondary custom-row">
                                                        <td class="fst-italic font-weight-bold" colspan="2">Product {{ $index +1 }}</td>
                                                    </tr>
                                                    <tr class="custom-row">
                                                        <td class="col-sm-4">Product</td>
                                                        <td class="col-sm-8">{{ $datas[0] }}</td>
                                                    </tr>
                                                    <tr class="custom-row">
                                                        <td class="col-sm-4">SAP</td>
                                                        <td class="col-sm-8">{{ $datas[1] }}</td>
                                                    </tr>
                                                    <tr class="custom-row">
                                                        <td class="col-sm-4">Material</td>
                                                        <td class="col-sm-8">{{ $datas[2] }}</td>
                                                    </tr>
                                                    <tr class="custom-row">
                                                        <td class="col-sm-4">Size</td>
                                                        <td class="col-sm-8">{{ $datas[3] }}</td>
                                                    </tr>
                                                    <tr class="custom-row">
                                                        <td class="col-sm-4">Finishing</td>
                                                        <td class="col-sm-8">{{ $datas[4] }}</td>
                                                    </tr>
                                                    <tr class="custom-row">
                                                        <td class="col-sm-4">Specs</td>
                                                        <td class="col-sm-8">{{ $datas[5] }}</td>
                                                    </tr>
                                                    <tr class="custom-row">
                                                        <td class="col-sm-4">Quantity</td>
                                                        <td class="col-sm-8">{{ '' . number_format(floatval(str_replace(',', '.', $datas[6])), 0, ',', '.') }}</td>
                                                    </tr>
                                                    <tr class="custom-row">
                                                        <td class="col-sm-4">Unit</td>
                                                        <td class="col-sm-8">{{ $datas[7] }}</td>
                                                    </tr>
                                                    <tr class="custom-row">
                                                        <td class="col-sm-4">Price</td>
                                                        <td class="col-sm-8">Rp. {{ '' . number_format(floatval(str_replace(',', '.', $datas[8])), 0, ',', '.') }}</td>
                                                    </tr>
                                                    <tr class="custom-row">
                                                        <td class="col-sm-4">Total Price</td>
                                                        <td class="col-sm-8">Rp. {{ '' . number_format(floatval(str_replace(',', '.', $datas[9])), 0, ',', '.') }}</td>
                                                    </tr>
                                                     <tr class="custom-row">
                                                        <td class="col-sm-4">Eta User</td>
                                                        <td class="col-sm-8">{{ \Carbon\Carbon::parse($datas[10])->format('j M y') }}</td>
                                                    </tr>
                                                    <tr class="custom-row">
                                                        <td class="col-sm-4">Toleransi</td>
                                                        <td class="col-sm-8">{{ $datas[11] }}</td>
                                                    </tr>
                                                    <tr class="custom-row">
                                                        <td class="col-sm-4">Note</td>
                                                        <td class="col-sm-8">{{ $data->noteeksternal }}</td>
                                                    </tr>
                                                    <tr class="custom-row">
                                                        <td class="col-sm-4">Status</td>
                                                        <td class="col-sm-8">{{ $datas[13] }}</td>
                                                    </tr>
                                                     <tr class="table-secondary custom-row">
                                                        <td class="fst-italic font-weight-bold" colspan="2">Last Order</td>
                                                    </tr>
                                                    <tr class="custom-row">
                                                        <td class="col-sm-4">Last SC</td>
                                                        <td class="col-sm-8">{{ $datas[17] }}</td>
                                                    </tr>
                                                    <tr class="custom-row">
                                                        <td class="col-sm-4">Last QTY</td>
                                                        <td class="col-sm-8">{{ '' . number_format(floatval(str_replace(',', '.', $datas[14])), 0, ',', '.') }}</td>
                                                    </tr>
                                                    <tr class="custom-row">
                                                        <td class="col-sm-4">Last Price</td>
                                                        <td class="col-sm-8">Rp. {{ '' . number_format(floatval(str_replace(',', '.', $datas[15])), 0, ',', '.') }}</td>
                                                    </tr>
                                                    <tr class="custom-row">
                                                        <td class="col-sm-4">Last Date</td>
                                                        @if(!$datas[16])
                                                        <td class="col-sm-8"></td>
                                                        @else
                                                        <td class="col-sm-8">{{ \Carbon\Carbon::parse($datas[16])->format('j M y') }}</td>
                                                        @endif
                                                    </tr>
                                                    @endforeach
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
    </div>
    </div>
    @endsection