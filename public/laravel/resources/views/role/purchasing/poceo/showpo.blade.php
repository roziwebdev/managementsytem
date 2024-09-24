 @php
    $items = json_decode($details->item);
    $sizes = json_decode($details->size);
    $specs = json_decode($details->specs);
    $qtys = json_decode($details->qty);
    $units = json_decode($details->unit);
    $prices = json_decode($details->price);
    $currency = json_decode($details->po);

    // Gabungkan semua data menjadi satu array dengan zip
    $combinedData = array_map(null, $items, $sizes, $specs, $qtys, $units, $prices,$currency);
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
            <p class="modal-title fw-bold text-center" id="exampleModalToggleLabel{{ $details->id }}">PO : {{ $details->id }} - {{$details->supplier}}</p>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row fw-bold pb-4">
                <div class="col col-4">
                    <p>Item</p>
                </div>
                <div class="col">
                    <p>Qty</p>
                </div>
                <div class="col">
                    <p>Price</p>
                </div>
            </div>
            @foreach($combinedData as $data)
            <div class="row">
                <div class='col col-4'>
                    <p>{{$data[0]}}</p>
                </div>
                <div class="col">
                    <p>{{ '' . number_format(floatval(str_replace(',', '.', $data[3])), 0, ',', '.') }} {{$data[4]}}</p>
                </div>
                <div class="col">
                    <p>{{$data[6]}}. {{ '' . number_format(floatval(str_replace(',', '.', $data[5])), 1, ',', '.') }} </p>
                </div>
            </div>
            @endforeach
        </div>
            @if ($user->status == 'Process')
                {{-- Cek status sebelumnya --}}
                <p class="px-2">Status Approved .</p>
                <div class="modal-footer d-flex justify-content-end">
                        <button   type="button" class="btn btn-success btn-sm" data-bs-dismiss="modal" aria-label="Close"> Close</button>
                </div>
            @elseif ($user->status == 'Process Safira')
                {{-- Cek status sebelumnya --}}
                <p class="px-2">Status Approved .</p>
                 <div class="modal-footer d-flex justify-content-end">
                        <button   type="button" class="btn btn-success btn-sm" data-bs-dismiss="modal" aria-label="Close"> Close</button>
                </div>
            @elseif ($user->status == 'Process Stephanie')
                {{-- Cek status sebelumnya --}}
                <p class="px-2">Status Approved .</p>
                 <div class="modal-footer d-flex justify-content-end">
                        <button  type="button"  class="btn btn-success btn-sm" data-bs-dismiss="modal" aria-label="Close"> Close</button>
                </div>
            @elseif ($user->status == 'Declined')
                {{-- Cek status sebelumnya --}}
                <p class="px-2">Status Declined .</p>
                 <div class="modal-footer d-flex justify-content-end">
                        <button  type="button"  class="btn btn-success btn-sm" data-bs-dismiss="modal" aria-label="Close"> Close</button>
                </div>
            @elseif ($user->status == 'Done')
                {{-- Cek status sebelumnya --}}
                <p class="px-2">Status Approved .</p>
                 <div class="modal-footer d-flex justify-content-end">
                        <button  type="button" class="btn btn-success btn-sm" data-bs-dismiss="modal" aria-label="Close"> Close</button>
                </div>
            @else
            <form
                action="{{ route('update_statusmanager', $user->id) }}"
                method="POST">
                @csrf
                @method('PUT')
                <div class="px-2">
                    {{-- Radio buttons untuk mengubah status --}}
                    <div class="py-2">
                        <label style="font-size:12px"  class="btn btn-success px-3 py-2">
                            <input style="font-size:12px"  type="radio" value="Process"
                                id="newStatus" name="newStatus" required>
                            Process
                        </label>
                    </div>
                    <div>
                    <label style="font-size:12px" class="btn btn-danger btn-sm px-3 py-2">
                        <input style="font-size:12px"  type="radio" value="Declined"
                            id="newStatus" name="newStatus" required/>
                        Declined
                    </label>
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