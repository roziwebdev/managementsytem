@extends('role.purchasing.layoutsmrmanager.main')
@section('main-container')
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
    <div class="main-panel">
        <div class="    content-wrapper" style="background-color: #f6f6fb">
<style>
  .container {
    display: flex;
    align-items: center;
  }
  .content {
    display: inline-block;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
    vertical-align: middle;
  }
  .readMoreButton {
    display: inline-block;
    vertical-align: middle;
    margin-left: 10px; /* Jarak antara teks dan tombol */
  }
</style>


            <div class="">
                  <div class="pb-5 ">
                            <div class="card rounded-xl shadow">
                            <div class="card- shadow border">
                                <div class="justify-content-center">
                              
                                <h3 class='text-center py-3'>REKAP DATA</h3>
                       
                                </div>
                                <div class="d-flex justify-content-center">
                                     <form method="GET" action="/inventorymgr/{{ $item->id }}">
                                <div class='row '>
                                 <div class="input-group mb-3 col">
                                  <span class="input-group-text" id="basic-addon1">Start Date</span>
                                  <input type="date" id="start_date" name="start_date" class="form-control form-control-sm">
                                </div>
                                <div class="input-group mb-3 col">
                                  <span class="input-group-text" id="basic-addon1">End Date</span>
                                  <input type="date" id="end_date" name="end_date" class="form-control form-control-sm">
                                </div>
                                    <div class="input-group mb-3 col">
                                      <label class="input-group-text" for="inputGroupSelect01">Month</label>
                                      <select class="form-select" id="month" name="month">
                                        <option value="">Choose Month</option>
                                            <option value="1">Januari</option>
                                            <option value="2">Februari</option>
                                            <option value="3">Maret</option>
                                            <option value="4">April</option>
                                            <option value="5">Mei</option>
                                            <option value="6">Juni</option>
                                            <option value="7">Juli</option>
                                            <option value="8">Agustus</option>
                                            <option value="9">September</option>
                                            <option value="10">Oktober</option>
                                            <option value="11">November</option>
                                            <option value="12">Desember</option>
                                      </select>
                                    </div>
                                    <div class="col ">
                                        <input type="submit" value="Filter" class="btn btn-info btn-md">
                                    </div>
                            </div>
                        </form>
                                </div>
                                <div class="d-flex justify-content-center fw-bold py-4">
                                <h4 class="px-4">Total Qty In : {{ $totalQtyIn }}</h4>
                                <h4 class="px-4">Total Qty Out : {{ $totalQtyOut }}</h4>
                                <h4 class="px-4">Total Stock : {{ $diff }}</h4>
                                </div>
                            </div>
                            </div>
                        </div>
                <div class="card rounded-xl shadow">
                    <div class="card-body shadow border">
                        <h3 class="text-center pb-3">Items In</h3>
                        <div class="table-responsive">
                            <style>
                                th.sticky {
                                    position: sticky;
                                    left: 0;
                                    background-color: #f1f1f6;
                                }
                            </style>
                            <table class="table" id="materialRequestTable">
                                <thead>
                                    <tr class="" style="background-color: #f1f1f6">
                                        <th style="font-size: 14px" class="py-2 my-2"> ITEM </th>
                                        <th style="font-size: 14px" class="py-2 my-2"> SPECS </th>
                                        <th style="font-size: 14px" class="py-2 my-2"> SIZE </th>
                                        <th style="font-size: 14px" class="py-2 my-2"> QTY IN</th>
                                        <th style="font-size: 14px" class="py-2 my-2"> LOCATION </th>
                                        <th style="font-size: 14px" class="py-2 my-2"> REMARKS </th>
                                        <th style="font-size: 14px" class="py-2 my-2"> DATE CREATED </th>
                                    </tr>
                                </thead>
                                <tbody id="pricelistTableBody">
                                    @foreach ($inventorylist as $data)
                                        <tr>
                                            <div class="table-responsive">
                                                <style>
                                                    td.sticky {
                                                        position: sticky;
                                                        left: 0;
                                                        background-color: #ffffff;
                                                    }

                                                    .ellipsis {
                                                        white-space: nowrap;
                                                        overflow: hidden;
                                                        text-overflow: ellipsis;
                                                        max-width: 30ch;
                                                        /* Atau sesuaikan dengan ukuran yang Anda inginkan */
                                                    }
                                                </style>



                                                <td style="padding-top: 4px; padding-bottom:4px;" class="">
                                                    {{ $data->item }}</td>
                                                <td style="padding-top: 4px; padding-bottom:4px;" class="">
                                                    {{ $data->specs }}</td>
                                                <td style="padding-top: 4px; padding-bottom:4px;" class="">
                                                    {{ $data->size }}</td>
                                                <td style="padding-top: 4px; padding-bottom:4px;" class="">
                                                    {{ $data->qty }}</td>
                                                <td style="padding-top: 4px; padding-bottom:4px;" class="">
                                                    {{ $data->lokasi }}</td>
                                                <td style="padding-top: 4px; padding-bottom:4px;" class="">
                                                    {{$data->remarks}}
                                                </td>
                                                <td style="padding-top: 4px; padding-bottom:4px;" class="">
                                                    {{ \Carbon\Carbon::parse($data->created_at)->format('j M y') }}</td>
                                            </div>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- <div class="pt-2">
                                {{ $materialrequests->links() }}
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="pt-5">
                <div class="card rounded-xl shadow">
                    <div class="card-body shadow border">
                        <h3 class="text-center pb-3">Items Out</h3>
                        <div class="table-responsive">
                            <style>
                                th.sticky {
                                    position: sticky;
                                    left: 0;
                                    background-color: #f1f1f6;
                                }
                            </style>
                            <table class="table" id="materialRequestTable">
                                <thead>
                                    <tr class="" style="background-color: #f1f1f6">
                                        <th style="font-size: 14px" class="py-2 my-2"> ITEM </th>
                                        <th style="font-size: 14px" class="py-2 my-2"> SPECS </th>
                                        <th style="font-size: 14px" class="py-2 my-2"> SIZE </th>
                                        <th style="font-size: 14px" class="py-2 my-2"> QTY OUT </th>
                                        <th style="font-size: 14px" class="py-2 my-2"> LOCATION </th>
                                        <th style="font-size: 14px" class="py-2 my-2"> REMARKS </th>
                                        <th style="font-size: 14px" class="py-2 my-2"> DATE CREATED </th>

                                    </tr>
                                </thead>
                                <tbody id="pricelistTableBody">
                                    @foreach ($inventorywd as $data)
                                        <tr>
                                            <div class="table-responsive">
                                                <style>
                                                    td.sticky {
                                                        position: sticky;
                                                        left: 0;
                                                        background-color: #ffffff;
                                                    }

                                                    .ellipsis {
                                                        white-space: nowrap;
                                                        overflow: hidden;
                                                        text-overflow: ellipsis;
                                                        max-width: 30ch;
                                                        /* Atau sesuaikan dengan ukuran yang Anda inginkan */
                                                    }
                                                </style>
                                                <td style="padding-top: 4px; padding-bottom:4px;" class="">
                                                    {{ $data->item }}</td>
                                                <td style="padding-top: 4px; padding-bottom:4px;" class="">
                                                    {{ $data->specs }}</td>
                                                <td style="padding-top: 4px; padding-bottom:4px;" class="">
                                                    {{ $data->size }}</td>
                                                <td style="padding-top: 4px; padding-bottom:4px;" class="">
                                                    {{ $data->qty }}</td>
                                                <td style="padding-top: 4px; padding-bottom:3px;" class="">
                                                    {{ $data->lokasi }}</td>
                                                 <td style="padding-top: 4px; padding-bottom:4px;" class="">
                                                    <div class="container">
                                                        <div class="content" data-full="{{ $data->remarks }}">
                                                          {{ $data->remarks }}
                                                        </div>
                                                        <span class="readMoreButton" style="display: none; cursor:pointer;"><a  class="text-primary" onclick="toggleReadMore(this)">Lihat Selengkapnya</a></span>
                                                      </div>
                                                </td>
                                                <td style="padding-top: 4px; padding-bottom:4px;" class="">
                                                    {{ \Carbon\Carbon::parse($data->created_at)->format('j M y') }}</td>



                                            </div>


                                        </tr>
                                    @endforeach
                                </tbody>


                            </table>
                            {{-- <div class="pt-2">
                                {{ $materialrequests->links() }}
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        
<script>
function toggleReadMore(button) {
  var content = button.closest('.container').querySelector('.content');
  var isFullText = content.dataset.fulltext === "true";

  if (isFullText) {
    content.textContent = content.dataset.truncated + '...';
    content.dataset.fulltext = "false";
    button.innerHTML = "Lihat Selengkapnya";
  } else {
    content.textContent = content.dataset.full;
    content.dataset.fulltext = "true";
    button.innerHTML = "Sembunyikan";
  }
}

window.onload = function() {
  var contents = document.querySelectorAll('.content');
  var buttons = document.querySelectorAll('.readMoreButton');

  contents.forEach(function(content, index) {
    var text = content.dataset.full;
    var truncatedText = text.slice(0, 30);

    if (text.length > 30) {
      content.textContent = truncatedText + '...';
      content.dataset.truncated = truncatedText;
      content.dataset.fulltext = "false";
      buttons[index].style.display = "inline";
    } else {
      content.textContent = text;
    }
  });
}
</script>
    @endsection
