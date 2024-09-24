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
                            <form class="form-sample" method="POST" action="{{ route('purchaseorder.store') }}" onsubmit="return handleSubmit(event)">
                                @csrf
                                <div class="row stretch-card " style="background-color: #f1f1f6">
                                    <div class="col-md mt-3 ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">MR Number</label>
                                            <input type="text" class="form-control form-control-sm " name="mrnumber" value="{{$materialrequest->id}}" readonly>
                                            <input type="hidden" class="form-control form-control-sm " name="type" value="{{$materialrequest->type}}" readonly>
                                            <input type="hidden" class="form-control form-control-sm " name="dept" value="{{$materialrequest->dept}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md mt-3 ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Product/JOB</label>
                                            <input type="text" class="form-control form-control-sm " name="product" value="{{$materialrequest->job}}" readonly>
                                        </div>
                                    </div>


                                    <div class="col-md mt-3">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Supplier</label>
                                            <input type="text" id="search" placeholder="Supplier" required
                                                list="supplier" name="supplier" class="form-control">
                                            <datalist id="supplier">
                                                @foreach ($supplier as $data)
                                                    <option>{{ $data->supplier }}</option>
                                                @endforeach
                                            </datalist>
                                            <div class="pt-2" id="search-results"></div>


                                        </div>
                                    </div>

                                </div>
                                <div class="row stretch-card  " style="background-color: #f1f1f6">
                                    <div class="col-md mt-3 ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">MR Date</label>
                                            <input type="date" class="form-control form-control-sm " name="mrtanggal"  value="{{ $materialrequest->created_at->format('Y-m-d') }}">
                                        </div>
                                    </div>
                                    <div class="col-md mt-3">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Alamat</label>
                                            <select class="form-select" name="alamat" required>
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
                                            <select class="form-select" name="vat" required>
                                                <option value="">Choose One</option>
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
                                            <input type="text" class="form-control form-control-sm " name="ref">
                                            <input type="hidden" class="form-control form-control-sm " name="approvalkadept_at" value="{{$materialrequest->approvalkadept_at}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row  shadow" style="background-color: #f1f1f6">
                                    <div>
                                        <div id="row" class="col mt-3">
                                            <div class="mb-3" style="font-size: 14px">
                                                <label for="" class="form-label fw-bold">Item</label>
                                                <input type="text" id="searchitem" placeholder="Item" list="item"
                                                    name="item[]" required class="form-control form-control-sm">
                                                <datalist id="item">
                                                    @foreach ($item as $datas)
                                                        <option>{{ $datas->item }}</option>
                                                    @endforeach
                                                </datalist>
                                                <div class="pt-2" id="search-resultsitem"></div>
                                            </div>

                                        </div>
                                        <div class="col">
                                            <div id="newinput"></div>

                                            <div id="rowAdder" class="my-3 btn btn-gradient-success btn-sm">Add</div>
                                        </div>
                                        <input class="form-control form-control-sm" name="status" value="Waiting"
                                            type="hidden" />
                                    </div>
                                </div>
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
                                
                                <script>
                                    function handleSubmit(event) {
                                        event.preventDefault(); // Prevent the form from submitting the default way
                            
                                        alert("Purchase Order Successfully Created. Please Waiting for Redirect"); // Display the success alert
                            
                                        // After showing the alert, programmatically submit the form
                                        event.target.submit();
                            
                                        return false; // This line is not necessary but included for clarity
                                    }
                                </script>



                            </form>
                        </div>
                    </div>
                </div>


                <div class="">
                    <div class="card rounded-xl shadow">
                        <div class="card-body shadow border">
                            <h3 class="text-center pb-3">Material Request MR- {{ $materialrequest->id }}</h3>



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


                                            <th style="font-size: 14px; " class="py-2 my-2"> Item </th>
                                            <th style="font-size: 14px" class="py-2 my-2"> Specs </th>
                                            <th style="font-size: 14px" class="py-2 my-2"> Sizes </th>
                                            <th style="font-size: 14px" class="py-2 my-2"> ETA User </th>
                                            <th style="font-size: 14px; " class="py-2 my-2"> Serat </th>
                                            <th style="font-size: 14px" class="py-2 my-2"> QTY </th>
                                            <th style="font-size: 14px" class="py-2 my-2"> Remarks </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @php
                                            $items = json_decode($materialrequest->item);
                                            $specs = json_decode($materialrequest->specs);
                                            $sizes = json_decode($materialrequest->size);
                                            $etausers = json_decode($materialrequest->etauser);
                                            $qtys = json_decode($materialrequest->qty);
                                            $remarks = json_decode($materialrequest->mrdate);
                                            $arahserat = json_decode($materialrequest->arahseratp);
                                            // Gabungkan semua data menjadi satu array dengan zip
                                            $combinedData = array_map(null, $items, $specs, $sizes, $etausers, $arahserat, $qtys, $remarks);
                                        @endphp
                                        @foreach ($combinedData as $data)
                                            <tr>
                                                <div class="table-responsive">
                                                    {{-- ETA User --}}
                                                    <td>{{ $data[0] }}</td>
                                                    <td>{{ $data[1] }}</td>
                                                    <td>{{ $data[2] }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($data[3])->format('j M y') }}</td>
                                                    <td>{{ $data[4] }}</td>
                                                    <td>{{ $data[5] }}</td>
                                                    <td>{{ $data[6] }}</td>
                                            </tr>
                                        @endforeach

                                    </tbody>


                                </table>
                                <div class="pt-2">
                                    {{-- {{ $materialrequests->links() }} --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
@endsection
