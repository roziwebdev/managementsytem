@extends('role.purchasing.layouts.main')
@section('main-container')
    
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
    <div class="main-panel">
        <div class="    content-wrapper" style="background-color: #f6f6fb">
            <div class="page-header">
                <h3 class="page-title">
                    <span class="page-title-icon bg-gradient-info text-white me-2">
                        <i class="mdi mdi-home"></i>
                    </span> Dashboard
                </h3>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">
                            <span></span>Overview <i
                                class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="row ">
                <div class="col-12 stretch-card grid-margin">
                    <div class="card border rounded">
                        <div class="card-body shadow  border rounded">
                            <h4 class="card-title mb-3">Form Supplier</h4>
                            <form class="form-sample" method="POST" action="{{ route('supplier.store') }}" id="pricelistForm">
                                @csrf

                                <div class="row stretch-card " style="background-color: #f1f1f6">
                                    <div class="col-md mt-3 ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Supplier</label>
                                            <input type="text" class="form-control form-control-sm " name="supplier">
                                        </div>
                                    </div>
                                    <div class="col-md mt-3 ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">CP</label>
                                            <input type="text" class="form-control form-control-sm " name="cp">
                                        </div>
                                    </div>

                                    <div class="col-md mt-3">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Jenis</label>
                                            <input type="text" class="form-control form-control-sm " name="jenis">
                                        </div>
                                    </div>

                                    <div class="col-md mt-3">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Material</label>
                                            <input type="text" class="form-control form-control-sm " name="material">
                                        </div>
                                    </div>
                                    <div class="col-md mt-3">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Alamat</label>
                                            <input type="text" class="form-control form-control-sm " name="alamat">
                                        </div>
                                    </div>
                                </div>
                                <div class="row stretch-card " style="background-color: #f1f1f6">
                                    <div class="col-md mt-3 ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Email</label>
                                            <input type="text" class="form-control form-control-sm " name="email">
                                        </div>
                                    </div>
                                    <div class="col-md mt-3 ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Telp</label>
                                            <input type="text" class="form-control form-control-sm " name="telp">
                                        </div>
                                    </div>

                                    <div class="col-md mt-3">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Bank</label>
                                            <input type="text" class="form-control form-control-sm " name="bank">
                                        </div>
                                    </div>

                                    <div class="col-md mt-3">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Norek</label>
                                            <input type="text" class="form-control form-control-sm " name="rekening">
                                        </div>
                                    </div>
                                    <div class="col-md mt-3">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Lead Time</label>
                                            <input type="text" class="form-control form-control-sm " name="leadtime">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button type="button" id="submitForm"
                                        class="btn-rounded btn btn-gradient-info float-end mt-2">
                                        Submit
                                    </button>
                                </div>
                                <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                            </form>
                        </div>
                    </div>
                </div>


                <div class="">
                    <div class="card rounded-xl shadow">
                        <div class="card-body shadow border">
                            <h3 class="text-center py-2">List Supplier</h3>


                             <form action="" method="GET">
                            <div class="d-flex pb-2">
                                <input  name="search" type="search" class="form-control form-control-sm">
                                <button type="submit" class="btn btn-sm btn-gradient-success">Search</button>
                            </div>
                            </form>
                            <div class="table-responsive">
                                <style>
                                    th.sticky {
                                        position: sticky;
                                        left: 0;
                                        background-color: #f1f1f6;
                                    }
                                    td.sticky {
                                        position: sticky;
                                        left: 0;
                                        background-color: #f1f1f6;
                                    }
                                </style>
                                <table class="table">
                                    <thead>
                                        <tr class="" style="background-color: #f1f1f6">

                                            <th style="font-size: 14px; width: 40px" class="py-2 my-2 sticky"> S-code
                                            </th>
                                            <th style="font-size: 14px; " class="py-2 my-2"> Supplier </th>
                                            <th style="font-size: 14px" class="py-2 my-2"> CP </th>
                                            <th style="font-size: 14px" class="py-2 my-2"> Jenis </th>
                                            <th style="font-size: 14px" class="py-2 my-2"> Material </th>
                                            <th style="font-size: 14px" class="py-2 my-2"> Alamat </th>
                                            <th style="font-size: 14px" class="py-2 my-2"> Email </th>
                                            <th style="font-size: 14px" class="py-2 my-2"> Telp </th>
                                            <th style="font-size: 14px" class="py-2 my-2"> Bank </th>
                                            <th style="font-size: 14px" class="py-2 my-2"> Rekening </th>
                                            <th style="font-size: 14px" class="py-2 my-2"> Lead Time </th>
                                            <th style="font-size: 14px" class="py-2 my-2"> Created</th>
                                            <th style="font-size: 14px" class="py-2 my-2"> Manage </th>

                                        </tr>
                                    </thead>

                                    <tbody id="pricelistTableBody">
                                        @foreach ($supplier as $user)
                                         <tr>
                                        <div class="table-responsive">
                                            <style>
                                                td.sticky {
                                                    position: sticky;
                                                    left: 0;
                                                    background-color: #ffffff;
                                                }
                                            </style>
                                
                                            <td style="padding-top: 3px; padding-bottom:3px;" class="sticky">
                                                {{ $user->id }}</td>
                                
                                            <td style="padding-top: 3px; padding-bottom:3px;" class="">{{ $user->supplier }}</td>
                                            <td style="padding-top: 3px; padding-bottom:3px;" class="">{{ $user->cp }}</td>
                                            <td style="padding-top: 3px; padding-bottom:3px;" class="">{{ $user->jenis }}</td>
                                            <td style="padding-top: 3px; padding-bottom:3px;" class="">{{ $user->material }}</td>
                                            <td style="padding-top: 3px; padding-bottom:3px;" class="">{{ $user->alamat }}</td>
                                            <td style="padding-top: 3px; padding-bottom:3px;" class="">{{ $user->email }}</td>
                                            <td style="padding-top: 3px; padding-bottom:3px;" class="">{{ $user->telp }}</td>
                                            <td style="padding-top: 3px; padding-bottom:3px;" class="">{{ $user->bank }}</td>
                                            <td style="padding-top: 3px; padding-bottom:3px;" class="">{{ $user->rekening }}</td>
                                            <td style="padding-top: 3px; padding-bottom:3px;" class="">{{ $user->leadtime }}</td>
                                            <td style="padding-top: 3px; padding-bottom:3px;" class="">
                                                {{ \Carbon\Carbon::parse($user->created_at)->format('j M y') }}</td>
                                
                                
                                            <td style="padding-top: 3px; padding-bottom:3px;" class="d-flex ">
                                                <div class="dropdown">
                                                    <a class="btn btn-sm btn-gradient-info dropdown-toggle" href="#" role="button"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        Actions
                                                    </a>
                                
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="{{ route('supplier.edit', $user->id) }}">Edit</a></li>
                                                        <li><a class="dropdown-item" href="#">Approve</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                
                                    </tr>
                                        @endforeach
                                    </tbody>

                                   

                                </table>
                                <div class="pt-2">
                                    {{ $supplier->links() }}
                                </div>
                            </div>
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
                    alert('Produk berhasil ditambahkan');

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
