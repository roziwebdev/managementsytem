@extends('role.purchasing.layouts.main')
@section('main-container')
    <!-- partial -->

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
    <div class="main-panel">
        <div class="    content-wrapper" style="background-color: #f6f6fb">
            <div class="row ">
                <div class="col-12 stretch-card grid-margin">
                    <div class="card border rounded">
                        <div class="card-body shadow  border rounded">
                            <h4 class="card-title mb-3">Form Withdrawal Items</h4>
                            
                                 @if ($errors->any())
                                    <div id="errorModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="errorModalLabel">Error</h5>
                                                </div>
                                                <div class="modal-body" style="color: red;">
                                                   
                                                        @foreach ($errors->all() as $error)
                                                            <div>{{$error}}</div>
                                                        @endforeach
                                                   
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                
                            <form class="form-sample" method="POST" action="{{ route('withdraw.store') }}"
                                id="pricelistForm">
                                @csrf
                                <div class="row stretch-card grid-margin shadow" style="background-color: #f1f1f6">
                                    <div class="col-md mt-3">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Type</label>
                                            <select class="form-select" name="type">
                                                <option value=''>Choose Type</option>
                                                <option value='Alat Tulis'>Alat Tulis</option>
                                                <option value='P3K'>P3K</option>
                                                <option value='Spareparts'>Spareparts</option>
                                                <option value='Regular'>Regular</option>
                                                <option value='Chemical'>Chemical</option>
                                                <option value='Tinta'>Tinta</option>
                                                <option value='Elektronik'>Elektronik</option>
                                                <option value='IT'>IT</option>
                                            </select>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md mt-3">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Lokasi</label>
                                            <input type="text" class="form-control form-control-sm " name="lokasi">
                                        </div>
                                    </div>
                                    <div class="col-md mt-3 ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Dept</label>
                                            <input type="text" class="form-control form-control-sm " name="dept"
                                                value=' {{ Auth::user()->departement }}' readonly>
                                        </div>
                                    </div>
                                    <div class="col-md mt-3">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Created</label>
                                            <input type="text" class="form-control form-control-sm " name="created"
                                                value=' {{ Auth::user()->name }}' readonly>
                                        </div>
                                    </div>
                                 
                                </div>

                                    <div class="row  shadow" style="background-color: #f1f1f6">
                                        <div>
                                            <div id="row" class="col mt-3">
                                                <div class="mb-3" style="font-size: 14px">
                                                    <label for="" class="form-label fw-bold">Item</label>
                                                    <input type="text" id="searchitem" placeholder="Item" list="items"
                                                        name="item" required class="form-control form-control-sm" required>
                                                    <datalist id="items">
                                                        @foreach ($items as $data)
                                                            <option data-type="{{ $data->type }}">{{ $data->item }}</option>
                                                        @endforeach
                                                    </datalist>
                                                    <div class="pt-2" id="search-resultsitem"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                                    <script>
                                        $(document).ready(function() {
                                            var items = $('#items option').clone(); // save original options
                                            $('select[name="type"]').change(function() {
                                                var type = $(this).val();
                                                $('#items').empty(); // clear datalist
                                                items.each(function() {
                                                    if ($(this).data('type') == type) {
                                                        $('#items').append($(this).clone()); // add matching options
                                                    }
                                                });
                                            });
                                        });
                                    </script>

                                <div>
                                    <button type="submit" class="btn-rounded btn btn-gradient-info float-end mt-2">
                                        Submit
                                    </button>
                                </div>
                                <!-- Add this modal at the bottom of your Blade file -->
                                <div class="modal fade" id="successModal" tabindex="-1" role="dialog"
                                    aria-labelledby="successModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="successModalLabel">Success!</h5>

                                            </div>
                                            <div class="modal-body">
                                                Material Request berhasil di tambahkan.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                                <!-- Script untuk menangani pencarian item -->
                                <script>
                                    function handleSearchItem() {
                                        var query = $(this).val();
                                        if (query !== '') {
                                            $.ajax({
                                                url: '/searchitemresultinvenwd',
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
            <div class="">
                <div class="card rounded-xl shadow">
                    <div class="card-body shadow border">
                        <h3 class="text-center pb-3">Withdraw List</h3>
                        <form action="" method="GET" novalidate="novalidate">
                            <div class="d-flex pb-2">
                                <input type="text" name="search" type="search"
                                    class="form-control form-control-sm">
                                <button type="submit" class="btn btn-sm btn-gradient-success ">Search</button>
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
                            <table class="table" id="materialRequestTable">
                                <thead>
                                    <tr class="" style="background-color: #f1f1f6">

                                        <th style="font-size: 14px; width: 40px" class="py-2 my-2 sticky"> ID </th>
                                        <th style="font-size: 14px" class="py-2 my-2"> TYPE </th>
                                        <th style="font-size: 14px" class="py-2 my-2"> ITEM </th>
                                        <th style="font-size: 14px" class="py-2 my-2"> LOCATION </th>
                                        <th style="font-size: 14px" class="py-2 my-2"> QTY</th>
                                        <th style="font-size: 14px" class="py-2 my-2"> DEPT</th>
                                        <th style="font-size: 14px" class="py-2 my-2"> DATE </th>
                                        <th style="font-size: 14px" class="py-2 my-2"> STATUS </th>

                                    </tr>
                                </thead>
                                <tbody id="pricelistTableBody">
                                    @foreach ($withdraws as $data)
                                    @if ($data->pic == Auth::user()->name || $data->created == Auth::user()->name)
                                    @if($data->status == "waiting")
                                        <tr>
                                            <div class="table-responsive">
                                                <style>
                                                    td.sticky {
                                                        position: sticky;
                                                        left: 0;
                                                        background-color: #ffffff;
                                                    }

                                                    .ellipsis {
                                                        white-space: nowrap;
                                                        overflow: hidden;
                                                        text-overflow: ellipsis;
                                                        max-width: 30ch;
                                                        /* Atau sesuaikan dengan ukuran yang Anda inginkan */
                                                    }
                                                </style>
                                                <td style="padding-top: 3px; padding-bottom:3px;" class="sticky">
                                                    {{ $data->id }}</td>
                                                <td style="padding-top: 3px; padding-bottom:3px;" class="">
                                                    {{ $data->type }}</td>
                                                <td style="padding-top: 3px; padding-bottom:3px;" class="">
                                                    {{ $data->item }}</td>
                                                <td style="padding-top: 3px; padding-bottom:3px;" class="">
                                                    {{ $data->lokasi }}</td>
                                                <td style="padding-top: 3px; padding-bottom:3px;" class="">
                                                    {{ $data->qty }}</td>
                                                <td style="padding-top: 3px; padding-bottom:3px;" class="">
                                                    {{ $data->dept }}</td>
                                                <td style="padding-top: 3px; padding-bottom:3px;" class="">
                                                    {{ \Carbon\Carbon::parse($data->created_at)->format('j M y') }}</td>
                                                <td style="padding-top: 3px; padding-bottom:3px;">
                                                    @if ($data->status === 'waiting')
                                                        <a class="btn btn-sm btn-gradient-warning"
                                                            href="{{ route('withdrawpurchasing.updateStatus', ['id' => $data->id]) }}">Waiting</a>
                                                        <a class="btn btn-sm btn-gradient-info"
                                                            href="{{ route('withdraw.edit', $data->id) }}">Edit</a> 
                                                    @elseif ($data->status === 'approve')
                                                        <button class="btn btn-sm btn-gradient-info">Approve</button>
                                                    @endif
                                                </td>
                                            </div>
                                        </tr>
                                    
                                    @endif
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- <div class="pt-2">
                                {{ $materialrequests->links() }}
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>

        </div>

              <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<!-- Your custom script comes after jQuery -->
<script>
    $(document).ready(function() {
        $('#errorModal').modal('show');
    });
</script>
    @endsection
