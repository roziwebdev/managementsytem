@extends('role.purchasing.layoutsmrdept.main')
@section('main-container')
   <!-- partial -->

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
    <div class="main-panel">
        <div class="    content-wrapper" style="background-color: #f6f6fb">
            <div class="page-header">
                <h3 class="page-title">
                    <span class="page-title-icon bg-gradient-info text-white me-2">
                        <i class="mdi mdi-home"></i>
                    </span> Dashboard
                </h3>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">
                            <span></span>Overview <i
                                class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="row ">
               


                <div class="">
                    <div class="card rounded-xl shadow">
                        <div class="card-body shadow border">
                            <h3 class="text-center pb-3">Material Request {{$materialrequest->id}}</h3>
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
                                        <tr class="" style="background-color: #f1f1f6">

                                            <th style="font-size: 14px" class="py-2 my-2"> ETA </th>
                                            <th style="font-size: 14px" class="py-2 my-2"> Item </th>
                                            <th style="font-size: 14px" class="py-2 my-2"> Specs </th>
                                            <th style="font-size: 14px" class="py-2 my-2"> Size </th>
                                            <th style="font-size: 14px" class="py-2 my-2"> Qty </th>
                                            <th style="font-size: 14px" class="py-2 my-2"> Serat </th>
                                            <th style="font-size: 14px" class="py-2 my-2"> Remarks </th>
                                         
                                        </tr>
                                    </thead>
                                    <tbody id="pricelistTableBody">
                                     
                                            <tr>
                                                  @php
                                                            $items = json_decode($materialrequest->item);
                                                            $specs = json_decode($materialrequest->specs);
                                                            $etausers = json_decode($materialrequest->etauser);
                                                            $sizes = json_decode($materialrequest->size);
                                                            $qtys = json_decode($materialrequest->qty);
                                                            $remarks = json_decode($materialrequest->mrdate);
                                                            $arahserat = json_decode($materialrequest->arahseratp);
                                                            // Gabungkan semua data menjadi satu array dengan zip
                                                            $combinedData = array_map(null, $items, $specs, $etausers, $sizes, $qtys, $remarks, $arahserat);
                                                        @endphp
                                                        @foreach ($combinedData as $data)
                                                            <tr>

                                              
                                                                <td>{{ \Carbon\Carbon::parse($data[2])->format('j M y') }}</td> {{-- ETA User --}}
                                                                <td>{{ $data[0] }}</td> {{-- Item --}}
                                                                <td>{{ $data[1] }}</td> {{-- Specs --}}
                                                                <td>{{ $data[3] }}</td> {{-- Size --}}
                                                                <td>{{ $data[4] }}</td> {{-- Qty --}}
                                                                <td>{{ $data[6] }}</td> {{-- arahserat --}}
                                                                <td>{{ $data[5] }}</td> {{-- Remarks --}}
                                                    
                                                               
                                                            </tr>
                                                        @endforeach  
                                                  
                                        
                                            </tr>
                                    
                                    </tbody>
                                   

                                </table>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        
              <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


        <!-- content-wrapper ends -->   
@endsection
