@extends('role.purchasing.layouts.main')
@section('main-container')

<link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
    <div class="main-panel">
        <div class="content-wrapper" style="background-color: #f6f6fb">
            <div class="row ">
                <div class="col-12 stretch-card grid-margin">
                    <div class="card border rounded">
                        <div class="card-body shadow  border rounded">
                            <h4 class="card-title mb-3">Form Withdrawal Items</h4>
                            
                                 @if ($errors->any())
                                    <div id="errorModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="errorModalLabel">Error</h5>
                                                </div>
                                                <div class="modal-body" style="color: red;">
                                                        @foreach ($errors->all() as $error)
                                                            <div>{{$error}}</div>
                                                        @endforeach
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                
                            <form class="form-sample" method="POST" action="{{ route('withdraw.update', $inventorywd->id) }}"
                                id="pricelistForm">
                                @method('PUT')
                                @csrf
                                <div class="row stretch-card grid-margin shadow" style="background-color: #f1f1f6">
                                    <div class="col-md mt-3">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Tanggal WD</label>
                                            <input type="text" class="form-control form-control-sm " value="{{$inventorywd->tanggalwithdraw}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md mt-3">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Type</label>
                                            <input type="text" class="form-control form-control-sm " value="{{$inventorywd->type}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md mt-3">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Lokasi</label>
                                            <input type="text" class="form-control form-control-sm " value="{{$inventorywd->lokasi}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md mt-3 ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Dept</label>
                                            <input type="text" class="form-control form-control-sm " value="{{$inventorywd->dept}}" readonly>
                                        </div>
                                    </div>
                                 
                                    <div class="col-md mt-3">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Created</label>
                                            <input type="text" class="form-control form-control-sm " value="{{$inventorywd->created}}" readonly>
                                        </div>
                                    </div>
                                 
                                </div>
                                      <div class="row  shadow" style="background-color: #f1f1f6">
                                      
                                            <div class="col mt-3">
                                                <div class="mb-3" style="font-size: 14px">
                                                    <label for="" class="form-label fw-bold">Item</label>
                                                    <input type="text" placeholder="Item" 
                                                        value="{{$inventorywd->item}}" readonly class="form-control form-control-sm" >
                                                </div>
                                            </div>
                                            <div class="col mt-3">
                                                <div class="mb-3" style="font-size: 14px">
                                                    <label for="" class="form-label fw-bold">Qty</label>
                                                    <input type="text" placeholder="Item" 
                                                        value="{{$inventorywd->qty}}" name="qty"  class="form-control form-control-sm" >
                                                </div>
                                            </div>

                                    </div>
                                    
                                   
                                <div>
                                    <button type="submit" class="btn-rounded btn btn-gradient-info float-end mt-2">
                                        Submit
                                    </button>
                                </div>

        </div>


</div>
</div>
</div>
</div>

@endsection