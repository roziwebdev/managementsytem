@extends('role.prodev.layouts.main')
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
        <style>
            #myForm {
                display: none;
            }
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <div class="row" id='row'>
            <div class="">
                <div class="shadow card rounded-xl">
                    <div class="border shadow card-body">
                        <h3 class="pb-3 text-center">JOB ORDER</h3>
                        <div class="py-3 d-flex">
                            <div class="dropdown">
                                <a class="px-5 btn btn-sm btn-dark dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    SORT
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="/prodev/listjob" class="dropdown-item ">
                                            <span class="px-2 align-middle material-symbols-outlined"
                                                style="font-size: 20px">
                                                clear_all
                                            </span>Clear
                                        </a>
                                    </li>
                                    <li>
                                        <form action="" method="GET" novalidate="novalidate">
                                            <input type="hidden" name="sort_by" value="asc">
                                            <button type="submit" class="dropdown-item ">
                                                <span class="px-2 align-middle material-symbols-outlined"
                                                    style="font-size: 20px">
                                                    text_rotate_up
                                                </span>Ascending
                                            </button>
                                        </form>
                                    </li>
                                    <li>
                                        <form action="" method="GET" novalidate="novalidate">
                                            <input type="hidden" name="sort_by" value="desc">
                                            <button type="submit" class="dropdown-item ">
                                                <span class="px-2 align-middle material-symbols-outlined"
                                                    style="font-size: 20px">
                                                    text_rotation_down
                                                </span>Descending
                                            </button>
                                        </form>
                                    </li>



                                </ul>
                            </div>
                        </div>
                        <form action="{{ route('job.jobindex') }}" method="GET" novalidate="novalidate">
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
                                        <th style="font-size: 14px; width:20px;" scope="col" class="sticky">JOB</th>
                                        <th style="font-size: 14px;" scope="col" class="">SC</th>
                                        <th style="font-size: 14px;" scope="col" class="">STS</th>
                                        <th style="font-size: 14px;" scope="col" class="">PRODUCT</th>
                                        <th style="font-size: 14px;" scope="col" class="">PO</th>
                                        <th style="font-size: 14px;" scope="col" class="">TANGGAL TERIMA</th>
                                        <th style="font-size: 14px;" scope="col" class="">TANGGAL JOB</th>
                                        <th style="font-size: 14px;" scope="col" class="">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($job as $data)
                                    <tr>
                                        <td style="font-size: 14px; width:20px; padding-top:2px; padding-bottom:2px;"
                                            scope="col" class="sticky">{{ $data->id}}</td>
                                        <td style="padding-top:2px; padding-bottom:2px;">{{ $data->nosc}}</td>
                                        <td style="padding-top:2px; padding-bottom:2px;">{{ $data->statusjob }}</td>
                                        <td style="padding-top:2px; padding-bottom:2px;">{{ $data->product}}</td>
                                        <td style="padding-top:2px; padding-bottom:2px;">{{ $data->po}}</td>
                                        <td style="padding-top:2px; padding-bottom:2px;">{{ \Carbon\Carbon::parse($data->tanggalterima)->format('j M y')}}</td>
                                        <td style="padding-top:2px; padding-bottom:2px;">{{ \Carbon\Carbon::parse($data->created_at)->format('j M y')}}</td>

                                        <td style="padding-top: 3px; padding-bottom:3px;" class="d-flex ">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-primary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    Manage
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModalToggle{{ $data->id }}">Detail</a></li>
                                                    <li><a class="dropdown-item" href="{{ route('job.edit', $data->id) }}">Edit</a></li>
                                                    <li><a class="dropdown-item" href="{{ route('job.print', $data->id) }}">Print</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="exampleModalToggle{{ $data->id }}" aria-hidden="true"
                                        aria-labelledby="exampleModalToggleLabel{{ $data->id }}" tabindex="-1">
                                        @include('role.prodev.prodevdept.job.show', ['details' => $data])
                                    </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-3">
                            {{ $job->appends(request()->query())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





@endsection
