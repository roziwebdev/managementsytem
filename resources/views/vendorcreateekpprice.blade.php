@extends('role.purchasing.layoutsvendor.main')
@section('main-container')
    <main class="content">
        <div class="container-fluid p-0">
            <div class="mb-5 text-center">
                <h1 class="h1 d-inline align-middle">Form</h1>
                <a class="badge bg-dark text-white ms-2">
                    Dokumentasi Supplier ARJAYA
                </a>
            </div>

            <form method="POST" action="{{ route('vendor.update', $vendorekp->id) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="container-sm">
                    <div class="">
                        <div class="card">
                            <div id="row">
                                <div class="row">
                                    <div class="col">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Tujuan</h5>
                                        </div>
                                        <div class="card-body">
                                            <input type="text" name="tujuan[]" placeholder="Kota Tujuan"
                                                class="form-control" value="Cibitung" readonly />
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Unit Type</h5>
                                        </div>
                                        <div class="card-body">
                                            <select class="form-select" name="unittype[]">
                                                <option selected>Select Unit</option>
                                                @foreach (json_decode($vendorekp->unittype) as $unit)
                                                    <option value="{{ $unit }}">{{ $unit }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Price </h5>
                                        </div>
                                        <div class="card-body">
                                            <input type="text" name="price[]" placeholder="Price" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Tujuan</h5>
                                        </div>
                                        <div class="card-body">
                                            <input type="text" name="tujuan[]" placeholder="Kota Tujuan"
                                                class="form-control" value="Daan Mogot/ Kalideres" readonly />
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Unit Type</h5>
                                        </div>
                                        <div class="card-body">
                                            <select class="form-select" name="unittype[]">
                                                <option selected>Select Unit</option>
                                                @foreach (json_decode($vendorekp->unittype) as $unit)
                                                    <option value="{{ $unit }}">{{ $unit }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Price </h5>
                                        </div>
                                        <div class="card-body">
                                            <input type="text" name="price[]" placeholder="Price" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Tujuan</h5>
                                        </div>
                                        <div class="card-body">
                                            <input type="text" name="tujuan[]" placeholder="Kota Tujuan"
                                                class="form-control" value="Batu Ceper/Jurumudi" readonly />
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Unit Type</h5>
                                        </div>
                                        <div class="card-body">
                                            <select class="form-select" name="unittype[]">
                                                <option selected>Select Unit</option>
                                                @foreach (json_decode($vendorekp->unittype) as $unit)
                                                    <option value="{{ $unit }}">{{ $unit }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Price </h5>
                                        </div>
                                        <div class="card-body">
                                            <input type="text" name="price[]" placeholder="Price" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Tujuan</h5>
                                        </div>
                                        <div class="card-body">
                                            <input type="text" name="tujuan[]" placeholder="Kota Tujuan"
                                                class="form-control" value="Jatake/Acochem/P Kemis" readonly />
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Unit Type</h5>
                                        </div>
                                        <div class="card-body">
                                            <select class="form-select" name="unittype[]">
                                                <option selected>Select Unit</option>
                                                @foreach (json_decode($vendorekp->unittype) as $unit)
                                                    <option value="{{ $unit }}">{{ $unit }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Price </h5>
                                        </div>
                                        <div class="card-body">
                                            <input type="text" name="price[]" placeholder="Price"
                                                class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Tujuan</h5>
                                        </div>
                                        <div class="card-body">
                                            <input type="text" name="tujuan[]" placeholder="Kota Tujuan"
                                                class="form-control" value="Balaraja/Jayanti" readonly />
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Unit Type</h5>
                                        </div>
                                        <div class="card-body">
                                            <select class="form-select" name="unittype[]">
                                                <option selected>Select Unit</option>
                                                @foreach (json_decode($vendorekp->unittype) as $unit)
                                                    <option value="{{ $unit }}">{{ $unit }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Price </h5>
                                        </div>
                                        <div class="card-body">
                                            <input type="text" name="price[]" placeholder="Price"
                                                class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Tujuan</h5>
                                        </div>
                                        <div class="card-body">
                                            <input type="text" name="tujuan[]" placeholder="Kota Tujuan"
                                                class="form-control" value="Jakarta - Malang" readonly />
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Unit Type</h5>
                                        </div>
                                        <div class="card-body">
                                            <select class="form-select" name="unittype[]">
                                                <option selected>Select Unit</option>
                                                @foreach (json_decode($vendorekp->unittype) as $unit)
                                                    <option value="{{ $unit }}">{{ $unit }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Price </h5>
                                        </div>
                                        <div class="card-body">
                                            <input type="text" name="price[]" placeholder="Price"
                                                class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Tujuan</h5>
                                        </div>
                                        <div class="card-body">
                                            <input type="text" name="tujuan[]" placeholder="Kota Tujuan"
                                                class="form-control" value="Tangerang - Malang" readonly />
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Unit Type</h5>
                                        </div>
                                        <div class="card-body">
                                            <select class="form-select" name="unittype[]">
                                                <option selected>Select Unit</option>
                                                @foreach (json_decode($vendorekp->unittype) as $unit)
                                                    <option value="{{ $unit }}">{{ $unit }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Price </h5>
                                        </div>
                                        <div class="card-body">
                                            <input type="text" name="price[]" placeholder="Price"
                                                class="form-control" readonly />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Biaya lain-lain</h5>
                                        </div>
                                        <div class="card-body">
                                            <input type="text" name="kosong2[]" placeholder="Kota Tujuan"
                                                class="form-control" value="Inap" readonly />
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Unit Type</h5>
                                        </div>
                                        <div class="card-body">
                                            <select class="form-select" name="kosong3[]">
                                                <option selected>Select Unit</option>
                                                @foreach (json_decode($vendorekp->unittype) as $unit)
                                                    <option value="{{ $unit }}">{{ $unit }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Price </h5>
                                        </div>
                                        <div class="card-body">
                                            <input type="text" name="kosong4[]" placeholder="Price"
                                                class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Biaya lain-lain</h5>
                                        </div>
                                        <div class="card-body">
                                            <input type="text" name="kosong2[]" placeholder="Kota Tujuan"
                                                class="form-control" value="Multidrop" readonly />
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Unit Type</h5>
                                        </div>
                                        <div class="card-body">
                                            <select class="form-select" name="kosong3[]">
                                                <option selected>Select Unit</option>
                                                @foreach (json_decode($vendorekp->unittype) as $unit)
                                                    <option value="{{ $unit }}">{{ $unit }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Price </h5>
                                        </div>
                                        <div class="card-body">
                                            <input type="text" name="kosong4[]" placeholder="Price"
                                                class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Biaya lain-lain</h5>
                                        </div>
                                        <div class="card-body">
                                            <input type="text" name="kosong2[]" placeholder="Kota Tujuan"
                                                class="form-control" value="One Day Service" readonly />
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Unit Type</h5>
                                        </div>
                                        <div class="card-body">
                                            <select class="form-select" name="kosong3[]">
                                                <option selected>Select Unit</option>
                                                @foreach (json_decode($vendorekp->unittype) as $unit)
                                                    <option value="{{ $unit }}">{{ $unit }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Price </h5>
                                        </div>
                                        <div class="card-body">
                                            <input type="text" name="kosong4[]" placeholder="Price"
                                                class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div id="newinput"></div>
                            <div class="col">
                                <div class="card-header">
                                    <div id="rowAdder" class="btn btn-dark">Tambah Unit Tujuan</div>
                                </div>
                            </div>







                            <script type="text/javascript">
                                $("#rowAdder").click(function() {
                                    newRowAdd =

                                        '<div id="row"><div class="row"><div class="col"><div class="card-header"><h5 class="card-title mb-0">Tujuan</h5></div><div class="card-body"><input type="text" name="tujuan[]" placeholder="Kota Tujuan"class="form-control" value="Cibitung" /></div></div><div class="col"><div class="card-header"><h5 class="card-title mb-0">Unit Type</h5></div><div class="card-body"><select class="form-select" name="unittype[]"><option selected>Select Unit</option>@foreach (json_decode($vendorekp->unittype) as $unit)<option value="{{ $unit }}">{{ $unit }}</option>@endforeach</select></div></div><div class="col"><div class="card-header"><h5 class="card-title mb-0">Price </h5></div><div class="card-body"><input type="text" name="price[]" placeholder="Price" class="form-control" /></div></div></div><div class="row"><div class="col"><div class="card-header"><h5 class="card-title mb-0">Tujuan</h5></div><div class="card-body"><input type="text" name="tujuan[]" placeholder="Kota Tujuan"class="form-control" value="Daan Mogot/ Kalideres" /></div></div><div class="col"><div class="card-header"><h5 class="card-title mb-0">Unit Type</h5></div><div class="card-body"><select class="form-select" name="unittype[]"><option selected>Select Unit</option>@foreach (json_decode($vendorekp->unittype) as $unit)<option value="{{ $unit }}">{{ $unit }}</option>@endforeach</select></div></div><div class="col"><div class="card-header"><h5 class="card-title mb-0">Price </h5></div><div class="card-body"><input type="text" name="price[]" placeholder="Price" class="form-control" /></div></div></div><div class="row"><div class="col"><div class="card-header"><h5 class="card-title mb-0">Tujuan</h5></div><div class="card-body"><input type="text" name="tujuan[]" placeholder="Kota Tujuan"class="form-control" value="Batu Ceper/Jurumudi" /></div></div><div class="col"><div class="card-header"><h5 class="card-title mb-0">Unit Type</h5></div><div class="card-body"><select class="form-select" name="unittype[]"><option selected>Select Unit</option>@foreach (json_decode($vendorekp->unittype) as $unit)<option value="{{ $unit }}">{{ $unit }}</option>@endforeach</select></div></div><div class="col"><div class="card-header"><h5 class="card-title mb-0">Price </h5></div><div class="card-body"><input type="text" name="price[]" placeholder="Price" class="form-control" /></div></div></div><div class="row"><div class="col"><div class="card-header"><h5 class="card-title mb-0">Tujuan</h5></div><div class="card-body"><input type="text" name="tujuan[]" placeholder="Kota Tujuan"class="form-control" value="Jatake/Acochem/P Kemis" /></div></div><div class="col"><div class="card-header"><h5 class="card-title mb-0">Unit Type</h5></div><div class="card-body"><select class="form-select" name="unittype[]"><option selected>Select Unit</option>@foreach (json_decode($vendorekp->unittype) as $unit)<option value="{{ $unit }}">{{ $unit }}</option>@endforeach</select></div></div><div class="col"><div class="card-header"><h5 class="card-title mb-0">Price </h5></div><div class="card-body"><input type="text" name="price[]" placeholder="Price"class="form-control" /></div></div></div><div class="row"><div class="col"><div class="card-header"><h5 class="card-title mb-0">Tujuan</h5></div><div class="card-body"><input type="text" name="tujuan[]" placeholder="Kota Tujuan"class="form-control" value="Balaraja/Jayanti" /></div></div><div class="col"><div class="card-header"><h5 class="card-title mb-0">Unit Type</h5></div><div class="card-body"><select class="form-select" name="unittype[]"><option selected>Select Unit</option>@foreach (json_decode($vendorekp->unittype) as $unit)<option value="{{ $unit }}">{{ $unit }}</option>@endforeach</select></div></div><div class="col"><div class="card-header"><h5 class="card-title mb-0">Price </h5></div><div class="card-body"><input type="text" name="price[]" placeholder="Price"class="form-control" /></div></div></div><div class="row"><div class="col"><div class="card-header"><h5 class="card-title mb-0">Tujuan</h5></div><div class="card-body"><input type="text" name="tujuan[]" placeholder="Kota Tujuan"class="form-control" value="Jakarta - Malang" /></div></div><div class="col"><div class="card-header"><h5 class="card-title mb-0">Unit Type</h5></div><div class="card-body"><select class="form-select" name="unittype[]"><option selected>Select Unit</option>@foreach (json_decode($vendorekp->unittype) as $unit)<option value="{{ $unit }}">{{ $unit }}</option>@endforeach</select></div></div><div class="col"><div class="card-header"><h5 class="card-title mb-0">Price </h5></div><div class="card-body"><input type="text" name="price[]" placeholder="Price"class="form-control" /></div></div></div><div class="row"><div class="col"><div class="card-header"><h5 class="card-title mb-0">Tujuan</h5></div><div class="card-body"><input type="text" name="tujuan[]" placeholder="Kota Tujuan"class="form-control" value="Tangerang - Malang" /></div></div><div class="col"><div class="card-header"><h5 class="card-title mb-0">Unit Type</h5></div><div class="card-body"><select class="form-select" name="unittype[]"><option selected>Select Unit</option>@foreach (json_decode($vendorekp->unittype) as $unit)<option value="{{ $unit }}">{{ $unit }}</option>@endforeach</select></div></div><div class="col"><div class="card-header"><h5 class="card-title mb-0">Price </h5></div><div class="card-body"><input type="text" name="price[]" placeholder="Price"class="form-control" /></div></div></div><div class="row"><div class="col"><div class="card-header"><h5 class="card-title mb-0">Biaya lain-lain</h5></div><div class="card-body"><input type="text" name="kosong2[]" placeholder="Kota Tujuan"class="form-control" value="Inap" readonly /></div></div><div class="col"><div class="card-header"><h5 class="card-title mb-0">Unit Type</h5></div><div class="card-body"><select class="form-select" name="kosong3[]"><option selected>Select Unit</option>@foreach (json_decode($vendorekp->unittype) as $unit)<option value="{{ $unit }}">{{ $unit }}</option>@endforeach</select></div></div><div class="col"><div class="card-header"><h5 class="card-title mb-0">Price </h5></div><div class="card-body"><input type="text" name="kosong4[]" placeholder="Price"class="form-control" /></div></div></div><div class="row"><div class="col"><div class="card-header"><h5 class="card-title mb-0">Biaya lain-lain</h5></div><div class="card-body"><input type="text" name="kosong2[]" placeholder="Kota Tujuan"class="form-control" value="Multidrop" readonly /></div></div><div class="col"><div class="card-header"><h5 class="card-title mb-0">Unit Type</h5></div><div class="card-body"><select class="form-select" name="kosong3[]"><option selected>Select Unit</option>@foreach (json_decode($vendorekp->unittype) as $unit)<option value="{{ $unit }}">{{ $unit }}</option>@endforeach</select></div></div><div class="col"><div class="card-header"><h5 class="card-title mb-0">Price </h5></div><div class="card-body"><input type="text" name="kosong4[]" placeholder="Price"class="form-control" /></div></div></div><div class="row"><div class="col"><div class="card-header"><h5 class="card-title mb-0">Biaya lain-lain</h5></div><div class="card-body"><input type="text" name="kosong2[]" placeholder="Kota Tujuan"class="form-control" value="One Day Service" readonly /></div></div><div class="col"><div class="card-header"><h5 class="card-title mb-0">Unit Type</h5></div><div class="card-body"><select class="form-select" name="kosong3[]"><option selected>Select Unit</option>@foreach (json_decode($vendorekp->unittype) as $unit)<option value="{{ $unit }}">{{ $unit }}</option>@endforeach</select></div></div><div class="col"><div class="card-header"><h5 class="card-title mb-0">Price </h5></div><div class="card-body"><input type="text" name="kosong4[]" placeholder="Price"class="form-control" /></div></div></div><div><button class="btn btn-danger px-4 mx-3" id="DeleteRow"type="button">Remove</button></div></div>';

                                    $('#newinput').append(newRowAdd);
                                });
                                $("body").on("click", "#DeleteRow", function() {
                                    $(this).parents("#row").remove();
                                })
                            </script>

                            <button class="btn btn-dark" type="submit">Submit</button>

                        </div>
                    </div>
                </div>
        </div>

        </div>
        </form>
        </div>
    </main>
@endsection
