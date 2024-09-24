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
            
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        

            <div class="row ">
                <div class="col-12 stretch-card grid-margin">
                    <div class="card border rounded">
                        <div class="card-body shadow  border rounded">
                            <h4 class="card-title mb-3">Form Arrival Items</h4>
                            <form class="form-sample" method="POST" action="{{ route('arrivalpurchasing.update', $arrival->id) }}"  id="pricelistForm">
                                @method('PUT')
                                @csrf
                                    @php
                                        $qty = json_decode($arrival->arrivalqty);
                                        $date = json_decode($arrival->arrivaldate);
                                        $combinedData = array_map(null, $qty, $date);
                                    @endphp
                                    @foreach ($combinedData as $data)
                                <div class="row stretch-card grid-margin shadow" style="background-color: #f1f1f6">
                                    <div class="col-md mt-3">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Arrival Qty</label>
                                            <input type="text" class="form-control form-control-sm " name="arrivalqty[]" value='{{$data[0]}}'>
                                        </div>
                                    </div>      
                                    <div class="col-md mt-3">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Arrival Date</label>
                                            <input type="date" class="form-control form-control-sm " name="arrivaldate[]" value='{{$data[1]}}'>
                                        </div>
                                    </div>   
                                    
                                </div>
                                    @endforeach
                                       <input type="hidden" class="form-control form-control-sm " name="item" value='{{$arrival->item}}' oninput="updateInput()">
                                        <input type="hidden" name="qty" id="input1" required />
                                <div class="row stretch-card grid-margin shadow" style="background-color: #f1f1f6">
                                    <div class="col-md mt-3">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Arrival Qty</label>
                                            <input type="text" class="form-control form-control-sm " name="arrivalqty[]"  oninput="updateInput()">
                                        </div>
                                    </div>      
                                    <div class="col-md mt-3">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Arrival Date</label>
                                            <input type="date" class="form-control form-control-sm " name="arrivaldate[]">
                                        </div>
                                    </div>   
                         
                                    
                                </div>
                                
                         
                                <div>
                                    <button type="submit" class="btn-rounded btn btn-gradient-info float-end mt-2">
                                        Submit
                                    </button>
                                </div>
                                <!-- Add this modal at the bottom of your Blade file -->
                             

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
         <script>
        function updateInput() {
            // Mendapatkan nilai dari ketiga input arrivalqty
            var arrivalQtyInputs = document.getElementsByName('arrivalqty[]');
            var totalQty = 0;

            for (var i = 0; i < arrivalQtyInputs.length; i++) {
                var inputVal = parseFloat(arrivalQtyInputs[i].value) || 0;
                totalQty += inputVal;
            }

            // Mengatur nilai input qty dengan totalQty
            document.getElementById('input1').value = totalQty;
        }
    </script>
@endsection
