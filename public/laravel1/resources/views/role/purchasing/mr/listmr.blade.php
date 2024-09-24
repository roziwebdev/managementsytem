@extends('role.purchasing.layouts.main')
@section('main-container')
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
                            <h3 class="text-center pb-3">Material Request</h3>



                            <div class="d-flex  py-3">
                                <div class="dropdown">
                                    <a class="btn btn-sm px-5 btn-dark dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Status
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                                <a href="/purchasing/mr"
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
                                    <a class="btn btn-sm px-4 btn-dark dropdown-toggle " href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Departement
                                    </a>

                                    <ul class="dropdown-menu">
                                         <li>
                                             
                                                <a href="/purchasing/mr"
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
                                    .ellipsis {
                                                          white-space: nowrap;
                                                          overflow: hidden;
                                                          text-overflow: ellipsis;
                                                          max-width: 30ch; /* Atau sesuaikan dengan ukuran yang Anda inginkan */
                                                        }
                                </style>
                                <table class="table table-responsive" id="myTable">
                                    <thead>
                                        <tr class="" style="background-color: #f1f1f6">

                                            <th style="font-size: 14px; width: 40px" class="py-2 my-2 sticky"> MR </th>
                                            <th style="font-size: 14px; width: 40px" class="py-2 my-2"> PO </th>
                                            <th style="font-size: 14px; width: 40px" class="py-2 my-2"> Dept </th>
                                            <th style="font-size: 14px" class="py-2 my-2"> ETA </th>
                                            <th style="font-size: 14px" class="py-2 my-2"> Item </th>
                                            <th style="font-size: 14px" class="py-2 my-2"> Qty </th>
                                            <th style="font-size: 14px; width: 40px" class="py-2 my-2"> STS </th>
                                            <th style="font-size: 14px" class="py-2 my-2"> Action </th>
                                        </tr>
                                    </thead>
                                    <tbody id="pricelistTableBody">
                                        @foreach ($materialrequests as $user)
                                               <tr @if ($user->status == "Waiting List") class="fw-bold bg-hover" @elseif ($user->status == "Declined") class="text-danger bg-hover" @else class="bg-hover"  @endif>
                                                <div class="table-responsive">
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
                                        
                                                    <td
                                                    @if($user->status == 'Approve' || $user->status == 'Approve CEO' || $user->status == 'Approve GM'|| $user->status == 'Approve Stephanie'|| $user->status == 'Approve Safira')
                                                    data-href="{{ route('show.po', $user->id) }}"
                                                    @else
                                                    data-href="{{ route('show.nopo', $user->id) }}"
                                                    @endif
                                                    style="padding-top: 3px; padding-bottom:3px;" class="sticky">
                                                        0{{ $user->id }}</td>
                                                    <td
                                                    @if($user->status == 'Approve' || $user->status == 'Approve CEO' || $user->status == 'Approve GM'|| $user->status == 'Approve Stephanie'|| $user->status == 'Approve Safira')
                                                    data-href="{{ route('show.po', $user->id) }}"
                                                    @else
                                                    data-href="{{ route('show.nopo', $user->id) }}"
                                                    @endif
                                                    style="padding-top: 3px; padding-bottom:3px;" class="">
                                                        {{ $user->idpo }}</td>
                                                   
                                                    <td
                                                    @if($user->status == 'Approve' || $user->status == 'Approve CEO' || $user->status == 'Approve GM'|| $user->status == 'Approve Stephanie'|| $user->status == 'Approve Safira')
                                                    data-href="{{ route('show.po', $user->id) }}"
                                                    @else
                                                    data-href="{{ route('show.nopo', $user->id) }}"
                                                    @endif
                                                    style="padding-top: 3px; padding-bottom:3px;" class="">
                                                        @if ($user->dept == 'FA & TAX')
                                                            <span class="material-symbols-outlined text-dark align-middle" style='font-size:18px'>
                                                                payments
                                                            </span> {{ $user->created }}
                                                        @elseif ($user->dept == 'HRGA')
                                                            <span class="material-symbols-outlined text-dark align-middle" style='font-size:18px'>
                                                                group
                                                            </span> {{ $user->created }}
                                                        @elseif ($user->dept == 'Prodev')
                                                            <span class="material-symbols-outlined text-dark align-middle" style='font-size:18px'>
                                                                Inventory
                                                            </span> {{ $user->created }}
                                                        @elseif ($user->dept == 'Produksi')
                                                            <span class="material-symbols-outlined text-dark align-middle" style='font-size:18px'>
                                                                Factory
                                                            </span> {{ $user->created }}
                                                        @elseif ($user->dept == 'PPIC SM')
                                                            <span class="material-symbols-outlined text-dark align-middle" style='font-size:18px'>
                                                                support
                                                            </span> {{ $user->created }}
                                                        @elseif ($user->dept == 'PPIC RM')
                                                            <span class="material-symbols-outlined text-dark align-middle" style='font-size:18px'>
                                                                quick_reference
                                                            </span> {{ $user->created }}
                                                        @else
                                                        @endif
                                        
                                        
                                                    </td>
                                                      <style>
                                                        .ellipsis {
                                                          white-space: nowrap;
                                                          overflow: hidden;
                                                          text-overflow: ellipsis;
                                                          max-width: 30ch; /* Atau sesuaikan dengan ukuran yang Anda inginkan */
                                                        }
                                                      </style>
                                                    <td
                                                    @if($user->status == 'Approve' || $user->status == 'Approve CEO' || $user->status == 'Approve GM'|| $user->status == 'Approve Stephanie'|| $user->status == 'Approve Safira')
                                                    data-href="{{ route('show.po', $user->id) }}"
                                                    @else
                                                    data-href="{{ route('show.nopo', $user->id) }}"
                                                    @endif
                                                    style="padding-top: 3px; padding-bottom:3px;" class="">
                                                        {{ \Carbon\Carbon::parse($firstEtauser)->format('j M y') }}</td>
                                                    <td
                                                    @if($user->status == 'Approve' || $user->status == 'Approve CEO' || $user->status == 'Approve GM'|| $user->status == 'Approve Stephanie'|| $user->status == 'Approve Safira')
                                                    data-href="{{ route('show.po', $user->id) }}"
                                                    @else
                                                    data-href="{{ route('show.nopo', $user->id) }}"
                                                    @endif
                                                    style="padding-top: 3px; padding-bottom:3px;" class="ellipsis">
                                                        {{ $firstItem }}</td>
                                                    <td
                                                    @if($user->status == 'Approve' || $user->status == 'Approve CEO' || $user->status == 'Approve GM'|| $user->status == 'Approve Stephanie'|| $user->status == 'Approve Safira')
                                                    data-href="{{ route('show.po', $user->id) }}"
                                                    @else
                                                    data-href="{{ route('show.nopo', $user->id) }}"
                                                    @endif
                                                     style="padding-top: 3px; padding-bottom:3px;" class="">
                                                        {{ $firstQty }}&nbsp;{{ $firstUnit }}</td>
                                                         <td style="padding-top: 3px; padding-bottom:3px;" class="">
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
                                                                <li><a class="dropdown-item" href="{{ route('mr.showdetail', $user->id) }}">Print</a></li>
                                                                 @if($user->status == 'Approve' || $user->status == 'Approve CEO' || $user->status == 'Approve GM'|| $user->status == 'Approve Stephanie'|| $user->status == 'Approve Safira')
                                                                <li><a class="dropdown-item" href="{{ route('show.po', $user->id) }}">Detail</a></li>
                                                                 @else 
                                                                <li><a class="dropdown-item" href="{{ route('show.nopo', $user->id) }}">Detail</a></li>
                                                                @endif
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
                                                        </tbody>
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
                                                                                        chatMessages += '<p><span class="fw-bold">' + chat.created + ': </span>' + chat.chat + '</p>';
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
