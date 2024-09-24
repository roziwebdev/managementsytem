@extends('role.purchasing.layoutsmrdept.main')
@section('main-container')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
<div class="main-panel">
    <div class=" content-wrapper" style="background-color: #f6f6fb">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


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
                                            <input type="hidden" class="form-control form-control-sm clickable" name="idquotation" value="{{$quotation->id}}" required>
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
                                    <div class="mt-3 col-md">
                                            <div class="mb-3" style="font-size: 14px">
                                                <label for="" class="form-label fw-bold ">Ket Cust</label>
                                                <select class="form-select" name="keterangancust">
                                                    <option value="mayora" selected>MAYORA</option>
                                                    <option value="non mayora">NON MAYORA</option>
                                                </select>
                                            </div>
                                        </div>
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
                        <h3 class="pb-3 text-center">QUOTATION {{ $quotation->customer}} / {{ $quotation->id }}</h3>
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
                                        <th style="font-size: 14px;" scope="col" class="sticky">No.</th>
                                        <th style="font-size: 14px;" scope="col">Product</th>
                                        <th style="font-size: 14px;" scope="col" class="">Material</th>
                                        <th style="font-size: 14px;" scope="col">Size</th>
                                        <th style="font-size: 14px;" scope="col" class="">Specs</th>
                                        <th style="font-size: 14px;" scope="col" class="">Quantity</th>
                                        <th style="font-size: 14px;" scope="col" class="">Price</th>
                                        <th style="font-size: 14px;" scope="col" class="">Final Qty</th>
                                        <th style="font-size: 14px;" scope="col" class="">Final Price</th>
                                        <th style="font-size: 14px;" scope="col" class="">PO Qty</th>
                                        <th style="font-size: 14px;" scope="col" class="">PO Price</th>
                                        <th style="font-size: 14px;" scope="col" class="">Status</th>
                                        <th style="font-size: 14px;" scope="col" class="">No PO</th>
                                        <th style="font-size: 14px;" scope="col" class="">Remarks</th>
                                        <th style="font-size: 14px;" scope="col" class="">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $products = json_decode($quotation->product);
                                    $materials = json_decode(str_replace("\r\n", "\n", $quotation->material));
                                    $sizes = json_decode(str_replace("\r\n", "\n", $quotation->size));
                                    $specs = json_decode(str_replace("\r\n", "\n", $quotation->specs));
                                    $qtys = json_decode($quotation->qty);
                                    $units = json_decode($quotation->unit);
                                    $prices = json_decode($quotation->price);
                                    $statusitem = json_decode($quotation->statusitem);
                                    $noteitem = json_decode($quotation->noteitem);
                                    $finalqtys = json_decode($quotation->finalqty);
                                    $finalprices = json_decode($quotation->finalprice);
                                    $qtyfinalnegos = json_decode($quotation->qtyfinalnego );
                                    $pricefinalnegos = json_decode($quotation->pricefinalnego);
                                    $pos = json_decode($quotation->po);
                                    // Gabungkan semua data menjadi satu array dengan zip
                                    $combinedData = array_map(null, $products, $materials, $sizes, $specs, $qtys, $units, $prices, $statusitem, $noteitem, $finalqtys,$finalprices,$pos,$qtyfinalnegos,$pricefinalnegos);
                                    @endphp
                                    
                                    @foreach ($combinedData as $index => $data )
                                    
                                    @php
                                    $linespecs= explode("\r\n", $data[3]);
                                    $lines2 = explode("\r\n", $data[4]);
                                    $lines = explode("\r\n", $data[6]);

                                    foreach ($lines as &$line) {
                                        // Pisahkan angka dalam rentang menggunakan spasi
                                        $numbers = explode(' - ', $line);
                                        $formatted_numbers = [];
                                        foreach ($numbers as $number) {
                                            // Trim untuk menghilangkan spasi berlebih
                                            $number = trim($number);
                                            // Periksa apakah angka negatif (ada tanda minus di depan)
                                            $isNegative = $number[0] === '-';
                                            // Hilangkan tanda minus sementara untuk memformat angka
                                            $number = ltrim($number, '-');
                                            // Ubah format angka menggunakan number_format
                                            $formatted_number = number_format((float)$number, 1, ',', '.');
                                            // Tambahkan kembali tanda minus jika angka semula negatif
                                            if ($isNegative) {
                                                $formatted_number = '-' . $formatted_number;
                                            }
                                            // Simpan hasil format kembali ke dalam array
                                            $formatted_numbers[] = $formatted_number;
                                        }
                                        // Gabungkan angka dalam rentang dengan tanda -
                                        $formatted_line = implode(' - ', $formatted_numbers);
                                        // Simpan hasil format kembali ke dalam array
                                        $line = '• Rp. ' .$formatted_line;
                                    }
                            
                                    // Gabungkan kembali rentang harga yang diformat
                                    $formatted_value = implode("\r\n", $lines);
                                    
                                    
                                    // Gabungkan array menjadi satu string dengan karakter baris baru (\r\n)
                                    foreach ($lines2 as &$line) {
                                    // Trim untuk menghilangkan spasi berlebih
                                    $line = trim($line);
                                    // Periksa apakah angka negatif (ada tanda minus di depan)
                                    $isNegative = $line[0] === '-';
                                    // Hilangkan tanda minus sementara untuk memformat angka
                                    $number = ltrim($line, '-');
                                    // Ubah format angka menggunakan number_format
                                    $formatted_number = number_format((float)$number, 0, ',', '.');
                                    // Tambahkan kembali tanda minus jika angka semula negatif
                                    if ($isNegative) {
                                    $formatted_number = '-' . $formatted_number;
                                    }
                                    // Simpan hasil format kembali ke dalam array
                                    $line = '• ' .$formatted_number."&nbsp;".$data[5];
                                    }
                                    $formatted_value2 = implode("\r\n", $lines2);
                                
                                
                                    // Menambahkan simbol "•" di depan setiap baris
                                    $linespecs = array_map(function($line) {
                                    return '• ' . $line;
                                    }, $linespecs);
                                    // Menggabungkan kembali baris-baris tersebut dengan tag <br>
                                    // Gabungkan array menjadi satu string dengan karakter baris baru (\r\n)
                                    $formattedData = implode('<br>', $linespecs);
                                    
                                    
                                    @endphp
                                    <tr>
                                        <td style="font-size: 14px; width:20px; padding-top:px; padding-bottom:px;" scope="col" class="sticky">{{ $index +1}}</td>
                                        <td style="padding-top:px; padding-bottom:px;">{{ $data[0]}}</td>
                                        <td style="padding-top:px; padding-bottom:px;">{!! nl2br($data[1]) !!}</td>
                                        <td style="padding-top:px; padding-bottom:px;">{!! nl2br($data[2]) !!}</td>
                                        <td style="padding-top:px; padding-bottom:px;">{!! nl2br($formattedData) !!}</td>
                                        <td style="padding-top:px; padding-bottom:px;">{!! nl2br($formatted_value2) !!}</td>
                                        <td style="padding-top:px; padding-bottom:px;">{!! nl2br($formatted_value) !!}</td>
                                        <td style="padding-top:px; padding-bottom:px;">{{ '' . number_format(floatval(str_replace(',', '.', $data[9])), 0, ',', '.') }}</td>
                                        <td style="padding-top:px; padding-bottom:px;">Rp. {{ '' . number_format(floatval(str_replace(',', '.', $data[10])), 1, ',', '.') }} </td>
                                        <td style="padding-top:px; padding-bottom:px;">{{ '' . number_format(floatval(str_replace(',', '.', $data[12])), 0, ',', '.') }} </td>
                                        <td style="padding-top:px; padding-bottom:px;">Rp. {{ '' . number_format(floatval(str_replace(',', '.', $data[13])), 1, ',', '.') }} </td>
                                        <td style="padding-top:px; padding-bottom:px;">
                                            @if ($data[7] == "OK")
                                            <button class="btn btn-sm " style="background-color:#c1fecd; color:#00cc25; font-size: 10px">OK</button>
                                            @elseif ($data[7] == "OK PO")
                                            <button class="btn btn-sm " style="background-color:#c1fecd; color:#00cc25; font-size: 10px">OK PO</button>
                                            @elseif ($data[7] == "NOT OK")
                                            <button class="btn btn-sm" style="background-color:#fac6d2;color:#e91345; font-size: 10px">NOT OK</button>
                                            @elseif ($data[7] == "PROGRESS")
                                            <button class="btn btn-sm" style="background-color:#faf595; color:#c3ba08; font-size: 10px">PROGRESS</button>
                                            @elseif ($data[7] == "NEGO")
                                            <button class="btn btn-sm btn-secondary" style=" font-size: 10px">NEGO</button>
                                            @endif
                                        </td>
                                       @if (isset($data[11]) && $data[7] == "OK PO")
                                            <td style="padding-top:px; padding-bottom:px;">
                                                <a style="text-decoration:;" class="text-dark" href="{{ route('salesdept.printpo', $data[11]) }}">{{ $data[11] }}</a>
                                            </td>
                                        @else
                                            <td style="padding-top:px; padding-bottom:px;"></td>
                                         @endif
                                        <td style="padding-top:px; padding-bottom:px;">{{ $data[8]}}</td>
                                        <td style="padding-top:px; padding-bottom:px;" class="text-center">
                                            <a href="{{ route('quotation.edit', $quotation->id) }}" class="">
                                                <span class="material-symbols-outlined text-black" style='font-size:20px'>
                                                    edit_square
                                                </span>
                                            </a>
                                        </td>
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
    var input1 = parseFloat($('#input111').val()) || 0;
    var input2 = parseFloat($('#input222').val()) || 0;
    console.log("Input 111:", input1);
    console.log("Input 222:", input2);
    var result = input1 * input2;
    console.log("Result:", result);
    $('#result').val(result);
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