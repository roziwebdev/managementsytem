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
    @foreach ( $salescontract as $data )
    <div class="modal fade" id="exampleModalToggle{{ $data->id }}" aria-hidden="true"
        aria-labelledby="exampleModalToggleLabel{{ $data->id }}" tabindex="-1">
        <div class="modal-dialog modal-xl modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header pt-3 pb-0 mb-0">
                    <div class="text-center container-xl pb-0 mb-0">
                        <h1 class="text-center modal-title" style="font-size: 25px"
                            id="exampleModalToggleLabel{{ $data->id }}">SALES CONTRACT</h1>
                    </div>
                    <button type="button" class="float-end btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-2">
                    <div class="">
                        <div class="border shadow border-secondary rounded" style="background:#F0F0F0">
                            <div class="container">
                                <div class="">
                                    <p style="font-size:18px" class="fw-bold py-2 mb-1">Sales Contract - {{ $data->id }} / Quotation - {{$data->idquotation}}
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
                                <div class="container-xl border" style="height:500px">
                                    <div class="py-4">
                                        <div class="border shadow-sm " style="height:450px; overflow:auto" >
                                            <table class="table table1 table-bordered border-secondary">
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
                                                        <td class="col-sm-8">Rp. {{  number_format(floatval(str_replace(',', '.', $datas[8])), 1, ',', '.') }}</td>
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
                                                        <td class="col-sm-8">
                                                            <a style="text-decoration:none;" href="/manager/sales/{{$datas[17]}}">
                                                                {{ $datas[17] }}
                                                            </a>
                                                        </td>
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
                        <div class="py-3">
                            @if ($data->statussc == 'Approve')
                            {{-- Cek status sebelumnya --}}
                            <form action="{{ route('update_statussc', $data->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="d-flex">
                                    <div class="px-2">
                                        <label class="btn btn-danger btn-sm ">
                                            <input type="radio" value="Declined" id="newStatus" name="newStatus" />
                                            Declined
                                        </label>
                                    </div>
                                </div>
                                <div class="float-end py-5">
                                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
                                </div>
                            </form>
                            
                            @elseif ($data->statussc == 'Declined')
                            {{-- Cek status sebelumnya --}}
                            <p>SC sudah Approve/Declined sebelumnya.</p>
                            @else
                            <form action="{{ route('update_statussc', $data->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="d-flex">
                                    {{-- Radio buttons untuk mengubah status --}}
                                    <div>
                                        <label class="btn btn-success btn-sm">
                                            <input type="radio" value="Approve" id="newStatus"
                                                name="newStatus">
                                            Approve
                                        </label>
                                    </div>
                                    <div class="px-2">
                                        <label class="btn btn-danger btn-sm ">
                                            <input type="radio" value="Declined" id="newStatus" name="newStatus" />
                                            Declined
                                        </label>
                                    </div>
                                </div>
                                <div class="float-end py-5">
                                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
                                </div>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    

        
    <div class=" content-wrapper px-2" style="background-color: #f6f6fb">
        <div class="row" id='row'>
            <div class="">
                <div class="shadow card rounded-xl">
                    <div class="border shadow card-body">
                        <div class="custom-fonth3">
                            
                        <h3 class="pb-3 text-center">SALES CONTRACT</h3>
                        </div>
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
                                td{
                                    background-color: #ffffff;
                                }
                                .bg-hover:hover {
                                    background-color: #dee2e6; /* Warna latar belakang yang diinginkan saat hover */
                                    cursor:pointer;
                                }
                                    .ellipsis {
                                    white-space: nowrap;
                                    overflow: hidden;
                                    text-overflow: ellipsis;
                                    max-width: 30ch; /* Atau sesuaikan dengan ukuran yang Anda inginkan */
                                }
                            </style>
                            <table class="table" id="myTable">
                                <thead>
                                    <tr style="background-color: #f1f1f6" class="custom-table">
                                        <th style="font-size: ; width:20px;" scope="col" class="sticky">
                                            <div class="dropdown">
                                                <a class="absolute text-dark text-decoration-none dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    SC
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="/manager/sales" class="dropdown-item ">
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
                                        <th style="font-size: ;" scope="col">STS</th>
                                        <th style="font-size: ;" scope="col">PRODUCT</th>
                                        <th style="font-size: ;" scope="col">CUSTOMER</th>
                                        <th style="font-size: ;" scope="col" class="">TENDER</th>
                                        <th style="font-size: ;" scope="col" class="">FILE PO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($salescontract as $data)
                                    @php
                                    $statussc = json_decode($data->statusproduct, true);
                                    $products = json_decode($data->product, true);
                                    $referensis = json_decode($data->referensi, true);
                                    // Mengambil item pertama dari masing-masing kolom
                                    $firstStatus = reset($statussc);
                                    $firstProduct = reset($products);
                                    $firstReferensi = reset($referensis);
                                    @endphp
                                    <tr class="bg-hover custom-table">
                                        <td href="" data-bs-toggle="modal" data-bs-target="#exampleModalToggle{{ $data->id }}" style=""
                                            scope="col" class="sticky"
                                            @if ($data->statussc == 'Waiting')
                                            class="fw-bold sticky"
                                            @elseif($data->statussc == "Approve")
                                            class="sticky"
                                            @endif
                                        >
                                        {{ $data->id}}
                                        </td>
                                         <td style="padding-top:2px; padding-bottom:2px;">
                                            @if ($data->statussc == 'Approve')
                                                <span class="material-symbols-outlined text-success" style='font-size:'>
                                                    check_circle
                                                </span>
                                            @elseif ($data->statussc == 'Waiting')
                                                <span class="material-symbols-outlined text-warning" style='font-size:'>
                                                    hourglass_top
                                                </span>
                                            @elseif ($data->statussc == 'Declined')
                                                <span class="material-symbols-outlined text-danger" style='font-size:'>
                                                    cancel
                                                </span>
                                            @endif
                                        </td>
                                        <td href="" data-bs-toggle="modal" data-bs-target="#exampleModalToggle{{ $data->id }}" style="padding-top:2px; padding-bottom:2px;"
                                        @if ($data->statussc == 'Waiting')
                                        class="fw-bold"
                                        @endif
                                        >{{ $firstProduct}}</td>
                                        
                                        <td href="" data-bs-toggle="modal" data-bs-target="#exampleModalToggle{{ $data->id }}" style="padding-top:2px; padding-bottom:2px;"
                                        @if ($data->statussc == 'Waiting')
                                        class="fw-bold"
                                        @endif
                                        >{{ $data->customer}}</td>
                                        <td   style="padding-top:2px; padding-bottom:2px;"
                                        @if ($data->statussc == 'Waiting')
                                        class="fw-bold"
                                        @endif
                                        >
                                        <a href="/tendermgr/byref/{{$firstReferensi}}">
                                            {{ $data->tender}}
                                        </a>
                                        </td>
                                        <td style="padding-top:2px; padding-bottom:2px; " class="">
                                            <a href="{{ asset('storage/path/to/your/image/' . $data->filepo) }}" target="_blank">
                                                @if($data->filepo)
                                                <span class="material-symbols-outlined text-primary">
                                                @else
                                                <span class="material-symbols-outlined text-dark">
                                                @endif
                                                    description
                                                </span>    
                                            </a>
                                        </td>
                                        

                                       
                                        <!--<td style="padding-top: 3px; padding-bottom:3px;" class="d-flex ">-->
                                        <!--    <div class="dropdown">-->
                                        <!--        <a class="btn btn-sm btn-primary dropdown-toggle" href="#" role="button"-->
                                        <!--            data-bs-toggle="dropdown" aria-expanded="false">-->
                                        <!--            Manage-->
                                        <!--        </a>-->
                                        <!--        <ul class="dropdown-menu">-->
                                        <!--            <li>-->
                                        <!--            <button class="dropdown-item" data-bs-toggle="modal"-->
                                        <!--                data-bs-target="#editStatusModal{{ $data->id }}">Approve-->
                                        <!--            </button>-->
                                        <!--            </li>-->
                                        <!--            <li><a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#exampleModalToggle{{ $data->id }}">Detail</a></li>-->
                                        <!--        </ul>-->
                                        <!--    </div>-->
                                        <!--</td>-->
                                    </tr>
                                    <div class="modal fade" id="exampleModalToggle{{ $data->id }}" aria-hidden="true"
                                        aria-labelledby="exampleModalToggleLabel{{ $data->id }}" tabindex="-1">
                                        @include('role.sales.salesdept.salescontract.show', ['details' => $data])
                                    </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-2">
                            {{ $salescontract->appends(request()->query())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Get the table element by its ID
        var table = document.getElementById("myTable");

        // Get all cells in the table body
        var cells = table.getElementsByTagName("tbody")[0].getElementsByTagName("td");

        // Add a click event listener to each cell
        for (var i = 0; i < cells.length; i++) {
            // Check if the cell has a data-href attribute
            var link = cells[i].getAttribute("data-href");
            
            if (link) {
                // Add click event listener only to cells with data-href attribute
                cells[i].addEventListener("click", function () {
                    // Get the data-href attribute value
                    var link = this.getAttribute("data-href");

                    // Navigate to the link in the same tab
                    window.location.href = link;
                });
            }
        }
    });
</script>









    @endsection
