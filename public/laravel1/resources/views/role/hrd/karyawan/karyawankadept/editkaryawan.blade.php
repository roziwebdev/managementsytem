@extends('role.purchasing.layoutmrkadept.main')
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
        <div class="row" id='row'>
            <div class="col-12 stretch-card grid-margin" >
                <div class="border rounded card">
                    <div class="border rounded shadow card-body">
                        <h4 class="mb-3 card-title">Form Edit Employee</h4>
                        <form class="form-sample" method="POST" action="{{ route('karyawannonstaff.update', $karyawan->id) }}"
                            id="pricelistForm">
                            @method("PUT")
                            @csrf
                            <div id='row2'>
                                <div class="shadow row" style="background-color: #f1f1f6">
                                    <div class="mt-3 col-md ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Nama</label>
                                            <input type="text" class="form-control form-control-sm clickable"
                                                name="nama" required value="{{ $karyawan->nama }}">
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Departement</label>
                                            <input type="text" class="form-control form-control-sm clickable"
                                                name="departement" required value="{{ $karyawan->departement }}">
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Posisi</label>
                                            <input type="text" class="form-control form-control-sm clickable"
                                                name="jabatan" required value="{{ $karyawan->jabatan }}">
                                        </div>
                                    </div>
                                     <div class="mt-3 col-md ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Golongan Jabatan</label>
                                            <input type="text" class="form-control form-control-sm clickable"
                                                name="golonganjabatan" required value="{{ $karyawan->golonganjabatan }}">
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Bagian</label>
                                            <input type="text" class="form-control form-control-sm clickable"
                                                name="bagian" required value="{{ $karyawan->bagian }}">
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Lokasi</label>
                                            <input type="text" class="form-control form-control-sm clickable"
                                                name="lokasi" required value="{{ $karyawan->lokasi }}">
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold ">Tanggal Masuk</label>
                                            <input type="date" class="form-control form-control-sm clickable"
                                                name="tglmasuk" placeholder="" required value="{{ $karyawan->tglmasuk }}">
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold ">Status</label>
                                            <select class="form-select" name="status">
                                                <option selected value="{{$karyawan->status}}">{{ $karyawan->status }}</option>
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