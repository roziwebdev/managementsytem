@extends('role.purchasing.layouts.main')
@section('main-container')
    + <main class="content">
        <div class="container-fluid p-0">

            <div class="mb-3">
                <h1 class="h3 d-inline align-middle">Forms</h1>
                <a class="badge bg-dark text-white ms-2" href="upgrade-to-pro.html">
                    New Supplier
                </a>
            </div>
            <form method="POST" action="{{ route('pricelist.store') }}">
                @csrf

                <div class="row">
                    <div class="">
                        <div class="card">
                            <div class="row">

                                <div class="col">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Item</h5>
                                    </div>
                                    <div class="card-body">
                                        <input type="text" class="form-control" placeholder="Item" name="item">
                                    </div>
                                </div>

                              
                                
                                 <div class="col">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Type</h5>
                                    </div>
                                    <div class="card-body">
                                        <input type="text" class="form-control" placeholder="Tipe Item" name="type" list='list'>
                                        <datalist id='list'>
                                            <option>CH</option>
                                            <option>INK</option>
                                            <option>PP</option>
                                            <option>LL</option>
                                        </datalist>
                                    </div>
                                </div>

                            </div>


                            <div class="row">

                                <div class="col">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Size</h5>
                                    </div>
                                    <div class="card-body">
                                        <input type="text" class="form-control" placeholder="Size" name="size">
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Specs</h5>
                                    </div>
                                    <div class="card-body">
                                        <input type="text" class="form-control" placeholder="Specs" name="specs">
                                    </div>
                                </div>
                                
                            
                            </div>
                            <div class='row'>
                                    <div class="col">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Unit</h5>
                                    </div>
                                    <div class="card-body">
                                        <input type="text" class="form-control" placeholder="Unit" name="unit">
                                    </div>
                                </div>
                                  <div class="col">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Price</h5>
                                    </div>
                                    <div class="card-body">
                                        <input type="number" class="form-control" placeholder="Price" name="price">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Arah Serat</h5>
                                    </div>
                                    <div class="card-body">
                                            <select class="form-select " name="arahserat">
                                    <option selected value="-">-</option>
                                    <option value="	&#11137;"> &#11137; </option>
                                    <option value="&#11138;	">&#11138; </option>
                                </select>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" style="width: 100%">Submit</button>
            </form>
        </div>
    </main>
@endsection
