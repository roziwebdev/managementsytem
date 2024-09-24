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
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                            $("#myButton").click(function(){
                                $("#myForm").fadeToggle();
                            });
                        });
        </script>
        <div id="myButton" class="py-2 justify-content-end d-flex">
            <button class="btn btn-info">Add Packaging</button>
        </div>
        <div class="row" id='row'>
            <div class="col-12 stretch-card grid-margin" id="myForm">
                <div class="border rounded card">
                    <div class="border rounded shadow card-body">
                        <h4 class="mb-3 card-title">Form New Packaging</h4>
                        <form class="form-sample" method="POST" action="{{ route('kadeptpackaging.store') }}" id="pricelistForm">
                            @csrf
                            <div class="shadow row" style="background-color: #f1f1f6">
                                <div class="mt-3 col-md ">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">PN</label>
                                        <input type="text" class="form-control form-control-sm" name="pn" required>
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Docket</label>
                                        <input type="text" class="form-control form-control-sm " name="designno"
                                            placeholder="" required>
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">Product</label>
                                        <input type="text" class="form-control form-control-sm " name="product"
                                            placeholder="" required>
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">SAP</label>
                                        <input type="text" class="form-control form-control-sm " name="sap"
                                            placeholder="" required>
                                    </div>
                                </div>
                            </div>
                            <div class="shadow row " style="background-color: #f1f1f6">
                                <div class="mt-3 col-md ">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">NW PCS GR</label>
                                        <input type="text" class="form-control form-control-sm" name="nwpcs" required>
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">ISI BOX</label>
                                        <input type="text" class="form-control form-control-sm " name="isibox"
                                            placeholder="" required>
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">NW BOX KG</label>
                                        <input type="text" class="form-control form-control-sm " name="boxkg"
                                            placeholder="" required>
                                    </div>
                                </div>
                                <div class="mt-3 col-md">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold ">BOX NAME</label>
                                        <input type="text" class="form-control form-control-sm " name="boxname" id="inputBox"
                                            placeholder="" required list="box">
                                            <datalist id="box">
                                                @foreach ($boxes as $box )
                                                    <option value="{{ $box->boxname }}">
                                                @endforeach
                                            </datalist>
                                        <input type="hidden" class="form-control form-control-sm " name="boxspecs" id="getSpecs">
                                        <input type="hidden" class="form-control form-control-sm " name="boxsize" id="getSize">
                                    </div>
                                </div>
                            </div>
                            <div class="shadow row " style="background-color: #f1f1f6">
                                <div class="mt-3 col-md ">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Effective Date</label>
                                        <input type="date" class="form-control form-control-sm" name="effective" required>
                                    </div>
                                </div>
                                <div class="mt-3 col-md ">
                                    <div class="mb-3" style="font-size: 14px">
                                        <label for="" class="form-label fw-bold">Status</label>
                                        <select class="form-select" name="status">
                                            <option value="Active" selected>Active</option>
                                            <option value="Discontinue">Discontinue</option>
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
            <div class="">
                <div class="shadow card rounded-xl">
                    <div class="border shadow card-body">
                        <h3 class="pb-3 text-center">PACKAGING LIST</h3>
                        <form action="" method="GET" novalidate="novalidate">
                            <div class="pb-2 d-flex">
                                <input type="text" name="search" type="search" class="form-control form-control-sm">
                                <button type="submit" class="btn btn-sm btn-gradient-success ">Search</button>
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
                                    background-color: #ffffff;
                                }
                            </style>
                            <table class="table" id="materialRequestTable">
                                <thead>
                                    <tr style="background-color: #f1f1f6">
                                        <th style="font-size: 14px; width:20px;" scope="col" class="sticky">PN</th>
                                        <th style="font-size: 14px;" scope="col" class="">DOCKET</th>
                                        <th style="font-size: 14px;" scope="col" class="">PRODUCT</th>
                                        <th style="font-size: 14px;" scope="col" class="">SAP</th>
                                        <th style="font-size: 14px;" scope="col" class="">NW @PCS (Gr)</th>
                                        <th style="font-size: 14px;" scope="col" class="">ISI @BOX</th>
                                        <th style="font-size: 14px;" scope="col" class="">NW @BOX (Kg)</th>
                                        <th style="font-size: 14px;" scope="col" class="">BOX CODE</th>
                                        <th style="font-size: 14px;" scope="col" class="">BOX NAME</th>
                                        <th style="font-size: 14px;" scope="col" class="">BOX SPECS</th>
                                        <th style="font-size: 14px;" scope="col" class="">BOX SIZE</th>
                                        <th style="font-size: 14px;" scope="col" class="">EFFECTIVE DATE</th>
                                        <th style="font-size: 14px;" scope="col" class="">STATUS</th>
                                        <th style="font-size: 14px;" scope="col" class="">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($packagings as $packaging )
                                    <tr>
                                        <td style="font-size: 14px; width:20px; padding-top:2px; padding-bottom:2px;" scope="col" class="sticky">{{ $packaging->pn }}</td>
                                        <td style="font-size: 14px; width:20px; padding-top:2px; padding-bottom:2px;">{{ $packaging->designno }}</td>
                                        <td style="font-size: 14px; width:20px; padding-top:2px; padding-bottom:2px;">{{ $packaging->product }}</td>
                                        <td style="font-size: 14px; width:20px; padding-top:2px; padding-bottom:2px;">{{ $packaging->sap }}</td>
                                        <td style="font-size: 14px; width:20px; padding-top:2px; padding-bottom:2px;">{{ $packaging->nwpcs }}</td>
                                        <td style="font-size: 14px; width:20px; padding-top:2px; padding-bottom:2px;">{{ $packaging->isibox }}</td>
                                        <td style="font-size: 14px; width:20px; padding-top:2px; padding-bottom:2px;">{{ $packaging->boxkg }}</td>
                                        <td style="font-size: 14px; width:20px; padding-top:2px; padding-bottom:2px;">{{ $packaging->boxcode }}</td>
                                        <td style="font-size: 14px; width:20px; padding-top:2px; padding-bottom:2px;">{{ $packaging->boxname }}</td>
                                        <td style="font-size: 14px; width:20px; padding-top:2px; padding-bottom:2px;">{{ $packaging->boxspecs }}</td>
                                        <td style="font-size: 14px; width:20px; padding-top:2px; padding-bottom:2px;">{{ $packaging->boxsize }}</td>
                                        <td style="font-size: 14px; width:20px; padding-top:2px; padding-bottom:2px;">{{ $packaging->effective }}</td>
                                        <td style="font-size: 14px; width:20px; padding-top:2px; padding-bottom:2px;">{{ $packaging->status }}</td>
                                        <td style="font-size: 14px; width:20px; padding-top:2px; padding-bottom:2px;">
                                            <button class="btn btn-primary btn-sm">
                                                Manage
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="pt-4">
                            {{ $packagings->appends(request()->query())->links()}}
                        </div>
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