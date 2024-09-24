@extends('role.purchasing.layoutsmrmanager.main')
@section('main-container')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
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
</style>
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
        <div class="">
            <div class="shadow card rounded-xl">
                <div class="border shadow card-body">
                    @php
                    $firstTender = $tenders->first();
                    @endphp
                    <h3 class="pb-3 text-center">TENDER {{ $firstTender->namatender }} / {{$referensi}}</h3>
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
                                    <th style="width:20px;" style="font-size: 14px;" scope="col" class="sticky">No</th>
                                    <th style="font-size: 14px;" scope="col" class="">Plant</th>
                                    <th style="font-size: 14px;" scope="col" class="">SAP</th>
                                    <th style="font-size: 14px;" scope="col" class="">Product</th>
                                    <th style="font-size: 14px;" scope="col" class="">Specs</th>
                                    <th style="font-size: 14px;" scope="col" class="">Quantity</th>
                                    <th style="font-size: 14px;" scope="col" class="">Remaining</th>
                                    <th style="font-size: 14px;" scope="col" class="">Unit</th>
                                    <th style="font-size: 14px;" scope="col" class="">Price/Unit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tenders as $index => $tender)
                                <tr>
                                    <td style="width:20px;" scope="col" class="sticky">{{ ($tenders->currentPage() - 1)
                                        * $tenders->perPage()
                                        + $index + 1 }}</td>
                                    <td style="padding-top:4px; padding-bottom:4px;">{{ $tender->idplant }}</td>
                                    <td style="padding-top:4px; padding-bottom:4px;">{{ $tender->sap }}</td>
                                    <td style="padding-top:4px; padding-bottom:4px;">{{ $tender->product }}</td>
                                    <td style="padding-top:4px; padding-bottom:4px;">{{ $tender->specs }}</td>
                                    <td style="padding-top:4px; padding-bottom:4px;">{{ $tender->quantity }}</td>
                                    <td style="padding-top:4px; padding-bottom:4px;">{{ $tender->sisa }}</td>
                                    <td style="padding-top:4px; padding-bottom:4px;">{{ $tender->unit }}</td>
                                    <td style="padding-top:4px; padding-bottom:4px;">{{ $tender->harga }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-2">
                        {{ $tenders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>




@endsection