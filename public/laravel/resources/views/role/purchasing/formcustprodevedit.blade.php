@extends('role.sales.layouts.main')
@section('main-container')
    + <main class="content">
        <div class="container-fluid p-0">

            <div class="mb-3">
                <h1 class="h3 d-inline align-middle">Forms</h1>
                <a class="badge bg-dark text-white ms-2" href="upgrade-to-pro.html">
                    New Customer
                </a>
            </div>
            <form method="POST" action="{{ route('customer.update', $data->id) }}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="">
                        <div class="card">
                            <div class="row">

                                <div class="col">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Customer</h5>
                                    </div>
                                    <div class="card-body">
                                        <input type="text" class="form-control" placeholder="Customer" name="namacust"
                                            value="{{ $data->namacust }}">
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Code Customer</h5>
                                    </div>
                                    <div class="card-body">
                                        <input type="text" class="form-control" placeholder="Code customer..."
                                            name="codecust" value="{{ $data->codecust }}">
                                    </div>
                                </div>

                            </div>
                            <div class="row">

                                <div class="col">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Email</h5>
                                    </div>
                                    <div class="card-body">
                                        <input type="text" class="form-control" placeholder="Email" name="email"
                                            value="{{ $data->email }}">
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Up</h5>
                                    </div>
                                    <div class="card-body">
                                        <input type="text" class="form-control" placeholder="Up..." name="up"
                                            value="{{ $data->up }}">
                                    </div>
                                </div>
                            </div>

                            <div class="card-header">
                                <h5 class="card-title mb-0">Address</h5>
                            </div>
                            <div class="card-body">
                                <input type="text" class="form-control" placeholder="Address 1" name="address"
                                    value="{{ $data->address }}">
                            </div>
                            <div class="card-header">
                                <h5 class="card-title mb-0">Phone</h5>
                            </div>
                            <div class="card-body">
                                <input type="text" class="form-control" placeholder="Phone" name="phone1"
                                    value="{{ $data->phone1 }}">
                            </div>
                            <div class="card-header">
                                <h5 class="card-title mb-0">Phone 2</h5>
                            </div>
                            <div class="card-body">
                                <input type="text" class="form-control" placeholder="Phone2" name="phone2"
                                    value="{{ $data->phone2 }}">
                            </div>
                            <div class="card-header">
                                <h5 class="card-title mb-0">Status</h5>
                            </div>
                            <div class="card-body">
                                <input type="text" class="form-control" placeholder="Status" name="status"
                                    value="{{ $data->status }}">
                            </div>


                        </div>




                    </div>
                </div>
                <button class="btn btn-primary" style="width: 100%">Submit</button>
            </form>
        </div>
    </main>
@endsection
