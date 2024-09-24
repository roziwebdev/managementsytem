@extends('role.purchasing.layoutmrkadept.main')
@section('main-container')


<link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" /> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>    
<div class="main-panel">
    <style>
        p{
                font-family: "Inter", sans-serif;
                font-optical-sizing: auto;
                font-weight: <weight>;
                    font-style: normal;
                    font-variation-settings:
                    "slnt" 0;
        }
        .table-responsive1 {
        overflow-y: auto;
        max-height: 400px; /* Atur ketinggian maksimum jika diperlukan */
        }

        /* Atur posisi dan z-index untuk thead */
        .table1 thead th {
        background-color: #F0F0F0;
        position: sticky;
        top: 0;
        z-index: 100; /* Atur z-index untuk memastikan thead di atas konten tabel */
        }

        /* Atur z-index konten tabel agar berada di bawah thead yang ditempel */
        .table1 tbody {
        position: relative;
        z-index: 0;
        }
    </style>
    @foreach ( $job as $data )
        <div class="modal fade" id="exampleModalToggle{{ $data->id }}" aria-hidden="true"
            aria-labelledby="exampleModalToggleLabel{{ $data->id }}" tabindex="-1">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header pt-1 pb-0 mb-0">
                        <div class="text-center container-xl pb-0 mb-0">
                            <h1 class="text-center modal-title" style="font-size: 25px" id="exampleModalToggleLabel{{ $data->id }}">JOB ORDER</h1>
                        </div>
                        <button type="button" class="float-end btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body pb-4">
                        <div class="container-xl">
                            <div class="border shadow border-secondary" style="background:#F0F0F0">
                                <div class="container">
                                    <div class="">
                                        <p style="font-size:18px" class="fw-bold py-2 mb-1">Sales Contract - {{ $data->nosc }}</p>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg">
                                            <p  style="font-size:14px" class="mb-1"><span style="font-weight: 600">Purchase Order &nbsp;&nbsp;&nbsp;:</span>
                                                 <a style="text-decoration:none;" href="{{ asset('storage/path/to/your/image/' . $data->fileponoprice) }}" target="_blank">
                                                    {{ $data->po }}
                                                </a>
                                            </p>
                                            <p  style="font-size:14px" class="mb-1"><span style="font-weight: 600">Customer &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </span>{{ $data->customer }}</p>
                                            <p  style="font-size:14px" class="mb-1"><span style="font-weight: 600">Plant &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span> {{ $data->plantcode }}</p>
                                            <p  style="font-size:14px" class="mb-1"><span style="font-weight: 600">Due Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span> {{ \Carbon\Carbon::parse($data->etauser)->format('j M y')}}</p>
                                        </div>
                                        <div class="col-lg">
                                            <p  style="font-size:14px" class="mb-1"><span style="font-weight: 600">Product &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span> {{ $data->product }}</p>
                                            <p  style="font-size:14px" class="mb-1"><span style="font-weight: 600">SAP &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span> {{ $data->sap }}</p>
                                            <p  style="font-size:14px" class="mb-1"><span style="font-weight: 600">Quantity &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span> {{ $data->qty }} {{ $data->unit }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="border border-black" style="background: rgb(255, 255, 255)">
                                    <div class="container-xl border " style="height:450px">
                                        <div class="py-4 " >
                                            <div class="border shadow-sm table-responsive table-responsive1" style="height:400px">
                                                <table class="table table1 table-bordered border-secondary">
                                                    <thead class="">
                                                        <tr style="background:#F0F0F0; top:10px" class="">
                                                            <th class="pt-2 pb-2 col-sm-4 fw-bold">Information (Packaging, Color, Specs)</th>
                                                            <th class="pt-2 pb-2 col-sm-8 fw-bold">Value</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr style="" class="table-secondary">
                                                            <td  class="pt-2 pb-2 fst-italic" style="font-weight: 600" colspan="2">Information</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">JOB Number </td>
                                                            <td class="pt-2 pb-2 col-sm-8">{{ $data->id }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">JOB Date </td>
                                                            <td class="pt-2 pb-2 col-sm-8">{{ \Carbon\Carbon::parse($data->created_at)->format('j M y')}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">File Received Date </td>
                                                            <td class="pt-2 pb-2 col-sm-8">{{ \Carbon\Carbon::parse($data->tanggalterima)->format('j M y')}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">Docket </td>
                                                            <td class="pt-2 pb-2 col-sm-8">{{ $data->designno }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">Status Design </td>
                                                            <td class="pt-2 pb-2 col-sm-8">{{ $data->statusdesign }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">Original </td>
                                                            <td class="pt-2 pb-2 col-sm-8">{{ $data->original }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">Design </td>
                                                            <td class="pt-2 pb-2 col-sm-8">{{ $data->design }}</td>
                                                        </tr>
                                                        <tr style="" class="table-secondary">
                                                            <td class="pt-2 pb-2 fst-italic " style="font-weight: 600" colspan="2">Specification Product</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">Finishing Specs</td>
                                                            <td class="pt-2 pb-2 col-sm-8">{{ $data->finishing }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">Actual Proses </td>
                                                            <td class="pt-2 pb-2 col-sm-8">{{ $data->finishingjob }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">Application </td>
                                                            <td class="pt-2 pb-2 col-sm-8">{{ $data->aplikasi }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">Up :</td>
                                                            <td class="pt-2 pb-2 col-sm-8">{{ $data->up }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">Layout </td>
                                                            <td class="pt-2 pb-2 col-sm-8">{{ $data->layout }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">Uk Press Layout </td>
                                                            <td class="pt-2 pb-2 col-sm-8">{{ $data->ukpresslayout }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">Material 1 </td>
                                                            <td class="pt-2 pb-2 col-sm-8">{{ $data->mat1 }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">Material 2 </td>
                                                            <td class="pt-2 pb-2 col-sm-8">{{ $data->mat2 }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">Material 3 </td>
                                                            <td class="pt-2 pb-2 col-sm-8">{{ $data->mat3 }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">Arah Serat 1 </td>
                                                            <td class="pt-2 pb-2 col-sm-8">{{ $data->as1 }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">Arah Serat 2 </td>
                                                            <td class="pt-2 pb-2 col-sm-8">{{ $data->as2 }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">Arah Serat 3 </td>
                                                            <td class="pt-2 pb-2 col-sm-8">{{ $data->as3 }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">Pisau </td>
                                                            <td class="pt-2 pb-2 col-sm-8">{{ $data->pisau }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">Citto </td>
                                                            <td class="pt-2 pb-2 col-sm-8">{{ $data->citto }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">Emboss</td>
                                                            <td class="pt-2 pb-2 col-sm-8">{{ $data->emboss }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">Hotprint</td>
                                                            <td class="pt-2 pb-2 col-sm-8">{{ $data->hotprint }}</td>
                                                        </tr>
                                                        <tr style="" class="table-secondary">
                                                            <td class="pt-2 pb-2 fst-italic " style="font-weight: 600" colspan="2">Color</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">Actual Color</td>
                                                            <td class="pt-2 pb-2 col-sm-8">{{ $data->actcolor }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">Acuan Warna</td>
                                                            <td class="pt-2 pb-2 col-sm-8">{{ $data->acuanwarna }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">Front 1</td>
                                                            <td class="pt-2 pb-2 col-sm-8">{{ $data->f1 }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">Front 2</td>
                                                            <td class="pt-2 pb-2 col-sm-8">{{ $data->f2 }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">Front 3</td>
                                                            <td class="pt-2 pb-2 col-sm-8">{{ $data->f3 }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">Front 4</td>
                                                            <td class="pt-2 pb-2 col-sm-8">{{ $data->f4 }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">Front 5</td>
                                                            <td class="pt-2 pb-2 col-sm-8">{{ $data->f5 }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">Front 6</td>
                                                            <td class="pt-2 pb-2 col-sm-8">{{ $data->f6 }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">Back 1</td>
                                                            <td class="pt-2 pb-2 col-sm-8">{{ $data->b1 }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">Back 2</td>
                                                            <td class="pt-2 pb-2 col-sm-8">{{ $data->b2 }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">Back 3</td>
                                                            <td class="pt-2 pb-2 col-sm-8">{{ $data->b3 }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">Back 4</td>
                                                            <td class="pt-2 pb-2 col-sm-8">{{ $data->b4 }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">Back 5</td>
                                                            <td class="pt-2 pb-2 col-sm-8">{{ $data->b5 }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">Back 6</td>
                                                            <td class="pt-2 pb-2 col-sm-8">{{ $data->b6 }}</td>
                                                        </tr>
                                                        <tr style="" class="table-secondary">
                                                            <td class="pt-2 pb-2 fst-italic fw-bold" colspan="2">Packaging</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">No Packaging System</td>
                                                            <td class="pt-2 pb-2 col-sm-8">{{ $data->nops }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">Packaging</td>
                                                            <td class="pt-2 pb-2 col-sm-8">{{ $data->packing }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">Box Name</td>
                                                            <td class="pt-2 pb-2 col-sm-8">{{ $data->boxname }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">Box Size</td>
                                                            <td class="pt-2 pb-2 col-sm-8">{{ $data->boxsize }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">Box Specs</td>
                                                            <td class="pt-2 pb-2 col-sm-8">{{ $data->boxspecs }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">NW Box</td>
                                                            <td class="pt-2 pb-2 col-sm-8">{{ $data->nwbox }}</td>
                                                        </tr>
                                                        <tr style="" class="table-secondary">
                                                            <td class="pt-2 pb-2 fst-italic fw-bold" colspan="2">Layout</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2 col-sm-4">Layout {{$data->namalayout}}</td>
                                                            <td class="pt-2 pb-2 col-sm-8">
                                                                <a href="javascript:void(0)" onclick="openImageInNewWindow('{{ asset('storage/path/to/your/image/' . $data->filelayout) }}')" style="text-decoration:none;"class="badge badge-success">
                                                                    Preview
                                                                </a>    
                                                            </td>
                                                        </tr>
                                                        <tr style="" class="table-secondary">
                                                            <td class="pt-2 pb-2 fst-italic fw-bold" colspan="2">Note</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-2 pb-2" colspan="2">{{ $data->note1 }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endforeach
    @foreach($job as $user)
        <div class="modal fade" id="editStatusModal{{ $user->id }}"
            tabindex="-1" role="dialog"
            aria-labelledby="editStatusModalLabel{{ $user->id }}"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"
                            id="editStatusModalLabel{{ $user->id }}"> Approval JOB
                        </h5>
                    </div>
                    <div class="modal-body">
                        <!-- Form untuk mengedit status -->
                        @if ($user->statusjob == 'Revised')
                            <p>JOB pengajuan revisi</p>
                        @else
                           <form action="{{ route('updateStatusJobtrial', $user->id) }}"
                                method="POST">
                                @csrf
                                @method('PUT')
                                <div class="">
                                    <h5>Approve JOB</h5>
                                    <label class="btn btn-success px-">
                                        <input type="radio" value="Approve"
                                            id="newStatus" name="newStatus">
                                        Approve
                                    </label>
                                </div>
                                <hr>
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="submit"
                                    class="btn btn-primary">Save
                                    changes</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="ReqEditStatusModal{{ $user->id }}"
            tabindex="-1" role="dialog"
            aria-labelledby="ReqEditStatusModalLabel{{ $user->id }}"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"
                            id="ReqEditStatusModalLabel{{ $user->id }}"> Request Edit
                        </h5>
                    </div>
                    <div class="modal-body">
                        <!-- Form untuk mengedit status -->
                        @if ($user->statusjob == 'Revised')
                            <p>JOB pengajuan revisi</p>
                        @else
                           <form action="{{ route('reqEditJobtrial', $user->id) }}"
                                method="POST">
                                @csrf
                                @method('PUT')
                                <div class="">
                                    <h5>Send Request</h5>
                                    <label class="btn btn-success px-">
                                        <input type="radio" value="Revised"
                                            id="newStatus" name="newStatus">
                                        Request
                                    </label>
                                </div>
                                <hr>
                                <div class="mb-3">
                                   <label for="noteedit" class="form-label">Note Edit</label>
                                    <textarea class="form-control" id="noteedit" name="noteedit" rows="3"></textarea>
                                </div>
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="submit"
                                    class="btn btn-primary">Save
                                    changes</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div style="display: none">
        <table id="data-table" class=" ">
            <thead>
                <tr>
                    <th>ED JOB</th>
                    <th>CR JOB</th>
                    <th>ED SC</th>
                    <th>CR SC</th>
                    <th>GEN</th>
                    <th>NO SC</th>
                    <th>STAT</th>
                    <th>NOTE SC</th>
                    <th>JOB</th>
                    <th>STATUS</th>
                    <th>TGL JOB</th>
                    <th>TGL SC</th>
                    <th>PO</th>
                    <th>TGL PO</th>
                    <th>S-CODE</th>
                    <th>CUSTOMER</th>
                    <th>ID</th>
                    <th>ETA</th>
                    <th>CLIENT</th>
                    <th>PLANT</th>
                    <th>PRODUCT</th>
                    <th>MATERIAL</th>
                    <th>SAP</th>
                    <th>SIZE</th>
                    <th>SPECS</th>
                    <th>FINISHING</th>
                    <th>QTY</th>
                    <th>UNIT</th>
                    <th>TOLERANSI</th>
                    <th>ORIGINAL SAMPLE</th>
                    <th>DESIGN BENTUK</th>
                    <th>TGL TERIMA</th>
                    <th>DESIGN NO</th>
                    <th>STATUS</th>
                    <th>ACT COLOR</th>
                    <th>F1</th>
                    <th>F2</th>
                    <th>F3</th>
                    <th>F4</th>
                    <th>F5</th>
                    <th>F6</th>
                    <th>B1</th>
                    <th>B2</th>
                    <th>B3</th>
                    <th>B4</th>
                    <th>B5</th>
                    <th>B6</th>
                    <th>FINISHING2</th>
                    <th>ACUAN WARNA</th>
                    <th>PACKING</th>
                    <th>NO PS</th>
                    <th>BOX CODE</th>
                    <th>BOX</th>
                    <th>BOX SPECS</th>
                    <th>BOX SIZE</th>
                    <th>NW/BOX</th>
                    <th>APPLICATION</th>
                    <th>LAYOUT</th>
                    <th>UP</th>
                    <th>UK PRESS LAYOUT</th>
                    <th>MAT1</th>
                    <th>AS1</th>
                    <th>MAT2</th>
                    <th>AS1</th>
                    <th>MAT3</th>
                    <th>AS3</th>
                    <th>PISAU</th>
                    <th>CITTO</th>
                    <th>EMBOSS</th>
                    <th>HOTPRINT</th>
                    <th>NOTE</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($job as $data)
                <tr>
                <td>{{ $data->updated_at ?? '' }}</td>0
                <td>{{ $data->created_at ?? '' }}</td>1
                <td>{{ $data->updatedsc ?? '' }}</td>2
                <td>{{ $data->createdsc ?? '' }}</td>3
                <td>{{ $data->gen ?? '' }}</td>4
                <td>{{ $data->nosc ?? '' }}</td>5
                <td>{{ $data->statussc ?? '' }}</td>6
                <td>{{ $data->notesc ?? '' }}</td>7
                <td>{{ $data->id ?? '' }}</td>8
                <td>{{ $data->status ?? '' }}</td>9
                <td>{{ $data->created_at ?? '' }}</td>10
                <td>{{ $data->createdsc ?? '' }}</td>11
                <td>{{ $data->po ?? '' }}</td>12
                <td>{{ $data->tanggalpo ?? '' }}</td>13
                <td>{{ $data->scode ?? '' }}</td>14
                <td>{{ $data->customer ?? '' }}</td>15
                <td>{{ $data->idcust ?? '' }}</td>16
                <td>{{ $data->etauser ?? '' }}</td>17
                <td>{{ $data->client ?? '' }}</td>18
                <td>{{ $data->plantcode ?? '' }}</td>19
                <td>{{ $data->product ?? '' }}</td>20
                <td>{{ $data->material ?? '' }}</td>21
                <td>{{ $data->sap ?? '' }}</td>22
                <td>{{ $data->size ?? '' }}</td>23
                <td>{{ $data->specs ?? '' }}</td>24
                <td>{{ $data->finishing ?? '' }}</td>25
                <td>{{ $data->qty ?? '' }}</td>26
                <td>{{ $data->unit ?? '' }}</td>27
                <td>{{ $data->toleransi ?? '' }}</td>28
                <td>{{ $data->original ?? '' }}</td>29
                <td>{{ $data->design ?? '' }}</td>30
                <td>{{ $data->tanggalterima ?? '' }}</td>31
                <td>{{ $data->designno ?? '' }}</td>32
                <td>{{ $data->statusdesign ?? '' }}</td>33
                <td>{{ $data->actcolor ?? '' }}</td>34
                <td>{{ $data->f1 ?? '' }}</td>35
                <td>{{ $data->f2 ?? '' }}</td>36
                <td>{{ $data->f3 ?? '' }}</td>37
                <td>{{ $data->f4 ?? '' }}</td>38
                <td>{{ $data->f5 ?? '' }}</td>39
                <td>{{ $data->f6 ?? '' }}</td>40
                <td>{{ $data->b1 ?? '' }}</td>41
                <td>{{ $data->b2 ?? '' }}</td>42
                <td>{{ $data->b3 ?? '' }}</td>43
                <td>{{ $data->b4 ?? '' }}</td>44
                <td>{{ $data->b5 ?? '' }}</td>45
                <td>{{ $data->b6 ?? '' }}</td>46
                <td>{{ $data->finishingjob ?? '' }}</td>47
                <td>{{ $data->acuanwarna ?? '' }}</td>48
                <td>{{ $data->packing ?? '' }}</td>49
                <td>{{ $data->nops ?? '' }}</td>50
                <td>{{ $data->box_code ?? '' }}</td>51
                <td>{{ $data->boxname ?? '' }}</td>52
                <td>{{ $data->boxspecs ?? '' }}</td>53
                <td>{{ $data->boxsize ?? '' }}</td>54
                <td>{{ $data->nwbox ?? '' }}</td>55
                <td>{{ $data->aplikasi ?? '' }}</td>56
                <td>{{ $data->layout ?? '' }}</td>57
                <td>{{ $data->up ?? '' }}</td>58
                <td>{{ $data->ukpresslayout ?? '' }}</td>59
                <td>{{ $data->mat1 ?? '' }}</td>60
                <td>{{ $data->as1 ?? '' }}</td>61
                <td>{{ $data->mat2 ?? '' }}</td>62
                <td>{{ $data->as2 ?? '' }}</td>63
                <td>{{ $data->mat3 ?? '' }}</td>64
                <td>{{ $data->as3 ?? '' }}</td>65
                <td>{{ $data->pisau ?? '' }}</td>66
                <td>{{ $data->citto ?? '' }}</td>67
                <td>{{ $data->emboss ?? '' }}</td>68
                <td>{{ $data->hotprint ?? '' }}</td>69
                <td>{{ $data->note1 ?? '' }}</td>70
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
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
            <button class="btn btn-info">Create JOB TRIAL</button>
        </div>

        <div class="row" id='row'>
            <div class="col-12 stretch-card grid-margin" id="myForm">
                <div class="border rounded card">
                    <div class="border rounded shadow card-body">
                        <div style="font-size: 25px" class="mt-3 mb-4 text-center font-bold ">FORM JOB TRIAL</div>
                        <form class="form-sample" method="POST" action="{{route('kadeptjobtrial.store')}}">
                            @csrf
                            <input type="hidden" name="created" value=' {{ Auth::user()->name }}'>
                            <input type="hidden" class="form-control form-control-sm clickable" name="statusjob" value="Waiting">
                            <div class="row pt-4 px-4" style="background-color: #f1f1f6">
                                <div class="col">
                                    <label class="pt-2" for="input1">Docket</label>
                                     <input type="text" class="form-control form-control-sm clickable" name="designno" id="inputdesign"
                                            required  list="designno"/>
                                            <datalist id="designno">
                                                @foreach ($designno as $design)
                                                    <option value="{{ $design->designno }}">{{$design->product}} - {{$design->sap}}</option>
                                                @endforeach
                                                @foreach($docketnew as $design)
                                                    <option value="{{$design->id}}">{{$design->product}} - {{$design->sap}}</option>
                                                @endforeach
                                            </datalist>
                                </div>
                            </div>
                            <div class="row pt-4 px-4" style="background-color: #f1f1f6">
                                <div class="col">
                                    <label class="pt-2" class="pt-2" for="input2">Product</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="product" id="getProduct"
                                        required list="listproduct"/>

                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input3">SAP</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="sap"  id="getSap"
                                        placeholder="" >
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input3">Status Design</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="statusorder" id="getStatusorder"
                                        placeholder=""  required>
                                </div>
                            </div>
                            <div class="row pt-4 px-4" style="background-color: #f1f1f6">
                                <div class="col">
                                    <label class="pt-2" class="pt-2" for="input2">PO</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="po" id=""
                                        required list="listproduct"/>

                                </div>
                                <div class="col">
                                    <label class="pt-2" class="pt-2" for="input2">QTY</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="qty" id=""
                                        required list="listproduct"/>
                                </div>
                                <div class="col">
                                    <label class="pt-2" class="pt-2" for="input2">Unit</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="unit" id=""
                                        required />
                                </div>

                            </div>
                            <div class="row pt-4 px-4" style="background-color: #f1f1f6">
                                <div class="col">
                                    <label class="pt-2" for="input3">Customer</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="customer" 
                                        placeholder="" id="input1" list="cust">
                                        <datalist id="cust">
                                            @foreach($cust as $data)
                                                <option value="{{$data->customer}}"></option>
                                            @endforeach
                                        </datalist>
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input3">Client</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="client" 
                                        placeholder="" id="input2" >
                                </div>
                                <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                                    <script>
                                        $(document).ready(function () {
                                            // Fungsi yang dipanggil saat nilai input pertama berubah
                                            $('#input1').change(function () {
                                                // Mendapatkan nilai yang dipilih pada input pertama
                                                var selectedCustomer = $(this).val();
        
                                                // Melakukan Ajax request ke server untuk mendapatkan data client dan address berdasarkan namacustomer
                                                $.ajax({
                                                    type: 'GET',
                                                    url: '/get-customer-datacust/' + selectedCustomer, // Gantilah dengan URL endpoint yang sesuai di Laravel
                                                    success: function (data) {
                                                        // Mengisi nilai pada input kedua dan ketiga
                                                        $('#input2').val(data.up);
                                                    },
                                                    error: function () {
                                                        alert('Gagal mengambil data customer.');
                                                    }
                                                });
                                            });
                                        });
                                    </script>
                                <div class="col">
                                    <label class="pt-2" for="input3">Plant</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="plant" 
                                        placeholder=""  list="plant" id="inputplant">
                                        <datalist id="plant">
                                            @foreach($plants as $data)
                                                <option value="{{$data->plant}}"></option>
                                            @endforeach
                                        </datalist>
                                        <div>
                                            <view class="modal container border-radius"></view>
                                        </div>
                                    <input type='hidden text' name="address" id="getplant"/>
                                </div>
                                <script>
                                        $(document).ready(function () {
                                            // Fungsi yang dipanggil saat nilai input pertama berubah
                                            $('#inputplant').change(function () {
                                                // Mendapatkan nilai yang dipilih pada input pertama
                                                var selectedPlant = $(this).val();
        
                                                // Melakukan Ajax request ke server untuk mendapatkan data client dan address berdasarkan namacustomer
                                                $.ajax({
                                                    type: 'GET',
                                                    url: '/get-customer-dataplant/' + selectedPlant, // Gantilah dengan URL endpoint yang sesuai di Laravel
                                                    success: function (data) {
                                                        // Mengisi nilai pada input kedua dan ketiga
                                                        $('#getplant').val(data.address);
                                                        $('#getId').val(data.id);
                                                    },
                                                    error: function () {
                                                        alert('Gagal mengambil data customer.');
                                                    }
                                                });
                                            });
                                        });
                                    </script>
                            </div>
                            
                            <div class="row pt-4 px-4 pb-4" style="background-color: #f1f1f6">
                                <div class="col">
                                    <label class="pt-2" for="input3">Note JOB</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="note1" 
                                        placeholder="" >
                                </div>
                            </div>
                           
                                 <div>
                                    <input type="hidden" name="created" value=' {{ Auth::user()->name }}'>
                                    <input type="hidden" class="form-control form-control-sm clickable" name="status" value="Sent">
                                    <input type="hidden" class="form-control form-control-sm clickable" name="statusjob" value="Waiting">
                                    <input type="hidden" class="form-control form-control-sm clickable" name="tanggalterima" id="getTanggalterima" required>
                                    <input type="hidden" class="form-control form-control-sm clickable" name="original" id="getOriginal" required>
                                    <input type="hidden" class="form-control form-control-sm clickable" name="design" id="getDesign"placeholder="" required>
                                    <input type="hidden" class="form-control form-control-sm clickable" name="actcolor" id="getActcolor"placeholder="" required>
                                    <input type="hidden" class="form-control form-control-sm clickable" name="finishingjob" id="getFinishingjob" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable" name="layout" id="getLayout">
                                    <input type="hidden" class="form-control form-control-sm clickable" name="acuanwarna" id="getAcuanwarna">
                                    <input type="hidden" class="form-control form-control-sm clickable " name="packing" id="getPacking"placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable " name="nops" id="getNops" placeholder="" required>
                                    <input type="hidden" class="form-control form-control-sm clickable" name="nwbox" id="getNwbox" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable " name="boxname" id="getBoxname" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable " name="boxspecs" id="getBoxspecs" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable " name="boxsize" id="getBoxsize" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable" name="up" id="getUp" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable" name="aplikasi" id="getAplikasi"placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable " name="ukpresslayout"id="getUkpresslayout" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable" name="pisau" id="getPisau" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable " name="citto" id="getCitto" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable " name="emboss" id="getEmboss" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable" name="hotprint" id="getHotprint" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable" name="mat1" id="getMat1" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable" name="as1" id="getAs1" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable" name="mat2" id="getMat2" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable" name="as2" id="getAs2" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable" name="mat3" id="getMat3" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable" name="as3" id="getAs3" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable" name="f1" id="getF1" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable" name="f2" id="getF2" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable" name="f3" id="getF3" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable " name="f4" id="getF4" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable" name="f5" id="getF5" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable" name="f6" id="getF6" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable" name="b1" id="getB1" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable" name="b2" id="getB2" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable " name="b3" id="getB3" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable" name="b4" id="getB4" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable " name="b5" id="getB5" placeholder="">
                                    <input type="hidden" class="form-control form-control-sm clickable" name="b6" id="getB6" placeholder="">
                
                                </div>
                            <div>
                                <button type="submit" class="mt-2 btn-rounded btn btn-gradient-info float-end">
                                    Submit
                                </button>
                            </div>
                            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                        </form>
                    </div>
                </div>
                                <div class="">
                                    <div class="border shadow border-secondary" style="background:#F0F0F0">
                                        <div class="">
                                            <div class="">
                                                <p style="font-size:18px" class="fw-bold py-2 px-2 mb-1"> JOB TRIAL
                                                </p>
                                            </div>
                                            
                                        </div>
                                        <div class="border border-black" style="background: rgb(255, 255, 255)">
                                            <div class=" border " style="height:450px">
                                                <div class="py-4 ">
                                                    <div class=" px-4 border shadow-sm table-responsive table-responsive1" style="height:400px">
                                                        <table class="table table1 table-bordered border-secondary">
                                                            <thead class="">
                                                                <tr style="background:#F0F0F0; top:10px" class="">
                                                                    <th class="pt-2 pb-2 col-sm-4 fw-bold">Docket Information</th>
                                                                    <th class="pt-2 pb-2 col-sm-8 fw-bold">Value</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr style="" class="table-secondary">
                                                                    <td class="pt-2 pb-2 fst-italic" style="font-weight: 600" colspan="2">
                                                                        Information</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">File Received Date </td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getTanggalterimatext"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Original </td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getOriginaltext"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Design </td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getDesigntext"></span></td>
                                                                </tr>
                                                                <tr style="" class="table-secondary">
                                                                    <td class="pt-2 pb-2 fst-italic " style="font-weight: 600" colspan="2">
                                                                        Specification Product</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Actual Proses </td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getFinishingjobtext"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Application </td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getAplikasitext"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Up :</td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getUptext"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Layout </td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getLayouttext"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Uk Press Layout </td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getUkpresslayouttext"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Material 1 </td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getMat1text"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Material 2 </td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getMat2text"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Material 3 </td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getMat3text"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Arah Serat 1 </td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getAs1text"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Arah Serat 2 </td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getAs2text"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Arah Serat 3 </td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getAs3text"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Pisau </td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getPisautext"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Citto </td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getCittotext"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Emboss</td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getEmbosstext"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Hotprint</td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getHotprinttext"></span></td>
                                                                </tr>
                                                                <tr style="" class="table-secondary">
                                                                    <td class="pt-2 pb-2 fst-italic " style="font-weight: 600" colspan="2">Color
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Actual Color</td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getActcolortext"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Acuan Warna</td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getAcuanwarnatext"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Front 1</td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getF1text"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Front 2</td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getF2text"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Front 3</td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getF3text"></span></td>
                                                                </tr>   
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Front 4</td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getF4text"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Front 5</td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getF5text"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Front 6</td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getF6text"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Back 1</td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getB1text"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Back 2</td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getB2text"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Back 3</td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getB3text"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Back 4</td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getB4text"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Back 5</td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getB5text"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Back 6</td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getB6text"></span></td>
                                                                </tr>
                                                                <tr style="" class="table-secondary">
                                                                    <td class="pt-2 pb-2 fst-italic fw-bold" colspan="2">Packaging</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">No Packaging System</td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getNopstext"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Packaging</td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getPackingtext"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Box Name</td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getBoxnametext"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Box Size</td>
                                                                    <td class="pt-2 pb-2 col-sm-8"<span id="getBoxsizetext"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">Box Specs</td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getBoxspecstext"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-2 pb-2 col-sm-4">NW Box</td>
                                                                    <td class="pt-2 pb-2 col-sm-8"><span id="getNwboxtext"></span></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
            </div>
            <div class="">
         
                <div class="shadow card rounded-xl">
                    <div class="border shadow card-body">
                        <h3 class="pb-3 text-center">JOB TRIAL</h3>
                        <div class="float-end   ">
                            <a href="" class="btn btn-sm btn-warning align-items-center d-flex  text-dark">
                                <span class=" text-dark material-symbols-outlined">
                                    download
                                </span>Export to Excel
                            </a>
                        </div>

                        <form action="" method="GET" novalidate="novalidate">
                            <div class="d-flex pb-2">
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
                                        <th style="font-size: 14px; width:20px;" scope="col" class="sticky"> 
                                                <div class="dropdown">
                                                    <a class="absolute text-dark text-decoration-none dropdown-toggle"
                                                        href="#" role="button" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        JOB
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a href="/kadeptprodev/kadeptlistjob" class="dropdown-item ">
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
                                                                    <span
                                                                        class="px-2 align-middle material-symbols-outlined"
                                                                        style="font-size: 20px">
                                                                        text_rotate_up
                                                                    </span>Sort A to Z
                                                                </button>
                                                            </form>
                                                        </li>
                                                        <li>
                                                            <form action="" method="GET" novalidate="novalidate">
                                                                <input type="hidden" name="sort_by" value="desc">
                                                                <button type="submit" class="dropdown-item ">
                                                                    <span
                                                                        class="px-2 align-middle material-symbols-outlined"
                                                                        style="font-size: 20px">
                                                                        text_rotation_down
                                                                    </span>Sort Z to A
                                                                </button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </th> 
                                        <th style="font-size: 14px;" scope="col" class="">SC</th>
                                        <th style="font-size: 14px;" scope="col" class="">STS</th>
                                        <th style="font-size: 14px;" scope="col" class="">PRODUCT</th>
                                        <th style="font-size: 14px;" scope="col" class="">PO</th>
                                        <th style="font-size: 14px;" scope="col" class="">SAP</th>
                                        <th style="font-size: 14px;" scope="col" class="">DOCKET</th>
                                        <th style="font-size: 14px;" scope="col" class="">DUE DATE</th>
                                        <th style="font-size: 14px;" scope="col" class="">DATE REC</th>
                                        <th style="font-size: 14px;" scope="col" class=""> 
                                                <div class="dropdown">
                                                    <a class="absolute text-dark text-decoration-none dropdown-toggle"
                                                        href="#" role="button" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        DATE CR
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a href="/kadeptprodev/kadeptlistjob" class="dropdown-item ">
                                                                <span class="px-2 align-middle material-symbols-outlined"
                                                                    style="font-size: 20px">
                                                                    clear_all
                                                                </span>Clear
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <form action="" method="GET" novalidate="novalidate">
                                                                <input type="hidden" name="sort_by" value="asccreated">
                                                                <button type="submit" class="dropdown-item ">
                                                                    <span
                                                                        class="px-2 align-middle material-symbols-outlined"
                                                                        style="font-size: 20px">
                                                                        text_rotate_up
                                                                    </span>Sort A to Z
                                                                </button>
                                                            </form>
                                                        </li>
                                                        <li>
                                                            <form action="" method="GET" novalidate="novalidate">
                                                                <input type="hidden" name="sort_by" value="desccreated">
                                                                <button type="submit" class="dropdown-item ">
                                                                    <span
                                                                        class="px-2 align-middle material-symbols-outlined"
                                                                        style="font-size: 20px">
                                                                        text_rotation_down
                                                                    </span>Sort Z to A
                                                                </button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </th>                                        
                                        <th style="font-size: 14px;" scope="col" class=""> 
                                                <div class="dropdown">
                                                    <a class="absolute text-dark text-decoration-none dropdown-toggle"
                                                        href="#" role="button" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        DATE ED
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a href="/kadeptprodev/kadeptlistjob" class="dropdown-item ">
                                                                <span class="px-2 align-middle material-symbols-outlined"
                                                                    style="font-size: 20px">
                                                                    clear_all
                                                                </span>Clear
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <form action="" method="GET" novalidate="novalidate">
                                                                <input type="hidden" name="sort_by" value="ascupdated">
                                                                <button type="submit" class="dropdown-item ">
                                                                    <span
                                                                        class="px-2 align-middle material-symbols-outlined"
                                                                        style="font-size: 20px">
                                                                        text_rotate_up
                                                                    </span>Sort A to Z
                                                                </button>
                                                            </form>
                                                        </li>
                                                        <li>
                                                            <form action="" method="GET" novalidate="novalidate">
                                                                <input type="hidden" name="sort_by" value="descupdated">
                                                                <button type="submit" class="dropdown-item ">
                                                                    <span
                                                                        class="px-2 align-middle material-symbols-outlined"
                                                                        style="font-size: 20px">
                                                                        text_rotation_down
                                                                    </span>Sort Z to A
                                                                </button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </th> 
                                        <th style="font-size: 14px;" scope="col" class="text-center">NOTE EDIT</th>
                                        <th style="font-size: 14px;" scope="col" class="">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($job as $data)
                                    <tr>
                                        <td style="font-size: 14px; width:20px; padding-top:2px; padding-bottom:2px;"
                                            scope="col" class="sticky">{{ $data->id}}</td>
                                        <td style="padding-top:2px; padding-bottom:2px;">{{ $data->nosc}}</td>
                                        <td style="padding-top:2px; padding-bottom:2px;">
                                            @if ($data->statusjob == 'Approve')
                                            <span class="material-symbols-outlined text-success" style='font-size:18px'>
                                                check_circle
                                            </span>
                                            @elseif ($data->statusjob == 'Waiting')
                                            <span class="material-symbols-outlined text-warning" style='font-size:18px'>
                                                hourglass_top
                                            </span>
                                            @elseif ($data->statusjob == 'Revised')
                                            <span class="material-symbols-outlined text-dark" style='font-size:18px'>
                                                edit
                                            </span>
                                            @elseif ($data->statusjob == 'Declined')
                                            <span class="material-symbols-outlined text-danger" style='font-size:18px'>
                                                cancel
                                            </span>
                                            @endif
                                        </td>
                                        <td style="padding-top:2px; padding-bottom:2px;">{{ $data->product}}</td>
                                        <td style="padding-top:2px; padding-bottom:2px;">{{ $data->po}}</td>
                                        <td style="padding-top:2px; padding-bottom:2px;">{{ $data->sap}}</td>
                                        <td style="padding-top:2px; padding-bottom:2px;">{{ $data->designno}}</td>
                                        <td style="padding-top:2px; padding-bottom:2px;">{{ \Carbon\Carbon::parse($data->etauser)->format('j M y')}}</td>
                                        @if($data->tanggalterima)
                                        <td style="padding-top:2px; padding-bottom:2px;">{{ \Carbon\Carbon::parse($data->tanggalterima)->format('j M y')}}</td>
                                        @else
                                        <td style="padding-top:2px; padding-bottom:2px;"></td>
                                        @endif
                                        <td style="padding-top:2px; padding-bottom:2px;">{{ \Carbon\Carbon::parse($data->created_at)->format('j M y')}}</td>
                                        <td style="padding-top:2px; padding-bottom:2px;">{{ \Carbon\Carbon::parse($data->updated_at)->format('j M y')}}</td>
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
                                        <td style="padding-top:2px; padding-bottom:2px;" class="">
                                            <div class="container">
                                                <div class="content" data-full="{{ $data->noteedit }}">
                                                          {{ $data->noteedit }}
                                                </div>
                                                <span class="readMoreButton" style="display: none; cursor:pointer;"><a  class="text-primary" onclick="toggleReadMore(this)">Lihat Selengkapnya</a></span>
                                            </div>
                                        </td>

                                        <td style="padding-top: 3px; padding-bottom:3px;" class="d-flex ">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-primary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    Manage
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModalToggle{{ $data->id }}">Detail</a></li>
                                                    <li><a class="dropdown-item" href="{{ route('kadeptjobtrial.print', $data->id) }}">Print</a></li>
                                                    @if($data->statusjob == "Waiting")
                                                    <li><a class="dropdown-item" href="{{ route('kadeptjobtrial.edit', $data->id) }}">Edit</a></li>
                                                    <li>
                                                        <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editStatusModal{{ $data->id }}" >Approve</button>
                                                    </li>
                                                    @elseif($data->statusjob == "Approve")
                                                    <li>
                                                        <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#ReqEditStatusModal{{ $data->id }}" >Req Edit</button>
                                                    </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
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
        <script>
        function openImageInNewWindow(url) {
            var newWindow = window.open();
            newWindow.document.write('<html><head><style>img{pointer-events:none;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;}</style></head><body><img src="' + url + '" alt="Design Image"></body></html>');
        }
    </script>


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
    var truncatedText = text.slice(0, 10);

    if (text.length > 10) {
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



 <script>
        $(document).ready(function () {
            $('#inputdesign').change(function () {
                var selectedDesign = $(this).val();
                $.ajax({
                    type: 'GET',
                    url: '/get-job-datadesign/' + selectedDesign,
                    success: function (data) {
                        // Mengisi nilai pada input designno
                        var selectElement = $('#fileSelect');
                            selectElement.empty();
                        
                        selectElement.append('<option value="" selected>--Select an option--</option>');
                        if (data.filea) selectElement.append('<option value="a">' + data.a + '</option>');
                        if (data.fileb) selectElement.append('<option value="b">' + data.b + '</option>');
                        if (data.filec) selectElement.append('<option value="c">' + data.c + '</option>');
                        if (data.filed) selectElement.append('<option value="d">' + data.d + '</option>');
                        if (data.filee) selectElement.append('<option value="e">' + data.e + '</option>');
                        if (data.filef) selectElement.append('<option value="f">' + data.f + '</option>');
                        if (data.fileg) selectElement.append('<option value="g">' + data.g + '</option>');
                        if (data.fileh) selectElement.append('<option value="h">' + data.h + '</option>');
                        if (data.filei) selectElement.append('<option value="i">' + data.i + '</option>');
                        if (data.filej) selectElement.append('<option value="j">' + data.j + '</option>');
                        
                        $('#getSap').val(data.sap);
                        $('#getProduct').val(data.product);
                        $('#getTanggalterima').val(data.tanggalterima);
                        $('#getOriginal').val(data.original);
                        $('#getDesign').val(data.design);
                        $('#getStatusorder').val(data.statusorder);
                        $('#getActcolor').val(data.actcolor);
                        $('#getFinishingjob').val(data.finishingjob);
                        $('#getAcuanwarna').val(data.acuanwarna);
                        $('#getPacking').val(data.packing);
                        $('#getNops').val(data.nops);
                        $('#getNwbox').val(data.nwbox);
                        $('#getBoxname').val(data.boxname);
                        $('#getBoxspecs').val(data.boxspecs);
                        $('#getBoxsize').val(data.boxsize);
                        $('#getAplikasi').val(data.aplikasi);
                        $('#getLayout').val(data.layout);
                        $('#getUp').val(data.up);
                        $('#getUkpresslayout').val(data.ukpresslayout);
                        $('#getPisau').val(data.pisau);
                        $('#getCitto').val(data.citto);
                        $('#getEmboss').val(data.emboss);
                        $('#getHotprint').val(data.hotprint);
                        $('#getMat1').val(data.mat1);
                        $('#getAs1').val(data.as1);
                        $('#getMat2').val(data.mat2);
                        $('#getAs2').val(data.as2);
                        $('#getMat3').val(data.mat3);
                        $('#getAs3').val(data.as3);
                        $('#getF1').val(data.f1);
                        $('#getF2').val(data.f2);
                        $('#getF3').val(data.f3);
                        $('#getF4').val(data.f4);
                        $('#getF5').val(data.f5);
                        $('#getF6').val(data.f6);
                        $('#getB1').val(data.b1);
                        $('#getB2').val(data.b2);
                        $('#getB3').val(data.b3);
                        $('#getB4').val(data.b4);
                        $('#getB5').val(data.b5);
                        $('#getB6').val(data.b6);
                        $('#getNote1').val(data.note1);
                        $('#getNote2').val(data.note2);
                        $('#getNote3').val(data.note3);
                        $('#geta').val(data.a);
                        $('#getb').val(data.b);
                        $('#getc').val(data.c);
                        $('#getd').val(data.d);
                        $('#gete').val(data.e);
                        $('#getf').val(data.f);
                        $('#getg').val(data.g);
                        $('#geth').val(data.h);
                        $('#geti').val(data.i);
                        $('#getj').val(data.j);
                        $('#getfilea').val(data.filea);
                        $('#getfileb').val(data.fileb);
                        $('#getfilec').val(data.filec);
                        $('#getfiled').val(data.filed);
                        $('#getfilee').val(data.filee);
                        $('#getfilef').val(data.filef);
                        $('#getfileg').val(data.fileg);
                        $('#getfileh').val(data.fileh);
                        $('#getfilei').val(data.filei);
                        $('#getfilej').val(data.filej);
                        
                        //text
                        
                         $('#getTanggalterimatext').text(data.tanggalterima);
                        $('#getOriginaltext').text(data.original);
                        $('#getDesigntext').text(data.design);
                        $('#getStatusordertext').text(data.statusorder);
                        $('#getActcolortext').text(data.actcolor);
                        $('#getFinishingjobtext').text(data.finishingjob);
                        $('#getAcuanwarnatext').text(data.acuanwarna);
                        $('#getPackingtext').text(data.packing);
                        $('#getNopstext').text(data.nops);
                        $('#getNwboxtext').text(data.nwbox);
                        $('#getBoxnametext').text(data.boxname);
                        $('#getBoxspecstext').text(data.boxspecs);
                        $('#getBoxsizetext').text(data.boxsize);
                        $('#getAplikasitext').text(data.aplikasi);
                        $('#getLayouttext').text(data.layout);
                        $('#getUptext').text(data.up);
                        $('#getUkpresslayouttext').text(data.ukpresslayout);
                        $('#getPisautext').text(data.pisau);
                        $('#getCittotext').text(data.citto);
                        $('#getEmbosstext').text(data.emboss);
                        $('#getHotprinttext').text(data.hotprint);
                        $('#getMat1text').text(data.mat1);
                        $('#getAs1text').text(data.as1);
                        $('#getMat2text').text(data.mat2);
                        $('#getAs2text').text(data.as2);
                        $('#getMat3text').text(data.mat3);
                        $('#getAs3text').text(data.as3);
                        $('#getF1text').text(data.f1);
                        $('#getF2text').text(data.f2);
                        $('#getF3text').text(data.f3);
                        $('#getF4text').text(data.f4);
                        $('#getF5text').text(data.f5);
                        $('#getF6text').text(data.f6);
                        $('#getB1text').text(data.b1);
                        $('#getB2text').text(data.b2);
                        $('#getB3text').text(data.b3);
                        $('#getB4text').text(data.b4);
                        $('#getB5text').text(data.b5);
                        $('#getB6text').text(data.b6);
                        $('#getNote1text').text(data.note1);
                        $('#getNote2text').text(data.note2);
                        $('#getNote3text').text(data.note3);
    
                    },
                    error: function () {
                        alert('Gagal mengambil data Docket.');
                    }
                });
            });
        });
    </script>


@endsection
