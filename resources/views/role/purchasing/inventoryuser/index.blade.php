@extends('role.purchasing.layoutsuser.main')
@section('main-container')
    <!-- partial -->

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
    <div class="main-panel">
        <div class="    content-wrapper" style="background-color: #f6f6fb">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <style>
                #myForm {
                    display: none;
                }
            </style>
            <script>
              $(document).ready(function(){
                    $("#myButton").click(function(){
                        $("#myForm").fadeToggle();
                    });
                });
            </script>
            <div  id="myButton" class=" justify-content-end d-flex py-2">
            <button class="btn btn-info">Add Item</button>
            </div>

            <div class="row " id="myForm">
                <div class="col-12 stretch-card grid-margin">
                    <div class="card border rounded">
                        <div class="card-body shadow  border rounded">
                            <h4 class="card-title mb-3">Form Material Request</h4>
                            <form class="form-sample" method="POST" action="{{ route('inventoryuser.store') }}"
                                id="pricelistForm">
                                @csrf
                                <div class="row stretch-card grid-margin shadow" style="background-color: #f1f1f6">
                                            <input type="hidden" class="form-control form-control-sm " name="dept"
                                                value=' {{ Auth::user()->departement }}'>
                                    <div class="col-md mt-3">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Type</label>
                                            <input type="text" class="form-control form-control-sm" name="type"
                                                list="type" required>
                                            <datalist id="type">
                                                <option value="Alat Tulis"></option>
                                                <option value="P3K"></option>
                                                <option value="Spareparts"></option>
                                                <option value="Reguler"></option>
                                                <option value="Chemical"></option>
                                                <option value="Tinta"></option>
                                                <option value="Elektronik"></option>
                                                <option value="IT"></option>

                                            </datalist>
                                        </div>
                                    </div>
                                    <div class="col-md mt-3">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold ">NO PO <sup
                                                    class='text-danger'> Jika ada</sup></label>
                                            <input type="text" class="form-control form-control-sm " name="po"
                                                placeholder="Example : 23xxxxxx" required>
                                        </div>
                                    </div>
                                    <div class="col-md mt-3">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Vendor </label>
                                            <input type="text" class="form-control form-control-sm " name="vendor">
                                        </div>
                                    </div>
                                    <div class="col-md mt-3">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Lokasi</label>
                                            <input type="text" class="form-control form-control-sm " name="lokasi">
                                        </div>
                                    </div>
                                    <div class="col-md mt-3">
                                        <div class="mb-3" style="font-size: 14px">
                                          <label for="" class="form-label fw-bold">PIC</label>
                                          <select class="form-select" name="pic">
                                            <option selected>Choose PIC</option>
                                            @if(Auth::user()->departement == 'PPIC SM')
                                              <option value="Victor">Victor</option>
                                              <option value="Bayu">Bayu</option>
                                              <option value="Riyan">Riyan</option>
                                            @elseif(Auth::user()->departement == 'Purchasing')
                                              <option value="Ego Saputra">Ego Saputra</option>
                                              <option value="Safira">Safira</option>
                                            @elseif(Auth::user()->departement == 'HRGA')
                                              <option value="Maisya">Maisya</option>
                                              <option value="Sinta">Sinta</option>
                                            @elseif(Auth::user()->departement == 'Produksi')
                                              <option value="Firmananda">Firmananda</option>
                                              <option value="Decy">Decy</option>
                                            @elseif(Auth::user()->departement == 'Prodev')
                                              <option value="Selvi">Selvi</option>
                                              <option value="Erna">Erna</option>
                                            @elseif(Auth::user()->departement == 'FA & TAX')
                                              <option value="Candra">Candra</option>
                                            @endif
                                          </select>
                                        </div>

                                            <input type="hidden" class="form-control form-control-sm " name="created"
                                                value=' {{ Auth::user()->name }}' readonly>
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
                                                        <option>{{ $data->item }}</option>
                                                    @endforeach
                                                </datalist>
                                                <div class="pt-2" id="search-resultsitem"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                                url: '/searchitemresultinven',
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
                        <h3 class="text-center pb-3">Inventory</h3>
                        
                         <div class="d-flex  py-3">
                                <div class="dropdown">
                                    <a class="btn btn-sm px-4 btn-dark dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Type
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                                <a href="/inventoryuser"
                                                    class="dropdown-item ">
                                                    <span
                                                        class="material-symbols-outlined align-middle px-2"
                                                        style="font-size: 20px">
                                                        clear_all
                                                    </span>All Type
                                                </a>
                                        </li>
                                        <li>
                                             <form action="" method="GET"
                                                novalidate="novalidate">
                                                <input type="hidden" name="type"
                                                    value="Alat Tulis">
                                                <button type="submit"
                                                    class="dropdown-item ">
                                                    <span
                                                        class="material-symbols-outlined align-middle px-2"
                                                        style="font-size: 20px">
                                                        Draw
                                                    </span>Alat Tulis
                                                </button>
                                            </form>
                                        </li>
                                        <li>
                                             <form action="" method="GET"
                                                novalidate="novalidate">
                                                <input type="hidden" name="type"
                                                    value="P3K">
                                                <button type="submit"
                                                    class="dropdown-item ">
                                                    <span
                                                        class="material-symbols-outlined align-middle px-2"
                                                        style="font-size: 20px">
                                                        Medical_services
                                                    </span>P3K
                                                </button>
                                            </form>
                                        </li>
                                            <li>
                                             <form action="" method="GET"
                                                novalidate="novalidate">
                                                <input type="hidden" name="type"
                                                    value="Spareparts">
                                                <button type="submit"
                                                    class="dropdown-item ">
                                                    <span
                                                        class="material-symbols-outlined align-middle px-2"
                                                        style="font-size: 20px">
                                                        Manufacturing
                                                    </span>Spareparts
                                                </button>
                                            </form>
                                        </li>
                                        <li>
                                             <form action="" method="GET"
                                                novalidate="novalidate">
                                                <input type="hidden" name="type"
                                                    value="Reguler">
                                                <button type="submit"
                                                    class="dropdown-item ">
                                                    <span
                                                        class="material-symbols-outlined align-middle px-2"
                                                        style="font-size: 20px">
                                                        Inventory_2
                                                    </span>Reguler
                                                </button>
                                            </form>
                                        </li>
                                        <li>
                                             <form action="" method="GET"
                                                novalidate="novalidate">
                                                <input type="hidden" name="type"
                                                    value="Chemical">
                                                <button type="submit"
                                                    class="dropdown-item ">
                                                    <span
                                                        class="material-symbols-outlined align-middle px-2"
                                                        style="font-size: 20px">
                                                        Science
                                                    </span>Chemical
                                                </button>
                                            </form>
                                        </li>
                                        <li>
                                             <form action="" method="GET"
                                                novalidate="novalidate">
                                                <input type="hidden" name="type"
                                                    value="Tinta">
                                                <button type="submit"
                                                    class="dropdown-item ">
                                                    <span
                                                        class="material-symbols-outlined align-middle px-2"
                                                        style="font-size: 20px">
                                                        water_drop
                                                    </span>Tinta
                                                </button>
                                            </form>
                                        </li>
                                        <li>
                                             <form action="" method="GET"
                                                novalidate="novalidate">
                                                <input type="hidden" name="type"
                                                    value="Elektronik">
                                                <button type="submit"
                                                    class="dropdown-item ">
                                                    <span
                                                        class="material-symbols-outlined align-middle px-2"
                                                        style="font-size: 20px">
                                                        adf_scanner
                                                    </span>Elektronik
                                                </button>
                                            </form>
                                        </li>
                                        <li>
                                             <form action="" method="GET"
                                                novalidate="novalidate">
                                                <input type="hidden" name="type"
                                                    value="Elektronik">
                                                <button type="submit"
                                                    class="dropdown-item ">
                                                    <span
                                                        class="material-symbols-outlined align-middle px-2"
                                                        style="font-size: 20px">
                                                        Devices
                                                    </span>IT
                                                </button>
                                            </form>
                                        </li>

                                    </ul>
                                </div>
                                <div class="dropdown px-4">
                                    <a class="btn btn-sm px-4 btn-dark dropdown-toggle " href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Dept
                                    </a>

                                    <ul class="dropdown-menu">
                                         <li>
                                             
                                                <a href="/user"
                                                    class="dropdown-item ">
                                                    <span
                                                        class="material-symbols-outlined align-middle px-2"
                                                        style="font-size: 20px">
                                                        clear_all
                                                    </span>All Dept
                                                </a>
                                           
                                        </li>
                                        <li>
                                             <form action="" method="GET"
                                                novalidate="novalidate">
                                                <input type="hidden" name="dept"
                                                    value="FA & TAX">
                                                <button type="submit"
                                                    class="dropdown-item ">
                                                    <span
                                                        class="material-symbols-outlined align-middle px-2"
                                                        style="font-size: 20px">
                                                        Payments
                                                    </span>FA & TAX
                                                </button>
                                            </form>
                                        </li>
                                        <li>
                                             <form action="" method="GET"
                                                novalidate="novalidate">
                                                <input type="hidden" name="dept"
                                                    value="HRGA">
                                                <button type="submit"
                                                    class="dropdown-item ">
                                                    <span
                                                        class="material-symbols-outlined align-middle px-2"
                                                        style="font-size: 20px">
                                                        Group
                                                    </span>HRGA
                                                </button>
                                            </form>
                                        </li>
                                        <li>
                                             <form action="" method="GET"
                                                novalidate="novalidate">
                                                <input type="hidden" name="dept"
                                                    value="PPIC RM">
                                                <button type="submit"
                                                    class="dropdown-item ">
                                                    <span
                                                        class="material-symbols-outlined align-middle px-2"
                                                        style="font-size: 20px">
                                                        quick_reference
                                                    </span>PPIC RM
                                                </button>
                                            </form>
                                        </li>
                                        <li>
                                             <form action="" method="GET"
                                                novalidate="novalidate">
                                                <input type="hidden" name="dept"
                                                    value="PPIC SM">
                                                <button type="submit"
                                                    class="dropdown-item ">
                                                    <span
                                                        class="material-symbols-outlined align-middle px-2"
                                                        style="font-size: 20px">
                                                        Support
                                                    </span>PPIC SM
                                                </button>
                                            </form>
                                        </li>
                                        <li>
                                             <form action="" method="GET"
                                                novalidate="novalidate">
                                                <input type="hidden" name="dept"
                                                    value="Produksi">
                                                <button type="submit"
                                                    class="dropdown-item ">
                                                    <span
                                                        class="material-symbols-outlined align-middle px-2"
                                                        style="font-size: 20px">
                                                        Inventory
                                                    </span>Produksi
                                                </button>
                                            </form>
                                        </li>
                                        <li>
                                             <form action="" method="GET"
                                                novalidate="novalidate">
                                                <input type="hidden" name="dept"
                                                    value="Prodev">
                                                <button type="submit"
                                                    class="dropdown-item ">
                                                    <span
                                                        class="material-symbols-outlined align-middle px-2"
                                                        style="font-size: 20px">
                                                        group
                                                    </span>Prodev
                                                </button>
                                            </form>
                                        </li>
                                        <li>
                                             <form action="" method="GET"
                                                novalidate="novalidate">
                                                <input type="hidden" name="dept"
                                                    value="Purchasing">
                                                <button type="submit"
                                                    class="dropdown-item ">
                                                    <span
                                                        class="material-symbols-outlined align-middle px-2"
                                                        style="font-size: 20px">
                                                        Shopping_cart_checkout
                                                    </span>Purchasing
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>





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
                                        <th style="font-size: 14px" class="py-2 my-2"> QTY </th>
                                        <th style="font-size: 14px" class="py-2 my-2"> DEPT </th>
                                        <th style="font-size: 14px" class="py-2 my-2"> DATE CREATED </th>
                                        <th style="font-size: 14px" class="py-2 my-2"> RECORD </th>

                                    </tr>
                                </thead>
                                <tbody id="pricelistTableBody">
                                    @foreach ($items as $data)
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
<td style="padding-top: 3px; padding-bottom:3px;" class="{{ $data->qty == 0 ? 'text-danger font-weight-bold' : ($data->qty <= $data->safetystock ? 'text-warning font-weight-bold' : 'font-weight-bold') }}">
    {{ $data->qty }}
</td>



                                                <td style="padding-top: 3px; padding-bottom:3px;" class="">
                                                    {{ $data->dept }}</td>
                                                <td style="padding-top: 3px; padding-bottom:3px;" class="">
                                                    {{ \Carbon\Carbon::parse($data->created_at)->format('j M y') }}</td>
                                                 <td style="padding-top: 3px; padding-bottom:3px;" class="">
                                                    <a class="btn btn-sm btn-gradient-info" href="{{ route('inventoryuser.show', $data->id) }}">Detail</a>
                                                </td>
                                            </div>
                                        </tr>
                                    @endforeach
                                </tbody>


                            </table>
                             <div class="pt-2">
                                @if($items instanceof \Illuminate\Pagination\LengthAwarePaginator)
    {{ $items->links() }}
@endif
                            </div> 
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    @endsection
