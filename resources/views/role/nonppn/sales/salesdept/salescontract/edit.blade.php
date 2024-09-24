@extends('role.purchasing.layoutsmrdept.main')
@section('main-container')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
<div class="main-panel">
    <div class=" content-wrapper" style="background-color: #f6f6fb">
        <div class="row" id='row'>
            <div class="col-12 stretch-card grid-margin" id="">
                <div class="border rounded card">
                    <div class="" style="background-color:#f1f1f6 ">
                        <div class="mb-3 col-md">
                            <label for="" class="form-label fw-bold ">Preview</label>
                            <input class="form-control " id="inputpreview" />
                        </div>
                    </div>
                    <div class="border rounded shadow card-body">
                        <h4 class="mb-3 card-title">Form Edit Plant</h4>
                        <form class="form-sample" method="POST" action="{{ route('salesnonppndept.update', $salescontract->id) }}" enctype="multipart/form-data"
                            id="pricelistForm">
                            @csrf
                            @method('PUT')
                            <div class="shadow">
                                <div class="row " style="background-color: #f1f1f6">
                                    <div class="mt-3 col-md">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">PO</label>
                                            <input type="text" class="form-control form-control-sm clickable" name="po" required value="{{$salescontract->po}}">
                                            <input type="hidden" class="form-control form-control-sm clickable" name="statussc" value="Waiting" required>
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold ">Tanggal PO</label>
                                            <input type="date" class="form-control form-control-sm clickable" name="tanggalpo" value="{{$salescontract->tanggalpo}}"
                                                placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold ">S-code</label>
                                            <input type="text" class="form-control form-control-sm clickable " name="scode" value="{{$salescontract->scode}}"
                                                placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md">
                                            <div class="mb-3" style="font-size: 14px">
                                                <label for="" class="form-label fw-bold ">Sales</label>
                                                <select class="form-select" name="sellerowner">
                                                    <option value="{{$salescontract->sellerowner}}">{{$salescontract->sellerowner}}</option>
                                                    <option value="STEPHANIE">STEPHANIE</option>
                                                    <option value="WENDY">WENDY</option>
                                                </select>
                                            </div>
                                        </div>
                                </div>
                                <div class="row" style="background-color: #f1f1f6">
                                    <div class="mt-3 col-md">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold ">Customer</label>
                                            <input type="text" id="input1" class="form-control form-control-sm clickable " name="customer"
                                                placeholder="" required list="listcust" value="{{$salescontract->customer}}">
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
                                            <input type="text" class="form-control form-control-sm clickable " name="up"  id="input2" value="{{$salescontract->up}}"
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
                                            placeholder="" required list='listplant' value="{{$salescontract->plantcode}}">
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
                                            <input type="text" class="form-control form-control-sm clickable " id="getplant" name="address" value="{{$salescontract->address}}"
                                            placeholder="" required>
                                            <input type="hidden" class="form-control form-control-sm clickable " id="getId" name="idplant[]" value="{{$salescontract->idplant}}"
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
                                    <div class="mt-3 col-md">
                                            <div class="mb-3" style="font-size: 14px">
                                                <label for="" class="form-label fw-bold ">Ket Cust</label>
                                                <select class="form-select" name="keterangancust">
                                                    <option value="{{$salescontract->keterangancust}}" selected>{{$salescontract->keterangancust}}</option>
                                                    <option value="mayora" selected>MAYORA</option>
                                                    <option value="non mayora">NON MAYORA</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mt-3 col-md ">
                                            <div class="mb-3" style="font-size: 14px">
                                                <label for="" class="form-label fw-bold">Ket Pembayaran</label>
                                                <input list="ketpem"  name="keteranganpembayaran"  type="text" class="form-control form-control-sm clickable" required value="{{$salescontract->keteranganpembayaran}}">
                                                <datalist id="ketpem">
                                                    <option value="Syarat pembayaran 30 hari setelah tukar faktur">Syarat pembayaran 30 hari setelah tukar faktur</option>
                                                </datalist>
                                            </div>
                                        </div>
                                        <div class="mt-3 col-md ">
                                            <div class="mb-3" style="font-size: 14px">
                                                <label for="" class="form-label fw-bold">Note Eksternal</label>
                                                <input name="noteeksternal"  type="text" class="form-control form-control-sm clickable" value="{{$salescontract->noteeksternal}}">
                                            </div>
                                        </div>
                                        <div class="mt-3 col-md ">
                                            <div class="mb-3" style="font-size: 14px">
                                                <label for="" class="form-label fw-bold">Ket CS</label>
                                                <input list="cs"  name="etapilihan"  type="text" class="form-control form-control-sm clickable" value="{{$salescontract->etapilihan}}">
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
                                                <input list="tender"  name="tender"  type="text" class="form-control form-control-sm clickable" value="{{$salescontract->tender}}">
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
                                                <input id="" name="filepo"  type="file" class="form-control form-control-md clickable" >
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
                                                <input id="upload" name="fileponoprice"  type="file" class="form-control form-control-md clickable" >
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


                            @php
                            $products = json_decode($salescontract->product);
                            $saps = json_decode($salescontract->sap);
                            $materials = json_decode($salescontract->material);
                            $sizes = json_decode($salescontract->size);
                            $finishings = json_decode($salescontract->finishing);
                            $specs = json_decode($salescontract->specs);
                            $qtys = json_decode($salescontract->qty);
                            $units = json_decode($salescontract->unit);
                            $prices = json_decode($salescontract->price);
                            $totals = json_decode($salescontract->total);
                            $etausers = json_decode($salescontract->etauser);
                            $toleransis = json_decode($salescontract->toleransi);
                            $notessc = json_decode($salescontract->notesc);
                            $statusproduct = json_decode($salescontract->statusproduct);
                            $referensis = json_decode($salescontract->referensi);
                            $combinedData =
                            array_map(null,$products,$saps,$materials,$sizes,$finishings,$specs,$qtys,$units,$prices,$totals,$etausers,$toleransis,$notessc,$statusproduct,$referensis);
                            @endphp


                            @foreach ($combinedData as $data )
                                <div id='row2'>
                                    <div class="shadow row" style="background-color: #f1f1f6">
                                        <div class="mt-3 col-md ">
                                            <div class="mb-3" style="font-size: 14px">
                                                <label for="" class="form-label fw-bold">Product</label>
                                                <input value="{{ $data[0] }}" type="text" class="form-control form-control-sm clickable"
                                                    name="product[]" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="shadow row" style="background-color: #f1f1f6">
                                        
                                        <div class="mt-3 col-md">
                                            <div class="mb-3" style="font-size: 14px">
                                                <label for="" class="form-label fw-bold ">No Ref Tender</label>
                                                <input type="text" class="form-control form-control-sm clickable" name="referensi[]" value="{{$data[14]}}"
                                                    placeholder="" >
                                            </div>
                                        </div>
                                        <div class="mt-3 col-md">
                                            <div class="mb-3" style="font-size: 14px">
                                                <label for="" class="form-label fw-bold ">SAP</label>
                                                <input value="{{ $data[1] }}"type="text" class="form-control form-control-sm clickable"
                                                    name="sap[]" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="mt-3 col-md">
                                            <div class="mb-3" style="font-size: 14px">
                                                <label for="" class="form-label fw-bold ">Material</label>
                                                <input value="{{ $data[2] }}" type="text" class="form-control form-control-sm clickable"
                                                    name="material[]" placeholder="" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="shadow row" style="background-color: #f1f1f6">
                                        <div class="mt-3 col-md">
                                            <div class="mb-3" style="font-size: 14px">
                                                <label for="" class="form-label fw-bold ">Size</label>
                                                <input value="{{ $data[3] }}" type="text" class="form-control form-control-sm clickable"
                                                    name="size[]" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="mt-3 col-md">
                                            <div class="mb-3" style="font-size: 14px">
                                                <label for="" class="form-label fw-bold ">Finishing</label>
                                                <input value="{{ $data[4] }}" type="text" class="form-control form-control-sm clickable"
                                                    name="finishing[]" placeholder="" required>

                                            </div>
                                        </div>
                                        <div class="mt-3 col-md">
                                            <div class="mb-3" style="font-size: 14px">
                                                <label for="" class="form-label fw-bold ">Specs</label>
                                                <input value="{{ $data[5] }}" type="text" class="form-control form-control-sm clickable"
                                                    name="specs[]" placeholder="" required>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="shadow row stretch-card grid-margin" style="background-color: #f1f1f6">
                                        <div class="mt-3 col-md ">
                                            <div class="mb-3" style="font-size: 14px">
                                                <label for="" class="form-label fw-bold">QTY</label>
                                                <input value="{{ $data[6] }}" id="input111" oninput="updateResult()" name="qty[]" type="number"
                                                    class="form-control form-control-sm clickable" required>
                                            </div>
                                        </div>
                                        <div class="mt-3 col-md">
                                            <div class="mb-3" style="font-size: 14px">
                                                <label for="" class="form-label fw-bold ">Unit</label>
                                                <input value="{{ $data[7] }}" type="text" class="form-control form-control-sm clickable "
                                                    name="unit[]" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="mt-3 col-md">
                                            <div class="mb-3" style="font-size: 14px">
                                                <label for="" class="form-label fw-bold ">Price</label>
                                                <input value="{{ $data[8] }}" id="input222" oninput="updateResult()" name="price[]" type="number"
                                                    class="form-control form-control-sm clickable" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="mt-3 col-md">
                                            <div class="mb-3" style="font-size: 14px">
                                                <label for="" class="form-label fw-bold ">Total</label>
                                                <input value="{{ $data[9] }}" id="result" type="number"
                                                    class="form-control form-control-sm clickable" name="total[]" value=""
                                                    placeholder="" required>
                                            </div>
                                        </div>


                                        <div class="mt-3 col-md">
                                            <div class="mb-3" style="font-size: 14px">
                                                <label for="" class="form-label fw-bold ">Eta User</label>
                                                <input value="{{ $data[10] }}" type="date" class="form-control form-control-sm clickable"
                                                    name="etauser[]" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="mt-3 col-md">
                                            <div class="mb-3" style="font-size: 14px">
                                                <label for="" class="form-label fw-bold ">Toleransi</label>
                                                <input value="{{ $data[11] }}" type="text" class="form-control form-control-sm clickable "
                                                    name="toleransi[]" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="mt-3 col-md">
                                            <div class="mb-3" style="font-size: 14px">
                                                <label for="" class="form-label fw-bold ">Status SC</label>
                                                <select name="statusproduct[]" required class="form-select ">
                                                    <option value="" selected>Choose Status</option>
                                                    <option value="Original">Original</option>
                                                    <option value="Revised">Revised</option>
                                                    <option value="Cancel">Cancel</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mt-3 col-md">
                                            <div class="mb-3" style="font-size: 14px">
                                                <label for="" class="form-label fw-bold ">Note SC</label>
                                                <input value="{{ $data[12] }}" type="text" class="form-control clickable form-control-sm "
                                                    name="notesc[]" placeholder="" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <div class="col">
                                    <div id="newinput2"></div>
                                    <div id="rowAdder2" class="my-3 btn btn-gradient-success btn-sm">Add</div>
                                </div>
                            <div>
                                <button type="submit" class="mt-2 btn-rounded btn btn-gradient-info float-end">
                                    Submit
                                </button>
                            </div>
                            <!-- Add this modal at the bottom of your Blade file -->

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        let counter2 = 1;
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
                                    $("#rowAdder2").click(function() {
                                        newRowAdd2 = `
                                                   <div id='row2${counter2}' class="mt-2">
                                                        <div class="shadow row" style="background-color: #f1f1f6">
                                                            <div class="mt-3 col-md ">
                                                                <div class="mb-3" style="font-size: 14px">
                                                                    <label for="" class="form-label fw-bold">Product</label>
                                                                    <input type="text" class="form-control clickable form-control-sm" name="product[]" required>
                                                                </div>
                                                            </div>
                                                            <div class="mt-3 col-md">
                                                                <div class="mb-3" style="font-size: 14px">
                                                                    <label for="" class="form-label fw-bold ">SAP</label>
                                                                    <input type="text" class="form-control clickable form-control-sm " name="sap[]" placeholder="" required>
                                                                </div>
                                                            </div>
                                                            <div class="mt-3 col-md">
                                                                <div class="mb-3" style="font-size: 14px">
                                                                    <label for="" class="form-label fw-bold ">Material</label>
                                                                    <input type="text" class="form-control clickable form-control-sm " name="material[]" placeholder="" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="shadow row" style="background-color: #f1f1f6">
                                                            <div class="mt-3 col-md">
                                                                <div class="mb-3" style="font-size: 14px">
                                                                    <label for="" class="form-label fw-bold ">Size</label>
                                                                    <input type="text" class="form-control clickable form-control-sm " name="size[]" placeholder="" required>
                                                                </div>
                                                            </div>
                                                            <div class="mt-3 col-md">
                                                                <div class="mb-3" style="font-size: 14px">
                                                                    <label for="" class="form-label fw-bold ">Finishing</label>
                                                                    <input type="text" class="form-control clickable form-control-sm " name="finishing[]" placeholder="" required>
                                                                </div>
                                                            </div>
                                                            <div class="mt-3 col-md">
                                                                <div class="mb-3" style="font-size: 14px">
                                                                    <label for="" class="form-label fw-bold ">Specs</label>
                                                                    <input type="text" class="form-control clickable form-control-sm " name="specs[]" placeholder="" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="shadow row stretch-card grid-margin" style="background-color: #f1f1f6">
                                                            <div class="mt-3 col-md ">
                                                                <div class="mb-3" style="font-size: 14px">
                                                                    <label for="" class="form-label fw-bold">QTY</label>
                                                                    <input id='input1111${counter2}' oninput="updateResult1(${counter2})" type="text" class="form-control clickable form-control-sm" name="qty[]" required>
                                                                </div>
                                                            </div>
                                                            <div class="mt-3 col-md">
                                                                <div class="mb-3" style="font-size: 14px">
                                                                    <label for="" class="form-label fw-bold ">Unit</label>
                                                                    <input type="text" class="form-control clickable form-control-sm " name="unit[]" placeholder="" required>
                                                                </div>
                                                            </div>
                                                            <div class="mt-3 col-md">
                                                                <div class="mb-3" style="font-size: 14px">
                                                                    <label for="" class="form-label fw-bold ">Price</label>
                                                                    <input id='input2222${counter2}' oninput="updateResult1(${counter2})" type="text" class="form-control clickable form-control-sm " name="price[]" placeholder="" required>
                                                                </div>
                                                            </div>
                                                            <div class="mt-3 col-md">
                                                                <div class="mb-3" style="font-size: 14px">
                                                                    <label for="" class="form-label fw-bold ">Total</label>
                                                                    <input id='result1${counter2}' type="text" class="form-control clickable form-control-sm " name="total[]" placeholder="" required>
                                                                </div>
                                                            </div>
                                                            <div class="mt-3 col-md">
                                                                <div class="mb-3" style="font-size: 14px">
                                                                    <label for="" class="form-label fw-bold ">Eta User</label>
                                                                    <input type="date" class="form-control clickable form-control-sm " name="etauser[]" placeholder="" required>
                                                                </div>
                                                            </div>
                                                            <div class="mt-3 col-md">
                                                                <div class="mb-3" style="font-size: 14px">
                                                                    <label for="" class="form-label fw-bold ">Toleransi</label>
                                                                    <input type="text" class="form-control clickable form-control-sm " name="toleransi[]" placeholder="" required>
                                                                </div>
                                                            </div>
                                                            <div class="mt-3 col-md">
                                                                <div class="mb-3" style="font-size: 14px">
                                                                    <label for="" class="form-label fw-bold ">Note SC</label>
                                                                    <input type="text" class="form-control clickable form-control-sm " name="notesc[]" placeholder="" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <button class="btn btn-sm btn-gradient-danger " onclick="handleRemoveItem2(${counter2})">Remove</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    `;
                                        // Tambahkan elemen baru setelah elemen dengan ID "rowAdder"
                                        $("#newinput2").append(newRowAdd2);
                                        counter2++;
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
    var input1 = parseFloat($('#input111').val()) || 0;
    var input2 = parseFloat($('#input222').val()) || 0;
    console.log("Input 111:", input1);
    console.log("Input 222:", input2);
    var result = input1 * input2;
    console.log("Result:", result);
    $('#result').val(result);
}
    </script>




    @endsection
