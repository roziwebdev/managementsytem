<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@100;400&family=Roboto:wght@100&display=swap"
    rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <style>
        html,body{ 
            font-family: 'Roboto', serif;
            font-family: 'Roboto Mono', monospace;
        }
        p{
            font-size: 11px;
        }
        li{
            font-size: 10px;
        }
        th{
            font-size: 11px;
            text-align: center;
        }
        td{
            font-size: 9px;
            text-align: center;
        }

    </style>

    <div class="py-3">
        <div class="text-center">
            <h3 class="fw-bold roboto">SALES CONTRACT</h3>
        </div>
    </div>

        <div class="px-4" style="">
            <p class=" roboto">
            <span class="fw-bold">FROM &nbsp;:</span> ROZI
            <br/>
            <span class="fw-bold">DATE &nbsp;:</span> {{ \Carbon\Carbon::parse($sc->created_at)->format('d/m/y') }}
            <br/>
            <span class="fw-bold">REF &nbsp;&nbsp;:</span> {{ $sc->id }} / AMS / {{\Carbon\Carbon::parse($sc->created_at)->format('dmy') }}
            <br/>
            <span class="fw-bold">TO   &nbsp;&nbsp;&nbsp;:</span> {{ $sc->customer }}
            <br/>
            <span class="fw-bold">UP   &nbsp;&nbsp;&nbsp;:</span> {{ $sc->up }}
            </p>
            <p class="fw-bold roboto">PO  &nbsp;&nbsp; : {{ $sc->po }}</p>
        </div>

    
    
    <div class="px-4">
        <div class="table-responsive">
            <p class="text-center">{{$sc->noteeksternal}}</p>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>SAP</th>
                        <th>ITEM</th>
                        <th>MATERIAL</th>
                        <th>SIZE</th>
                        <th>FINISHING</th>
                        <th>SPECS</th>
                        <th>QTY</th>
                        <th>PRICE</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $products = json_decode($sc->product);
                    $saps = json_decode($sc->sap);
                    $materials = json_decode($sc->material);
                    $sizes = json_decode($sc->size);
                    $finishings = json_decode($sc->finishing);
                    $specs = json_decode($sc->specs);
                    $qtys = json_decode($sc->qty);
                    $units = json_decode($sc->unit);
                    $prices = json_decode($sc->price);
                    $totals = json_decode($sc->total);
                    $etausers = json_decode($sc->etauser, true);
                    $toleransis = json_decode($sc->toleransi);
                    $notessc = json_decode($sc->notesc);
                    $statusproduct = json_decode($sc->statusproduct);

                    $firstEta = reset($etausers);
                    $firstToleransi = reset($toleransis);
                    $combinedData =
                    array_map(null,$products,$saps,$materials,$sizes,$finishings,$specs,$qtys,$units,$prices,$totals,$etausers,$toleransis,$notessc,
                    $statusproduct);
                    @endphp
                    @foreach ($combinedData as $data )
                    <tr>
                        <td>{{ $data[1] }}</td>
                        <td>{{ $data[0] }}</td>
                        <td>{{ $data[2] }}</td>
                        <td>{{ $data[3] }}</td>
                        <td>{{ $data[4] }}</td>
                        <td>{{ $data[5] }}</td>
                        <td>{{ number_format($data[6], 0, ',', '.') }}&nbsp;{{ $data[7] }}</td>
                        <td>Rp.{{ number_format($data[8], 0, ',', '.') }}</td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
            <p>{{$sc->tender}}</p>
        </div>
    </div>
    <div class="px-4">
        <p class=""><span class="fw-bold">Dikirim ke :</span>
        <br/>
        {{ $sc->customer }}
        <br/>
        {{ $sc->address }}
        </p>
        <p>ETA : {{ \Carbon\Carbon::parse($firstEta)->format('d M Y') }}&nbsp;{{$sc->etapilihan}}</p>
    </div>
    <div class="px-4 mx-2">
        <p class="fw-bold">Keterangan</p>
        <ol>
            <li>Harga di atas belum termasuk PPN 11%</li>
            @foreach ($combinedData as $data )
            <li>Toleransi pengiriman barang {{$data[11]}} lembar dari jumlah pesanan</li>
            @endforeach
            <li>{{$sc->keteranganpembayaran}}</li>
            
            @if($sc->keterangancust == "mayora")
            <li>Untuk pengembalian barang Reject maksimal 6 bulan dari tanggal GR.</li>
            @else
            <li>Untuk pengembalian barang Reject maksimal 14 hari dari tanggal pengiriman barang. Jika dalam 14 hari tidak ada masalah
            maka kami anggap bahwa barang tersebut 100% diterima dalam kondisi baik dan kami tidak menerima retur/pengembalian
            barang setelah 14 hari dari tanggal pengiriman barang.</li>
            <li>Apabila terjadi pembatalan order oleh customer, maka customer akan dikenakan denda dari biaya-biaya yang timbul akibat
            pembatalan order tersebut (setelah PO dikonfirmasi/dikoordinasikan dengan divisi terkait).</li>
            @endif
        </ol>
    </div>
    <p class="px-4">
        Demikian Sales Contract dari kami supaya menjadi periksa adanya. Besar harapan kami untuk segera mendapat kabar dari
        Bapak/Ibu. Atas perhatian dan kerjasama yang baik kami ucapkan terima kasih.
    </p>
    <br/>

    <div class="container d-flex justify-content-around">
        <div class="text-center fw-bold ">
            <p>Penerima</p>
            <br/>
            <br/>
            <br/>
            <p>{{ $sc->customer }}</p>
        </div>
       @if ($sc->statussc == 'Approve' && $sc->sellerowner == 'Rozi 1')
        <div class="text-center fw-bold">
            <p>Hormat Kami</p>
            <div class="d-flex align-items-center" style="position: relative;">

            </div>
            <p>
                <u>ROZI</u>
                <br/>
                <i>GENERAL MANAGER</i>
            </p>
        </div>
        @elseif($sc->statussc == 'Approve' && $sc->sellerowner == 'Rozi 2')
        <div class="text-center fw-bold">
            <p>Hormat Kami</p>
            <div class="d-flex align-items-center" style="position: relative;">


            </div>
            <p>
                <u>ROZI</u>
                <br/>
                <i>MARKETING DIRECTOR</i>
            </p>
        </div>
        @else
        <div class="text-center fw-bold">
            <p>Hormat Kami</p>
            <br />
            <br />
            <br />
            <p>
                <u>ROZI</u>
                <br/>
                <i>GENERAL MANAGER</i>
            </p>
        </div>
        @endif
    </div>
    <div class="d-flex justify-content-between">
        <div style="font-size:9px; " class="px-4 fw-bold">
            <span class="fw-bold">SC Created By :</span> Rozi Sales
        </div>
        <div style="font-size:9px; " class="px-4 fw-bold">
            <span class="fw-bold">FM-SLS 002</span>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>
</html>
