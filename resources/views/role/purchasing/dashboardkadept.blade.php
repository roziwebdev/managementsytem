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
            <div class="row">
                <div class="col-md stretch-card grid-margin">
                    <div class="text-white card bg-gradient-danger card-img-holder">
                        <div class="card-body">
                            <img src="{{ URL::asset ('frontend/assets/images/dashboard/circle.svg') }}"
                                class="card-img-absolute" alt="circle-image" />
                            <h5 class="mb-4 font-weight-normal">Weekly Sales <i
                                    class="float-right mdi mdi-chart-line mdi-24px"></i>
                            </h5>
                            <h4 class="mb-3">This Week : Rp. {{ number_format($dataprice['totalPriceThisWeek'], 0, ',', '.')
                                }}</h4>
                            <h4 class="mb-3">Last Week : Rp. {{ number_format($dataprice['totalPriceLastWeek'], 0, ',', '.')
                                }}</h4>
                            <h6 class="card-text">Percentage by {{ $dataprice['percentageChange'] }}%</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md stretch-card grid-margin">
                    <div class="text-white card bg-gradient-info card-img-holder">
                        <div class="card-body">
                            <img src="{{ URL::asset ('frontend/assets/images/dashboard/circle.svg') }}"
                                class="card-img-absolute" alt="circle-image" />
                            <h5 class="mb-4 font-weight-normal">Weekly SC <i
                                    class="float-right mdi mdi-bookmark-outline mdi-24px"></i>
                            </h5>
                            <h4 class="mb-3">This Week : {{ $data['dataThisWeek'] }}</h4>
                            <h4 class="mb-3">Last Week : {{ $data['dataLastWeek'] }}</h4>
                            <h6 class="card-text">Percentage by {{ $data['percentageChange'] }}%</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
