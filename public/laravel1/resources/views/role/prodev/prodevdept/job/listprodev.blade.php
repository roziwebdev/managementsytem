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

        <div class="row" id='row'>
            <div class="">
                <div class="shadow card rounded-xl">
                    <div class="border shadow card-body">
                        <h3 class="pb-3 text-center">JOB ORDER</h3>
                        <div class="py-3 d-flex">
                         <div class="dropdown">
                                <a class="px-5 btn btn-sm btn-dark dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    SORT
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="/prodev/job" class="dropdown-item ">
                                            <span class="px-2 align-middle material-symbols-outlined" style="font-size: 20px">
                                                clear_all
                                            </span>Clear
                                        </a>
                                    </li>
                                    <li>
                                        <form action="" method="GET" novalidate="novalidate">
                                            <input type="hidden" name="sort_by" value="asc">
                                            <button type="submit" class="dropdown-item ">
                                                <span class="px-2 align-middle material-symbols-outlined" style="font-size: 20px">
                                                    text_rotate_up
                                                </span>Ascending
                                            </button>
                                        </form>
                                    </li>
                                    <li>
                                        <form action="" method="GET" novalidate="novalidate">
                                            <input type="hidden" name="sort_by" value="desc">
                                            <button type="submit" class="dropdown-item ">
                                                <span class="px-2 align-middle material-symbols-outlined" style="font-size: 20px">
                                                    text_rotation_down
                                                </span>Descending
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <form action="{{ route('job.index') }}" method="GET" novalidate="novalidate">
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
                                        <th style="font-size: 14px; width:20px;" scope="col" class="sticky">NO SC</th>
                                        <th style="font-size: 14px;" scope="col" class="">STS SC</th>
                                        <th style="font-size: 14px;" scope="col" class="">PO</th>
                                        <th style="font-size: 14px;" scope="col" class="">TANGGAL PO</th>
                                        <th style="font-size: 14px;" scope="col" class="">TANGGAL SC</th>
                                        <th style="font-size: 14px;" scope="col" class="">PRODUCT</th>
                                        <th style="font-size: 14px;" scope="col" class="">SAP</th>
                                        <th style="font-size: 14px;" scope="col" class="">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sc as $data)
                                    @php
                                        $products = json_decode($data->product) ?? [];
                                        $saps = json_decode($data->sap) ?? [];
                                        $materials = json_decode($data->material) ?? [];
                                        $sizes = json_decode($data->size) ?? [];
                                        $finishings = json_decode($data->finishing) ?? [];
                                        $specs = json_decode($data->specs) ?? [];
                                        $qtys = json_decode($data->qty) ?? [];
                                        $units = json_decode($data->unit) ?? [];
                                        $prices = json_decode($data->price) ?? [];
                                        $totals = json_decode($data->total) ?? [];
                                        $etausers = json_decode($data->etauser) ?? [];
                                        $toleransis = json_decode($data->toleransi) ?? [];
                                        $statusproducts = json_decode($data->statusproduct) ?? [];
                                        $combinedData = array_map(null,$products,$saps,$materials,$sizes,$finishings,$specs,$qtys,$units,$prices,$totals,$etausers,$toleransis,$statusproducts);
                                    @endphp
                                    @foreach ($combinedData as $index => $all )
                                        <tr>
                                            <td style="font-size: 14px; width:20px; padding-top:2px; padding-bottom:2px;"
                                            scope="col" class="sticky">{{ $data->id}}</td>
                                            <td style="padding-top:2px; padding-bottom:2px;">{{ $all[12]}}</td>
                                            <td style="padding-top:2px; padding-bottom:2px;">{{ $data->po}}</td>
                                            <td style="padding-top:2px; padding-bottom:2px;">{{\Carbon\Carbon::parse($data->created_at)->format('j M y') }}</td>
                                            <td style="padding-top:2px; padding-bottom:2px;">{{\Carbon\Carbon::parse($data->tanggalpo)->format('j M y') }}</td>
                                            <td style="padding-top:2px; padding-bottom:2px;">{{ $all[0] }}</td>
                                            <td style="padding-top:2px; padding-bottom:2px;">{{ $all[1] }}</td>
                                            <td style="padding-top:2px; padding-bottom:2px;">
                                                <a href="{{ route('job.createshowsc', ['id' => $data->id, 'index' => $index]) }}"
                                                    class="btn btn-primary btn-sm">Detail</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-3">
                            {{ $sc->appends(request()->query())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    @endsection
