 @php
    $items = json_decode($details->item);
    $specs = json_decode($details->specs);
    $etausers = json_decode($details->etauser);
    $sizes = json_decode($details->size);
    $qtys = json_decode($details->qty);
    $remarks = json_decode($details->mrdate);
    $arahserat = json_decode($details->arahseratp);
    $lastorder = json_decode($details->lastorder);
    $sisastock = json_decode($details->sisastock);
    $box1 = json_decode($details->box1);
    $box2 = json_decode($details->box2);
    $box3 = json_decode($details->box3);
    $kosong3 = json_decode($details->kosong3);
    $lastpo = json_decode($details->lastpo);
    $lastprice = json_decode($details->lastprice);
 
   
    $combinedData = array_map(null, $items, $specs, $etausers, $sizes, $qtys, $remarks, $arahserat,$lastorder,$sisastock,$box1,$box2,$box3, $kosong3, $lastpo, $lastprice);
@endphp

<style>
    @media (max-width: 576px) {
    .modal-body p {
        font-size: 70%;
    }
}
</style>
<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
            <p class="modal-title fw-bold text-center" id="exampleModalToggleLabel{{ $details->id }}">MR : {{ $details->id }} - {{$details->dept}}</p>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
           <div class="row fw-bold py-4">
               <div class="col">
                   <p>Item</p>
               </div>
               <div class="col">
                   <p>Specs</p>
               </div>
               <div class="col">
                   <p>Size</p>
               </div>
               <div class="col">
                   <p>Qty</p>
               </div>
           </div>
           @foreach($combinedData as $data)
            <div class="row">
                <div class="col">
                    <p>{{$data[0]}}</p>
                </div>
                <div class="col">
                    <p>{{$data[1]}}</p>
                </div>
                <div class="col">
                    <p>{{$data[3]}}</p>
                </div>
                <div class="col">
                    <p>{{$data[4]}} {{$data[12]}}</p>
                </div>
            </div>
           @endforeach
        </div>
        @if ($user->status == 'Approve CEO')
            {{-- Cek status sebelumnya --}}
            <p class="px-2">MR Approved .</p>
            <div class="modal-footer d-flex justify-content-end">
                <button type="button" class="btn btn-success btn-sm" data-bs-dismiss="modal" aria-label="Close"> Close</button>
            </div>
        @elseif ($user->status == 'Approve GM')
            {{-- Cek status sebelumnya --}}
            <p class="px-2">MR Approved .</p>
            <div class="modal-footer d-flex justify-content-end">
                <button type="button" class="btn btn-success btn-sm" data-bs-dismiss="modal" aria-label="Close"> Close</button>
            </div>
        @elseif ($user->status == 'Approve')
            {{-- Cek status sebelumnya --}}
            <p class="px-2">MR Approved .</p>
            <div class="modal-footer d-flex justify-content-end">
                <button type="button" class="btn btn-success btn-sm" data-bs-dismiss="modal" aria-label="Close"> Close</button>
            </div>
        @elseif ($user->status == 'Declined')
            {{-- Cek status sebelumnya --}}
            <p class="px-2">MR Declined .</p>
            <div class="modal-footer d-flex justify-content-end">
                <button type="button" class="btn btn-success btn-sm" data-bs-dismiss="modal" aria-label="Close"> Close</button>
            </div>
        @else
        <form action="{{ route('update_status', $user->id) }}"
            method="POST">
            @csrf
            @method('PUT')
            <div class="px-2">
                <div class="pb-3">
                    <label class="btn btn-success px-3 py-2 ">
                        <input type="radio" value="Approve CEO"
                            id="newStatus" name="newStatus">
                        Approve
                    </label>
                    <label class="btn btn-danger px-3 py-2">
                        <input type="radio" value="Declined"
                            id="newStatus" name="newStatus" />
                        Decline
                    </label>
                </div>
                <div class="mb-4">
                    <p for="note" class="form-label">Note</p>
                    <textarea class="form-control" id="note" name="note" rows="3"></textarea>
                </div>
                                                                          
            </div>
                <div class="modal-footer d-flex justify-content-end">
                        <button type="submit"
                            class="btn btn-primary btn-sm px-4">Save
                            changes</button>
                        <button type="button" class="btn btn-success btn-sm" data-bs-dismiss="modal" aria-label="Close"> Close</button>
                </div>
        </form>
        @endif
    </div>
</div>