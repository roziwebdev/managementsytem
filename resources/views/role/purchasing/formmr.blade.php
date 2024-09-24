<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <style>
           p {
            font-size: 75%
        }
        h1 {
          
        }
        th {
            text-transform:uppercase;
        }
        tr {
            text-transform:uppercase;
        }
    </style>

</head>

<body>
    <div class="container-xxl">
       
        <br />
        <h2 class="text-center">Material Request</h1>
        <br />
        
        <p style='font-size:70%'>
            <strong>MR Number &nbsp;&nbsp;: </strong>{{ str_pad($materialrequest->id, 4, '0', STR_PAD_LEFT) }}</br>
            <strong>PO Number &nbsp;&nbsp;&nbsp;: </strong>{{ str_pad($materialrequest->idpo, 4, '0', STR_PAD_LEFT) }}</br>
<strong>Dept &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong>{{$materialrequest->dept}}</br>

<strong>Send To &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong> {{$materialrequest->alamat}}
        </p>

        <br />

        <table class="table border">
            <thead>
                <tr style="font-size: 70%" >
                    <th scope="col">Eta User</th>
                    <th scope="col">Job</th>
                    <th scope="col">Type</th>
                    <th scope="col">Item</th>
                    <th scope="col">Specs</th>
                    <th scope="col">Size</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Unit</th>
                    <th scope="col">Serat</th>
                    <th scope="col">L order</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Remarks</th>

                </tr>
            </thead>
            <tbody>
                @php
                    $items = json_decode($materialrequest->item);
                    $specs = json_decode($materialrequest->specs);
                    $etausers = json_decode($materialrequest->etauser);
                    $sizes = json_decode($materialrequest->size);
                    $qtys = json_decode($materialrequest->qty);
                    $remarks = json_decode($materialrequest->mrdate);
                    $arahserat = json_decode($materialrequest->arahseratp);
                    $lastorder = json_decode($materialrequest->lastorder);
                    $sisastock = json_decode($materialrequest->sisastock);
                    $box1 = json_decode($materialrequest->box1);
                    $box2 = json_decode($materialrequest->box2);
                    $box3 = json_decode($materialrequest->box3);
                    $kosong3 = json_decode($materialrequest->kosong3);
                    $lastpo = json_decode($materialrequest->lastpo);
                    $lastprice = json_decode($materialrequest->lastprice);
                    $panjangs = json_decode($materialrequest->panjang);
                    $lebars = json_decode($materialrequest->lebar);
                    $combinedData = array_map(null, $items, $specs, $etausers, $sizes, $qtys, $remarks, $arahserat,$lastorder,$sisastock,$box1,$box2,$box3, $kosong3, $lastpo, $lastprice,$panjangs,$lebars);
                @endphp
                @foreach ($combinedData as $data)
                    <tr  style="font-size: 55%">
                        <td>{{ \Carbon\Carbon::parse($data[2])->format('j M y') }}</td> {{-- ETA User --}}
                        <td>{{ $materialrequest->job }}</td>
                        <td>{{ $materialrequest->type }}</td>
                        <td>{{ $data[0] }}</td> {{-- Item --}}
                        <td>{{ $data[1] }}</td> {{-- Specs --}}
                        <td>{{ $data[3] }}</td> {{-- Size --}}
                        <td>{{ $data[4] }}</td> {{-- Qty --}}
                        <td>{{ $data[12] }}</td> {{-- Qty --}}
                        <td>{{ $data[6] }}</td> {{-- arahserat --}}
                        <td>
                            PO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$data[13]}}<br/>
                            Tgl&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$data[7]}}<br/>
                            Harga : {{$data[14]}}
                        </td> 
                        <td>{{ $data[8] }}</td> {{-- arahserat --}}
                        <td>{{ $data[5] }}</td> {{-- Remarks --}}


                    </tr>
                @endforeach
            </tbody>
        </table>
        @if ($materialrequest->type == 'BOX')
        <br/>
        <b style='font-size:70%'>RINCIAN KEBUTUHAN BOX : </b>
        <br/>
            @foreach ($combinedData as $data)
        <div class='d-flex justify-content-around'>
            <p style='font-size:70%'>
                {{$data[9]}}
            </p>
            <p style='font-size:70%'>
                {{$data[10]}}+
            </p>
            <p style='font-size:70%'>
                {{$data[11]}}
            </p>
        </div>
            @endforeach
        <br/>
        <br/>
        @endif
        @foreach ($combinedData as $data)
        <style>
        .rectangle-container {
            position: relative;
            display: inline-block;
            margin: 10px;
            
        }
        .rectangle {
            width: 150px; /* Panjang p */
            height: 75px; /* Lebar l */
            border: 1px solid #000;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size:17px;
        }
        .dimension {
            position: absolute;
            font-size: 11px;
        }
        .dimension.width {
            top: 50%;
            right: -30px;
            transform: translateY(-50%);
        }
        .dimension.height {
            bottom: -20px;
            left: 50%;
            transform: translateX(-50%);
        }
    </style>
        @if (stripos($materialrequest->item, "SINGLE FACE") !== false)
           <div class=" text-center">
                <div class="rectangle-container">
                    <div style="font-size:12px " class="mb-1">Arah Serat</div>
                    <div class="rectangle">{{$data[6]}}</div>
                    <div class="dimension width">{{$data[16]}}</div>
                    <div class="dimension height">{{$data[15]}}</div>
                </div> 
            </div>
        @elseif (stripos($materialrequest->item, "SHEETS") !== false)
           <div class=" text-center">
                <div class="rectangle-container">
                    <div style="font-size:12px" class="mb-1">Arah Serat</div>
                    <div class="rectangle">{{$data[6]}}</div>
                    <div class="dimension width">{{$data[16]}}</div>
                    <div class="dimension height">{{$data[15]}}</div>
                </div>
            </div>
        @endif
        @endforeach
        <div class=''>
        <p style='font-size:70%'>
         <strong>Created By &nbsp;: </strong>{{$materialrequest->created}} / {{ \Carbon\Carbon::parse($materialrequest->created_at)->timezone('Asia/Jakarta')->format('Y-m-d H:i:s') }}

        </p>
        <p style='font-size:70%'>
         <strong>Checked By : </strong>Manager Departement {{ Auth::user()->dept }} / {{ \Carbon\Carbon::parse($materialrequest->updated_at)->timezone('Asia/Jakarta')->format('Y-m-d H:i:s') }}
        </p>
        </div>
        <div class='d-flex justify-content-between'>
            <div>
                <p style=""><strong>Note &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong> {{$materialrequest->arahseratl}}</p>
            </div>
                           <div>
                @if ($materialrequest->status == 'Approve')
                <p class="text-center" style='font-size:70%'>&nbsp;&nbsp;&nbsp;Rozi <br/>
                    PT. ARJAYA MUKTI SANTOSA
                </p>
                @else
                      <p style='font-size:70%' class="text-center">WENNY<br/>
                    <br/><br/><br/><br/>
                    PT. ARJAYA MUKTI SANTOSA
                </p>

                @endif
            </div>
        </div>


    </div>
    {{-- <script>
        window.print();
    </script> --}}

</body>

</html>
