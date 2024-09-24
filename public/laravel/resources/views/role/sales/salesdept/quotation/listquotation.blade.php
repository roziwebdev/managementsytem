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
    @foreach ( $quotations as $data )
    <div class="modal fade" id="exampleModalToggle{{ $data->id }}" aria-hidden="true"
        aria-labelledby="exampleModalToggleLabel{{ $data->id }}" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header pt-1 pb-0 mb-0">
                    <div class="text-center container-xl pb-0 mb-0">
                        <h1 class="text-center modal-title" style="font-size: 25px"
                            id="exampleModalToggleLabel{{ $data->id }}">QUOTATION SALES</h1>
                    </div>
                    <button type="button" class="float-end btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-4">
                    <div class="container-xl">
                        <div class="border shadow border-secondary" style="background:#F0F0F0">
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
                                                    <tr>
                                                        <td class="pt-2 pb-2 col-sm-4">Remarks </td>
                                                        <td class="pt-2 pb-2 col-sm-8">{!! nl2br($data[8]) !!}</td>
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
        <div  class="py-2 justify-content-end d-flex">
            <button id="myButton" class="btn btn-info">Add Quotation</button>
        </div>
        <div class="row" id='row'>
            <div class="col-12 stretch-card grid-margin" id="myForm">
                <div class="mt-2 row" style="background-color: ">
                    <div class="mb-3 col-md">
                        <label for="" class="form-label fw-bold ">Preview</label>
                        <input class="form-control " id="inputpreview" />
                    </div>
                </div>
                <div class="border rounded card">
                    <div class="border rounded shadow card-body">
                        <h4 class="mb-3 card-title">Form New Quotation</h4>
                        <form class="form-sample" method="POST" action="{{ route('quotation.store') }}"
                            id="pricelistForm">
                            @csrf
                            <div class="shadow row stretch-card grid-margin" style="background-color: #f1f1f6">
                                <div class="mt-3 col-md ">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Customer</label>
                                        <input type="text" class="inputCustomer form-control form-control-sm clickable rounded-3 shadow-sm" name="customer"
                                            id="input1" required list="listcust" oninput="getProductsByCustomerAndProduct(this.value)">
                                        <datalist id="listcust">
                                            @foreach ($customers as $customer)
                                            <option value="{{ $customer->customer }}" />
                                            @endforeach
                                        </datalist>
                                        <script>
                                            $(document).ready(function () {
                                                // Fungsi yang dipanggil saat nilai input pertama berubah
                                                $('#input1').change(function () {
                                                    // Mendapatkan nilai yang dipilih pada input pertama
                                                    var selectedCustomer = $(this).val();
                                                    // Melakukan Ajax request ke server untuk mendapatkan data client dan address berdasarkan namacustomer
                                                    $.ajax({
                                                        type: 'GET',
                                                        url: '/get-customer-datacust/' + selectedCustomer, // Gantilah dengan URL endpoint yang sesuai di Laravel
                                                        success: function (data) {
                                                            // Mengisi nilai pada input kedua dan ketiga
                                                            $('#input2').val(data.address);
                                                        },
                                                    });
                                                });
                                            });
                                        </script>
                                    </div>
                                </div>
                                <div class="mt-3 col">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Address</label>
                                        <input type="text" class="form-control form-control-sm clickable rounded-3 shadow-sm" name="alamat" id="input2" required>
                                    </div>
                                </div>
                                <div class="mt-3 col">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Seller</label>
                                        <select class="form-select rounded-3 shadow-sm" name="seller">
                                            <option value="Stephanie Negoro">Stephanie Negoro</option> 
                                            <option value="Wendy Negoro">Wendy Negoro</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id='row2'>
                                <div class="shadow row" style="background-color: #f1f1f6">
                                    <div class="mt-3 col-md ">
                                        <div class="mb-3" style="font-size: 14px">
                                                <label for="" class="form-label fw-bold">Product</label>
                                                <input id="inputproduct" style="height: 58px" class="inputProduct form-control clickable rounded-3 shadow-sm"
                                                    name="product[]" required oninput="getProductsByCustomerAndProduct(document.getElementById('input1').value)"
                                                    list="listproduct" />
                                                <datalist id="listproduct"></datalist>
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Material</label>
                                            <textarea id="inputmaterial" class="form-control clickable rounded-3 shadow-sm" name="material[]" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="shadow row" style="background-color: #f1f1f6">
                                    <div class="mt-3 col-md ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Size</label>
                                            <textarea id="inputsize" class="form-control clickable rounded-3 shadow-sm" name="size[]" required></textarea>
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Specs</label>
                                            <textarea id="inputspecs" class="form-control clickable rounded-3 shadow-sm" name="specs[]" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    $(document).ready(function () {
                                        // Fungsi yang dipanggil saat nilai input pertama berubah
                                        $('#inputproduct').change(function () {
                                            // Mendapatkan nilai yang dipilih pada input pertama
                                            var selectedProduct = $(this).val();
                                            // Melakukan Ajax request ke server untuk mendapatkan data client dan address berdasarkan namacustomer
                                            $.ajax({
                                                type: 'GET',
                                                url: '/get-product-dataproduct/' + selectedProduct, // Gantilah dengan URL endpoint yang sesuai di Laravel
                                                success: function (data) {
                                                    // Mengisi nilai pada input kedua dan ketiga
                                                    $('#inputmaterial').val(data.material);
                                                    $('#inputsize').val(data.size);
                                                    $('#inputspecs').val(data.specs);
                                                },
                                            });
                                        });
                                    });
                                </script>
                                <div class="shadow  row" style="background-color: #f1f1f6">
                                    <div class="mt-3 col-md ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Quantity</label>
                                            <textarea class="form-control clickable rounded-3 shadow-sm" name="qty[]" required></textarea>
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Price</label>
                                            <textarea class="form-control clickable rounded-3 shadow-sm" name="price[]" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="shadow  row" style="background-color: #f1f1f6">
                                    <div class="mt-3 col-md ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Status</label>
                                            <select class="form-select rounded-3 shadow-sm" name="statusitem[]">
                                                <option selected value="PROGRESS">PROGRESS</option>
                                                <option value="OK">OK</option>
                                                <option value="NOT OK">NOT OK</option>
                                                <option value="NEGO">NEGO</option>
                                                <option value="REMARKS">REMARKS</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Unit</label>
                                            <select class="form-select rounded-3 shadow-sm" name="unit[]">
                                                <option selected value="PCS">PCS</option>
                                                <option value="SET">SET</option>
                                                <option value="LEMBAR">LEMBAR</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="shadow stretch-card grid-margin row" style="background-color: #f1f1f6">
                                    <div class="mt-3 col-md ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Remarks</label>
                                            <input class="form-control form-control-sm rounded-3 shadow-sm" name="noteitem[]" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div id="newinput2"></div>
                                    <div id="rowAdder2" class="my-3 btn btn-gradient-success btn-sm">Add</div>
                                </div>
                            </div>
                            <div>
                                <input type="hidden" name="po[]"/>
                                <input type="hidden" name="finalqty[]"/>
                                <input type="hidden" name="finalprice[]"/>
                                <input type="hidden" name="qtyfinalnego[]"/>
                                <input type="hidden" name="pricefinalnego[]"/>
                                <button type="submit" class="mt-2 btn-rounded btn btn-gradient-info float-end">
                                    Submit
                                </button>
                            </div>
                            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                        </form>
                    </div>
                </div>
            </div>
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
                                        <td style="font-size: 14px; width:20px; padding-top:2px; padding-bottom:2px;" scope="col" class="sticky text-center">{{ $data->id}}</td>
                                        <td style="padding-top:2px; padding-bottom:2px;" class="">{{\Carbon\Carbon::parse($data->created_at)->format('j M y') }}</td>
                                        <td style="padding-top:2px; padding-bottom:2px;" class="">{{ $data->customer}}</td>
                                        <td style="padding-top:2px; padding-bottom:2px;" class="">{{ $firstProduct}}</td>
                                        <td style="padding-top: 3px; padding-bottom:3px;" class="d-flex justify-content-center ">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-primary dropdown-toggle" href="#" role="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    Manage
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <!--<li><a class="dropdown-item" href="" data-bs-toggle="modal"-->
                                                    <!--        data-bs-target="#exampleModalToggle{{ $data->id }}">Detail</a></li>-->
                                                    <li><a class="dropdown-item" href="{{ route('quotation.edit', $data->id) }}">Edit</a></li>
                                                    <li><a class="dropdown-item"
                                                            href="{{ route('quotation.show', $data->id) }}">Detail</a>
                                                    </li>
                                                    <li><a class="dropdown-item"
                                                            href="{{ route('quotation.print', $data->id) }}">Print</a>
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    function getProductsByCustomerAndProduct(customerName, counter = null) {
            var productName;
            if (counter === null) {
                // Jika input product di luar script
                productName = document.querySelector('#inputproduct').value;
            } else {
                // Jika input product di dalam script newrowadd
                productName = document.querySelector(`#inputproduct${counter}`).value;
            }

            var xhr = new XMLHttpRequest();
            xhr.open('GET', '/get-products-by-customer-and-product?customer=' + encodeURIComponent(customerName) + '&product=' + encodeURIComponent(productName));
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var products = JSON.parse(xhr.responseText);
                        var datalist;
                        if (counter === null) {
                            // Jika input product di luar script
                            datalist = document.getElementById('listproduct');
                        } else {
                            // Jika input product di dalam script newrowadd
                            datalist = document.getElementById(`listproduct${counter}`);
                        }
                        datalist.innerHTML = '';
                        products.forEach(function(product) {
                            var option = document.createElement('option');
                            option.value = product;
                            datalist.appendChild(option);
                        });
                    } else {
                        console.error('Error:', xhr.status);
                    }
                }
            };
            xhr.send();
        }

        let counter2 = 1;

        function handleRemoveItem2(id) {
            $(`#row2${id}`).remove();
        }

        function updateResult1(id) {
            var selectedProduct = $(`#inputproduct${id}`).val();
            $.ajax({
                type: 'GET',
                url: '/get-product-dataproduct/' + selectedProduct,
                success: function(data) {
                    $(`#inputmaterial${id}`).val(data.material);
                    $(`#inputsize${id}`).val(data.size);
                    $(`#inputspecs${id}`).val(data.specs);
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching data:', status, error);
                }
            });
        }

        $("#rowAdder2").click(function() {
            var newRowAdd2 = `
                <div id='row2${counter2}' class="pt-2">
                    <div class="shadow row" style="background-color: #f1f1f6">
                        <div class="mt-3 col-md">
                            <div class="mb-3" style="font-size: 14px">
                                <label for="" class="form-label fw-bold">Product</label>
                                <input id="inputproduct${counter2}" style="height: 58px"
                                    class="inputProduct form-control clickable rounded-3 shadow-sm" name="product[]" required
                                    oninput="getProductsByCustomerAndProduct(document.getElementById('input1').value, ${counter2})"
                                    list="listproduct${counter2}" />
                                <datalist id="listproduct${counter2}" class="listproduct"></datalist>
                            </div>
                        </div>
                        <div class="mt-3 col-md">
                            <div class="mb-3" style="font-size: 14px">
                                <label for="" class="form-label fw-bold">Material</label>
                                <textarea id="inputmaterial${counter2}" class="form-control clickable rounded-3 shadow-sm" name="material[]" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="shadow row" style="background-color: #f1f1f6">
                        <div class="mt-3 col-md">
                            <div class="mb-3" style="font-size: 14px">
                                <label for="" class="form-label fw-bold">Size</label>
                                <textarea id="inputsize${counter2}" class="form-control clickable rounded-3 shadow-sm" name="size[]" required></textarea>
                            </div>
                        </div>
                        <div class="mt-3 col-md">
                            <div class="mb-3" style="font-size: 14px">
                                <label for="" class="form-label fw-bold">Specs</label>
                                <textarea id="inputspecs${counter2}" class="form-control clickable rounded-3 shadow-sm" name="specs[]" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="shadow row" style="background-color: #f1f1f6">
                        <div class="mt-3 col-md">
                            <div class="mb-3" style="font-size: 14px">
                                <label for="" class="form-label fw-bold">Quantity</label>
                                <textarea class="form-control clickable rounded-3 shadow-sm" name="qty[]" required></textarea>
                            </div>
                        </div>
                        <div class="mt-3 col-md">
                            <div class="mb-3" style="font-size: 14px">
                                <label for="" class="form-label fw-bold">Price</label>
                                <textarea class="form-control clickable rounded-3 shadow-sm" name="price[]" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="shadow  row" style="background-color: #f1f1f6">
                        <div class="mt-3 col-md ">
                            <div class="mb-3" style="font-size: 14px">
                                <label for="" class="form-label fw-bold">Status</label>
                                <select class="form-select rounded-3 shadow-sm" name="statusitem[]">
                                    <option selected value="PROGRESS">PROGRESS</option>
                                    <option value="OK">OK</option>
                                    <option value="NOT OK">NOT OK</option>
                                    <option value="NEGO">NEGO</option>
                                    <option value="REMARKS">REMARKS</option>
                                </select>
                            </div>
                        </div>
                        <div class="mt-3 col-md ">
                            <div class="mb-3" style="font-size: 14px">
                                <label for="" class="form-label fw-bold">Unit</label>
                                <select class="form-select rounded-3 shadow-sm" name="unit[]">
                                    <option selected value="PCS">PCS</option>
                                    <option value="SET">SET</option>
                                    <option value="LEMBAR">LEMBAR</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="shadow stretch-card grid-margin row" style="background-color: #f1f1f6">
                        <div class="mt-3 col-md ">
                            <div class="mb-3" style="font-size: 14px">
                                <label for="" class="form-label fw-bold">Remarks</label>
                                <input class="form-control form-control-sm rounded-3 shadow-sm" name="noteitem[]" />
                            </div>
                        </div>
                    </div>
                    <div class="col pt-4">
                        <button class="btn btn-sm btn-gradient-danger" onclick="handleRemoveItem2(${counter2})">Remove</button>
                    </div>
                </div>
            `;

            $("#newinput2").append(newRowAdd2);
            // Perbarui datalist untuk baris yang baru ditambahkan
            updateDatalistForNewRow(document.getElementById('input1').value, counter2);
            counter2++;
        });

        $(document).ready(function() {
            $(document).on('change', `input[name="product[]"]`, function() {
                var id = $(this).closest('.pt-2').attr('id').replace('row2', '');
                updateResult1(id);
            });
            $(document).on('input', `#newinput2 input[name="product[]"]`, function() {
                var id = $(this).closest('.pt-2').attr('id').replace('row2', '');
                getProductsByCustomerAndProduct(document.getElementById('input1').value, id);
            });
        });

        function updateDatalistForNewRow(customerName, counter) {
            var productName = document.getElementById(`inputproduct${counter}`).value;
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '/get-products-by-customer-and-product?customer=' + encodeURIComponent(customerName) + '&product=' + encodeURIComponent(productName));
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var products = JSON.parse(xhr.responseText);
                        var datalist = document.getElementById(`listproduct${counter}`);
                        datalist.innerHTML = '';
                        products.forEach(function(product) {
                            var option = document.createElement('option');
                            option.value = product;
                            datalist.appendChild(option);
                        });
                    } else {
                        console.error('Error:', xhr.status);
                    }
                }
            };
            xhr.send();
        }
</script>
    <script>
        // Mendapatkan semua elemen input
                var allInputs = document.querySelectorAll('.form-control');
                // Menambahkan event listener untuk setiap elemen
                allInputs.forEach(function(input) {
                    input.addEventListener('input', function() {
                        // Menetapkan nilai input 1 dengan nilai dari input yang sedang diedit
                        document.getElementById('inputpreview').value = input.value;
                    });

                    if (input.classList.contains('clickable')) {
                        input.addEventListener('click', function() {
                            // Menetapkan nilai input 1 dengan nilai dari input yang diklik
                            document.getElementById('inputpreview').value = input.value;
                        });
                    }
                });
    </script>





    @endsection