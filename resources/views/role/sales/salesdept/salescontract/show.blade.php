<!-- show.blade.php -->

@php
$products = json_decode($details->product);
$saps = json_decode($details->sap);
$materials = json_decode($details->material);
$sizes = json_decode($details->size);
$finishings = json_decode($details->finishing);
$specs = json_decode($details->specs);
$qtys = json_decode($details->qty);
$units = json_decode($details->unit);
$prices = json_decode($details->price);
$totals = json_decode($details->total);
$etausers = json_decode($details->etauser);
$toleransis = json_decode($details->toleransi);
$notessc = json_decode($details->notesc);
$statusproduct = json_decode($details->statusproduct);
$combinedData = array_map(null,$products,$saps,$materials,$sizes,$finishings,$specs,$qtys,$units,$prices,$totals,$etausers,$toleransis,$notessc, $statusproduct);
@endphp
<style>
    p{
        font-size: 13px;
    }
</style>
<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalToggleLabel{{ $details->id }}">NO SC : {{ $details->id }}</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col">
                    <p><span class="fw-bold">PO <span style="padding-left:5em">: </span> </span>{{ $details->po }}</p>
                    <p><span class="fw-bold">Tanggal PO <span style="padding-left:1em">: </span></span> {{ \Carbon\Carbon::parse($details->tanggalpo)->format('j M y') }}</p>
                    <p><span class="fw-bold">Tanggal SC <span style="padding-left:1em">: </span></span> {{ \Carbon\Carbon::parse($details->created_at)->format('j M y') }}</p>
                </div>
                <div class="col">
                    <p><span class="fw-bold">S-Code <span style="padding-left:2em">&nbsp;: </span></span> {{ $details->scode }}</p>
                    <p><span class="fw-bold">Customer <span style="padding-left:1em">: </span></span> {{ $details->customer }}</p>
                    <p><span class="fw-bold">Up<span style="padding-left:4em">&nbsp;: </span></span> {{ $details->up }}</p>
                </div>
                <div class="col">
                    <p><span class="fw-bold">Note  <span style="padding-left:1em">&nbsp;: </span></span> {{ $details->noteeksternal }}</p>
                    <p><span class="fw-bold">Plant <span style="padding-left:1em">&nbsp;: </span></span> {{ $details->plantcode }}</p>
                    <p><span class="fw-bold">Address <span style="">&nbsp;: </span></span> {{ $details->address }}</p>
                </div>
            </div>
            <div class="border border-dark">

            </div>
            <br/>
            <div class="row gy-5">
                @foreach ($combinedData as $data )
                <div class="col-6">
                <p><span class="fw-bold">Product <span style="padding-left:6em">&nbsp;&nbsp;: </span></span> {{ $data[0] }}</p>
                <p><span class="fw-bold">SAP <span style="padding-left:8em">: </span> </span> {{ $data[1] }}</p>
                <p><span class="fw-bold">Material <span style="padding-left:6em">: </span> </span> {{ $data[2] }}</p>
                <p><span class="fw-bold">Size <span style="padding-left:7em">&nbsp;&nbsp;&nbsp;&nbsp;: </span> </span> {{ $data[3] }}</p>
                <p><span class="fw-bold">Finishing <span style="padding-left:5em">&nbsp;&nbsp;&nbsp;: </span></span> {{ $data[4] }}</p>
                <p><span class="fw-bold">Specs <span style="padding-left:7em">: </span> </span> {{ $data[5] }}</p>
                <p><span class="fw-bold">Quantity <span style="padding-left:5em">&nbsp;&nbsp;: </span> </span> {{ number_format($data[6], 0, ',', '.') }}</p>
                <p><span class="fw-bold">Unit <span style="padding-left:7em">&nbsp;&nbsp;: </span> </span> {{ $data[7] }}</p>
                <p><span class="fw-bold">Price <span style="padding-left:7em">: </span> </span> Rp. {{ number_format($data[8], 0, ',', '.') }}</p>
                <p><span class="fw-bold">Total <span style="padding-left:7em">: </span> </span> Rp. {{ number_format($data[9], 0, ',', '.') }}</p>
                <p><span class="fw-bold">Eta User <span style="padding-left:4em">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </span> </span> {{ \Carbon\Carbon::parse($data[10])->format('j M y') }}</p>
                <p><span class="fw-bold">Toleransi <span style="padding-left:4em">&nbsp;&nbsp;&nbsp;&nbsp;: </span> </span> {{ $data[11] }}</p>
                <p><span class="fw-bold">Note SC <span style="padding-left:5em">&nbsp;&nbsp;: </span> </span>{{ $data[12] }} </p>
                <p><span class="fw-bold">Status Product SC <span style="padding-left:1em">: </span></span>{{ $data[13] }} </p>
                </div>
                @endforeach
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-success" data-bs-dismiss="modal" aria-label="Close"> Close</button>
        </div>
    </div>
</div>
