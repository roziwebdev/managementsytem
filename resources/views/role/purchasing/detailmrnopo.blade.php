@extends('role.purchasing.layouts.main')
@section('main-container')
        <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
    <div class="main-panel">
        <div class="    content-wrapper" style="background-color: #f6f6fb">
            <div class="page-header">
                <h3 class="page-title">
                    <span class="page-title-icon bg-gradient-info text-white me-2">
                        <i class="mdi mdi-home"></i>
                    </span> Dashboard
                </h3>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">
                            <span></span>Overview <i
                                class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="row ">
                <div class="">
                    <div class="card rounded-xl shadow">
                        <div class="card-body shadow border">
                            <h3 class="text-center pb-3">Material Request MR- {{ $materialrequest->id }}</h3>



                            <div class="table-responsive">
                                <style>
                                    th.sticky {
                                        position: sticky;
                                        left: 0;
                                        background-color: #f1f1f6;
                                    }
                                </style>
                                <table class="table">
                                    <thead>
                                        <tr class="" style="background-color: #f1f1f6">


                                            <th style="font-size: 14px; " class="py-2 my-2"> Item </th>
                                            <th style="font-size: 14px" class="py-2 my-2"> Specs </th>
                                            <th style="font-size: 14px" class="py-2 my-2"> Sizes </th>
                                            <th style="font-size: 14px" class="py-2 my-2"> ETA User </th>
                                            <th style="font-size: 14px; " class="py-2 my-2"> Serat </th>
                                            <th style="font-size: 14px" class="py-2 my-2"> QTY </th>
                                            <th style="font-size: 14px" class="py-2 my-2"> Remarks </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @php
                                            $items = json_decode($materialrequest->item);
                                            $specs = json_decode($materialrequest->specs);
                                            $sizes = json_decode($materialrequest->size);
                                            $etausers = json_decode($materialrequest->etauser);
                                            $qtys = json_decode($materialrequest->qty);
                                            $remarks = json_decode($materialrequest->mrdate);
                                            $arahserat = json_decode($materialrequest->arahseratp);
                                            // Gabungkan semua data menjadi satu array dengan zip
                                            $combinedData = array_map(null, $items, $specs, $sizes, $etausers, $arahserat, $qtys, $remarks);
                                        @endphp
                                        @foreach ($combinedData as $data)
                                            <tr>
                                                <div class="table-responsive">
                                                    {{-- ETA User --}}
                                                    <td>{{ $data[0] }}</td>
                                                    <td>{{ $data[1] }}</td>
                                                    <td>{{ $data[2] }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($data[3])->format('j M y') }}</td>
                                                    <td>{{ $data[4] }}</td>
                                                    <td>{{ $data[5] }}</td>
                                                    <td>{{ $data[6] }}</td>
                                            </tr>
                                        @endforeach

                                    </tbody>


                                </table>
                                <div class="pt-2">
                                    {{-- {{ $materialrequests->links() }} --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
@endsection
