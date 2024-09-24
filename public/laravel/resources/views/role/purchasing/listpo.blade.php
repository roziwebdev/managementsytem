@extends('role.purchasing.layouts.main')
@section('main-container')
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
    <div class="main-panel">
        <div class="content-wrapper" style="background-color: #f6f6fb">
            <div class="row ">
                <div class="">
                    <div class="card rounded-xl shadow">
                        <div class="card-body shadow border">
                            <h3 class="text-center pb-3">Purchase Order</h3>
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
                                            <th style="font-size: 14px; width: 40px" class=" sticky"> 
                                                <div class="dropdown">
                                                    <a class="absolute text-dark text-decoration-none dropdown-toggle"
                                                        href="#" role="button" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        PO
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
                                            <th style="font-size: 14px; "> 
                                                <div class="dropdown">
                                                    <a class="absolute text-dark text-decoration-none dropdown-toggle"
                                                        href="#" role="button" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        Stat
                                                    </a>
                                                    <ul class="dropdown-menu">
                                        <li>
                                                <a href="/purchasing/purchaseorder"
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
                                            </th>
                                            <th style="font-size: 14px; " class=""> Item </th>
                                            <th style="font-size: 14px; " class=""> PO Date </th>
                                            <th style="font-size: 14px; " class=""> MR </th>
                                            <th style="font-size: 14px; " class=""> MR Date </th>
                                            <th style="font-size: 14px; " class=""> ETA </th>
                                            <th style="font-size: 14px; " class=""> QTY </th>
                                            <th style="font-size: 14px; " class=""> Supplier </th>
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
                                                // Mengambil item pertama dari masing-masing kolom
                                                $firstItem = reset($itemArray);
                                                $firstqty = reset($qtyArray);
                                                $firstEtauser = reset($etaArray);
                                            @endphp
                                            <tr @if ($user->status == "Waiting") class="fw-bold bg-hover" @elseif ($user->status == "Declined") class="text-danger bg-hover" @else class="bg-hover"  @endif >
                                                <td style="font-size: 14px; width: 40px; padding-top: 3px; padding-bottom:3px;" class="sticky">{{ $user->id }}</td>
                                                <td target="_blank" data-href="{{ route('purchaseorder.show', $user->id) }}" style="font-size: 14px; width: 40px; padding-top: 3px; padding-bottom:3px;">
                                                      @if ($user->status == 'Process')
                                                            <span class="material-symbols-outlined text-success" style='font-size:18px'>
                                                                check_circle
                                                            </span>
                                                        @elseif($user->status == 'Process Stephanie')
                                                            <span class="material-symbols-outlined text-success" style='font-size:18px'>
                                                                check_circle
                                                            </span>    
                                                        @elseif($user->status == 'Process Safira')
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
                                                <td target="_blank" data-href="{{ route('purchaseorder.show', $user->id) }}" style="font-size: 14px; padding-top: 3px; padding-bottom:3px;">{{ $firstItem }}</td>
                                                <td target="_blank" data-href="{{ route('purchaseorder.show', $user->id) }}" style="font-size: 14px; padding-top: 3px; padding-bottom:3px;">{{ \Carbon\Carbon::parse($user->created_at)->format('j M y') }}</td>
                                                <td target="_blank" data-href="{{ route('purchaseorder.show', $user->id) }}" style="font-size: 14px; padding-top: 3px; padding-bottom:3px;">{{ $user->mrnumber }}</td>
                                                <td target="_blank" data-href="{{ route('purchaseorder.show', $user->id) }}" style="font-size: 14px; padding-top: 3px; padding-bottom:3px;">{{ \Carbon\Carbon::parse( $user->mrtanggal)->format('j M y') }}</td>
                                                <td target="_blank" data-href="{{ route('purchaseorder.show', $user->id) }}" style="font-size: 14px; padding-top: 3px; padding-bottom:3px;">{{ \Carbon\Carbon::parse($firstEtauser)->format('j M y') }}</td>
                                                <td target="_blank" data-href="{{ route('purchaseorder.show', $user->id) }}" style="font-size: 14px; padding-top: 3px; padding-bottom:3px;">{{ $firstqty }}</td>
                                                <td target="_blank" data-href="{{ route('purchaseorder.show', $user->id) }}" style="font-size: 14px; padding-top: 3px; padding-bottom:3px;">{{ $user->supplier }}</td>
                                               
                                                <td data-href="{{ route('purchaseorder.show', $user->id) }}" style="font-size: 14px; width: 40px; padding-top: 3px; padding-bottom:3px;">
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
                                                                   @if($user->status == 'Process' || $user->status == 'Process Safira' ||$user->status == 'Process Stephanie')
                                                                <li><a class="dropdown-item" href="{{ route('purchaseorder.show', $user->id) }}">Print</a></li>
                                                                <li><a class="dropdown-item" href="{{ route('arrivalpurchasing.show', $user->id) }}">Arrival</a></li>
                                                                   @elseif($user->status == 'Waiting')
                                                                <li><a class="dropdown-item" href="{{ route('purchaseorder.edit', $user->id) }}">Edit</a></li>
                                                                <li>
                                                                    <form action="{{ route('purchaseorder.destroy', $user->id) }}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button class="dropdown-item"  type="submit">Delete</button>
                                                                    </form>
                                                                </li>
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
                                                   window.open(link, '_blank');
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
