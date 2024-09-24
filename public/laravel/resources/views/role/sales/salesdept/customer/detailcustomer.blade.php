<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Profile {{ $customer->customer }} </title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/styleprofile.css') }}">
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body style="background: #f1f2f7; color:#797979;">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />
    <div class="container bootstrap snippets bootdey">
        <div class="row">
            <div class="profile-nav col-md-3">
                <div class="panel">
                    <div class="user-heading round">
                        <a href="#">
                            @if(isset($customer->image))
                            <img src="{{ asset('storage/company/imagecustomer/' . $customer->image) }}" alt="{{ $customer->customer }}">
                            @else
                            <img src="{{ asset('storage/company/imagecustomer/noimage.jpg') }}" alt="{{ $customer->customer }}">
                            @endif
                        </a>
                        <h1 style="font-weight: bold">{{ $customer->kodecust }}</h1>
                    </div>
                    <ul class="nav nav-pills nav-stacked">
                        <li class="">
                            <a href="{{ '/sales/customer' }}"> <i class="fa fa-home"></i> Home</a>
                        </li>
                        <li class="active">
                            <a href="#"> <i class="fa fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="{{ route('customer.edit', $customer->id) }}"> <i class="fa fa-edit"></i> Edit profile</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="profile-info col-md-9">
                <div class="panel">
                    <div class="bio-graph-heading" style="font-size: 20px; font-weight: bold">
                        {{ $customer->customer }}
                    </div>
                    <div class="panel-body bio-graph-info">
                        <h1>Profile</h1>
                        <div class="row">
                            <div class="bio-row">
                                <p><span style="font-weight: bold">Company </span>: {{ $customer->customer }}</p>
                            </div>
                            <div class="bio-row">
                                <p><span style="font-weight: bold">Client </span>: {{ $customer->up }}</p>
                            </div>
                            <div class="bio-row">
                                <p><span style="font-weight: bold">Phone </span>: {{ $customer->phone }}</p>
                            </div>
                            <div class="bio-row">
                                <p><span style="font-weight: bold">Email </span>: {{ $customer->email }}</p>
                            </div>
                            <div class="bio-row">
                                <p><span style="font-weight: bold">NPWP </span>: {{ $customer->npwp }}</p>
                            </div>
                            <div class="bio-row">
                            @if(isset ($poterakhir->tanggalpo))
                                <p><span style="font-weight: bold">Last Order </span>: {{\Carbon\Carbon::parse($poterakhir->tanggalpo)->format('d M y')}}</p>
                            @else
                                <p><span style="font-weight: bold">Last Order </span>: No Order</p>
                            @endif
                            </div>
                            <div class="bio-row">
                                <p><span style="font-weight: bold">Created</span>: {{ \Carbon\Carbon::parse($customer->created_at)->format('d M y ') }}</p>
                            </div>
                            <div class="bio-row">
                                <p><span style="font-weight: bold">Updated</span>: {{ \Carbon\Carbon::parse($customer->updated_at)->format('d M y ') }}</p>
                            </div>
                            <div class="bio-row2">
                                <p><span style="font-weight: bold">Address </span>: {{ $customer->address }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="row">
                <div class="col-md-6">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="bio-chart">
                                <div style="display: inline; width: 100px; height: 100px">
                                </div>
                            </div>
                            <div class="bio-desk">
                                <h4 class="red">Last Purchase Order</h4>
                                <!-- <p>Started : 15 July</p>
                                <p>Deadline : 15 August</p> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="bio-chart">
                                <div style="display: inline; width: 100px; height: 100px">
                                </div>
                            </div>
                            <div class="bio-desk">
                                <h4 class="terques">Total Purchase Order</h4>
                                <!-- <p>Started : 15 July</p>
                  <p>Deadline : 15 August</p> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel">
            <div class="panel-body">
                <div class="table-responsive">
                    <h3 class="text-center" style="font-weight: bold">PURCHASE ORDER</h3>
                          <form action="" method="GET" novalidate="novalidate">
                            <div class="" style="padding-top:10px; padding-bottom:20px; display: flex">
                                <input type="text" name="search" type="search" class="form-control form-control-sm">
                                <button type="submit" class="btn btn-sm btn-gradient-success ">Search</button>
                            </div>
                        </form>
                    <table class="table">
                        <thead class="" style="background-color: #adb5bd; color:#f1f2f7">
                            <tr>
                                <th>NO SC</th>
                                <th>PO</th>
                                <th>Product</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($purchase as $index => $po )
                            @php
                            $products = json_decode($po->product);
                            $qtys = json_decode($po->qty);
                            $prices = json_decode($po->price);
                            $totals = json_decode($po->total);
                            $combinedData =array_map(null,$products,$qtys,$prices,$totals);
                            @endphp
                            @foreach ($combinedData as $data )
                                <tr>
                                    <td>{{ $po->id}}</td>
                                    <td>{{ $po->po }}</td>
                                    <td>{{ $data[0]}}</td>
                                    <td>{{ $data[1] }}</td>
                                    <td>{{ $data[2] }}</td>
                                    <td>{{ \Carbon\Carbon::parse($po->tanggalpo)->format('j M y') }}</td>
                                </tr>
                            @endforeach
                            @endforeach
                        </tbody>
                    </table>
                   <div>
                </div>
            </div>
            <div style="float: right;">
                {{ $purchase->appends(request()->query())->links('vendor.pagination.bootstrap-5') }}
            </div>
            </div>
        </div>
    </div>
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script type="text/javascript"></script>
</body>

</html>