@extends('role.purchasing.layoutsmrceo.main')
@section('main-container')
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
    <div class="main-panel">
        
          <!--Modal!-->

                                            @foreach ($materialrequests as $user)
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
                                                                           

                                                                            <h5>Approve MR</h5>
                                                                            <label class="btn btn-success ">
                                                                                <input type="radio" value="Approve CEO"
                                                                                    id="newStatus" name="newStatus">
                                                                                Approve
                                                                            </label>
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
                        <div class="card- px-3  py-5 shadow border">
                            <h3 class="text-center pb-3">Material Request</h3>
                            <div class="d-flex py-3  ">
                                <div class="dropdown">
                                    <button class="btn btn-sm  btn-dark dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Status
                                    </button>
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
                                <div class="dropdown px-4">
                                    <button class="btn btn-sm px-4  btn-dark dropdown-toggle " href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Dept
                                    </button>

                                    <ul class="dropdown-menu">
                                        <li>
                                                <a href="/ceo/materialrequest"
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
                                <table class="table" id="myTable">
                                    <thead>
                                        <tr class="" style="background-color: #f1f1f6">
                                     
                                            <th style="font-size: 14px; width: 40px" class="py-2 my-2 sticky"> MR </th>
                                            <th style="font-size: 14px" class="py-2 my-2"> Item </th>
                                            <th style="font-size: 14px; width: 40px" class="py-2 my-2"> STS </th>
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
                                               
                                                    <td data-href="{{route('materialrequest.show', $user->id)}}" style="padding-top: 3px; padding-bottom:3px;" class="sticky bg-hover">
                                                        00{{ $user->id }}</td>
                                                    <td data-href="{{route('materialrequest.show', $user->id)}}" style="padding-top: 3px; padding-bottom:3px;" class="">
                                                        {{ $firstItem }}</td>
                                                   <td data-href="{{route('materialrequest.show', $user->id)}}" style="padding-top: 3px; padding-bottom:3px;" class="">
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
                                                        @else
                                                        @endif
                                                    </td>
                                                        
                                        
                                                    <td style="padding-top: 3px; padding-bottom:3px;" class="d-flex ">
                                                        <div class="dropdown">
                                                            <a class="btn btn-sm btn-gradient-info dropdown-toggle" href="#" role="button"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                Manage
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <button class="dropdown-item" data-bs-toggle="modal"
                                                                        data-bs-target="#editStatusModal{{ $user->id }}">Approve
                                                                    </button>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item" href="{{ route('materialrequest.show', $user->id) }}">
                                                                        Detail
                                                                    </a>
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
                                                                        });

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
                                                                        }

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
                                    {{ $materialrequests->links() }}
                                </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        
              <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
@endsection
