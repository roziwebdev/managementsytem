@extends('role.purchasing.layoutsmrdept.main')
@section('main-container')

<link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
        
           <div class="modal fade" id="editStatusModal"
                                                    tabindex="-1" role="dialog"
                                                    aria-labelledby="editStatusModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h3 class="modal-title"
                                                                    id="editStatusModalLabel">
                                                                    Close Item
                                                                </h3>
                                                            </div>
                                                            <div class="modal-body">
                                                                    <p>Items sudah Close</p>
                                                               
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                        @php
                                                            $etausers = json_decode($materialrequest->etauser);
                                                            $items = json_decode($materialrequest->item);
                                                            $sizes = json_decode($materialrequest->size);
                                                            $specs = json_decode($materialrequest->specs);
                                                            $qtys = json_decode($materialrequest->qty);
                                                            $units = json_decode($materialrequest->unit);
                                                            $prices = json_decode($materialrequest->price);
                                                            
                                                            // Gabungkan semua data menjadi satu array dengan zip
                                                            $combinedData = array_map(null, $etausers, $items, $sizes, $specs, $qtys, $units, $prices);
                                                        @endphp
        
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
            
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        

            <div class="row ">
                <div class="col-12 stretch-card grid-margin">
                    <div class="card border rounded">
                        <div class="card-body shadow  border rounded">
                            <h4 class="card-title mb-3">Form Arrival Items</h4>
                            <form class="form-sample" method="POST" action="{{ route('arrivalpo.store') }}" enctype="multipart/form-data" id="pricelistForm">
                                @csrf
                                <div class="row stretch-card grid-margin shadow" style="background-color: #f1f1f6">
                                    <input type="hidden" name="status" value='Open' >
                                    <input type="hidden" class="form-control form-control-sm " name="dept" value=' {{ Auth::user()->departement }}' >
                                    <input type="hidden" class="form-control form-control-sm" name="type" value='{{$materialrequest->type}}' required>
                                    <input type="hidden" class="form-control form-control-sm " name="po" value='{{$materialrequest->id}}'required>
                                    <input type="hidden" class="form-control form-control-sm " name="vendor" value='{{$materialrequest->supplier}}'>
                                    <input type="hidden" class="form-control form-control-sm " name="created" value=' {{ Auth::user()->name }}' readonly>
                                    <div class="col-md mt-3">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Lokasi</label>
                                            <input type="text" class="form-control form-control-sm " name="lokasi">
                                        </div>
                                    </div>
                                    <div class="col-md mt-3">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">No SJ</label>
                                            <input type="text" class="form-control form-control-sm " name="nomorsj" required>
                                        </div>
                                    </div>
                                    <div class="col-md mt-3">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Photo SJ</label>
                                            <input type="file" class="form-control form-control-md" name="sjimage" id="sjimage" onchange="checkFile()">
                                        </div>
                                    </div>
                                    <div class="col-md mt-3">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Note SJ <sup class="text-danger">*jika tidak ada foto surat jalan</sup></label>
                                            <input type="text" class="form-control form-control-md" name="notesj" id="notesj" required>
                                        </div>
                                    </div>
                                    
                                    <script>
                                        function checkFile() {
                                            var fileInput = document.getElementById('sjimage');
                                            var noteInput = document.getElementById('notesj');
                                    
                                            if (fileInput.files.length > 0) {
                                                noteInput.removeAttribute('required');
                                            } else {
                                                noteInput.setAttribute('required', 'required');
                                            }
                                        }
                                    </script>
                                </div>
                                <div class="row  shadow" style="background-color: #f1f1f6">
                                          <div class="col-md mt-3">
                                            <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Item</label>
                                            <input type="text" class="form-control form-control-sm " name="item" required list='dataitem'>
                                            <datalist id='dataitem'>
                                                 @foreach ($combinedData as $dataitem)
                                                 <option value='{{$dataitem[1]}}'>{{$dataitem[1]}}</option>
                                                 @endforeach
                                            </datalist>
                                        </div>
                                    </div>      
                                    <div class="col-md mt-3">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Specs</label>
                                        <input type="text" class="form-control form-control-sm" name="specs" id="specs">
                                    </div>
                                </div>
                                <div class="col-md mt-3">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Size</label>
                                        <input type="text" class="form-control form-control-sm" name="size" id="size">
                                    </div>
                                </div>
                                </div>
                                <div class="row  shadow" style="background-color: #f1f1f6">
                                    <input type="hidden" class="form-control form-control-sm " name="qty" id="input1">
                                    <div class="col-md mt-3">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Arrival Qty</label>
                                            <input type="text" class="form-control form-control-sm " name="arrivalqty" id="input2" required oninput="updateInput()" > 
                                        </div>
                                    </div>
                                    <div class="col-md mt-3">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Unit</label>
                                            <input type="text" class="form-control form-control-sm" name="unit" id="unit">
                                        </div>
                                    </div>  
                                    <div class="col-md mt-3">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Remarks</label>
                                            <input type="text" class="form-control form-control-sm " name="remarks" required value="ARRIVAL">
                                        </div>
                                    </div>      
                                    <div class="col-md mt-3">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Arrival Date</label>
                                            <input type="date" class="form-control form-control-sm " name="tanggalbeli" required >
                                        </div>
                                    </div>      
                                
                                   <script>
                                        // Menangani perubahan nilai pada input item
                                        document.querySelector('input[name="item"]').addEventListener('change', function() {
                                            // Ambil nilai yang dipilih
                                            var selectedItem = this.value;
                                    
                                            // Cari data yang sesuai dengan item yang dipilih
                                            var selectedData = {!! json_encode($combinedData) !!}.find(function(data) {
                                                return data[1] === selectedItem;
                                            });
                                    
                                            // Setel nilai pada input specs, size, dan unit berdasarkan data yang ditemukan
                                            if (selectedData) {
                                                document.getElementById('specs').value = selectedData[3];
                                                document.getElementById('size').value = selectedData[2];
                                                document.getElementById('unit').value = selectedData[5];
                                            } else {
                                                // Kosongkan nilai jika tidak ada kecocokan
                                                document.getElementById('specs').value = '';
                                                document.getElementById('size').value = '';
                                                document.getElementById('unit').value = '';
                                            }
                                        });
                                    </script>
                                </div>
                                <div>
                                    <button type="submit" class="btn-rounded btn btn-gradient-info float-end mt-2">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="">
                    <div class="card rounded-xl shadow">
                        <div class="card-body shadow border">
                            <h3 class="text-center pb-3">Purchase Order- {{ $materialrequest->id }}</h3>
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
                                            <th class="text-dark" scope="col">Eta User</th>
                                            <th class="text-dark" scope="col">Item</th>
                                            <th class="text-dark" scope="col">Specs</th>
                                            <th class="text-dark" scope="col">Size</th>
                                            <th class="text-dark" scope="col">Qty</th>
                                            <th class="text-dark" scope="col">Unit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($combinedData as $data)
                                        <tr>
                                            <td>{{ $data[0] }}</td>
                                            <td>{{ $data[1] }}</td>
                                            <td>{{ $data[3] }}</td>
                                            <td>{{ $data[2] }}</td>
                                            <td>{{ $data[4] }}</td>
                                            <td>{{ $data[5] }}</td>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="">
                    <div class="card rounded-xl shadow">
                        <div class="card-body shadow border">
                            <h3 class="text-center pb-3">ARRIVAL PO - {{ $materialrequest->id }}</h3>
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
                                            <th class="text-dark" scope="col">PO</th>
                                            <th class="text-dark" scope="col">Item</th>
                                            <th class="text-dark" scope="col">Specs</th>
                                            <th class="text-dark" scope="col">Size</th>
                                            <th class="text-dark" scope="col">Surat jalan</th>
                                            <th class="text-dark" scope="col">Arrival Qty</th>
                                            <th class="text-dark" scope="col">Arrival Date</th>
                                            <th class="text-dark" scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($arrivals as $arrival)
                                    @if($arrival->po == $materialrequest->id)
                                        <tr>
                                            <td>{{$arrival->po}}</td>
                                            <td>{{$arrival->item}}</td>
                                            <td>{{$arrival->specs}}</td>
                                            <td>{{$arrival->size}}</td>
                                            <td>
                                                <a style='text-decoration:none;' class="text-dark" href="{{ asset('storage/' . $arrival->sjimage) }}" target="_blank">
                                                    <img src="{{ asset('storage/' . $arrival->sjimage) }}" alt="SJ Image">
                                                    <span>{{$arrival->nomorsj}}</span>
                                                </a>
                                            </td>
                                         <td style="padding-top: 3px; padding-bottom:3px;">{{ $arrival->arrivalqty }} {{$arrival->unit}}</td>
                                            <td style="padding-top: 3px; padding-bottom:3px;">{{ \Carbon\Carbon::parse($arrival->tanggalbeli)->format('j M y') }}</td>
                                            @if ($arrival->status == 'Open')
                                            <td><button class='btn btn-info btn-sm'>Open</button></td>
                                            @elseif ($arrival->status == 'Close')
                                            <td><button class='btn btn-success btn-sm' data-bs-toggle="modal" data-bs-target="#editStatusModal">Close</button></td>
                                            @endif
                                        </tr>
                                    @endif
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
          <script>
        function updateInput() {
            // Mendapatkan nilai dari input2 (arrivalqty)
            var input2Value = document.getElementById('input2').value;

            // Mengatur nilai input1 (qty) sesuai dengan nilai input2
            document.getElementById('input1').value = input2Value;
        }

        // Menambahkan fungsi untuk mengatur nilai input1 ke dalam form sebelum submit
        document.querySelector('form').addEventListener('submit', function() {
            var input1Value = document.getElementById('input1').value;
            document.getElementById('input1').setAttribute('value', input1Value);
        });
    </script>
@endsection
