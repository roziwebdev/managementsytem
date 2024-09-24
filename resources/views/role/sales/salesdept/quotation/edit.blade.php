@extends('role.purchasing.layoutsmrdept.main')
@section('main-container')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
<div class="main-panel">
    <div class=" content-wrapper" style="background-color: #f6f6fb">
        <div class="row" id='row'>
            <div class="col-12 stretch-card grid-margin" id="myForm">
                <div class="border rounded card">
                    <div class="border rounded shadow card-body">
                        <h4 class="mb-3 card-title">Form Edit Quotation</h4>
                        <form class="form-sample" method="POST" action="{{ route('quotation.update', $quotation->id) }}"
                            id="pricelistForm">
                            @method('PUT')
                            @csrf
                            @php
                            $products = json_decode($quotation->product);
                            $materials = json_decode($quotation->material);
                            $sizes = json_decode($quotation->size);
                            $specs = json_decode($quotation->specs);
                            $qtys = json_decode($quotation->qty);
                            $units = json_decode($quotation->unit);
                            $prices = json_decode($quotation->price);
                            $statusitem = json_decode($quotation->statusitem);
                            $noteitem = json_decode($quotation->noteitem);
                            $qty2s = json_decode($quotation->qty2);
                            $price2s = json_decode($quotation->price2);
                            $qty3s = json_decode($quotation->qty3);
                            $price3s = json_decode($quotation->price3);

                            $combinedData = array_map(null, $products, $materials, $sizes, $specs, $qtys, $units, $prices, $statusitem, $noteitem, $qty2s, $price2s, $qty3s, $price3s);
                            @endphp
                            @foreach ($combinedData as $data )
                            <div id='row2'>
                                <div class="shadow row" style="background-color: #f1f1f6">
                                    <div class="mt-3 col-md ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Product</label>
                                            <textarea class="form-control clickable rounded-3 shadow-sm"
                                                name="product[]" required>{{$data[0]}}</textarea>
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Material</label>
                                            <textarea class="form-control clickable rounded-3 shadow-sm"
                                                name="material[]" required>{{$data[1]}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="shadow row" style="background-color: #f1f1f6">
                                    <div class="mt-3 col-md ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Size</label>
                                            <textarea class="form-control clickable rounded-3 shadow-sm" name="size[]"
                                                required>{{$data[2]}}</textarea>
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Specs</label>
                                            <textarea class="form-control clickable rounded-3 shadow-sm" name="specs[]"
                                                required>{{$data[3]}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="shadow  row" style="background-color: #f1f1f6">
                                    <div class="mt-3 col-md ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Quantity</label>
                                            <textarea class="form-control clickable rounded-3 shadow-sm" name="qty[]"
                                                required>{{$data[4]}}</textarea>
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Price</label>
                                            <textarea class="form-control clickable rounded-3 shadow-sm" name="price[]"
                                                required>{{$data[6]}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="shadow  row" style="background-color: #f1f1f6">
                                    <div class="mt-3 col-md ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Quantity Nego 2</label>
                                            <textarea class="form-control clickable rounded-3 shadow-sm" name="qty2[]"
                                                required>{{$data[9]}}</textarea>
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Price Nego 2</label>
                                            <textarea class="form-control clickable rounded-3 shadow-sm" name="price2[]"
                                                required>{{$data[10]}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="shadow  row" style="background-color: #f1f1f6">
                                    <div class="mt-3 col-md ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Quantity Nego 3</label>
                                            <textarea class="form-control clickable rounded-3 shadow-sm" name="qty3[]"
                                                required>{{$data[11]}}</textarea>
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Price Nego 3</label>
                                            <textarea class="form-control clickable rounded-3 shadow-sm" name="price3[]"
                                                required>{{$data[12]}}</textarea>
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="shadow  row" style="background-color: #f1f1f6">
                                    <div class="mt-3 col-md ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Status</label>
                                            <select class="form-select rounded-3 shadow-sm" name="statusitem[]">
                                                <option value="{{ $data[7] }}">{{ $data[7] }}</option>
                                                <option value="OK">OK</option>
                                                <option value="OK PO">OK PO</option>
                                                <option value="NOT OK">NOT OK</option>
                                                <option value="PROGRESS">PROGRESS</option>
                                                <option value="NEGO">NEGO</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md ">
                                         <div class="mb-3" style="font-size: 14px">
                                             <label for="" class="form-label fw-bold">No PO</label>
                                             <input class="form-control form-control-sm rounded-3 shadow-sm" name="po[]" value="" />
                                         </div>
                                     </div>
                                    
                                </div>
                                
                                <div class="shadow stretch-card grid-margin row" style="background-color: #f1f1f6">
                                    <div class="mt-3 col-md ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Remarks</label>
                                            <input class="form-control form-control-sm rounded-3 shadow-sm" name="noteitem[]" value="{{$data[8]}}" />
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Unit</label>
                                            <select class="form-select rounded-3 shadow-sm" name="unit[]">
                                                <option value="{{ $data[5] }}">{{ $data[5] }}</option>
                                                <option value="PCS">PCS</option>
                                                <option value="SET">SET</option>
                                                <option value="LEMBAR">LEMBAR</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            @endforeach
                            <div>
                                <button type="submit" class="mt-2 btn-rounded btn btn-gradient-info float-end">
                                    Submit
                                </button>
                            </div>
                            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        let counter2 = 1;
                                    function handleRemoveItem2(id) {
                                        $(`#row2${id}`).remove();
                                    }
                                    function updateResult1(id) {
                                    var input1 = parseFloat($(`#input1111${id}`).val()) || 0;
                                    var input2 = parseFloat($(`#input2222${id}`).val()) || 0;
                                    console.log("Input 111:", input1);
                                    console.log("Input 222:", input2);
                                    var result = input1 * input2;
                                    console.log("Result:", result);
                                    $(`#result1${id}`).val(result);
                                    }
                                    $("#rowAdder2").click(function() {
                                        newRowAdd2 = `
                                                   <div id='row2${counter2}' class="pt-2">
                                                    <div class="shadow  row" style="background-color: #f1f1f6">
                                                        <div class="mt-3 col-md ">
                                                            <div class="mb-3" style="font-size: 14px">
                                                                <label for="" class="form-label fw-bold">Product</label>
                                                                <textarea class="form-control clickable rounded-3 shadow-sm" name="product[]" required></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="mt-3 col-md ">
                                                            <div class="mb-3" style="font-size: 14px">
                                                                <label for="" class="form-label fw-bold">Material</label>
                                                                <textarea class="form-control clickable rounded-3 shadow-sm" name="material[]" required></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="shadow row" style="background-color: #f1f1f6">
                                                        <div class="mt-3 col-md ">
                                                            <div class="mb-3" style="font-size: 14px">
                                                                <label for="" class="form-label fw-bold">Size</label>
                                                                <textarea class="form-control clickable rounded-3 shadow-sm" name="size[]" required></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="mt-3 col-md ">
                                                            <div class="mb-3" style="font-size: 14px">
                                                                <label for="" class="form-label fw-bold">Specs</label>
                                                                <textarea class="form-control clickable rounded-3 shadow-sm" name="specs[]" required></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="shadow row" style="background-color: #f1f1f6">
                                                        <div class="mt-3 col-md ">
                                                            <div class="mb-3" style="font-size: 14px">
                                                                <label for="" class="form-label fw-bold">Quantity</label>
                                                                <textarea class="form-control clickable rounded-3 shadow-sm" name="qty[]" required></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="mt-3 col-md ">
                                                            <div class="mb-3" style="font-size: 14px">
                                                                <label for="" class="form-label fw-bold">Price</label>
                                                                <textarea class="form-control clickable rounded-3 shadow-sm" name="price[]" required></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="shadow stretch-card grid-margin row" style="background-color: #f1f1f6">
                                                        <div class="mt-3 col-md ">
                                                            <div class="mb-3 d-flex" style="font-size: 14px">
                                                                <label for="" class="form-label fw-bold">Unit</label>
                                                                <div class=" pt-4 form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="unit[]" id="inlineRadio1" value="PCS">
                                                                    <label class="form-check-label" for="inlineRadio1">PCS</label>
                                                                </div>
                                                                <div class=" pt-4 px-4 form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="unit[]" id="inlineRadio2" value="SET">
                                                                    <label class="form-check-label" for="inlineRadio2">SET</label>
                                                                </div>
                                                                <div class=" pt-4 px-4 form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="unit[]" id="inlineRadio2" value="LEMBAR">
                                                                    <label class="form-check-label" for="inlineRadio2">LEMBAR</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col pt-4">
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
        // Mendapatkan semua elemen input
                var allInputs = document.querySelectorAll('.form-control');
                // Menambahkan event listener untuk setiap elemen
                allInputs.forEach(function(input) {
                    input.addEventListener('input', function() {
                        // Menetapkan nilai input 1 dengan nilai dari input yang sedang diedit
                        document.getElementById('inputpreview').value = input.value;
                    });

                    if (input.classList.contains('clickable')) {
                        input.addEventListener('click', function() {
                            // Menetapkan nilai input 1 dengan nilai dari input yang diklik
                            document.getElementById('inputpreview').value = input.value;
                        });
                    }
                });
    </script>





    @endsection