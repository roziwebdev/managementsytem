@extends('role.purchasing.layoutsmrmanager.main')
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
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <div class="row" id='row'>
                <div class="">
                    <div class="shadow card rounded-xl">
                        <div class="border shadow card-body">
                            <h3 class="pb-3 text-center">Data Karyawan Staff</h3>
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
                                            <th style="font-size: 14px; width:;" scope="col">
                                                <div class="dropdown">
                                                    <a class="absolute text-dark text-decoration-none dropdown-toggle"
                                                        href="#" role="button" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        NAMA
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
                                                                <input type="hidden" name="sort_by" value="ascproduct">
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
                                                                <input type="hidden" name="sort_by" value="descproduct">
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
                                            <th style="font-size: 14px; width:;" scope="col">DEPARTEMENT</th>
                                            <th style="font-size: 14px; width:;" scope="col">POSISI</th>
                                            <th style="font-size: 14px; width:;" scope="col">LOKASi</th>
                                            <th style="font-size: 14px; width:;" scope="col">TANGGAL MASUK</th>
                                            <th style="font-size: 14px; width:;" scope="col">STATUS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($karyawanstaffs as $karyawan )
                                        <tr>
                                            <td style="padding-top: 5px; padding-bottom: 5px">{{ $karyawan->id }}</td>
                                            <td style="padding-top: 5px; padding-bottom: 5px">{{ $karyawan->nama }}</td>
                                            <td style="padding-top: 5px; padding-bottom: 5px">{{ $karyawan->departement }}</td>
                                            <td style="padding-top: 5px; padding-bottom: 5px">{{ $karyawan->jabatan }}</td>
                                            <td style="padding-top: 5px; padding-bottom: 5px">{{ $karyawan->lokasi }}</td>
                                            <td style="padding-top: 5px; padding-bottom: 5px">{{\Carbon\Carbon::parse($karyawan->tmk)->format('d M y') }}</td>
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
                                {{ $karyawanstaffs->appends(request()->query())->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

@endsection