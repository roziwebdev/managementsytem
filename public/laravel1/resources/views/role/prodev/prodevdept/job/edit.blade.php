@extends('role.prodev.layouts.main')
@section('main-container')


<link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
<div class="main-panel">
    <div class=" content-wrapper" style="background-color: #f6f6fb">
        <div class="page-header">
            <h3 class="page-title">
                <span class="text-white page-title-icon bg-gradient-info me-2">
                    <i class="mdi mdi-home"></i>
                </span> Dashboard
            </h3>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <span></span>Overview <i
                            class="align-middle mdi mdi-alert-circle-outline icon-sm text-primary"></i>
                    </li>
                </ul>
            </nav>
        </div>
        <style>
            #myForm {
                display: none;
            }
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        {{-- <script>
            $(document).ready(function(){
                                $("#myButton").click(function(){
                                    $("#myForm").fadeToggle();
                                });
                            });
        </script>
        <div id="myButton" class="py-2 justify-content-end d-flex">
            <button class="btn btn-info">Add SC</button>
        </div> --}}
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
                        <h4 class="mt-3 mb-3 card-title">Form JOB</h4>
                        <form class="form-sample" method="POST" action="{{ route('job.update', $job->id) }}" id="pricelistForm">
                            @csrf
                            @method('PUT')
                            <div class="row" style="background-color: #f1f1f6">
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Tanggal Terima</label>
                                        <input value="{{ $job->tanggalterima }}" type="date" class="form-control form-control-sm clickable"
                                            name="tanggalterima" placeholder="" required>
                                    </div>
                                </div>
                                <div class="mt-3 col-md ">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Original</label>
                                        <input value="{{ $job->original }}" type="text" class="form-control form-control-sm clickable"
                                            name="original" required>
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Design</label>
                                        <input value="{{ $job->design }}" type="text" class="form-control form-control-sm clickable" name="design"
                                            placeholder="" required>
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Design no</label>
                                        <input value="{{ $job->designno }}" type="text" class="form-control form-control-sm clickable "
                                            name="designno" placeholder="" required>
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Status Design</label>
                                        <input value="{{ $job->statusdesign }}" type="text" class="form-control form-control-sm clickable"
                                            name="statusdesign" placeholder="" required>
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Act Color</label>
                                        <input value="{{ $job->actcolor }}" type="text" class="form-control form-control-sm clickable"
                                            name="actcolor" placeholder="" required>
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Finishing2</label>
                                        <input value="{{ $job->finishingjob }}" type="text" class="form-control form-control-sm clickable"
                                            name="finishingjob" placeholder="">
                                    </div>
                                </div>
                                <div class="mt-3 col-md ">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Acuan Warna</label>
                                        <input value="{{ $job->acuanwarna }}" type="text" class="form-control form-control-sm clickable"
                                            name="acuanwarna">
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Packing</label>
                                        <input value="{{ $job->packing }}" type="text" class="form-control form-control-sm clickable "
                                            name="packing" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class=" row" style="background-color: #f1f1f6">
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">No PS</label>
                                        <input value="{{ $job->nops }}" type="text" class="form-control form-control-sm clickable" name="nops"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Box Name</label>
                                        <input value="{{ $job->boxname }}" type="text" class="form-control form-control-sm clickable "
                                            name="boxname" placeholder="" list="listbox" id="inputBox">
                                        <datalist id="listbox">
                                            @foreach ($boxes as $data )
                                            <option value="{{ $data->boxname }}">
                                                @endforeach
                                        </datalist>
                                        <input value="{{ $job->boxspecs }}" type="hidden" class="" name="boxspecs" id="getSpecs" placeholder="">
                                        <input value="{{ $job->boxsize }}" type="hidden" class="" name="boxsize" id="getSize" placeholder="">
                                    </div>
                                    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                                    <script>
                                        $(document).ready(function () {
                                                                        // Fungsi yang dipanggil saat nilai input pertama berubah
                                                                        $('#inputBox').change(function () {
                                                                            // Mendapatkan nilai yang dipilih pada input pertama
                                                                            var selectedBox = $(this).val();

                                                                            // Melakukan Ajax request ke server untuk mendapatkan data client dan address berdasarkan namacustomer
                                                                            $.ajax({
                                                                                type: 'GET',
                                                                                url: '/get-customer-databox/' + selectedBox, // Gantilah dengan URL endpoint yang sesuai di Laravel
                                                                                success: function (data) {
                                                                                    // Mengisi nilai pada input kedua dan ketiga
                                                                                    $('#getSpecs').val(data.specs);
                                                                                    $('#getSize').val(data.size);
                                                                                },
                                                                                error: function () {
                                                                                    alert('Gagal mengambil data customer.');
                                                                                }
                                                                            });
                                                                        });
                                                                    });
                                    </script>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">NW Box</label>
                                        <input value="{{ $job->nwbox }}" type="text" class="form-control form-control-sm clickable" name="nwbox"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Application</label>
                                        <input value="{{ $job->aplikasi }}" type="text" class="form-control form-control-sm clickable"
                                            name="aplikasi" placeholder="">
                                    </div>
                                </div>
                                <div class="mt-3 col-md ">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Layout</label>
                                        <input value="{{ $job->layout }}" type="text" class="form-control form-control-sm clickable" name="layout">
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">UP</label>
                                        <input value="{{ $job->up }}" type="text" class="form-control form-control-sm clickable" name="up"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Uk Press Layout</label>
                                        <input value="{{ $job->ukpresslayout }}" type="text" class="form-control form-control-sm clickable "
                                            name="ukpresslayout" placeholder="">
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Pisau</label>
                                        <input value="{{ $job->pisau }}" type="text" class="form-control form-control-sm clickable" name="pisau"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Citto</label>
                                        <input value="{{ $job->citto }}" type="text" class="form-control form-control-sm clickable " name="citto"
                                            placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class=" row" style="background-color: #f1f1f6">
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Emboss</label>
                                        <input value="{{ $job->emboss }}" type="text" class="form-control form-control-sm clickable " name="emboss"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Hotprint</label>
                                        <input value="{{ $job->hotprint }}" type="text" class="form-control form-control-sm clickable"
                                            name="hotprint" placeholder="">
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Mat 1</label>
                                        <input value="{{ $job->mat1 }}" type="text" class="form-control form-control-sm clickable" name="mat1"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">As 1</label>
                                        <input value="{{ $job->as1 }}" type="text" class="form-control form-control-sm clickable" name="as1"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Mat 2</label>
                                        <input value="{{ $job->mat2 }}" type="text" class="form-control form-control-sm clickable" name="mat2"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">As 2</label>
                                        <input value="{{ $job->as2 }}" type="text" class="form-control form-control-sm clickable" name="as2"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Mat 3</label>
                                        <input value="{{ $job->mat3 }}" type="text" class="form-control form-control-sm clickable" name="mat3"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">As 3</label>
                                        <input value="{{ $job->as3 }}" type="text" class="form-control form-control-sm clickable" name="as3"
                                            placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class=" row" style="background-color: #f1f1f6">
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">F1</label>
                                        <input value="{{ $job->f1 }}" type="text" class="form-control form-control-sm clickable" name="f1"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="mt-3 col-md ">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">F2</label>
                                        <input value="{{ $job->f2 }}" type="text" class="form-control form-control-sm clickable" name="f2">
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">F3</label>
                                        <input value="{{ $job->f3 }}" type="text" class="form-control form-control-sm clickable" name="f3"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">F4</label>
                                        <input value="{{ $job->f4 }}" type="text" class="form-control form-control-sm clickable " name="f4"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">F5</label>
                                        <input value="{{ $job->f5 }}" type="text" class="form-control form-control-sm clickable" name="f5"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">F6</label>
                                        <input value="{{ $job->f6 }}" type="text" class="form-control form-control-sm clickable" name="f6"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">B1</label>
                                        <input value="{{ $job->b1 }}" type="text" class="form-control form-control-sm clickable" name="b1"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="mt-3 col-md ">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">B2</label>
                                        <input  value="{{ $job->b2 }}"  type="text" class="form-control form-control-sm clickable" name="b2">
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">B3</label>
                                        <input  value="{{ $job->b3 }}"  type="text" class="form-control form-control-sm clickable " name="b3"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">B4</label>
                                        <input  value="{{ $job->b4 }}"  type="text" class="form-control form-control-sm clickable" name="b4"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">B5</label>
                                        <input  value="{{ $job->b5 }}"  type="text" class="form-control form-control-sm clickable " name="b5"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">B6</label>
                                        <input  value="{{ $job->b6 }}"  type="text" class="form-control form-control-sm clickable" name="b6"
                                            placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class=" row" style="background-color: #f1f1f6">
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Note 1</label>
                                        <input  value="{{ $job->note1 }}"  type="text" class="form-control form-control-sm clickable" name="note1"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Note 2</label>
                                        <input  value="{{ $job->note2 }}"  type="text" class="form-control form-control-sm clickable" name="note2"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Note 3</label>
                                        <input  value="{{ $job->note3 }}"  type="text" class="form-control form-control-sm clickable" name="note3"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Status JOB</label>
                                        <select class="form-select" name="statusjob" required>
                                            <option value="">Choose Status</option>
                                            <option value="Sent">Sent</option>
                                            <option value="Revised">Revised</option>
                                        </select>
                                    </div>
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
