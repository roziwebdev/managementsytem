@extends('role.purchasing.layouts.main')
@section('main-container')
    <style>
        table td,
        table th {
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
        }

        thead th {
            color: #fff;
        }

        .card {
            border-radius: .5rem;
        }

        .table-scroll {
            border-radius: .5rem;
        }

        .table-scroll table thead th {
            font-size: 1rem;
        }

        thead {
            top: 0;
            position: sticky;
        }
    </style>
    <main class="content">
        <div class="container-fluid p-0">
            <div class="d-flex justify-content-between">
                <h1 class="h2 mb-3"><strong>Create</strong> Purchasing Order</h1>
            </div>
            <br />


            <section class="intro">
                <div class="bg-image h-100" style="background-color: #f5f7fa;">
                    <div class="mask d-flex align-items-center h-100">
                        <div class="container">

                            <form action="{{ route('search') }}" method="GET">
                                <div class="input-group" style="margin-bottom:50px;">
                                    <input name="keyword" value="{{ request('keyword') }}" type="search"
                                        class="form-control rounded" placeholder="Your PO" aria-label="Search"
                                        aria-describedby="search-addon" />
                                    <button type="submit" class="btn btn-outline-primary"><i class="align-middle"
                                            data-feather="search"></i></button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </section>

        </div>
    </main>
@endsection
