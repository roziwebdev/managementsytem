@extends('role.purchasing.layoutsmrmanager.main')
@section('main-container')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
<div class="main-panel">
    @foreach ($salescontract as $data)
    <!-- Modal untuk mengedit status -->
    <div class="modal fade" id="editStatusModal{{ $data->id }}" tabindex="-1" role="dialog"
        aria-labelledby="editStatusModalLabel{{ $data->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editStatusModalLabel{{ $data->id }}">
                    </h5>
                </div>
                <div class="modal-body">
                    <!-- Form untuk mengedit status -->
                    @if ($data->statussc == 'Approve')
                    {{-- Cek status sebelumnya --}}
                    <p>SC sudah Approve/Declined sebelumnya.</p>
                    @elseif ($data->statussc == 'Declined')
                    {{-- Cek status sebelumnya --}}
                    <p>SC sudah Approve/Declined sebelumnya.</p>
                    @else
                    <form action="{{ route('update_statussc', $data->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="">
                            {{-- Radio buttons untuk mengubah status --}}
                            <h5>Approve SC</h5>
                            <label class="btn btn-success ">
                                <input type="radio" value="Approve" id="newStatus"
                                    name="newStatus">
                                Approve
                            </label>
                            <hr>
                            <h5>Declined SC</h5>
                            <label class="btn btn-danger ">
                                <input type="radio" value="Declined" id="newStatus" name="newStatus" />
                                Declined
                            </label>
                        </div>
                        <hr>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save
                            changes</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @endforeach
    <div class=" content-wrapper" style="background-color: #f6f6fb">
        <div class="page-header">
            <h3 class="page-title">
                <span class="text-white page-title-icon bg-gradient-info me-2">
                    <i class="mdi mdi-home"></i>
                </span> Dashboard
            </h3>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <span></span>Overview <i
                            class="align-middle mdi mdi-alert-circle-outline icon-sm text-primary"></i>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="row" id='row'>
            <div class="">
                <div class="shadow card rounded-xl">
                    <div class="border shadow card-body">
                        <h3 class="pb-3 text-center">SALES CONTRACT</h3>
                        <div class="py-3 d-flex">
                            <div class="dropdown">
                                <a class="px-5 btn btn-sm btn-dark dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    STATUS
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="/manager/sales" class="dropdown-item ">
                                            <span class="px-2 align-middle material-symbols-outlined"
                                                style="font-size: 20px">
                                                clear_all
                                            </span>Clear
                                        </a>
                                    </li>
                                    <li>
                                        <form action="" method="GET" novalidate="novalidate">
                                            <input type="hidden" name="statussc" value="Approve">
                                            <button type="submit" class="dropdown-item ">
                                                <span class="px-2 align-middle material-symbols-outlined"
                                                    style="font-size: 20px">
                                                    check_circle
                                                </span>Approve
                                            </button>
                                        </form>
                                    </li>
                                    <li>
                                        <form action="" method="GET" novalidate="novalidate">
                                            <input type="hidden" name="statussc" value="Waiting">
                                            <button type="submit" class="dropdown-item ">
                                                <span class="px-2 align-middle material-symbols-outlined"
                                                    style="font-size: 20px">
                                                    hourglass_top
                                                </span>Waiting
                                            </button>
                                        </form>
                                        <form action="" method="GET" novalidate="novalidate">
                                            <input type="hidden" name="statussc" value="Cancel">
                                            <button type="submit" class="dropdown-item ">
                                                <span class="px-2 align-middle material-symbols-outlined"
                                                    style="font-size: 20px">
                                                    cancel
                                                </span>Cancel
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <form action="" method="GET" novalidate="novalidate">
                            <div class="pb-2 d-flex">
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
                                    .ellipsis {
                                    white-space: nowrap;
                                    overflow: hidden;
                                    text-overflow: ellipsis;
                                    max-width: 30ch; /* Atau sesuaikan dengan ukuran yang Anda inginkan */
                                }
                            </style>
                            <table class="table" id="myTable">
                                <thead>
                                    <tr style="background-color: #f1f1f6">
                                        <th style="font-size: 14px; width:20px;" scope="col" class="">
                                            <div class="dropdown">
                                                <a class="absolute text-dark text-decoration-none dropdown-toggle"
                                                    href="#" role="button" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    NO SC
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
                                        <th style="font-size: 14px;" scope="col" class="">TANGGAL PO</th>
                                        <th style="font-size: 14px;" scope="col" class="">TANGGAL SC</th>
                                        <th style="font-size: 14px; width:20px;" scope="col">
                                            <div class="dropdown">
                                                <a class="absolute text-dark text-decoration-none dropdown-toggle"
                                                    href="#" role="button" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    PRODUCT
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
                                                            <input type="hidden" name="sort_by" value="ascproduct">
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
                                                            <input type="hidden" name="sort_by" value="descproduct">
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
                                        <th style="font-size: 14px; width:20px;" scope="col">CUSTOMER</th>
                                        <th style="font-size: 14px;" scope="col" class="">PO</th>
                                        <th style="font-size: 14px;" scope="col" class="">FILE PO</th>
                                        <th style="font-size: 14px; width:20px;" scope="col">STS SC</th>
                                        <th style="font-size: 14px; width:20px;" scope="col">STS</th>
                                        <th style="font-size: 14px;" scope="col" class="">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($salescontract as $data)
                                    @php
                                    $statussc = json_decode($data->statusproduct, true);
                                    $products = json_decode($data->product, true);
                                    // Mengambil item pertama dari masing-masing kolom
                                    $firstStatus = reset($statussc);
                                    $firstProduct = reset($products);
                                    @endphp
                                    <tr class="bg-hover">
                                        <td data-href="{{ route('manager.print', $data->id) }}" style="font-size: 14px; width:20px; padding-top:2px; padding-bottom:2px;"
                                            scope="col" class="sticky"
                                            @if ($data->statussc == 'Waiting')
                                            class="fw-bold sticky"
                                            @elseif($data->statussc == "Approve")
                                            class="sticky"
                                            @endif
                                        >
                                        {{ $data->id}}
                                        </td>
                                        <td data-href="{{ route('manager.print', $data->id) }}" style="padding-top:2px; padding-bottom:2px;"
                                        @if ($data->statussc == 'Waiting')
                                        class="fw-bold"
                                        @endif
                                        >{{\Carbon\Carbon::parse($data->tanggalpo)->format('j M y') }}</td>
                                        <td data-href="{{ route('manager.print', $data->id) }}" style="padding-top:2px; padding-bottom:2px;"
                                        @if ($data->statussc == 'Waiting')
                                        class="fw-bold"
                                        @endif
                                        >{{\Carbon\Carbon::parse($data->created_at)->format('j M y') }}</td>
                                        <td data-href="{{ route('manager.print', $data->id) }}" style="padding-top:2px; padding-bottom:2px;"
                                        @if ($data->statussc == 'Waiting')
                                        class="fw-bold"
                                        @endif
                                        >{{ $firstProduct}}</td>
                                        <td data-href="{{ route('manager.print', $data->id) }}" style="padding-top:2px; padding-bottom:2px;"
                                        @if ($data->statussc == 'Waiting')
                                        class="fw-bold"
                                        @endif
                                        >{{ $data->customer}}</td>
                                        <td data-href="{{ route('manager.print', $data->id) }}"  style="padding-top:2px; padding-bottom:2px;"
                                        @if ($data->statussc == 'Waiting')
                                        class="fw-bold"
                                        @endif
                                        >{{ $data->po}}</td>
                                        <td style="padding-top:2px; padding-bottom:2px;" class="text-center">
                                            <a href="{{ asset('storage/path/to/your/image/' . $data->filepo) }}" target="_blank">
                                                @if($data->filepo)
                                                <span class="material-symbols-outlined text-primary">
                                                @else
                                                <span class="material-symbols-outlined text-dark">
                                                @endif
                                                    description
                                                </span>    
                                            </a>
                                        </td>
                                        <td style="padding-top:2px; padding-bottom:2px;" 
                                        @if ($data->statussc == 'Waiting')
                                        class="fw-bold"
                                        @endif
                                        >{{ $firstStatus}}</td>

                                        <td style="padding-top:2px; padding-bottom:2px;">
                                            @if ($data->statussc == 'Approve')
                                                <span class="material-symbols-outlined text-success" style='font-size:18px'>
                                                    check_circle
                                                </span>
                                            @elseif ($data->statussc == 'Waiting')
                                                <span class="material-symbols-outlined text-warning" style='font-size:18px'>
                                                    hourglass_top
                                                </span>
                                            @elseif ($data->statussc == 'Declined')
                                                <span class="material-symbols-outlined text-danger" style='font-size:18px'>
                                                    cancel
                                                </span>
                                            @endif
                                        </td>
                                        <td style="padding-top: 3px; padding-bottom:3px;" class="d-flex ">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-primary dropdown-toggle" href="#" role="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    Manage
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                    <button class="dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#editStatusModal{{ $data->id }}">Approve
                                                    </button>
                                                    </li>
                                                    <li><a class="dropdown-item"
                                                            href="{{ route('manager.print', $data->id) }}">Detail</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="exampleModalToggle{{ $data->id }}" aria-hidden="true"
                                        aria-labelledby="exampleModalToggleLabel{{ $data->id }}" tabindex="-1">
                                        @include('role.sales.salesdept.salescontract.show', ['details' => $data])
                                    </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-2">
                            {{ $salescontract->appends(request()->query())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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








    @endsection
