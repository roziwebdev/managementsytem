@extends('role.purchasing.layouts.main')
@section('main-container')
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
    <div class="main-panel">
        <div class="    content-wrapper" style="background-color: #f6f6fb">
            <div class="row ">
                <div class="col-12 stretch-card grid-margin">
                    <div class="card border rounded">
                        <div class="card-body shadow  border rounded">
                            <h4 class="card-title mb-3">Form Pricelist</h4>
                            <form class="form-sample" method="POST" action="{{ route('pricelist.store') }}" id="pricelistForm">
                                @csrf
                                <div class="row stretch-card " style="background-color: #f1f1f6">
                                    <div class="col-md mt-3 ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Item</label>
                                            <input type="text" class="form-control form-control-sm " name="item">
                                        </div>
                                    </div>

                                    <div class="col-md mt-3">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Specs</label>
                                            <input type="text" class="form-control form-control-sm " name="specs">
                                        </div>
                                    </div>

                                    <div class="col-md mt-3">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Sizes</label>
                                            <input type="text" class="form-control form-control-sm " name="size">
                                        </div>
                                    </div>
                                </div>
                                <div class="row stretch-card " style="background-color: #f1f1f6">
                                    <div class="col-md mt-3 ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Type</label>
                                            <input type="text" class="form-control form-control-sm " name="type">
                                        </div>
                                    </div>

                                    <div class="col-md mt-3">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Unit</label>
                                            <input type="text" class="form-control form-control-sm " name="unit">
                                        </div>
                                    </div>

                                    <div class="col-md mt-3">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Serat</label>
                                            <input type="text" class="form-control form-control-sm " name="serat" list="serat">
                                            <datalist id="serat">
                                                <option value="&harr;">
                                                <option value="&#8597;">
                                            </datalist>
                                        </div>
                                    </div>
                                    <div class="col-md mt-3">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Price</label>
                                            <input type="text" class="form-control form-control-sm " name="price">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button type="button" id="submitForm" 
                                        class="btn-rounded btn btn-gradient-info float-end mt-2">
                                        Submit
                                    </button>
                                </div>
                            
                            </form>
                        </div>
                    </div>
                </div>


                <div class="">
                    <div class="card rounded-xl shadow">
                        <div class="card-body shadow border">
                            <h3 class="text-center pb-3">PRICELIST</h3>
                            
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
                                </style>
                                <table class="table">
                                    <thead>
                                        <tr class="" style="background-color: #f1f1f6">

                                            <th style="font-size: 14px; width: 40px" class="py-2 my-2 sticky"> I-code </th>
                                            <th style="font-size: 14px;" class="py-2 my-2 "> Item </th>
                                            <th style="font-size: 14px; " class="py-2 my-2"> Type </th>
                                            <th style="font-size: 14px; " class="py-2 my-2"> Price </th>
                                            <th style="font-size: 14px" class="py-2 my-2"> Specs </th>
                                            <th style="font-size: 14px" class="py-2 my-2"> Size </th>
                                            <th style="font-size: 14px" class="py-2 my-2"> Unit </th>
                                            <th style="font-size: 14px" class="py-2 my-2"> Created </th>
                                            <th style="font-size: 14px" class="py-2 my-2"> Manage </th>

                                        </tr>
                                    </thead>

                                    <tbody id="pricelistTableBody">
                                        @foreach ($pricelist as $user)
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
                                                    <td style="padding-top: 3px; padding-bottom:3px;" class="">
                                                        {{ $user->item }}</td>
                                                    <td style="padding-top: 3px; padding-bottom:3px;" class="">
                                                        {{ $user->type }}</td>
                                                    <td style="padding-top: 3px; padding-bottom:3px;" class="">
                                                        {{ $user->price }}</td>
                                                    <td style="padding-top: 3px; padding-bottom:3px;" class="">
                                                        {{ $user->specs }}</td>
                                                    <td style="padding-top: 3px; padding-bottom:3px;" class="">
                                                        {{ $user->size }}</td>
                                                    <td style="padding-top: 3px; padding-bottom:3px;" class="">
                                                        {{ $user->unit }}</td>
                                                    <td style="padding-top: 3px; padding-bottom:3px;" class="">
                                                        {{ \Carbon\Carbon::parse($user->created_at)->format('j M y') }}</td>
                                        
                                        
                                                    <td style="padding-top: 3px; padding-bottom:3px;" class="d-flex ">
                                                        <div class="dropdown">
                                                            <a class="btn btn-sm btn-gradient-info dropdown-toggle" href="#" role="button"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                Actions
                                                            </a>
                                        
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" href="{{route('pricelist.edit', $user->id)}}">Edit</a></li>
                                                                <li>
                                                                    <form action="{{ route('pricelist.destroy', $user->id)}}">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button type="submit" class="dropdown-item">Delete</button>
                                                                    </form>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                        
                                        </tr>
                                        @endforeach
                                    </tbody>

                                    
                                    </div>
                                    


                                </table>
                                <div class="pt-2">
                                    {{ $pricelist->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- content-wrapper ends -->
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
                        "<td style='padding-top: 3px; padding-bottom:3px;'>" + response.item + "</td>" +
                        "<td style='padding-top: 3px; padding-bottom:3px;'>" + response.type + "</td>" +
                        "<td style='padding-top: 3px; padding-bottom:3px;'>" + response.price + "</td>" +
                        "<td style='padding-top: 3px; padding-bottom:3px;'>" + response.specs + "</td>" +
                        "<td style='padding-top: 3px; padding-bottom:3px;'>" + response.size + "</td>" +
                        "<td style='padding-top: 3px; padding-bottom:3px;'>" + response.unit + "</td>" +
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
