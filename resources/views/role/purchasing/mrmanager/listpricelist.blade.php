@extends('role.purchasing.layoutsmrmanager.main')
@section('main-container')


  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
    <div class="main-panel">
        <div class="    content-wrapper px-2" style="background-color: #f6f6fb">
                <div class="">
                    <div class="card rounded-xl shadow">
                        <div class="card-body shadow border">
                            <h3 class="text-center pb-3">PRICELIST</h3>
                            
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

                                            <th style="font-size: 14px;" class="py-2 my-2 "> 
                                                <div class="dropdown">
                                                                    <a class="absolute text-dark text-decoration-none dropdown-toggle"
                                                                        href="#" role="button" data-bs-toggle="dropdown"
                                                                        aria-expanded="false">
                                                                        I-Code
                                                                    </a>
                                                                    <ul class="dropdown-menu">
                                                                        <li>
                                                                            <a href="/manager/vendorpricelist" class="dropdown-item ">
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
                                        
                                        
                                                    <td  class="">
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