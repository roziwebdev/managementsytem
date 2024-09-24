@extends('role.purchasing.layoutmrkadept.main')
@section('main-container')


<link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" /> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>    
<div class="main-panel">
    <style>
        p{
                font-family: "Inter", sans-serif;
                font-optical-sizing: auto;
                font-weight: <weight>;
                    font-style: normal;
                    font-variation-settings:
                    "slnt" 0;
        }
        .table-responsive1 {
        overflow-y: auto;
        max-height: 400px; /* Atur ketinggian maksimum jika diperlukan */
        }

        /* Atur posisi dan z-index untuk thead */
        .table1 thead th {
        background-color: #F0F0F0;
        position: sticky;
        top: 0;
        z-index: 100; /* Atur z-index untuk memastikan thead di atas konten tabel */
        }

        /* Atur z-index konten tabel agar berada di bawah thead yang ditempel */
        .table1 tbody {
        position: relative;
        z-index: 0;
        }
    </style>
    <div style="display:none " class="table-responsive">
        <table id="myTable" class=" table ">
            <thead>
                <tr>
                    <th>JOB</th>
                    <th>NO SC</th>
                    <th>DESIGN NO</th>
                    <th>STATUS</th>
                    <th>TGL JOB</th>
                    <th>TGL SC</th>
                    <th>PO</th>
                    <th>TGL PO</th>
                    <th>S-CODE</th>
                    <th>CUSTOMER</th>
                    <th>ID</th>
                    <th>ETA</th>
                    <th>CLIENT</th>
                    <th>PLANTCODE</th>
                    <th>ADDRESS</th>
                    <th>PRODUCT</th>
                    <th>MATERIAL</th>
                    <th>SAP</th>
                    <th>SIZE</th>
                    <th>SPECS</th>
                    <th>FINISHING</th>
                    <th>QTY</th>
                    <th>UNIT</th>
                    <th>PRICE</th>
                    <th>TOLERANSI</th>
                    <th>ORIGINAL SAMPLE</th>
                    <th>DESIGN BENTUK</th>
                    <th>STATUS</th>
                    <th>ACT COLOR</th>
                    <th>F1</th>
                    <th>F2</th>
                    <th>F3</th>
                    <th>F4</th>
                    <th>F5</th>
                    <th>F6</th>
                    <th>B1</th>
                    <th>B2</th>
                    <th>B3</th>
                    <th>B4</th>
                    <th>B5</th>
                    <th>B6</th>
                    <th>FINISHING2</th>
                    <th>ACUAN WARNA</th>
                    <th>PACKING</th>
                    <th>NO PS</th>
                    <th>BOX</th>
                    <th>BOX SPECS</th>
                    <th>BOX SIZE</th>
                    <th>NW/BOX</th>
                    <th>APPLICATION</th>
                    <th>LAYOUT</th>
                    <th>UP</th>
                    <th>UK PRESS LAYOUT</th>
                    <th>MAT1</th>
                    <th>AS1</th>
                    <th>MAT2</th>
                    <th>AS1</th>
                    <th>MAT3</th>
                    <th>AS3</th>
                    <th>PISAU</th>
                    <th>CITTO</th>
                    <th>EMBOSS</th>
                    <th>HOTPRINT</th>
                    <th>NOTE</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($joblist as $data)
                <tr>
                <td>N{{ $data->id ?? '' }}</td>
                <td>N{{ $data->nosc ?? '' }}</td>
                <td>{{ $data->designno ?? '' }}</td>
                <td>{{ $data->status ?? '' }}</td>
                <td>{{ $data->created_at ?? '' }}</td>
                <td>{{ $data->createdsc ?? '' }}</td>
                <td>{{ $data->po ?? '' }}</td>
                <td>{{ $data->tanggalpo ?? '' }}</td>
                <td>{{ $data->scode ?? '' }}</td>
                <td>{{ $data->customer ?? '' }}</td>
                <td>{{ $data->idcust ?? '' }}</td>
                <td>{{ $data->etauser ?? '' }}</td>
                <td>{{ $data->client ?? '' }}</td>
                <td>{{ $data->plantcode ?? '' }}</td>
                <td>{{ $data->address ?? '' }}</td>
                <td>{{ $data->product ?? '' }}</td>
                <td>{{ $data->material ?? '' }}</td>
                <td>{{ $data->sap ?? '' }}</td>
                <td>{{ $data->size ?? '' }}</td>
                <td>{{ $data->specs ?? '' }}</td>
                <td>{{ $data->finishing ?? '' }}</td>
                <td>{{ $data->qty ?? '' }}</td>
                <td>{{ $data->unit ?? '' }}</td>
                <td>{{ $data->price ?? '' }}</td>
                <td>{{ $data->toleransi ?? '' }}</td>
                <td>{{ $data->original ?? '' }}</td>
                <td>{{ $data->design ?? '' }}</td>
                <td>{{ $data->statusdesign ?? '' }}</td>
                <td>{{ $data->actcolor ?? '' }}</td>
                <td>{{ $data->f1 ?? '' }}</td>
                <td>{{ $data->f2 ?? '' }}</td>
                <td>{{ $data->f3 ?? '' }}</td>
                <td>{{ $data->f4 ?? '' }}</td>
                <td>{{ $data->f5 ?? '' }}</td>
                <td>{{ $data->f6 ?? '' }}</td>
                <td>{{ $data->b1 ?? '' }}</td>
                <td>{{ $data->b2 ?? '' }}</td>
                <td>{{ $data->b3 ?? '' }}</td>
                <td>{{ $data->b4 ?? '' }}</td>
                <td>{{ $data->b5 ?? '' }}</td>
                <td>{{ $data->b6 ?? '' }}</td>
                <td>{{ $data->finishingjob ?? '' }}</td>
                <td>{{ $data->acuanwarna ?? '' }}</td>
                <td>{{ $data->packing ?? '' }}</td>
                <td>{{ $data->nops ?? '' }}</td>
                <td>{{ $data->boxname ?? '' }}</td>
                <td>{{ $data->boxspecs ?? '' }}</td>
                <td>{{ $data->boxsize ?? '' }}</td>
                <td>{{ $data->nwbox ?? '' }}</td>
                <td>{{ $data->aplikasi ?? '' }}</td>
                <td>{{ $data->layout ?? '' }}</td>
                <td>{{ $data->up ?? '' }}</td>
                <td>{{ $data->ukpresslayout ?? '' }}</td>
                <td>{{ $data->mat1 ?? '' }}</td>
                <td>{{ $data->as1 ?? '' }}</td>
                <td>{{ $data->mat2 ?? '' }}</td>
                <td>{{ $data->as2 ?? '' }}</td>
                <td>{{ $data->mat3 ?? '' }}</td>
                <td>{{ $data->as3 ?? '' }}</td>
                <td>{{ $data->pisau ?? '' }}</td>
                <td>{{ $data->citto ?? '' }}</td>
                <td>{{ $data->emboss ?? '' }}</td>
                <td>{{ $data->hotprint ?? '' }}</td>
                <td>{{ $data->note1 ?? '' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

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

        function exportTableToCSV(filename) {
            var csv = [];
            var rows = document.querySelectorAll("#myTable tr");

            for (var i = 0; i < rows.length; i++) {
                var row = [], cols = rows[i].querySelectorAll("td, th");

                for (var j = 0; j < cols.length; j++)
                    // Wrap cell content in double quotes
                    row.push('"' + cols[j].innerText.replace(/"/g, '""') + '"');

                csv.push(row.join(","));
            }

            // Download CSV file
            downloadCSV(csv.join("\n"), filename);
        }
    </script>


    <div class=" content-wrapper" style="background-color: #f6f6fb">
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
                        <div class="float-end   ">
                            <button onclick="exportTableToCSV('table.csv')" class="btn btn-sm btn-warning align-items-center d-flex  text-dark">
                                <span class=" text-dark material-symbols-outlined">
                                    download
                                </span>Export to Excel
                            </button>
                        </div>

                        <form action="" method="GET" novalidate="novalidate">
                            <div class="d-flex pb-2">
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
                                        <th style="font-size: 14px; width:20px;" scope="col" class="sticky"> 
                                                <div class="dropdown">
                                                    <a class="absolute text-dark text-decoration-none dropdown-toggle"
                                                        href="#" role="button" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        JOB
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a href="/kadeptprodev/kadeptlistjob" class="dropdown-item ">
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
                                        <th style="font-size: 14px;" scope="col" class="">SC</th>
                                        <th style="font-size: 14px;" scope="col" class="">STS</th>
                                        <th style="font-size: 14px;" scope="col" class="">PRODUCT</th>
                                        <th style="font-size: 14px;" scope="col" class="">PO</th>
                                        <th style="font-size: 14px;" scope="col" class="">DATE REC</th>
                                        <th style="font-size: 14px;" scope="col" class=""> 
                                                <div class="dropdown">
                                                    <a class="absolute text-dark text-decoration-none dropdown-toggle"
                                                        href="#" role="button" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        DATE CR
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a href="/kadeptprodev/kadeptlistjob" class="dropdown-item ">
                                                                <span class="px-2 align-middle material-symbols-outlined"
                                                                    style="font-size: 20px">
                                                                    clear_all
                                                                </span>Clear
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <form action="" method="GET" novalidate="novalidate">
                                                                <input type="hidden" name="sort_by" value="asccreated">
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
                                                                <input type="hidden" name="sort_by" value="desccreated">
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
                                        <th style="font-size: 14px;" scope="col" class=""> 
                                                <div class="dropdown">
                                                    <a class="absolute text-dark text-decoration-none dropdown-toggle"
                                                        href="#" role="button" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        DATE ED
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a href="/kadeptprodev/kadeptlistjob" class="dropdown-item ">
                                                                <span class="px-2 align-middle material-symbols-outlined"
                                                                    style="font-size: 20px">
                                                                    clear_all
                                                                </span>Clear
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <form action="" method="GET" novalidate="novalidate">
                                                                <input type="hidden" name="sort_by" value="ascupdated">
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
                                                                <input type="hidden" name="sort_by" value="descupdated">
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
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($job as $data)
                                    <tr>
                                        <td style="font-size: 14px; width:20px; padding-top:4px; padding-bottom:4px;"
                                            scope="col" class="sticky">{{ $data->id}}</td>
                                        <td style="padding-top:4px; padding-bottom:4px;">{{ $data->nosc}}</td>
                                        <td style="padding-top:4px; padding-bottom:4px;">
                                            @if ($data->statusjob == 'Approve')
                                            <span class="material-symbols-outlined text-success" style='font-size:18px'>
                                                check_circle
                                            </span>
                                            @elseif ($data->statusjob == 'Waiting')
                                            <span class="material-symbols-outlined text-warning" style='font-size:18px'>
                                                hourglass_top
                                            </span>
                                            @elseif ($data->statusjob == 'Revised')
                                            <span class="material-symbols-outlined text-dark" style='font-size:18px'>
                                                edit
                                            </span>
                                            @elseif ($data->statusjob == 'Declined')
                                            <span class="material-symbols-outlined text-danger" style='font-size:18px'>
                                                cancel
                                            </span>
                                            @endif
                                        </td>
                                        <td style="padding-top:4px; padding-bottom:4px;">{{ $data->product}}</td>
                                        <td style="padding-top:4px; padding-bottom:4px;">{{ $data->po}}</td>
                                        <td style="padding-top:4px; padding-bottom:4px;">{{ \Carbon\Carbon::parse($data->tanggalterima)->format('j M y')}}</td>
                                        <td style="padding-top:4px; padding-bottom:4px;">{{ \Carbon\Carbon::parse($data->created_at)->format('j M y')}}</td>
                                        <td style="padding-top:4px; padding-bottom:4px;">{{ \Carbon\Carbon::parse($data->updated_at)->format('j M y')}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-3">
                            {{ $job->appends(request()->query())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





@endsection
