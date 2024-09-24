<!-- show.blade.php -->


<style>
    p {
        font-size: 13px;
    }

</style>
<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalToggleLabel{{ $details->id }}">NO SC: {{ $details->nosc }}</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row ">
                <div class="col">
                    <p><span class="fw-bold">PO : </span>{{ $details->po }}</p>
                    <p><span class="fw-bold">Tanggal PO :</span> {{ \Carbon\Carbon::parse($details->tanggalpo)->format('j M y') }}</p>
                    <p><span class="fw-bold">Tanggal SC :</span> {{ \Carbon\Carbon::parse($details->tanggalsc)->format('j M y') }}</p>
                    <p><span class="fw-bold">S-Code :</span> {{ $details->scode }}</p>
                    <p><span class="fw-bold">Customer :</span> {{ $details->customer }}</p>
                    <p><span class="fw-bold">Client:</span> {{ $details->client }}</p>
                    <p><span class="fw-bold">Plant :</span> {{ $details->plantcode }}</p>
                    <p><span class="fw-bold">Address :</span> {{ $details->address }}</p>
                </div>
                <div class="col">
                    <p><span class="fw-bold">Product :</span>{{ $details->product }}</p>
                    <p><span class="fw-bold">SAP :{{ $details->sap }}</span> </p>
                    <p><span class="fw-bold">Material :</span>{{ $details->material }} </p>
                    <p><span class="fw-bold">Size :</span> {{ $details->size }}</p>
                    <p><span class="fw-bold">Finishing SC :</span> {{ $details->finishing }}</p>
                    <p><span class="fw-bold">Specs :</span> {{ $details->specs }}</p>
                    <p><span class="fw-bold">Note SC :</span> {{ $details->notesc }}</p>
                </div>
            </div>
        </div>
        <div class="border border-dark">

        </div>
        <div class="modal-header">
            <div class="col">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel{{ $details->id }}">JOB ORDER: {{ $details->id }}</h1>
            </div>
            <div class="col">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel{{ $details->id }}">STATUS JOB : {{ $details->statusjob  }}</h1>
            </div>
        </div>
        <div class="modal-body">
            <div class="row ">
                <div class="col">
                    <p><span class="fw-bold">Tanggal Terima :</span> {{ \Carbon\Carbon::parse($details->tanggalterima)->format('j M y') }}</p>
                    <p><span class="fw-bold">Tanggal JOB :</span> {{ \Carbon\Carbon::parse($details->created_at)->format('j M y') }}</p>
                    <p><span class="fw-bold">Original : </span>{{ $details->original }}</p>
                    <p><span class="fw-bold">Design :</span> {{ $details->design }}</p>
                    <p><span class="fw-bold">Desain No :</span> {{ $details->designno }}</p>
                    <p><span class="fw-bold">Status Design :</span> {{ $details->statusdesign }}</p>
                    <p><span class="fw-bold">Act Color :</span> {{ $details->actcolor }}</p>
                    <p><span class="fw-bold">F1 :</span> {{ $details->f1 }}</p>
                    <p><span class="fw-bold">F2 :</span> {{ $details->f2 }}</p>
                    <p><span class="fw-bold">F3 :</span> {{ $details->f3 }}</p>
                    <p><span class="fw-bold">F4 :</span> {{ $details->f4 }}</p>
                    <p><span class="fw-bold">F5 :</span> {{ $details->f5 }}</p>
                    <p><span class="fw-bold">F6 :</span> {{ $details->f6 }}</p>
                    <p><span class="fw-bold">B1 :</span> {{ $details->b1 }}</p>
                    <p><span class="fw-bold">B2 :</span> {{ $details->b2 }}</p>
                    <p><span class="fw-bold">B3 :</span> {{ $details->b3 }}</p>
                    <p><span class="fw-bold">B4 :</span> {{ $details->b4 }}</p>
                    <p><span class="fw-bold">B5 :</span> {{ $details->b5 }}</p>
                    <p><span class="fw-bold">B6 :</span> {{ $details->b6 }}</p>
                    <p><span class="fw-bold">Packing :</span>{{ $details->packing }} </p>
                    <p><span class="fw-bold">No PS :</span> {{ $details->nops }}</p>
                </div>
                <div class="col">
                    <p><span class="fw-bold">Box Name :</span> {{ $details->boxname }}</p>
                    <p><span class="fw-bold">Box Specs :</span> {{ $details->boxspecs }}</p>
                    <p><span class="fw-bold">Box Size :</span> {{ $details->boxsize }}</p>
                    <p><span class="fw-bold">NW Box :</span> {{ $details->nwbox }}</p>
                    <p><span class="fw-bold">Finishing 2 :</span>{{ $details->finishingjob }}</p>
                    <p><span class="fw-bold">Acuan Warna : </span>{{ $details->acuanwarna }} </p>
                    <p><span class="fw-bold">Application :</span> {{ $details->application }}</p>
                    <p><span class="fw-bold">Layout :</span> {{ $details->layout }}</p>
                    <p><span class="fw-bold">UP :</span> {{ $details->up }}</p>
                    <p><span class="fw-bold">Uk Press Layout :</span> {{ $details->ukpresslayout }}</p>
                    <p><span class="fw-bold">AS 1 :</span> {{ $details->as1 }}</p>
                    <p><span class="fw-bold">MAT 1 :</span> {{ $details->mat1 }}</p>
                    <p><span class="fw-bold">AS 2 :</span> {{ $details->as2 }}</p>
                    <p><span class="fw-bold">MAT 2 :</span> {{ $details->mat2 }}</p>
                    <p><span class="fw-bold">AS 3 :</span> {{ $details->as3 }}</p>
                    <p><span class="fw-bold">MAT 3 :</span> {{ $details->mat3 }}</p>
                    <p><span class="fw-bold">Pisau :</span> {{ $details->pisau }}</p>
                    <p><span class="fw-bold">Citto :</span> {{ $details->citto }}</p>
                    <p><span class="fw-bold">Emboss :</span> {{ $details->emboss }}</p>
                    <p><span class="fw-bold">Hotprint :</span> {{ $details->hotprint }}</p>
                </div>
            </div>
                <br/>
                <div class="col">
                    <p><span class="fw-bold">Note 1 :</span>{{$details->note1  }}</p>
                </div>
                <div class="col">
                    <p><span class="fw-bold">Note 2 :</span>{{$details->note2  }}</p>
                </div>
                <div class="col">
                    <p><span class="fw-bold">Note 3 :</span>{{$details->note3  }}</p>
                </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Close</button>
        </div>
    </div>
</div>
