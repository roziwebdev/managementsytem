@extends('role.purchasing.layoutsmrdept.main')
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
    </style>
<div class="main-panel">
    @foreach ( $salescontract as $data )
    <div class="modal fade" id="exampleModalToggle{{ $data->id }}" aria-hidden="true"
        aria-labelledby="exampleModalToggleLabel{{ $data->id }}" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header pt-1 pb-0 mb-0">
                    <div class="text-center container-xl pb-0 mb-0">
                        <h1 class="text-center modal-title" style="font-size: 25px"
                            id="exampleModalToggleLabel{{ $data->id }}">SALES CONTRACT</h1>
                    </div>
                    <button type="button" class="float-end btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-4">
                    <div class="container-xl">
                        <div class="border shadow border-secondary" style="background:#F0F0F0">
                            <div class="container">
                                <div class="">
                                    <p style="font-size:18px" class="fw-bold py-2 mb-1">Sales Contract - {{ $data->id }}
                                    </p>
                                </div>
                                <div class="row">
                                    <div class="col-lg">
                                        <p style="font-size:14px" class="mb-1"><span style="font-weight: 600">Purchase Order
                                                &nbsp;&nbsp;&nbsp;&nbsp;:</span>
                                            <a href="{{ asset('storage/path/to/your/image/' . $data->filepo) }}" target="_blank" style="text-decoration:none;">
                                                {{ $data->po }}
                                            </a>
                                        </p>
                                        <p style="font-size:14px" class="mb-1"><span style="font-weight: 600">PO Date
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                :
                                            </span>{{
                                            \Carbon\Carbon::parse($data->tanggalpo)->format('j M y')}}</p>
                                        <p style="font-size:14px" class="mb-1"><span style="font-weight: 600">SC Date
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                :
                                            </span>{{
                                            \Carbon\Carbon::parse($data->created_at)->format('j M y')}}</p>
                                    </div>
                                    <div class="col-lg">
                                        <p style="font-size:14px" class="mb-1"><span style="font-weight: 600">Customer
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span>
                                            {{ $data->customer }}</p>
                                        <p style="font-size:14px" class="mb-1"><span style="font-weight: 600">Client
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span>
                                            {{ $data->up }}</p>
                                        <p style="font-size:14px" class="mb-1"><span style="font-weight: 600">Sales
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span>
                                            {{ $data->sellerowner }}</p>
                                    </div>
                                    <div class="col-lg">
                                        <p style="font-size:14px" class="mb-1"><span style="font-weight: 600">S-Code
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</span>
                                            {{ $data->scode }}</p>
                                        <p style="font-size:14px" class="mb-1"><span style="font-weight: 600">Plant
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span>
                                            {{ $data->plantcode }}</p>
                                        <p style="font-size:14px" class="mb-1"><span style="font-weight: 600">Address
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span>
                                            {{ $data->address }}</p>
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
                                                        <th class="pt-2 pb-2 col-sm-4 fw-bold">Information (Product, Specs,
                                                            Price)</th>
                                                        <th class="pt-2 pb-2 col-sm-8 fw-bold">Value</th>
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
                                                        $combinedData =
                                                        array_map(null,$products,$saps,$materials,$sizes,$finishings,$specs,$qtys,$units,$prices,$totals,$etausers,$toleransis,$notessc,
                                                        $statusproduct);
                                                    @endphp

                                                    @foreach ($combinedData as $index => $data)

                                                    <tr style="" class="table-secondary">
                                                        <td class="pt-2 pb-2 fst-italic" style="font-weight: 600"
                                                            colspan="2">Product {{ $index +1 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">Product </td>
                                                        <td class="pt-2 pb-2 col-sm-8">{{ $data[0]}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">SAP </td>
                                                        <td class="pt-2 pb-2 col-sm-8">{{ $data[1]}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">Material </td>
                                                        <td class="pt-2 pb-2 col-sm-8">{{ $data[2]}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">Size </td>
                                                        <td class="pt-2 pb-2 col-sm-8">{{ $data[3]}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">Finishing </td>
                                                        <td class="pt-2 pb-2 col-sm-8">{{ $data[4]}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">Specs </td>
                                                        <td class="pt-2 pb-2 col-sm-8">{{ $data[5]}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">Quantity </td>
                                                        <td class="pt-2 pb-2 col-sm-8">{{ '' . number_format(floatval(str_replace(',', '.', $data[6])), 0, ',', '.') }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">Unit </td>
                                                        <td class="pt-2 pb-2 col-sm-8">{{ $data[7]}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">Price </td>
                                                        <td class="pt-2 pb-2 col-sm-8">Rp. {{
                    number_format(
                        floatval(
                            str_replace(',', '.', $data[8])
                        ),
                        1, ',', '.'
                    )
                }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">Total Price </td>
                                                        <td class="pt-2 pb-2 col-sm-8">Rp. {{ '' . number_format(floatval(str_replace(',', '.', $data[9])), 0, ',', '.') }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">Eta User </td>
                                                        <td class="pt-2 pb-2 col-sm-8">{{
                                                        \Carbon\Carbon::parse($data[10])->format('j M y')}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">Toleransi </td>
                                                        <td class="pt-2 pb-2 col-sm-8">{{ $data[11]}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">Note</td>
                                                        <td class="pt-2 pb-2 col-sm-8">{{ $data[12]}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">Status</td>
                                                        <td class="pt-2 pb-2 col-sm-8">{{ $data[13]}}</td>
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
    @endforeach
    <div class=" content-wrapper" style="background-color: #f6f6fb">
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
        <div id="myButton" class="py-2 justify-content-end d-flex">
            <button class="btn btn-info">Add SC</button>
        </div>
        <div class="row" id='row'>
            <div class="col-12 stretch-card grid-margin" id="myForm">
                <div class="mt-2 row" style="background-color: ">
                    <div class="mb-3 col-md">
                        <label for="" class="form-label fw-bold ">Preview</label>
                        <input class="form-control " id="inputpreview" />
                    </div>
                </div>
                <div class="border rounded card">
                    <div class="border rounded shadow card-body">
                        <h4 class="mb-3 card-title">Form New SC</h4>
                        <form class="form-sample" method="POST" action="{{ route('salesdept.store') }}" enctype="multipart/form-data" id="imageForm">
                            @csrf
                            <div class="shadow">
                                <div class="row " style="background-color: #f1f1f6">
                                    <div class="mt-3 col-md">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">PO</label>
                                            <input type="text" class="form-control form-control-sm clickable" name="po" required>
                                            <input type="hidden" class="form-control form-control-sm clickable" name="statussc" value="Waiting" required>
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold ">Tanggal PO</label>
                                            <input type="date" class="form-control form-control-sm clickable" name="tanggalpo"
                                                placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold ">S-code</label>
                                            <input type="text" class="form-control form-control-sm clickable " name="scode"
                                                placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md">
                                            <div class="mb-3" style="font-size: 14px">
                                                <label for="" class="form-label fw-bold ">Sales</label>
                                                <select class="form-select" name="sellerowner">
                                                    <option value="ROZI">Rozi</option>
                                                </select>
                                            </div>
                                        </div>
                                </div>
                                <div class="row" style="background-color: #f1f1f6">
                                    <div class="mt-3 col-md">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold ">Customer</label>
                                            <input type="text" id="input1" class="form-control form-control-sm clickable " name="customer"
                                                placeholder="" required list="listcust">
                                                <datalist id="listcust">
                                                    @foreach ($cust as $data )
                                                        <option>{{ $data->customer }}</option>
                                                    @endforeach
                                                </datalist>
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold ">Up</label>
                                            <input type="text" class="form-control form-control-sm clickable " name="up"  id="input2"
                                                placeholder="" required>
                                        </div>
                                    </div>
                                    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                                    <script>
                                        $(document).ready(function () {
                                            // Fungsi yang dipanggil saat nilai input pertama berubah
                                            $('#input1').change(function () {
                                                // Mendapatkan nilai yang dipilih pada input pertama
                                                var selectedCustomer = $(this).val();
        
                                                // Melakukan Ajax request ke server untuk mendapatkan data client dan address berdasarkan namacustomer
                                                $.ajax({
                                                    type: 'GET',
                                                    url: '/get-customer-datacust/' + selectedCustomer, // Gantilah dengan URL endpoint yang sesuai di Laravel
                                                    success: function (data) {
                                                        // Mengisi nilai pada input kedua dan ketiga
                                                        $('#input2').val(data.up);
                                                    },
                                                    error: function () {
                                                        alert('Gagal mengambil data customer.');
                                                    }
                                                });
                                            });
                                        });
                                    </script>
                                    <div class="mt-3 col-md">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold ">Plant</label>
                                            <input type="text" class="form-control form-control-sm clickable" id="inputplant" name="plantcode"
                                            placeholder="" required list='listplant'>
                                            <datalist id="listplant">
                                                @foreach ($plants as $data )
                                                    <option>{{ $data->plant }}</option>
                                                @endforeach
                                            </datalist>
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold ">Address</label>
                                            <input type="text" class="form-control form-control-sm clickable " id="getplant" name="address"
                                            placeholder="" required>
                                            <input type="hidden" class="form-control form-control-sm clickable " id="getId" name="idplant[]"
                                            placeholder="" >
                                        </div>
                                    </div>
                                    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                                    <script>
                                        $(document).ready(function () {
                                            // Fungsi yang dipanggil saat nilai input pertama berubah
                                            $('#inputplant').change(function () {
                                                // Mendapatkan nilai yang dipilih pada input pertama
                                                var selectedPlant = $(this).val();
        
                                                // Melakukan Ajax request ke server untuk mendapatkan data client dan address berdasarkan namacustomer
                                                $.ajax({
                                                    type: 'GET',
                                                    url: '/get-customer-dataplant/' + selectedPlant, // Gantilah dengan URL endpoint yang sesuai di Laravel
                                                    success: function (data) {
                                                        // Mengisi nilai pada input kedua dan ketiga
                                                        $('#getplant').val(data.address);
                                                        $('#getId').val(data.id);
                                                    },
                                                    error: function () {
                                                        alert('Gagal mengambil data customer.');
                                                    }
                                                });
                                            });
                                        });
                                    </script>
                                </div>
                                <div class="row" style="background-color: #f1f1f6">
                                        <div class="mt-3 col-md ">
                                            <div class="mb-3" style="font-size: 14px">
                                                <label for="" class="form-label fw-bold">Ket Pembayaran</label>
                                                <input list="ketpem"  name="keteranganpembayaran"  type="text" class="form-control form-control-sm clickable" required>
                                                <datalist id="ketpem">
                                                    <option value="Syarat pembayaran 30 hari setelah tukar faktur">Syarat pembayaran 30 hari setelah tukar faktur</option>
                                                </datalist>
                                            </div>
                                        </div>
                                        <div class="mt-3 col-md ">
                                            <div class="mb-3" style="font-size: 14px">
                                                <label for="" class="form-label fw-bold">Note Internal</label>
                                                <input name="noteeksternal"  type="text" class="form-control form-control-sm clickable">
                                            </div>
                                        </div>
                                        <div class="mt-3 col-md ">
                                            <div class="mb-3" style="font-size: 14px">
                                                <label for="" class="form-label fw-bold">Ket CS</label>
                                                <input list="cs"  name="etapilihan"  type="text" class="form-control form-control-sm clickable">
                                                <datalist id="cs">
                                                    <option value="(Tanggal tersebut perlu dikonfirmasi Customer Support)">(Tanggal tersebut perlu dikonfirmasi Customer Support)</option>
                                                </datalist>
                                            </div>
                                        </div>
                                    </div>
                                <div class="row stretch-card grid-margin" style="background-color: #f1f1f6">
                                        
                                        <div class="mt-3 col-md ">
                                            <div class="mb-3" style="font-size: 14px">
                                                <label for="" class="form-label fw-bold">Tender</label>
                                                <input list="tender"  name="tender"  type="text" class="form-control form-control-sm clickable">
                                                <datalist id="tender">
                                                    @php
                                                        $uniqueTenders = $tenders->unique('namatender');
                                                    @endphp
                                                    
                                                    @foreach($uniqueTenders as $tender)
                                                        <option value="{{$tender->namatender}}"></option>
                                                    @endforeach
                                                </datalist>
                                            </div>
                                        </div>
                                        <div class="mt-3 col-md ">
                                            <div class="mb-3" style="font-size: 14px">
                                                <label for="" class="form-label fw-bold">File PO</label>
                                                <input id="" name="filepo"  type="file" class="form-control form-control-md clickable" required>
                                            </div>
                                        </div>
                                        <div class="mt-3 col-md ">
                                            <div class="mb-3" style="font-size: 14px">
                                                <label for="" class="form-label fw-bold">File Hitungan</label>
                                                <input id="" name="filehitunganharga"  type="file" class="form-control form-control-md clickable" >
                                            </div>
                                        </div>
                                        <div class="mt-3 col-md ">
                                            <div class="mb-3" style="font-size: 14px">
                                                <label for="" class="form-label fw-bold">File PO No Price</label>
                                                <style>
                                                  #canvas {
                                                       border: 1px solid white;
                                                    max-width:100%;
                                                  }
                                                  #pasteArea{
                                                      height:100px;
                                                  }
                                                </style>
                                                <input id="upload" name="fileponoprice"  type="file" class="form-control form-control-md clickable" required>
                                                <input type="hidden" name="canvasImage" id="canvasImage" />
                                                <!-- Button trigger modal -->
                                                <div class="py-2">
                                                    <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                        Edit Image
                                                    </button>
                                                </div>
                                                <!-- Modal -->
                                                 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Image</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body justify-content-center text-center align-items-center">
                                                                <canvas id="canvas" width="1000" height="500"></canvas>
                                                                <div id="pasteArea" contenteditable="true">Tempel gambar di sini</div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="button" class="btn btn-primary" id="saveChangesBtn">Save changes</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                              
                                                <script>
                                                const upload = document.getElementById("upload");
                                                const canvas = document.getElementById("canvas");
                                                const ctx = canvas.getContext("2d");
                                                const saveChangesBtn = document.getElementById("saveChangesBtn");
                                                const canvasImageInput = document.getElementById("canvasImage");
                                                const pasteArea = document.getElementById("pasteArea");
                                        
                                                let img = null;
                                                let startX, startY, endX, endY;
                                                let isDragging = false;
                                                const boxes = [];
                                        
                                                upload.addEventListener("change", function (event) {
                                                    const file = event.target.files[0];
                                                    if (file) {
                                                        const reader = new FileReader();
                                                        reader.onload = function (e) {
                                                            img = new Image();
                                                            img.onload = function () {
                                                                drawImageOnCanvas(img);
                                                            };
                                                            img.src = e.target.result;
                                                        };
                                                        reader.readAsDataURL(file);
                                                    }
                                                });
                                        
                                                canvas.addEventListener("mousedown", function (e) {
                                                    const rect = canvas.getBoundingClientRect();
                                                    startX = e.clientX - rect.left;
                                                    startY = e.clientY - rect.top;
                                                    isDragging = true;
                                                });
                                        
                                                canvas.addEventListener("mousemove", function (e) {
                                                    if (isDragging) {
                                                        const rect = canvas.getBoundingClientRect();
                                                        endX = e.clientX - rect.left;
                                                        endY = e.clientY - rect.top;
                                                        redraw();
                                                        ctx.strokeStyle = "red";
                                                        ctx.strokeRect(
                                                            Math.min(startX, endX),
                                                            Math.min(startY, endY),
                                                            Math.abs(endX - startX),
                                                            Math.abs(endY - startY)
                                                        );
                                                    }
                                                });
                                        
                                                canvas.addEventListener("mouseup", function () {
                                                    isDragging = false;
                                                    if (img) {
                                                        const rectX = Math.min(startX, endX);
                                                        const rectY = Math.min(startY, endY);
                                                        const rectWidth = Math.abs(endX - startX);
                                                        const rectHeight = Math.abs(endY - startY);
                                                        boxes.push({ x: rectX, y: rectY, width: rectWidth, height: rectHeight });
                                                        redraw();
                                                    }
                                                });
                                        
                                                function redraw() {
                                                    ctx.clearRect(0, 0, canvas.width, canvas.height);
                                                    drawImageOnCanvas(img);
                                                    boxes.forEach((box) => {
                                                        const imageData = ctx.getImageData(box.x, box.y, box.width, box.height);
                                                        const whiteData = whiteImageData(imageData);
                                                        ctx.putImageData(whiteData, box.x, box.y);
                                                        ctx.strokeStyle = "white";
                                                        ctx.strokeRect(box.x, box.y, box.width, box.height);
                                                    });
                                                }
                                        
                                                function drawImageOnCanvas(image) {
                                                    const ratio = Math.min(canvas.width / image.width, canvas.height / image.height);
                                                    const newWidth = image.width * ratio;
                                                    const newHeight = image.height * ratio;
                                                    const offsetX = (canvas.width - newWidth) / 2;
                                                    const offsetY = (canvas.height - newHeight) / 2;
                                                    ctx.clearRect(0, 0, canvas.width, canvas.height);
                                                    ctx.drawImage(image, offsetX, offsetY, newWidth, newHeight);
                                                }
                                        
                                                function whiteImageData(imageData) {
                                                    const pixels = imageData.data;
                                                    for (let i = 0; i < pixels.length; i += 4) {
                                                        pixels[i] = 255; // Red
                                                        pixels[i + 1] = 255; // Green
                                                        pixels[i + 2] = 255; // Blue
                                                        pixels[i + 3] = 255; // Alpha (fully opaque)
                                                    }
                                                    return imageData;
                                                }
                                        
                                        saveChangesBtn.addEventListener("click", function () {
                                            const dataURL = canvas.toDataURL("image/jpeg", 1.0); // 1.0 menandakan kualitas tertinggi
                                            canvasImageInput.value = dataURL;
                                            document.getElementById("exampleModal").querySelector(".btn-close").click();
                                        });
                                        
                                                pasteArea.addEventListener("paste", function(event) {
                                                    const items = (event.clipboardData || window.clipboardData).items;
                                                    for (let i = 0; i < items.length; i++) {
                                                        if (items[i].type.indexOf('image') !== -1) {
                                                            const blob = items[i].getAsFile();
                                                            const reader = new FileReader();
                                                            reader.onload = function(e) {
                                                                img = new Image();
                                                                img.onload = function() {
                                                                    drawImageOnCanvas(img);
                                                                };
                                                                img.src = e.target.result;
                                        
                                                                // Buat file yang mirip dengan apa yang diunggah melalui input file
                                                                const file = new File([blob], 'pasted-image.png', { type: blob.type });
                                                                const dataTransfer = new DataTransfer();
                                                                dataTransfer.items.add(file);
                                                                upload.files = dataTransfer.files;
                                                            };
                                                            reader.readAsDataURL(blob);
                                                        }
                                                    }
                                                    event.preventDefault();
                                                });
                                        
                                                document.getElementById("imageForm").addEventListener("submit", function (e) {
                                                    if (!canvasImageInput.value) {
                                                        alert("Please edit and save changes to the image before submitting.");
                                                        e.preventDefault();
                                                    }
                                                });
                                            </script>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div id='row2'>
                                <div class="shadow row" style="background-color: #f1f1f6">
                                    <div class="mt-3 col-md ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Product</label>
                                            <input type="text" class="form-control form-control-sm clickable" id="search" name="product[]"
                                                required list="list">
                                                <datalist id="list">
                                                    @foreach($productsales as $data)
                                                    <option value="{{$data->product}}">{{$data->product}}</option> 
                                                    @endforeach
                                                </datalist>
                                        </div>
                                        <div class="row">
                                            <div class="col-md">
                                                <div class="mb-3" style="font-size: 14px">
                                                    <label for="" class="form-label fw-bold">Last Order SC</label>
                                                    <input class="form-control form-control-sm clickable" name="lastsc[]" id="lastsc" readonly/>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="mb-3" style="font-size: 14px">
                                                    <label for="" class="form-label fw-bold">Last Order Quantity</label>
                                                    <input class="form-control form-control-sm clickable" name="lastqty[]" id="lastqty" readonly/>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="mb-3" style="font-size: 14px">
                                                    <label for="" class="form-label fw-bold">Last Order Price</label>
                                                    <input class="form-control form-control-sm clickable" name="lastprice[]" id="lastprice" readonly/>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="mb-3" style="font-size: 14px">
                                                    <label for="" class="form-label fw-bold">Last Order Date</label>
                                                    <input class="form-control form-control-sm clickable" name="lastorder[]" id="lastorder" readonly/>
                                                </div>
                                            </div> 
                                        </div>
                                        <div id="search-results"></div>
                                    </div>
                                </div>
                                <div class="col">
                                        <div id="newinput2"></div>
                                        <div id="rowAdder2" class="my-3 btn btn-gradient-success btn-sm">Add</div>
                                </div>
                            </div>
                            <div>
                                <button class="btn btn-info float-end btn-rounded" type="submit" id="submitBtn">Submit</button>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
            <div class="">
                <div class="shadow card rounded-xl">
                    <div class="border shadow card-body">
                        <h3 class="pb-3 text-center">SALES CONTRACT</h3>
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
                                    <tr style="background-color: #f1f1f6">
                                        <th style="font-size: 14px; width:20px;" scope="col" class="">
                                            <div class="dropdown">
                                                <a class="absolute text-dark text-decoration-none dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    NO SC
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="/salesdept" class="dropdown-item ">
                                                            <span class="px-2 align-middle material-symbols-outlined" style="font-size: 20px">
                                                                clear_all
                                                            </span>Clear
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <form action="" method="GET" novalidate="novalidate">
                                                            <input type="hidden" name="statussc" value="{{ request('statussc') }}">
                                                            <input type="hidden" name="sort_by" value="asc">
                                                            <button type="submit" class="dropdown-item ">
                                                                <span class="px-2 align-middle material-symbols-outlined" style="font-size: 20px">
                                                                    text_rotate_up
                                                                </span>Sort A to Z
                                                            </button>
                                                        </form>
                                                    </li>
                                                    <li>
                                                        <form action="" method="GET" novalidate="novalidate">
                                                            <input type="hidden" name="statussc" value="{{ request('statussc') }}">
                                                            <input type="hidden" name="sort_by" value="desc">
                                                            <button type="submit" class="dropdown-item ">
                                                                <span class="px-2 align-middle material-symbols-outlined" style="font-size: 20px">
                                                                    text_rotation_down
                                                                </span>Sort Z to A
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </th>
                                        <th style="font-size: 14px; width:20px;" scope="col">
                                            <div class="dropdown">
                                                <a class="absolute text-dark text-decoration-none dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    STS
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="/salesdept" class="dropdown-item ">
                                                            <span class="px-2 align-middle material-symbols-outlined"
                                                                style="font-size: 20px">
                                                                clear_all
                                                            </span>Clear
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <form action="" method="GET" novalidate="novalidate">
                                                            <input type="hidden" name="sort_by" value="{{ request('sort_by') }}">
                                                            <input type="hidden" name="statussc" value="Approve">
                                                            <button type="submit" class="dropdown-item ">
                                                                <span class="px-2 align-middle material-symbols-outlined" style="font-size: 20px">
                                                                    check_circle
                                                                </span>Approve
                                                            </button>
                                                        </form>
                                                    </li>
                                                    <li>
                                                        <form action="" method="GET" novalidate="novalidate">
                                                            <input type="hidden" name="sort_by" value="{{ request('sort_by') }}">
                                                            <input type="hidden" name="statussc" value="Waiting">
                                                            <button type="submit" class="dropdown-item ">
                                                                <span class="px-2 align-middle material-symbols-outlined"
                                                                    style="font-size: 20px">
                                                                    hourglass_top
                                                                </span>Waiting
                                                            </button>
                                                        </form>
                                                        <form action="" method="GET" novalidate="novalidate">
                                                            <input type="hidden" name="sort_by" value="{{ request('sort_by') }}">
                                                            <input type="hidden" name="statussc" value="Cancel">
                                                            <button type="submit" class="dropdown-item ">
                                                                <span class="px-2 align-middle material-symbols-outlined"
                                                                    style="font-size: 20px">
                                                                    cancel
                                                                </span>Cancel
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </th>
                                        <th style="font-size: 14px;" scope="col" class="">TANGGAL SC</th>
                                        <th style="font-size: 14px; width:20px;" scope="col" >PRODUCT</th>
                                        <th style="font-size: 14px; width:20px;" scope="col" >CUSTOMER</th>
                                        <th style="font-size: 14px;" scope="col" class="">PO</th>
                                        <th style="font-size: 14px; width:20px;" scope="col" >TENDER</th>
                                        <th style="font-size: 14px; width:20px;" scope="col" >REF TENDER</th>
                                        <th style="font-size: 14px;" scope="col" class="text-center">FILE PO</th>
                                        <th style="font-size: 14px;" scope="col" class="text-center">NO PRICE</th>
                                        <th style="font-size: 14px; width:20px;" scope="col">NOTE SC</th>
                                        <th style="font-size: 14px; width:20px;" scope="col">STS SC</th>
                                        <th style="font-size: 14px;" scope="col" class="">DETAIL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($salescontract as $data)
                                    @php
                                        $statussc = json_decode($data->statusproduct, true);
                                        $products = json_decode($data->product, true);
                                        $referensis = json_decode($data->referensi, true);
                                        $notescs = json_decode($data->notesc, true);
                                        // Mengambil item pertama dari masing-masing kolom
                                        $firstStatus = reset($statussc);
                                        $firstProduct = reset($products);
                                        $firstReferensi = reset($referensis);
                                        $firstNotesc = reset($notescs);
                                    @endphp
                                    <tr class="bg-hover">
                                        <td data-href="{{ route('salesdept.print', $data->id) }}" style="font-size: 14px; width:20px; padding-top:2px; padding-bottom:2px;" scope="col" 
                                        @if ($data->statussc == 'Approve')
                                        class="sticky" 
                                        @elseif($data->statussc == 'Waiting')
                                        class="sticky fw-bold" 
                                        @endif
                                        >
                                        
                                            {{ $data->id}}
                                        </td>
                                        <td style="padding-top:2px; padding-bottom:2px;">
                                            @if ($data->statussc == 'Approve')
                                            <span class="material-symbols-outlined text-success" style='font-size:18px'>
                                                check_circle
                                            </span>
                                            @elseif ($data->statussc == 'Waiting')
                                            <span class="material-symbols-outlined text-warning" style='font-size:18px'>
                                                hourglass_top
                                            </span>
                                            @elseif ($data->statussc == 'Declined')
                                            <span class="material-symbols-outlined text-danger" style='font-size:18px'>
                                                cancel
                                            </span>
                                            @endif
                                        </td>

                                        <td data-href="{{ route('salesdept.print', $data->id) }}" style="padding-top:2px; padding-bottom:2px;"
                                        @if ($data->statussc == 'Waiting')
                                        class="fw-bold"
                                        @endif
                                        >{{ \Carbon\Carbon::parse($data->created_at)->format('j M y') }}</td>
                                        <td data-href="{{ route('salesdept.print', $data->id) }}" style="padding-top:2px; padding-bottom:2px;"
                                        @if ($data->statussc == 'Waiting')
                                        class="fw-bold"
                                        @endif
                                        >{{ $firstProduct}}</td>
                                        <td data-href="{{ route('salesdept.print', $data->id) }}" style="padding-top:2px; padding-bottom:2px;"
                                        @if ($data->statussc == 'Waiting')
                                        class="fw-bold"
                                        @endif
                                        >{{ $data->customer}}</td>
                                        <td data-href="{{ route('salesdept.print', $data->id) }}" style="padding-top:2px; padding-bottom:2px;"
                                        @if ($data->statussc == 'Waiting')
                                        class="fw-bold"
                                        @endif
                                        >{{ $data->po}}</td>
                                         <td data-href="{{ route('salesdept.print', $data->id) }}" style="padding-top:2px; padding-bottom:2px;"
                                        @if ($data->statussc == 'Waiting')
                                        class="fw-bold"
                                        @endif
                                        >{{ $data->tender }}</td>
                                        <td  style="padding-top:2px; padding-bottom:2px;"
                                        @if ($data->statussc == 'Waiting')
                                        class="fw-bold"
                                        @endif
                                        >
                                        <a href="/tender/byref/{{$firstReferensi}}"> 
                                            {{ $firstReferensi}}
                                        </a>
                                        </td>
                                        <td style="padding-top:2px; padding-bottom:2px;" class="text-center">
                                            <a href="{{ asset('storage/path/to/your/image/' . $data->filepo) }}" target="_blank">
                                                @if($data->filepo)
                                                <span class="material-symbols-outlined text-primary">
                                                @else
                                                <span class="material-symbols-outlined text-dark">
                                                @endif
                                                    description
                                                </span>    
                                            </a>
                                            <a href="{{ asset('storage/path/to/your/image/' . $data->filehitunganharga) }}" target="_blank">
                                                @if($data->filehitunganharga)
                                                <span class="material-symbols-outlined text-primary">
                                                @else
                                                <span class="material-symbols-outlined text-dark">
                                                @endif
                                                    description
                                                </span>    
                                            </a>
                                        </td>
                                        <td style="padding-top:2px; padding-bottom:2px; font-size:18px" class="text-center">
                                            <a href="{{ asset('storage/path/to/your/image/' . $data->fileponoprice) }}" target="_blank">
                                                @if($data->fileponoprice)
                                                <span class="material-symbols-outlined text-primary">
                                                @else
                                                <span class="material-symbols-outlined text-dark">
                                                @endif
                                                    description
                                                </span>    
                                            </a>
                                        </td>
                                        <td style="padding-top:2px; padding-bottom:2px;">
                                            {{$firstNotesc}}
                                        </td>
                                        <td style="padding-top:2px; padding-bottom:2px;"
                                        @if ($data->statussc == 'Waiting')
                                        class="fw-bold"
                                        @endif
                                        >
                                            {{ $firstStatus}}
                                        </td>
                                        <td style="padding-top: 3px; padding-bottom:3px;" class="d-flex ">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-primary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    Manage
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#exampleModalToggle{{ $data->id }}">Detail</a></li>
                                                    <li><a class="dropdown-item" href="{{ route('salesdept.edit', $data->id) }}">Edit</a></li>
                                                    <li><a class="dropdown-item" href="{{ route('salesdept.print', $data->id) }}">Print</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
    
    <div style="display:none">
        <table id="exportTable">
            <thead>
                <tr>
                    <th>SC</th>
                    <th>PRODUCT</th>
                    <th>QTY</th>
                    <th>UNIT</th>
                    <th>PRICE</th>
                    <th>TOTAL</th>
                    <th>DATE CREATES</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($salesexports as $item)
                @php
                    $products = json_decode($item->product);
                    $qtys = json_decode($item->qty);
                    $units = json_decode($item->unit);
                    $prices = json_decode($item->price);
                    $totals = json_decode($item->total);
                    $combinedDatas =
                    array_map(null,$products,$qtys,$units,$prices,$totals);
                @endphp
                @foreach($combinedDatas as $index => $sc)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$sc[0]}}</td>
                    <td>{{$sc[1]}}</td>
                    <td>{{$sc[2]}}</td>
                    <td>{{$sc[3]}}</td>
                    <td>{{$sc[4]}}</td>
                    <td>{{$item->created_at}}</td>
                </tr>
                @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- <button onclick="exportTableToXLSX('table.xlsx')">Export to XLSX</button> --}}

    <script>
        function exportTableToXLSX(filename) {
            var wb = XLSX.utils.table_to_book(document.getElementById('exportTable'), {sheet: "Sheet1"});
            XLSX.writeFile(wb, filename);
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    function handleRemoveItem2(id) {
        $(`#row2${id}`).remove();
    }

    function updateResult1(id) {
        var input1 = parseFloat($(`#input1111${id}`).val()) || 0;
        var input2 = parseFloat($(`#input2222${id}`).val()) || 0;
        console.log("Input 111:", input1);
        console.log("Input 222:", input2);
        var result = input1 * input2;
        console.log("Result:", result);
        $(`#result1${id}`).val(result);
    }

    $(document).ready(function() {
        $('#search').on('keyup', function() {
            var query = $(this).val();
            if (query !== '') {
                $.ajax({
                    url: '/searchproductsales',
                    method: 'GET',
                    data: { query: query },
                    success: function(data) {
                        $('#search-results').html(data);
                    }
                });

                $.ajax({
                    url: '/check-datasales',
                    method: 'GET',
                    data: { product: query },
                    success: function(data) {
                        if (data.exists) {
                            var latestData = data.data[0]; // Ambil data pertama
                            $('#lastprice').val(latestData.price);
                            $('#lastqty').val(latestData.qty);
                            $('#lastorder').val(latestData.tanggalproduct);
                            $('#lastsc').val(latestData.id);
                        } else {
                            $('#lastprice').val('');
                            $('#lastqty').val('');
                            $('#lastorder').val('');
                            $('#lastsc').val('');
                        }
                    }
                });
            } else {
                $('#search-results').html('');
                $('#lastprice').val('');
                $('#lastqty').val('');
                $('#lastorder').val('');
                $('#lastsc').val('');
            }
        });

        let counter2 = 1;

        $("#rowAdder2").click(function() {
            newRowAdd2 = `
                <div id='row2${counter2}' class="mt-2">
                    <div class="shadow row" style="background-color: #f1f1f6">
                        <div class="mt-3 col-md">
                            <div class="mb-3" style="font-size: 14px">
                                <label for="" class="form-label fw-bold">Product</label>
                                <input type="text" class="form-control form-control-sm clickable" id="search${counter2}" name="product[]" required list="list${counter2}">
                                <datalist id="list${counter2}">
                                    @foreach($productsales as $data)
                                        <option value="{{$data->product}}">{{$data->product}}</option> 
                                    @endforeach
                                </datalist>
                            </div>
                            <div class="row">
                                            <div class="col-md">
                                                <div class="mb-3" style="font-size: 14px">
                                                    <label for="" class="form-label fw-bold">Last Order Quantity</label>
                                                    <input class="form-control form-control-sm clickable" name="lastsc[]" id="lastsc${counter2}" readonly/>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="mb-3" style="font-size: 14px">
                                                    <label for="" class="form-label fw-bold">Last Order Quantity</label>
                                                    <input class="form-control form-control-sm clickable" name="lastqty[]" id="lastqty${counter2}" readonly/>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="mb-3" style="font-size: 14px">
                                                    <label for="" class="form-label fw-bold">Last Order Price</label>
                                                    <input class="form-control form-control-sm clickable" name="lastprice[]" id="lastprice${counter2}" readonly/>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="mb-3" style="font-size: 14px">
                                                    <label for="" class="form-label fw-bold">Last Order Date</label>
                                                    <input class="form-control form-control-sm clickable" name="lastorder[]" id="lastorder${counter2}" readonly/>
                                                </div>
                                            </div> 
                                        </div>
                            <div id="search-results${counter2}"></div>
                        </div>
                        <div>
                            <button class="btn btn-sm btn-gradient-danger" onclick="handleRemoveItem2(${counter2})">Remove</button>
                        </div>
                    </div>
                </div>
            `;
            $("#newinput2").append(newRowAdd2);
            $(`#search${counter2}`).on('keyup', function() {
                var query = $(this).val();
                var currentElementId = $(this).attr('id').replace('search', '');
                if (query !== '') {
                    $.ajax({
                        url: '/searchproductsales',
                        method: 'GET',
                        data: { query: query },
                        success: function(data) {
                            $(`#search-results${currentElementId}`).html(data);
                        }
                    });

                    $.ajax({
                        url: '/check-datasales',
                        method: 'GET',
                        data: { product: query },
                        success: function(data) {
                            if (data.exists) {
                                var latestData = data.data[0];
                                $(`#lastprice${currentElementId}`).val(latestData.price);
                                $(`#lastqty${currentElementId}`).val(latestData.qty);
                                $(`#lastorder${currentElementId}`).val(latestData.tanggalproduct);
                                $(`#lastsc${currentElementId}`).val(latestData.id);
                            } else {
                                $(`#lastprice${currentElementId}`).val('');
                                $(`#lastqty${currentElementId}`).val('');
                                $(`#lastorder${currentElementId}`).val('');
                                $(`#lastsc${currentElementId}`).val('');
                            }
                        }
                    });
                } else {
                    $(`#search-results${currentElementId}`).html('');
                    $(`#lastprice${currentElementId}`).val('');
                    $(`#lastqty${currentElementId}`).val('');
                    $(`#lastorder${currentElementId}`).val('');
                    $(`#lastsc${currentElementId}`).val('');
                }
            });
            counter2++;
        });
    });
</script>



<script>
    // Mendapatkan semua elemen input
    var allInputs = document.querySelectorAll('.form-control');
    // Menambahkan event listener untuk setiap elemen
    allInputs.forEach(function(input) {
        input.addEventListener('input', function() {
            // Menetapkan nilai input 1 dengan nilai dari input yang sedang diedit
            document.getElementById('inputpreview').value = input.value;
        });
        if (input.classList.contains('clickable')) {
            input.addEventListener('click', function() {
                // Menetapkan nilai input 1 dengan nilai dari input yang diklik
                document.getElementById('inputpreview').value = input.value;
            });
        }
    });
</script>


  <script>
        function updateResult() {
            var input1 = $('#input111').val().replace(',', '.') || "0";
            var input2 = $('#input222').val().replace(',', '.') || "0";

            console.log("Input 111:", input1);
            console.log("Input 222:", input2);

            var result = parseFloat(input1) * parseFloat(input2);
            console.log("Result:", result);

            var formattedResult = result.toString().replace('.', ',');
            $('#result').val(formattedResult);
        }
    </script>

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
