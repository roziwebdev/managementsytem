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
<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalToggleLabel{{ $details->id }}">NO SC : {{ $details->id }}</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @foreach($combinedData as $data)
            <div class="row">
               <p>{{$data[0]}}</p>
            </div>
            @endforeach
        </div>
        <div class="modal-footer">
            <button class="btn btn-success" data-bs-dismiss="modal" aria-label="Close"> Close</button>
        </div>
    </div>
</div>