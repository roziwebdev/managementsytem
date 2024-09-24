@extends('role.sales.layouts.main')
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
        <div class="row ">
            {{-- <div class="col-12 stretch-card grid-margin">
                <div class="border rounded card">
                    <div class="border rounded shadow card-body">
                        <h4 class="mb-3 card-title">Form New Plant</h4>
                        <form class="form-sample" method="POST" action="{{ route('priceproduct.store') }}" id="pricelistForm">
                            @csrf
                            <div class="shadow row stretch-card grid-margin" style="background-color: #f1f1f6">
                                <div class="mt-3 col-md ">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Customer</label>
                                        <input type="text" class="form-control form-control-sm" name="customer" required>
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Product</label>
                                        <input type="text" class="form-control form-control-sm " name="product"
                                            placeholder="" required>
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">PO</label>
                                        <input type="text" class="form-control form-control-sm " name="po"
                                            placeholder="" required>
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Harga</label>
                                        <input type="text" class="form-control form-control-sm " name="harga"
                                            placeholder="" required>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="mt-2 btn-rounded btn btn-gradient-info float-end">
                                    Submit
                                </button>
                            </div>
                            <!-- Add this modal at the bottom of your Blade file -->
                            <div class="modal fade" id="successModal" tabindex="-1" role="dialog"
                                aria-labelledby="successModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="successModalLabel">Success!</h5>

                                        </div>
                                        <div class="modal-body">
                                            Customer berhasil di tambahkan.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                        </form>
                    </div>
                </div>
            </div> --}}

            <div class="">
                <div class="shadow card rounded-xl">
                    <div class="border shadow card-body">
                        <h3 class="pb-3 text-center">INDEX PRICE</h3>
                        <div class="py-3 d-flex">
                            <!--<div class="dropdown">-->
                            <!--    <a class="px-5 btn btn-sm btn-dark dropdown-toggle" href="#" role="button"-->
                            <!--        data-bs-toggle="dropdown" aria-expanded="false">-->
                            <!--        Status-->
                            <!--    </a>-->
                            <!--    <ul class="dropdown-menu">-->
                            <!--        <li>-->

                            <!--            <a href="/dept/deptmr" class="dropdown-item ">-->
                            <!--                <span class="px-2 align-middle material-symbols-outlined"-->
                            <!--                    style="font-size: 20px">-->
                            <!--                    clear_all-->
                            <!--                </span>All Status-->
                            <!--            </a>-->

                            <!--        </li>-->

                            <!--        <li>-->
                            <!--            <form action="" method="GET" novalidate="novalidate">-->
                            <!--                <input type="hidden" name="status" value="Approve">-->
                            <!--                <button type="submit" class="dropdown-item ">-->
                            <!--                    <span class="px-2 align-middle material-symbols-outlined"-->
                            <!--                        style="font-size: 20px">-->
                            <!--                        check_circle-->
                            <!--                    </span>Approve-->
                            <!--                </button>-->
                            <!--            </form>-->
                            <!--        </li>-->
                            <!--        <li>-->
                            <!--            <form action="" method="GET" novalidate="novalidate">-->
                            <!--                <input type="hidden" name="status" value="Waiting List">-->
                            <!--                <button type="submit" class="dropdown-item ">-->
                            <!--                    <span class="px-2 align-middle material-symbols-outlined"-->
                            <!--                        style="font-size: 20px">-->
                            <!--                        hourglass_top-->
                            <!--                    </span>Waiting List-->
                            <!--                </button>-->
                            <!--            </form>-->
                            <!--        </li>-->
                            <!--        <li>-->
                            <!--            <form action="" method="GET" novalidate="novalidate">-->
                            <!--                <input type="hidden" name="status" value="Waiting">-->
                            <!--                <button type="submit" class="dropdown-item ">-->
                            <!--                    <span class="px-2 align-middle material-symbols-outlined"-->
                            <!--                        style="font-size: 20px">-->
                            <!--                        error-->
                            <!--                    </span>Waiting-->
                            <!--                </button>-->
                            <!--            </form>-->
                            <!--        </li>-->
                            <!--        <li>-->
                            <!--            <form action="" method="GET" novalidate="novalidate">-->
                            <!--                <input type="hidden" name="status" value="Declined">-->
                            <!--                <button type="submit" class="dropdown-item ">-->
                            <!--                    <span class="px-2 align-middle material-symbols-outlined"-->
                            <!--                        style="font-size: 20px">-->
                            <!--                        cancel-->
                            <!--                    </span>Declined-->
                            <!--                </button>-->
                            <!--            </form>-->
                            <!--        </li>-->

                            <!--    </ul>-->
                            <!--</div>-->
                            <!--<div class="px-4 dropdown">-->
                            <!--    <a class="px-4 btn btn-sm btn-dark dropdown-toggle " href="#" role="button"-->
                            <!--        data-bs-toggle="dropdown" aria-expanded="false">-->
                            <!--        Departement-->
                            <!--    </a>-->

                            <!--    <ul class="dropdown-menu">-->
                            <!--        <li>-->

                            <!--            <a href="/dept/deptmr" class="dropdown-item ">-->
                            <!--                <span class="px-2 align-middle material-symbols-outlined"-->
                            <!--                    style="font-size: 20px">-->
                            <!--                    clear_all-->
                            <!--                </span>All Dept-->
                            <!--            </a>-->

                            <!--        </li>-->
                            <!--        <li>-->
                            <!--            <form action="" method="GET" novalidate="novalidate">-->
                            <!--                <input type="hidden" name="dept" value="FA & TAX">-->
                            <!--                <button type="submit" class="dropdown-item ">-->
                            <!--                    <span class="px-2 align-middle material-symbols-outlined"-->
                            <!--                        style="font-size: 20px">-->
                            <!--                        Payments-->
                            <!--                    </span>FA & TAX-->
                            <!--                </button>-->
                            <!--            </form>-->
                            <!--        </li>-->
                            <!--        <li>-->
                            <!--            <form action="" method="GET" novalidate="novalidate">-->
                            <!--                <input type="hidden" name="dept" value="HRGA">-->
                            <!--                <button type="submit" class="dropdown-item ">-->
                            <!--                    <span class="px-2 align-middle material-symbols-outlined"-->
                            <!--                        style="font-size: 20px">-->
                            <!--                        Group-->
                            <!--                    </span>HRGA-->
                            <!--                </button>-->
                            <!--            </form>-->
                            <!--        </li>-->
                            <!--        <li>-->
                            <!--            <form action="" method="GET" novalidate="novalidate">-->
                            <!--                <input type="hidden" name="dept" value="PPIC RM">-->
                            <!--                <button type="submit" class="dropdown-item ">-->
                            <!--                    <span class="px-2 align-middle material-symbols-outlined"-->
                            <!--                        style="font-size: 20px">-->
                            <!--                        quick_reference-->
                            <!--                    </span>PPIC RM-->
                            <!--                </button>-->
                            <!--            </form>-->
                            <!--        </li>-->
                            <!--        <li>-->
                            <!--            <form action="" method="GET" novalidate="novalidate">-->
                            <!--                <input type="hidden" name="dept" value="PPIC SM">-->
                            <!--                <button type="submit" class="dropdown-item ">-->
                            <!--                    <span class="px-2 align-middle material-symbols-outlined"-->
                            <!--                        style="font-size: 20px">-->
                            <!--                        Support-->
                            <!--                    </span>PPIC SM-->
                            <!--                </button>-->
                            <!--            </form>-->
                            <!--        </li>-->
                            <!--        <li>-->
                            <!--            <form action="" method="GET" novalidate="novalidate">-->
                            <!--                <input type="hidden" name="dept" value="Produksi">-->
                            <!--                <button type="submit" class="dropdown-item ">-->
                            <!--                    <span class="px-2 align-middle material-symbols-outlined"-->
                            <!--                        style="font-size: 20px">-->
                            <!--                        Inventory-->
                            <!--                    </span>Produksi-->
                            <!--                </button>-->
                            <!--            </form>-->
                            <!--        </li>-->
                            <!--        <li>-->
                            <!--            <form action="" method="GET" novalidate="novalidate">-->
                            <!--                <input type="hidden" name="dept" value="HRGA">-->
                            <!--                <button type="submit" class="dropdown-item ">-->
                            <!--                    <span class="px-2 align-middle material-symbols-outlined"-->
                            <!--                        style="font-size: 20px">-->
                            <!--                        group-->
                            <!--                    </span>Prodev-->
                            <!--                </button>-->
                            <!--            </form>-->
                            <!--        </li>-->
                            <!--    </ul>-->
                            <!--</div>-->

                        </div>
                         
                        <form action="" method="GET" novalidate="novalidate">
                            <div class="pb-2 d-flex">
                                <input type="text" name="search" type="search" class="form-control form-control-sm" list="dataproduct">
                                <datalist id='dataproduct'>
                                    @foreach ($salescontract as $data)
                                    @php
                                        $products = json_decode($data->product);
                                        $combinedData = array_map(null,$products);
                                    @endphp
                                    @foreach ($combinedData as $datas)
                                    <option value="{{$datas}}">
                                    @endforeach
                                    
                                    @endforeach
                                </datalist>
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
                            </style>
                            <table class="table" id="materialRequestTable">
                                <thead>
                                    <tr style="background-color: #f1f1f6">
                                        <th style="font-size: 14px;" scope="col" class="">
                                            <div class="dropdown">
                                                <a class="absolute text-dark text-decoration-none dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    NO SC
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="/sales/priceproduct" class="dropdown-item ">
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
                                        <th style="font-size: 14px;" scope="col" class="">CUSTOMER</th>
                                        <th style="font-size: 14px;" scope="col" class="">PRODUCT</th>
                                        <th style="font-size: 14px;" scope="col" class="">QTY</th>
                                        <th style="font-size: 14px;" scope="col" class="">HARGA</th>
                                        <th style="font-size: 14px;" scope="col" class="">PO</th>
                                        <th style="font-size: 14px;" scope="col" class="">TANGGAL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($salescontract as $data)
                                    @php
                                        $products = json_decode($data->product);
                                        $saps = json_decode($data->sap);
                                        $materials = json_decode($data->material);
                                        $sizes = json_decode($data->size);
                                        $finishings = json_decode($data->finishing);
                                        $specs = json_decode($data->specs);
                                        $qtys = json_decode($data->qty);
                                        $units = json_decode($data->unit);
                                        $prices = json_decode($data->price);
                                        $totals = json_decode($data->total);
                                        $etausers = json_decode($data->etauser);
                                        $toleransis = json_decode($data->toleransi);
                                        $notessc = json_decode($data->notesc);
                                        $statusproduct = json_decode($data->statusproduct);
                                        $combinedData = array_map(null,$products,$qtys,$prices,);
                                    @endphp
                                    @foreach($combinedData as $datas)
                                    <tr>
                                        <td>{{ $data->id}}</td>
                                        <td>{{ $data->customer}}</td>
                                        <td>{{ $datas[0]}}</td>
                                        <td>{{ number_format($datas[1], 0, ',', '.') }}</td>
                                        <td>Rp. {{ number_format($datas[2], 0, ',', '.') }}</td>
                                        <td>{{ $data->po}}</td>
                                        <td>{{ \Carbon\Carbon::parse($data->tanggalpo)->format('j M y') }}</td>
                                    </tr>
                                    @endforeach
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





    @endsection
