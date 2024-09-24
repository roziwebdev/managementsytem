@extends('role.purchasing.layoutsmrdept.main')
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
                        <h3 class="text-center pb-3">TENDER MAYORA</h3>
                        <style>
                            .diva {
                            position: relative;
                            overflow: hidden;
                            }
                            .put {
                            position: absolute;
                            font-size: 50px;
                            opacity: 0;
                            right: 0;
                            top: 0;
                            }
                        </style>
                        <div class="float-end   ">
                            {{-- <button class="btn btn-sm btn-warning align-items-center d-flex  text-dark" id="export-btn">
                                <span class=" text-dark material-symbols-outlined">
                                    download
                                </span>Upload File
                            </button> --}}
                        {{-- <form action="{{ route('tenders.import') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                            <div class="diva file btn btn-sm btn-warning align-items-center d-flex  text-dark">
                                <span class=" text-dark material-symbols-outlined">
                                    download
                                </span>Upload File
                                <input class="put" type="file" name="file" />
                            </div>
                        </form> --}}
                        <form action="{{ route('tenders.import') }}" method="POST" enctype="multipart/form-data" id="fileUploadForm" >
                            @csrf
                            <input type="file" id="fileInput" name="file" style="display:none"
                                onchange="document.getElementById('fileUploadForm').submit();">
                            <button class=" btn btn-sm btn-warning align-items-center d-flex  text-dark" type="button" onclick="document.getElementById('fileInput').click();">
                                <span class=" text-dark material-symbols-outlined">
                                    download
                                </span>Upload File
                            </button>
                        </form>
                        </div>
                        <form action="" method="GET" novalidate="novalidate">
                            <div class="d-flex pb-2">
                                <input type="text" name="search" type="search" class="form-control form-control-sm">
                                <button type="submit" class="btn btn-sm btn-gradient-success ">Search</button>
                            </div>
                        </form>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                    document.getElementById('autoSubmitForm').submit();
                                });
                        </script>
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
                                        <th style="font-size: 14px;" scope="col" class="">No</th>
                                        <th style="font-size: 14px;" scope="col" class="">Nama Tender</th>
                                        <th style="font-size: 14px;" scope="col" class="">Referensi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($uniqueNomerRef as $index => $ref)
                                    <tr>
                                    <td style="width:20px;" scope="col" class="sticky">{{ ($uniqueNomerRef->currentPage() - 1) * $uniqueNomerRef->perPage()
                                        + $index + 1 }}</td>
                                    <td style="">{{ $ref->namatender }}</td>
                                    <td style="">
                                        <a style="text-decoration:none;" href="{{ route('tender.byref', $ref->referensi) }}">{{ $ref->referensi }}</a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-2">
                            {{ $uniqueNomerRef->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>




    @endsection