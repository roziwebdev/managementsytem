@extends('role.purchasing.layoutsmrmanager.main')
@section('main-container')
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
    <div class="main-panel">
        <style>
        p {
            font-family: "Inter", sans-serif;
            font-optical-sizing: auto;
            font-weight: <weight>;
            font-style: normal;
            font-variation-settings:
                "slnt" 0;
        }

        .table-responsive1 {
            overflow-y: auto;
            max-height: 400px;
            /* Atur ketinggian maksimum jika diperlukan */
        }

        /* Atur posisi dan z-index untuk thead */
        .table1 thead th {
            background-color: #F0F0F0;
            position: sticky;
            top: 0;
            z-index: 100;
            /* Atur z-index untuk memastikan thead di atas konten tabel */
        }

        /* Atur z-index konten tabel agar berada di bawah thead yang ditempel */
        .table1 tbody {
            position: relative;
            z-index: 0;
        }
    </style>
           <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
           
                                                @foreach ($purchasing as $user)
                                                <div class="modal fade" id="exampleModalToggle{{ $user->id }}" aria-hidden="true"
                                            aria-labelledby="exampleModalToggleLabel{{ $user->id }}" tabindex="-1">
                                             @php
                                                    $items = json_decode($user->item);
                                                    $sizes = json_decode($user->size);
                                                    $specs = json_decode($user->specs);
                                                    $qtys = json_decode($user->qty);
                                                    $units = json_decode($user->unit);
                                                    $prices = json_decode($user->price);
                                                    $currency = json_decode($user->po);
                                                
                                                    // Gabungkan semua data menjadi satu array dengan zip
                                                    $combinedData = array_map(null, $items, $sizes, $specs, $qtys, $units, $prices,$currency);
                                                @endphp
                                                <style>
                                                    @media (max-width: 576px) {
                                                    .modal-body p {
                                                        font-size: 70%;
                                                    }
                                                }
                                                </style>
                                                <div class="modal-dialog modal-xl">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <p class="modal-title fw-bold text-center" id="exampleModalToggleLabel{{ $user->id }}">PO : {{ $user->id }} - {{$user->supplier}}</p>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row fw-bold pb-4">
                                                                <div class="col col-4">
                                                                    <p>Item</p>
                                                                </div>
                                                                <div class="col">
                                                                    <p>Qty</p>
                                                                </div>
                                                                <div class="col">
                                                                    <p>Price</p>
                                                                </div>
                                                            </div>
                                                            @foreach($combinedData as $data)
                                                            <div class="row">
                                                                <div class='col col-4'>
                                                                    <p>{{$data[0]}}</p>
                                                                </div>
                                                                <div class="col">
                                                                    <p>{{ '' . number_format(floatval(str_replace(',', '.', $data[3])), 0, ',', '.') }} {{$data[4]}}</p>
                                                                </div>
                                                                <div class="col">
                                                                    <p>{{$data[6]}}. {{ '' . number_format(floatval(str_replace(',', '.', $data[5])), 1, ',', '.') }} </p>
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                            @if ($user->status == 'Process')
                                                                {{-- Cek status sebelumnya --}}
                                                                <p class="px-2">Status Approved .</p>
                                                                <div class="modal-footer d-flex justify-content-end">
                                                                        <button   type="button" class="btn btn-success btn-sm" data-bs-dismiss="modal" aria-label="Close"> Close</button>
                                                                </div>
                                                            @elseif ($user->status == 'Process Safira')
                                                                {{-- Cek status sebelumnya --}}
                                                                <p class="px-2">Status Approved .</p>
                                                                 <div class="modal-footer d-flex justify-content-end">
                                                                        <button   type="button" class="btn btn-success btn-sm" data-bs-dismiss="modal" aria-label="Close"> Close</button>
                                                                </div>
                                                            @elseif ($user->status == 'Process Stephanie')
                                                                {{-- Cek status sebelumnya --}}
                                                                <p class="px-2">Status Approved .</p>
                                                                 <div class="modal-footer d-flex justify-content-end">
                                                                        <button  type="button"  class="btn btn-success btn-sm" data-bs-dismiss="modal" aria-label="Close"> Close</button>
                                                                </div>
                                                            @elseif ($user->status == 'Declined')
                                                                {{-- Cek status sebelumnya --}}
                                                                <p class="px-2">Status Declined .</p>
                                                                 <div class="modal-footer d-flex justify-content-end">
                                                                        <button  type="button"  class="btn btn-success btn-sm" data-bs-dismiss="modal" aria-label="Close"> Close</button>
                                                                </div>
                                                            @elseif ($user->status == 'Done')
                                                                {{-- Cek status sebelumnya --}}
                                                                <p class="px-2">Status Approved .</p>
                                                                 <div class="modal-footer d-flex justify-content-end">
                                                                        <button  type="button" class="btn btn-success btn-sm" data-bs-dismiss="modal" aria-label="Close"> Close</button>
                                                                </div>
                                                            @else
                                                            <form
                                                                action="{{ route('update_statusmanager', $user->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="px-2">
                                                                    {{-- Radio buttons untuk mengubah status --}}
                                                                    <div class="py-2">
                                                                        <label style="font-size:12px"  class="btn btn-success px-3 py-2">
                                                                            <input style="font-size:12px"  type="radio" value="Process"
                                                                                id="newStatus" name="newStatus" required>
                                                                            Process
                                                                        </label>
                                                                    </div>
                                                                    <div>
                                                                    <label style="font-size:12px" class="btn btn-danger btn-sm px-3 py-2">
                                                                        <input style="font-size:12px"  type="radio" value="Declined"
                                                                            id="newStatus" name="newStatus" required/>
                                                                        Declined
                                                                    </label>
                                                                    </div>
                                                                </div>
                                                           
                                                                <div class="modal-footer d-flex justify-content-end">
                                                                        <button type="submit"
                                                                            class="btn btn-primary btn-sm px-4">Save
                                                                            changes</button>
                                                                        <button type="button" class="btn btn-success btn-sm" data-bs-dismiss="modal" aria-label="Close"> Close</button>
                                                                </div>
                                                         </form>
                                                         @endif
                                                    </div>
                                                </div>
                                            </div>
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
                                                
                                                @foreach ( $purchasing as $data )
                                                <div class="modal fade" id="exampleModalToggleDetail{{ $data->id }}" aria-hidden="true"
                                                    aria-labelledby="exampleModalToggleLabelDetail{{ $data->id }}" tabindex="-1">
                                                    <div class="modal-dialog modal-xl">
                                                        <div class="modal-content">
                                                            <div class="modal-header pt-3 pb-0 mb-0">
                                                                <div class="text-center container-xl pb-0 mb-0">
                                                                    <h1 class="text-center modal-title" style="font-size: 25px"
                                                                        id="exampleModalToggleLabelDetail{{ $data->id }}">Purchase Order</h1>
                                                                </div>
                                                                <button type="button" class="float-end btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal- pb-4">
                                                                <div class="container-xl">
                                                                    <div class="border shadow border-secondary rounded" style="background:#F0F0F0">
                                                                        <div class="container">
                                                                            <div class="">
                                                                                <p style="font-size:18px" class="fw-bold py-2 mb-1">PO Number - {{ $data->id}}</p>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-lg">
                                                                                    <p style="font-size:14px" class="mb-1"><span style="font-weight: 600">Departement
                                                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span>
                                                                                        {{ $data->dept }}</p>
                                                                                    <p style="font-size:14px" class="mb-1"><span style="font-weight: 600">Created
                                                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span>
                                                                                        {{\Carbon\Carbon::parse($data->created_at)->format('j M y')}}</p>
                                                                                </div>
                                                                                <div class="col-lg">
                                                                                    <p style="font-size:14px" class="mb-1"><span style="font-weight: 600">Supplier
                                                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span>
                                                                                        {{ $data->supplier }}</p>
                                                                                    <p style="font-size:14px" class="mb-1"><span style="font-weight: 600">Destination
                                                                                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span>
                                                                                        {{ $data->alamat }}</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="border border-black" style="background: rgb(255, 255, 255)">
                                                                            <div class="container-xl border " style="height:">
                                                                                <div class="py-4 ">
                                                                                    <div class="border shadow-sm table-responsive table-responsive1"
                                                                                        style="height:">
                                                                                        <table class="table table1 table-bordered border-secondary">
                                                                                            <thead class="">
                                                                                                <tr style="background:#F0F0F0; top:10px" class="">
                                                                                                    <th class="pt-2 pb-2 col-sm fw-bold">No</th>
                                                                                                    <th class="pt-2 pb-2 col-sm fw-bold">Items</th>
                                                                                                    <th class="pt-2 pb-2 col-sm fw-bold">Size</th>
                                                                                                    <th class="pt-2 pb-2 col-sm fw-bold">Specs</th>
                                                                                                    <th class="pt-2 pb-2 col-sm fw-bold">Quantity</th>
                                                                                                    <th class="pt-2 pb-2 col-sm fw-bold">Price</th>
                                                                                                    <th class="pt-2 pb-2 col-sm fw-bold">Eta User</th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                @php
                                                                                                    $etausers = json_decode($data->etauser);
                                                                                                    $items = json_decode($data->item);
                                                                                                    $sizes = json_decode($data->size);
                                                                                                    $specs = json_decode($data->specs);
                                                                                                    $qtys = json_decode($data->qty);
                                                                                                    $units = json_decode($data->unit);
                                                                                                    $prices = json_decode($data->price);
                                                                                                    $currency = json_decode($data->po);
                                        
                                                                                                    // Gabungkan semua data menjadi satu array dengan zip
                                                                                                    $combinedData = array_map(null,  $items, $sizes, $specs, $qtys, $units,$etausers,$prices, $currency);
                                                                                                @endphp
                                                                                                @foreach ($combinedData as $index => $user)

                                                                                                <tr>
                                                                                                    <td class="pt-2 pb-2 col-sm">{{$index +1}} </td>
                                                                                                    <td class="pt-2 pb-2 col-sm">{{ $user[0] }}</td>
                                                                                                    <td class="pt-2 pb-2 col-sm">{{ $user[1] }}</td>
                                                                                                    <td class="pt-2 pb-2 col-sm">{{ $user[2] }}</td>
                                                                                                    <td class="pt-2 pb-2 col-sm">{{ $user[3] }} {{ $user[4] }}</td>
                                                                                                    <td class="pt-2 pb-2 col-sm">{{$user[7]}}. {{ '' . number_format(floatval(str_replace(',', '.', $user[6])), 1, ',', '.') }}</td>
                                                                                                    <td class="pt-2 pb-2 col-sm">{{\Carbon\Carbon::parse($user[5])->format('j M y')}}</td>
                                                                                                </tr>
                                                                                                
                                                                                               @endforeach
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="pt-3">
                                                                        
                                                                         @if ($data->status == 'Process')
                                                                        {{-- Cek status sebelumnya --}}
                                                                        <p class="px-2">Status Approved .</p>
                                                                        <div class="modal-footer d-flex justify-content-end">
                                                                                <button   type="button" class="btn btn-success btn-sm" data-bs-dismiss="modal" aria-label="Close"> Close</button>
                                                                        </div>
                                                                                @elseif ($data->status == 'Process Safira')
                                                                                    {{-- Cek status sebelumnya --}}
                                                                                    <p class="px-2">Status Approved .</p>
                                                                                     <div class="modal-footer d-flex justify-content-end">
                                                                                            <button   type="button" class="btn btn-success btn-sm" data-bs-dismiss="modal" aria-label="Close"> Close</button>
                                                                                    </div>
                                                                                @elseif ($data->status == 'Process Stephanie')
                                                                                    {{-- Cek status sebelumnya --}}
                                                                                    <p class="px-2">Status Approved .</p>
                                                                                     <div class="modal-footer d-flex justify-content-end">
                                                                                            <button  type="button"  class="btn btn-success btn-sm" data-bs-dismiss="modal" aria-label="Close"> Close</button>
                                                                                    </div>
                                                                                @elseif ($data->status == 'Declined')
                                                                                    {{-- Cek status sebelumnya --}}
                                                                                    <p class="px-2">Status Declined .</p>
                                                                                     <div class="modal-footer d-flex justify-content-end">
                                                                                            <button  type="button"  class="btn btn-success btn-sm" data-bs-dismiss="modal" aria-label="Close"> Close</button>
                                                                                    </div>
                                                                                @elseif ($data->status == 'Done')
                                                                                    {{-- Cek status sebelumnya --}}
                                                                                    <p class="px-2">Status Approved .</p>
                                                                                     <div class="modal-footer d-flex justify-content-end">
                                                                                            <button  type="button" class="btn btn-success btn-sm" data-bs-dismiss="modal" aria-label="Close"> Close</button>
                                                                                    </div>
                                                                                @else
                                                                                <form
                                                                                    action="{{ route('update_statusmanager', $data->id) }}"
                                                                                    method="POST">
                                                                                    @csrf
                                                                                    @method('PUT')
                                                                                    <div class="px-2 d-flex">
                                                                                        {{-- Radio buttons untuk mengubah status --}}
                                                                                        <div class="px-2">
                                                                                            <label style="font-size:12px"  class="btn btn-success px-3 py-2">
                                                                                                <input style="font-size:12px" type="radio" value="Process {{ Auth::user()->name }}"
                                                                                                id="newStatus" name="newStatus">
                                                                                                Process
                                                                                            </label>
                                                                                        </div>
                                                                                        <div class="">
                                                                                        <label style="font-size:12px" class="btn btn-danger btn-sm px-3 py-2">
                                                                                            <input style="font-size:12px"  type="radio" value="Declined"
                                                                                                id="newStatus" name="newStatus" required/>
                                                                                            Declined
                                                                                        </label>
                                                                                        </div>
                                                                                    </div>
                                                                               
                                                                                    <div class="modal-footer d-flex justify-content-end">
                                                                                            <button type="submit"
                                                                                                class="btn btn-primary btn-sm px-4">Save
                                                                                                changes</button>
                                                                                            <button type="button" class="btn btn-success btn-sm" data-bs-dismiss="modal" aria-label="Close"> Close</button>
                                                                                    </div>
                                                                             </form>
                                                                             @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
        <div class="content-wrapper px-2" style="background-color: #f6f6fb">
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
                                </style>
                                <table class="table" id="myTable">
                                    <thead>
                                        <tr class="" style="background-color: #f1f1f6">
                                            <th style="font-size: 14px; width: 40px; " class=" sticky"> 
                                                <div class="dropdown">
                                                    <a class="absolute text-dark text-decoration-none dropdown-toggle"
                                                        href="#" role="button" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        PO
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a href="/manager/purchase" class="dropdown-item ">
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
                                            <th style="font-size: 14px; " class=""> 
                                                <div class="dropdown">
                                                    <a class="text-dark text-decoration-none dropdown-toggle"
                                                        href="#" role="button" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        Stat
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
                                            </th>
                                            <th style="font-size: 14px; " class=""> Item </th>
                                            <th style="font-size: 14px; " class=""> MR </th>
                                            <th style="font-size: 14px; " class=""> ETA </th>
                                            <th style="font-size: 14px; " class=""> QTY </th>
                                            <th style="font-size: 14px; " class=""> Supplier </th>
                                            <th style="font-size: 14px; " class=""> Arrival </th>
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
                                                <td  data-bs-toggle="modal" data-bs-target="#exampleModalToggleDetail{{ $user->id }}" style="font-size: 14px; padding-top: 3px; padding-bottom:3px;">
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
                                                <td  data-bs-toggle="modal" data-bs-target="#exampleModalToggleDetail{{ $user->id }}" style="font-size: 14px; padding-top: 3px; padding-bottom:3px;">{{ $firstItem }}</td>
                                                <td  data-bs-toggle="modal" data-bs-target="#exampleModalToggleDetail{{ $user->id }}" style="font-size: 14px; padding-top: 3px; padding-bottom:3px;">{{ $user->mrnumber }}</td>
                                                <td  data-bs-toggle="modal" data-bs-target="#exampleModalToggleDetail{{ $user->id }}" style="font-size: 14px; padding-top: 3px; padding-bottom:3px;">{{ \Carbon\Carbon::parse($firstEtauser)->format('j M y') }}</td>
                                                <td  data-bs-toggle="modal" data-bs-target="#exampleModalToggleDetail{{ $user->id }}" style="font-size: 14px; padding-top: 3px; padding-bottom:3px;">{{ $firstqty }}</td>
                                                <td  data-bs-toggle="modal" data-bs-target="#exampleModalToggleDetail{{ $user->id }}" style="font-size: 14px; padding-top: 3px; padding-bottom:3px;">{{ $user->supplier }}</td>
                                                <td  data-bs-toggle="modal" data-bs-target="#exampleModalToggleDetail{{ $user->id }}" style="font-size: 14px; padding-top: 3px; padding-bottom:3px;">
                                                      @if ($user->idarrival == '1')
                                                            <span class="material-symbols-outlined text-dark" style='font-size:18px'>
                                                                local_shipping
                                                            </span>
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
                                                                    <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModalToggleDetail{{ $user->id }}">Approve / Detail</a>
                                                                </li>
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
                                    {{ $purchasing->appends(request()->query())->links() }}
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                                        
@endsection
