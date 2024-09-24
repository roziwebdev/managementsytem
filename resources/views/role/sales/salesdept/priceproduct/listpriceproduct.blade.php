@extends('role.purchasing.layoutsmrdept.main')
@section('main-container')


<link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
<div class="main-panel">
    <div class=" content-wrapper" style="background-color: #f6f6fb">
        <div class="row ">

            <div class="">
                <div class="shadow card rounded-xl">
                    <div class="border shadow card-body">
                        <h3 class="pb-3 text-center">INDEX PRICE</h3>
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
