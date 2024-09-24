@extends('role.purchasing.layouts.main')
@section('main-container')
    <style>
        table td,
        table  {
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
        }

        thead {
            color: #fff;
        }

        .card {
            border-radius: .5rem;
        }
   
        .table-scroll {
            border-radius: .5rem;
        }

        .table-scroll table thead th {
            font-size: 1rem;
        }

        thead {
            top: 0;
            position: sticky;
        }
  
        .search-sec {
            padding: 2rem;
        }

        .search-slt {
            display: block;
            width: 100%;
            font-size: 0.875rem;
            line-height: 1.5;
            background-color: #fff;
            background-image: none;
            border: 1px solid #ccc;
            height: calc(3rem + 2px) !important;
            border-radius: 0;
        }

        .wrn-btn {
            width: 100%;
            font-size: 16px;
            font-weight: 400;
            text-transform: capitalize;
            height: calc(3rem + 2px) !important;
            border-radius: 0;
        }

        .search-sec {
            padding: 2rem;
        }

        .search-slt {
            display: block;
            width: 100%;
            font-size: 0.875rem;
            line-height: 1.5;
            background-color: #fff;
            background-image: none;
            border: 1px solid #ccc;
            height: calc(3rem + 2px) !important;
            border-radius: 0;
        }

        .wrn-btn {
            width: 100%;
            font-size: 16px;
            font-weight: 400;
            text-transform: capitalize;
            height: calc(3rem + 2px) !important;
            border-radius: 0;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <div>
        <main class="content">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-12">
                        <h1 class="h2 mb-3"><strong>Detail </strong> PO-{{ $materialrequest->id }}</h1>
                    </div>
                </div>

            </div>


            <section class="intro">
                <div class="bg-image h-100" style="background-color: #f5f7fa;">
                    <div class="mask d-flex align-items-center h-100">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body p-0">
                                            <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true"
                                                style="position: relative; height: 600px">

                                                <table class="table table-striped mb-0">
                                                    <thead style="background-color: #1a202c" class="text-light">
                                                        <tr>
                                                            <th class="text-dark" scope="col">No</th>
                                                            <th class="text-dark" scope="col">Eta User</th>
                                                            <th class="text-dark" scope="col">Item</th>
                                                            <th class="text-dark" scope="col">Size</th>
                                                            <th class="text-dark" scope="col">Specs</th>
                                                            <th class="text-dark" scope="col">Qty</th>
                                                            <th class="text-dark" scope="col">Unit</th>
                                                            <th class="text-dark" scope="col">Price</th>


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
                                                            
                                                            // Gabungkan semua data menjadi satu array dengan zip
                                                            $combinedData = array_map(null, $etausers, $items, $sizes, $specs, $qtys, $units, $prices);
                                                        @endphp
                                                        @foreach ($combinedData as $data)
                                                            <tr>

                                                                <td>1</td>
                                                                <td>{{ $data[0] }}</td>
                                                                <td>{{ $data[1] }}</td>
                                                                <td>{{ $data[2] }}</td>
                                                                <td>{{ $data[3] }}</td>
                                                                <td>{{ $data[4] }}</td>
                                                                <td>{{ $data[5] }}</td>
                                                                  <td>{{ str_replace(',', '.', number_format($data[6])) }}
                                                                </td>
                                                            </tr>
                                                        @endforeach


                                            </div>

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
    </section>
    </div>
    </main>

    </div>
@endsection
