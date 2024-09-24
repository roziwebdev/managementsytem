@extends('role.purchasing.layoutsmrdept.main')
@section('main-container')
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
    <div class="main-panel">
        <div class=" content-wrapper" style="background-color: #f6f6fb">
            <div class="row" id='row'>
                <div class="col-12 stretch-card grid-margin" id="myForm">
                    <div class="border rounded card">
                        <div class="border rounded shadow card-body">
                            <h4 class="mb-3 card-title">Form Edit Employee</h4>
                            <form class="form-sample" method="POST" action="{{ route('satpam.update', $satpam->id) }}"
                                id="pricelistForm">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="status" value="AKTIF"/>
                                <div id='row2'>
                                    <div class="shadow row" style="background-color: #f1f1f6">
                                        <div class="mt-3 col-md ">
                                            <div class="mb-3" style="font-size: 14px">
                                                <label for="" class="form-label fw-bold">Nama</label>
                                                <input type="text" class="form-control form-control-sm clickable"
                                                    name="nama" required value="{{$satpam->nama}}">
                                            </div>
                                        </div>
                                         <div class="mt-3 col-md ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Jabatan</label>
                                            <input type="text" class="form-control form-control-sm clickable"
                                                name="jabatan" required value="{{$satpam->jabatan}}">
                                        </div>
                                    </div>
                                        <div class="mt-3 col-md ">
                                            <div class="mb-3" style="font-size: 14px">
                                                <label for="" class="form-label fw-bold">Outsourcing</label>
                                                <input type="text" class="form-control form-control-sm clickable"
                                                    name="outsourcing" required value="{{$satpam->outsourcing}}">
                                            </div>
                                        </div>
                                        <div class="mt-3 col-md ">
                                            <div class="mb-3" style="font-size: 14px">
                                                <label for="" class="form-label fw-bold">Lokasi</label>
                                                <input type="text" class="form-control form-control-sm clickable"
                                                    name="lokasi" required value="{{$satpam->lokasi}}">
                                            </div>
                                        </div>
                                        <div class="mt-3 col-md">
                                            <div class="mb-3" style="font-size: 14px">
                                                <label for="" class="form-label fw-bold ">Tanggal Masuk</label>
                                                <input type="date" class="form-control form-control-sm clickable"
                                                    name="tmk" placeholder="" required value="{{$satpam->tmk}}">
                                            </div>
                                        </div>
                                        <div class="mt-3 col-md">
                                            <div class="mb-3" style="font-size: 14px">
                                                <label for="" class="form-label fw-bold ">Status</label>
                                                <select class="form-select" name="status" required>
                                                    <option value="">CHOOSE ONE</option>
                                                    <option value="AKTIF">AKTIF</option>
                                                    <option value="TIDAK AKTIF">TIDAK AKTIF</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button type="submit" class="mt-2 btn-rounded btn btn-gradient-info float-end">
                                        Submit
                                    </button>
                                </div>
                                <!-- Add this modal at the bottom of your Blade file -->
                                <div class="modal fade" id="successModal" tabindex="-1" role="dialog"
                                    aria-labelledby="successModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="successModalLabel">Success!</h5>
                                            </div>
                                            <div class="modal-body">
                                                Customer berhasil di tambahkan.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
@endsection