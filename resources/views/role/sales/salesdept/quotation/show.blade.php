@extends('role.purchasing.layoutsmrdept.main')
@section('main-container')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
<div class="main-panel">
    <div class=" content-wrapper" style="background-color: #f6f6fb">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


        <div class="row" id='row'>
            <div class="">
                <div class="shadow card rounded-xl">
                    <div class="border shadow card-body">
                        <h3 class="pb-3 text-center">QUOTATION {{ $quotation->customer}} / {{ $quotation->id }}</h3>
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
                                        <th style="font-size: 14px;" scope="col" class="sticky">No.</th>
                                        <th style="font-size: 14px;" scope="col">Product</th>
                                        <th style="font-size: 14px;" scope="col" class="">Material</th>
                                        <th style="font-size: 14px;" scope="col">Size</th>
                                        <th style="font-size: 14px;" scope="col" class="">Specs</th>
                                        <th style="font-size: 14px;" scope="col" class="">Quantity</th>
                                        <th style="font-size: 14px;" scope="col" class="">Price</th>
                                        <th style="font-size: 14px;" scope="col" class="">Status</th>
                                        <th style="font-size: 14px;" scope="col" class="">No PO</th>
                                        <th style="font-size: 14px;" scope="col" class="">Remarks</th>
                                        <th style="font-size: 14px;" scope="col" class="">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $products = json_decode($quotation->product);
                                    $materials = json_decode(str_replace("\r\n", "\n", $quotation->material));
                                    $sizes = json_decode(str_replace("\r\n", "\n", $quotation->size));
                                    $specs = json_decode(str_replace("\r\n", "\n", $quotation->specs));
                                    $qtys = json_decode($quotation->qty);
                                    $units = json_decode($quotation->unit);
                                    $prices = json_decode($quotation->price);
                                    $statusitem = json_decode($quotation->statusitem);
                                    $noteitem = json_decode($quotation->noteitem);


                                    $pos = json_decode($quotation->po);
                                    // Gabungkan semua data menjadi satu array dengan zip
                                    $combinedData = array_map(null, $products, $materials, $sizes, $specs, $qtys, $units, $prices, $statusitem, $noteitem,$pos);
                                    @endphp
                                    
                                    @foreach ($combinedData as $index => $data )
                                    
                                    @php
                                    $linespecs= explode("\r\n", $data[3]);
                                    $lines2 = explode("\r\n", $data[4]);
                                    $lines = explode("\r\n", $data[6]);

                                    foreach ($lines as &$line) {
                                        // Pisahkan angka dalam rentang menggunakan spasi
                                        $numbers = explode(' - ', $line);
                                        $formatted_numbers = [];
                                        foreach ($numbers as $number) {
                                            // Trim untuk menghilangkan spasi berlebih
                                            $number = trim($number);
                                            // Periksa apakah angka negatif (ada tanda minus di depan)
                                            $isNegative = $number[0] === '-';
                                            // Hilangkan tanda minus sementara untuk memformat angka
                                            $number = ltrim($number, '-');
                                            // Ubah format angka menggunakan number_format
                                            $formatted_number = number_format((float)$number, 1, ',', '.');
                                            // Tambahkan kembali tanda minus jika angka semula negatif
                                            if ($isNegative) {
                                                $formatted_number = '-' . $formatted_number;
                                            }
                                            // Simpan hasil format kembali ke dalam array
                                            $formatted_numbers[] = $formatted_number;
                                        }
                                        // Gabungkan angka dalam rentang dengan tanda -
                                        $formatted_line = implode(' - ', $formatted_numbers);
                                        // Simpan hasil format kembali ke dalam array
                                        $line = '• Rp. ' .$formatted_line;
                                    }
                            
                                    // Gabungkan kembali rentang harga yang diformat
                                    $formatted_value = implode("\r\n", $lines);
                                    
                                    
                                    // Gabungkan array menjadi satu string dengan karakter baris baru (\r\n)
                                    foreach ($lines2 as &$line) {
                                    // Trim untuk menghilangkan spasi berlebih
                                    $line = trim($line);
                                    // Periksa apakah angka negatif (ada tanda minus di depan)
                                    $isNegative = $line[0] === '-';
                                    // Hilangkan tanda minus sementara untuk memformat angka
                                    $number = ltrim($line, '-');
                                    // Ubah format angka menggunakan number_format
                                    $formatted_number = number_format((float)$number, 0, ',', '.');
                                    // Tambahkan kembali tanda minus jika angka semula negatif
                                    if ($isNegative) {
                                    $formatted_number = '-' . $formatted_number;
                                    }
                                    // Simpan hasil format kembali ke dalam array
                                    $line = '• ' .$formatted_number."&nbsp;".$data[5];
                                    }
                                    $formatted_value2 = implode("\r\n", $lines2);
                                
                                
                                    // Menambahkan simbol "•" di depan setiap baris
                                    $linespecs = array_map(function($line) {
                                    return '• ' . $line;
                                    }, $linespecs);
                                    // Menggabungkan kembali baris-baris tersebut dengan tag <br>
                                    // Gabungkan array menjadi satu string dengan karakter baris baru (\r\n)
                                    $formattedData = implode('<br>', $linespecs);
                                    
                                    
                                    @endphp
                                    <tr>
                                        <td style="font-size: 14px; width:20px; padding-top:px; padding-bottom:px;" scope="col" class="sticky">{{ $index +1}}</td>
                                        <td style="padding-top:px; padding-bottom:px;">{{ $data[0]}}</td>
                                        <td style="padding-top:px; padding-bottom:px;">{!! nl2br($data[1]) !!}</td>
                                        <td style="padding-top:px; padding-bottom:px;">{!! nl2br($data[2]) !!}</td>
                                        <td style="padding-top:px; padding-bottom:px;">{!! nl2br($formattedData) !!}</td>
                                        <td style="padding-top:px; padding-bottom:px;">{!! nl2br($formatted_value2) !!}</td>
                                        <td style="padding-top:px; padding-bottom:px;">{!! nl2br($formatted_value) !!}</td>

                                        <td style="padding-top:px; padding-bottom:px;">
                                            @if ($data[7] == "OK")
                                            <button class="btn btn-sm " style="background-color:#c1fecd; color:#00cc25; font-size: 10px">OK</button>
                                            @elseif ($data[7] == "OK PO")
                                            <button class="btn btn-sm " style="background-color:#c1fecd; color:#00cc25; font-size: 10px">OK PO</button>
                                            @elseif ($data[7] == "NOT OK")
                                            <button class="btn btn-sm" style="background-color:#fac6d2;color:#e91345; font-size: 10px">NOT OK</button>
                                            @elseif ($data[7] == "PROGRESS")
                                            <button class="btn btn-sm" style="background-color:#faf595; color:#c3ba08; font-size: 10px">PROGRESS</button>
                                            @elseif ($data[7] == "NEGO")
                                            <button class="btn btn-sm btn-secondary" style=" font-size: 10px">NEGO</button>
                                            @endif
                                        </td>
                                       @if (isset($data[9]) && $data[7] == "OK PO")
                                            <td style="padding-top:px; padding-bottom:px;">
                                                <a style="text-decoration:;" class="text-dark" href="{{ route('salesdept.printpo', $data[9]) }}">{{ $data[9] }}</a>
                                            </td>
                                        @else
                                            <td style="padding-top:px; padding-bottom:px;"></td>
                                         @endif
                                        <td style="padding-top:px; padding-bottom:px;">{{ $data[8]}}</td>
                                        <td style="padding-top:px; padding-bottom:px;" class="text-center">
                                            <a href="{{ route('quotation.edit', $quotation->id) }}" class="">
                                                <span class="material-symbols-outlined text-black" style='font-size:20px'>
                                                    edit_square
                                                </span>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






    @endsection