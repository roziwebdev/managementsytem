@extends('role.purchasing.layouts.main')
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

            <div class="row ">
                <div class="col-12 stretch-card grid-margin">
                    <div class="card border rounded">
                        <div class="card-body shadow  border rounded">
                            <h4 class="card-title mb-3">Form Purchase Order</h4>
                            <form class="form-sample" method="POST" action="{{ route('purchaseorder.update', $user->id) }}">
                                @method('PUT')
                                @csrf
                                <div class="row stretch-card " style="background-color: #f1f1f6">
                                    <div class="col-md mt-3 ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">MR Number</label>
                                            <input type="text" class="form-control form-control-sm " name="mrnumber"
                                                value="{{ $user->mrnumber }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md mt-3 ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Product/JOB</label>
                                            <input type="text" class="form-control form-control-sm " name="product"
                                                value="{{ $user->product }}" readonly>
                                        </div>
                                    </div>


                                    <div class="col-md mt-3">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Supplier</label>
                                            <input type="text" id="search" placeholder="Supplier" required
                                                list="supplier" name="supplier" class="form-control"
                                                value="{{ $user->supplier }}">
                                            <datalist id="supplier">
                                                @foreach ($supplier as $data)
                                                    <option>{{ $data->supplier }}</option>
                                                @endforeach
                                            </datalist>
                                            <input value='{{ $user->cp }}' class='form-control' name='cp' />


                                        </div>
                                    </div>

                                </div>
                                <div class="row stretch-card  " style="background-color: #f1f1f6">
                                    <div class="col-md mt-3 ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">MR Date</label>
                                            <input type="date" class="form-control form-control-sm " name="mrtanggal"
                                                value="{{ $user->created_at->format('Y-m-d') }}">
                                        </div>
                                    </div>
                                    <div class="col-md mt-3">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Alamat</label>
                                            <select class="form-select" name="alamat" required>
                                                <option selected value="{{ $user->alamat }}">{{ $user->alamat }}</option>
                                                <option value="JL Mondoroko 14, Singosari">JL Mondoroko 14, Singosari
                                                </option>
                                                <option value="JL Imam Bonjol 838 Ardimulyo, Songsong">JL Imam Bonjol 838
                                                    Ardimulyo,
                                                    Songsong</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md mt-3">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">VAT</label>
                                            <select class="form-select" name="vat" required
                                                value="{{ $user->vat }}">
                                                <option value="NON">NON</option>
                                                <option value="Include">Include</option>
                                                <option value="Exclude">Exclude</option>

                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="row stretch-card grid-margin " style="background-color: #f1f1f6">
                                    <div class="col-md mt-3 ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Note</label>
                                            <input type="text" class="form-control form-control-sm " name="ref"
                                                value="{{ $user->ref }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row  shadow" style="background-color: #f1f1f6">
                                    @php

                                        $items = json_decode($user->item);
                                        $specs = json_decode($user->specs);
                                        $sizes = json_decode($user->size);
                                        $units = json_decode($user->unit);
                                        $qtys = json_decode($user->qty);
                                        $currency = json_decode($user->po);
                                        $prices = json_decode($user->price);
                                        $etauser = json_decode($user->etauser);
                                        $etaauto = json_decode($user->etaauto);
                                        $serat = json_decode($user->podate);
                                        $panjangs = json_decode($user->panjang);
                                        $lebars = json_decode($user->lebar);
                                        $tinggis = json_decode($user->tinggi);

                                        // Gabungkan semua data menjadi satu array dengan zip
                                        $combinedData = array_map(null, $items, $specs, $sizes, $units, $qtys, $currency, $prices, $etauser, $etaauto, $serat,$panjangs,$lebars,$tinggis);
                                    @endphp
                                    @foreach ($combinedData as $index => $data)
                                        <div class="remove-item" id="removeitem_{{ $index }}">
                                            <div id="row" class="col mt-3">
                                                <div class="mb-3" style="font-size: 14px">
                                                    <label for="" class="form-label fw-bold">Item</label>
                                                    <input type="text" id="" placeholder="Item"
                                                        list="item" name="item[]" required
                                                        class="form-control form-control-sm" value='{{ $data[0] }}'>
                                                </div>
                                                <div class="row " style="background-color: #f1f1f6">
                                                    <div class="col-md">
                                                        <div class="mb-3" style="font-size: 14px">
                                                            <label for="" class="form-label">Specs</label>
                                                            <input type="text" class="form-control form-control-sm "
                                                                name="specs[]" required value='{{ $data[1] }}'>
                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="mb-3" style="font-size: 14px">
                                                            <label for="" class="form-label">Size</label>
                                                            <input type="text" class="form-control form-control-sm "
                                                                name="size[]" required value='{{ $data[2] }}'>
                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="mb-3" style="font-size: 14px">
                                                            <label for="" class="form-label">Panjang</label>
                                                            <input type="text" class="form-control form-control-sm "
                                                                name="panjang[]"  value='{{ $data[10] }}'>
                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="mb-3" style="font-size: 14px">
                                                            <label for="" class="form-label">Lebar</label>
                                                            <input type="text" class="form-control form-control-sm "
                                                                name="lebar[]"  value='{{ $data[11] }}'>
                                                        </div>
                                                    </div>
                                                        <input type="hidden" class="form-control form-control-sm " name="tinggi[]" required value='{{ $data[12] }}'>
                                                </div>
                                                <div class="row " style="background-color: #f1f1f6">
                                                    <div class="col-md">
                                                        <div class="mb-3" style="font-size: 14px">
                                                            <label for="" class="form-label">Qty</label>
                                                            <input type="text" class="form-control form-control-sm "
                                                                name="qty[]"  value="{{ $data[4] }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="mb-3" style="font-size: 14px">
                                                            <label for="" class="form-label ">Unit</label>
                                                            <input type="text" class="form-control form-control-sm "
                                                                name="unit[]" required value='{{ $data[3] }}'>
                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="mb-3" style="font-size: 14px">
                                                            <label for="" class="form-label">Serat</label>
                                                            <input type="text" class="form-control form-control-sm "
                                                                name="podate[]" required value="{{ $data[9] }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="mb-3" style="font-size: 14px">
                                                            <label for="" class="form-label">Price</label>
                                                            <input type="text" class="form-control form-control-sm "
                                                                name="price[]" required value='{{ $data[6] }}'>
                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="mb-3" style="font-size: 14px">
                                                            <label for="" class="form-label">Currency</label>
                                                            <select name="po[]" class="form-select">
                                                                <option value='{{ $data[5] }}' selected>
                                                                    {{ $data[5] }}</option>
                                                                <option value="&nbsp;RP">&nbsp;RP</option>
                                                                <option value="&nbsp;RP">&nbsp;$</option>
                                                                <option value="&nbsp;%">&nbsp;%</option>
                                                            </select>

                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="mb-3" style="font-size: 14px">
                                                            <label for="" class="form-label">Eta User</label>
                                                            <input type="date" class="form-control form-control-sm"
                                                                name="etauser[]" required value='{{ $data[7] }}'>
                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="mb-3" style="font-size: 14px">
                                                            <label for="" class="form-label">Eta Auto</label>
                                                            <input type="date" class="form-control form-control-sm "
                                                                name="etaauto[]" required value='{{ $data[8] }}'>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="my-3 btn btn-gradient-danger btn-sm"
                                                    onclick="removeItem('{{ $index }}')">Remove</div>
                                                <script>
                                                    // Mendapatkan tanggal dan waktu sekarang
                                                    var currentDate = new Date();

                                                    // Mendapatkan elemen input dengan ID 'tanggal'
                                                    var inputTanggal = document.getElementById('tanggal2');

                                                    // Format tanggal ke format YYYY-MM-DD
                                                    var formattedDate = currentDate.toISOString().slice(0, 10);

                                                    // Mengatur nilai input dengan tanggal sekarang
                                                    inputTanggal.value = formattedDate;
                                                </script>
                                            </div>
                                    @endforeach
                                    <script>
                                        function removeItem(index) {
                                            // Get the parent element by ID
                                            var parentElement = document.getElementById('removeitem_' + index);

                                            // Remove the parent element
                                            parentElement.parentNode.removeChild(parentElement);
                                        }
                                    </script>
                                </div>
                                <div class="col">
                                    <div id="newinput"></div>
    
                                </div>
                            </div>
                            <div id="rowAdder" class="my-3 btn btn-gradient-success btn-sm">Add</div>
                        <div>
                            <button type="submit" class="btn-rounded btn btn-gradient-info float-end mt-2">
                                Submit
                            </button>
                        </div>
                        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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


                        <script>
                            // Initialize counter for unique IDs
                            let counter = 1;

                            function handleRemoveItem(id) {
                                $(`#row${id}`).remove();
                            }

                            $("#rowAdder").click(function() {
                                newRowAdd = `
                                                    <div id="row${counter}" class="col mt-3">

                                                        <div class="mb-3" style="font-size: 14px">
                                                             <label for="" class="form-label fw-bold">Item</label>
                                            <input type="text" id="searchitem${counter}" placeholder="Item" list="item"
                                                name="item[]" required class="form-control">
                                                            <datalist id="item">
                                                                @foreach ($item as $data)
                                                                    <option>{{ $data->item }}</option>
                                                                @endforeach
                                                            </datalist>
                                                            <div class="pt-2" id="search-resultsitem${counter}"></div>
                                                        </div>
                                                        <button class="btn btn-sm btn-gradient-danger " onclick="handleRemoveItem(${counter})">Remove</button>
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
                </div>
            </div>
        </div>

    </div>
@endsection
