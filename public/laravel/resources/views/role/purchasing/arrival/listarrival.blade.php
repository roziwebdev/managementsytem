@extends('role.purchasing.layouts.main')
@section('main-container')
   
<link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
                                            @foreach ($arrivals as $arrival)
                                                <!-- Modal untuk mengedit status -->
                                                <div class="modal fade" id="editStatusModal{{ $arrival->id }}"
                                                    tabindex="-1" role="dialog"
                                                    aria-labelledby="editStatusModalLabel{{ $arrival->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h3 class="modal-title"
                                                                    id="editStatusModalLabel{{ $arrival->id }}">
                                                                    Close Item
                                                                </h3>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- Form untuk mengedit status -->
                                                                @if ($arrival->status == 'Close')
                                                                    {{-- Cek status sebelumnya --}}
                                                                    <p>Items sudah Close</p>
                                                                @else
                                                                   <form action="{{ route('arrivalpurchasing.updatestatus', $arrival->id) }}"
                                                                        method="POST">
                                                                        @method('PUT')
                                                                        @csrf
                                                                        <div class="">
                                                                           
                                                                            <label class="btn btn-success ">
                                                                                <input type="radio" value="Close"
                                                                                    id="newStatus" name="newStatus">
                                                                                Close
                                                                            </label>
                                                                            <hr>
                                                                    
                                                                
                                                                        <div class="mb-3">
                                                                            <label for="note" class="form-label">Note</label>
                                                                            <textarea class="form-control" id="note" name="note" rows="3"></textarea>
                                                                        </div>
                                                                          
                                                                        </div>
                                                                        <hr>
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Save
                                                                            changes</button>
                                                                    </form>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                          
                                            @endforeach
    <div class="main-panel">
        <div class="    content-wrapper" style="background-color: #f6f6fb">
            <div class="row">
                <div class="">
                    <div class="card rounded-xl shadow">
                        <div class="card-body shadow border">
                            <h3 class="text-center pb-3">ARRIVAL PO</h3>


                             
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
                                            <th class="text-dark"> 
                                                <div class="dropdown">
                                                    <a class="absolute text-dark text-decoration-none dropdown-toggle"
                                                        href="#" role="button" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        ID
                                                    </a> 
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a href="/arrivalpurchasing" class="dropdown-item ">
                                                                <span class="px-2 align-middle material-symbols-outlined"
                                                                    style="font-size: 20px">
                                                                    clear_all
                                                                </span>Clear
                                                            </a>
                                                        </li>
                                                        <li> 
                                                            <form action="" method="GET" novalidate="novalidate">
                                                                <input type="hidden" name="dept" value="{{ request('dept') }}">
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
                                                                <input type="hidden" name="dept" value="{{ request('dept') }}">
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
                                            <th class="text-dark"> 
                                                <div class="dropdown">
                                                    <a class="absolute text-dark text-decoration-none dropdown-toggle"
                                                        href="#" role="button" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        PO
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a href="/arrivalpurchasing" class="dropdown-item ">
                                                                <span class="px-2 align-middle material-symbols-outlined"
                                                                    style="font-size: 20px">
                                                                    clear_all
                                                                </span>Clear
                                                            </a>
                                                        </li>
                                                        <li> 
                                                            <form action="" method="GET" novalidate="novalidate">
                                                                <input type="hidden" name="dept" value="{{ request('dept') }}">
                                                                <input type="hidden" name="sort_by" value="ascpo">
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
                                                                <input type="hidden" name="dept" value="{{ request('dept') }}">
                                                                <input type="hidden" name="sort_by" value="descpo">
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
                                            <th class="text-dark"> 
                                                <div class="dropdown">
                                                    <a class="absolute text-dark text-decoration-none dropdown-toggle"
                                                        href="#" role="button" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        Dept
                                                    </a>
                                                    <ul class="dropdown-menu">
                                       <li>
                                        <a href="/arrivalpurchasing"
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
                                                <input type="hidden" name="dept" value="FA & TAX">
                                                <input type="hidden" name="sort_by" value="{{ request('sort_by') }}">
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
                                                 <input type="hidden" name="sort_by" value="{{ request('sort_by') }}">
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
                                                <input type="hidden" name="sort_by" value="{{ request('sort_by') }}">
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
                                                 <input type="hidden" name="sort_by" value="desc">
                                                 <input type="hidden" name="sort_by" value="{{ request('sort_by') }}">
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
                                                 <input type="hidden" name="sort_by" value="{{ request('sort_by') }}">
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
                                                 <input type="hidden" name="sort_by" value="{{ request('sort_by') }}">
                                                <input type="hidden" name="dept"
                                                    value="Prodev">
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
                                            </th>
                                            <th class="text-dark" scope="col">Item</th>
                                            <th class="text-dark" scope="col">Specs</th>
                                            <th class="text-dark" scope="col">Size</th>
                                            <th class="text-dark" scope="col">Surat jalan</th>
                                            <th class="text-dark" scope="col">Arrival Qty</th>
                                            <th class="text-dark" scope="col">Arrival Date</th>
                                            <th class="text-dark" scope="col">Note</th>
                                            <th class="text-dark" scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($arrivals as $arrival)
                                        <tr>
                                            <td style="padding-top: 3px; padding-bottom:3px;">{{$arrival->id}}</td>
                                            <td style="padding-top: 3px; padding-bottom:3px;">
                                                <a class="text-dark" style="text-decoration: none;" href="{{route('arrivalpurchasing.show', $arrival->po)}}">
                                                {{$arrival->po}}
                                                </a>
                                            </td>
                                            <td style="padding-top: 3px; padding-bottom:3px;">{{$arrival->dept}}</td>
                                            <td style="padding-top: 3px; padding-bottom:3px;">{{$arrival->item}}</td>
                                            <td style="padding-top: 3px; padding-bottom:3px;">{{$arrival->specs}}</td>
                                            <td style="padding-top: 3px; padding-bottom:3px;">{{$arrival->size}}</td>
                                            <td style="padding-top: 3px; padding-bottom:3px;">
                                                <a style='text-decoration:none;' class="text-dark" href="{{ asset('storage/' . $arrival->sjimage) }}" target="_blank">
                                                    <span>{{$arrival->nomorsj}}</span>
                                                </a>
                                            </td>
                                            <td style="padding-top: 3px; padding-bottom:3px;"> {{ $arrival->arrivalqty }} {{$arrival->unit}} </td>
                                            <td style="padding-top: 3px; padding-bottom:3px;"> {{ \Carbon\Carbon::parse($arrival->tanggalbeli)->format('d M y') }} </td>
                                            <td style="padding-top: 3px; padding-bottom:3px;">{{$arrival->note}}</td>
                                            <td style="padding-top: 3px; padding-bottom:3px;">
                                                @if( $arrival->status == 'Open')
                                            <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#editStatusModal{{ $arrival->id }}">Open
                                                @elseif( $arrival->status == 'Close')
                                            <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#editStatusModal{{ $arrival->id }}">
                                                Close
                                            </button>
                                            @endif
                                            </td>
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
