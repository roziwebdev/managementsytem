<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PO 00{{ $materialrequest->id }} - {{ $materialrequest->supplier }}</title>
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
            font-size: 150%
        }
    </style>

</head>

<body>
    <div class="container-xxl">
        <div class='d-flex justify-content-between'>
            <div>
                <br/>
                <br/>
                <h1 style='font-size:100%'>PURCHASE ORDER</h1>
        <br />


        <p style='font-size:70%'><b>PO Number</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{ str_pad($materialrequest->id, 4, '0', STR_PAD_LEFT) }}/AMS/{{$materialrequest->updated_at->format('dmY')}}
            
            <br />
            <b>Date</b>&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$materialrequest->updated_at->format('d/m/Y')}}
            <br />
            <b>To</b>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
            {{ $materialrequest->supplier }}
            <br />
            <b>Up</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
            {{ $materialrequest->cp }}
        </p>
            </div>

        </div>
        

        <br />
        <br />
        <table class="table border">
            <thead>
                <tr style="font-size: 70%">
                    <th scope="col">ETA USER</th>
                    <th scope="col">ITEM</th>
                    <th scope="col">SIZE</th>
                    <th scope="col">SPECS/ITEM CODE</th>
                    @if (stripos($materialrequest->item, "SINGLE FACE") !== false)
                    <th scope="col">SERAT</th>
                    @elseif (stripos($materialrequest->item, "SHEETS") !== false)
                    <th scope="col">SERAT</th>
                    @else
                    @endif
                    <th scope="col">QTY</th>
                     
                    <th scope="col">UNIT</th>
                    <th scope="col">PRICE</th>

                </tr>
            </thead>
            <tbody>
                @php
                    $etausers = json_decode($materialrequest->etauser);
                    $items = json_decode($materialrequest->item);
                    $sizes = json_decode($materialrequest->size);
                    $specs = json_decode($materialrequest->specs);
                    $qtys = json_decode($materialrequest->qty);
                    $units = json_decode($materialrequest->unit);
                    $prices = json_decode($materialrequest->price);
                    $currency = json_decode($materialrequest->po);
                    $serat = json_decode($materialrequest->podate);
                    
                    // Gabungkan semua data menjadi satu array dengan zip
                    $combinedData = array_map(null, $etausers, $items, $sizes, $specs, $qtys, $units, $prices,$currency,$serat);
                @endphp
                @foreach ($combinedData as $data)
                    <tr style="font-size: 65%">
                        <td>{{ $data[0] }}</td>
                        <td>{{ $data[1] }}</td>
                        <td>{{ $data[2] }}</td>
                        <td>{{ $data[3] }}</td>
                        @if (stripos($materialrequest->item, "SINGLE FACE") !== false)
                        <td>{{ $data[8] }}</td>
                        @elseif (stripos($materialrequest->item, "SHEETS") !== false)
                        <td>{{ $data[8] }}</td>
                        @else
                        @endif
                        <td>{{ $data[4] }}</td>
                        <td>{{ $data[5] }}</td>
                        <td>{{ '' . number_format(floatval(str_replace(',', '.', $data[6])), 1, ',', '.') }}&nbsp;{{$data[7]}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-between">
            <div>
                <div>
                    <p style="font-size: 70%" class='pr-3'><strong>NOTE : </strong>
                    <span style=''>{{ $materialrequest->ref }}</span>
                        <br />
                        <br />
                        <strong>PPN &nbsp;&nbsp;:</strong> {{ $materialrequest->vat }}
                    </p>

                </div>
            </div>
            <div style='width:80px;'>
                
            </div>
            <div>
                <p style="font-size: 70%"><strong>SHIP TO : </strong><br />
                    {{ $materialrequest->alamat }}<br/> Malang, Jawa Timur 65153
                </p>
            </div>
        </div>
        <br/>
        <ul>
            <li style="list-style:none; font-size:85%;"><strong>Attention:</strong></li>
            <li style="font-size:
                                70%">Setelah Diterima mohon ditanda tangani &
                di email
                kembali ke purchasing@arjayaprint.com</li>
            <li style="font-size: 70%">Mohon setiap kali pengiriman invoice untuk disertakan nomor pesanan dari
                kami
            </li>
            <li style="font-size: 70%">Mohon pada saat pengiriman barang disertakan COA (Certificate Of
                Analysis)<br />
                dan atau MSDS(Mastery Safety Data)
            </li>
            <li style="font-size: 70%">Setiap Penagihan harus disertakan sbb: <b>*Wajib</b>
                <ol>
                    <div class="d-flex">
                        <div style="padding-right:30px">
                            <li><b>*Invoice</b></li>
                            <li>Faktur Pajak</li>
                            <li>Surat Kontrak</li>
                        </div>
                        <div>
                            <li><b>*Surat Pesanan/PO yang ditanda tangani</b></li>
                            <li>Surat Jalan</li>
                            <li>Bukti Pengiriman ekspedisi</li>
                        </div>
                    </div>

                </ol>
            </li>
        </ul>
        <p>Apabila tidak disertakan lampiran diatas, penagihan tidak dapat diproses/dibayar
            <br>
            <br>
            <b style='font-size:80%'>PO Created By : Rozi Purchasing</b>
        </p>
        <br />

        <div class="text-center d-flex justify-content-around">
            <div>
                <p>SUPPLIER
                <br/>
                <br>
                <br>
                <br>
                <br>
                {{ $materialrequest->supplier }}
                </p>
            
               <br>
                <p></p>



            </div>
                   <div>
                @if ($materialrequest->status == 'Process Safira')
                <p>BUYER
           
                <div style="position: relative;">
                    <img style="width: 115px;  " src="{{ URL::asset('frontend1/img/photos/Signsaf.png') }}" />
                    <img style="width: 110px; position: absolute; top: -10px; left: 10px; z-index: -1; opacity: 0.3;"
                        src="{{ URL::asset('frontend1/img/photos/logoarjaya.png') }}" />
                </div>
                
                   
                        <p>
                            PT. Rozi Portofolio
                        </p>
                </p>
                @elseif ($materialrequest->status == 'Process Stephanie')
                <p>BUYER
           
                <div style="position: relative;">
                    <img style="width: 90px;  " src="{{ URL::asset('frontend1/img/photos/Signsaf.png') }}" />
                </div>
                
                   
                        <p>
                            PT. Rozi Portofolio
                        </p>
                </p>
                @elseif ($materialrequest->status == 'Process')
                <p>BUYER
           
                <div style="position: relative;">
                    <img style="width: 95px;  " src="{{ URL::asset('frontend1/img/photos/Signsaf.png') }}" />
                </div>
                
                   
                        <p>
                            PT. Rozi Portofolio
                        </p>
                </p>
                @else
                    
                <p>BUYER<br/>
                     <br/>
                <br>
                <br>
                <br>
                
                PT. Rozi Portofolio
                </p>
                    
                @endif
                
            </div>
        </div>


    </div>


</body>

</html>
