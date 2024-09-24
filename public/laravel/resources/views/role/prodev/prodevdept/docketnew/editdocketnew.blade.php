@extends('role.purchasing.layoutsmrdept.main')
@section('main-container')

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
<style>
    p {
        font-family: "Inter", sans-serif;
        font-optical-sizing: auto;
        font-weight: <weight>;
        font-style: normal;
        font-variation-settings:
            "slnt" 0;
    }

    .table-responsive1 {
        overflow-y: auto;
        max-height: 400px;
        /* Atur ketinggian maksimum jika diperlukan */
    }

    /* Atur posisi dan z-index untuk thead */
    .table1 thead th {
        background-color: #F0F0F0;
        position: sticky;
        top: 0;
        z-index: 100;
        /* Atur z-index untuk memastikan thead di atas konten tabel */
    }

    /* Atur z-index konten tabel agar berada di bawah thead yang ditempel */
    .table1 tbody {
        position: relative;
        z-index: 0;
    }
</style>
<div class="main-panel">



    <div class=" content-wrapper px-3" style="background-color: #f6f6fb">
        <div class="page-header">
            <h3 class="page-title">
                <span class="text-white page-title-icon bg-gradient-info me-2">
                    <i class="mdi mdi-home"></i>
                </span> Dashboard
            </h3>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <span></span>Overview <i class="align-middle mdi mdi-alert-circle-outline icon-sm text-primary"></i>
                    </li>
                </ul>
            </nav>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <div class="row" id='row'>
            <div class="col-12 stretch-card grid-margin" id="myForm">
                <div class="border rounded card">
                    <div class="border rounded shadow card-body">
                        <div style="font-size: 25px" class="mt-3 mb-4 text-center font-bold ">FORM EDIT DOCKET</div>
                        <form class="form-sample" method="POST" action="{{route('docketnew.update', $design->id)}}">
                            @method('put')
                            @csrf
                            <div class="row pt-4 px-4" style="background-color: #f1f1f6">
                                <!--<div class="col">-->
                                <!--    <label class="pt-2" for="input1">Docket</label>-->
                                <!--    <input style="border-radius: 10px;" list="docket" type="text" class="form-control py-2 clickable shadow-sm" name="designno" id="inputdocket" required />-->
                                <!--</div>-->
                                <div class="col">
                                    <label class="pt-2" class="pt-2" for="input2">Product</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="product" id="getProduct"
                                        required list="listproduct" value="{{$design->product}}"/>
                                    <datalist id="listproduct">
                                        @foreach($uniqueProducts as $product)
                                        <option value="{{ $product }}">{{ $product }}</option>
                                        @endforeach
                                    </datalist>
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input3">Status Design</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="statusorder"
                                        placeholder="" required value="{{$design->statusorder}}">
                                </div>
                            </div>
                            <div class="row px-4" style="background-color: #f1f1f6">
                                <div class="col-sm">
                                    <label class="pt-2" for="input1">Original</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="original" value="{{$design->original}}" required>
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input2">Bentuk Design</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="design" placeholder="" value="{{$design->design}}" required>
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input3">Act Color</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="actcolor" placeholder="" value="{{$design->actcolor}}" required>
                                </div>
                            </div>
                            <div class="row px-4" style="background-color: #f1f1f6">
                                <div class="col-sm">
                                    <label class="pt-2" for="input1">Acuan Warna</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="acuanwarna" value="{{$design->acuanwarna}}"
                                        placeholder="">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input2">Finishing</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="finishingjob" value="{{$design->finishinigjob}}"
                                        placeholder="">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input3">Hotprint</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="hotprint" value="{{$design->hotprint}}"
                                        placeholder="">
                                </div>
                            </div>
                            <div class="row px-4" style="background-color: #f1f1f6">
                                <div class="col">
                                    <label class="pt-2" for="input1">F1</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="f1" placeholder="" value="{{$design->f1}}">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input2">F2</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="f2" placeholder="" value="{{$design->f2}}">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input3">F3</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="f3" placeholder="" value="{{$design->f3}}">
                                </div>
                            </div>
                            <div class="row px-4" style="background-color: #f1f1f6">
                                <div class="col">
                                    <label class="pt-2" for="input1">F4</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable " name="f4" placeholder="" value="{{$design->f4}}">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input2">F5</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="f5" placeholder="" value="{{$design->f5}}">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input3">F6</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="f6" placeholder="" value="{{$design->f6}}">
                                </div>
                            </div>
                            <div class="row px-4" style="background-color: #f1f1f6">
                                <div class="col">
                                    <label class="pt-2" for="input1">B1</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="b1" placeholder="" value="{{$design->b1}}">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input2">B2</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="b2" placeholder="" value="{{$design->b2}}">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input3">B3</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable " name="b3" placeholder="" value="{{$design->b3}}">
                                </div>
                            </div>
                            <div class="row px-4" style="background-color: #f1f1f6">
                                <div class="col">
                                    <label class="pt-2" for="input1">B4</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="b4" placeholder="" value="{{$design->b4}}">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input2">B5</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable " name="b5" placeholder="" value="{{$design->b5}}">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input3">B6</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="b6" placeholder="" value="{{$design->b6}}">
                                </div>
                            </div>
                            <div class="row px-4" style="background-color: #f1f1f6">
                                <div class="col">
                                    <label class="pt-2" for="input1">Packing</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable " name="packing" value="{{$design->packing}}"
                                        placeholder="">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input2">No PS</label>
                                    <input style="border-radius: 10px;" list="pn" type="text" class="shadow-sm form-control py-2 clickable " name="nops" value="{{$design->nops}}"
                                        id="inputpn" placeholder="" required>
                                    <datalist id="pn">
                                        @foreach ($packaging as $packaging )
                                            <option value="{{ $packaging->pn }}">
                                        @endforeach
                                    </datalist>
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input3">NW Box</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="nwbox" id="getNwbox" value="{{$design->nwbox}}" >
                                </div>
                            </div>
                            <div class="row px-4" style="background-color: #f1f1f6">
                                <div class="col">
                                    <label class="pt-2" for="input1">Box Name</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="boxname" value="{{$design->boxname}}"
                                        id="getBoxname">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input2">Box Specs</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="boxspecs" value="{{$design->boxspecs}}"
                                        id="getBoxspecs" placeholder="">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input3">Box Size</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="boxsize" id="getBoxsize" value="{{$design->boxsize}}"
                                        placeholder="">
                                </div>
                            </div>
                            <div class="row px-4" style="background-color: #f1f1f6">
                                <div class="col">
                                    <label class="pt-2" for="input1">Application</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="aplikasi" value="{{$design->aplikasi}}"
                                        placeholder="">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input2">Layout</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="layout" value="{{$design->layout}}">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input3">UP</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="up" placeholder="" value="{{$design->up}}">
                                </div>
                            </div>
                            <div class="row px-4" style="background-color: #f1f1f6">
                                <div class="col">
                                    <label class="pt-2" for="input1">Uk Press Layout</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable " name="ukpresslayout" value="{{$design->ukpresslayout}}"
                                        placeholder="">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input2">Emboss</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable " name="emboss" placeholder="" value="{{$design->emboss}}">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input3">Citto</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable " name="citto" placeholder="" value="{{$design->citto}}">
                                </div>
                            </div>
                            <div class="row px-4" style="background-color: #f1f1f6">
                                <div class="col">
                                    <label class="pt-2" for="input1">MAT 1</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="mat1" placeholder="" value="{{$design->mat1}}">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input2">MAT 2</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="mat2" placeholder="" value="{{$design->mat2}}">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input3">MAT 3</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="mat3" placeholder="" value="{{$design->mat3}}">
                                </div>
                            </div>
                            <div class="row px-4" style="background-color: #f1f1f6">
                                <div class="col">
                                    <label class="pt-2" for="input1">AS 1</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="as1" placeholder="" value="{{$design->as1}}">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input2">AS 2</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="as2" placeholder="" value="{{$design->as2}}">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input3">AS 3</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="as3" placeholder="" value="{{$design->as3}}">
                                </div>
                            </div>
                            <div class="row px-4" style="background-color: #f1f1f6">
                                <div class="col">
                                    <label class="pt-2" for="input1">Pisau</label>
                                    <input  style=" border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="pisau" placeholder="" value="{{$design->pisau}}">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input1">Tanggal Terima</label>
                                    <input  style=" border-radius: 10px;" type="date" class="shadow-sm form-control py-2 clickable" name="tanggalterima" placeholder="" value="{{$design->tanggalterima}}">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input1">File Design</label>
                                    <input style="background-color:#ffffff; border-radius: 10px;" type="file" class="shadow-sm form-control py-2 clickable" name="filedesign" placeholder="">
                                </div>
                            </div>
                            <div class="row px-4" style="background-color: #f1f1f6">
                                <div class="">
                                    <label class="pt-2" for="input1">Note JOB </label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="note1" placeholder="" value="{{$design->note1}}">
                                </div>
                                <div class="">
                                    <label class="pt-2" for="input1">Note Design Request</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="notedesignrequest" placeholder="" value="{{$design->notedesignrequest}}">
                                </div>
                                <div class="pb-4">
                                    <label class="pt-2" for="input1">Note Docket</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="note2" placeholder="Example : Revisi dari docket xxxxxx" value="{{$design->note2}}">
                                </div>
                            </div>
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
        $(document).ready(function () {
            // Fungsi yang dipanggil saat nilai input pertama berubah
            $('#inputdocket').change(function () {
                // Mendapatkan nilai yang dipilih pada input pertama
                var selectedDocket = $(this).val();
                // Melakukan Ajax request ke server untuk mendapatkan data client dan address berdasarkan namacustomer
                $.ajax({
                    type: 'GET',
                    url: '/get-job-datadocket/' + selectedDocket, // Gantilah dengan URL endpoint yang sesuai di Laravel
                    success: function (data) {
                        // Mengisi nilai pada input kedua dan ketiga
                        $('#getProduct').val(data.product);
                    },
                    error: function () {
                        alert('Gagal mengambil data Product.');
                    }
                });
            });
        });

        $(document).ready(function () {
            // Fungsi yang dipanggil saat nilai input pertama berubah
            $('#inputpn').change(function () {
                // Mendapatkan nilai yang dipilih pada input pertama
                var selectedPackaging = $(this).val();
                // Melakukan Ajax request ke server untuk mendapatkan data client dan address berdasarkan namacustomer
                $.ajax({
                    type: 'GET',
                    url: '/get-job-datapackaging/' + selectedPackaging, // Gantilah dengan URL endpoint yang sesuai di Laravel
                    success: function (data) {
                        // Mengisi nilai pada input kedua dan ketiga
                        $('#getNwbox').val(data.boxkg);
                        $('#getBoxname').val(data.boxname);
                        $('#getBoxspecs').val(data.boxspecs);
                        $('#getBoxsize').val(data.boxsize);
                    },
                    error: function () {
                        alert('Gagal mengambil data Packaging.');
                    }
                });
            });
        });
    </script>




    @endsection