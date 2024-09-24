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
            <form method="POST" action="{{ route('supplier.store') }}">
                @csrf

                <div class="row">
                    <div class="">
                        <div class="card">
                            <div class="row">

                                <div class="col">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Supplier</h5>
                                    </div>
                                    <div class="card-body">
                                        <input type="text" class="form-control" placeholder="supplier" name="supplier">
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">CP</h5>
                                    </div>
                                    <div class="card-body">
                                        <input type="text" class="form-control" placeholder="Contact Person"
                                            name="cp">
                                    </div>
                                </div>

                            </div>


                            <div class="row">

                                <div class="col">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Jenis</h5>
                                    </div>
                                    <div class="card-body">
                                        <input type="text" class="form-control" placeholder="Jenis" name="jenis">
                                        <datalist>
                                            <option value='INK'>
                                                <option value='PP'>
                                                    <option value='CH'>
                                                        <option value='LL'>
                                                            <option value='EKP'>
                                        </datalist>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Material</h5>
                                    </div>
                                    <div class="card-body">
                                        <input type="text" class="form-control" placeholder="Material" name="material">
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Email</h5>
                                    </div>
                                    <div class="card-body">
                                        <input type="text" class="form-control" placeholder="Email" name="email">
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Telp</h5>
                                    </div>
                                    <div class="card-body">
                                        <input type="text" class="form-control" placeholder="Telp" name="telp">
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">No Rekening</h5>
                                    </div>
                                    <div class="card-body">
                                        <input type="text" class="form-control" placeholder="No Rekening"
                                            name="rekening">
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Bank</h5>
                                    </div>
                                    <div class="card-body">
                                        <input type="text" class="form-control" placeholder="Bank" name="bank">
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Alamat</h5>
                                    </div>
                                    <div class="card-body">
                                        <input type="text" class="form-control" placeholder="Alamat " name="alamat">
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Lead Time</h5>
                                    </div>
                                    <div class="card-body">
                                        <input type="text" class="form-control" placeholder="Lead Time..."
                                            name="leadtime">
                                    </div>
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
