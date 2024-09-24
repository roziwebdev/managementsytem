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

        <div class="row" id='row'>
            <div class="">
                <div class="shadow card rounded-xl">
                    <div class="border shadow card-body">
                        <h3 class="pb-3 text-center">SURAT PERINTAH LEMBUR STAFF</h3>
                        <form action="{{ route('staffspl.index') }}" method="GET">
                            <div class="form-row d-sm-flex justify-content-center align-items-center">
                                <div class="form-group col-md-4">
                                    <label for="tgl_mulai">Tanggal Mulai</label>
                                    <input type="date" class="form-control form-control-sm" id="tgl_mulai"
                                        name="tgl_mulai" value="{{ request('tgl_mulai') }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="tgl_akhir">Tanggal Akhir</label>
                                    <input type="date" class="form-control form-control-sm" id="tgl_akhir"
                                        name="tgl_akhir" value="{{ request('tgl_akhir') }}">
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
                                }

                                td.sticky {
                                    position: sticky;
                                    left: 0;
                                    background-color: #ffffff;
                                }
                            </style>
                            <table class="table" id="myTable">
                                <thead>
                                    <tr style="background-color: #f1f1f6">

                                        <th class="text-center" style="font-size: 14px; width:;" scope="col">GROUP</th>
                                        <th class="" style="font-size: 14px; width:;" scope="col">NAMA</th>
                                        <th class="text-center" style="font-size: 14px; width:;" scope="col">POSISI</th>
                                        <th class="text-center" style="font-size: 14px; width:;" scope="col">DEPT</th>
                                        <th class="text-center" style="font-size: 14px; width:;" scope="col">TGL LEMBUR</th>
                                        <th class="text-center" style="font-size: 14px; width:;" scope="col">START</th>
                                        <th class="text-center" style="font-size: 14px; width:;" scope="col">BREAK</th>
                                        <th class="text-center" style="font-size: 14px; width:;" scope="col">END</th>
                                        <th class="text-center" style="font-size: 14px; width:;" scope="col">TOTAL JAM</th>
                                        <th class="text-center" style="font-size: 14px; width:;" scope="col">HASIL</th>
                                        <th class="text-center" style="font-size: 14px; width:;" scope="col">UNIT</th>
                                        <th class="text-center" style="font-size: 14px; width:;" scope="col">CREATED</th>
                                        <th class="" style="font-size: 14px; width:;" scope="col">KET</th>
                                        <th class="text-center" style="font-size: 14px; width:;" scope="col">STS</th>
                                        <!--<th style="font-size: 14px;" scope="col" class="">ACTION</th>-->
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
                                    $units = json_decode($lembur->unit);
                                    $combinedData =
                                    array_map(null,$namas,$jabatans,$departements,$mulais,$istirahats,$berakhirs,$hasillemburs,$totaljams,$keteranganpekerjaans,$units);
                                    @endphp
                                    @if ($lembur->status == "Approve")
                                    @foreach ($combinedData as $data )
                                    <tr>
                                        <td class="text-center" style="padding-top: 5px; padding-bottom: 5px">{{ $lembur->id }}</td>
                                        <td class="" style="padding-top: 5px; padding-bottom: 5px">{{ $data[0] }}</td>
                                        <td class="text-center" style="padding-top: 5px; padding-bottom: 5px">{{ $data[1] }}</td>
                                        <td class="text-center" style="padding-top: 5px; padding-bottom: 5px">{{ $data[2] }}</td>
                                        <td class="text-center" style="padding-top: 5px; padding-bottom: 5px">{{\Carbon\Carbon::parse($lembur->tgllembur)->format('d M y') }}</td>
                                        <td class="text-center" style="padding-top: 5px; padding-bottom: 5px">{{\Carbon\Carbon::parse($data[3])->format('h:i A') }}</td>
                                        <td class="text-center" style="padding-top: 5px; padding-bottom: 5px">{{ $data[4] }}</td>
                                        <td class="text-center" style="padding-top: 5px; padding-bottom: 5px">{{\Carbon\Carbon::parse($data[5])->format('h:i A') }}</td>
                                        <td class="text-center" style="padding-top: 5px; padding-bottom: 5px">{{ $data[7] }}</td>
                                        <td class="text-center" style="padding-top: 5px; padding-bottom: 5px">{{ $data[6] }}</td>
                                        <td class="text-center" style="padding-top: 5px; padding-bottom: 5px">{{ $data[9] }}</td>
                                        <td class="text-center" style="padding-top: 5px; padding-bottom: 5px">{{ $lembur->pemberiperintah }}</td>
                                        <td class="" style="padding-top: 5px; padding-bottom: 5px">{{ $data[8] }}</td>
                                        <td style="padding-top: 5px; padding-bottom: 5px">
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
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
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
    <script>
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
    });

    // Script untuk menambahkan row baru
    let counter2 = 1;
    function handleRemoveItem2(id) {
    $(`#row2${id}`).remove();
    }
    $("#rowAdder2").click(function () {
        newRowAdd2 = `
            <div id='row2${counter2}'>
                <div class=" row" style="background-color: #f1f1f6">
                    <div class="mt-3 col-md ">
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
                    <div class="mt-3 col-md " style="width: 24px">
                        <div class="mb-3" style="font-size: 14px">
                            <label for="" class="form-label fw-bold">Start</label>
                            <input type="datetime-local" class="form-control form-control-sm clickable" name="mulai[]" required>
                        </div>
                    </div>
                    <div class="mt-3 col-md">
                        <div class="mb-3" style="font-size: 14px">
                            <label for="" class="form-label fw-bold ">Break</label>
                            <select name="istirahat[]" class="form-select" required>
                                <option>Choose</option>
                                <option value="Y">Y</option>
                                <option value="N">N</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-3 col-md" style="width: 24px">
                        <div class="mb-3" style="font-size: 14px">
                            <label for="" class="form-label fw-bold ">End</label>
                            <input type="datetime-local" class="form-control form-control-sm clickable" name="berakhir[]"
                                placeholder="" required>
                        </div>
                    </div>
                    <div class="mt-3 col-md">
                        <div class="mb-3" style="font-size: 14px">
                            <label for="" class="form-label fw-bold ">Hasil Lembur</label>
                            <input type="text" class="form-control form-control-sm clickable" name="hasillembur[]" placeholder=""
                                required>
                        </div>
                    </div>
                    <div class="mt-3 col-md">
                        <div class="mb-3" style="font-size: 14px">
                            <label for="" class="form-label fw-bold ">Unit</label>
                            <input type="text" class="form-control form-control-sm clickable" name="unit[]" placeholder=""
                                required list="unit">
                            <datalist id="unit">
                                <option value="PCS">PCS</option>
                                <option value="DRIK">DRIK</option>
                            </datalist>
                        </div>
                    </div>
                    <div class="mt-3 col-md">
                        <div class="mb-3" style="font-size: 14px">
                            <label for="" class="form-label fw-bold ">Estimasi</label>
                            <input type="text" class="form-control form-control-sm clickable" name="estimasi[]" placeholder=""
                                required>
                        </div>
                    </div>
                </div>
                <div class=" row stretch-card grid-margin" style="background-color: #f1f1f6">
                    <div class="mt-3 col-md">
                        <div class="mb-3" style="font-size: 14px">
                            <label for="" class="form-label fw-bold ">Keterangan Pekerjaan</label>
                            <textarea name="keteranganpekerjaan[]" rows="4" cols="40" class="form-control">
                            </textarea>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div  class="my-3 btn btn-gradient-danger btn-sm" onclick="handleRemoveItem2(${counter2})">Remove</div>
                </div>
            </div>

        `;
        $("#newinput2").append(newRowAdd2);
        counter2++;
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

@endsection