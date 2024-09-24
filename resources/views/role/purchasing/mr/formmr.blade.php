@extends('role.purchasing.layouts.main')
@section('main-container')
    <!-- choose one -->

    <main class="content">
        <div class="container-fluid p-0">
            <div class="mb-3">
                <h1 class="h3 d-inline align-middle">Forms</h1>
                <a class="badge bg-dark text-white ms-2" href="">
                    Material Request
                </a>
            </div>
            <form method="POST" action="{{ route('mr.store') }}">
                @csrf
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Dept</h5>
                            </div>
                            <div class="card-body">
                                <input type="text" class="form-control" placeholder="Dept" name="dept" required>
                            </div>
                            <div class="card-header">
                                <h5 class="card-title mb-0">Type</h5>
                            </div>
                            <div class="card-body">
                                <input type="text" class="form-control" placeholder="Type" name="type" list="type"
                                    required>
                                <datalist id="type">
                                    <option value="INK">INK (Tinta)</option>
                                    <option value="PP">PP (Paper)</option>
                                    <option value="CH">CH (Chemical)</option>
                                    <option value="LL">LL (Lain - lain)</option>
                                  
                                </datalist>
                            </div>
                            
                            
                            <div class="card-header">
                                <h5 class="card-title mb-0">Product Name</h5>
                            </div>
                            <div class="card-body">
                                <input type="text" class="form-control" placeholder="Product Name" name="job"
                                    required>
                            </div>
                            <div class="card-header">
                                <h5 class="card-title mb-0">Sisa Stock</h5>
                            </div>
                            <div class="card-body">
                                <input type="text" class="form-control" placeholder="Sisa Stock" name="sisastock">
                            </div>
                            <div class="card-header">
                                <h5 class="card-title mb-0">Last Order</h5>
                            </div>
                            <div class="card-body">
                                <input type="date" class="form-control" placeholder="Product Name" name="lastorder">
                            </div>
                            <div class="card-header">
                                <h5 class="card-title mb-0">Alamat Kirim</h5>
                            </div>
                            <div class="card-body">
                                <input type="text" class="form-control" placeholder="alamat" name="alamat" required
                                    list="alamat">
                                <datalist id="alamat">
                                    <option value=" JL Imam Bonjol 838 Singosari, Malang">
                                    <option value=" JL Mondoroko 14 Singosari, Malang">
                                </datalist>
                            </div>
                            <div class="card-header">
                                <h5 class="card-title mb-0">Arah serat p</h5>
                            </div>
                            <div class="card-body">
                                <input type="text" class="form-control" placeholder="Arah serat" name="arahseratp">
                            </div>
                            <div class="card-header">
                                <h5 class="card-title mb-0">Arah serat l</h5>
                            </div>
                            <div class="card-body">
                                <input type="text" class="form-control" placeholder="Arah serat" name="arahseratl">
                            </div>
                            <div class="card-header">
                                <h5 class="card-title mb-0">Created By</h5>
                            </div>
                            <div class="card-body">
                                <input type="text" class="form-control" placeholder="Created by ?" name="created"
                                    required>
                            </div>

                            <div class="card-body">
                                <input type="hidden" class="form-control" placeholder="" value="Waiting" name="status">
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-6">
                        <div class="card">
                            <div id="row">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Item</h5>
                                </div>
                                <div class="card-body">
                                    <input type="text" class="form-control" placeholder="Item" name="item[]">
                                </div>
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Specs</h5>
                                </div>
                                <div class="card-body">
                                    <input type="text" class="form-control" placeholder="Specs" name="specs[]">
                                </div>
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Size</h5>
                                </div>
                                <div class="card-body">
                                    <input type="text" class="form-control" placeholder="Size" name="size[]">
                                </div>
                                 <div class="card-header">
                                    <h5 class="card-title mb-0">Remarks</h5>
                                </div>
                                <div class="card-body">
                                    <input type="text" class="form-control" placeholder="Remarks" name="mrdate[]">
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Qty</h5>
                                        </div>
                                        <div class="card-body">
                                            <input type="text" name="qty[]" placeholder="quantity"
                                                class="form-control" />

                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Eta User</h5>
                                        </div>
                                        <div class="card-body">
                                            <input type="date" name="etauser[]" placeholder=""
                                                class="form-control" />

                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-danger" style="width: 100%" id="DeleteRow" type="button">
                                    Remove
                                </button>
                            </div>




                            <div id="newinput"></div>
                            <div class="col">
                                <div class="card-header">
                                    <div id="rowAdder" class="btn btn-primary">Add</div>
                                </div>

                            </div>

                            <script type="text/javascript">
                                $("#rowAdder").click(function() {
                                    newRowAdd =

                                        '<div id="row"><div class="card-header"><h5 class="card-title mb-0">Item</h5></div><div class="card-body"><input type="text" class="form-control" placeholder="Item" name="item[]"></div><div class="card-header"><h5 class="card-title mb-0">Specs</h5></div><div class="card-body"><input type="text" class="form-control" placeholder="Specs" name="specs[]"></div><div class="card-header"><h5 class="card-title mb-0">Size</h5></div><div class="card-body"><input type="text" class="form-control" placeholder="Size" name="size[]"></div><div class="card-header"><h5 class="card-title mb-0">Remarks</h5></div><div class="card-body"><input type="text" class="form-control" placeholder="Remarks" name="mrdate[]"></div><div class="row"><div class="col"><div class="card-header"> <h5 class="card-title mb-0">Qty</h5></div><div class="card-body"><input type="text" name="qty[]" placeholder="quantity" class="form-control" /></div></div><div class="col"><div class="card-header"><h5 class="card-title mb-0">Eta User</h5></div><div class="card-body"><input type="date" name="etauser[]"  class="form-control" /></div></div></div><button class="btn btn-danger" style="width: 100%;" id="DeleteRow" type="button">Remove</button></div>';

                                    $('#newinput').append(newRowAdd);
                                });
                                $("body").on("click", "#DeleteRow", function() {
                                    $(this).parents("#row").remove();
                                })
                            </script>
                        </div>

            </form>
        </div>
        <div class="container">
            <button class="btn btn-primary" type="submit" style="width: 100%">Submit</button>
        </div>
    </main>
@endsection
