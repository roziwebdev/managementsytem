@extends('role.purchasing.layoutmrkadept.main')
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
            <script>
                $(document).ready(function(){
                                $("#myButton").click(function(){
                                    $("#myForm").fadeToggle();
                                });
                            });
            </script>
            <div class="py-2 justify-content-end d-flex">
                <button id="myButton" class="btn btn-info">Add Employe</button>
            </div>
            <div class="row" id='row'>
                <div class="col-12 stretch-card grid-margin" id="myForm">
                    <div class="border rounded card">
                        <div class="border rounded shadow card-body">
                            <h4 class="mb-3 card-title">Form New Employee</h4>
                            <form class="form-sample" method="POST" action="{{ route('staffkadept.store') }}"
                                id="pricelistForm">
                                @csrf
                                <input type="hidden" name="status" value="AKTIF">
                                <div id='row2'>
                                    <div class="shadow row" style="background-color: #f1f1f6">
                                        <div class="mt-3 col-md ">
                                            <div class="mb-3" style="font-size: 14px">
                                                <label for="" class="form-label fw-bold">Nama</label>
                                                <input type="text" class="form-control form-control-sm clickable"
                                                    name="nama" required>
                                            </div>
                                        </div>
                                        <div class="mt-3 col-md ">
                                            <div class="mb-3" style="font-size: 14px">
                                                <label for="" class="form-label fw-bold">NPK</label>
                                                <input type="text" class="form-control form-control-sm clickable"
                                                    name="npk" required>
                                            </div>
                                        </div>
                                        <div class="mt-3 col-md ">
                                            <div class="mb-3" style="font-size: 14px">
                                                <label for="" class="form-label fw-bold">Departement</label>
                                                <input type="text" class="form-control form-control-sm clickable"
                                                    name="departement" required>
                                            </div>
                                        </div>
                                        <div class="mt-3 col-md ">
                                            <div class="mb-3" style="font-size: 14px">
                                                <label for="" class="form-label fw-bold">Posisi</label>
                                                <input type="text" class="form-control form-control-sm clickable"
                                                    name="jabatan" required>
                                            </div>
                                        </div>
                                        <div class="mt-3 col-md ">
                                            <div class="mb-3" style="font-size: 14px">
                                                <label for="" class="form-label fw-bold">Bagian</label>
                                                <input type="text" class="form-control form-control-sm clickable"
                                                    name="bagian" required>
                                            </div>
                                        </div>
                                        <div class="mt-3 col-md ">
                                            <div class="mb-3" style="font-size: 14px">
                                                <label for="" class="form-label fw-bold">Lokasi</label>
                                                <input type="text" class="form-control form-control-sm clickable"
                                                    name="lokasi" required>
                                            </div>
                                        </div>
                                        <div class="mt-3 col-md">
                                            <div class="mb-3" style="font-size: 14px">
                                                <label for="" class="form-label fw-bold ">Tanggal Masuk</label>
                                                <input type="date" class="form-control form-control-sm clickable"
                                                    name="tmk" placeholder="" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button type="submit" class="mt-2 btn-rounded btn btn-gradient-info float-end">
                                        Submit
                                    </button>
                                </div>
                                <!-- Add this modal at the bottom of your Blade file -->
                                <div class="modal fade" id="successModal" tabindex="-1" role="dialog"
                                    aria-labelledby="successModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="successModalLabel">Success!</h5>
                                            </div>
                                            <div class="modal-body">
                                                Customer berhasil di tambahkan.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="shadow card rounded-xl">
                        <div class="border shadow card-body">
                            <h3 class="pb-3 text-center">Data Karyawan</h3>
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
                                </style>
                                <table class="table" id="materialRequestTable">
                                    <thead>
                                        <tr style="background-color: #f1f1f6">
                                            <th style="font-size: 14px; width:20px;" scope="col" class="">
                                                <div class="dropdown">
                                                    <a class="absolute text-dark text-decoration-none dropdown-toggle"
                                                        href="#" role="button" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        ID
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a href="/staffkadept" class="dropdown-item ">
                                                                <span class="px-2 align-middle material-symbols-outlined"
                                                                    style="font-size: 20px">
                                                                    clear_all
                                                                </span>Clear
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <form action="" method="GET" novalidate="novalidate">
                                                                <input type="hidden" name="departement" value="{{ request('departement') }}">
                                                                <input type="hidden" name="status" value="{{ request('status') }}">
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
                                                                <input type="hidden" name="departement" value="{{ request('departement') }}">
                                                                <input type="hidden" name="status" value="{{ request('status') }}">
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
                                            <th style="font-size: 14px; width:;" scope="col">
                                                <div class="dropdown">
                                                    <a class="absolute text-dark text-decoration-none dropdown-toggle"
                                                        href="#" role="button" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        NAMA
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a href="/staff" class="dropdown-item ">
                                                                <span class="px-2 align-middle material-symbols-outlined"
                                                                    style="font-size: 20px">
                                                                    clear_all
                                                                </span>Clear
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <form action="" method="GET" novalidate="novalidate">
                                                                <input type="hidden" name="departement" value="{{ request('departement') }}">
                                                                <input type="hidden" name="status" value="{{ request('status') }}">
                                                                <input type="hidden" name="sort_by" value="ascnama">
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
                                                                <input type="hidden" name="departement" value="{{ request('departement') }}">
                                                                <input type="hidden" name="status" value="{{ request('status') }}">
                                                                <input type="hidden" name="sort_by" value="descnama">
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
                                            <th style="font-size: 14px; width:;" scope="col">NPK</th>
                                            <th style="font-size: 14px; width:;" scope="col">
                                            <div class="dropdown">
                                                <a class="absolute text-dark text-decoration-none dropdown-toggle"
                                                    href="#" role="button" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    DEPARTEMENT
                                                </a>
                                                <ul class="dropdown-menu">
                                         <li>
                                            <a href="/staffkadept"
                                                class="dropdown-item ">
                                               All Dept
                                            </a>
                                        </li>
                                        <li>
                                             <form action="" method="GET"
                                                novalidate="novalidate">
                                                 <input type="hidden" name="sort_by" value="{{ request('sort_by') }}">
                                                <input type="hidden" name="status" value="{{ request('status') }}">
                                                <input type="hidden" name="departement"
                                                    value="Design">
                                                <button type="submit" class="dropdown-item ">
                                                    Design
                                                </button>
                                            </form>
                                        </li>
                                        <li>
                                             <form action="" method="GET"
                                                novalidate="novalidate">
                                                  <input type="hidden" name="sort_by" value="{{ request('sort_by') }}">
                                                <input type="hidden" name="status" value="{{ request('status') }}">
                                                <input type="hidden" name="departement" value="FA & TAX">
                                                <button type="submit" class="dropdown-item ">
                                                    FA & TAX
                                                </button>
                                            </form>
                                        </li>
                                        <li>
                                             <form action="" method="GET"
                                                novalidate="novalidate">
                                                  <input type="hidden" name="sort_by" value="{{ request('sort_by') }}">
                                                <input type="hidden" name="status" value="{{ request('status') }}">
                                                <input type="hidden" name="departement"
                                                    value="General Manager">
                                                <button type="submit" class="dropdown-item ">
                                                    General Manager
                                                </button>
                                            </form>
                                        </li>
                                        <li>
                                             <form action="" method="GET"
                                                novalidate="novalidate">
                                                  <input type="hidden" name="sort_by" value="{{ request('sort_by') }}">
                                                <input type="hidden" name="status" value="{{ request('status') }}">
                                                <input type="hidden" name="departement"
                                                    value="HRGA">
                                                <button type="submit" class="dropdown-item ">
                                                    HRGA
                                                </button>
                                            </form>
                                        </li>
                                        <li>
                                             <form action="" method="GET"
                                                novalidate="novalidate">
                                                  <input type="hidden" name="sort_by" value="{{ request('sort_by') }}">
                                                <input type="hidden" name="status" value="{{ request('status') }}">
                                                <input type="hidden" name="departement"
                                                    value="IT">
                                                <button type="submit" class="dropdown-item ">
                                                    IT
                                                </button>
                                            </form>
                                        </li>
                                        <li>
                                             <form action="" method="GET"
                                                novalidate="novalidate">
                                                  <input type="hidden" name="sort_by" value="{{ request('sort_by') }}">
                                                <input type="hidden" name="status" value="{{ request('status') }}">
                                                <input type="hidden" name="departement"
                                                    value="Logistik">
                                                <button type="submit" class="dropdown-item ">
                                                    Logistik
                                                </button>
                                            </form>
                                        </li>
                                        <li>
                                             <form action="" method="GET"
                                                novalidate="novalidate">
                                                 <input type="hidden" name="sort_by" value="{{ request('sort_by') }}">
                                                <input type="hidden" name="status" value="{{ request('status') }}">
                                                <input type="hidden" name="departement"
                                                    value="PPIC RM">
                                                <button type="submit" class="dropdown-item ">
                                                    PPIC RM
                                                </button>
                                            </form>
                                        </li>
                                        <li>
                                             <form action="" method="GET"
                                                novalidate="novalidate">
                                                 <input type="hidden" name="sort_by" value="{{ request('sort_by') }}">
                                                <input type="hidden" name="status" value="{{ request('status') }}">
                                                <input type="hidden" name="departement"
                                                    value="PPIC RM">
                                                <button type="submit" class="dropdown-item ">
                                                    PPIC SM
                                                </button>
                                            </form>
                                        </li>
                                        <li>
                                             <form action="" method="GET"
                                                novalidate="novalidate">
                                                  <input type="hidden" name="sort_by" value="{{ request('sort_by') }}">
                                                <input type="hidden" name="status" value="{{ request('status') }}">
                                                <input type="hidden" name="departement"
                                                    value="Prodev">
                                                <button type="submit" class="dropdown-item ">
                                                    Prodev
                                                </button>
                                            </form>
                                        </li>
                                        <li>
                                             <form action="" method="GET"
                                                novalidate="novalidate">
                                                 <input type="hidden" name="sort_by" value="{{ request('sort_by') }}">
                                                <input type="hidden" name="status" value="{{ request('status') }}">
                                                <input type="hidden" name="departement"
                                                    value="Produksi">
                                                <button type="submit" class="dropdown-item ">
                                                    Produksi
                                                </button>
                                            </form>
                                        </li>
                                        <li>
                                             <form action="" method="GET"
                                                novalidate="novalidate">
                                                 <input type="hidden" name="sort_by" value="{{ request('sort_by') }}">
                                                <input type="hidden" name="status" value="{{ request('status') }}">
                                                <input type="hidden" name="departement"
                                                    value="Purhcasing">
                                                <button type="submit" class="dropdown-item ">
                                                    Purchasing
                                                </button>
                                            </form>
                                        </li>
                                        <li>
                                             <form action="" method="GET"
                                                novalidate="novalidate">
                                                  <input type="hidden" name="sort_by" value="{{ request('sort_by') }}">
                                                <input type="hidden" name="status" value="{{ request('status') }}">
                                                <input type="hidden" name="departement"
                                                    value="QA">
                                                <button type="submit" class="dropdown-item ">
                                                    QA
                                                </button>
                                            </form>
                                        </li>
                                        <li>
                                             <form action="" method="GET"
                                                novalidate="novalidate">
                                                  <input type="hidden" name="sort_by" value="{{ request('sort_by') }}">
                                                <input type="hidden" name="status" value="{{ request('status') }}">
                                                <input type="hidden" name="departement"
                                                    value="QC">
                                                <button type="submit" class="dropdown-item ">
                                                    QC
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                            </div>
                                        </th>
                                            <th style="font-size: 14px; width:;" scope="col">POSISI</th>
                                            <th style="font-size: 14px; width:;" scope="col">LOKASI</th>
                                            <th style="font-size: 14px; width:;" scope="col">TANGGAL MASUK</th>
                                            <th style="font-size: 14px; width:;" scope="col">
                                            <div class="dropdown">
                                                <a class="absolute text-dark text-decoration-none dropdown-toggle"
                                                    href="#" role="button" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    STATUS
                                                </a>
                                                <ul class="dropdown-menu">
                                                     <li>
                                                        <a href="/staffkadept"
                                                            class="dropdown-item ">
                                                           All Status
                                                        </a>
                                                    </li>
                                                    <li>
                                                         <form action="" method="GET"
                                                            novalidate="novalidate">
                                                            <input type="hidden" name="departement" value="{{ request('departement') }}">
                                                            <input type="hidden" name="status"
                                                                value="AKTIF">
                                                            <button type="submit" class="dropdown-item ">
                                                                Aktif
                                                            </button>
                                                        </form>
                                                    </li>
                                                    <li>
                                                         <form action="" method="GET"
                                                            novalidate="novalidate">
                                                            <input type="hidden" name="departement" value="{{ request('departement') }}">
                                                            <input type="hidden" name="status" value="TIDAKAKTIF">
                                                            <button type="submit" class="dropdown-item ">
                                                                Tidak Aktif
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
                                        @foreach ($karyawanstaffs as $karyawan )
                                        <tr>
                                            <td style="padding-top: 5px; padding-bottom: 5px">{{ $karyawan->id }}</td>
                                            <td style="padding-top: 5px; padding-bottom: 5px">{{ $karyawan->nama }}</td>
                                            <td style="padding-top: 5px; padding-bottom: 5px">{{ $karyawan->npk }}</td>
                                            <td style="padding-top: 5px; padding-bottom: 5px">{{ $karyawan->departement }}</td>
                                            <td style="padding-top: 5px; padding-bottom: 5px">{{ $karyawan->jabatan }}</td>
                                            <td style="padding-top: 5px; padding-bottom: 5px">{{ $karyawan->lokasi }}</td>
                                            <td style="padding-top: 5px; padding-bottom: 5px">{{\Carbon\Carbon::parse($karyawan->tmk)->format('d M y') }}</td>
                                            @if($karyawan->status == "AKTIF")
                                            <td style="padding-top: 5px; padding-bottom: 5px"><span class="badge bg-gradient-success rounded-lg"> {{ $karyawan->status }} </span></td>
                                            @else
                                            <td style="padding-top: 5px; padding-bottom: 5px"><span class="badge bg-gradient-danger rounded-lg"> {{ $karyawan->status }} </span></td>
                                            @endif
                                            <td style="padding-top: 3px; padding-bottom:3px;" class="d-flex ">
                                                <div class="dropdown">
                                                    <a class="btn btn-sm btn-primary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        Manage
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="{{ route('staffkadept.edit', $karyawan->id) }}">Edit</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-2">
                                {{ $karyawanstaffs->appends(request()->query())->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
@endsection