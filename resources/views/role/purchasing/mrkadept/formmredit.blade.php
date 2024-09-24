@extends('role.purchasing.layoutmrkadept.main')
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
                            <h4 class="card-title mb-3">Form Edit Material Request</h4>
                            <form class="form-sample" method="POST" action="{{ route('kadeptmr.update', $user->id) }}"  id="pricelistForm">
                                @method('PUT')
                                @csrf
                                <div class="row stretch-card grid-margin shadow" style="background-color: #f1f1f6">
                                    <div class="col-md mt-3">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold ">Job Num <sup
                                                    class='text-danger'>(Jika kosong isi 0 ) </sup></label>
                                            <input type="text" class="form-control form-control-sm " name="kosong1"
                                                placeholder="Example : 23xxxxxx" required value="{{ $user->kosong1 }}">
                                        </div>
                                    </div>
                                    <div class="col-md mt-3">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Job Prod <sup
                                                    class='text-danger'>(Jika kosong isi - ) </sup></label>
                                            <input type="text" class="form-control form-control-sm " name="job"  value="{{ $user->job }}">
                                        </div>
                                    </div>
                                    <div class="col-md mt-3">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Alamat</label>
                                            <select class="form-select" name="alamat" required>
                                                <option  value="{{ $user->alamat }}"> {{ $user->alamat }}</option>
                                                <option value="JL Mondoroko 14, Singosari">JL Mondoroko 14, Singosari</option>
                                                <option value="JL Imam Bonjol 838 Ardimulyo, Songsong">JL Imam Bonjol 838
                                                    Ardimulyo,
                                                    Songsong</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row  shadow" style="background-color: #f1f1f6">
                                           @php
                                                            $items = json_decode($user->item);
                                                            $specs = json_decode($user->specs);
                                                            $etausers = json_decode($user->etauser);
                                                            $sizes = json_decode($user->size);
                                                            $sisastock = json_decode($user->sisastock);
                                                            $qtys = json_decode($user->qty);
                                                            $lastorder = json_decode($user->lastorder);
                                                            $unit = json_decode($user->kosong3);
                                                            $remarks = json_decode($user->mrdate);
                                                            $arahserat = json_decode($user->arahseratp);
                                                            
                                                            $lastorder = json_decode($user->lastorder);
                                                            $lastpo = json_decode($user->lastpo);
                                                            $lastprice = json_decode($user->lastprice);
                                                            // Gabungkan semua data menjadi satu array dengan zip
                                                            $combinedData = array_map(null, $items, $specs, $etausers, $sizes, $sisastock, $qtys,$lastorder,$unit, $remarks, $arahserat, $lastorder, $lastpo, $lastprice );
                                                        @endphp
                                    @foreach ($combinedData as $index => $data)
                                        <div class="remove-item" id="removeitem_{{ $index }}">
                                            <div id="row" class="col mt-3">
                                                <div class="mb-3" style="font-size: 14px">
                                                    <label for="" class="form-label fw-bold">Item</label>
                                                    <input type="text" id="searchitem" placeholder="Item" list="items"
                                                        name="item[]" required class="form-control form-control-sm" required value="{{ $data[0] }}">
                                                    <datalist id="items">
                                                        @foreach ($item as $datas)
                                                            <option>{{ $datas->item }}</option>
                                                        @endforeach
                                                    </datalist>
                                                </div>
                                                 <div class="row " style="background-color: #f1f1f6">
                                                    <div class="col-md">
                                                        <div class="mb-3" style="font-size: 14px">
                                                            <label for="" class="form-label">Specs</label>
                                                            <input type="text" class="form-control form-control-sm " name="specs[]" value="{{  $data[1]  }}" required>
                                                            <input type="hidden" class="form-control form-control-sm " name="lastorder[]" value="{{  $data[10]  }}" required>
                                                            <input type="hidden" class="form-control form-control-sm " name="lastpo[]" value="{{  $data[11]  }}" required>
                                                            <input type="hidden" class="form-control form-control-sm " name="lastprice[]" value="{{  $data[12]  }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="mb-3" style="font-size: 14px">
                                                            <label for="" class="form-label">Size</label>
                                                            <input type="text" class="form-control form-control-sm " name="size[]" value="{{  $data[3]  }}" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row " style="background-color: #f1f1f6">
                                                    <div class="col-md">
                                                        <div class="mb-3" style="font-size: 14px">
                                                            <label for="" class="form-label">Qty</label>
                                                            <input type="text" class="form-control form-control-sm " name="qty[]" value="{{  $data[5]  }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="mb-3" style="font-size: 14px">
                                                            <label for="" class="form-label">Sisa Stock</label>
                                                            <input type="number" class="form-control form-control-sm " name="sisastock[]" required value="{{ $data[4] }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="mb-3" style="font-size: 14px">
                                                            <label for="" class="form-label ">Unit</label>
                                                            <input type="text" class="form-control form-control-sm " name="kosong3[]" value="{{ $data[7] }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="mb-3" style="font-size: 14px">
                                                            <label for="" class="form-label">Serat</label>
                                                            <input type="text" class="form-control form-control-sm " name="arahseratp[]" value="{{ $data[9] }}" list='serat1' required >
                                                            <datalist id="serat1">
                                                                <option value="	&harr;">
                                                                <option value="	&#8597;">
                                                            </datalist>
                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="mb-3" style="font-size: 14px">
                                                            <label for="" class="form-label">Eta User</label>
                                                            <input type="date" class="form-control form-control-sm" name="etauser[]" required value="{{ $data[2] }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row " style="background-color: #f1f1f6">
                                                    <div class="col mb-3" style="font-size:14px">
                                                        <label class="form-label">Remark</label>
                                                        <input class="form-control form-control-sm" name="mrdate[]" required value="{{ $data[8] }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="my-3 btn btn-gradient-danger btn-sm" onclick="removeItem('{{ $index }}')">Remove</div>
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
                                        <div class="col">
                                            <div id="newinput"></div>
                                            <div id="rowAdder" class="my-3 btn btn-gradient-success btn-sm">Add</div>
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
                                </div>
                                <div class="col">
                                    <div id="newinput2"></div>

                                    <div id="rowAdder2" class="my-3 btn btn-gradient-success btn-sm">Add</div>
                                </div>
                                
                                     @else

                 <input type="hidden" name="box1[]" class="form-control"/>
                 <input type="hidden" name="box2[]" class="form-control"/>
                 <input type="hidden" name="box3[]" class="form-control"/>

        @endif
@endauth

                                <input class="form-control form-control-sm" name="status" value="Waiting"
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
                Material Request berhasil di edit.
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
                                 <script>
                                function fetchData(formId, itemValue, idElement, idsElement, tanggalitemElement, priceElement) {
                                    var xhr = new XMLHttpRequest();
                                    xhr.open('GET', '/check-data?item=' + encodeURIComponent(itemValue), true);
                                    xhr.onreadystatechange = function() {
                                        if (xhr.readyState === 4 && xhr.status === 200) {
                                            var response = JSON.parse(xhr.responseText);

                                            if (response.exists) {
                                                // Setel nilai ID, tanggalitem, dan hargaitem jika data ditemukan
                                                var idsArray = response.data.map(item => item.id);
                                                document.getElementById(idElement).value = idsArray.join(', ');
                                                document.getElementById(idsElement).value = idsArray.join(', ');

                                                var tanggalitemArray = response.data.map(item => item.tanggalitem);
                                                document.getElementById(tanggalitemElement).value = tanggalitemArray.join(', ');

                                                var priceArray = response.data.map(item => item.price);
                                                document.getElementById(priceElement).value = priceArray.join(', ');
                                            } else {
                                                // Setel ID, tanggalitem, dan hargaitem menjadi kosong jika tidak ditemukan kesamaan data
                                                document.getElementById(idElement).value = '';
                                                document.getElementById(idsElement).value = '';
                                                document.getElementById(tanggalitemElement).value = '';
                                                document.getElementById(priceElement).value = '';
                                            }
                                        }
                                    };
                                    xhr.send();
                                }

                                document.querySelectorAll('.data-form').forEach(function(form) {
                                    form.addEventListener('change', function() {
                                        var itemValue = this.querySelector('.form-control').value;
                                        var formId = this.id;
                                        fetchData(
                                            formId,
                                            itemValue,
                                            formId.replace('form', 'id'),
                                            formId.replace('form', 'purchasing_ids'),
                                            formId.replace('form', 'tanggalitem'),
                                            formId.replace('form', 'price')
                                        );
                                    });
                                });
                            </script>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        
              <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
 
@endsection
