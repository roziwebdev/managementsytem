@extends('role.purchasing.layoutsmrmanager.main')
@section('main-container')
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
    <div class="main-panel">
           <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                                 @foreach ($purchasing as $user)
                                                    <!-- Modal untuk mengedit status -->
                                                    <div class="modal fade" id="editStatusModal{{ $user->id }}"
                                                        tabindex="-1" role="dialog"
                                                        aria-labelledby="editStatusModalLabel{{ $user->id }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="editStatusModalLabel{{ $user->id }}">
                                                                        Approval
                                                                    </h5>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <!-- Form untuk mengedit status -->
                                                                    @if ($user->status == 'Process')
                                                                        {{-- Cek status sebelumnya --}}
                                                                        <p>Status sudah Approve/Declined sebelumnya.</p>
                                                                    @elseif ($user->status == 'Process Safira')
                                                                        {{-- Cek status sebelumnya --}}
                                                                        <p>Status sudah Approve/Declined sebelumnya.</p>
                                                                    @elseif ($user->status == 'Process Stephanie')
                                                                        {{-- Cek status sebelumnya --}}
                                                                        <p>Status sudah Approve/Declined sebelumnya.</p>
                                                                    @elseif ($user->status == 'Declined')
                                                                        {{-- Cek status sebelumnya --}}
                                                                        <p>Status sudah Approve/Declined sebelumnya.</p>
                                                                    @elseif ($user->status == 'Done')
                                                                        {{-- Cek status sebelumnya --}}
                                                                        <p>Status sudah Approve/Declined sebelumnya.</p>
                                                                    @else
                                                                        <form
                                                                            action="{{ route('update_statusmanager', $user->id) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            @method('PUT')
                                                                            <div class="">
                                                                                {{-- Radio buttons untuk mengubah status --}}
                                                                              

                                                                                <h5>Approve PO</h5>
                                                                                <label class="btn btn-success ">
                                                                                    <input type="radio" value="Process {{ Auth::user()->name }}"
                                                                                        id="newStatus" name="newStatus">
                                                                                    Process
                                                                                </label>
                                                                                <hr>
                                                                                <h5>Declined PO</h5>
                                                                                <label class="btn btn-danger ">
                                                                                    <input type="radio" value="Declined"
                                                                                        id="newStatus" name="newStatus" />
                                                                                    Declined
                                                                                </label>
                                                                            </div>
                                                                            <hr>
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
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
                                    <a class="btn btn-sm px-5 btn-dark dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Status
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                                <a href="/manager/purchase"
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
                                </style>
                                <table class="table" id="myTable">
                                    <thead>
                                        <tr class="" style="background-color: #f1f1f6">
                                            <th style="font-size: 14px; width: 40px; " class=" sticky"> PO </th>
                                            <th style="font-size: 14px; " class=""> Item </th>
                                            <th style="font-size: 14px; " class=""> MR </th>
                                            <th style="font-size: 14px; " class=""> ETA </th>
                                            <th style="font-size: 14px; " class=""> QTY </th>
                                            <th style="font-size: 14px; " class=""> Supplier </th>
                                            <th style="font-size: 14px; " class=""> Stat </th>
                                            <th style="font-size: 14px; " class=""> Manage </th>
                                        </tr>
                                    </thead>
                                                 <style>
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
                                            <tr
                                             @if ($user->status == "Waiting") class="fw-bold bg-hover" @elseif ($user->status == "Declined") class="text-danger bg-hover" @else class="bg-hover"  @endif
                                            >
                                                <td style="font-size: 14px; width: 40px; padding-top: 3px; padding-bottom:3px;" class="sticky">{{ $user->id }}</td>
                                               
                                                <td  data-href="{{ route('purchase.show', $user->id) }}" style="font-size: 14px; padding-top: 3px; padding-bottom:3px;">{{ $firstItem }}</td>
                                                <td  data-href="{{ route('purchase.show', $user->id) }}" style="font-size: 14px; padding-top: 3px; padding-bottom:3px;">{{ $user->mrnumber }}</td>
                                                <td  data-href="{{ route('purchase.show', $user->id) }}" style="font-size: 14px; padding-top: 3px; padding-bottom:3px;">{{ \Carbon\Carbon::parse($firstEtauser)->format('j M y') }}</td>
                                                <td  data-href="{{ route('purchase.show', $user->id) }}" style="font-size: 14px; padding-top: 3px; padding-bottom:3px;">{{ $firstqty }}</td>
                                                <td  data-href="{{ route('purchase.show', $user->id) }}" style="font-size: 14px; padding-top: 3px; padding-bottom:3px;">{{ $user->supplier }}</td>
                                                 <td  data-href="{{ route('purchase.show', $user->id) }}" style="font-size: 14px; width: 40px; padding-top: 3px; padding-bottom:3px;">
                                                      @if ($user->status == 'Process')
                                                            <span class="material-symbols-outlined text-success" style='font-size:18px'>
                                                                check_circle
                                                            </span>
                                                        
                                                        @elseif ($user->status == 'Process Safira')
                                                            <span class="material-symbols-outlined text-success" style='font-size:18px'>
                                                                check_circle
                                                            </span>
                                                        @elseif ($user->status == 'Process Stephanie')
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
                                                <td style="font-size: 14px; padding-top: 3px; padding-bottom:3px;" class="d-flex ">
                                                        <div class="dropdown">
                                                            <a class="btn btn-sm btn-gradient-info dropdown-toggle" href="#" role="button"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                Manage
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a class="dropdown-item" data-bs-toggle="modal"
                                                                        data-bs-target="#editStatusModal{{ $user->id }}">Approve
                                                                    </a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="{{ route('purchase.show', $user->id) }}">Detail</a></li>
                                                               
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
                            </div>
                                <div class="pt-2">
                                    {{ $purchasing->links() }}
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                                        
@endsection
