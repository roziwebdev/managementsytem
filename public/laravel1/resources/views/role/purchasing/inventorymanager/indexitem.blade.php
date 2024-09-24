@extends('role.purchasing.layoutsmrmanager.main')
@section('main-container')
    <!-- partial -->

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


            <div class="">
                <div class="card rounded-xl shadow">
                    <div class="card-body shadow border">
                        <h3 class="text-center pb-3">Inventory</h3>




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
                            <table class="table" id="materialRequestTable">
                                <thead>
                                    <tr class="" style="background-color: #f1f1f6">

                                        <th style="font-size: 14px; width: 40px" class="py-2 my-2 sticky"> ID </th>
                                        <th style="font-size: 14px" class="py-2 my-2"> TYPE </th>
                                        <th style="font-size: 14px" class="py-2 my-2"> ITEM </th>
                                        <th style="font-size: 14px" class="py-2 my-2"> LOCATION </th>
                                        <th style="font-size: 14px" class="py-2 my-2"> QTY </th>
                                        <th style="font-size: 14px" class="py-2 my-2"> DEPT </th>
                                        <th style="font-size: 14px" class="py-2 my-2"> DATE CREATED </th>
                                        <th style="font-size: 14px" class="py-2 my-2"> DETAIL </th>

                                    </tr>
                                </thead>
                                <tbody id="pricelistTableBody">
                                    @foreach ($items as $data)
                                        <tr>
                                            <div class="table-responsive">
                                                <style>
                                                    td.sticky {
                                                        position: sticky;
                                                        left: 0;
                                                        background-color: #ffffff;
                                                    }

                                                    .ellipsis {
                                                        white-space: nowrap;
                                                        overflow: hidden;
                                                        text-overflow: ellipsis;
                                                        max-width: 30ch;
                                                        /* Atau sesuaikan dengan ukuran yang Anda inginkan */
                                                    }
                                                </style>



                                                <td style="padding-top: 6px; padding-bottom:6px;" class="sticky">
                                                    {{ $data->id }}</td>
                                                <td style="padding-top: 6px; padding-bottom:6px;" class="">
                                                    {{ $data->type }}</td>
                                                <td style="padding-top: 6px; padding-bottom:6px;" class="">
                                                    {{ $data->item }}</td>
                                                <td style="padding-top: 6px; padding-bottom:6px;" class="">
                                                    {{ $data->lokasi }}</td>
                                                <td style="padding-top: 6px; padding-bottom:6px;" class="">
                                                    {{ $data->qty }}</td>
                                                <td style="padding-top: 6px; padding-bottom:6px;" class="">
                                                    {{ $data->dept }}</td>
                                                <td style="padding-top: 3px; padding-bottom:3px;" class="">
                                                    {{ \Carbon\Carbon::parse($data->created_at)->format('j M y') }}</td>
                                                     <td style="padding-top: 3px; padding-bottom:3px;" class="">
                                                    <a class="btn btn-sm btn-gradient-info" href="{{ route('inventorymgr.show', $data->id) }}">Detail</a>
                                                </td>



                                            </div>


                                        </tr>
                                    @endforeach
                                </tbody>


                            </table>
                            <div class="pt-2">
                                {{ $items->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    @endsection
