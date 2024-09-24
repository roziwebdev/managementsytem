@extends('role.purchasing.layoutsmrmanager.main')
@section('main-container')

<link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
<div class="main-panel">
    <div class=" content-wrapper" style="background-color: #f6f6fb">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <div class="row" id='row'>
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
                                                        <a href="/mgrkaryawan" class="dropdown-item ">
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
                                                        <a href="/mgrkaryawan" class="dropdown-item ">
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
                                                            <input type="hidden" name="sort_by" value="ascname">
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
                                                            <input type="hidden" name="sort_by" value="descname">
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
                                                    DEPARTEMENT
                                                </a>
                                                <ul class="dropdown-menu">
                                                     <li>
                                                        <a href="/mgrkaryawan"
                                                            class="dropdown-item ">
                                                           All Dept
                                                        </a>
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
                                        <th style="font-size: 14px; width:;" scope="col">BAGIAN</th>
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
                                                        <a href="/mgrkaryawan"
                                                            class="dropdown-item ">
                                                           All Status
                                                        </a>
                                                    </li>
                                                    <li>
                                                         <form action="" method="GET"
                                                            novalidate="novalidate">
                                                            <input type="hidden" name="sort_by" value="{{ request('sort_by') }}">
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
                                                             <input type="hidden" name="sort_by" value="{{ request('sort_by') }}">
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
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($karyawans as $karyawan )
                                    <tr>
                                        <td style="padding-top: 5px; padding-bottom: 5px">{{ $karyawan->id }}</td>
                                        <td style="padding-top: 5px; padding-bottom: 5px">{{ $karyawan->nama }}</td>
                                        <td style="padding-top: 5px; padding-bottom: 5px">{{ $karyawan->departement }}</td>
                                        <td style="padding-top: 5px; padding-bottom: 5px">{{ $karyawan->jabatan }}</td>
                                        <td style="padding-top: 5px; padding-bottom: 5px">{{ $karyawan->bagian }}</td>
                                        <td style="padding-top: 5px; padding-bottom: 5px">{{ $karyawan->lokasi }}</td>
                                        <td style="padding-top: 5px; padding-bottom: 5px">{{\Carbon\Carbon::parse($karyawan->tglmasuk)->format('d M y') }}</td>
                                        @if($karyawan->status == "AKTIF")
                                        <td style="padding-top: 5px; padding-bottom: 5px"><span class="badge bg-gradient-success rounded-lg"> {{ $karyawan->status }} </span></td>
                                        @else
                                        <td style="padding-top: 5px; padding-bottom: 5px"><span class="badge bg-gradient-danger rounded-lg"> {{ $karyawan->status }} </span></td>
                                        @endif
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div class="mt-2">
                            {{ $karyawans->appends(request()->query())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

@endsection