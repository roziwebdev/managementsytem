@extends('role.purchasing.layoutmrkadept.main')
@section('main-container')

<link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
    <div class="main-panel">
        <div class="    content-wrapper" style="background-color: #f6f6fb">
            <div class="row ">
                <div class="">
                    <div class="card rounded-xl shadow">
                        <div class="card-body shadow border">
                            <h3 class="text-center pb-3">Purchase Order- {{ $materialrequest->id }}</h3>



                            <div class="table-responsive">
                                <style>
                                    th.sticky {
                                        position: sticky;
                                        left: 0;
                                        background-color: #f1f1f6;
                                    }
                                </style>
                                <table class="table">
                                    <thead>
                                        <tr class="" style="background-color: #f1f1f6">


                                                          <th class="text-dark" scope="col">No</th>
                                                            <th class="text-dark" scope="col">Eta User</th>
                                                            <th class="text-dark" scope="col">Item</th>
                                                            <th class="text-dark" scope="col">Size</th>
                                                            <th class="text-dark" scope="col">Specs</th>
                                                            <th class="text-dark" scope="col">Qty</th>
                                                            <th class="text-dark" scope="col">Unit</th>
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
