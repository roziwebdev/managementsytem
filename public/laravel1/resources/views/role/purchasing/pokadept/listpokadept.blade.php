@extends('role.purchasing.layoutmrkadept.main')
@section('main-container')
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
    <div class="main-panel">
        <div class="content-wrapper" style="background-color: #f6f6fb">
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
                            <h3 class="text-center pb-3">Purchase Order</h3>
                            <div class="d-flex  py-3">
                                <div class="dropdown">
                                    <a class="btn btn-sm px-3 btn-dark dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Status
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="/purchaseorderkadept"
                                                class="dropdown-item ">
                                                <span
                                                    class="material-symbols-outlined align-middle px-2"
                                                    style="font-size: 20px">
                                                    clear_all
                                                </span>All Status
                                            </a>
                                        </li>
                                        <li>
                                             <form action="" method="GET"
                                                novalidate="novalidate">
                                                <input type="hidden" name="status"
                                                    value="Process">
                                                <button type="submit"
                                                    class="dropdown-item ">
                                                    <span
                                                        class="material-symbols-outlined align-middle px-2"
                                                        style="font-size: 20px">
                                                        check_circle
                                                    </span>Approve
                                                </button>
                                            </form>
                                        </li>
                                        <li>
                                             <form action="" method="GET"
                                                novalidate="novalidate">
                                                <input type="hidden" name="status"
                                                    value="Waiting">
                                                <button type="submit"
                                                    class="dropdown-item ">
                                                    <span
                                                        class="material-symbols-outlined align-middle px-2"
                                                        style="font-size: 20px">
                                                        error
                                                    </span>Waiting
                                                </button>
                                            </form>
                                        </li>
                                       
                                        <li>
                                             <form action="" method="GET"
                                                novalidate="novalidate">
                                                <input type="hidden" name="status"
                                                    value="Declined">
                                                <button type="submit"
                                                    class="dropdown-item ">
                                                    <span
                                                        class="material-symbols-outlined align-middle px-2"
                                                        style="font-size: 20px">
                                                        cancel
                                                    </span>Declined
                                                </button>
                                            </form>
                                        </li>

                                    </ul>
                                </div>
                                 <div class="dropdown px-4">
                                    <a class="btn btn-sm px-4 btn-dark dropdown-toggle " href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Departement
                                    </a>

                                    <ul class="dropdown-menu">
                                               <li>
                                             
                                                <a href="/purchaseorderdept"
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
                         
                           
                           
                            <form action="" method="GET">
                                <div class="d-flex pb-2">
                                    <input  name="search" type="search" class="form-control form-control-sm">
                                    <button type="submit" class="btn btn-sm btn-gradient-success">Search</button>
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
                                </style>
                                <table class="table" id="myTable">
                                     <thead>
                                        <tr class="" style="background-color: #f1f1f6">
                                            <th style="font-size: 14px; width: 40px; " class=" sticky"> PO </th>
                                            <th style="font-size: 14px; " class=""> Type </th>
                                            <th style="font-size: 14px; " class=""> Dept </th>
                                            <th style="font-size: 14px; " class=""> Item </th>
                                            <th style="font-size: 14px; " class=""> PO Date </th>
                                            <th style="font-size: 14px; " class=""> MR </th>
                                            <th style="font-size: 14px; " class=""> ETA </th>
                                            <th style="font-size: 14px; " class=""> QTY </th>
                                            <th style="font-size: 14px; " class=""> UNIT </th>
                                            <th style="font-size: 14px; " class=""> Stat </th>
                                            <th style="font-size: 14px; " class=""> Arrival </th>
                                            <th style="font-size: 14px; " class=""> Manage </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($purchasing as $user)
                                            @php
                                                $itemArray = json_decode($user->item, true);
                                                $qtyArray = json_decode($user->qty, true);
                                                $etaArray = json_decode($user->etauser, true);
                                                $etaArray = json_decode($user->etauser, true);
                                                $etaUnit = json_decode($user->unit, true);
                                                // Mengambil item pertama dari masing-masing kolom
                                                $firstItem = reset($itemArray);
                                                $firstqty = reset($qtyArray);
                                                $firstEtauser = reset($etaArray);
                                                $firstUnit = reset($etaUnit);
                                            @endphp
                                            <tr @if ($user->status == "Waiting") class="fw-bold bg-hover" @elseif ($user->status == "Declined") class="text-danger bg-hover" @else class="bg-hover"  @endif >
                                                <td style="font-size: 14px; width: 40px; padding-top: 3px; padding-bottom:3px;" class="sticky">{{ $user->id }}</td>
                                               
                                                <td data-href="{{ route('purchaseorderdept.show', $user->id) }}" style="font-size: 14px; padding-top: 3px; padding-bottom:3px;">{{ $user->type }}</td>
                                                <td data-href="{{ route('purchaseorderdept.show', $user->id) }}" style="font-size: 14px; padding-top: 3px; padding-bottom:3px;">{{ $user->dept }}</td>
                                                <td data-href="{{ route('purchaseorderdept.show', $user->id) }}" style="font-size: 14px; padding-top: 3px; padding-bottom:3px;">{{ $firstItem }}</td>
                                                <td data-href="{{ route('purchaseorderdept.show', $user->id) }}" style="font-size: 14px; padding-top: 3px; padding-bottom:3px;">{{ \Carbon\Carbon::parse($user->created_at)->format('j M y') }}</td>
                                                <td data-href="{{ route('purchaseorderdept.show', $user->id) }}" style="font-size: 14px; padding-top: 3px; padding-bottom:3px;">{{ $user->mrnumber }}</td>
                                                <td data-href="{{ route('purchaseorderdept.show', $user->id) }}" style="font-size: 14px; padding-top: 3px; padding-bottom:3px;">{{ \Carbon\Carbon::parse($firstEtauser)->format('j M y') }}</td>
                                                <td data-href="{{ route('purchaseorderdept.show', $user->id) }}" style="font-size: 14px; padding-top: 3px; padding-bottom:3px;">{{ $firstqty }}</td>
                                                <td data-href="{{ route('purchaseorderdept.show', $user->id) }}" style="font-size: 14px; padding-top: 3px; padding-bottom:3px;">{{ $firstUnit }}</td>
                                                <td data-href="{{ route('purchaseorderdept.show', $user->id) }}" style="font-size: 14px; width: 40px; padding-top: 3px; padding-bottom:3px;">
                                                      @if ($user->status == 'Process')
                                                            <span class="material-symbols-outlined text-success" style='font-size:18px'>
                                                                check_circle
                                                            </span>
                                                        @elseif ($user->status == 'Process Stephanie')
                                                            <span class="material-symbols-outlined text-success" style='font-size:18px'>
                                                                check_circle
                                                            </span>
                                                        @elseif ($user->status == 'Process Safira')
                                                            <span class="material-symbols-outlined text-success" style='font-size:18px'>
                                                                check_circle
                                                            </span>
                                                        
                                                        @elseif ($user->status == 'Waiting')
                                                            <span class="material-symbols-outlined text-warning" style='font-size:18px'>
                                                                error
                                                            </span>
                                                        @elseif ($user->status == 'Declined')
                                                            <span class="material-symbols-outlined text-danger" style='font-size:18px'>
                                                                cancel
                                                            </span>
                                                        @else
                                                        @endif    
                                                </td>
                                                <td  style="font-size: 14px; width: 40px; padding-top: 3px; padding-bottom:3px;">
                                                      @if ($user->idarrival == '1')
                                                            <span class="material-symbols-outlined text-dark" style='font-size:18px'>
                                                                local_shipping
                                                            </span>
                                                        @endif    
                                                </td>
                                                <td style="padding-top: 3px; padding-bottom:3px;" class="d-flex ">
                                                        <div class="dropdown">
                                                            <a class="btn btn-sm btn-gradient-info dropdown-toggle" href="#" role="button"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                Manage
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                @if($user->status == 'Waiting')
                                                                <li><a class="dropdown-item" href="{{ route('purchaseorderkadept.show', $user->id) }}">Detail</a></li>
                                                                @elseif($user->status == 'Declined')
                                                                <li><a class="dropdown-item" href="{{ route('purchaseorderkadept.show', $user->id) }}">Detail</a></li>
                                                                @else
                                                                <li><a class="dropdown-item" href="{{ route('arrivalpokadept.show', $user->id) }}">Arrival</a></li>
                                                                @endif
                                                            </ul>
                                                        </div>
                                                    </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
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
                                </table>
                                <div class="pt-2">
                                    {{ $purchasing->appends(request()->query())->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
