<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <style>
           p {
            font-size: 75%
        }
        h1 {
          
        }
        th {
            text-transform:uppercase;
        }
        tr {
            text-transform:uppercase;
        }
    </style>

</head>

<body>
    <div class="container-xxl">
       
        <br />
        <h2 class="text-center">Material Request</h1>
        <br />
        <!-- Modal untuk mengedit status -->
                                                <div class="modal fade" id="editStatusModal{{ $materialrequest->id }}"
                                                    tabindex="-1" role="dialog"
                                                    aria-labelledby="editStatusModalLabel{{ $materialrequest->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="editStatusModalLabel{{ $materialrequest->id }}">
                                                                </h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- Form untuk mengedit status -->
                                                                @if ($materialrequest->status == 'Approve CEO')
                                                                    {{-- Cek status sebelumnya --}}
                                                                    <p>MR sudah Approve/Declined sebelumnya.</p>
                                                                @elseif ($materialrequest->status == 'Approve GM')
                                                                    {{-- Cek status sebelumnya --}}
                                                                    <p>MR sudah Approve/Declined sebelumnya.</p>
                                                                @elseif ($materialrequest->status == 'Approve')
                                                                    {{-- Cek status sebelumnya --}}
                                                                    <p>MR sudah Approve/Declined sebelumnya.</p>
                                                                @elseif ($materialrequest->status == 'Declined')
                                                                    {{-- Cek status sebelumnya --}}
                                                                    <p>MR sudah Approve/Declined sebelumnya.</p>
                                                                @else
                                                                    <form action="{{ route('update_status', $materialrequest->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <div class="">
                                                                            {{-- Radio buttons untuk mengubah status --}}
                                                                           

                                                                            <h5>Approve MR</h5>
                                                                            <label class="btn btn-success ">
                                                                                <input type="radio" value="Approve CEO"
                                                                                    id="newStatus" name="newStatus">
                                                                                Approve
                                                                            </label>
                                                                            <hr>
                                                                            <h5>Declined MR</h5>
                                                                            <label class="btn btn-danger ">
                                                                                <input type="radio" value="Declined"
                                                                                    id="newStatus" name="newStatus" />
                                                                                Declined
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
                                                <!--<div class="float-end d-flex gap-3">-->
                                                <!--    <a href="/ceo/materialrequest" class="btn btn-danger">Back</a>-->
                                                <!--    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editStatusModal{{ $materialrequest->id }}">Approve</button>-->
                                                <!--</div>-->
     
        <p style='font-size:70%'>
            <strong>MR Number &nbsp;&nbsp;: </strong>{{ str_pad($materialrequest->id, 4, '0', STR_PAD_LEFT) }}</br>
<strong>Dept &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong>{{$materialrequest->dept}}</br>

<strong>Send To &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong> {{$materialrequest->alamat}}
        </p>
                                                <div class="py-2 d-flex">
                                                    <a class="btn btn-primary btn-sm" href="/ceo/materialrequest">
                                                        <span class="align-middle material-symbols-outlined">
                                                            undo
                                                        </span>
                                                    </a>
                                                    <button class="mx-2 btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editStatusModal{{ $materialrequest->id }}">
                                                        <span class="align-middle material-symbols-outlined">
                                                            Rule
                                                        </span>
                                                    </button>
                                                </div>

        <br />

        <table class="table border">
            <thead>
                <tr style="font-size: 70%" >
                    <th scope="col">Eta User</th>
                    <th scope="col">Job</th>
                    <th scope="col">Type</th>
                    <th scope="col">Item</th>
                    <th scope="col">Specs</th>
                    <th scope="col">Size</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Unit</th>
                    <th scope="col">Serat</th>
                    <th scope="col">L order</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Remarks</th>

                </tr>
            </thead>
            <tbody>
               @php
                    $items = json_decode($materialrequest->item);
                    $specs = json_decode($materialrequest->specs);
                    $etausers = json_decode($materialrequest->etauser);
                    $sizes = json_decode($materialrequest->size);
                    $qtys = json_decode($materialrequest->qty);
                    $remarks = json_decode($materialrequest->mrdate);
                    $arahserat = json_decode($materialrequest->arahseratp);
                    $lastorder = json_decode($materialrequest->lastorder);
                    $sisastock = json_decode($materialrequest->sisastock);
                    $box1 = json_decode($materialrequest->box1);
                    $box2 = json_decode($materialrequest->box2);
                    $box3 = json_decode($materialrequest->box3);
                    $kosong3 = json_decode($materialrequest->kosong3);
                    $lastpo = json_decode($materialrequest->lastpo);
                    $lastprice = json_decode($materialrequest->lastprice);
                 
                   
                    $combinedData = array_map(null, $items, $specs, $etausers, $sizes, $qtys, $remarks, $arahserat,$lastorder,$sisastock,$box1,$box2,$box3, $kosong3, $lastpo, $lastprice);
                @endphp
                @foreach ($combinedData as $data)
                    <tr  style="font-size: 55%">
                      
                        <td>{{ \Carbon\Carbon::parse($data[2])->format('j M y') }}</td> {{-- ETA User --}}
                        <td>{{ $materialrequest->job }}</td>
                        <td>{{ $materialrequest->type }}</td>
                        <td>{{ $data[0] }}</td> {{-- Item --}}
                        <td>{{ $data[1] }}</td> {{-- Specs --}}
                        <td>{{ $data[3] }}</td> {{-- Size --}}
                        <td>{{ $data[4] }}</td> {{-- Qty --}}
                        <td>{{ $data[12] }}</td> {{-- Qty --}}
                        <td>{{ $data[6] }}</td> {{-- arahserat --}}
                      <td>
                            PO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$data[13]}}<br/>
                            Tgl&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$data[7]}}<br/>
                            Harga : {{$data[14]}}
                        </td> 
                        <td>{{ $data[8] }}</td> {{-- arahserat --}}
                        <td>{{ $data[5] }}</td> {{-- Remarks --}}


                    </tr>
                @endforeach
            </tbody>
        </table>
        @if ($materialrequest->type == 'BOX')
        <br/>
        <b style='font-size:70%'>RINCIAN KEBUTUHAN BOX : </b>
        <br/>
            @foreach ($combinedData as $data)
        <div class='d-flex justify-content-around'>
            <p style='font-size:70%'>
                {{$data[9]}}
            </p>
            <p style='font-size:70%'>
                {{$data[10]}}+
            </p>
            <p style='font-size:70%'>
                {{$data[11]}}
            </p>
        </div>
            @endforeach
        <br/>
        <br/>
        @endif
        <div class=''>
        <p style='font-size:70%'>
         <strong>Created By : </strong>{{$materialrequest->created}} / {{$materialrequest->created_at}}
        </p>
        <p style='font-size:70%'>
         <strong>Checked By : </strong>Manager Departement {{ Auth::user()->dept }} / {{$materialrequest->updated_at}}
        </p>
        </div>
        <div class='d-flex justify-content-between'>
            <div>
                <p style=""><strong>Note &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong> {{$materialrequest->arahseratl}}</p>
            </div>
                           <div>
                @if ($materialrequest->status == 'Approve Safira')
                <p class="text-center" style='font-size:70%'>&nbsp;&nbsp;&nbsp;SAFIRA <br/>
                    <img style="width: 100px; " src="{{ URL::asset('frontend1/img/photos/Signsaf.png') }}" /><br/>
                    PT. ARJAYA MUKTI SANTOSA
                </p>
                @elseif ($materialrequest->status == 'Approve')
                <p style='font-size:70%' class="text-center">SAFIRA<br/>
                    <img style="width: 100px;" src="{{ URL::asset('frontend1/img/photos/Signsaf.png') }}" /><br/>
                    PT. ARJAYA MUKTI SANTOSA
                </p>
                @elseif ($materialrequest->status == 'Approve Stephanie')
                <p style='font-size:70%' class="text-center">&nbsp;&nbsp;&nbsp;STEPHANIE NEGORO<br/>
                    <img style="width: 100px;" src="{{ URL::asset('frontend1/img/photos/Signature.PNG') }}" /><br/>
                    PT. ARJAYA MUKTI SANTOSA
                </p>
                @elseif ($materialrequest->status == 'Approve GM')
                <p style='font-size:70%' class="text-center">&nbsp;&nbsp;&nbsp;STEPHANIE NEGORO<br/>
                    <img style="width: 100px;" src="{{ URL::asset('frontend1/img/photos/Signature.PNG') }}" /><br/>
                    PT. ARJAYA MUKTI SANTOSA
                </p>
                 @elseif ($materialrequest->status == 'Approve CEO')
                <p style='font-size:70%' class="text-center">&nbsp;&nbsp;&nbsp;WENNY <br/>
                    <img style="width: 100px;" src="{{ URL::asset('frontend1/img/photos/signceo.png') }}" /><br/>
                    PT. ARJAYA MUKTI SANTOSA
                </p>
                @else
                      <p style='font-size:70%' class="text-center">WENNY<br/>
                    <br/><br/><br/><br/>
                    PT. ARJAYA MUKTI SANTOSA
                </p>
            
                    
                @endif
                
            </div>
        </div>

       


    </div>
    {{-- <script>
        window.print();
    </script> --}}

</body>

</html>
