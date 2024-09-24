@extends('role.sales.layouts.main')
@section('main-container')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

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
        <div id="myButton" class="py-2 justify-content-end d-flex">
            <button class="btn btn-info">Add SC</button>
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
                        <h4 class="mb-3 card-title">Form New Plant</h4>
                        <form class="form-sample" method="POST" action="{{ route('salesdept.store') }}" enctype="multipart/form-data"
                            id="pricelistForm">
                            @csrf
                            <div class="shadow row stretch-card grid-margin" style="background-color: #f1f1f6">
                                <div class="mt-3 col-md ">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">PO</label>
                                        <input type="text" class="form-control form-control-sm clickable" name="po" required>
                                        <input type="hidden" class="form-control form-control-sm clickable" name="statussc" value="Waiting" required>
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Tanggal PO</label>
                                        <input type="date" class="form-control form-control-sm clickable" name="tanggalpo"
                                            placeholder="" required>
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">S-code</label>
                                        <input type="text" class="form-control form-control-sm clickable " name="scode"
                                            placeholder="" required>
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Customer</label>
                                        <input type="text" id="input1" class="form-control form-control-sm clickable " name="customer"
                                            placeholder="" required list="listcust">
                                            <datalist id="listcust">
                                                @foreach ($cust as $data )
                                                    <option>{{ $data->customer }}</option>
                                                @endforeach
                                            </datalist>
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Up</label>
                                        <input type="text" class="form-control form-control-sm clickable " name="up"  id="input2"
                                            placeholder="" required>
                                    </div>
                                </div>

                               <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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
                                                $('#input2').val(data.up);
                                            },
                                            error: function () {
                                                alert('Gagal mengambil data customer.');
                                            }
                                        });
                                    });
                                });
                            </script>

                            <div class="mt-3 col-md">
                                <div class="mb-3" style="font-size: 14px">
                                    <label for="" class="form-label fw-bold ">Plant</label>
                                    <input type="text" class="form-control form-control-sm clickable" id="inputplant" name="plantcode"
                                    placeholder="" required list='listplant'>
                                    <datalist id="listplant">
                                        @foreach ($plants as $data )
                                            <option>{{ $data->plant }}</option>
                                        @endforeach
                                    </datalist>
                                </div>
                            </div>
                            <div class="mt-3 col-md">
                                <div class="mb-3" style="font-size: 14px">
                                    <label for="" class="form-label fw-bold ">Address</label>
                                    <input type="text" class="form-control form-control-sm clickable " id="getplant" name="address"
                                    placeholder="" required>
                                </div>
                            </div>
                            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                            <script>
                                $(document).ready(function () {
                                    // Fungsi yang dipanggil saat nilai input pertama berubah
                                    $('#inputplant').change(function () {
                                        // Mendapatkan nilai yang dipilih pada input pertama
                                        var selectedPlant = $(this).val();

                                        // Melakukan Ajax request ke server untuk mendapatkan data client dan address berdasarkan namacustomer
                                        $.ajax({
                                            type: 'GET',
                                            url: '/get-customer-dataplant/' + selectedPlant, // Gantilah dengan URL endpoint yang sesuai di Laravel
                                            success: function (data) {
                                                // Mengisi nilai pada input kedua dan ketiga
                                                $('#getplant').val(data.address);
                                            },
                                            error: function () {
                                                alert('Gagal mengambil data customer.');
                                            }
                                        });
                                    });
                                });
                            </script>
            <!-- Contoh menggunakan CDN -->
            
            
                                <div class=" row stretch-card grid-margin" style="background-color: #">
                                    <div class="mt-3 col-md ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Tender</label>
                                            <input  name="tender"  type="text" class="form-control form-control-sm clickable">
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Ket Pembayaran</label>
                                            <input list="ketpem"  name="keteranganpembayaran"  type="text" class="form-control form-control-sm clickable" required>
                                            <datalist id="ketpem">
                                                <option value="Syarat pembayaran 30 hari setelah tukar faktur">Syarat pembayaran 30 hari setelah tukar faktur</option>
                                            </datalist>
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Note Eksternal</label>
                                            <input name="noteeksternal"  type="text" class="form-control form-control-sm clickable">
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Ket CS</label>
                                            <input list="cs"  name="etapilihan"  type="text" class="form-control form-control-sm clickable">
                                            <datalist id="cs">
                                                <option value="(Tanggal tersebut perlu dikonfirmasi Customer Support)">(Tanggal tersebut perlu dikonfirmasi Customer Support)</option>
                                            </datalist>
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold ">Sales</label>
                                            <select class="form-select" name="sellerowner">
                                                <option value="STEPHANIE">STEPHANIE</option>
                                                <option value="WENDY">WENDY</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold ">Ket Cust</label>
                                            <select class="form-select" name="keterangancust">
                                                <option value="non mayora">NON MAYORA</option>
                                                <option value="mayora">MAYORA</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">File PO</label>
                                            <input id="" name="filepo"  type="file" class="form-control form-control-md clickable" required>
                                        </div>
                                    </div>
                                  


                              
                                </div>

                            </div>
                      
                            
                            
                            
                            <div id='row2'>
                                <div class="shadow row" style="background-color: #f1f1f6">
                                    <div class="mt-3 col-md ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Product</label>
                                            <input type="text" class="form-control form-control-sm clickable" id="search" name="product[]"
                                                required list="list">
                                                <datalist id="list">
                                                    @foreach($productsales as $data)
                                                    <option value="{{$data->product}}">{{$data->product}}</option> 
                                                    @endforeach
                                                </datalist>
                                        </div>
                                        <div id="search-results"></div>
                                    </div>
                                </div>
                                               
                                
                                <div class="col">
                                        <div id="newinput2"></div>
                                        <div id="rowAdder2" class="my-3 btn btn-gradient-success btn-sm">Add</div>
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="mt-2 btn-rounded btn btn-gradient-info float-end">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="shadow card rounded-xl">
                    <div class="border shadow card-body">
                        <h3 class="pb-3 text-center">SALES CONTRACT</h3>
                        <div class="py-3 d-flex">
                            <div class="dropdown">
                                <a class="px-5 btn btn-sm btn-dark dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    SORT
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
                                            <input type="hidden" name="statussc" value="Approve">
                                            <button type="submit" class="dropdown-item ">
                                                <span class="px-2 align-middle material-symbols-outlined"
                                                    style="font-size: 20px">
                                                    check_circle
                                                </span>Approve
                                            </button>
                                        </form>
                                    </li>
                                    <li>
                                        <form action="" method="GET" novalidate="novalidate">
                                            <input type="hidden" name="statussc" value="Waiting">
                                            <button type="submit" class="dropdown-item ">
                                                <span class="px-2 align-middle material-symbols-outlined"
                                                    style="font-size: 20px">
                                                    hourglass_top
                                                </span>Waiting
                                            </button>
                                        </form>
                                        <form action="" method="GET" novalidate="novalidate">
                                            <input type="hidden" name="statussc" value="Cancel">
                                            <button type="submit" class="dropdown-item ">
                                                <span class="px-2 align-middle material-symbols-outlined"
                                                    style="font-size: 20px">
                                                    cancel
                                                </span>Cancel
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
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
                              
                                td{
                                    background-color: #ffffff;
                                }
                                .bg-hover:hover {
                                    background-color: #dee2e6; /* Warna latar belakang yang diinginkan saat hover */
                                    cursor:pointer;
                                }
                                    .ellipsis {
                                    white-space: nowrap;
                                    overflow: hidden;
                                    text-overflow: ellipsis;
                                    max-width: 30ch; /* Atau sesuaikan dengan ukuran yang Anda inginkan */
                                }


                            </style>
                            <table class="table" id="myTable">
                                <thead>
                                    <tr style="background-color: #f1f1f6">
                                        <th style="font-size: 14px; width:20px;" scope="col" class="">
                                            <div class="dropdown">
                                                <a class="absolute text-dark text-decoration-none dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    NO SC
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="/salesdept" class="dropdown-item ">
                                                            <span class="px-2 align-middle material-symbols-outlined" style="font-size: 20px">
                                                                clear_all
                                                            </span>Clear
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <form action="" method="GET" novalidate="novalidate">
                                                            <input type="hidden" name="sort_by" value="asc">
                                                            <button type="submit" class="dropdown-item ">
                                                                <span class="px-2 align-middle material-symbols-outlined" style="font-size: 20px">
                                                                    text_rotate_up
                                                                </span>Sort A to Z
                                                            </button>
                                                        </form>
                                                    </li>
                                                    <li>
                                                        <form action="" method="GET" novalidate="novalidate">
                                                            <input type="hidden" name="sort_by" value="desc">
                                                            <button type="submit" class="dropdown-item ">
                                                                <span class="px-2 align-middle material-symbols-outlined" style="font-size: 20px">
                                                                    text_rotation_down
                                                                </span>Sort Z to A
                                                            </button>
                                                        </form>
                                                    </li>



                                                </ul>
                                            </div>
                                        </th>
                                        <th style="font-size: 14px;" scope="col" class="">TANGGAL PO</th>
                                        <th style="font-size: 14px;" scope="col" class="">TANGGAL SC</th>
                                        <th style="font-size: 14px; width:20px;" scope="col" >
                                            <div class="dropdown">
                                                <a class="absolute text-dark text-decoration-none dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    PRODUCT
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="/salesdept" class="dropdown-item ">
                                                            <span class="px-2 align-middle material-symbols-outlined" style="font-size: 20px">
                                                                clear_all
                                                            </span>Clear
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <form action="" method="GET" novalidate="novalidate">
                                                            <input type="hidden" name="sort_by" value="ascproduct">
                                                            <button type="submit" class="dropdown-item ">
                                                                <span class="px-2 align-middle material-symbols-outlined" style="font-size: 20px">
                                                                    text_rotate_up
                                                                </span>Sort A to Z
                                                            </button>
                                                        </form>
                                                    </li>
                                                    <li>
                                                        <form action="" method="GET" novalidate="novalidate">
                                                            <input type="hidden" name="sort_by" value="descproduct">
                                                            <button type="submit" class="dropdown-item ">
                                                                <span class="px-2 align-middle material-symbols-outlined" style="font-size: 20px">
                                                                    text_rotation_down
                                                                </span>Sort Z to A
                                                            </button>
                                                        </form>
                                                    </li>



                                                </ul>
                                            </div>
                                        </th>
                                        <th style="font-size: 14px; width:20px;" scope="col" >CUSTOMER</th>
                                        <th style="font-size: 14px;" scope="col" class="">PO</th>
                                        <th style="font-size: 14px;" scope="col" class="">FILE PO</th>
                                        <th style="font-size: 14px; width:20px;" scope="col">STS SC</th>
                                        <th style="font-size: 14px; width:20px;" scope="col">STS</th>
                                        <th style="font-size: 14px;" scope="col" class="">DETAIL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($salescontract as $data)
                                    @php
                                        $statussc = json_decode($data->statusproduct, true);
                                        $products = json_decode($data->product, true);
                                        // Mengambil item pertama dari masing-masing kolom
                                        $firstStatus = reset($statussc);
                                        $firstProduct = reset($products);
                                    @endphp
                                    <tr class="bg-hover">
                                        <td data-href="{{ route('salesdept.print', $data->id) }}" style="font-size: 14px; width:20px; padding-top:2px; padding-bottom:2px;" scope="col" 
                                        @if ($data->statussc == 'Approve')
                                        class="sticky" 
                                        @elseif($data->statussc == 'Waiting')
                                        class="sticky fw-bold" 
                                        @endif
                                        >
                                        
                                            {{ $data->id}}
                                        </td>
                                        <td data-href="{{ route('salesdept.print', $data->id) }}" style="padding-top:2px; padding-bottom:2px;"
                                        @if ($data->statussc == 'Waiting')
                                        class="fw-bold"
                                        @endif
                                        >{{ \Carbon\Carbon::parse($data->tanggalpo)->format('j M y') }}</td>
                                        <td data-href="{{ route('salesdept.print', $data->id) }}" style="padding-top:2px; padding-bottom:2px;"
                                        @if ($data->statussc == 'Waiting')
                                        class="fw-bold"
                                        @endif
                                        >{{ \Carbon\Carbon::parse($data->created_at)->format('j M y') }}</td>
                                        <td data-href="{{ route('salesdept.print', $data->id) }}" style="padding-top:2px; padding-bottom:2px;"
                                        @if ($data->statussc == 'Waiting')
                                        class="fw-bold"
                                        @endif
                                        >{{ $firstProduct}}</td>
                                        <td data-href="{{ route('salesdept.print', $data->id) }}" style="padding-top:2px; padding-bottom:2px;"
                                        @if ($data->statussc == 'Waiting')
                                        class="fw-bold"
                                        @endif
                                        >{{ $data->customer}}</td>
                                        <td data-href="{{ route('salesdept.print', $data->id) }}" style="padding-top:2px; padding-bottom:2px;"
                                        @if ($data->statussc == 'Waiting')
                                        class="fw-bold"
                                        @endif
                                        >{{ $data->po}}</td>
                                        <td style="padding-top:2px; padding-bottom:2px;" class="text-center">
                                            <a href="{{ asset('storage/path/to/your/image/' . $data->filepo) }}" target="_blank">
                                                @if($data->filepo)
                                                <span class="material-symbols-outlined text-primary">
                                                @else
                                                <span class="material-symbols-outlined text-dark">
                                                @endif
                                                    description
                                                </span>    
                                            </a>
                                        </td>
                                        <td style="padding-top:2px; padding-bottom:2px;"
                                        @if ($data->statussc == 'Waiting')
                                        class="fw-bold"
                                        @endif
                                        >
                                            {{ $firstStatus}}
                                        </td>
                                        <td style="padding-top:2px; padding-bottom:2px;">
                                            @if ($data->statussc == 'Approve')
                                            <span class="material-symbols-outlined text-success" style='font-size:18px'>
                                                check_circle
                                            </span>
                                            @elseif ($data->statussc == 'Waiting')
                                            <span class="material-symbols-outlined text-warning" style='font-size:18px'>
                                                hourglass_top
                                            </span>
                                            @elseif ($data->statussc == 'Declined')
                                            <span class="material-symbols-outlined text-danger" style='font-size:18px'>
                                                cancel
                                            </span>
                                            @endif
                                        </td>
                                        <td style="padding-top: 3px; padding-bottom:3px;" class="d-flex ">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-primary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    Manage
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#exampleModalToggle{{ $data->id }}">Detail</a></li>
                                                    <li><a class="dropdown-item" href="{{ route('salesdept.edit', $data->id) }}">Edit</a></li>
                                                    <li><a class="dropdown-item" href="{{ route('salesdept.print', $data->id) }}">Print</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="exampleModalToggle{{ $data->id }}" aria-hidden="true"
                                        aria-labelledby="exampleModalToggleLabel{{ $data->id }}" tabindex="-1">
                                        @include('role.sales.salesdept.salescontract.show', ['details' => $data])
                                    </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-2">
                            {{ $salescontract->appends(request()->query())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    function handleRemoveItem2(id) {
        $(`#row2${id}`).remove();
    }
           function updateResult1(id) {
            var input1 = parseFloat($(`#input1111${id}`).val()) || 0;
            var input2 = parseFloat($(`#input2222${id}`).val()) || 0;
            console.log("Input 111:", input1);
            console.log("Input 222:", input2);
            var result = input1 * input2;
            console.log("Result:", result);
            $(`#result1${id}`).val(result);
        }

    $(document).ready(function() {
        $('#search').on('keyup', function() {
            var query = $(this).val();
            if (query !== '') {
                $.ajax({
                    url: '/searchproductsales',
                    method: 'GET',
                    data: {
                        query: query
                    },
                    success: function(data) {
                        $('#search-results').html(data);
                    }
                });
            } else {
                $('#search-results').html('');
            }
        });

        let counter2 = 1;

 

        $("#rowAdder2").click(function() {
            newRowAdd2 = `
                <div id='row2${counter2}' class="mt-2">
                    <div class="shadow row" style="background-color: #f1f1f6">
                        <div class="mt-3 col-md ">
                            <div class="mb-3" style="font-size: 14px">
                                <label for="" class="form-label fw-bold">Product</label>
                                <input type="text" class="form-control form-control-sm clickable" id="search${counter2}" name="product[]"
                                    required list="list${counter2}">
                                <datalist id="list${counter2}">
                                    @foreach($productsales as $data)
                                    <option value="{{$data->product}}">{{$data->product}}</option> 
                                    @endforeach
                                </datalist>
                            </div>
                            <div id="search-results${counter2}"></div>
                        </div>
                        <div>
                            <button class="btn btn-sm btn-gradient-danger" onclick="handleRemoveItem2(${counter2})">Remove</button>
                        </div>
                    </div>
                </div>
            `;
            // Tambahkan elemen baru setelah elemen dengan ID "rowAdder"
            $("#newinput2").append(newRowAdd2);
            // Handle the keyup event for dynamically added inputs
            $(`#search${counter2}`).on('keyup', function() {
                var query = $(this).val();
                var currentElementId = $(this).attr('id').replace('search', '');
                if (query !== '') {
                    $.ajax({
                        url: '/searchproductsales',
                        method: 'GET',
                        data: {
                            query: query
                        },
                        success: function(data) {
                            $(`#search-results${currentElementId}`).html(data);
                        }
                    });
                } else {
                    $(`#search-results${currentElementId}`).html('');
                }
            });
            counter2++;
        });
    });
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


<script>
    function updateResult() {
    var input1 = parseFloat($('#input111').val()) || 0;
    var input2 = parseFloat($('#input222').val()) || 0;
    console.log("Input 111:", input1);
    console.log("Input 222:", input2);
    var result = input1 * input2;
    console.log("Result:", result);
    $('#result').val(result);
}
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Get the table element by its ID
        var table = document.getElementById("myTable");

        // Get all cells in the table body
        var cells = table.getElementsByTagName("tbody")[0].getElementsByTagName("td");

        // Add a click event listener to each cell
        for (var i = 0; i < cells.length; i++) {
            // Check if the cell has a data-href attribute
            var link = cells[i].getAttribute("data-href");
            
            if (link) {
                // Add click event listener only to cells with data-href attribute
                cells[i].addEventListener("click", function () {
                    // Get the data-href attribute value
                    var link = this.getAttribute("data-href");

                    // Navigate to the link in the same tab
                    window.location.href = link;
                });
            }
        }
    });
</script>



    @endsection
