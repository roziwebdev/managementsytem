@extends('role.purchasing.layoutsmrmanager.main')
@section('main-container')
   
<link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
        
           <div class="modal fade" id="editStatusModal"
                                                    tabindex="-1" role="dialog"
                                                    aria-labelledby="editStatusModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h3 class="modal-title"
                                                                    id="editStatusModalLabel">
                                                                    Close Item
                                                                </h3>
                                                            </div>
                                                            <div class="modal-body">
                                                                    <p>Items sudah Close</p>
                                                               
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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

            <div class="row">
                <div class="">
                    <div class="card rounded-xl shadow">
                        <div class="card-body shadow border">
                            <h3 class="text-center pb-3">ARRIVAL PO</h3>
                            
                             <div class="d-flex  py-3">
                                <div class="dropdown">
                                    <a class="btn btn-sm px-4 btn-dark dropdown-toggle " href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Departement
                                    </a>

                                    <ul class="dropdown-menu">
                                               <li>
                                             
                                                <a href="/arrivalpo"
                                                    class="dropdown-item ">
                                                    <span
                                                        class="material-symbols-outlined align-middle px-2"
                                                        style="font-size: 20px">
                                                        clear_all
                                                    </span>All Dept
                                                </a>
                                            
                                        </li>
                                        <li>
                                             <form action="" method="GET"
                                                novalidate="novalidate">
                                                <input type="hidden" name="dept"
                                                    value="FA & TAX">
                                                <button type="submit"
                                                    class="dropdown-item ">
                                                    <span
                                                        class="material-symbols-outlined align-middle px-2"
                                                        style="font-size: 20px">
                                                        Payments
                                                    </span>FA & TAX
                                                </button>
                                            </form>
                                        </li>
                                        <li>
                                             <form action="" method="GET"
                                                novalidate="novalidate">
                                                <input type="hidden" name="dept"
                                                    value="HRGA">
                                                <button type="submit"
                                                    class="dropdown-item ">
                                                    <span
                                                        class="material-symbols-outlined align-middle px-2"
                                                        style="font-size: 20px">
                                                        Group
                                                    </span>HRGA
                                                </button>
                                            </form>
                                        </li>
                                        <li>
                                             <form action="" method="GET"
                                                novalidate="novalidate">
                                                <input type="hidden" name="dept"
                                                    value="PPIC RM">
                                                <button type="submit"
                                                    class="dropdown-item ">
                                                    <span
                                                        class="material-symbols-outlined align-middle px-2"
                                                        style="font-size: 20px">
                                                        quick_reference
                                                    </span>PPIC RM
                                                </button>
                                            </form>
                                        </li>
                                        <li>
                                             <form action="" method="GET"
                                                novalidate="novalidate">
                                                <input type="hidden" name="dept"
                                                    value="PPIC SM">
                                                <button type="submit"
                                                    class="dropdown-item ">
                                                    <span
                                                        class="material-symbols-outlined align-middle px-2"
                                                        style="font-size: 20px">
                                                        Support
                                                    </span>PPIC SM
                                                </button>
                                            </form>
                                        </li>
                                        <li>
                                             <form action="" method="GET"
                                                novalidate="novalidate">
                                                <input type="hidden" name="dept"
                                                    value="Produksi">
                                                <button type="submit"
                                                    class="dropdown-item ">
                                                    <span
                                                        class="material-symbols-outlined align-middle px-2"
                                                        style="font-size: 20px">
                                                        Inventory
                                                    </span>Produksi
                                                </button>
                                            </form>
                                        </li>
                                        <li>
                                             <form action="" method="GET"
                                                novalidate="novalidate">
                                                <input type="hidden" name="dept"
                                                    value="HRGA">
                                                <button type="submit"
                                                    class="dropdown-item ">
                                                    <span
                                                        class="material-symbols-outlined align-middle px-2"
                                                        style="font-size: 20px">
                                                        group
                                                    </span>Prodev
                                                </button>
                                            </form>
                                        </li>
                                        <li>
                                             <form action="" method="GET"
                                                novalidate="novalidate">
                                                <input type="hidden" name="dept"
                                                    value="Purchasing">
                                                <button type="submit"
                                                    class="dropdown-item ">
                                                    <span
                                                        class="material-symbols-outlined align-middle px-2"
                                                        style="font-size: 20px">
                                                        shopping_cart
                                                    </span>Purchasing
                                                </button>
                                            </form>
                                        </li>
                                     
                                   
                               
                                    </ul>
                                </div>

                            </div>
                            <form action="" method="GET" novalidate="novalidate">
                            <div class="d-flex pb-2">
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
                                </style>
                                <table class="table">
                                    <thead>
                                        <tr class="" style="background-color: #f1f1f6">


                                                            <th class="text-dark" scope="col">PO</th>
                                                            <th class="text-dark" scope="col">Item</th>
                                                            <th class="text-dark" scope="col">Specs</th>
                                                            <th class="text-dark" scope="col">Size</th>
                                                            <th class="text-dark" scope="col">Surat jalan</th>
                                                            <th class="text-dark" scope="col">Arrival Qty</th>
                                                            <th class="text-dark" scope="col">Arrival Date</th>
                                                            <th class="text-dark" scope="col">Action</th>
                                    </thead>

                                    <tbody>
                                      
                                    @foreach($arrivals as $arrival)
                                        <tr>
                                            <td style="padding-top: 3px; padding-bottom:3px;">{{$arrival->po}}</td>
                                            <td style="padding-top: 3px; padding-bottom:3px;">{{$arrival->item}}</td>
                                            <td style="padding-top: 3px; padding-bottom:3px;">{{$arrival->specs}}</td>
                                            <td style="padding-top: 3px; padding-bottom:3px;">{{$arrival->size}}</td>
                                            <td style="padding-top: 3px; padding-bottom:3px;">
                                                <a style='text-decoration:none;' class="text-dark" href="{{ asset('storage/' . $arrival->sjimage) }}" target="_blank">
                                                   
                                                    <span>{{$arrival->nomorsj}}</span>
                                                </a>
                                            </td>
                                
                                           
                                            <td style="padding-top: 3px; padding-bottom:3px;">{{ $arrival->arrivalqty }} {{$arrival->unit}}</td>
                                            <td style="padding-top: 3px; padding-bottom:3px;">{{ \Carbon\Carbon::parse($arrival->tanggalbeli)->format('j M y') }}</td>
                                         
                                            @if ($arrival->status == 'Open')
                                            <td style="padding-top: 3px; padding-bottom:3px;"><a href='{{route("mgrarrival.show",$arrival->po)}}' class='btn btn-info btn-sm'>Detail</a></td>
                                            @elseif ($arrival->status == 'Close')
                                            <td style="padding-top: 3px; padding-bottom:3px;"><button class='btn btn-success btn-sm' data-bs-toggle="modal" data-bs-target="#editStatusModal">Close</button></td>
                                            @endif
                                        </tr>
                                  
                                    
                                    @endforeach
                                    </tbody>


                                </table>
                            </div>
                        <div class="mt-2">
                            {{ $arrivals->appends(request()->query())->links() }}
                        </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
@endsection
