<style>
    p {
        font-size: 13px;
    }
</style>
<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5  fw-bold " id="exampleModalToggleLabel{{ $details->id }}"><u>Docket :{{ $details->designno }}</u></h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <h1 class="modal-title fs-6 fw-bold text-center" id="exampleModalToggleLabel{{ $details->id }}">{{ $details->product }}</h1>
            <br/>
            <div class="row">
                <div class="col">
                    <p><span class="fw-bold">Product <span style="padding-left:5em">: </span> </span>{{ $details->product }}</p>
                    <p><span class="fw-bold">Act Color <span style="padding-left:4em">&nbsp; : </span></span> {{ $details->actcolor }}</p>
                    <p><span class="fw-bold">F1<span style="padding-left:7em"> &nbsp;&nbsp; : </span></span> {{ $details->f1 }}</p>
                </div>
                <div class="col">
                    <p><span class="fw-bold">Status Design<span style="padding-left:3em">: </span></span> {{$details->statusorder }}</p>
                    <p><span class="fw-bold">Acuan Warna <span style="padding-left:3em">&nbsp;: </span></span> {{$details->acuanwarna }}</p>
                    <p><span class="fw-bold">F2<span style="padding-left:8em">&nbsp;: </span></span> {{ $details->f2 }}
                    </p>
                </div>
                <div class="col">
                    <p><span class="fw-bold">Original <span style="padding-left:4em">&nbsp;&nbsp;: </span></span> {{$details->original }}</p>
                    <p><span class="fw-bold">Finishing <span style="padding-left:4em">&nbsp;: </span></span> {{ $details->finishingjob }}</p>
                    <p><span class="fw-bold">F3 <span style="padding-left:7em">&nbsp;: </span></span> {{ $details->f3 }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p><span class="fw-bold">F4 <span style="padding-left:7.8em">: </span> </span>{{ $details->f4 }}</p>
                    <p><span class="fw-bold">B1 <span style="padding-left:7.8em">: </span></span>{{ $details->b1 }} </p>
                    <p><span class="fw-bold">B4<span style="padding-left:7.9em"> : </span>{{ $details->b4 }}</span></p>
                </div>
                <div class="col">
                    <p><span class="fw-bold">F5<span style="padding-left:8em">&nbsp;: </span></span> {{$details->f5 }}</p>
                    <p><span class="fw-bold">B2 <span style="padding-left:8em">: </span></span> {{$details->b2 }}</p>
                    <p><span class="fw-bold">B5<span style="padding-left:8em">&nbsp;: </span></span> {{ $details->b5 }}
                    </p>
                </div>
                <div class="col">
                    <p><span class="fw-bold">F6 <span style="padding-left:7em">&nbsp;: </span></span> {{$details->f6 }}</p>
                    <p><span class="fw-bold">B3 <span style="padding-left:7em">&nbsp;: </span></span> {{ $details->b3 }}</p>
                    <p><span class="fw-bold">B6 <span style="padding-left:7em">&nbsp;: </span></span> {{ $details->b6 }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p><span class="fw-bold">Packing <span style="padding-left:5.5em">: </span> </span>{{ $details->packing }}</p>
                    <p><span class="fw-bold">Box Name <span style="padding-left:4.5em">: </span></span> {{$details->boxname }}</p>
                    <p><span class="fw-bold">Application<span style="padding-left:4em">: </span></span> {{ $details->aplikasi }}</p>
                </div>
                <div class="col">
                    <p><span class="fw-bold">No PS<span style="padding-left:6.5em">&nbsp;: </span></span> {{ $details->nops }}</p>
                    <p><span class="fw-bold">Box Specs <span style="padding-left:4.8em">: </span></span> {{ $details->boxspecs }}</p>
                    <p><span class="fw-bold">Layout<span style="padding-left:6.4em">&nbsp;: </span></span> {{ $details->layout }}
                    </p>
                </div>
                <div class="col">
                    <p><span class="fw-bold">NW Box <span style="padding-left:4.8em">&nbsp;: </span></span> {{$details->nwbox }}</p>
                    <p><span class="fw-bold">Box Size <span style="padding-left:4.8em">&nbsp;: </span></span> {{ $details->boxsize }}</p>
                    <p><span class="fw-bold">UP <span style="padding-left:7em">&nbsp;: </span></span> {{ $details->up }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p><span class="fw-bold">UK Press Layout <span style="padding-left:1.5em">: </span> </span>{{ $details->ukpresslayout}}</p>
                    <p><span class="fw-bold">MAT 1 <span style="padding-left:6em">: </span></span> {{ $details->mat1 }}</p>
                    <p><span class="fw-bold">AS 1<span style="padding-left:7em">: </span></span> {{ $details->as1}}</p>
                </div>
                <div class="col">
                    <p><span class="fw-bold">Emboss<span style="padding-left:6em">&nbsp;: </span></span> {{ $details->emboss}}</p>
                    <p><span class="fw-bold">MAT 2 <span style="padding-left:6.6em">: </span></span> {{$details->mat2 }}</p>
                    <p><span class="fw-bold">AS 2<span style="padding-left:7.5em">&nbsp;: </span></span> {{ $details->as2 }}
                    </p>
                </div>
                <div class="col">
                    <p><span class="fw-bold">Hotprint <span style="padding-left:4.4em">&nbsp;: </span></span> {{$details->hotprint }}</p>
                    <p><span class="fw-bold">MAT 3 <span style="padding-left:5.7em">&nbsp;: </span></span> {{ $details->mat3 }}</p>
                    <p><span class="fw-bold">AS 3 <span style="padding-left:6.3em">&nbsp;: </span></span> {{ $details->as3 }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p><span class="fw-bold">Pisau <span style="padding-left:6.3em">: </span> </span>{{ $details->pisau }}</p>
                </div>
                <div class="col">
                    <p><span class="fw-bold">Citto<span style="padding-left:7.1em">&nbsp;: </span></span> {{$details->citto }}</p>
                    </p>
                </div>
                <div class="col">
                    <p><span class="fw-bold">File Design <span style="padding-left:3.2em">&nbsp;: </span></span> {{$details->filedesign }}</p>
                </div>
            </div>
            <br />
        </div>
        <div class="modal-footer">
            <button class="btn btn-success" data-bs-dismiss="modal" aria-label="Close"> Close</button>
        </div>
    </div>
</div>