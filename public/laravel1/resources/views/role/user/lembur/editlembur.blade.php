@extends('role.purchasing.layoutsuser.main')
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

        <div class="row" id='row'>
            <div class="col-12 stretch-card grid-margin" id="myForm">
                <div class="border rounded card">
                    <div class="border rounded shadow card-body">
                        <h4 class="mb-3 card-title">Form Edit SPL</h4>
                        <form class="form-sample" method="POST" action="{{ route('spluser.update', $lembur->id) }}" id="pricelistForm">
                            @method("PUT")
                            @csrf
                            @php
                            $namas = json_decode($lembur->namakaryawan);
                            $jabatans = json_decode($lembur->jabatan);
                            $mulais = json_decode($lembur->mulai);
                            $istirahats = json_decode($lembur->istirahat);
                            $berakhirs = json_decode($lembur->berakhir);
                            $hasillemburs = json_decode($lembur->hasillembur);
                            $departements = json_decode($lembur->departement);
                            $totaljams = json_decode($lembur->totaljam);
                            $keteranganpekerjaans = json_decode($lembur->keteranganpekerjaan);
                            $units = json_decode($lembur->unit);
                            $combinedData =
                            array_map(null,$namas,$jabatans,$departements,$mulais,$istirahats,$berakhirs,$hasillemburs,$totaljams,$keteranganpekerjaans,$units);
                            @endphp
                            @foreach ($combinedData as $data)
                            <div id='row2'>
                                <div class=" row" style="background-color: #f1f1f6">
                                    <div class="mt-3 col-md ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Nama</label>
                                            <input type="text" class="form-control form-control-sm clickable" name="namakaryawan[]" required
                                                id="input1" value="{{ $data[0] }}">
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Jabatan</label>
                                            <input type="text" class="form-control form-control-sm clickable" name="jabatan[]" required
                                                id="input1" value="{{ $data[1] }}">
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Departement</label>
                                            <input type="text" class="form-control form-control-sm clickable" name="departement[]" required
                                                id="input1" value="{{ $data[2] }}">
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md " style="width: 24px">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Start</label>
                                            <input type="datetime-local" class="form-control form-control-sm clickable" name="mulai[]" required
                                                value="{{ $data[3] }}" id="datetime">
                                        </div>
                                    </div>
                                     <div class="mt-3 col-md">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold ">Break</label>
                                            <input class="form-control form-control-sm" name="istirahat[]" value="{{ $data[4] }}"/>
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md" style="width: 24px">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold ">End</label>
                                            <input type="datetime-local" class="form-control form-control-sm clickable" name="berakhir[]"
                                                placeholder="" required value="{{ $data[5] }}" id="datetime">
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold ">Hasil Lembur</label>
                                            <input type="text" class="form-control form-control-sm clickable" name="hasillembur[]"
                                                placeholder=""  value="{{ $data[6] }}">
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold ">Unit</label>
                                            <input type="text" class="form-control form-control-sm clickable" name="unit[]" placeholder=""
                                                 list="unit" value="{{$data[9]}}">
                                            <datalist id="unit">
                                                <option value="PCS">PCS</option>
                                                <option value="DRIK">DRIK</option>
                                            </datalist>
                                        </div>
                                    </div>
                                </div>
                                <div class=" row stretch-card grid-margin" style="background-color: #f1f1f6">
                                    <div class="mt-3 col-md">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold ">Keterangan Pekerjaan</label>
                                            <textarea name="keteranganpekerjaan[]" rows="" cols="40" class="form-control">{{ $data[8] }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div>
                                <button type="submit" class="mt-2 btn-rounded btn btn-gradient-info float-end">
                                    Submit
                                </button>
                            </div>
                            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
    var now = new Date();
    var year = now.getFullYear();
    var month = String(now.getMonth() + 1).padStart(2, '0');
    var day = String(now.getDate()).padStart(2, '0');
    var hours = String(now.getHours()).padStart(2, '0');
    var minutes = String(now.getMinutes()).padStart(2, '0');
    var currentDateTime = year + '-' + month + '-' + day + 'T' + hours + ':' + minutes;
    
    var datetimeInputs = document.querySelectorAll('input[type="datetime-local"]');
    datetimeInputs.forEach(function(input) {
        input.min = currentDateTime;
    });
    </script>
    <script>
      var today = new Date().toISOString().split('T')[0];
      document.getElementById('date').min = today;
    </script>

@endsection