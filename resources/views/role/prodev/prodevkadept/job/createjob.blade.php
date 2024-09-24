@extends('role.purchasing.layoutmrkadept.main')
@section('main-container')

<link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
<div class="main-panel">
    <div class=" content-wrapper px-2" style="background-color: #f6f6fb">
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

            
        .hidden {
            display: none;
        }
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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

                            <form method="POST" action="{{ route('kadeptsalesjob.update', ['id' => $sc->id, 'index' => $index]) }}" id="myForm" onsubmit="prepareFormForSubmit()">
                                @csrf
                                @method('PUT')
                            <div class="row" style="background-color: #f1f1f6">
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label class="form-label fw-bold">Design Number</label>
                                        <input type="text" class="form-control form-control-sm clickable" name="designno" id="inputdesign"
                                            required  list="designno"/>
                                            <datalist id="designno">
                                                @foreach ($designno as $design)
                                                    <option value="{{ $design->designno }}">{{$design->product}} - {{$design->sap}}</option>
                                                @endforeach
                                                @foreach($docketnew as $design)
                                                    <option value="{{$design->id}}">{{$design->product}} - {{$design->sap}}</option>
                                                @endforeach
                                            </datalist>
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label class="form-label fw-bold">Status Design</label>
                                        <input type="text" class="form-control form-control-sm clickable" name="statusdesign" id="getStatusorder"
                                            placeholder="" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="background-color: #f1f1f6">
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label class="form-label fw-bold">SAP</label>
                                        <input type="text" class="form-control form-control-sm clickable" name="" id="getSap"
                                            required/>
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label class="form-label fw-bold">Product</label>
                                        <input type="text" class="form-control form-control-sm clickable" name="" id="getProduct"
                                            placeholder="" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="background-color: #f1f1f6">
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label class="form-label fw-bold">Note JOB</label>
                                        <input type="text" class="form-control form-control-sm clickable" name="note1" id="getNote1" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="background-color: #f1f1f6">
                                <div class="mt-3" style="font-size: 14px">
                                        <label class="form-label fw-bold">Layout</label>
                                </div>
                            </div>
                            <div class="row" style="background-color: #f1f1f6">
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <select class="form-select" id="fileSelect" name="option" onchange="toggleInputs(this)" >
                                            <option value="" selected>--Select an option--</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        <div>
                        </div>
                            <div id="inputsA" class="hidden">
                                <input type="hidden" name="namalayout" id="geta">
                                <input type="hidden" name="filelayout" id="getfilea">
                            </div>
                            <div id="inputsB" class="hidden">
                                <input type="hidden" name="namalayout" id="getb">
                                <input type="hidden" name="filelayout" id="getfileb">
                            </div>
                            <div id="inputsC" class="hidden">
                                <input type="hidden" name="namalayout" id="getc">
                                <input type="hidden" name="filelayout" id="getfilec">
                            </div>
                            <div id="inputsD" class="hidden">
                                <input type="hidden" name="namalayout" id="getd">
                                <input type="hidden" name="filelayout" id="getfiled">
                            </div>
                            <div id="inputsE" class="hidden">
                                <input type="hidden" name="namalayout" id="gete">
                                <input type="hidden" name="filelayout" id="getfilee">
                            </div>
                            <div id="inputsF" class="hidden">
                                <input type="hidden" name="namalayout" id="getf"> 
                                <input type="hidden" name="filelayout" id="getfilef">
                            </div>
                            <div id="inputsG" class="hidden">
                                <input type="hidden" name="namalayout" id="getg">
                                <input type="hidden" name="filelayout" id="getfileg">
                            </div>
                            <div id="inputsH" class="hidden">
                                <input type="hidden" name="namalayout" id="geth">
                                <input type="hidden" name="filelayout" id="getfileh">
                            </div>
                            <div id="inputsI" class="hidden">
                                <input type="hidden" name="namalayout" id="geti">
                                <input type="hidden" name="filelayout" id="getfilei">
                            </div>
                            <div id="inputsJ" class="hidden">
                                <input type="hidden" name="namalayout" id="getj">
                                <input type="hidde" name="filelayout" id="getfilej">
                            </div>
                            <script>
                            function toggleInputs(radio) {
                                var inputs = document.querySelectorAll('[id^="inputs"]');
                                
                                // Sembunyikan semua input dan nonaktifkan mereka
                                inputs.forEach(function(input) {
                                    input.classList.add('hidden');
                                    var inputFields = input.getElementsByTagName('input');
                                    for (var i = 0; i < inputFields.length; i++) {
                                        inputFields[i].disabled = true;
                                    }
                                });
                                
                                // Tampilkan input yang dipilih dan aktifkan mereka
                                var selectedDiv = document.getElementById('inputs' + radio.value.toUpperCase());
                                selectedDiv.classList.remove('hidden');
                                var selectedInputs = selectedDiv.getElementsByTagName('input');
                                for (var i = 0; i < selectedInputs.length; i++) {
                                    selectedInputs[i].disabled = false;
                                }
                            }
                    
                            function prepareFormForSubmit() {
                                // Nonaktifkan semua input yang tersembunyi
                                var hiddenInputs = document.querySelectorAll('.hidden input');
                                hiddenInputs.forEach(function(input) {
                                    input.disabled = true;
                                });
                            }
                        </script>
                            
                            
                                <div>
                                    <input type="hidden" name="created" value=' {{ Auth::user()->name }}'>
                                    <input type="hidden" class="form-control form-control-sm clickable" name="status" value="Sent">
                                    <input type="hidden" class="form-control form-control-sm clickable" name="statusjob" value="Waiting">
                                    <input type="hidden" class="form-control form-control-sm clickable" name="tanggalterima" id="getTanggalterima" required>
                                    <input type="hidden" class="form-control form-control-sm clickable" name="original" id="getOriginal" required>
                                    <input type="hidden" class="form-control form-control-sm clickable" name="design" id="getDesign"placeholder="" required>
                                    <input type="hidden" class="form-control form-control-sm clickable" name="actcolor" id="getActcolor"placeholder="" required>
                                    <input type="hidden" class="form-control form-control-sm clickable" name="finishingjob" id="getFinishingjob" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable" name="layout" id="getLayout">
                                    <input type="hidden" class="form-control form-control-sm clickable" name="acuanwarna" id="getAcuanwarna">
                                    
                                    
                                    <input type="hidden" class="form-control form-control-sm clickable " name="nops" id="getNops" placeholder="" >
                                    <input type="hidden" class="form-control form-control-sm clickable " name="nwpcs" id="getNwpcs" placeholder="" >
                                    <input type="hidden" class="form-control form-control-sm clickable " name="estimasipackaging" id="getEstimasipackaging" placeholder="" >
                                    <input type="hidden" class="form-control form-control-sm clickable " name="packing" id="getPacking"placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable" name="nwbox" id="getNwbox" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable " name="boxname" id="getBoxname" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable " name="boxspecs" id="getBoxspecs" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable " name="boxsize" id="getBoxsize" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable " name="boxdalampanjang" id="getBoxdalampanjang" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable " name="boxdalamlebar" id="getBoxdalamlebar" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable " name="boxdalamtinggi" id="getBoxdalamtinggi" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable " name="boxluarpanjang" id="getBoxluarpanjang" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable " name="boxluarlebar" id="getBoxluarlebar" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable " name="boxluartinggi" id="getBoxluartinggi" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable " name="effective" id="getEffective" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable " name="preparedate" id="getPreparedate" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable " name="suplier" id="getSuplier" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable " name="isi" id="getIsi" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable " name="isiboxsap" id="getIsiboxsap" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable " name="sapataubendel" id="getSapataubendel" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable " name="susunan" id="getSusunan" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable " name="gambar1" id="getGambar1" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable " name="gambar2" id="getGambar2" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable " name="gambar3" id="getGambar3" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable " name="gambar4" id="getGambar4" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable " name="gambar5" id="getGambar5" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable " name="notepackaging" id="getNotepackaging" placeholder="">
                                    

                                    
                                    
                                    <input type="hidden" class="form-control form-control-sm clickable" name="up" id="getUp" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable" name="aplikasi" id="getAplikasi"placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable " name="ukpresslayout"id="getUkpresslayout" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable" name="pisau" id="getPisau" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable " name="citto" id="getCitto" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable " name="emboss" id="getEmboss" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable" name="hotprint" id="getHotprint" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable" name="mat1" id="getMat1" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable" name="as1" id="getAs1" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable" name="mat2" id="getMat2" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable" name="as2" id="getAs2" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable" name="mat3" id="getMat3" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable" name="as3" id="getAs3" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable" name="f1" id="getF1" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable" name="f2" id="getF2" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable" name="f3" id="getF3" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable " name="f4" id="getF4" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable" name="f5" id="getF5" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable" name="f6" id="getF6" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable" name="b1" id="getB1" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable" name="b2" id="getB2" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable " name="b3" id="getB3" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable" name="b4" id="getB4" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable " name="b5" id="getB5" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable" name="b6" id="getB6" placeholder="">
                                    <input type="hidden" name="nosc" value="{{ $sc->id }}" />
                                    <input type="hidden" name="po" value="{{ $sc->po }}" />
                                    <input type="hidden" name="fileponoprice" value="{{ $sc->fileponoprice }}" />
                                    <input type="hidden" name="tanggalpo" value="{{$sc->tanggalpo }}" />
                                    <input type="hidden" name="tanggalSC" value="{{ $sc->created_at }}" />
                                    <input type="hidden" name="scode" value="{{ $sc->scode }}" />
                                    <input type="hidden" name="customer" value="{{ $sc->customer }}" />
                                    <input type="hidden" name="client" value="{{ $sc->up }}" />
                                    <input type="hidden" name="plantcode" value="{{ $sc->plantcode }}" />
                                    <input type="hidden" name="address" value="{{ $sc->address }}" />
                                    <input type="hidden" name="gensc" value="{{ $selectedItem['gensc'] }}" />
                                    <input type="hidden" name="product" value="{{ $selectedItem['product'] }}" />
                                    <input type="hidden" name="sap" value="{{ $selectedItem['sap'] }}" />
                                    <input type="hidden" name="material" value="{{ $selectedItem['material'] }}" />
                                    <input type="hidden" name="size" value="{{ $selectedItem['size'] }}" />
                                    <input type="hidden" name="finishing" value="{{ $selectedItem['finishing'] }}" />
                                    <input type="hidden" name="specs" value="{{ $selectedItem['specs'] }}" />
                                    <input type="hidden" name="qty" value="{{ $selectedItem['qty'] }}" />
                                    <input type="hidden" name="unit" value="{{ $selectedItem['unit'] }}" />
                                    <input type="hidden" name="price" value="{{ $selectedItem['price'] }}" />
                                    <input type="hidden" name="createdsc" value="{{ $sc->created_at }}" />
                                    <input type="hidden" name="updatedsc" value="{{ $sc->updated_at }}" />
                                    <input type="hidden" name="etauser" value="{{ $selectedItem['etauser']}}"/>
                                    <input type="hidden" name="toleransi" value="{{ $selectedItem['toleransi'] }}" />
                                    <input type="hidden" name="notesc" value="{{ $selectedItem['notesc'] }}" />
                                <input type="hidden" name="jobsc" id="jobsc" class="form-control" value="create job" required>
                                <input type="hidden" name="product" id="product" class="form-control" value="{{ $selectedItem['product'] }}" required>
                                </div>
                                <!-- Add this modal at the bottom of your Blade file -->
                                <button type="submit" class="pt- mt-2 btn-rounded btn btn-gradient-info float-end">
                                    Submit
                                </button>
                        </form>
                        </div>
                    </div>
                </div>
                <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
            <div class="col-12 stretch-card grid-margin" id="">
                <div class="border rounded card">
                    <div class="border rounded shadow card-body ">
                        
                        <div class="">
                            <div class="modal- ">
                                <div class="text-center container-xl pb-0 mb-0">
                                    <h3 class="text-center" style="font-size: 25px">JOB
                                        ORDER</h1>
                                </div>
                            </div>
                            <div class=" pb-4">
                                <div class="">
                                    <div class="border shadow border-secondary" style="background:#F0F0F0">
                                        <div class="">
                                            <div class="">
                                                <p style="font-size:18px" class="fw-bold py-2 px-2 mb-1">Sales Contract - {{ $sc->id }}
                                                </p>
                                            </div>
                                            <div class="row px-4">
                                                <div class="col-lg">
                                                    <p style="font-size:14px" class="mb-1"><span style="font-weight: 600">Customer
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span>
                                                            {{$sc->customer}}
                                                    </p>
                                                    <p style="font-size:14px" class="mb-1"><span style="font-weight: 600">Plant
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                                                        </span>{{$sc->plantcode}}</p>
                                                    <p style="font-size:14px" class="mb-1"><span style="font-weight: 600">Purchase Order
                                                            &nbsp;&nbsp;&nbsp;&nbsp;:</span>
                                                        {{ $sc->po }}
                                                    </p>
                                                    <p style="font-size:14px" class="mb-1"><span style="font-weight: 600">PO Date
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                                                        </span>{{ \Carbon\Carbon::parse($sc->tanggalpo)->format('j M y')}}
                                                    </p>
                                                    <p style="font-size:14px" class="mb-1"><span style="font-weight: 600">Eta User
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                                                        </span>{{ \Carbon\Carbon::parse($selectedItem['etauser'])->format('j M y')}}
                                                    </p>
                                                </div>
                                                <div class="col-lg">
                                                    <p style="font-size:14px" class="mb-1"><span style="font-weight: 600">Product
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span>
                                                        {{ $selectedItem['product'] }}
                                                    </p>
                                                    <p style="font-size:14px" class="mb-1"><span style="font-weight: 600">SAP
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span>
                                                        {{ $selectedItem['sap'] }}
                                                    </p>
                                                    <p style="font-size:14px" class="mb-1"><span style="font-weight: 600">Quantity
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span> {{ $selectedItem['qty'] }}</p>
                                                    <p style="font-size:14px" class="mb-1"><span style="font-weight: 600">Toleransi
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span>
                                                        {{ $selectedItem['toleransi'] }}
                                                    </p>
                                                </div>
                                                <div class="col-lg">
                                                    <p style="font-size:14px" class="mb-1"><span style="font-weight: 600">Material
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span>
                                                        {{ $selectedItem['material'] }}
                                                    </p>
                                                    <p style="font-size:14px" class="mb-1"><span style="font-weight: 600">Size
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span>
                                                       {{ $selectedItem['size'] }}
                                                     </p>
                                                    <p style="font-size:14px" class="mb-1"><span style="font-weight: 600">Specs
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span>
                                                        {{ $selectedItem['specs'] }}
                                                    </p>
                                                    <p style="font-size:14px" class="mb-1"><span style="font-weight: 600">Finishing
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span>
                                                        {{ $selectedItem['finishing'] }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="border border-black" style="background: rgb(255, 255, 255)">
                                            <div class=" border " style="height:450px">
                                                <div class="py-4 ">
                                                    <div class=" px-4 border shadow-sm table-responsive table-responsive1" style="height:400px">
                                                        <table class="table table1 table-bordered border-secondary">
                                                            <thead class="">
                                                                <tr style="background:#F0F0F0; top:10px" class="">
                                                                    <th class="pt-2 pb-2 col-sm-4 fw-bold">Docket Information</th>
                                                                    <th class="pt-2 pb-2 col-sm-8 fw-bold">Value</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr style="" class="table-secondary">
                                                                    <td class="pt-2 pb-2 fst-italic" style="font-weight: 600" colspan="2">
                                                                        Information</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">File Received Date </td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getTanggalterimatext"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Original </td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getOriginaltext"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Design </td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getDesigntext"></span></td>
                                                                </tr>
                                                                <tr style="" class="table-secondary">
                                                                    <td class="pt-2 pb-2 fst-italic " style="font-weight: 600" colspan="2">
                                                                        Specification Product</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Actual Proses </td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getFinishingjobtext"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Application </td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getAplikasitext"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Up :</td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getUptext"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Layout </td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getLayouttext"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Uk Press Layout </td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getUkpresslayouttext"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Material 1 </td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getMat1text"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Material 2 </td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getMat2text"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Material 3 </td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getMat3text"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Arah Serat 1 </td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getAs1text"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Arah Serat 2 </td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getAs2text"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Arah Serat 3 </td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getAs3text"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Pisau </td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getPisautext"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Citto </td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getCittotext"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Emboss</td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getEmbosstext"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Hotprint</td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getHotprinttext"></span></td>
                                                                </tr>
                                                                <tr style="" class="table-secondary">
                                                                    <td class="pt-2 pb-2 fst-italic " style="font-weight: 600" colspan="2">Color
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Actual Color</td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getActcolortext"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Acuan Warna</td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getAcuanwarnatext"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Front 1</td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getF1text"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Front 2</td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getF2text"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Front 3</td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getF3text"></span></td>
                                                                </tr>   
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Front 4</td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getF4text"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Front 5</td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getF5text"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Front 6</td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getF6text"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Back 1</td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getB1text"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Back 2</td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getB2text"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Back 3</td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getB3text"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Back 4</td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getB4text"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Back 5</td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getB5text"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Back 6</td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getB6text"></span></td>
                                                                </tr>
                                                                <tr style="" class="table-secondary">
                                                                    <td class="pt-2 pb-2 fst-italic fw-bold" colspan="2">Packaging</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">No Packaging System</td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getNopstext"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Packaging</td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getPackingtext"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Box Name</td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getBoxnametext"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Box Size</td>
                                                                    <td class="pt-2 pb-2 col-sm-8"<span id="getBoxsizetext"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Box Specs</td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getBoxspecstext"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">NW Box</td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getNwboxtext"></span></td>
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

    <script>
        $(document).ready(function () {
            $('#inputdesign').change(function () {
                var selectedDesign = $(this).val();
                $.ajax({
                    type: 'GET',
                    url: '/get-job-datadesign/' + selectedDesign,
                    success: function (data) {
                        // Mengisi nilai pada input designno
                        var selectElement = $('#fileSelect');
                            selectElement.empty();
                        
                        selectElement.append('<option value="" selected>--Select an option--</option>');
                        if (data.filea) selectElement.append('<option value="a">' + data.a + '</option>');
                        if (data.fileb) selectElement.append('<option value="b">' + data.b + '</option>');
                        if (data.filec) selectElement.append('<option value="c">' + data.c + '</option>');
                        if (data.filed) selectElement.append('<option value="d">' + data.d + '</option>');
                        if (data.filee) selectElement.append('<option value="e">' + data.e + '</option>');
                        if (data.filef) selectElement.append('<option value="f">' + data.f + '</option>');
                        if (data.fileg) selectElement.append('<option value="g">' + data.g + '</option>');
                        if (data.fileh) selectElement.append('<option value="h">' + data.h + '</option>');
                        if (data.filei) selectElement.append('<option value="i">' + data.i + '</option>');
                        if (data.filej) selectElement.append('<option value="j">' + data.j + '</option>');
                        
                        $('#getSap').val(data.sap);
                        $('#getProduct').val(data.product);
                        $('#getTanggalterima').val(data.tanggalterima);
                        $('#getOriginal').val(data.original);
                        $('#getDesign').val(data.design);
                        $('#getStatusorder').val(data.statusorder);
                        $('#getActcolor').val(data.actcolor);
                        $('#getFinishingjob').val(data.finishingjob);
                        $('#getAcuanwarna').val(data.acuanwarna);
                        
                        
                        $('#getNops').val(data.nops);
                        $('#getNwpcs').val(data.nwpcs);
                        $('#getEstimasipackaging').val(data.estimasipackaging);
                        $('#getPacking').val(data.packing);
                        $('#getNwbox').val(data.nwbox);
                        $('#getBoxname').val(data.boxname);
                        $('#getBoxspecs').val(data.boxspecs);
                        $('#getBoxsize').val(data.boxsize);
                        $('#getBoxdalampanjang').val(data.boxdalampanjang);
                        $('#getBoxdalamlebar').val(data.boxdalamlebar);
                        $('#getBoxdalamtinggi').val(data.boxdalamtinggi);
                        $('#getBoxluarpanjang').val(data.boxluarpanjang);
                        $('#getBoxluarlebar').val(data.boxluarlebar);
                        $('#getBoxluartinggi').val(data.boxluartinggi);
                        $('#getEffective').val(data.effective);
                        $('#getPreparedate').val(data.preparedate);
                        $('#getSuplier').val(data.suplier);
                        $('#getIsi').val(data.isi);
                        $('#getIsiboxsap').val(data.isiboxsap);
                        $('#getSapataubendel').val(data.sapataubendel);
                        $('#getSusunan').val(data.susunan);
                        $('#getGambar1').val(data.gambar1);
                        $('#getGambar2').val(data.gambar2);
                        $('#getGambar3').val(data.gambar3);
                        $('#getGambar4').val(data.gambar4);
                        $('#getGambar5').val(data.gambar5);
                        $('#getNotepackaging').val(data.notepackaging);
                        
                        
                        $('#getAplikasi').val(data.aplikasi);
                        $('#getLayout').val(data.layout);
                        $('#getUp').val(data.up);
                        $('#getUkpresslayout').val(data.ukpresslayout);
                        $('#getPisau').val(data.pisau);
                        $('#getCitto').val(data.citto);
                        $('#getEmboss').val(data.emboss);
                        $('#getHotprint').val(data.hotprint);
                        $('#getMat1').val(data.mat1);
                        $('#getAs1').val(data.as1);
                        $('#getMat2').val(data.mat2);
                        $('#getAs2').val(data.as2);
                        $('#getMat3').val(data.mat3);
                        $('#getAs3').val(data.as3);
                        $('#getF1').val(data.f1);
                        $('#getF2').val(data.f2);
                        $('#getF3').val(data.f3);
                        $('#getF4').val(data.f4);
                        $('#getF5').val(data.f5);
                        $('#getF6').val(data.f6);
                        $('#getB1').val(data.b1);
                        $('#getB2').val(data.b2);
                        $('#getB3').val(data.b3);
                        $('#getB4').val(data.b4);
                        $('#getB5').val(data.b5);
                        $('#getB6').val(data.b6);
                        $('#getNote1').val(data.note1);
                        $('#getNote2').val(data.note2);
                        $('#getNote3').val(data.note3);
                        $('#geta').val(data.a);
                        $('#getb').val(data.b);
                        $('#getc').val(data.c);
                        $('#getd').val(data.d);
                        $('#gete').val(data.e);
                        $('#getf').val(data.f);
                        $('#getg').val(data.g);
                        $('#geth').val(data.h);
                        $('#geti').val(data.i);
                        $('#getj').val(data.j);
                        $('#getfilea').val(data.filea);
                        $('#getfileb').val(data.fileb);
                        $('#getfilec').val(data.filec);
                        $('#getfiled').val(data.filed);
                        $('#getfilee').val(data.filee);
                        $('#getfilef').val(data.filef);
                        $('#getfileg').val(data.fileg);
                        $('#getfileh').val(data.fileh);
                        $('#getfilei').val(data.filei);
                        $('#getfilej').val(data.filej);
    
    
                        //text
    
                        $('#getTanggalterimatext').text(data.tanggalterima);
                        $('#getOriginaltext').text(data.original);
                        $('#getDesigntext').text(data.design);
                        $('#getStatusordertext').text(data.statusorder);
                        $('#getActcolortext').text(data.actcolor);
                        $('#getFinishingjobtext').text(data.finishingjob);
                        $('#getAcuanwarnatext').text(data.acuanwarna);
                        $('#getPackingtext').text(data.packing);
                        $('#getNopstext').text(data.nops);
                        $('#getNwboxtext').text(data.nwbox);
                        $('#getBoxnametext').text(data.boxname);
                        $('#getBoxspecstext').text(data.boxspecs);
                        $('#getBoxsizetext').text(data.boxsize);
                        $('#getAplikasitext').text(data.aplikasi);
                        $('#getLayouttext').text(data.layout);
                        $('#getUptext').text(data.up);
                        $('#getUkpresslayouttext').text(data.ukpresslayout);
                        $('#getPisautext').text(data.pisau);
                        $('#getCittotext').text(data.citto);
                        $('#getEmbosstext').text(data.emboss);
                        $('#getHotprinttext').text(data.hotprint);
                        $('#getMat1text').text(data.mat1);
                        $('#getAs1text').text(data.as1);
                        $('#getMat2text').text(data.mat2);
                        $('#getAs2text').text(data.as2);
                        $('#getMat3text').text(data.mat3);
                        $('#getAs3text').text(data.as3);
                        $('#getF1text').text(data.f1);
                        $('#getF2text').text(data.f2);
                        $('#getF3text').text(data.f3);
                        $('#getF4text').text(data.f4);
                        $('#getF5text').text(data.f5);
                        $('#getF6text').text(data.f6);
                        $('#getB1text').text(data.b1);
                        $('#getB2text').text(data.b2);
                        $('#getB3text').text(data.b3);
                        $('#getB4text').text(data.b4);
                        $('#getB5text').text(data.b5);
                        $('#getB6text').text(data.b6);
                        $('#getNote1text').text(data.note1);
                        $('#getNote2text').text(data.note2);
                        $('#getNote3text').text(data.note3);
                    },
                    error: function () {
                        alert('Gagal mengambil data Docket.');
                    }
                });
            });
        });
    </script>



    @endsection
