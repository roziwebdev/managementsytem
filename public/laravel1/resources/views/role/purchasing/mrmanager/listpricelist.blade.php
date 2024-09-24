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
                            <h3 class="text-center pb-3">Pricelist</h3>
                            
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
                                <table class="table">
                                    <thead>
                                        <tr class="" style="background-color: #f1f1f6">

                                            <th style="font-size: 14px; width: 40px" class="py-2 my-2 sticky"> I-code </th>
                                            <th style="font-size: 14px;" class="py-2 my-2 "> Item </th>
                                            <th style="font-size: 14px; " class="py-2 my-2"> Type </th>
                                            <th style="font-size: 14px; " class="py-2 my-2"> Price </th>
                                            <th style="font-size: 14px" class="py-2 my-2"> Specs </th>
                                            <th style="font-size: 14px" class="py-2 my-2"> Size </th>
                                            <th style="font-size: 14px" class="py-2 my-2"> Unit </th>
                                            <th style="font-size: 14px" class="py-2 my-2"> Created </th>

                                        </tr>
                                    </thead>

                                    <tbody id="pricelistTableBody">
                                        @foreach ($pricelist as $user)
                                         <tr>
                                                <div class="table-responsive">
                                                    <style>
                                                        td.sticky {
                                                            position: sticky;
                                                            left: 0;
                                                            background-color: #ffffff;
                                                        }
                                                    </style>
                                        
                                        
                                                    <td  class="sticky">
                                                        {{ $user->id }}</td>
                                                    <td  class="">
                                                        {{ $user->item }}</td>
                                                    <td  class="">
                                                        {{ $user->type }}</td>
                                                    <td  class="">
                                                        {{ $user->price }}</td>
                                                    <td  class="">
                                                        {{ $user->specs }}</td>
                                                    <td  class="">
                                                        {{ $user->size }}</td>
                                                    <td  class="">
                                                        {{ $user->unit }}</td>
                                                    <td  class="">
                                                        {{ \Carbon\Carbon::parse($user->created_at)->format('j M y') }}</td>
                                        
                                        </tr>
                                        @endforeach
                                    </tbody>

                                    
                                    </div>
                                    


                                </table>
                                <div class="pt-2">
                                    {{ $pricelist->appends(request()->query())->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>






@endsection