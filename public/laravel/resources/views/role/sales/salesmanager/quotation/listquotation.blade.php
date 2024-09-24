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
     @foreach ( $quotations as $data )
    <div class="modal fade" id="exampleModalToggle{{ $data->id }}" aria-hidden="true"
        aria-labelledby="exampleModalToggleLabel{{ $data->id }}" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header pt-3 pb-0 mb-0">
                    <div class="text-center container-xl pb-0 mb-0">
                        <h1 class="text-center modal-title" style="font-size: 25px"
                            id="exampleModalToggleLabel{{ $data->id }}">QUOTATION SALES</h1>
                    </div>
                    <button type="button" class="float-end btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-4">
                    <div class="container-xl">
                        <div class="border shadow border-secondary rounded" style="background:#F0F0F0">
                            <div class="container">
                                <div class="">
                                    <p style="font-size:18px" class="fw-bold py-2 mb-1">Quotation - {{ $data->id }}
                                    </p>
                                </div>
                                <div class="row">
                                    <div class="col-lg">
                                        <p style="font-size:14px" class="mb-1"><span style="font-weight: 600">Sales
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span>
                                            {{ $data->seller }}
                                        </p>
                                        <p style="font-size:14px" class="mb-1"><span style="font-weight: 600">Date
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
                                            </span>{{
                                            \Carbon\Carbon::parse($data->created_at)->format('j M y')}}</p>
                                    </div>
                                    <div class="col-lg">
                                        <p style="font-size:14px" class="mb-1"><span style="font-weight: 600">Customer
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span>
                                            {{ $data->customer }}</p>
                                        <p style="font-size:14px" class="mb-1"><span style="font-weight: 600">Address
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span>
                                            {{ $data->alamat }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="border border-black" style="background: rgb(255, 255, 255)">
                                <div class="container-xl border " style="height:450px">
                                    <div class="py-4 ">
                                        <div class="border shadow-sm table-responsive table-responsive1"
                                            style="height:400px">
                                            <table class="table table1 table-bordered border-secondary">
                                                <thead class="">
                                                    <tr style="background:#F0F0F0; top:10px" class="">
                                                        <th class="pt-2 pb-2 col-sm-4 fw-bold">Information (Product, Specs, Price)</th>
                                                        <th class="pt-2 pb-2 col-sm-8 fw-bold">Value</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @php
                                                $products = json_decode($data->product);
                                                $materials = json_decode(str_replace("\r\n", "\n", $data->material));
                                                $sizes = json_decode(str_replace("\r\n", "\n", $data->size));
                                                $specs = json_decode(str_replace("\r\n", "\n", $data->specs));
                                                $qtys = json_decode($data->qty);
                                                $units = json_decode($data->unit);
                                                $prices = json_decode($data->price);
                                                $statusitem = json_decode($data->statusitem);
                                                $noteitem = json_decode($data->noteitem);
                                                $finalqtys = json_decode($data->finalqty);
                                                $finalprices = json_decode($data->finalprice);
                                                $qtyfinalnegos = json_decode($data->qtyfinalnego );
                                                $pricefinalnegos = json_decode($data->pricefinalnego);
                                                $pos = json_decode($data->po);
                                                // Gabungkan semua data menjadi satu array dengan zip
                                                $combinedData = array_map(null, $products, $materials, $sizes, $specs, $qtys, $units, $prices, $statusitem, $noteitem,
                                                $finalqtys,$finalprices,$qtyfinalnegos,$pricefinalnegos,$pos);

                                                @endphp
                                                @foreach ($combinedData as $index => $data)

                                                    @php
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
                                                    $line = 'Rp. ' .$formatted_line."<br />";
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
                                                    $line = $formatted_number."&nbsp;".$data[5]."<br/>";
                                                    }
                                                    $formatted_value2 = implode("\r\n", $lines2);

                                                    @endphp

                                                    <tr style="" class="table-secondary">
                                                        <td class="pt-2 pb-2 fst-italic" style="font-weight: 600"
                                                            colspan="2">Product {{ $index +1 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">Product </td>
                                                        <td class="pt-2 pb-2 col-sm-8">{{ $data[0]}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">Material </td>
                                                        <td class="pt-2 pb-2 col-sm-8">{!! nl2br($data[1]) !!}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">Sizes </td>
                                                        <td class="pt-2 pb-2 col-sm-8">{!! nl2br($data[2]) !!}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">Specs </td>
                                                        <td class="pt-2 pb-2 col-sm-8">{!! nl2br($data[3]) !!}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">Quantity </td>
                                                        <td class="pt-2 pb-2 col-sm-8">{!! nl2br($formatted_value2) !!}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">Unit </td>
                                                        <td class="pt-2 pb-2 col-sm-8">{!! nl2br($data[5]) !!}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">Price </td>
                                                        <td class="pt-2 pb-2 col-sm-8">{!! nl2br($formatted_value) !!}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">Final Quantity </td>
                                                        <td class="pt-2 pb-2 col-sm-8">{{ '' . number_format(floatval(str_replace(',', '.', $data[9])), 0, ',', '.') }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">Final Price </td>
                                                        <td class="pt-2 pb-2 col-sm-8">{{ '' . number_format(floatval(str_replace(',', '.', $data[10])), 0, ',', '.') }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">PO Quantity </td>
                                                        <td class="pt-2 pb-2 col-sm-8">{{ '' . number_format(floatval(str_replace(',', '.', $data[11])), 0, ',', '.') }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">PO Price </td>
                                                        <td class="pt-2 pb-2 col-sm-8">{{ '' . number_format(floatval(str_replace(',', '.', $data[12])), 0, ',', '.') }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">PO </td>
                                                        <td class="pt-2 pb-2 col-sm-8">{!! nl2br($data[13]) !!}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">Status </td>
                                                        <td class="pt-2 pb-2 col-sm-8">{!! nl2br($data[7]) !!}</td>
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
                </div>
    
            </div>
        </div>
    </div>
    @endforeach
    <div class=" content-wrapper" style="background-color: #f6f6fb">
        <div class="row" id='row'>
            <div class="">
                <div class="shadow card rounded-xl">
                    <div class="border shadow card-body">
                        <h3 class="pb-3 text-center">QUOTATION</h3>
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
                                        <th style="font-size: 14px;" scope="col" class="">
                                            <div class="dropdown">
                                                <a class="absolute text-dark text-decoration-none dropdown-toggle"
                                                    href="#" role="button" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    ID
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="/salesdept" class="dropdown-item ">
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
                                        <th style="font-size: 14px;" class="" scope="col">DATE</th>
                                        <th style="font-size: 14px;" class="" scope="col">CUSTOMER</th>
                                        <th style="font-size: 14px;" class=" " scope="col">PRODUCT</th>
                                        <th style="font-size: 14px;" scope="col" class="text-center ">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($quotations as $data)
                                    @php
                                    $products = json_decode($data->product, true);
                                    $materials = json_decode($data->material, true);
                                    $sizes = json_decode($data->size, true);
                                    $specs = json_decode($data->specs, true);
                                    $qtys = json_decode($data->qty, true);
                                    $prices = json_decode($data->price, true);
                                    // Mengambil item pertama dari masing-masing kolom
                                    $firstProduct = reset($products);
                                    $firstMaterial = reset($materials);
                                    $firstSize = reset($sizes);
                                    $firstSpecs = reset($specs);
                                    $firstQty = reset($qtys);
                                    $firstPrice = reset($prices);
                                    @endphp
                                    <tr>
                                        <td style="font-size: 14px; width:20px; padding-top:2px; padding-bottom:2px;"
                                            scope="col" class="sticky text-center">{{ $data->id}}</td>
                                        <td style="padding-top:2px; padding-bottom:2px;" class="">{{\Carbon\Carbon::parse($data->created_at)->format('j M y') }}</td>
                                        <td style="padding-top:2px; padding-bottom:2px;" class="">{{ $data->customer}}</td>
                                        <td style="padding-top:2px; padding-bottom:2px;" class="">{{ $firstProduct}}
                                        </td>
                                        <td style="padding-top: 3px; padding-bottom:3px;"
                                            class="d-flex justify-content-center ">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-primary dropdown-toggle" href="#" role="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    Manage
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModalToggle{{ $data->id }}">Detail</a></li>
                                                    </li>
                                                    <li><a class="dropdown-item"
                                                            href="{{ route('quotationmgr.print', $data->id) }}">Print</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-2">
                            {{ $quotations->appends(request()->query())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






    @endsection