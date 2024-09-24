@extends('role.purchasing.layouts.main')
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

        <div class="row ">
            <div class="col-12 stretch-card grid-margin">
                <div class="border rounded card">
                    <div class="border rounded shadow card-body">
                        <h4 class="mb-3 card-title">Form Supplier</h4>
                        <form class="form-sample" method="POST" action="{{ route('supplier.update', $suplier->id) }}"
                            id="pricelistForm">
                            @method('PUT')
                            @csrf

                            <div class="row stretch-card " style="background-color: #f1f1f6">
                                <div class="mt-3 col-md ">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Supplier</label>
                                        <input type="text" class="form-control form-control-sm " name="supplier" value='{{ $suplier->supplier }}'>
                                    </div>
                                </div>
                                <div class="mt-3 col-md ">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">CP</label>
                                        <input type="text" class="form-control form-control-sm " name="cp" value='{{ $suplier->cp }}'>
                                    </div>
                                </div>

                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Jenis</label>
                                        <input type="text" class="form-control form-control-sm " name="jenis" value='{{ $suplier->jenis }}'>
                                    </div>
                                </div>

                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Material</label>
                                        <input type="text" class="form-control form-control-sm " name="material" value='{{ $suplier->material }}'>
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Alamat</label>
                                        <input type="text" class="form-control form-control-sm " name="alamat" value='{{ $suplier->alamat }}'>
                                    </div>
                                </div>
                            </div>
                            <div class="row stretch-card " style="background-color: #f1f1f6">
                                <div class="mt-3 col-md ">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Email</label>
                                        <input type="text" class="form-control form-control-sm " name="email" value='{{ $suplier->email }}'>
                                    </div>
                                </div>
                                <div class="mt-3 col-md ">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Telp</label>
                                        <input type="text" class="form-control form-control-sm " name="telp" value='{{ $suplier->telp }}'>
                                    </div>
                                </div>

                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Bank</label>
                                        <input type="text" class="form-control form-control-sm " name="bank" value='{{ $suplier->bank }}'>
                                    </div>
                                </div>

                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Norek</label>
                                        <input type="text" class="form-control form-control-sm " name="rekening" value='{{ $suplier->rekening }}'>
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Lead Time</label>
                                        <input type="text" class="form-control form-control-sm " name="leadtime" value='{{ $suplier->leadtime }}'>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button type="button" id="submitForm"
                                    class="mt-2 btn-rounded btn btn-gradient-info float-end">
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
        $('#submitForm').click(function () {
            $.ajax({
                type: 'POST',
                url: $('#pricelistForm').attr('action'),
                data: $('#pricelistForm').serialize(),
                success: function (response) {
                    console.log(response); // log tanggapan untuk debugging
                    alert('Supplier berhasil di edit');

                    // Perbarui tabel dengan data yang baru
                    var newRow =
                        "<tr>" +
                        "<td style='padding-top: 3px; padding-bottom:3px;' class='sticky'>" + response.id + "</td>" +
                        "<td style='padding-top: 3px; padding-bottom:3px;'>" + response.cp + "</td>" +
                        "<td style='padding-top: 3px; padding-bottom:3px;'>" + response.jenis + "</td>" +
                        "<td style='padding-top: 3px; padding-bottom:3px;'>" + response.material + "</td>" +
                        "<td style='padding-top: 3px; padding-bottom:3px;'>" + response.alamat + "</td>" +
                        "<td style='padding-top: 3px; padding-bottom:3px;'>" + response.email + "</td>" +
                        "<td style='padding-top: 3px; padding-bottom:3px;'>" + response.telp + "</td>" +
                        "<td style='padding-top: 3px; padding-bottom:3px;'>" + response.bank + "</td>" +
                        "<td style='padding-top: 3px; padding-bottom:3px;'>" + response.telp + "</td>" +
                        "<td style='padding-top: 3px; padding-bottom:3px;'>" + response.rekening + "</td>" +
                        "<td style='padding-top: 3px; padding-bottom:3px;'>" + response.leadtime + "</td>" +
                        "<td style='padding-top: 3px; padding-bottom:3px;'>" + response.created_at + "</td>" +
                        "<td style='padding-top: 3px; padding-bottom:3px;' class='d-flex'>" +
                        "<div class='dropdown'>" +
                        "<a class='btn btn-sm btn-gradient-info dropdown-toggle' href='#' role='button'" +
                        "data-bs-toggle='dropdown' aria-expanded='false'>Actions</a>" +
                        "<ul class='dropdown-menu'>" +
                        "<li><a class='dropdown-item' href='#'>Detail</a></li>" +
                        "<li><a class='dropdown-item' href='#'>Approve</a></li>" +
                        "</ul>" +
                        "</div>" +
                        "</td>" +
                        "</tr>";

                    // Sisipkan baris baru ke dalam tabel
                    $('#pricelistTableBody').prepend(newRow);

                    // Bersihkan formulir setelah submit
                    $('#pricelistForm')[0].reset();
                },
                error: function (error) {
                    console.log(error); // log kesalahan untuk debugging
                    alert('Terjadi kesalahan saat menambahkan produk. Silakan coba lagi.');
                }
            });
        });
    });
    </script>
    @endsection
