@extends('role.purchasing.layouts.main')
@section('main-container')
    <main class="content">
        <div class="container-fluid p-0">
            <div class="mb-3">
                <h1 class="h3 d-inline align-middle">Forms</h1>
                <a class="badge bg-dark text-white ms-2" href="upgrade-to-pro.html">
                    Purchasing
                </a>
            </div>
            <form method="POST" action="{{ route('purchaseorder.store') }}">
                @csrf
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="card">


                            <div class="card-header">
                                <h5 class="card-title mb-0">Product Name</h5>
                            </div>
                            <div class="card-body">
                                <input type="text" class="form-control" placeholder="Product Name" name="product">
                            </div>

                            <div class="card-header">
                                <h5 class="card-title mb-0">Supplier</h5>
                            </div>
                            <div class="card-body">

                                <input type="text" id="search" placeholder="Supplier" list="supplier" name="supplier"
                                    class="form-control">
                                <datalist id="supplier">
                                    @foreach ($supplier as $data)
                                        <option>{{ $data->supplier }}</option>
                                    @endforeach
                                </datalist>
                                <div class="pt-2" id="search-results"></div>

                                <script>
                                    $(document).ready(function() {
                                        $('#search').on('keyup', function() {
                                            var query = $(this).val();
                                            if (query !== '') {
                                                $.ajax({
                                                    url: '/searchsupplier',
                                                    method: 'GET',
                                                    data: {
                                                        query: query
                                                    },
                                                    success: function(data) {
                                                        $('#search-results').html(data);
                                                    }
                                                });
                                            } else {
                                                $('#search-results').html('');
                                            }
                                        });
                                    });
                                </script>

                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">MR Date</h5>
                                    </div>
                                    <div class="card-body">
                                        <input type="date" name="mrdate" class="form-control" />

                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Alamat Kirim</h5>
                                    </div>
                                    <div class="card-body">
                                        <input type="text" name="alamat" class="form-control" list="alamat" />
                                        <datalist id="alamat">
                                            <option value="JL Imam Bonjol 838 Singosari"></option>
                                            <option value="JL Mondoroko 14 Singosari"></option>
                                        </datalist>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Vat</h5>
                                    </div>
                                    <div class="card-body">
                                        <input type="text" name="vat" placeholder="VAT" class="form-control" list='vat'/>
                                        <datalist id="vat">
                                            <option value="Exclude">
                                                 <option value="Include">
                                        </datalist>

                                    </div>
                                </div>
 <input type="hidden" value="Waiting" name="status" class="form-control" />
                                <div class="col">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Note</h5>
                                    </div>
                                    <div class="card-body">
                                        <input type="text" name="ref" placeholder="Ref" class="form-control" />
                                    </div>
                                </div>
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
                                    <input type="text" id="searchitem" placeholder="Item" list="item" name="item[]"
                                        class="form-control">
                                    <datalist id="item">
                                        @foreach ($item as $data)
                                            <option>{{ $data->item }}</option>
                                        @endforeach
                                    </datalist>
                                    <div class="pt-2" id="search-resultsitem"></div>
                                    <button class="btn btn-danger" id="DeleteRow" type="button">
                                        Remove
                                    </button>
                                </div>
                            </div>

                            <div class="row">
                                <div id="newinput"></div>

                                <div class="col">
                                    <div id="rowAdder" class="btn btn-primary">Add</div>
                                </div>
                            </div>

                            <!-- Script untuk menambahkan input item baru -->
                            <script>
                                // Initialize counter for unique IDs
                                let counter = 1;

                                $("#rowAdder").click(function() {
                                    newRowAdd =
                                        `<div id="row${counter}">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Item</h5>
                    </div>
                    <div class="card-body">
                        <input type="text" id="searchitem${counter}" placeholder="Item" list="item" name="item[]" class="form-control">
                        <datalist id="item">
                            @foreach ($item as $data)
                                <option>{{ $data->item }}</option>
                            @endforeach
                        </datalist>
                        <div class="pt-2" id="search-resultsitem${counter}"></div>
                        <button class="btn btn-danger" id="DeleteRow${counter}" type="button">Remove</button>
                    </div>
                </div>`;

                                    // Tambahkan elemen baru setelah elemen dengan ID "rowAdder"
                                    $("#newinput").append(newRowAdd);

                                    // Mendaftarkan fungsi handleSearchItem untuk elemen baru yang ditambahkan
                                    $(`#searchitem${counter}`).on('keyup', handleSearchItem);

                                    counter++;
                                });
                            </script>

                            <!-- Script untuk menangani pencarian item -->
                            <script>
                                function handleSearchItem() {
                                    var query = $(this).val();
                                    if (query !== '') {
                                        $.ajax({
                                            url: '/searchitemresult',
                                            method: 'GET',
                                            data: {
                                                query: query
                                            },
                                            success: function(data) {
                                                $(this).nextAll(".pt-2").first().html(data);
                                            }.bind(
                                                this) // Perhatikan bind(this) untuk mempertahankan konteks elemen yang memicu pencarian
                                        });
                                    } else {
                                        $(this).nextAll(".pt-2").first().html('');
                                    }
                                }

                                // Mendaftarkan fungsi handleSearchItem untuk elemen dengan ID "searchitem"
                                $(document).ready(function() {
                                    $('#searchitem').on('keyup', handleSearchItem);
                                });
                            </script>






            </form>
        </div>
        <div class="container">
            <button class="btn btn-primary" type="submit" style="width: 100%">Submit</button>
        </div>
    </main>
@endsection
