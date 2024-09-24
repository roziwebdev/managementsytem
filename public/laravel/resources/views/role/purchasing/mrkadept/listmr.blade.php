@extends('role.purchasing.layoutmrkadept.main')
@section('main-container')
   <!-- partial -->

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
    <div class="main-panel">
         @foreach ( $materialrequests as $user )
        <div class="modal fade" id="exampleModalToggleDetail{{ $user->id }}" aria-hidden="true"
            aria-labelledby="exampleModalToggleLabelDetail{{ $user->id }}" tabindex="-1">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header py-3 mb-0">
                        <div class="text-center container-xl pb-0 mb-0">
                            <h1 class="text-center modal-title" style="font-size: 25px"
                                id="exampleModalToggleLabelDetail{{ $user->id }}">Material Request</h1>
                        </div>
                        <button type="button" class="float-end btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal- pb-4">
                        <div class="container-xl">
                            <div class="border shadow border-secondary rounded" style="background:#F0F0F0">
                                <div class="container">
                                    <div class="">
                                        <p style="font-size:18px" class="fw-bold py-2 mb-1">MR Number - {{ $user->id}}
                                        </p>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg">
                                            <p style="font-size:14px" class="mb-1"><span style="font-weight: 600">Departement
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span>
                                                {{ $user->dept }}</p>
                                            <p style="font-size:14px" class="mb-1"><span style="font-weight: 600">Created
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span>
                                                {{
                                                \Carbon\Carbon::parse($user->created_at)->format('j M y')}}</p>
                                        </div>
                                        <div class="col-lg">
                                            <p style="font-size:14px" class="mb-1"><span style="font-weight: 600">Remarks Job
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span>
                                                {{ $user->job }}</p>
                                            <p style="font-size:14px" class="mb-1"><span style="font-weight: 600">Addres Received
                                                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span>
                                                {{ $user->alamat }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="border border-black" style="background: rgb(255, 255, 255)">
                                    <div class="container-xl border " style="height:">
                                        <div class="py-4 ">
                                            <div class="border shadow-sm table-responsive table-responsive1"
                                                style="height:">
                                                <table class="table table1 table-bordered border-secondary">
                                                    <thead class="">
                                                        <tr style="background:#F0F0F0; top:10px" class="">
                                                            <th class="pt-2 pb-2 col-sm fw-bold">No</th>
                                                            <th class="pt-2 pb-2 col-sm fw-bold">Items</th>
                                                            <th class="pt-2 pb-2 col-sm fw-bold">Specs</th>
                                                            <th class="pt-2 pb-2 col-sm fw-bold">Size</th>
                                                            <th class="pt-2 pb-2 col-sm fw-bold">Eta User</th>
                                                            <th class="pt-2 pb-2 col-sm fw-bold">Quantity</th>
                                                            <th class="pt-2 pb-2 col-sm fw-bold">Stock</th>
                                                            <th class="pt-2 pb-2 col-sm fw-bold">Serat</th>
                                                            <th class="pt-2 pb-2 col-sm fw-bold">Remarks</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                        $items = json_decode($user->item);
                                                        $specs = json_decode($user->specs);
                                                        $etausers = json_decode($user->etauser);
                                                        $sizes = json_decode($user->size);
                                                        $qtys = json_decode($user->qty);
                                                        $remarks = json_decode($user->mrdate);
                                                        $arahserat = json_decode($user->arahseratp);
                                                        $sisastocks = json_decode($user->sisastock);
                                                        // Gabungkan semua data menjadi satu array dengan zip
                                                        $combinedData = array_map(null, $items, $specs, $etausers, $sizes, $qtys, $remarks, $arahserat,$sisastocks);
                                                        @endphp
                                                        @foreach ($combinedData as $index => $data)
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm">{{ $index+1 }}</td>
                                                            <td class="pt-2 pb-2 col-sm">{{ $data[0] }}</td>
                                                            <td class="pt-2 pb-2 col-sm">{{ $data[1] }}</td>
                                                            <td class="pt-2 pb-2 col-sm">{{ $data[3] }}</td>
                                                            <td class="pt-2 pb-2 col-sm">{{\Carbon\Carbon::parse($data[2])->format('j M y')}}</td>
                                                            <td class="pt-2 pb-2 col-sm">{{ $data[4] }}</td>
                                                            <td class="pt-2 pb-2 col-sm">{{ $data[7] }}</td>
                                                            <td class="pt-2 pb-2 col-sm">{{ $data[6] }}</td>
                                                            <td class="pt-2 pb-2 col-sm">{{ $data[5] }}</td>
                                                        </tr>
                                                       @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                          @if ($user->status == 'Approve')
                                                        {{-- Cek status sebelumnya --}}
                                                        <p>MR sudah Approve/Declined sebelumnya.</p>
                                                    @elseif ($user->status == 'Declined')
                                                        {{-- Cek status sebelumnya --}}
                                                        <p>MR sudah Approve/Declined sebelumnya.</p>
                                                    @else
                                                        <form action="{{ route('update_statuskadept', $user->id) }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="px-3">
                                                                <div class="py-3">
                                                                    {{-- Radio buttons untuk mengubah status --}}
                                                                    
                                                                    <label class="btn btn-success px-3 py-2">
                                                                        <input type="radio" value="Waiting List" id="newStatus" name="newStatus">
                                                                        Approve
                                                                    </label>
                                                                    <label class="btn btn-danger px-3 py-2">
                                                                        <input type="radio" value="Declined" id="newStatus" name="newStatus" required/>
                                                                        Declined
                                                                    </label>
                                                                    
                                                                </div>
                                                            </div>
                                                                <input name="approvalkadept_at" type="hidden" id="dateInput">
                                                            <div class="modal-footer d-flex justify-content-end">
                                                                <button type="submit"
                                                                    class="btn btn-primary btn-sm px-4">Save changes</button>
                                                                <button type="button" class="btn btn-success btn-sm" data-bs-dismiss="modal" aria-label="Close"> Close</button>
                                                            </div>
                    
                                                            <script>
                                                            document.addEventListener("DOMContentLoaded", function() {
                                                              // Mendapatkan elemen input
                                                              var dateInput = document.getElementById("dateInput");
                                                            
                                                              // Mendapatkan tanggal sekarang
                                                              var currentDate = new Date();
                                                            
                                                              // Format tanggal menjadi YYYY-MM-DD (format yang diterima oleh elemen input type="date")
                                                              var formattedDate = currentDate.toISOString().substr(0, 10);
                                                            
                                                              // Mengatur nilai input menjadi tanggal sekarang
                                                              dateInput.value = formattedDate;
                                                            });
                                                            </script>
                                                        </form>
                                                    @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
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
            <div   class=" justify-content-end d-flex py-2">
            <button class="btn btn-info" id="myButton">Add Item</button>
            </div>
            <div class="row ">
                <div class="col-12 stretch-card grid-margin" id="myForm">
                    <div class="card border rounded">
                        <div class="card-body shadow  border rounded">
                            <h4 class="card-title mb-3">Form Material Request</h4>
                            <form class="form-sample" method="POST" action="{{ route('kadeptmr.store') }}" id="pricelistForm">
                                @csrf
                                <div class="row stretch-card grid-margin shadow" style="background-color: #f1f1f6">
                                    <div class="col-md mt-3 ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Dept</label>
                                            <input type="text" class="form-control form-control-sm " name="dept" value=' {{ Auth::user()->departement }}' readonly>
                                        </div>
                                    </div>
                                    <div class="col-md mt-3">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Type</label>
                                            <input type="text" class="form-control form-control-sm" name="type"
                                                list="type" required>
                                            <datalist id="type">
                                                <option value="INK">(Tinta)</option>
                                                <option value="PP">(Paper)</option>
                                                <option value="CH">(Chemical)</option>
                                                <option value="BOX">(BOX)</option>
                                                <option value="LL">(Lain - lain)</option>
                                            </datalist>
                                        </div>
                                    </div>
                                    <div class="col-md mt-3">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold ">Job Num <sup
                                                    class='text-danger'>(Jika kosong isi 0 ) </sup></label>
                                            <input type="text" class="form-control form-control-sm " name="kosong1"
                                                placeholder="Example : 23xxxxxx" required>
                                        </div>
                                    </div>
                                    <div class="col-md mt-3">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Job Prod <sup
                                                    class='text-danger'>(Jika kosong isi - ) </sup></label>
                                            <input type="text" class="form-control form-control-sm " name="job" >
                                        </div>
                                    </div>
                                    <div class="col-md mt-3">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Alamat</label>
                                            <select class="form-select" name="alamat" required>
                                                <option value="JL Sutoyo">JL Sutoyo
                                                </option>
                                                <option value="JL Merdeka ">JL Merdeka </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md mt-3">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Created</label>
                                            <input type="text" class="form-control form-control-sm " name="created" value=' {{ Auth::user()->name }}' readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row  shadow" style="background-color: #f1f1f6">
                                    <div>
                                        <div id="row" class="col mt-3">
                                            <div class="mb-3" style="font-size: 14px">
                                                <label for="" class="form-label fw-bold">Item</label>
                                                <input type="text" id="searchitem" placeholder="Item" list="item"
                                                    name="item[]" required class="form-control form-control-sm" required>
                                                <datalist id="item">
                                                    @foreach ($item as $data)
                                                        <option>{{ $data->item }}</option>
                                                    @endforeach
                                                </datalist>
                                                <div class="pt-2" id="search-resultsitem"></div>
                                            </div>
                                             <div class="data-form" id="form1" style="font-size:14px;">
                                                    <label for="item1" class="form-label fw-bold">Repeat Item Data</label>
                                                        <input class="form-control" type="text" name="" id="item1" list="item3" required>
                                                        <datalist id="item3">
                                                            @foreach ($item as $data3)
                                                                <option>{{ $data3->item }}</option>
                                                            @endforeach
                                                        </datalist>
                                                    <!-- Tambahkan input tersembunyi untuk menyimpan semua id -->
                                                    <input type="hidden" name="purchasing_ids" id="purchasing_ids1" readonly>
                                                </div>
                                          
                                                    
                                                <!-- Container untuk menampilkan data -->
                                                <div class="result-container">
                                                    <input class="form-control" type="hidden" id="id1" name="lastpo[]" readonly>
                                                    <input class="form-control" type="hidden" id="tanggalitem1" name="lastorder[]" readonly>
                                                    <input class="form-control" type="hidden" id="price1" name="lastprice[]" readonly>
                                                </div>
                                        </div>
                                        <div class="col">
                                            <div id="newinput"></div>

                                            <div id="rowAdder" class="my-3 btn btn-gradient-success btn-sm">Add</div>
                                        </div>
                                    </div>
                                </div>
                                @auth
                                @if (auth()->user()->departement === 'PPIC RM')
                                <div class="row  shadow" style="background-color: #f1f1f6">
                                    <div class="row">
                                        <div id="row2" class="col mt-3">
                                            <div class="mb-3" style="font-size: 14px">
                                                <label for="" class="form-label fw-bold">Product</label>
                                                <input type="text" name="box1[]" 
                                                    class="form-control form-control-sm">
                                            </div>
                                        </div>
                                        <div id="row2" class="col mt-3">
                                            <div class="mb-3" style="font-size: 14px">
                                                <label for="" class="form-label fw-bold">Detail</label>
                                                <input type="text" name="box2[]" 
                                                    class="form-control form-control-sm">
                                            </div>
                                        </div>
                                        <div id="row2" class="col mt-3">
                                            <div class="mb-3" style="font-size: 14px">
                                                <label for="" class="form-label fw-bold">Quantity</label>
                                                <input type="text" name="box3[]" 
                                                    class="form-control form-control-sm">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div id="newinput2"></div>
                                        <div id="rowAdder2" class="my-3 btn btn-gradient-success btn-sm">Add</div>
                                    </div>
                                </div>
                                
                    @else

                 <input type="hidden" name="box1[]" class="form-control"/>
                 <input type="hidden" name="box2[]" class="form-control"/>
                 <input type="hidden" name="box3[]" class="form-control"/>

        @endif
@endauth

                                <input class="form-control form-control-sm" name="status" value="Waiting List"
                                    type="hidden" />
                                <div>
                                    <button type="submit" 
                                        class="btn-rounded btn btn-gradient-info float-end mt-2">
                                        Submit
                                    </button>
                                </div>
                                <!-- Add this modal at the bottom of your Blade file -->
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Success!</h5>
              
            </div>
            <div class="modal-body">
                Material Request berhasil di tambahkan.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

                                
                                <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        // Intercept the form submission
        $('#pricelistForm').submit(function (e) {
            e.preventDefault(); // Prevent the default form submission

            // Cache the form element
            var form = $(this);

            // Perform an AJAX request to submit the form data
            $.ajax({
                url: form.attr('action'),
                method: form.attr('method'),
                data: form.serialize(),
                success: function (response) {
                    // The form was successfully submitted
                    // Now, show the Bootstrap modal
                    $('#successModal').modal('show');

                    // Attach a callback function to the modal's close event
                    $('#successModal').on('hidden.bs.modal', function () {
                        // Reload the page after the modal is closed
                        location.reload();
                    });
                },
                error: function (error) {
                    // Handle errors if needed
                    console.error('Error submitting form:', error);
                }
            });
        });
    });
</script>
                                <script>
                                    // Initialize counter for unique IDs
                                    let counter2 = 1;

                                    function handleRemoveItem2(id) {
                                        $(`#row2${id}`).remove();
                                    }

                                    $("#rowAdder2").click(function() {
                                        newRowAdd2 = `
                                                    <div id="row2${counter2}" class="col mt-3">

                                                     <div class="row" >
                                    <div class="row">
                                        <div id="row2" class="col mt-3">
                                            <div class="mb-3" style="font-size: 14px">
                                                <label for="" class="form-label fw-bold">Product</label>
                                                <input type="text" id="searchitem" placeholder="Item" list="item"
                                                    name="box1[]" required class="form-control form-control-sm">
                                            </div>
                                        </div>
                                        <div id="row2" class="col mt-3">
                                            <div class="mb-3" style="font-size: 14px">
                                                <label for="" class="form-label fw-bold">Detail</label>
                                                <input type="text" id="searchitem" placeholder="Item" list="item"
                                                    name="box2[]" required class="form-control form-control-sm">
                                            </div>
                                        </div>
                                        <div id="row2" class="col mt-3">
                                            <div class="mb-3" style="font-size: 14px">
                                                <label for="" class="form-label fw-bold">Quantity</label>
                                                <input type="text" id="searchitem" placeholder="Item" list="item"
                                                    name="box3[]" required class="form-control form-control-sm">
                                            </div>
                                        </div>
                                    </div>

                                                    <div>
                                                        <button class="btn btn-sm btn-gradient-danger " onclick="handleRemoveItem2(${counter2})">Remove</button>
                                                        </div>
                                                    </div>
                                                    `;

                                        // Tambahkan elemen baru setelah elemen dengan ID "rowAdder"
                                        $("#newinput2").append(newRowAdd2);


                                        counter2++;
                                    });
                                </script>

                                <script>
                                    let counter = 2;
                                
                                    function handleRemoveItem(id) {
                                        $(`#row${id}`).remove();
                                    }
                                
                                    function handleFormChange() {
                                        var formId = this.id;
                                        var counter = formId.replace('form', '');  // Extract the counter from formId
                                        var itemValue = this.querySelector('.form-control').value;
                                
                                        fetchData(
                                            formId,
                                            itemValue,
                                            'id' + counter,
                                            'purchasing_ids' + counter,
                                            'tanggalitem' + counter,
                                            'price' + counter
                                        );
                                    }
                                
                                    $("#rowAdder").click(function () {
                                        newRowAdd = `
                                            <div id="row${counter}" class="col mt-3">
                                                <div class="mb-3" style="font-size: 14px">
                                                    <label for="" class="form-label fw-bold">Item</label>
                                                    <input type="text" id="searchitem${counter}" placeholder="Item" list="items"
                                                        name="item[]" required class="form-control form-control-sm">
                                                    <datalist id="items">
                                                        @foreach ($item as $data)
                                                            <option>{{ $data->item }}</option>
                                                        @endforeach
                                                    </datalist>
                                                    <div class="pt-2" id="search-resultsitem${counter}"></div>
                                                </div>
                                                
                                                <div class="data-form mb-2" id="form${counter}" style="font-size:14px;">
                                                    <label for="item1" class="form-label fw-bold">Please Repeat Item</label>
                                                    <input class="form-control" type="text" name="" id="item${counter}" list="item3" required>
                                                    <datalist id="item3">
                                                        @foreach ($item as $data3)
                                                            <option>{{ $data3->item }}</option>
                                                        @endforeach
                                                    </datalist>
                                                    <input type="hidden" name="purchasing_ids" id="purchasing_ids${counter}" readonly>
                                                </div>
                                            
                                                <div class="result-container">
                                                    <input class="form-control" type="hidden" id="id${counter}" name="lastpo[]" readonly>
                                                    <input class="form-control" type="hidden" id="tanggalitem${counter}" name="lastorder[]" readonly>
                                                    <input class="form-control" type="hidden" id="price${counter}" name="lastprice[]" readonly>
                                                </div>
                                
                                                <button class="btn btn-sm btn-gradient-danger" onclick="handleRemoveItem(${counter})">Remove</button>
                                            </div>`;
                                
                                        $("#newinput").append(newRowAdd);
                                
                                        // Register event listeners for the newly added row
                                        $(`#searchitem${counter}`).on('keyup', handleSearchItem);
                                        $(`#form${counter}`).on('change', handleFormChange);
                                
                                        counter++; // Increment the counter for the next row
                                    });
                                
                                    function fetchData(formId, itemValue, idElement, idsElement, tanggalitemElement, priceElement) {
                                        var xhr = new XMLHttpRequest();
                                        xhr.open('GET', '/check-data?item=' + encodeURIComponent(itemValue), true);
                                        xhr.onreadystatechange = function () {
                                            if (xhr.readyState === 4 && xhr.status === 200) {
                                                var response = JSON.parse(xhr.responseText);
                                
                                                if (response.exists) {
                                                    var idsArray = response.data.map(item => item.id);
                                                    document.getElementById(idElement).value = idsArray.join(', ');
                                                    document.getElementById(idsElement).value = idsArray.join(', ');
                                
                                                    var tanggalitemArray = response.data.map(item => item.tanggalitem);
                                                    document.getElementById(tanggalitemElement).value = tanggalitemArray.join(', ');
                                
                                                    var priceArray = response.data.map(item => item.price);
                                                    document.getElementById(priceElement).value = priceArray.join(', ');
                                                } else {
                                                    document.getElementById(idElement).value = '';
                                                    document.getElementById(idsElement).value = '';
                                                    document.getElementById(tanggalitemElement).value = '';
                                                    document.getElementById(priceElement).value = '';
                                                }
                                            }
                                        };
                                        xhr.send();
                                    }
                                
                                    document.querySelectorAll('.data-form').forEach(function (form) {
                                        form.addEventListener('change', handleFormChange);
                                    });
                                </script>

                                <!-- Script untuk menangani pencarian item -->
                                <script>
                                    function handleSearchItem() {
                                        var query = $(this).val();
                                        if (query !== '') {
                                            $.ajax({
                                                url: '/searchitemresultmr',
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


                <div class="">
                    <div class="card rounded-xl shadow">
                        <div class="card-body shadow border">
                            <h3 class="text-center pb-3">Material Request</h3>
                            <form action="" method="GET" novalidate="novalidate">
                            <div class="d-flex pb-2">
                                <input type="text" name="search" type="search" class="form-control form-control-sm">
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
                                            <th style="font-size: 14px; width: 40px" class="py-2 my-2 sticky"> 
                                                <div class="dropdown">
                                                    <a class="absolute text-dark text-decoration-none dropdown-toggle"
                                                        href="#" role="button" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        MR
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a href="/kadept/kadeptmr" class="dropdown-item ">
                                                                <span class="px-2 align-middle material-symbols-outlined"
                                                                    style="font-size: 20px">
                                                                    clear_all
                                                                </span>Clear
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <form action="" method="GET" novalidate="novalidate">
                                                                <input type="hidden" name="dept" value="{{ request('dept') }}">
                                                                <input type="hidden" name="status" value="{{ request('status') }}">
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
                                                                <input type="hidden" name="dept" value="{{ request('dept') }}">
                                                                <input type="hidden" name="status" value="{{ request('status') }}">
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
                                            <th style="font-size: 14px; width: 40px" class="py-2 my-2"> PO </th>
                                            <th style="font-size: 14px; width: 40px" class="py-2 my-2"> 
                                                <div class="dropdown">
                                                    <a class="absolute text-dark text-decoration-none dropdown-toggle"
                                                        href="#" role="button" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        STS
                                                    </a>
                                                    <ul class="dropdown-menu">
                                          <li>
                                            <a href="/kadept/kadeptmr"
                                                class="dropdown-item ">
                                                <span
                                                    class="material-symbols-outlined align-middle px-2"
                                                    style="font-size: 20px">
                                                    clear_all
                                                </span>All Status
                                            </a>
                                        </li>
                                        <li>
                                             <form action="" method="GET"
                                                novalidate="novalidate">
                                                <input type="hidden" name="dept" value="{{ request('dept') }}">
                                                <input type="hidden" name="sort_by" value="{{ request('sort_by') }}">
                                                <input type="hidden" name="status"
                                                    value="Approve">
                                                <button type="submit"
                                                    class="dropdown-item ">
                                                    <span
                                                        class="material-symbols-outlined align-middle px-2"
                                                        style="font-size: 20px">
                                                        check_circle
                                                    </span>Approve
                                                </button>
                                            </form>
                                        </li>
                                        <li>
                                             <form action="" method="GET"
                                                novalidate="novalidate">
                                                <input type="hidden" name="dept" value="{{ request('dept') }}">
                                                <input type="hidden" name="sort_by" value="{{ request('sort_by') }}">
                                                <input type="hidden" name="status"
                                                    value="Waiting List">
                                                <button type="submit"
                                                    class="dropdown-item ">
                                                    <span
                                                        class="material-symbols-outlined align-middle px-2"
                                                        style="font-size: 20px">
                                                        hourglass_top
                                                    </span>Waiting List
                                                </button>
                                            </form>
                                        </li>
                                        <li>
                                             <form action="" method="GET"
                                                novalidate="novalidate">
                                                <input type="hidden" name="dept" value="{{ request('dept') }}">
                                                <input type="hidden" name="sort_by" value="{{ request('sort_by') }}">
                                                <input type="hidden" name="status"
                                                    value="Waiting">
                                                <button type="submit"
                                                    class="dropdown-item ">
                                                    <span
                                                        class="material-symbols-outlined align-middle px-2"
                                                        style="font-size: 20px">
                                                        error
                                                    </span>Waiting
                                                </button>
                                            </form>
                                        </li>
                                        <li>
                                             <form action="" method="GET"
                                                novalidate="novalidate">
                                                <input type="hidden" name="dept" value="{{ request('dept') }}">
                                                <input type="hidden" name="sort_by" value="{{ request('sort_by') }}">
                                                <input type="hidden" name="status"
                                                    value="Declined">
                                                <button type="submit"
                                                    class="dropdown-item ">
                                                    <span
                                                        class="material-symbols-outlined align-middle px-2"
                                                        style="font-size: 20px">
                                                        cancel
                                                    </span>Declined
                                                </button>
                                            </form>
                                        </li>

                                    </ul>
                                                </div>
                                            </th>
                                            <th style="font-size: 14px; width: 40px" class="py-2 my-2"> 
                                                <div class="dropdown">
                                                    <a class="absolute text-dark text-decoration-none dropdown-toggle"
                                                        href="#" role="button" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        Dept
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                   <li>
                                                    <a href="/kadept/kadeptmr"
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
                                                            <input type="hidden" name="status" value="{{ request('status') }}">
                                                            <input type="hidden" name="sort_by" value="{{ request('sort_by') }}">
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
                                                            <input type="hidden" name="status" value="{{ request('status') }}">
                                                            <input type="hidden" name="sort_by" value="{{ request('sort_by') }}">
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
                                                            <input type="hidden" name="status" value="{{ request('status') }}">
                                                            <input type="hidden" name="sort_by" value="{{ request('sort_by') }}">
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
                                                            <input type="hidden" name="status" value="{{ request('status') }}">
                                                            <input type="hidden" name="sort_by" value="{{ request('sort_by') }}">
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
                                                            <input type="hidden" name="status" value="{{ request('status') }}">
                                                            <input type="hidden" name="sort_by" value="{{ request('sort_by') }}">
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
                                                            <input type="hidden" name="status" value="{{ request('status') }}">
                                                            <input type="hidden" name="sort_by" value="{{ request('sort_by') }}">
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
                                                </ul>
                                                </div>
                                            </th>
                                            <th style="font-size: 14px" class="py-2 my-2"> ETA </th>
                                            <th style="font-size: 14px" class="py-2 my-2"> Item </th>
                                            <th style="font-size: 14px" class="py-2 my-2"> Specs </th>
                                            <th style="font-size: 14px" class="py-2 my-2"> Size </th>
                                            <th style="font-size: 14px" class="py-2 my-2"> QTY </th>
                                               <th style="font-size: 14px" class="py-2 my-2"> JOB </th>
                                               <th style="font-size: 14px" class="py-2 my-2"> Created </th>
                                            <th style="font-size: 14px" class="py-2 my-2"> Action </th>
                                        </tr>
                                    </thead>
                                    <tbody id="pricelistTableBody">
                                         <style>
                                            .ellipsis {
                                              white-space: nowrap;
                                              overflow: hidden;
                                              text-overflow: ellipsis;
                                              max-width: 30ch; /* Atau sesuaikan dengan ukuran yang Anda inginkan */
                                            }
                                          </style>
                                        @foreach ($materialrequests as $user)
                                           @if ($user->status == 'Waiting' && $user->dept == auth()->user()->departement)
                                               <tr>
                                                <div class="table-responsive">
                                                    <style>
                                                        td.sticky {
                                                            position: sticky;
                                                            left: 0;
                                                            background-color: #ffffff;
                                                        }
                                                    </style>
                                                    @php
                                                        $itemArray = json_decode($user->item, true);
                                                        $etaArray = json_decode($user->etauser, true);
                                                        $specsArray = json_decode($user->specs, true);
                                                        $sizeArray = json_decode($user->size, true);
                                                        $qtyArray = json_decode($user->qty, true);
                                                        $kosong3Array = json_decode($user->kosong3, true);
                                                        // Mengambil item pertama dari masing-masing kolom
                                                        $firstItem = reset($itemArray);
                                                        $firstSpecs = reset($specsArray);
                                                        $firstSize = reset($sizeArray);
                                                        $firstQty = reset($qtyArray);
                                                        $firstUnit = reset($kosong3Array);
                                                        $firstEtauser = reset($etaArray);
                                                    @endphp
                                                    <td style="padding-top: 3px; padding-bottom:3px;" class="sticky">
                                                        0{{ $user->id }}</td>
                                                       <td style="padding-top: 3px; padding-bottom:3px;" class="">
                                                        @if($user->idpo)
                                                            <a class="text-dark" style="" href="{{ route('mr.idpo', $user->idpo) }}">{{ $user->idpo }}</a>
                                                        @else
                                                            {{ $user->idpo }}
                                                        @endif
                                                    </td>
                                                    <td style="padding-top: 3px; padding-bottom:3px;" class="">
                                                        @if ($user->status == 'Approve')
                                                            <span class="material-symbols-outlined text-success" style='font-size:18px'>
                                                                check_circle
                                                            </span>
                                                        @elseif ($user->status == 'Approve CEO')
                                                            <span class="material-symbols-outlined text-success" style='font-size:18px'>
                                                                check_circle
                                                            </span>
                                                        @elseif ($user->status == 'Approve GM')
                                                            <span class="material-symbols-outlined text-success" style='font-size:18px'>
                                                                check_circle
                                                            </span>
                                                        @elseif ($user->status == 'Approve Safira')
                                                            <span class="material-symbols-outlined text-success" style='font-size:18px'>
                                                                check_circle
                                                            </span>
                                                        @elseif ($user->status == 'Approve Stephanie')
                                                            <span class="material-symbols-outlined text-success" style='font-size:18px'>
                                                                check_circle
                                                            </span>
                                                        @elseif ($user->status == 'Waiting List')
                                                            <span class="material-symbols-outlined text-primary" style='font-size:18px'>
                                                                hourglass_top
                                                            </span>
                                                        @elseif ($user->status == 'Waiting')
                                                            <span class="material-symbols-outlined text-warning" style='font-size:18px'>
                                                                error
                                                            </span>
                                                        @elseif ($user->status == 'Declined')
                                                            <span class="material-symbols-outlined text-danger" style='font-size:18px'>
                                                                cancel
                                                            </span>
                                                        @else
                                                        @endif
                                                    </td>
                                                    <td style="padding-top: 3px; padding-bottom:3px;" class="">
                                                        @if ($user->dept == 'FA & TAX')
                                                            <span class="material-symbols-outlined text-dark align-middle" style='font-size:18px'>
                                                                payments
                                                            </span> {{ $user->created }}
                                                        @elseif ($user->dept == 'HRGA')
                                                            <span class="material-symbols-outlined text-dark align-middle" style='font-size:18px'>
                                                                group
                                                            </span> {{ $user->created }}
                                                        @elseif ($user->dept == 'Prodev')
                                                            <span class="material-symbols-outlined text-dark align-middle" style='font-size:18px'>
                                                                Inventory
                                                            </span> {{ $user->created }}
                                                        @elseif ($user->dept == 'Produksi')
                                                            <span class="material-symbols-outlined text-dark align-middle" style='font-size:18px'>
                                                                Factory
                                                            </span> {{ $user->created }}
                                                        @elseif ($user->dept == 'PPIC SM')
                                                            <span class="material-symbols-outlined text-dark align-middle" style='font-size:18px'>
                                                                support
                                                            </span> {{ $user->created }}
                                                        @elseif ($user->dept == 'PPIC RM')
                                                            <span class="material-symbols-outlined text-dark align-middle" style='font-size:18px'>
                                                                quick_reference
                                                            </span> {{ $user->created }}
                                                        @else
                                                        @endif
                                                    </td>
                                                    <td style="padding-top: 3px; padding-bottom:3px;" class="">
                                                        {{ \Carbon\Carbon::parse($firstEtauser)->format('j M y') }}</td>
                                                    <td style="padding-top: 3px; padding-bottom:3px;" class="">
                                                        {{ $firstItem }}</td>
                                                    <td style="padding-top: 3px; padding-bottom:3px;" class="ellipsis">
                                                        {{ $firstSpecs }}</td>
                                                    <td style="padding-top: 3px; padding-bottom:3px;" class="">
                                                        {{ $firstSize }}</td>
                                                    <td style="padding-top: 3px; padding-bottom:3px;" class="">
                                                        {{ $firstQty }}&nbsp;{{ $firstUnit }}</td>
                                                    <td style="padding-top: 3px; padding-bottom:3px;" class="">
                                                        {{ $user->kosong1}} </td>
                                                    <td style="padding-top: 3px; padding-bottom:3px;" class="">
                                                        {{ \Carbon\Carbon::parse($user->created_at)->format('j M y') }}</td>
                                                    <td style="padding-top: 3px; padding-bottom:3px;" class="d-flex ">
                                                        <div class="dropdown">
                                                            <a class="btn btn-sm btn-gradient-info dropdown-toggle" href="#" role="button"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                Manage
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" href="" data-bs-toggle="modal"
                                                                        data-bs-target="#exampleModalToggleDetail{{ $user->id }}">Approve / Detail</a></li>
                                                                <li><a class="dropdown-item" href="{{ route('kadeptmr.edit', $user->id) }}">Edit</a></li>
                                                                <!--<li><button class="dropdown-item" data-bs-toggle="modal"-->
                                                                <!--        data-bs-target="#editStatusModal{{ $user->id }}">Approve</button></li>-->
                                                            </ul>
                                                        </div>
                                                    </td>
                                            </tr>
                                            <div class="modal fade" id="editStatusModal{{ $user->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="editStatusModalLabel{{ $user->id }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editStatusModalLabel{{ $user->id }}">Approval
                                                    </h5>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Form untuk mengedit status -->
                                                    @if ($user->status == 'Approve')
                                                        {{-- Cek status sebelumnya --}}
                                                        <p>MR sudah Approve/Declined sebelumnya.</p>
                                                    @elseif ($user->status == 'Declined')
                                                        {{-- Cek status sebelumnya --}}
                                                        <p>MR sudah Approve/Declined sebelumnya.</p>
                                                    @else
                                                        <form action="{{ route('update_statuskadept', $user->id) }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="">
                                                                {{-- Radio buttons untuk mengubah status --}}
                                                            
                    
                                                                <h5>Approve MR</h5>
                                                                <label class="btn btn-success ">
                                                                    <input type="radio" value="Waiting List" id="newStatus" name="newStatus">
                                                                    Approve
                                                                </label>
                                                                <hr>
                                                                <h5>Declined MR</h5>
                                                                <label class="btn btn-danger ">
                                                                    <input type="radio" value="Declined" id="newStatus" name="newStatus" required/>
                                                                    Declined
                                                                </label>
                                                                
                                                            </div>
                                                            <hr>
                                                                <input name="approvalkadept_at" type="hidden" id="dateInput">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save
                                                                changes</button>
                    
                                                            <script>
                                                            document.addEventListener("DOMContentLoaded", function() {
                                                              // Mendapatkan elemen input
                                                              var dateInput = document.getElementById("dateInput");
                                                            
                                                              // Mendapatkan tanggal sekarang
                                                              var currentDate = new Date();
                                                            
                                                              // Format tanggal menjadi YYYY-MM-DD (format yang diterima oleh elemen input type="date")
                                                              var formattedDate = currentDate.toISOString().substr(0, 10);
                                                            
                                                              // Mengatur nilai input menjadi tanggal sekarang
                                                              dateInput.value = formattedDate;
                                                            });
                                                            </script>
                                                        </form>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        @elseif ($user->status != 'Waiting')
                                         <tr>
                                                <div class="table-responsive">
                                                    <style>
                                                        td.sticky {
                                                            position: sticky;
                                                            left: 0;
                                                            background-color: #ffffff;
                                                        }
                                                    </style>
                                                    @php
                                                        $itemArray = json_decode($user->item, true);
                                                        $etaArray = json_decode($user->etauser, true);
                                                        $specsArray = json_decode($user->specs, true);
                                                        $sizeArray = json_decode($user->size, true);
                                                        $qtyArray = json_decode($user->qty, true);
                                                        $kosong3Array = json_decode($user->kosong3, true);
                                                        // Mengambil item pertama dari masing-masing kolom
                                                        $firstItem = reset($itemArray);
                                                        $firstSpecs = reset($specsArray);
                                                        $firstSize = reset($sizeArray);
                                                        $firstQty = reset($qtyArray);
                                                        $firstUnit = reset($kosong3Array);
                                                        $firstEtauser = reset($etaArray);
                                                    @endphp
                                        
                                                    <td style="padding-top: 3px; padding-bottom:3px;" class="sticky">
                                                        0{{ $user->id }}</td>
                                                       <td style="padding-top: 3px; padding-bottom:3px;" class="">
                                                        @if($user->idpo)
                                                            <a class="text-dark" style="" href="{{ route('mr.idpo', $user->idpo) }}">{{ $user->idpo }}</a>
                                                        @else
                                                            {{ $user->idpo }}
                                                        @endif
                                                    </td>
                                                    <td style="padding-top: 3px; padding-bottom:3px;" class="">
                                                        @if ($user->status == 'Approve')
                                                            <span class="material-symbols-outlined text-success" style='font-size:18px'>
                                                                check_circle
                                                            </span>
                                                        @elseif ($user->status == 'Approve CEO')
                                                            <span class="material-symbols-outlined text-success" style='font-size:18px'>
                                                                check_circle
                                                            </span>
                                                        @elseif ($user->status == 'Approve GM')
                                                            <span class="material-symbols-outlined text-success" style='font-size:18px'>
                                                                check_circle
                                                            </span>
                                                        @elseif ($user->status == 'Approve Safira')
                                                            <span class="material-symbols-outlined text-success" style='font-size:18px'>
                                                                check_circle
                                                            </span>
                                                        @elseif ($user->status == 'Approve Stephanie')
                                                            <span class="material-symbols-outlined text-success" style='font-size:18px'>
                                                                check_circle
                                                            </span>
                                                        @elseif ($user->status == 'Waiting List')
                                                            <span class="material-symbols-outlined text-primary" style='font-size:18px'>
                                                                hourglass_top
                                                            </span>
                                                        @elseif ($user->status == 'Waiting')
                                                            <span class="material-symbols-outlined text-warning" style='font-size:18px'>
                                                                error
                                                            </span>
                                                        @elseif ($user->status == 'Declined')
                                                            <span class="material-symbols-outlined text-danger" style='font-size:18px'>
                                                                cancel
                                                            </span>
                                                        @elseif ($user->status == 'Edit')
                                                            <span class="material-symbols-outlined text-dark" style='font-size:18px'>
                                                                edit
                                                            </span>
                                                        @else
                                                        @endif
                                                    </td>
                                                    <td style="padding-top: 3px; padding-bottom:3px;" class="">
                                                        @if ($user->dept == 'FA & TAX')
                                                            <span class="material-symbols-outlined text-dark align-middle" style='font-size:18px'>
                                                                payments
                                                            </span> {{ $user->created }}
                                                        @elseif ($user->dept == 'HRGA')
                                                            <span class="material-symbols-outlined text-dark align-middle" style='font-size:18px'>
                                                                group
                                                            </span> {{ $user->created }}
                                                        @elseif ($user->dept == 'Prodev')
                                                            <span class="material-symbols-outlined text-dark align-middle" style='font-size:18px'>
                                                                Inventory
                                                            </span> {{ $user->created }}
                                                        @elseif ($user->dept == 'Produksi')
                                                            <span class="material-symbols-outlined text-dark align-middle" style='font-size:18px'>
                                                                Factory
                                                            </span> {{ $user->created }}
                                                        @elseif ($user->dept == 'PPIC SM')
                                                            <span class="material-symbols-outlined text-dark align-middle" style='font-size:18px'>
                                                                support
                                                            </span> {{ $user->created }}
                                                        @elseif ($user->dept == 'PPIC RM')
                                                            <span class="material-symbols-outlined text-dark align-middle" style='font-size:18px'>
                                                                quick_reference
                                                            </span> {{ $user->created }}
                                                        @else
                                                        @endif
                                                    </td>
                                                    <td style="padding-top: 3px; padding-bottom:3px;" class="">
                                                        {{ \Carbon\Carbon::parse($firstEtauser)->format('j M y') }}</td>
                                                    <td style="padding-top: 3px; padding-bottom:3px;" class="">
                                                        {{ $firstItem }}</td>
                                                    <td style="padding-top: 3px; padding-bottom:3px;" class="ellipsis">
                                                        {{ $firstSpecs }}</td>
                                                    <td style="padding-top: 3px; padding-bottom:3px;" class="">
                                                        {{ $firstSize }}</td>
                                                    <td style="padding-top: 3px; padding-bottom:3px;" class="">
                                                        {{ $firstQty }}&nbsp;{{ $firstUnit }}</td>
                                                    <td style="padding-top: 3px; padding-bottom:3px;" class="">
                                                        {{ $user->kosong1}} </td>
                                                    <td style="padding-top: 3px; padding-bottom:3px;" class="">
                                                        {{ \Carbon\Carbon::parse($user->created_at)->format('j M y') }}</td>
                                                    <td style="padding-top: 3px; padding-bottom:3px;" class="d-flex ">
                                                        <div class="dropdown">
                                                            <a class="btn btn-sm btn-gradient-info dropdown-toggle" href="#" role="button"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                Manage
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" href="" data-bs-toggle="modal"
                                                                        data-bs-target="#exampleModalToggleDetail{{ $user->id }}">Detail</a></li>
                                                                @if($user->dept == auth()->user()->departement && $user->status == "edit")
                                                                <li><a class="dropdown-item" href="{{ route('kadeptmr.edit', $user->id) }}">Edit</a></li>
                                                                @elseif($user->dept == auth()->user()->departement && $user->status == "Waiting List")
                                                                <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editStatusModalreq{{ $user->id }}">Req Edit</button></li>
                                                                @endif
                                                            </ul>
                                                        </div>
                                                    </td>
                                            </tr>
                                            <div class="modal fade" id="editStatusModal{{ $user->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="editStatusModalLabel{{ $user->id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editStatusModalLabel{{ $user->id }}">Approval
                                </h5>
                            </div>
                            <div class="modal-body">
                                <!-- Form untuk mengedit status -->
                                @if ($user->status == 'Approve')
                                    {{-- Cek status sebelumnya --}}
                                    <p>MR sudah Approve/Declined sebelumnya.</p>
                                @elseif ($user->status == 'Declined')
                                    {{-- Cek status sebelumnya --}}
                                    <p>MR sudah Approve/Declined sebelumnya.</p>
                                @else
                                    <form action="{{ route('update_statuskadept', $user->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="">
                                            {{-- Radio buttons untuk mengubah status --}}


                                            <h5>Approve MR</h5>
                                            <label class="btn btn-success ">
                                                <input type="radio" value="Waiting List" id="newStatus" name="newStatus" required/>
                                                Approve
                                            </label>
                                            <hr>
                                            <h5>Declined MR</h5>
                                            <label class="btn btn-danger ">
                                                <input type="radio" value="Declined" id="newStatus" name="newStatus" required/>
                                                Declined
                                            </label>
                                        </div>
                                        <hr>
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save
                                            changes</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                                            <div class="modal fade" id="editStatusModalreq{{ $user->id }}" tabindex="-1" role="dialog"
                                                aria-labelledby="editStatusModalLabel{{ $user->id }}" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editStatusModalLabel{{ $user->id }}">Send Request
                                                            </h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Form untuk mengedit status -->
                                                            @if ($user->status == 'Approve')
                                                                {{-- Cek status sebelumnya --}}
                                                                <p>MR sudah Approve/Declined sebelumnya.</p>
                                                            @elseif ($user->status == 'Declined')
                                                                {{-- Cek status sebelumnya --}}
                                                                <p>MR sudah Approve/Declined sebelumnya.</p>
                                                            @else
                                                                <form action="{{ route('update_statuskadept', $user->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="">
                                                                        {{-- Radio buttons untuk mengubah status --}}
                                                                        <h5>Request Edit</h5>
                                                                        <label class="btn btn-success ">
                                                                            <input type="radio" value="Edit" id="newStatus" name="newStatus" required/>
                                                                            Request
                                                                        </label>
                                                                        
                                                                    </div>
                                                                     <div class="mb-4 py-3">
                                                                        <p for="note" class="form-label fw-bold">Note Edit</p>
                                                                        <textarea class="form-control" id="requestedit" name="requestedit" rows="3"></textarea>
                                                                    </div>
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Save
                                                                        changes</button>
                                                                </form>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @endforeach
                                    </tbody>
                                   

                                </table>
                                <div class="pt-2">
                                    {{ $materialrequests->appends(request()->query())->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        
              <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

@endsection
