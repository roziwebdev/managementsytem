@extends('role.purchasing.layoutsmrceo.main')
@section('main-container')
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
    <div class="main-panel">
        
          <!--Modal!-->

        @foreach ($materialrequests as $user)
        <div class="modal fade" id="exampleModalToggle{{ $user->id }}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel{{ $user->id }}" tabindex="-1">
                                            @php
                                            $items = json_decode($user->item);
                                            $specs = json_decode($user->specs);
                                            $etausers = json_decode($user->etauser);
                                            $sizes = json_decode($user->size);
                                            $qtys = json_decode($user->qty);
                                            $remarks = json_decode($user->mrdate);
                                            $arahserat = json_decode($user->arahseratp);
                                            $lastorder = json_decode($user->lastorder);
                                            $sisastock = json_decode($user->sisastock);
                                            $box1 = json_decode($user->box1);
                                            $box2 = json_decode($user->box2);
                                            $box3 = json_decode($user->box3);
                                            $kosong3 = json_decode($user->kosong3);
                                            $lastpo = json_decode($user->lastpo);
                                            $lastprice = json_decode($user->lastprice);
                                            $combinedData = array_map(null, $items, $specs, $etausers, $sizes, $qtys, $remarks, $arahserat,$lastorder,$sisastock,$box1,$box2,$box3, $kosong3, $lastpo, $lastprice);
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
                                                    <p class="modal-title fw-bold text-center" id="exampleModalToggleLabel{{ $user->id }}">MR : {{ $user->id }} - {{$user->dept}}</p>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                   <div class="row fw-bold py-4">
                                                       <div class="col">
                                                           <p>Item</p>
                                                       </div>
                                                       <div class="col">
                                                           <p>Last Ord</p>
                                                       </div>
                                                       <div class="col">
                                                           <p>Qty</p>
                                                       </div>
                                                   </div>
                                                   @foreach($combinedData as $data)
                                                    <div class="row">
                                                        <div class="col">
                                                            <p>{{$data[0]}}</p>
                                                        </div>
                                                        <div class="col">
                                                            <p>
                                                                PO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ head(explode(", ", $data[13])) }}<br/>
                                                                Tgl&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 
                                                                @if(isset($data[7]))
                                                                {{ \Carbon\Carbon::parse(explode(", ", $data[7])[0])->isoFormat('DD MMMM YYYY')}} 
                                                                @endif
                                                                <br/>
                                                                Harga : {{ head(explode(", ", $data[14])) }}
                                                            </p>
                                                        </div>
                                                        <div class="col">
                                                            <p>{{$data[4]}} {{$data[12]}}</p>
                                                        </div>
                                                    </div>
                                                   @endforeach
                                                   @if($user->status == "Edit")
                                                   <div>
                                                       <p>Note Request Edit : {{$user->requestedit}}</p>
                                                   </div>
                                                   @endif
                                                </div>
                                                @if ($user->status == 'Approve CEO')
                                                    {{-- Cek status sebelumnya --}}
                                                    <p class="px-2">MR Approved .</p>
                                                    <div class="modal-footer d-flex justify-content-end">
                                                        <button type="button" class="btn btn-success btn-sm" data-bs-dismiss="modal" aria-label="Close"> Close</button>
                                                    </div>
                                                @elseif ($user->status == 'Approve GM')
                                                    {{-- Cek status sebelumnya --}}
                                                    <p class="px-2">MR Approved .</p>
                                                    <div class="modal-footer d-flex justify-content-end">
                                                        <button type="button" class="btn btn-success btn-sm" data-bs-dismiss="modal" aria-label="Close"> Close</button>
                                                    </div>
                                                @elseif ($user->status == 'Approve')
                                                    {{-- Cek status sebelumnya --}}
                                                    <p class="px-2">MR Approved .</p>
                                                    <div class="modal-footer d-flex justify-content-end">
                                                        <button type="button" class="btn btn-success btn-sm" data-bs-dismiss="modal" aria-label="Close"> Close</button>
                                                    </div>
                                                @elseif ($user->status == 'Declined')
                                                    {{-- Cek status sebelumnya --}}
                                                    <p class="px-2">MR Declined .</p>
                                                    <div class="modal-footer d-flex justify-content-end">
                                                        <button type="button" class="btn btn-success btn-sm" data-bs-dismiss="modal" aria-label="Close"> Close</button>
                                                    </div>
                                                @else
                                                <form action="{{ route('update_status', $user->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="px-2">
                                                        <div class="pb-3">
                                                            @if($user->status == "Edit")
                                                            <label class="btn btn-info px-3 py-2 ">
                                                            <input type="radio" value="Waiting List"id="newStatus" name="newStatus">
                                                                Accept Edit
                                                            </label>
                                                            @else
                                                            <label class="btn btn-success px-3 py-2 ">
                                                            <input type="radio" value="Approve CEO"id="newStatus" name="newStatus">
                                                                Approve
                                                            </label>
                                                            @endif
                                                            <label class="btn btn-danger px-3 py-2">
                                                                <input type="radio" value="Declined"
                                                                    id="newStatus" name="newStatus" required/>
                                                                Decline
                                                            </label>
                                                        </div>
                                                        <div class="mb-4">
                                                            <p for="note" class="form-label">Note</p>
                                                            <textarea class="form-control" id="note" name="note" rows="3"></textarea>
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
                                                                </h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- Form untuk mengedit status -->
                                                                @if ($user->status == 'Approve CEO')
                                                                    {{-- Cek status sebelumnya --}}
                                                                    <p>MR sudah Approve/Declined sebelumnya.</p>
                                                                @elseif ($user->status == 'Approve GM')
                                                                    {{-- Cek status sebelumnya --}}
                                                                    <p>MR sudah Approve/Declined sebelumnya.</p>
                                                                @elseif ($user->status == 'Approve')
                                                                    {{-- Cek status sebelumnya --}}
                                                                    <p>MR sudah Approve/Declined sebelumnya.</p>
                                                                @elseif ($user->status == 'Declined')
                                                                    {{-- Cek status sebelumnya --}}
                                                                    <p>MR sudah Approve/Declined sebelumnya.</p>
                                                                @else
                                                                   <form action="{{ route('update_status', $user->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <div class="">
                                                                            {{-- Radio buttons untuk mengubah status --}}
                                                                            @if($user->status == "Edit")
                                                                            <h5>Acc Edit</h5>
                                                                            <label class="btn btn-info ">
                                                                                <input type="radio" value="Waiting List"
                                                                                    id="newStatus" name="newStatus">
                                                                                Approve
                                                                            </label>
                                                                            @else
                                                                            <h5>Approve MR</h5>
                                                                            <label class="btn btn-success ">
                                                                                <input type="radio" value="Approve CEO"
                                                                                    id="newStatus" name="newStatus">
                                                                                Approve
                                                                            </label>
                                                                            @endif
                                                                            <hr>
                                                                            <h5>Declined MR</h5>
                                                                            <label class="btn btn-danger ">
                                                                                <input type="radio" value="Declined"
                                                                                    id="newStatus" name="newStatus" />
                                                                                Declined
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
          @foreach ( $materialrequests as $data )
                                                <div class="modal fade" id="exampleModalToggleDetail{{ $data->id }}" aria-hidden="true"
                                                aria-labelledby="exampleModalToggleLabel{{ $data->id }}" tabindex="-1">
                                                <div class="modal-dialog modal-xl">
                                                    <div class="modal-content">
                                                        <div class="modal-header py-3 mb-0">
                                                            <div class="text-center container-xl pb-0 mb-0">
                                                                <h1 class="text-center modal-title" style="font-size: 25px"
                                                                    id="exampleModalToggleLabel{{ $data->id }}">Material Request</h1>
                                                            </div>
                                                            <button type="button" class="float-end btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal- pb-4">
                                                            <div class="container-xl">
                                                                <div class="border shadow rounded border-secondary" style="background:#F0F0F0">
                                                                    <div class="container">
                                                                        <div class="">
                                                                            <p style="font-size:18px" class="fw-bold py-2 mb-1">MR Number - {{ $data->id}}
                                                                            </p>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg">
                                                                                <p style="font-size:14px" class="mb-1"><span style="font-weight: 600">Departement
                                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span>
                                                                                    {{ $data->dept }}</p>
                                                                                <p style="font-size:14px" class="mb-1"><span style="font-weight: 600">Created
                                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span>
                                                                                    {{
                                                                                    \Carbon\Carbon::parse($data->created_at)->format('j M y')}}</p>
                                                                            </div>
                                                                            <div class="col-lg">
                                                                                <p style="font-size:14px" class="mb-1"><span style="font-weight: 600">Remarks Job
                                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span>
                                                                                    {{ $data->job }}</p>
                                                                                <p style="font-size:14px" class="mb-1"><span style="font-weight: 600">Addres Received
                                                                                       &nbsp;&nbsp;&nbsp;&nbsp;:</span>
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
                                                                                                <th class="pt-2 pb-2 col-sm fw-bold">Item</th>
                                                                                                <th class="pt-2 pb-2 col-sm fw-bold">Quantity</th>
                                                                                                <th class="pt-2 pb-2 col-sm fw-bold">Stock</th>
                                                                                                <th class="pt-2 pb-2 col-sm fw-bold">Last Order</th>
                                                                                                <th class="pt-2 pb-2 col-sm fw-bold">Remarks</th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            @php
                                                                                            $items = json_decode($data->item);
                                                                                            $specs = json_decode($data->specs);
                                                                                            $etausers = json_decode($data->etauser);
                                                                                            $sizes = json_decode($data->size);
                                                                                            $qtys = json_decode($data->qty);
                                                                                            $remarks = json_decode($data->mrdate);
                                                                                            $arahserat = json_decode($data->arahseratp);
                                                                                            $sisastocks = json_decode($data->sisastock);
                                                                                            $units = json_decode($data->kosong3);
                                                                                            $lastpo = json_decode($data->lastpo);
                                                                                            $lastorder = json_decode($data->lastorder);
                                                                                            $lastprice = json_decode($data->lastprice);
                                                                                            // Gabungkan semua data menjadi satu array dengan zip
                                                                                            $combinedData = array_map(null, $items, $specs, $etausers, $sizes, $qtys, $remarks, $arahserat,$sisastocks,$units,$lastpo,$lastorder,$lastprice);
                                                                                            @endphp
                                                                                            @foreach ($combinedData as $index => $user)

                                                                                            <tr>
                                                                                                <td class="pt-2 pb-2 col-sm">{{ $index+1 }}</td>
                                                                                                <td class="pt-2 pb-2 col-sm">{{ $user[0] }}</td>
                                                                                                <td class="pt-2 pb-2 col-sm">{{ $user[4] }} {{$user[8]}}</td>
                                                                                                <td class="pt-2 pb-2 col-sm">{{ $user[7] }}</td>
                                                                                                <td class="pt-2 pb-2 col-sm">
                                                                                                    PO &nbsp;&nbsp;&nbsp;: {{ head(explode(", ", $user[9])) }}
                                                                                                    <br/>
                                                                                                    <span>Date :
                                                                                                    @if(isset($user[10]))
                                                                                                        {{ \Carbon\Carbon::parse(explode(", ", $user[10])[0])->isoFormat('DD MMMM YYYY')}} 
                                                                                                    @endif
                                                                                                    </span>
                                                                                                    <br/>Price :
                                                                                                    {{ head(explode(", ", $user[11])) }}    
                                                                                                </td>
                                                                                                <td class="pt-2 pb-2 col-sm">{{ $user[5] }}</td>
                                                                                            </tr>r
                                                                                           @endforeach
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="pt-3">
                                                                                    @if ($data->status == 'Approve CEO')
                                                                                        {{-- Cek status sebelumnya --}}
                                                                                        <p class="px-2">MR Approved .</p>
                                                                                        <div class="modal-footer d-flex justify-content-end">
                                                                                            <button type="button" class="btn btn-success btn-sm" data-bs-dismiss="modal" aria-label="Close"> Close</button>
                                                                                        </div>
                                                                                    @elseif ($data->status == 'Approve GM')
                                                                                        {{-- Cek status sebelumnya --}}
                                                                                        <p class="px-2">MR Approved .</p>
                                                                                        <div class="modal-footer d-flex justify-content-end">
                                                                                            <button type="button" class="btn btn-success btn-sm" data-bs-dismiss="modal" aria-label="Close"> Close</button>
                                                                                        </div>
                                                                                    @elseif ($data->status == 'Approve Stephanie')
                                                                                        {{-- Cek status sebelumnya --}}
                                                                                        <p class="px-2">MR Approved .</p>
                                                                                        <div class="modal-footer d-flex justify-content-end">
                                                                                            <button type="button" class="btn btn-success btn-sm" data-bs-dismiss="modal" aria-label="Close"> Close</button>
                                                                                        </div>
                                                                                    @elseif ($data->status == 'Approve Safira')
                                                                                        {{-- Cek status sebelumnya --}}
                                                                                        <p class="px-2">MR Approved .</p>
                                                                                        <div class="modal-footer d-flex justify-content-end">
                                                                                            <button type="button" class="btn btn-success btn-sm" data-bs-dismiss="modal" aria-label="Close"> Close</button>
                                                                                        </div>
                                                                                    @elseif ($data->status == 'Approve')
                                                                                        {{-- Cek status sebelumnya --}}
                                                                                        <p class="px-2">MR Approved .</p>
                                                                                        <div class="modal-footer d-flex justify-content-end">
                                                                                            <button type="button" class="btn btn-success btn-sm" data-bs-dismiss="modal" aria-label="Close"> Close</button>
                                                                                        </div>
                                                                                    @elseif ($data->status == 'Declined')
                                                                                        {{-- Cek status sebelumnya --}}
                                                                                        <p class="px-2">MR Declined .</p>
                                                                                        <div class="modal-footer d-flex justify-content-end">
                                                                                            <button type="button" class="btn btn-success btn-sm" data-bs-dismiss="modal" aria-label="Close"> Close</button>
                                                                                        </div>
                                                                                    @else
                                                                                    <form action="{{ route('update_status', $data->id) }}"
                                                                                                        method="POST">
                                                                                                        @csrf
                                                                                                        @method('PUT')
                                                                                                        <div class="px-2">
                                                                                                            <div class="pb-3">
                                                                                                                @if($data->status == "Edit")
                                                                                                                <label class="btn btn-info px-3 py-2 ">
                                                                                                                <input type="radio" value="Waiting" id="newStatus" name="newStatus">
                                                                                                                    Accept Edit
                                                                                                                </label>
                                                                                                                @else
                                                                                                                <label class="btn btn-success px-3 py-2 ">
                                                                                                                <input type="radio" value="Approve CEO"id="newStatus" name="newStatus">
                                                                                                                    Approve
                                                                                                                </label>
                                                                                                                @endif
                                                                                                                <label class="btn btn-danger px-3 py-2">
                                                                                                                    <input type="radio" value="Declined"
                                                                                                                        id="newStatus" name="newStatus" required/>
                                                                                                                    Decline
                                                                                                                </label>
                                                                                                            </div>
                                                                                                            <div class="mb-2">
                                                                                                                <p for="note" class="form-label">Note</p>
                                                                                                                <textarea class="form-control" id="note" name="note" rows="3"></textarea>
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
        <div class="content-wrapper px" style="background-color: #f6f6fb">
            <div class="page-header">
               
            </div>

            <div class="row ">
                <div class="">
                    <div class="card rounded-xl shadow">
                        <div class="card- px-3  py-5 shadow border">
                            <h3 class="text-center pb-3">Material Request</h3>
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
                                </style>
                                <table class="table" id="myTable">
                                    <thead>
                                        <tr class="" style="background-color: #f1f1f6">
                                            <th style="font-size: 14px; width: 40px" class="py-2 my-2 sticky"> MR </th>
                                            <th style="font-size: 14px; width: 40px" class="py-2 my-2">
                                            <div class="dropdown">
                                                <a class="absolute text-dark text-decoration-none dropdown-toggle"
                                                    href="#" role="button" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    STS
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                            <a href="/ceo/materialrequest"
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
                                                                value="Approve">
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
                                                                value="Waiting List">
                                                            <button type="submit"
                                                                class="dropdown-item ">
                                                                <span
                                                                    class="material-symbols-outlined align-middle px-2"
                                                                    style="font-size: 20px">
                                                                    hourglass_top
                                                                </span>Waiting List
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
                                            <th style="font-size: 14px" class="py-2 my-2"> Item </th>
                                            <th style="font-size: 14px" class="py-2 my-2"> Note Edit </th>
                                            <th style="font-size: 14px" class="py-2 my-2"> Action </th>
                                        </tr>
                                    </thead>
                                    <tbody id="pricelistTableBody">
                                        @foreach ($materialrequests as $user)
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
                                               <tr
                                               @if ($user->status == "Waiting List") class="fw-bold bg-hover" @elseif ($user->status == "Declined") class="text-danger bg-hover" @else class="bg-hover"  @endif >
                                                    @php
                                                        $itemArray = json_decode($user->item, true);
                                                        $etaArray = json_decode($user->etauser, true);
                                                        $specsArray = json_decode($user->specs, true);
                                                        $sizeArray = json_decode($user->size, true);
                                                        $qtyArray = json_decode($user->qty, true);
                                                        $kosong3Array = json_decode($user->kosong3, true);
                                                        // Mengambil item pertama dari masing-masing kolom
                                                        $firstItem = reset($itemArray);
                                                        $firstSpecs = reset($specsArray);
                                                        $firstSize = reset($sizeArray);
                                                        $firstQty = reset($qtyArray);
                                                        $firstUnit = reset($kosong3Array);
                                                        $firstEtauser = reset($etaArray);
                                                    @endphp
                                               
                                                    <td data-bs-toggle="modal" data-bs-target="#exampleModalToggleDetail{{ $user->id }}" style="padding-top: 3px; padding-bottom:3px;" class="sticky bg-hover">
                                                        {{ $user->id }}
                                                    </td>
                                                    <td data-bs-toggle="modal" data-bs-target="#exampleModalToggleDetail{{ $user->id }}" style="padding-top: 3px; padding-bottom:3px;" class="">
                                                        @if ($user->status == 'Approve')
                                                            <span class="material-symbols-outlined text-success" style='font-size:18px'>
                                                                check_circle
                                                            </span>
                                                        @elseif ($user->status == 'Approve CEO')
                                                            <span class="material-symbols-outlined text-success" style='font-size:18px'>
                                                                check_circle
                                                            </span>
                                                        @elseif ($user->status == 'Approve GM')
                                                            <span class="material-symbols-outlined text-success" style='font-size:18px'>
                                                                check_circle
                                                            </span>
                                                        @elseif ($user->status == 'Approve Safira')
                                                            <span class="material-symbols-outlined text-success" style='font-size:18px'>
                                                                check_circle
                                                            </span>
                                                        @elseif ($user->status == 'Approve Stephanie')
                                                            <span class="material-symbols-outlined text-success" style='font-size:18px'>
                                                                check_circle
                                                            </span>
                                                        @elseif ($user->status == 'Waiting List')
                                                            <span class="material-symbols-outlined text-primary" style='font-size:18px'>
                                                                hourglass_top
                                                            </span>
                                                        @elseif ($user->status == 'Waiting')
                                                            <span class="material-symbols-outlined text-warning" style='font-size:18px'>
                                                                error
                                                            </span>
                                                        @elseif ($user->status == 'Declined')
                                                            <span class="material-symbols-outlined text-danger" style='font-size:18px'>
                                                                cancel
                                                            </span>
                                                        @elseif ($user->status == 'Edit')
                                                            <span class="material-symbols-outlined text-dark" style='font-size:18px'>
                                                                edit
                                                            </span>
                                                        @else
                                                        @endif
                                                    </td>
                                                    <td data-bs-toggle="modal" data-bs-target="#exampleModalToggleDetail{{ $user->id }}" style="padding-top: 3px; padding-bottom:3px;" class="">
                                                        {{ $firstItem }}
                                                    </td>
                                                    <td data-bs-toggle="modal" data-bs-target="#exampleModalToggleDetail{{ $user->id }}" style="padding-top: 3px; padding-bottom:3px;" class="">
                                                        {{ $user->requestedit }}
                                                    </td>
                                                    <td style="padding-top: 3px; padding-bottom:3px;" class="d-flex ">
                                                        <div class="dropdown">
                                                            <a class="btn btn-sm btn-gradient-info dropdown-toggle" href="#" role="button"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                Manage
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModalToggleDetail{{ $user->id }}" >Approve</button>
                                                                </li>

                                                            </ul>
                                                        </div>
                                                        <div class="mx-2">
                                                               @if($user->hasChat())
                                                            <button class="open-chat btn btn-gradient-success btn-sm py-1 px-2" data-mr-id="{{ $user->id }}" data-bs-toggle="offcanvas"
                                                                data-bs-target="#offcanvasChat{{$user->id}}">
                                                                <span class="material-symbols-outlined" style="font-size: 20px">
                                                                    mark_chat_unread
                                                                </span>    
                                                            </button>
                                                            @else
                                                            <button class="open-chat btn btn-gradient-primary btn-sm py-1 px-2" data-mr-id="{{ $user->id }}" data-bs-toggle="offcanvas"
                                                                data-bs-target="#offcanvasChat{{$user->id}}">
                                                                <span class="material-symbols-outlined" style="font-size: 20px">
                                                                    chat_bubble
                                                                </span>    
                                                            </button>
                                                            @endif
                                                        </div>
                                                    </td>
                                            </tr>
                                            
                                    @endforeach
                                    @foreach($materialrequests as $user)
                                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasChat{{ $user->id }}"
                                        aria-labelledby="offcanvasChatLabel{{ $user->id }}">
                                        <div class="offcanvas-header">
                                            <h5 class="offcanvas-title" id="offcanvasChatLabel{{ $user->id }}">Chat for MR {{ $user->id }}</h5>
                                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                        </div>
                                        <div class="offcanvas-body">
                                            <input type="hidden" id="chat-created{{ $user->id }}" class="mb-2 form-control"
                                                value="{{ Auth::user()->name }}">
                                            <div class="d-flex align-items-center ">
                                                <input type="text" id="chat-message{{ $user->id }}" class=" form-control rounded-pill">
                                                <button id="send-chat{{ $user->id }}" class="px-2 py-2 send-chat btn btn-gradient-success rounded-circle"
                                                    data-mr-id="{{ $user->id }}">
                                                    <span class="material-symbols-outlined" style="font-size: 30px">
                                                    send
                                                </span>
                                                </button>
                                            </div>
                                            <div id="chat-messages{{ $user->id }}" class="mt-3"></div>
                                        </div>
                                    </div>
                                    @endforeach
                                    </tbody>
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
                                    <script>
                                        $(document).ready(function() {
                                            // Setup CSRF token for AJAX requests
                                            $.ajaxSetup({
                                                headers: {
                                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                }
                                            });

                                            $(".open-chat").click(function() {
                                                var mrId = $(this).data("mr-id");
                                                loadChats(mrId);
                                            });

                                            $(".send-chat").click(function() {
                                                var mrId = $(this).data("mr-id");
                                                var chatMessage = $("#chat-message" + mrId).val();
                                                var created = $("#chat-created" + mrId).val();
                                                saveChat(mrId, chatMessage, created);
                                                $("#chat-message" + mrId).val('');
                                        
                                            function loadChats(mrId) {
                                                $.ajax({
                                                    url: "/material-request/" + mrId + "/chats",
                                                    type: "GET",
                                                    success: function(data) {
                                                        var chatMessages = '';
                                                        data.forEach(function(chat) {
                                                            chatMessages += '<p><span class="fw-bold">' + chat.created + '&nbsp&nbsp: </span>' + chat.chat + '</p>';
                                                        });
                                                        $("#chat-messages" + mrId).html(chatMessages);
                                                    }
                                                });
                                        
                                            function saveChat(mrId, chatMessage, created) {
                                                $.ajax({
                                                    url: "/material-request/" + mrId + "/chats",
                                                    type: "POST",
                                                    data: {
                                                        chat: chatMessage,
                                                        created: created
                                                    },
                                                    success: function(response) {
                                                        loadChats(mrId);
                                                    },
                                                    error: function(xhr, status, error) {
                                                        console.error(xhr.responseText);
                                                        // Handle error if any
                                                    }
                                                });
                                            }
                                        });
                                    </script>
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
                                    </tbody>
                                </table>
                            </div>
                            <div class="pt-2">
                                {{ $materialrequests->appends(request()->query())->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        
              <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
@endsection
