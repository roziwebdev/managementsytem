@extends('role.purchasing.layoutmrkadept.main')
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
                        <h4 class="mb-3 card-title">Form SPL Satpam</h4>
                        <form class="form-sample" method="POST" action="{{ route('lembursatpamkadept.store') }}"
                            id="pricelistForm">
                            @csrf
                            <input type="hidden" name="status" value="Waiting List" />
                            <input type="hidden" class="form-control form-control-sm " name="pemberiperintah" value=' {{ Auth::user()->name }}'>
                            <div id='row2'>
                                <div class=" row" style="background-color: #f1f1f6">
                                    <div class="mt-3 col-md ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Nama</label>
                                            <input type="text" class="form-control form-control-sm clickable"
                                                name="namakaryawan[]" required id="input1" list="kar">
                                            <datalist id="kar">
                                                @foreach ($satpam as $karyawan )
                                                <option value="{{ $karyawan->nama }}">
                                                    @endforeach
                                            </datalist>
                                        </div>
                                    </div>
                                    <input type="hidden" class="form-control form-control-sm clickable"
                                        name="outsourcing[]" required id="input2">
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
                                            <label for="" class="form-label fw-bold ">Break<sup class="text-danger">*menit</sup></label>
                                            <input type="text" class="form-control form-control-sm clickable" name="istirahat[]"
                                            placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md" style="width: 24px">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold ">End</label>
                                            <input type="datetime-local" class="form-control form-control-sm clickable"
                                                name="berakhir[]" placeholder="" required id="datetime">
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold ">Pekerjaan</label>
                                            <input type="text" class="form-control form-control-sm clickable"
                                                name="pekerjaan[]" placeholder=""  >
                                        </div>
                                    </div>
                        
                                    
                                </div>
                                <div class=" row stretch-card grid-margin" style="background-color: #f1f1f6">
                                    <div class="mt-3 col-md">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold ">Keterangan Pekerjaan</label>
                                            <textarea name="keteranganpekerjaan[]" rows="" cols="40"
                                                class="form-control"></textarea>
                                        </div>
                                    </div>
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
                        <h3 class="pb-3 text-center">SURAT PERINTAH LEMBUR SATPAM
                        @if($status)
                            - Status: {{ ucfirst($status) }}
                        @endif
                        </h3>
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
                                                        <a href="/salesdept" class="dropdown-item ">
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
                                        <th class="sticky" style="font-size: 14px; width:;" scope="col">NAMA</th>
                                        <th class="text-center" style="font-size: 14px; width:;" scope="col">
                                            <div class="dropdown">
                                                    <a class="absolute text-dark text-decoration-none dropdown-toggle"
                                                        href="#" role="button" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        STS
                                                    </a>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                 <form action="" method="GET"
                                                                    novalidate="novalidate">
                                                                    <input type="hidden" name="departement" value="{{ request('departement') }}">
                                                                    <input type="hidden" name="status"
                                                                        value="">
                                                                    <button type="submit"
                                                                        class="dropdown-item ">
                                                                        <span
                                                                            class="material-symbols-outlined align-middle px-2"
                                                                            style="font-size: 20px">
                                                                            clear_all
                                                                        </span>All Status
                                                                    </button>
                                                                </form>
                                                            </li>
                                                            <li>
                                                                 <form action="" method="GET"
                                                                    novalidate="novalidate">
                                                                    <input type="hidden" name="departement" value="{{ request('departement') }}">
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
                                                                    <input type="hidden" name="departement" value="{{ request('departement') }}">
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
                                                                    <input type="hidden" name="departement" value="{{ request('departement') }}">
                                                                    <input type="hidden" name="status"
                                                                        value="Revisi">
                                                                    <button type="submit"
                                                                        class="dropdown-item ">
                                                                        <span
                                                                            class="material-symbols-outlined align-middle px-2"
                                                                            style="font-size: 20px">
                                                                            edit
                                                                        </span>Revised
                                                                    </button>
                                                                </form>
                                                            </li>
                                                            <li>
                                                                 <form action="" method="GET"
                                                                    novalidate="novalidate">
                                                                    <input type="hidden" name="departement" value="{{ request('departement') }}">
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
                                        <th class="text-center" style="font-size: 14px; width:;" scope="col">JABATAN</th>
                                        <th class="text-center" style="font-size: 14px; width:;" scope="col">OUTSOURCING</th>
                                        <th class="text-center" style="font-size: 14px; width:;" scope="col">TGL LEMBUR</th>
                                        <th class="text-center" style="font-size: 14px; width:;" scope="col">START</th>
                                        <th class="text-center" style="font-size: 14px; width:;" scope="col">BREAK</th>
                                        <th class="text-center" style="font-size: 14px; width:;" scope="col">END</th>
                                        <th class="text-center" style="font-size: 14px; width:;" scope="col">TOTAL JAM</th>
                                        <th class="text-center" style="font-size: 14px; width:;" scope="col">PEKERJAAN</th>
                                        <th class="" style="font-size: 14px; width:;" scope="col">KET PEKERJAAN</th>
                                        <th class="text-center" style="font-size: 14px; width:;" scope="col">CREATED</th>
                                        <th class="text-center" style="font-size: 14px; width:;" scope="col">NOTE</th>
                                        <th style="font-size: 14px;" scope="col" class="">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lemburs as $lembur )
                                    @php
                                    $namas = json_decode($lembur->namakaryawan);
                                    $jabatans = json_decode($lembur->jabatan);
                                    $mulais = json_decode($lembur->mulai);
                                    $istirahats = json_decode($lembur->istirahat);
                                    $berakhirs = json_decode($lembur->berakhir);
                                    $outsourcings = json_decode($lembur->outsourcing);
                                    $totaljams = json_decode($lembur->totaljam);
                                    $keteranganpekerjaans = json_decode($lembur->keteranganpekerjaan);
                                    $pekerjaans = json_decode($lembur->pekerjaan);
                                    $combinedData =
                                    array_map(null,$namas,$jabatans,$outsourcings,$mulais,$istirahats,$berakhirs,$totaljams,$pekerjaans,$keteranganpekerjaans);
                                    @endphp
                                    @foreach ($combinedData as $data )
                                    <tr>
                                        <td class="text-center sticky" style="padding-top: 5px; padding-bottom: 5px">{{ $lembur->id }}</td>
                                        <td class="sticky" style="padding-top: 5px; padding-bottom: 5px">{{ $data[0] }}</td>
                                        <td class="text-center" style="padding-top: 5px; padding-bottom: 5px">
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
                                        <td class="text-center" style="padding-top: 5px; padding-bottom: 5px">{{ $data[1] }}</td>
                                        <td class="text-center" style="padding-top: 5px; padding-bottom: 5px">{{ $data[2] }}</td>
                                        <td class="text-center" style="padding-top: 5px; padding-bottom: 5px">{{ \Carbon\Carbon::parse($lembur->tgllembur)->format('d M y') }}</td>
                                        <td class="text-center" style="padding-top: 5px; padding-bottom: 5px">{{ \Carbon\Carbon::parse($data[3])->format('h:i A') }}</td>
                                        <td class="text-center" style="padding-top: 5px; padding-bottom: 5px">{{ $data[4] }}</td>
                                        <td class="text-center" style="padding-top: 5px; padding-bottom: 5px">{{ \Carbon\Carbon::parse($data[5])->format('h:i A') }}</td>
                                        <td class="text-center" style="padding-top: 5px; padding-bottom: 5px">{{ $data[6] }}</td>
                                        <td class="text-center" style="padding-top: 5px; padding-bottom: 5px">{{ $data[8] }}</td>
                                        <td class="text-center" style="padding-top: 5px; padding-bottom: 5px">{{ $data[7] }}</td>
                                        <td class="text-center" style="padding-top: 5px; padding-bottom: 5px">{{ $lembur->pemberiperintah }}</td>
                                        <td class="text-center" style="padding-top: 5px; padding-bottom: 5px">{{ $lembur->note }}</td>
                                        <td style="padding-top: 5px; padding-bottom:5px;" class="d-flex ">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-gradient-info dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    Manage
                                                </a>
                                                <ul class="dropdown-menu">
                                                    @if ($lembur->status == "Waiting" || $lembur->status == "Waiting List" || $lembur->status == "Revisi")
                                                    <li><a class="dropdown-item" href="{{ route('lembursatpamkadept.edit', $lembur->id) }}">Edit</a></li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    {{-- modalHRGA --}}
                                        <div class="modal fade" id="editStatusModalhrga{{ $lembur->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="editStatusModalLabel{{ $lembur->id }}" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editStatusModalLabel{{ $lembur->id }}">Approval SPL
                                                        </h5> 
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Form untuk mengedit status -->
                                                        @if ($lembur->status == 'Approve')
                                                        <form action="{{ route('updateStatusdepthrd', $lembur->id) }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="">
                                                                {{-- Radio buttons untuk mengubah status --}}
                                                                <h5>Revisi</h5>
                                                                <label class="btn btn-success ">
                                                                    <input type="radio" value="Revisi" id="newStatus" name="newStatus">
                                                                    Revisi
                                                                </label>
                                                            </div>
                                                            <hr>
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                        </form>
                                                        @elseif ($lembur->status == 'Declined')
                                                        {{-- Cek status sebelumnya --}}
                                                        <p>MR sudah Approve/Declined sebelumnya.</p>
                                                        @else
                                                        <form action="{{ route('updateStatusdepthrd', $lembur->id) }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="">
                                                                {{-- Radio buttons untuk mengubah status --}}
                                                                <h5>Approve</h5>
                                                                <label class="btn btn-success ">
                                                                    <input type="radio" value="Approve" id="newStatus" name="newStatus">
                                                                    Approve
                                                                </label>
                                                                
                                                                <hr>
                                                                <h5>Revision</h5>
                                                                <label class="btn btn-secondary ">
                                                                    <input type="radio" value="Revisi" id="newStatus" name="newStatus">
                                                                    Revision
                                                                </label>
                                                                <hr>
                                                                <h5>Declined</h5>
                                                                <label class="btn btn-danger ">
                                                                    <input type="radio" value="Declined" id="newStatus" name="newStatus" />
                                                                    Declined
                                                                </label>
                                                                  <hr>
                                                                        <div class="mb-3">
                                                                            <label for="note" class="form-label fw-bold">Note</label>
                                                                            <textarea class="form-control" id="note" name="note" rows="3">{{$lembur->note}}</textarea>
                                                                        </div>
                                                            </div>
                                                            <hr>
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                        </form>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-2">
                            
                            {{ $lemburs->appends(request()->query())->links() }}
                            
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
            var inputOutsourcing = parentElement.find('input[name="outsourcing[]"]');
            var inputJabatan = parentElement.find('input[name="jabatan[]"]');
            // Melakukan Ajax request ke server untuk mendapatkan data client dan address berdasarkan namacustomer
            $.ajax({
                type: 'GET',
                url: '/get-karyawansatpam/' + selectedKaryawan, // Gantilah dengan URL endpoint yang sesuai di Laravel
                success: function (data) {
                    // Mengisi nilai pada input kedua dan ketiga
                    inputOutsourcing.val(data.outsourcing);
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
                                <input type="datetime-local" class="form-control form-control-sm clickable" name="mulai[]" required id="datetime${counter2}">
                            </div>
                        </div>
                        <div class="mt-3 col-md">
                            <div class="mb-3" style="font-size: 14px">
                                <label for="" class="form-label fw-bold ">Break</label>
                                <input type="text" class="form-control form-control-sm clickable" name="istirahat[]"
                                    placeholder="" required>
                            </div>
                        </div>
                        <div class="mt-3 col-md" style="width: 24px">
                            <div class="mb-3" style="font-size: 14px">
                                <label for="" class="form-label fw-bold ">End</label>
                                <input type="datetime-local" class="form-control form-control-sm clickable" name="berakhir[]"
                                    placeholder="" required id="datetime${counter2}">
                            </div>
                        </div>
                        <div class="mt-3 col-md">
                            <div class="mb-3" style="font-size: 14px">
                                <label for="" class="form-label fw-bold ">Pekerjaan</label>
                                <input type="text" class="form-control form-control-sm clickable" name="pekerjaan[]" placeholder=""
                                    >
                            </div>
                        </div>
                        <div class="mt-3 col-md">
                            <div class="mb-3" style="font-size: 14px">
                                <label for="" class="form-label fw-bold ">Hasil Lembur</label>
                                <input type="text" class="form-control form-control-sm clickable" name="hasillembur[]" placeholder=""
                                    >
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
 
    });
</script>

<script>
    document.getElementById('exportButton').addEventListener('click', function() {
        var table = document.getElementById('myTable');
        var rows = table.querySelectorAll('tr');
        var csv = [];

        for (var i = 0; i < rows.length; i++) {
            var row = [], cols = rows[i].querySelectorAll('td, th');

            for (var j = 0; j < cols.length; j++) {
                row.push(cols[j].innerText);
            }

            csv.push(row.join(','));
        }

        // Download CSV file
        downloadCSV(csv.join('\n'), 'table.csv');
    });

    function downloadCSV(csv, filename) {
        var csvFile;
        var downloadLink;

        csvFile = new Blob([csv], {type: 'text/csv'});
        downloadLink = document.createElement('a');
        downloadLink.download = filename;
        downloadLink.href = window.URL.createObjectURL(csvFile);
        downloadLink.style.display = 'none';
        document.body.appendChild(downloadLink);
        downloadLink.click();
    }
</script>

     
     
<script type="text/javascript">
    $(document).ready(function() {
        @if($errors->any())
            $('#errorModal').modal('show');
        @endif
    });
</script>

@endsection