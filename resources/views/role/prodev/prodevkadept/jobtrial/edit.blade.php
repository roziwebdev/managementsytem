@extends('role.purchasing.layoutmrkadept.main')
@section('main-container')

<link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
<div class="main-panel">
    <div class=" content-wrapper" style="background-color: #f6f6fb">
        <style>
            #myForm {
                display: none;
            }
            label{
                font-size: 13px;
                padding-bottom: 6px
            }
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <div class="row" id='row'>
            <div class="mt-2 row" style="background-color: ">
                <div class="mb-3 col-md">
                    <label for="" class="form-label fw-bold ">Preview</label>
                    <input class="form-control " id="input1" />
                </div>
            </div>
            <div class="col-12 stretch-card grid-margin" id="">
                <div class="border rounded card">
                    <div class="border rounded shadow card-body">
                        <h4 class="mt-3 mb-3 card-title">Form Edit JOB</h4>
                        <form class="form-sample" method="POST" action="{{ route('kadeptjobtrial.update', $job->id) }}" id="pricelistForm">
                            @csrf
                            @method('PUT')
                               <div class="row pt-4 px-4" style="background-color: #f1f1f6">
    <div class="col">
        <label for="" class="pt-2">Tanggal Terima</label>
        <input
            value="{{ $job->tanggalterima }}"
            type="date"
            class="shadow-sm form-control py-2 clickable"
            name="tanggalterima"
            placeholder=""
            required
            style="border-radius: 10px"
        />
    </div>
    <div class="col">
        <label for="" class="pt-2">Original</label>
        <input
            value="{{ $job->original }}"
            type="text"
            class="shadow-sm form-control py-2 clickable"
            name="original"
            required
            style="border-radius: 10px"
        />
    </div>
    <div class="col">
        <label for="" class="pt-2">Design</label>
        <input
            value="{{ $job->design }}"
            type="text"
            class="shadow-sm form-control py-2 clickable"
            name="design"
            placeholder=""
            required
            style="border-radius: 10px"
        />
    </div>
</div>
<div class="row px-4" style="background-color: #f1f1f6">
    <div class="col-sm">
        <label for="" class="pt-2">Design no</label>
        <input
            value="{{ $job->designno }}"
            type="text"
            class="shadow-sm form-control py-2 clickable"
            name="designno"
            placeholder=""
            required
            style="border-radius: 10px"
        />
    </div>
    <div class="col">
        <label for="" class="pt-2">Status Design</label>
        <input
            value="{{ $job->statusdesign }}"
            type="text"
            class="shadow-sm form-control py-2 clickable"
            name="statusdesign"
            placeholder=""
            required
            style="border-radius: 10px"
        />
    </div>
    <div class="col">
        <label for="" class="pt-2">Act Color</label>
        <input
            value="{{ $job->actcolor }}"
            type="text"
            class="shadow-sm form-control py-2 clickable"
            name="actcolor"
            placeholder=""
            required
            style="border-radius: 10px"
        />
    </div>
</div>
<div class="row px-4" style="background-color: #f1f1f6">
    <div class="col-sm">
        <label for="" class="pt-2">Finishing2</label>
        <input
            value="{{ $job->finishingjob }}"
            type="text"
            class="shadow-sm form-control py-2 clickable"
            name="finishingjob"
            placeholder=""
            style="border-radius: 10px"
        />
    </div>
    <div class="col">
        <label for="" class="pt-2">Acuan Warna</label>
        <input
            value="{{ $job->acuanwarna }}"
            type="text"
            class="shadow-sm form-control py-2 clickable"
            name="acuanwarna"
            style="border-radius: 10px"
        />
    </div>
    <div class="col">
        <label for="" class="pt-2">Packing</label>
        <input
            value="{{ $job->packing }}"
            type="text"
            class="shadow-sm form-control py-2 clickable"
            name="packing"
            placeholder=""
            style="border-radius: 10px"
        />
    </div>
</div>
<div class="row px-4" style="background-color: #f1f1f6">
    <div class="col">
        <label for="" class="pt-2">No PS</label>
        <input
            value="{{ $job->nops }}"
            type="text"
            class="shadow-sm form-control py-2 clickable"
            name="nops"
            placeholder=""
            style="border-radius: 10px"
        />
    </div>
    <div class="col">
        <label for="" class="pt-2">Box Name</label>
        <input
            value="{{ $job->boxname }}"
            type="text"
            class="shadow-sm form-control py-2 clickable"
            name="boxname"
            placeholder=""
            list="listbox"
            id="inputBox"
            style="border-radius: 10px"
        />
        <datalist id="listbox">
            @foreach ($boxes as $data )
            <option value="{{ $data->boxname }}">@endforeach</option>
        </datalist>

      
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script>
            $(document).ready(function () {
                // Fungsi yang dipanggil saat nilai input pertama berubah
                $("#inputBox").change(function () {
                    // Mendapatkan nilai yang dipilih pada input pertama
                    var selectedBox = $(this).val();

                    // Melakukan Ajax request ke server untuk mendapatkan data client dan address berdasarkan namacustomer
                    $.ajax({
                        type: "GET",
                        url: "/get-customer-databox/" + selectedBox, // Gantilah dengan URL endpoint yang sesuai di Laravel
                        success: function (data) {
                            // Mengisi nilai pada input kedua dan ketiga
                            $("#getSpecs").val(data.specs);
                            $("#getSize").val(data.size);
                        },
                        error: function () {
                            alert("Gagal mengambil data customer.");
                        },
                    });
                });
            });
        </script>
    </div>
    <div class="col">
        <label for="" class="pt-2">NW Box</label>
        <input
            value="{{ $job->nwbox }}"
            type="text"
            class="shadow-sm form-control py-2 clickable"
            name="nwbox"
            placeholder=""
            style="border-radius: 10px"
        />
    </div>
</div>
<div class="row px-4" style="background-color: #f1f1f6">
    <div class="col">
        <label for="" class="pt-2">Box Specs</label>
        <input
            value="{{ $job->boxspecs }}"
            type="text"
            class="shadow-sm form-control py-2 clickable"
            name="boxspecs"
            id="getSpecs"
            placeholder=""
            style="border-radius: 10px"
        />
    </div>
    <div class="col">
        <label for="" class="pt-2">Box Size</label>
        <input
            value="{{ $job->boxsize }}"
            type="text"
            class="shadow-sm form-control py-2 clickable"
            name="boxsize"
            id="getSize"
            placeholder=""
            style="border-radius: 10px"
        />
    </div>
    <div class="col">
        <label for="" class="pt-2">Application</label>
        <input
            value="{{ $job->aplikasi }}"
            type="text"
            class="shadow-sm form-control py-2 clickable"
            name="aplikasi"
            placeholder=""
            style="border-radius: 10px"
        />
    </div>
    
</div>
<div class="row px-4" style="background-color: #f1f1f6">
    <div class="col">
        <label for="" class="pt-2">Layout</label>
        <input
            value="{{ $job->layout }}"
            type="text"
            class="shadow-sm form-control py-2 clickable"
            name="layout"
            style="border-radius: 10px"
        />
    </div>
    <div class="col">
        <label for="" class="pt-2">UP</label>
        <input
            value="{{ $job->up }}"
            type="text"
            class="shadow-sm form-control py-2 clickable"
            name="up"
            placeholder=""
            style="border-radius: 10px"
        />
    </div>
    <div class="col">
        <label for="" class="pt-2">Uk Press Layout</label>
        <input
            value="{{ $job->ukpresslayout }}"
            type="text"
            class="shadow-sm form-control py-2 clickable"
            name="ukpresslayout"
            placeholder=""
            style="border-radius: 10px"
        />
    </div>
    
</div>
<div class="row px-4" style="background-color: #f1f1f6">
    <div class="col">
        <label for="" class="pt-2">Pisau</label>
        <input
            value="{{ $job->pisau }}"
            type="text"
            class="shadow-sm form-control py-2 clickable"
            name="pisau"
            placeholder=""
            style="border-radius: 10px"
        />
    </div>
    <div class="col">
        <label for="" class="pt-2">Citto</label>
        <input
            value="{{ $job->citto }}"
            type="text"
            class="shadow-sm form-control py-2 clickable"
            name="citto"
            placeholder=""
            style="border-radius: 10px"
        />
    </div>
    <div class="col">
        <label for="" class="pt-2">Emboss</label>
        <input
            value="{{ $job->emboss }}"
            type="text"
            class="shadow-sm form-control py-2 clickable"
            name="emboss"
            placeholder=""
            style="border-radius: 10px"
        />
    </div>
    
</div>
<div class="row px-4" style="background-color: #f1f1f6">
    <div class="col">
        <label for="" class="pt-2">Hotprint</label>
        <input
            value="{{ $job->hotprint }}"
            type="text"
            class="shadow-sm form-control py-2 clickable"
            name="hotprint"
            placeholder=""
            style="border-radius: 10px"
        />
    </div>
    <div class="col">
        <label for="" class="pt-2">Mat 1</label>
        <input
            value="{{ $job->mat1 }}"
            type="text"
            class="shadow-sm form-control py-2 clickable"
            name="mat1"
            placeholder=""
            style="border-radius: 10px"
        />
    </div>
    <div class="col">
        <label for="" class="pt-2">As 1</label>
        <input
            value="{{ $job->as1 }}"
            type="text"
            class="shadow-sm form-control py-2 clickable"
            name="as1"
            placeholder=""
            style="border-radius: 10px"
        />
    </div>
    
</div>
<div class="row px-4" style="background-color: #f1f1f6">
    <div class="col">
        <label for="" class="pt-2">Mat 2</label>
        <input
            value="{{ $job->mat2 }}"
            type="text"
            class="shadow-sm form-control py-2 clickable"
            name="mat2"
            placeholder=""
            style="border-radius: 10px"
        />
    </div>
    <div class="col">
        <label for="" class="pt-2">As 2</label>
        <input
            value="{{ $job->as2 }}"
            type="text"
            class="shadow-sm form-control py-2 clickable"
            name="as2"
            placeholder=""
            style="border-radius: 10px"
        />
    </div>
    <div class="col">
        <label for="" class="pt-2">Mat 3</label>
        <input
            value="{{ $job->mat3 }}"
            type="text"
            class="shadow-sm form-control py-2 clickable"
            name="mat3"
            placeholder=""
            style="border-radius: 10px"
        />
    </div>
    
</div>
<div class="row px-4" style="background-color: #f1f1f6">
    <div class="col">
        <label for="" class="pt-2">As 3</label>
        <input
            value="{{ $job->as3 }}"
            type="text"
            class="shadow-sm form-control py-2 clickable"
            name="as3"
            placeholder=""
            style="border-radius: 10px"
        />
    </div>
    <div class="col">
        <label for="" class="pt-2">F1</label>
        <input
            value="{{ $job->f1 }}"
            type="text"
            class="shadow-sm form-control py-2 clickable"
            name="f1"
            placeholder=""
            style="border-radius: 10px"
        />
    </div>
    <div class="col">
        <label for="" class="pt-2">F2</label>
        <input
            value="{{ $job->f2 }}"
            type="text"
            class="shadow-sm form-control py-2 clickable"
            name="f2"
            style="border-radius: 10px"
        />
    </div>
    
</div>
<div class="row px-4" style="background-color: #f1f1f6">
    <div class="col">
        <label for="" class="pt-2">F3</label>
        <input
            value="{{ $job->f3 }}"
            type="text"
            class="shadow-sm form-control py-2 clickable"
            name="f3"
            placeholder=""
            style="border-radius: 10px"
        />
    </div>
    <div class="col">
        <label for="" class="pt-2">F4</label>
        <input
            value="{{ $job->f4 }}"
            type="text"
            class="shadow-sm form-control py-2 clickable"
            name="f4"
            placeholder=""
            style="border-radius: 10px"
        />
    </div>
    <div class="col">
        <label for="" class="pt-2">F5</label>
        <input
            value="{{ $job->f5 }}"
            type="text"
            class="shadow-sm form-control py-2 clickable"
            name="f5"
            placeholder=""
            style="border-radius: 10px"
        />
    </div>
   
</div>
<div class="row px-4" style="background-color: #f1f1f6">
     <div class="col">
        <label for="" class="pt-2">F6</label>
        <input
            value="{{ $job->f6 }}"
            type="text"
            class="shadow-sm form-control py-2 clickable"
            name="f6"
            placeholder=""
            style="border-radius: 10px"
        />
    </div>
    <div class="col">
        <label for="" class="pt-2">B1</label>
        <input
            value="{{ $job->b1 }}"
            type="text"
            class="shadow-sm form-control py-2 clickable"
            name="b1"
            placeholder=""
            style="border-radius: 10px"
        />
    </div>
    <div class="col">
        <label for="" class="pt-2">B2</label>
        <input
            value="{{ $job->b2 }}"
            type="text"
            class="shadow-sm form-control py-2 clickable"
            name="b2"
            style="border-radius: 10px"
        />
    </div>
    
</div>
<div class="row px-4" style="background-color: #f1f1f6">
    <div class="col">
        <label for="" class="pt-2">B3</label>
        <input
            value="{{ $job->b3 }}"
            type="text"
            class="shadow-sm form-control py-2 clickable"
            name="b3"
            placeholder=""
            style="border-radius: 10px"
        />
    </div>
    <div class="col">
        <label for="" class="pt-2">B4</label>
        <input
            value="{{ $job->b4 }}"
            type="text"
            class="shadow-sm form-control py-2 clickable"
            name="b4"
            placeholder=""
             style="border-radius: 10px"
        />
    </div>
    <div class="col">
        <label for="" class="pt-2">B6</label>
        <input
            value="{{ $job->b6 }}"
            type="text"
            class="shadow-sm form-control py-2 clickable"
            name="b6"
            placeholder=""
             style="border-radius: 10px"
        />
    </div>
</div>
<div class="row px-4" style="background-color: #f1f1f6">
    <div class="">
        <label for="" class="pt-2">Status JOB</label>
        <select class="form-select"  style="border-radius: 10px" name="status" required>
            <option value="">Choose Status</option>
            <option value="Sent">Sent</option>
            <option value="Revised">Revised</option>
        </select>
    </div>
</div>
<div class="row px-4 pb-4" style="background-color: #f1f1f6">
    <div class="">
        <label for="" class="pt-2">Note JOB</label>
        <input
            value="{{ $job->note1 }}"
            type="text"
            class="shadow-sm form-control py-2 clickable"
            name="note1"
            placeholder=""
             style="border-radius: 10px"
        />
    </div>

</div>


                            <div>
                                <button type="submit" class="mt-2 btn-rounded btn btn-gradient-info float-end">
                                    Submit
                                </button>
                            </div>
                            <!-- Add this modal at the bottom of your Blade file -->

                            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <script>
        // Mendapatkan semua elemen input
                var allInputs = document.querySelectorAll('.form-control');
                // Menambahkan event listener untuk setiap elemen
                allInputs.forEach(function(input) {
                    input.addEventListener('input', function() {
                        // Menetapkan nilai input 1 dengan nilai dari input yang sedang diedit
                        document.getElementById('input1').value = input.value;
                    });

                    if (input.classList.contains('clickable')) {
                        input.addEventListener('click', function() {
                            // Menetapkan nilai input 1 dengan nilai dari input yang diklik
                            document.getElementById('input1').value = input.value;
                        });
                    }
                });
    </script>



    @endsection
