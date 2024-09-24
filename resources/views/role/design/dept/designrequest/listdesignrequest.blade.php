@extends('role.purchasing.layoutsmrdept.main')
@section('main-container')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
<div class="main-panel">
    @foreach ($designrequests as $design)
    <!-- Modal untuk mengedit status -->
    <div class="modal fade" id="editInputModal{{ $design->id }}" tabindex="-1" role="dialog"
        aria-labelledby="editInputModalLabel{{ $design->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editInputModalLabel{{ $design->id }}">
                        File Production Layout
                    </h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('designrequest.update', $design->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="">
                            <input class="form-control  bg-light rounded-lg" type="file"  name="filelayout" required/>
                            <input type="hidden" id="newStatusLayout" name="newStatusLayout" value="Send"/>
                        </div>
                        <hr>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save
                            changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal untuk mengedit status -->
    <div class="modal fade" id="editStatusModal{{ $design->id }}" tabindex="-1" role="dialog"
        aria-labelledby="editStatusModalLabel{{ $design->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editStatusModalLabel{{ $design->id }}">
                        Send Design
                    </h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('updateStatusDesign', $design->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="">
                            <label class="btn btn-info ">
                                <input type="radio" value="Send" id="newStatus" name="newStatus" required/>
                                Send
                            </label>
                        </div>
                        <hr>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save
                            changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class=" content-wrapper" style="background-color: #f6f6fb">
        <div class="row" id='row'>
            <div class="">
                <div class="shadow card rounded-xl">
                    <div class="border shadow card-body">
                        <h3 class="pb-3 text-center">DESIGN REQUEST</h3>
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
                                        <th style="font-size: 14px; width:;" scope="col">ID</th>
                                        <th style="font-size: 14px; width:;" scope="col">Status</th>
                                        <th style="font-size: 14px; width:;" scope="col">Docket</th>
                                        <th style="font-size: 14px; width:;" scope="col">Product</th>
                                        <th style="font-size: 14px; width:;" scope="col">File Design</th>
                                        <th style="font-size: 14px; width:;" scope="col">File Layout</th>
                                        <th style="font-size: 14px; width:;" scope="col">Date Created</th>
                                        <th style="font-size: 14px;" scope="col" class="">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($designrequests as $designrequest)
                                    <tr>
                                        <td style="padding-top: 5px; padding-bottom: 5px">{{ $designrequest->id }}</td>
                                        <td style="padding-top: 5px; padding-bottom: 5px">
                                            @if($designrequest->statusdocket == 'Open' )
                                            <span class="material-symbols-outlined text-warning" style='font-size:18px'>
                                                error
                                            </span>
                                            @elseif ($designrequest->statusdocket == 'Send')
                                            <span class="material-symbols-outlined text-primary" style='font-size:18px'>
                                                hourglass_top
                                            </span>
                                            @elseif ($designrequest->statusdocket == 'Done')
                                            <span class="material-symbols-outlined text-success" style='font-size:18px'>
                                                check_circle
                                            </span>
                                            @endif
                                        </td>
                                        <td style="padding-top: 5px; padding-bottom: 5px">{{ $designrequest->designno }}</td>
                                        <td style="padding-top: 5px; padding-bottom: 5px">{{ $designrequest->product }}</td>
                                        <td style="padding-top: 5px; padding-bottom: 5px">
                                            @if(isset($designrequest->filedesign) )
                                                <button class="badge btn-success rounded" style="width:90px">Uploaded</button>
                                            @else
                                                <button class="badge btn-info rounded" style="width:90px" onclick="document.getElementById('fileInput').click();">Unuploaded</button>
                                            @endif
                                        </td>
                                        <td style="padding-top: 5px; padding-bottom: 5px">
                                            @if($designrequest->filelayout != null && $designrequest->statuslayout == 'Approve')
                                            <button class="badge btn-success rounded" style="width:90px">Uploaded</button>
                                            @elseif ($designrequest->filelayout != null && $designrequest->statuslayout == 'Send')
                                            <button class="badge btn-warning rounded" style="width:90px">Send</button>
                                            @else
                                            <button class="badge btn-info rounded" style="width:90px" data-bs-toggle="modal" data-bs-target="#editInputModal{{ $designrequest->id }}">Unuploaded</button>
                                            @endif
                                        </td>
                                        <td style="padding-top: 5px; padding-bottom: 5px">{{ $designrequest->created_at }}</td>
                                        <td style="padding-top: 5px; padding-bottom:5px;" class="d-flex ">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-gradient-primary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    Manage
                                                </a>
                                                <ul class="dropdown-menu">
                                                    @if ($designrequest->statusdocket == 'Open')
                                                        <li>
                                                            <button class="dropdown-item" data-bs-toggle="modal"
                                                                data-bs-target="#editStatusModal{{ $designrequest->id }}">Approve
                                                            </button>
                                                        </li>
                                                    @endif
                                                    <li>
                                                        <a class="dropdown-item" href="">
                                                            Download
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div class="mt-2">
                            {{-- {{ $designrequests->appends(request()->query())->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>




    @endsection