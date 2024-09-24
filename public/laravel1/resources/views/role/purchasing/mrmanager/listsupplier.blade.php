@extends('role.purchasing.layoutsmrmanager.main')
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

                <div class="">
                    <div class="card rounded-xl shadow">
                        <div class="card-body shadow border">
                            <h3 class="text-center py-2">List Supplier</h3>


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
                                        background-color: #f1f1f6;
                                    }
                                </style>
                                <table class="table">
                                    <thead>
                                        <tr class="" style="background-color: #f1f1f6">

                                            <th style="font-size: 14px; width: 40px" class="py-2 my-2 sticky"> S-code
                                            </th>
                                            <th style="font-size: 14px; " class="py-2 my-2"> Supplier </th>
                                            <th style="font-size: 14px" class="py-2 my-2"> CP </th>
                                            <th style="font-size: 14px" class="py-2 my-2"> Jenis </th>
                                            <th style="font-size: 14px" class="py-2 my-2"> Material </th>
                                            <th style="font-size: 14px" class="py-2 my-2"> Alamat </th>
                                            <th style="font-size: 14px" class="py-2 my-2"> Email </th>
                                            <th style="font-size: 14px" class="py-2 my-2"> Telp </th>
                                            <th style="font-size: 14px" class="py-2 my-2"> Bank </th>
                                            <th style="font-size: 14px" class="py-2 my-2"> Rekening </th>
                                            <th style="font-size: 14px" class="py-2 my-2"> Lead Time </th>
                                            <th style="font-size: 14px" class="py-2 my-2"> Created</th>
                                        </tr>
                                    </thead>

                                    <tbody id="pricelistTableBody">
                                        @foreach ($supplier as $user)
                                         <tr>
                                        <div class="table-responsive">
                                            <style>
                                                td.sticky {
                                                    position: sticky;
                                                    left: 0;
                                                    background-color: #ffffff;
                                                }
                                            </style>
                                
                                            <td style="padding-top: 3px; padding-bottom:3px;" class="sticky">
                                                {{ $user->id }}</td>
                                
                                            <td class="">{{ $user->supplier }}</td>
                                            <td class="">{{ $user->cp }}</td>
                                            <td class="">{{ $user->jenis }}</td>
                                            <td class="">{{ $user->material }}</td>
                                            <td class="">{{ $user->alamat }}</td>
                                            <td class="">{{ $user->email }}</td>
                                            <td class="">{{ $user->telp }}</td>
                                            <td class="">{{ $user->bank }}</td>
                                            <td class="">{{ $user->rekening }}</td>
                                            <td class="">{{ $user->leadtime }}</td>
                                            <td class="">
                                                {{ \Carbon\Carbon::parse($user->created_at)->format('j M y') }}</td>
                                
                                
                                        
                                
                                    </tr>
                                        @endforeach
                                    </tbody>

                                   

                                </table>
                            </div>
                                <div class="pt-2">
                                    {{ $supplier->appends(request()->query())->links() }}
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>


@endsection