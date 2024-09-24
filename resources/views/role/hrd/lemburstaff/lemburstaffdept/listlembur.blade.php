@extends('role.purchasing.layoutsmrdept.main')
@section('main-container')

<link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
    
    <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="errorModalLabel">ERROR</h5>
                </div>
                <div class="modal-body">
                    @if($errors->any())
                            @foreach ($errors->all() as $error)
                                <p class="">{{ $error }}</p>
                            @endforeach
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    
<div class="main-panel">
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
        <div class="py-2 justify-content-end d-flex">
            <button id="myButton" class="btn btn-info">Add SPL</button>
        </div>
        <div class="row" id='row'>
            <div class="col-12 stretch-card grid-margin" id="myForm">
                <div class="border rounded card">
                    <div class="border rounded shadow card-body">
                        <h4 class="mb-3 card-title">Form SPL</h4>
                        <form class="form-sample" method="POST" action="{{ route('splstaff.store') }}"
                            id="pricelistForm">
                            @csrf
                            <input type="hidden" name="status" value="Waiting" />
                            <input type="hidden" class="form-control form-control-sm " name="pemberiperintah" value=' {{ Auth::user()->name }}'>
                            <div id='row2'>
                                <div class=" row" style="background-color: #f1f1f6">
                                    <div class="mt-3 col-md ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Nama</label>
                                            <input type="text" class="form-control form-control-sm clickable"
                                                name="namakaryawan[]" required id="input1" list="kar">
                                            <datalist id="kar">
                                                @foreach ($karyawanstaff as $karyawan )
                                                <option value="{{ $karyawan->nama }}">
                                                    @endforeach
                                            </datalist>
                                        </div>
                                    </div>
                                    <input type="hidden" class="form-control form-control-sm clickable"
                                        name="departement[]" required id="input2">
                                    <input type="hidden" class="form-control form-control-sm clickable" name="jabatan[]"
                                        required id="input3">
                                    <div class="mt-3 col-md ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Tanggal Lembur</label>
                                            <input type="date" class="form-control form-control-sm clickable"
                                                name="tgllembur" required id="date1">
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md " style="width: 24px">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Start</label>
                                            <input type="datetime-local" class="form-control form-control-sm clickable"
                                                name="mulai[]" required id="datetime">
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold ">Break <sup class="text-danger">*menit</sup></label>
                                            <input type="text" class="form-control form-control-sm clickable" name="istirahat[]" placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md" style="width: 24px">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold ">End</label>
                                            <input type="datetime-local" class="form-control form-control-sm clickable"
                                                name="berakhir[]" placeholder="" required id="datetime" >
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold ">Pekerjaan</label>
                                            <input type="text" class="form-control form-control-sm clickable"
                                                name="pekerjaan[]" placeholder="" >
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold ">Hasil Lembur</label>
                                            <input type="text" class="form-control form-control-sm clickable"
                                                name="hasillembur[]" placeholder="" >
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold ">Unit</label>
                                            <input type="text" class="form-control form-control-sm clickable"
                                                name="unit[]" placeholder="" list="unit">
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
                                            <textarea name="keteranganpekerjaan[]" rows="" cols="40" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div id="newinput2"></div>
                                    <div id="rowAdder2" class="my-3 btn btn-gradient-success btn-sm">Add</div>
                                </div>
                            </div>
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
            <div class="">
                <div class="shadow card rounded-xl">
                    <div class="border shadow card-body">
                        <h3 class="pb-3 text-center">SURAT PERINTAH LEMBUR STAFF</h3>
                        <form action="" method="GET">
                            <div class="form-row d-sm-flex justify-content-center align-items-center">
                                <div class="form-group col-md-4">
                                    <label for="tgl_mulai">Tanggal Mulai</label>
                                    <input type="date" class="form-control form-control-sm" id="tgl_mulai" name="tgl_mulai"
                                        value="{{ request('tgl_mulai') }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="tgl_akhir">Tanggal Akhir</label>
                                    <input type="date" class="form-control form-control-sm" id="tgl_akhir" name="tgl_akhir"
                                        value="{{ request('tgl_akhir') }}">
                                </div>
                                <div class="d-flex px-2 gap-2">
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                    <button class="btn btn-dark btn-sm" onclick="exportTableToCSV('myTable', 'spl_staff.csv')">
                                        <span class="material-symbols-outlined">
                                            download
                                        </span>
                                    </button>
                                </div>
                            </div>
                            <input type="hidden" name="status" value="Approve" />
                        </form>
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
                                    z-index:1;
                                }
                                td.sticky {
                                    position: sticky;
                                    left: 0;
                                    background-color: #ffffff;
                                    z-index:1;
                                }
                            </style>
                            <table class="table" id="myTable">
                                <thead>
                                    <tr style="background-color: #f1f1f6">
                                        <th style="font-size: 14px; width:20px;" scope="col" class="text-center sticky">
                                            <div class="dropdown">
                                                <a class="absolute text-dark text-decoration-none dropdown-toggle"
                                                    href="#" role="button" data-bs-toggle="dropdown" 
                                                    aria-expanded="false">
                                                    GROUP
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="/splstaff" class="dropdown-item ">
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

                                        <th class="text-center sticky" style="font-size: 14px; width:;" scope="col">NAMA</th>
                                        <th class="text-center" style="font-size: 14px; width:;" scope="col">POSISI</th>
                                        <th class="text-center" style="font-size: 14px; width:;" scope="col">DEPT</th>
                                        <th class="text-center" style="font-size: 14px; width:;" scope="col">TGL LEMBUR</th>
                                        <th class="text-center" style="font-size: 14px; width:;" scope="col">START</th>
                                        <th class="text-center" style="font-size: 14px; width:;" scope="col">BREAK</th>
                                        <th class="text-center" style="font-size: 14px; width:;" scope="col">END</th>
                                        <th class="text-center" style="font-size: 14px; width:;" scope="col">TOTAL JAM</th>
                                        <th class="text-center" style="font-size: 14px; width:;" scope="col">PEKERJAAN</th>
                                        <th class="text-center" style="font-size: 14px; width:;" scope="col">HASIL</th>
                                        <th class="" style="font-size: 14px; width:;" scope="col">KET</th>
                                        <th class="text-center" style="font-size: 14px; width:;" scope="col">CREATED BY</th>
                                        <th class="text-center" style="font-size: 14px; width:;" scope="col">CREATED AT</th>
                                        <th class="text-center" style="font-size: 14px; width:;" scope="col">NOTE</th>
                                        <th class="text-center" style="font-size: 14px; width:;" scope="col">
                                            <div class="dropdown">
                                                <a class="absolute text-dark text-decoration-none dropdown-toggle"
                                                    href="#" role="button" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    STS
                                                </a>
                                                 <ul class="dropdown-menu">
                                        <li>
                                            <a href="/splstaff"
                                                class="dropdown-item ">
                                                <span
                                                    class="material-symbols-outlined align-middle px-2"
                                                    style="font-size: 20px">
                                                    clear_all
                                                </span>All Status
                                            </a>
                                        </li>
                                        <li>
                                             <form action="" method="GET"
                                                novalidate="novalidate">
                                                <input type="hidden" name="status"
                                                    value="Approve">
                                                <button type="submit"
                                                    class="dropdown-item ">
                                                    <span
                                                        class="material-symbols-outlined align-middle px-2"
                                                        style="font-size: 20px">
                                                        check_circle
                                                    </span>Approve
                                                </button>
                                            </form>
                                        </li>
                                        <li>
                                             <form action="" method="GET"
                                                novalidate="novalidate">
                                                <input type="hidden" name="status"
                                                    value="Waiting">
                                                <button type="submit"
                                                    class="dropdown-item ">
                                                    <span
                                                        class="material-symbols-outlined align-middle px-2"
                                                        style="font-size: 20px">
                                                        error
                                                    </span>Waiting
                                                </button>
                                            </form>
                                        </li>
                                        <li>
                                             <form action="" method="GET"
                                                novalidate="novalidate">
                                                <input type="hidden" name="status"
                                                    value="Waiting List">
                                                <button type="submit"
                                                    class="dropdown-item ">
                                                    <span
                                                        class="material-symbols-outlined align-middle px-2"
                                                        style="font-size: 20px">
                                                         hourglass_top
                                                    </span>Waiting List
                                                </button>
                                            </form>
                                        </li>
                                        <li>
                                             <form action="" method="GET"
                                                novalidate="novalidate">
                                                <input type="hidden" name="status"
                                                    value="Revisi">
                                                <button type="submit"
                                                    class="dropdown-item ">
                                                    <span
                                                        class="material-symbols-outlined align-middle px-2"
                                                        style="font-size: 20px">
                                                         edit
                                                    </span>Revisi
                                                </button>
                                            </form>
                                        </li>
                                       
                                        <li>
                                             <form action="" method="GET"
                                                novalidate="novalidate">
                                                <input type="hidden" name="status"
                                                    value="Declined">
                                                <button type="submit"
                                                    class="dropdown-item ">
                                                    <span
                                                        class="material-symbols-outlined align-middle px-2"
                                                        style="font-size: 20px">
                                                        cancel
                                                    </span>Declined
                                                </button>
                                            </form>
                                        </li>

                                    </ul>
                                            </div>
                                        </th>
                                        <th style="font-size: 14px;" scope="col" class="">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lemburstaffs as $lembur )
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
                                    $pekerjaans = json_decode($lembur->pekerjaan);
                                    $combinedData =
                                    array_map(null,$namas,$jabatans,$departements,$mulais,$istirahats,$berakhirs,$hasillemburs,$totaljams,$keteranganpekerjaans,$pekerjaans);
                                    @endphp
                                    @foreach ($combinedData as $data ) 
                                    @if( $data[2] == auth()->user()->departement)
                                    <tr>
                                        <td class="text-center sticky" style="padding-top: 5px; padding-bottom: 5px" >{{ $lembur->id }}</td>
                                        <td class="sticky" style="padding-top: 5px; padding-bottom: 5px">{{ $data[0] }}</td>
                                        <td class="text-center"  style="padding-top: 5px; padding-bottom: 5px">{{ $data[1] }}</td>
                                        <td class="text-center"  style="padding-top: 5px; padding-bottom: 5px">{{ $data[2] }}</td>
                                        <td class="text-center"  style="padding-top: 5px; padding-bottom: 5px">{{ \Carbon\Carbon::parse($lembur->tgllembur)->format('d M y') }}</td>
                                        <td class="text-center"  style="padding-top: 5px; padding-bottom: 5px">{{ \Carbon\Carbon::parse($data[3])->format('h:i A') }}</td>
                                        <td class="text-center"  style="padding-top: 5px; padding-bottom: 5px">{{ $data[4] }}</td>
                                        <td class="text-center"  style="padding-top: 5px; padding-bottom: 5px">{{ \Carbon\Carbon::parse($data[5])->format('h:i A') }}</td>
                                        <td class="text-center"  style="padding-top: 5px; padding-bottom: 5px">{{ $data[7] }}</td>
                                        <td class="text-center"  style="padding-top: 5px; padding-bottom: 5px">{{ $data[9] }}</td>
                                        <td class="text-center"  style="padding-top: 5px; padding-bottom: 5px">{{ $data[6] }}</td>
                                        <td class=""  style="padding-top: 5px; padding-bottom: 5px">{{ $data[8] }}</td>
                                        <td class="text-center" style="padding-top: 5px; padding-bottom: 5px">{{ $lembur->pemberiperintah }}</td>
                                        <td class="text-center" style="padding-top: 5px; padding-bottom: 5px">{{ \Carbon\Carbon::parse($lembur->created_at)->timezone('Asia/Jakarta')->format('d M y H:i A') }}</td>
                                        <td class="text-center" style="padding-top: 5px; padding-bottom: 5px">{{ $lembur->note }}</td>
                                        <td class="text-center"  style="padding-top: 5px; padding-bottom: 5px">
                                            @if ($lembur->status == "Waiting")
                                            <span class="material-symbols-outlined text-warning" style='font-size:18px'>
                                                error
                                            </span>
                                            @elseif ($lembur->status =="Waiting List")
                                            <span class="material-symbols-outlined text-primary" style='font-size:18px'>
                                                hourglass_top
                                            </span>
                                            @elseif ($lembur->status =="Declined")
                                            <span class="material-symbols-outlined text-danger" style='font-size:18px'>
                                                cancel
                                            </span>
                                            @elseif ($lembur->status =="Approve")
                                            <span class="material-symbols-outlined text-success" style='font-size:18px'>
                                                check_circle
                                            </span>
                                            @elseif ($lembur->status =="Revisi")
                                            <span class="material-symbols-outlined text-dark" style='font-size:18px'>
                                                edit
                                            </span>
                                            @endif
                                        </td>
                                        <td style="padding-top: 5px; padding-bottom:5px;" class="d-flex ">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-gradient-info dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    Manage
                                                </a>
                                                <ul class="dropdown-menu">
                                                    @if  ($lembur->status != "Approve")
                                                    <li><a class="dropdown-item" href="{{ route('splstaff.edit', $lembur->id) }}">Edit</a></li>
                                                    <li>
                                                        <form id="deleteForm{{ $lembur->id }}" action="{{ route('splstaff.destroy', $lembur->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="dropdown-item" type="button" onclick="confirmDelete({{ $lembur->id }})">Delete</button>
                                                        </form>
                                                    </li>
                                                    <script>
                                                        function confirmDelete(id) {
                                                            if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
                                                                document.getElementById('deleteForm' + id).submit();
                                                            }
                                                        }
                                                    </script>
                                                    @endif
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-2">
                            @if ($applyPagination)
                            {{ $lemburstaffs->appends(request()->query())->links() }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
     <script>
     let counter2 = 1;
        function handleRemoveItem2(id) {
            $(`#row2${id}`).remove();
        }
    $(document).ready(function () {
        // Fungsi yang dipanggil saat nilai input pertama berubah
        $(document).on('change', 'input[name="namakaryawan[]"]', function () {
            // Mendapatkan nilai yang dipilih pada input pertama
            var selectedKaryawan = $(this).val();
            // Menemukan elemen parent dan mencari input yang diinginkan di dalamnya
            var parentElement = $(this).closest('.row');
            var inputDepartement = parentElement.find('input[name="departement[]"]');
            var inputJabatan = parentElement.find('input[name="jabatan[]"]');
            // Melakukan Ajax request ke server untuk mendapatkan data client dan address berdasarkan namacustomer
            $.ajax({
                type: 'GET',
                url: '/get-karyawanstaff/' + selectedKaryawan, // Gantilah dengan URL endpoint yang sesuai di Laravel
                success: function (data) {
                    // Mengisi nilai pada input kedua dan ketiga
                    inputDepartement.val(data.departement);
                    inputJabatan.val(data.jabatan);
                },
                error: function () {
                    alert('Gagal mengambil data karyawan.');
                }
            });
        });

        // Fungsi untuk menambahkan baris baru
        
        $("#rowAdder2").click(function () {
            newRowAdd2 = `
                <div id='row2${counter2}'>
                    <div class="row" style="background-color: #f1f1f6">
                        <div class="mt-3 col-md">
                            <div class="mb-3" style="font-size: 14px">
                                <label for="" class="form-label fw-bold">Nama</label>
                                <input type="text" class="form-control form-control-sm clickable" name="namakaryawan[]" required
                                    id="input1" list="kar">
                                <datalist id="kar">

                                </datalist>
                            </div>
                        </div>
                        <input type="hidden" class="form-control form-control-sm clickable" name="departement[]" required id="input2">
                        <input type="hidden" class="form-control form-control-sm clickable" name="jabatan[]" required id="input3">
                        <div class="mt-3 col-md" style="width: 24px">
                            <div class="mb-3" style="font-size: 14px">
                                <label for="" class="form-label fw-bold">Start</label>
                                <input type="datetime-local" class="form-control form-control-sm clickable" name="mulai[]" id="datetime${counter2}" required >
                            </div>
                        </div>
                        <div class="mt-3 col-md">
                            <div class="mb-3" style="font-size: 14px">
                                <label for="" class="form-label fw-bold ">Break <sup class="text-danger">*menit</sup></label>
                                <input type="text" class="form-control form-control-sm clickable" name="istirahat[]"
                                    placeholder="" required>
                            </div>
                        </div>
                        <div class="mt-3 col-md" style="width: 24px">
                            <div class="mb-3" style="font-size: 14px">
                                <label for="" class="form-label fw-bold ">End</label>
                                <input type="datetime-local" class="form-control form-control-sm clickable" name="berakhir[]" id="datetime${counter2}"
                                    placeholder="" required >
                            </div>
                        </div>
                        <div class="mt-3 col-md">
                            <div class="mb-3" style="font-size: 14px">
                                <label for="" class="form-label fw-bold ">Pekerjaan</label>
                                <input type="text" class="form-control form-control-sm clickable" name="pekerjaan[]" placeholder="">
                            </div>
                        </div>
                        <div class="mt-3 col-md">
                            <div class="mb-3" style="font-size: 14px">
                                <label for="" class="form-label fw-bold ">Hasil Lembur</label>
                                <input type="text" class="form-control form-control-sm clickable" name="hasillembur[]" placeholder="">
                            </div>
                        </div>
                        <div class="mt-3 col-md">
                            <div class="mb-3" style="font-size: 14px">
                                <label for="" class="form-label fw-bold ">Unit</label>
                                <input type="text" class="form-control form-control-sm clickable" name="unit[]" placeholder=""
                                     list="unit">
                                <datalist id="unit">
                                    <option value="PCS">PCS</option>
                                    <option value="DRIK">DRIK</option>
                                </datalist>
                            </div>
                        </div>
                    </div>
                    <div class="row stretch-card grid-margin" style="background-color: #f1f1f6">
                        <div class="mt-3 col-md">
                            <div class="mb-3" style="font-size: 14px">
                                <label for="" class="form-label fw-bold ">Keterangan Pekerjaan</label>
                                <textarea name="keteranganpekerjaan[]" rows="4" cols="40" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div  class="my-3 btn btn-gradient-danger btn-sm" onclick="handleRemoveItem2(${counter2})">Remove</div>
                    </div>
                </div>
            `;
            $("#newinput2").append(newRowAdd2);
            
            
            var originalRow = $('#row2').find('.row');
            var newRow = $('#row2' + counter2).find('.row');
        
            // Menyalin nilai input mulai[], berakhir[], break[], hasillembur[], unit[], dan keteranganpekerjaan[] dari row asli ke row baru
            var inputsToCopy = ['mulai[]', 'berakhir[]', 'istirahat[]', 'hasillembur[]', 'unit[]','pekerjaan[]'];
            inputsToCopy.forEach(function(inputName) {
            var originalInput = originalRow.find('input[name="' + inputName + '"]');
            var newInput = newRow.find('input[name="' + inputName + '"]');
            newInput.val(originalInput.val());
            });
        
            var originalTextarea = originalRow.find('textarea[name="keteranganpekerjaan[]"]');
            var newTextarea = newRow.find('textarea[name="keteranganpekerjaan[]"]');
            newTextarea.val(originalTextarea.val());
            
        
            $('#row2' + counter2).find('input[type="datetime-local"]').each(function(index) {
                $(this).attr('min', currentDateTime);
            });
            
            
            counter2++;
            
            var now = new Date();
            var year = now.getFullYear();
            var month = String(now.getMonth() + 1).padStart(2, '0');
            var day;
            
            if (now.getDay() === 1) { // monday
                day = String(now.getDate() - 3).padStart(2, '0');
            } else {
                day = String(now.getDate() - 1).padStart(2, '0');
            }
            
            var hours = String(now.getHours()).padStart(2, '0');
            var minutes = String(now.getMinutes()).padStart(2, '0');
            var currentDateTime = year + '-' + month + '-' + day + 'T' + hours + ':' + minutes;
            
            var datetimeInputs = document.querySelectorAll('input[type="datetime-local"]');
            datetimeInputs.forEach(function(input) {
                input.min = currentDateTime;
            });
            
            var today = new Date().toISOString().split('T')[0];
            document.getElementById('date').min = today;
            
            });

        // Fungsi validasi tanggal
       
    });
</script>



<script>
      function downloadCSV(csv, filename) {
        var csvFile;
        var downloadLink;

        // CSV file
        csvFile = new Blob([csv], { type: "text/csv" });

        // Download link
        downloadLink = document.createElement("a");

        // File name
        downloadLink.download = filename;

        // Create a link to the file
        downloadLink.href = window.URL.createObjectURL(csvFile);

        // Hide download link
        downloadLink.style.display = "none";

        // Add the link to DOM
        document.body.appendChild(downloadLink);

        // Click download link
        downloadLink.click();
      }

      function exportTableToCSV(tableId, filename) {
        var csv = [];
        var rows = document.getElementById(tableId).querySelectorAll("tr");

        for (var i = 0; i < rows.length; i++) {
          var row = [],
            cols = rows[i].querySelectorAll("td, th");

          for (var j = 0; j < cols.length; j++) {
            // Menggunakan tanda kutip ganda dan mengganti kembali tanda kutip ganda dalam teks dengan dua tanda kutip ganda
            var cellText = cols[j].innerText.replace(/"/g, '""');
            // Memasukkan seluruh teks dalam satu sel menggunakan tanda kutip ganda
            row.push('"' + cellText + '"');
          }

          csv.push(row.join(","));
        }

        // Download CSV file
        downloadCSV(csv.join("\n"), filename);
      }
    </script>

        <script>
        var now = new Date();
        var year = now.getFullYear();
        var month = String(now.getMonth() + 1).padStart(2, '0');
        var day;
        
        if (now.getDay() === 1) { // monday
            day = String(now.getDate() - 3).padStart(2, '0');
        } else {
            day = String(now.getDate() - 1).padStart(2, '0');
        }
        
        var hours = String(now.getHours()).padStart(2, '0');
        var minutes = String(now.getMinutes()).padStart(2, '0');
        var currentDateTime = year + '-' + month + '-' + day + 'T' + hours + ':' + minutes;
        
        var datetimeInputs = document.querySelectorAll('input[type="datetime-local"]');
        datetimeInputs.forEach(function(input) {
            input.min = currentDateTime;
        });
        
        var today = new Date().toISOString().split('T')[0];
        document.getElementById('date').min = today;
      </script>

    <script>
      var yesterday = new Date();
      if (yesterday.getDay() === 1) { // Monday
          yesterday.setDate(yesterday.getDate() - 3);
      } else {
          yesterday.setDate(yesterday.getDate() - 1);
      }
      var previousDay = yesterday.toISOString().split('T')[0];
      document.getElementById('date1').min = previousDay;
     </script>
     <script type="text/javascript">
        $(document).ready(function() {
            @if($errors->any())
                $('#errorModal').modal('show');
            @endif
        });
    </script>

@endsection