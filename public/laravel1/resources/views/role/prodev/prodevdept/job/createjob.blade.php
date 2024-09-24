@extends('role.prodev.layouts.main')
@section('main-container')


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
        <style>
            #myForm {
                display: none;
            }
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            {{-- <script>
                $(document).ready(function(){
                                $("#myButton").click(function(){
                                    $("#myForm").fadeToggle();
                                });
                            });
            </script>
            <div id="myButton" class="py-2 justify-content-end d-flex">
                <button class="btn btn-info">Add SC</button>
            </div> --}}
        <div class="row" id='row'>
            <div class="mt-2 row" style="background-color: ">
                <div class="mb-3 col-md">
                    <label for="" class="form-label fw-bold ">Preview</label>
                    <input class="form-control " id="input1"/>
                </div>
            </div>
            <div class="col-12 stretch-card grid-margin" id="">
                <div class="border rounded card">
                    <div class="border rounded shadow card-body">
                        <h4 class="mt-3 mb-3 card-title">Form JOB</h4>
                        <form class="form-sample" method="POST" action="{{ route('job.store') }}"
                        id="pricelistForm">
                        @csrf
                            <div class="row" style="background-color: #f1f1f6">
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Tanggal Terima</label>
                                        <input type="date" class="form-control form-control-sm clickable" name="tanggalterima"
                                            placeholder="" required>
                                    </div>
                                </div>
                                <div class="mt-3 col-md ">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Original</label>
                                        <input type="text" class="form-control form-control-sm clickable" name="original" required>
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Design</label>
                                        <input type="text" class="form-control form-control-sm clickable" name="design"
                                            placeholder="" required>
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Design no</label>
                                        <input type="text" class="form-control form-control-sm clickable " name="designno"
                                            placeholder="" required>
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Status Design</label>
                                        <input type="text" class="form-control form-control-sm clickable" name="statusdesign"
                                            placeholder="" required>
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Act Color</label>
                                        <input type="text" class="form-control form-control-sm clickable" name="actcolor"
                                            placeholder="" required>
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Finishing2</label>
                                        <input type="text" class="form-control form-control-sm clickable" name="finishingjob" placeholder="">
                                    </div>
                                </div>
                                <div class="mt-3 col-md ">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Acuan Warna</label>
                                        <input type="text" class="form-control form-control-sm clickable" name="acuanwarna">
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Packing</label>
                                        <input type="text" class="form-control form-control-sm clickable " name="packing" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class=" row" style="background-color: #f1f1f6">
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">No PS</label>
                                        <input type="text" class="form-control form-control-sm clickable" name="nops"
                                            placeholder="" >
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Box Name</label>
                                        <input type="text" class="form-control form-control-sm clickable " name="boxname"
                                            placeholder="" list="listbox" id="inputBox">
                                            <datalist id="listbox">
                                                @foreach ($boxes as $data )
                                                    <option value="{{ $data->boxname }}">
                                                @endforeach
                                            </datalist>
                                        <input type="hidden" class="" name="boxspecs" id="getSpecs"
                                            placeholder="" >
                                        <input type="hidden" class="" name="boxsize" id="getSize"
                                            placeholder="" >
                                    </div>
                                    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                                    <script>
                                        $(document).ready(function () {
                                                                        // Fungsi yang dipanggil saat nilai input pertama berubah
                                                                        $('#inputBox').change(function () {
                                                                            // Mendapatkan nilai yang dipilih pada input pertama
                                                                            var selectedBox = $(this).val();

                                                                            // Melakukan Ajax request ke server untuk mendapatkan data client dan address berdasarkan namacustomer
                                                                            $.ajax({
                                                                                type: 'GET',
                                                                                url: '/get-customer-databox/' + selectedBox, // Gantilah dengan URL endpoint yang sesuai di Laravel
                                                                                success: function (data) {
                                                                                    // Mengisi nilai pada input kedua dan ketiga
                                                                                    $('#getSpecs').val(data.specs);
                                                                                    $('#getSize').val(data.size);
                                                                                },
                                                                                error: function () {
                                                                                    alert('Gagal mengambil data customer.');
                                                                                }
                                                                            });
                                                                        });
                                                                    });
                                    </script>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">NW Box</label>
                                        <input type="text" class="form-control form-control-sm clickable" name="nwbox"
                                            placeholder="" >
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Application</label>
                                        <input type="text" class="form-control form-control-sm clickable" name="aplikasi" placeholder="">
                                    </div>
                                </div>
                                <div class="mt-3 col-md ">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Layout</label>
                                        <input type="text" class="form-control form-control-sm clickable" name="layout">
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">UP</label>
                                        <input type="text" class="form-control form-control-sm clickable" name="up" placeholder="">
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Uk Press Layout</label>
                                        <input type="text" class="form-control form-control-sm clickable " name="ukpresslayout" placeholder="">
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Pisau</label>
                                        <input type="text" class="form-control form-control-sm clickable" name="pisau" placeholder="">
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Citto</label>
                                        <input type="text" class="form-control form-control-sm clickable " name="citto" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class=" row" style="background-color: #f1f1f6">
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Emboss</label>
                                        <input type="text" class="form-control form-control-sm clickable " name="emboss"
                                            placeholder="" >
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Hotprint</label>
                                        <input type="text" class="form-control form-control-sm clickable" name="hotprint"
                                            placeholder="" >
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Mat 1</label>
                                        <input type="text" class="form-control form-control-sm clickable" name="mat1"
                                            placeholder="" >
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">As 1</label>
                                        <input type="text" class="form-control form-control-sm clickable" name="as1"
                                            placeholder="" >
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Mat 2</label>
                                        <input type="text" class="form-control form-control-sm clickable" name="mat2"
                                            placeholder="" >
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">As 2</label>
                                        <input type="text" class="form-control form-control-sm clickable" name="as2"
                                            placeholder="" >
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Mat 3</label>
                                        <input type="text" class="form-control form-control-sm clickable" name="mat3"
                                            placeholder="" >
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">As 3</label>
                                        <input type="text" class="form-control form-control-sm clickable" name="as3"
                                            placeholder="" >
                                    </div>
                                </div>
                            </div>
                            <div class=" row" style="background-color: #f1f1f6">
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">F1</label>
                                        <input type="text" class="form-control form-control-sm clickable" name="f1" placeholder="">
                                    </div>
                                </div>
                                <div class="mt-3 col-md ">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">F2</label>
                                        <input type="text" class="form-control form-control-sm clickable" name="f2">
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">F3</label>
                                        <input type="text" class="form-control form-control-sm clickable" name="f3" placeholder="">
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">F4</label>
                                        <input type="text" class="form-control form-control-sm clickable " name="f4" placeholder="">
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">F5</label>
                                        <input type="text" class="form-control form-control-sm clickable" name="f5" placeholder="">
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">F6</label>
                                        <input type="text" class="form-control form-control-sm clickable" name="f6" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="background-color: #f1f1f6">
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">B1</label>
                                        <input type="text" class="form-control form-control-sm clickable" name="b1" placeholder="">
                                    </div>
                                </div>
                                <div class="mt-3 col-md ">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">B2</label>
                                        <input type="text" class="form-control form-control-sm clickable" name="b2">
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">B3</label>
                                        <input type="text" class="form-control form-control-sm clickable " name="b3" placeholder="">
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">B4</label>
                                        <input type="text" class="form-control form-control-sm clickable" name="b4" placeholder="">
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">B5</label>
                                        <input type="text" class="form-control form-control-sm clickable " name="b5" placeholder="">
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">B6</label>
                                        <input type="text" class="form-control form-control-sm clickable" name="b6" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class=" row" style="background-color: #f1f1f6">
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Note 1</label>
                                        <input type="text" class="form-control form-control-sm clickable" name="note1" placeholder="">
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Note 2</label>
                                        <input type="text" class="form-control form-control-sm clickable" name="note2" placeholder="">
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Note 3</label>
                                        <input type="text" class="form-control form-control-sm clickable" name="note3" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="nosc" value="{{ $sc->id }}" />
                            <input type="hidden" name="po" value="{{ $sc->po }}" />
                            <input type="hidden" name="tanggalpo" value="{{$sc->tanggalpo }}" />
                            <input type="hidden" name="tanggalSC" value="{{ $sc->created_at }}" />
                            <input type="hidden" name="scode" value="{{ $sc->scode }}" />
                            <input type="hidden" name="customer" value="{{ $sc->customer }}" />
                            <input type="hidden" name="client" value="{{ $sc->up }}" />
                            <input type="hidden" name="plantcode" value="{{ $sc->plantcode }}" />
                            <input type="hidden" name="address" value="{{ $sc->address }}" />
                            <input type="hidden" name="product" value="{{ $selectedItem['product'] }}" />
                            <input type="hidden" name="sap" value="{{ $selectedItem['sap'] }}" />
                            <input type="hidden" name="material" value="{{ $selectedItem['material'] }}" />
                            <input type="hidden" name="size" value="{{ $selectedItem['size'] }}" />
                            <input type="hidden" name="finishing" value="{{ $selectedItem['finishing'] }}" />
                            <input type="hidden" name="specs" value="{{ $selectedItem['specs'] }}" />
                            <input type="hidden" name="qty" value="{{ $selectedItem['qty'] }}" />
                            <input type="hidden" name="unit" value="{{ $selectedItem['unit'] }}" />
                            <input type="hidden" name="etauser" value="{{ $selectedItem['etauser']}}"/>
                            <input type="hidden" name="toleransi" value="{{ $selectedItem['toleransi'] }}" />
                            <input type="hidden" name="notesc" value="{{ $selectedItem['notesc'] }}" />

                            <div>
                                <button type="submit" class="mt-2 btn-rounded btn btn-gradient-info float-end">
                                    Submit
                                </button>
                            </div>
                            <!-- Add this modal at the bottom of your Blade file -->

                            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 stretch-card grid-margin" id="">
                <div class="border rounded card">
                    <div class="border rounded shadow card-body">
                        <h4 class="mb-3 card-title">Form JOB</h4>

                        <div class="">
                                    <div class="row">
                                        <div class="col">
                                            <p><span class="fw-bold">PO : </span>{{ $sc->po }}</p>
                                            <p><span class="fw-bold">Tanggal PO :</span> {{ \Carbon\Carbon::parse($sc->tanggalpo)->format('j M y')
                                                }}</p>
                                            <p><span class="fw-bold">Tanggal SC :</span> {{ \Carbon\Carbon::parse($sc->created_at)->format('j M y')
                                                }}</p>
                                        </div>
                                        <div class="col">
                                            <p><span class="fw-bold">S-Code :</span> {{ $sc->scode }}</p>
                                            <p><span class="fw-bold">Customer :</span> {{ $sc->customer }}</p>
                                            <p><span class="fw-bold">Up:</span> {{ $sc->up }}</p>
                                        </div>
                                        <div class="col">
                                            <p><span class="fw-bold">Plant :</span> {{ $sc->plantcode }}</p>
                                            <p><span class="fw-bold">Address :</span> {{ $sc->address }}</p>
                                        </div>
                                    </div>
                                    <div class="mb-3 border text-dark">

                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <p><span class="fw-bold">Product :</span> {{ $selectedItem['product'] }}</p>
                                            <p><span class="fw-bold">SAP :</span> {{ $selectedItem['sap']}}</p>
                                            <p><span class="fw-bold">Material :</span> {{ $selectedItem['material'] }}</p>
                                        </div>
                                        <div class="col">
                                            <p><span class="fw-bold">Size :</span> {{ $selectedItem['size'] }}</p>
                                            <p><span class="fw-bold">Finishing :</span> {{ $selectedItem['finishing'] }}</p>
                                            <p><span class="fw-bold">Specs :</span> {{ $selectedItem['specs'] }}</p>
                                        </div>
                                        <div class="col">
                                            <p><span class="fw-bold">Quantity :</span> {{ $selectedItem['qty'] }}</p>
                                            <p><span class="fw-bold">Unit :</span> {{ $selectedItem['unit'] }}</p>
                                            <p><span class="fw-bold">Eta User :</span> {{ \Carbon\Carbon::parse($selectedItem['etauser'])->format('j M y')}}</p>
                                        </div>
                                        <div class="col">
                                            <p><span class="fw-bold">Toleransi :</span> {{ $selectedItem['toleransi'] }}</p>
                                            <p><span class="fw-bold">Note SC :</span> {{ $selectedItem['notesc'] }}</p>
                                        </div>
                                        <!-- and so on... -->
                                    </div>

                            </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
<script>
    // Mendapatkan semua elemen input
                var allInputs = document.querySelectorAll('.form-control');
                // Menambahkan event listener untuk setiap elemen
                allInputs.forEach(function(input) {
                    input.addEventListener('input', function() {
                        // Menetapkan nilai input 1 dengan nilai dari input yang sedang diedit
                        document.getElementById('input1').value = input.value;
                    });

                    if (input.classList.contains('clickable')) {
                        input.addEventListener('click', function() {
                            // Menetapkan nilai input 1 dengan nilai dari input yang diklik
                            document.getElementById('input1').value = input.value;
                        });
                    }
                });
</script>



    @endsection
