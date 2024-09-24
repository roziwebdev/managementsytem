@extends('role.sales.layouts.main')
@section('main-container')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
<div class="main-panel">
    <div class=" content-wrapper" style="background-color: #f6f6fb">
        <div class="page-header">
            <h3 class="page-title">
                <span class="text-white page-title-icon bg-gradient-info me-2">
                    <i class="mdi mdi-home"></i>
                </span> Dashboard
            </h3>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <span></span>Overview <i
                            class="align-middle mdi mdi-alert-circle-outline icon-sm text-primary"></i>
                    </li>
                </ul>
            </nav>
        </div>
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
                        <h4 class="mb-3 card-title">Form New Plant</h4>
                        <form class="form-sample" method="POST" action="{{ route('salesdept.update', $salescontract->id) }}" enctype="multipart/form-data"
                            id="pricelistForm">
                            @csrf
                            @method('PUT')
                            <div class="shadow row stretch-card grid-margin" style="background-color: #f1f1f6">
                                <div class="mt-3 col-md ">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">PO</label>
                                        <input value="{{ $salescontract->po }}" type="text" class="form-control form-control-sm clickable" name="po"
                                            required>
                                        <input value="Waiting" type="hidden" class="form-control form-control-sm clickable" name="statussc">
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Tanggal PO</label>
                                        <input value="{{ $salescontract->tanggalpo }}" type="date" class="form-control form-control-sm clickable"
                                            name="tanggalpo" placeholder="" required>
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">S-code</label>
                                        <input value="{{ $salescontract->scode }}" type="text" class="form-control form-control-sm clickable " name="scode"
                                            placeholder="" required>
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Customer</label>
                                        <input value="{{ $salescontract->customer }}" type="text" id="input1" class="form-control form-control-sm clickable "
                                            name="customer" placeholder="" required list="listcust">
                                        <datalist id="listcust">
                                            @foreach ($cust as $data )
                                            <option>{{ $data->kodecust }}</option>
                                            @endforeach
                                        </datalist>
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Up</label>
                                        <input value="{{ $salescontract->up }}" type="text" class="form-control form-control-sm clickable " name="up"
                                            id="input2" placeholder="" required>
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
                                        <input value="{{ $salescontract->plantcode }}" type="text" class="form-control form-control-sm clickable"
                                            id="inputplant" name="plantcode" placeholder="" required list='listplant'>
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
                                        <input value="{{ $salescontract->address }}" type="text" class="form-control form-control-sm clickable " id="getplant"
                                            name="address" placeholder="" required>
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
                                            },
                                            error: function () {
                                                alert('Gagal mengambil data customer.');
                                            }
                                        });
                                    });
                                });
                                </script>
                                <!-- Contoh menggunakan CDN -->
                                
                                 <div class=" row stretch-card grid-margin" style="background-color: #">
                                    <div class="mt-3 col-md ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Tender</label>
                                            <input  name="tender"  type="text" class="form-control form-control-sm clickable" value="{{$salescontract->tender}}">
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
                                    <div class="mt-3 col-md">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold ">Ket Cust</label>
                                            <select class="form-select" name="keterangancust">
                                                <option value="{{$salescontract->keterangancust}}">{{$salescontract->keterangancust}}</option>
                                                <option value="non mayora">NON MAYORA</option>
                                                <option value="mayora">MAYORA</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">File PO</label>
                                            <input id="" name="filepo"  type="file" class="form-control form-control-md clickable">
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
                            $combinedData =
                            array_map(null,$products,$saps,$materials,$sizes,$finishings,$specs,$qtys,$units,$prices,$totals,$etausers,$toleransis,$notessc,
                            $statusproduct);
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
