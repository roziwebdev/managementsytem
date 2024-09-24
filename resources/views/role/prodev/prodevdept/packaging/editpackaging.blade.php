@extends('role.purchasing.layoutsmrdept.main')
@section('main-container')

<link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
<div class="main-panel">
    <div class=" content-wrapper" style="background-color: #f6f6fb">



        <div class="row" id='row'>
            <div class="col-12 stretch-card grid-margin" id="">
                <div class="border rounded card">
                    <div class="border rounded shadow card-body">
                        <h4 class="mb-3 card-title">Form New Packaging</h4>
                        <form class="form-sample" method="POST" action="{{ route('packaging.update', $packaging->id) }}" id="pricelistForm" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="shadow row" style="background-color: #f1f1f6">
                                <div class="mt-3 col-md ">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">PN</label>
                                        <input type="text" class="form-control form-control-sm" name="pn" required value="{{$packaging->pn}}">
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Docket</label>
                                        <input type="text" class="form-control form-control-sm " name="designno" value="{{$packaging->designno}}"
                                            placeholder="" required>
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Product</label>
                                        <input type="text" class="form-control form-control-sm " name="product" value="{{$packaging->product}}"
                                            placeholder="" required>
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">SAP</label>
                                        <input type="text" class="form-control form-control-sm " name="sap" value="{{$packaging->sap}}"
                                            placeholder="" required>
                                    </div>
                                </div>
                                 <div class="mt-3 col-md ">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Suplier</label>
                                        <input type="text" class="form-control form-control-sm" name="suplier" value="{{$packaging->suplier}}">
                                    </div>
                                </div>
                            </div>
                            <div class="shadow row " style="background-color: #f1f1f6">
                               
                               
                                <div class="mt-3 col-md ">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Isi</label>
                                        <input type="text" class="form-control form-control-sm" name="isi" value="{{$packaging->isi}}">
                                    </div>
                                </div>
                                
                                <div class="mt-3 col-md ">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">NW PCS GR</label>
                                        <input type="text" class="form-control form-control-sm" name="nwpcs" value="{{$packaging->nwpcs}}">
                                    </div>
                                </div>
                                
                                 <div class="mt-3 col-md ">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Est UK Packing</label>
                                        <input type="text" class="form-control form-control-sm" name="estimasipackaging" value="{{$packaging->estimasipackaging}}">
                                    </div>
                                </div>
                                <div class="mt-3 col-md ">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Susunan</label>
                                        <input type="text" class="form-control form-control-sm" name="susunan" value="{{$packaging->susunan}}">
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">NW Box KG</label>
                                        <input type="text" class="form-control form-control-sm " name="boxkg" value="{{$packaging->boxkg}}"
                                            placeholder="" >
                                    </div>
                                </div>

                            </div>
                            <div class="shadow row " style="background-color: #f1f1f6">
                                
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Isi Box</label>
                                        <input type="text" class="form-control form-control-sm " name="isibox" value="{{$packaging->isibox}}"
                                            placeholder="" required>
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Isi Bendel/SAP</label>
                                        <input type="text" class="form-control form-control-sm " name="isiboxsap" value="{{$packaging->isiboxsap}}"
                                            placeholder="" >
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Bendel/SAP</label>
                                        <select class="form-select" name="sapataubendel">
                                            <option selected value="{{$packaging->sapataubendel}}">{{$packaging->sapataubendel}}</option>
                                            <option value="Bendel">Bendel</option>
                                            <option value="SAP">SAP</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Box Name</label>
                                        <input type="text" class="form-control form-control-sm " name="boxname" id="inputBox"
                                            placeholder="" required list="box" value="{{$packaging->boxname}}">
                                            <datalist id="box">
                                                @foreach ($boxes as $box )
                                                    <option value="{{ $box->boxname }}">
                                                @endforeach
                                            </datalist>
                                        <input type="text" class="form-control form-control-sm " name="boxspecs" id="getSpecs" value="{{$packaging->boxspecs}}" readonly>
                                        <input type="text" class="form-control form-control-sm " name="boxsize" id="getSize" value="{{$packaging->boxsize}}" readonly>
                                    </div>
                                </div>
                                
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Created</label>
                                        <input type="text" class="form-control form-control-sm " name="created" value="{{Auth::user()->name}}"
                                            placeholder="" readonly>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="shadow row " style="background-color: #f1f1f6">
                                <div class="mt-3 col-md ">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Box Dalam (P)</label>
                                        <input type="text" class="form-control form-control-sm" name="boxdalampanjang" value="{{$packaging->boxdalampanjang}}">
                                    </div>
                                </div>
                                <div class="mt-3 col-md ">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Box Dalam (L)</label>
                                        <input type="text" class="form-control form-control-sm" name="boxdalamlebar" value="{{$packaging->boxdalamlebar}}">
                                    </div>
                                </div>
                                <div class="mt-3 col-md ">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Box Dalam (T)</label>
                                        <input type="text" class="form-control form-control-sm" name="boxdalamtinggi" value="{{$packaging->boxdalamtinggi}}">
                                    </div>
                                </div>
                            </div>
                            <div class="shadow row " style="background-color: #f1f1f6">
                                <div class="mt-3 col-md ">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Box Luar (P)</label>
                                        <input type="text" class="form-control form-control-sm" name="boxluarpanjang" value="{{$packaging->boxluarpanjang}}">
                                    </div>
                                </div>
                                <div class="mt-3 col-md ">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Box Luar (L)</label>
                                        <input type="text" class="form-control form-control-sm" name="boxluarlebar" value="{{$packaging->boxluarlebar}}">
                                    </div>
                                </div>
                                <div class="mt-3 col-md ">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Box Luar (T)</label>
                                        <input type="text" class="form-control form-control-sm" name="boxluartinggi" value="{{$packaging->boxluartinggi}}">
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="shadow row " style="background-color: #f1f1f6">
                                <div class="mt-3 col-md ">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Prepared Date</label>
                                        <input type="date" class="form-control form-control-sm" name="preparedate" required value="{{$packaging->preparedate}}">
                                    </div>
                                </div>
                                <div class="mt-3 col-md ">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Effective Date</label>
                                        <input type="date" class="form-control form-control-sm" name="effective" required value="{{$packaging->effective}}">
                                    </div>
                                </div>
                                <div class="mt-3 col-md ">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Status</label>
                                        <select class="form-select" name="status">
                                            <option alue="{{$packaging->status}}" selected>{{$packaging->status}}</option>
                                            <option value="Active" selected>Active</option>
                                            <option value="Discontinue">Discontinue</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="shadow row " style="background-color: #f1f1f6">
                                <div class="mt-3 col-md ">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Gambar 1</label>
                                        <input type="file" class="form-control" name="gambar1">
                                    </div>
                                </div>
                                <div class="mt-3 col-md ">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Gambar 2</label>
                                        <input type="file" class="form-control" name="gambar2">
                                    </div>
                                </div>
                                <div class="mt-3 col-md ">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Gambar 3</label>
                                        <input type="file" class="form-control" name="gambar3">
                                    </div>
                                </div>
                                <div class="mt-3 col-md ">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Gambar 4</label>
                                        <input type="file" class="form-control" name="gambar4">
                                    </div>
                                </div>
                                <div class="mt-3 col-md ">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Gambar 5</label>
                                        <input type="file" class="form-control" name="gambar5">
                                    </div>
                                </div>

                            </div>
                            <div class="shadow row " style="background-color: #f1f1f6">
                                <div class="mt-3 col-md ">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Note Packaging</label>
                                        <textarea class="form-control" name="notepackaging">{{$packaging->notepackaging}}</textarea>
                                    </div>
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
                            alert('Gagal mengambil data Box.');
                        }
                    });
                });
            });
    </script>




    @endsection