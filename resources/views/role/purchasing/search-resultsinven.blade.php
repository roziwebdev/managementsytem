@if (count($resultsitem) > 0)

    @foreach ($resultsitem as $result)
        <div class="row " style="background-color: #f1f1f6">
            <div class="col-md">
                <div class="mb-3" style="font-size: 14px">
                    <label for="" class="form-label">Specs</label>
                    <input value="{{ $result->specs }}" type="text" class="form-control form-control-sm " name="specs"
                        required>
                </div>
            </div>
            <div class="col-md">
                <div class="mb-3" style="font-size: 14px">
                    <label for="" class="form-label">Size</label>
                    <input value="{{ $result->size }}" type="text" class="form-control form-control-sm "
                        name="size" required>
                </div>
            </div>
            <div class="col-md">
                <div class="mb-3" style="font-size: 14px">
                    <label for="" class="form-label ">Unit</label>
                    <input value="{{ $result->unit }}" type="text" class="form-control form-control-sm "
                        name="unit" required>
                </div>
            </div>

        </div>
        <div class="row " style="background-color: #f1f1f6">
            <div class="col-md">
                <div class="mb-3" style="font-size: 14px">
                    <label for="" class="form-label">Qty</label>
                    <input type="text" class="form-control form-control-sm " name="qty" required>
                </div>
            </div>
            <div class="col-md">
                <div class="mb-3" style="font-size: 14px">
                    <label for="" class="form-label">Safety Stock</label>
                    <input value="{{ $result->safetystock }}" type="text" class="form-control form-control-sm "
                        name="safetystock" required>
                </div>
            </div>

            <div class="col-md">
                <div class="mb-3" style="font-size: 14px">
                    <label for="" class="form-label">Remarks</label>
                    <input type="text" class="form-control form-control-sm" name="remarks" required>
                </div>
            </div>
            <div class="col-md">
                <div class="mb-3" style="font-size: 14px">
                    <label for="" class="form-label">Tanggal Kedatangan</label>
                    <input type="date" class="form-control form-control-sm" name="tanggalbeli" required>
                </div>
            </div>
        </div>
    @endforeach
@else
    <div class="row " style="background-color: #f1f1f6">
        <div class="col-md">
            <div class="mb-3" style="font-size: 14px">
                <label for="" class="form-label">Specs</label>
                <input type="text" class="form-control form-control-sm " name="specs" required>
            </div>
        </div>
        <div class="col-md">
            <div class="mb-3" style="font-size: 14px">
                <label for="" class="form-label">Size</label>
                <input type="text" class="form-control form-control-sm " name="size" required>
            </div>
        </div>
        <div class="col-md">
            <div class="mb-3" style="font-size: 14px">
                <label for="" class="form-label ">Unit</label>
                <input type="text" class="form-control form-control-sm " name="unit" required>
            </div>
        </div>
    </div>
    <div class="row " style="background-color: #f1f1f6">
        <div class="col-md">
            <div class="mb-3" style="font-size: 14px">
                <label for="" class="form-label">Qty</label>
                <input type="text" class="form-control form-control-sm " name="qty" required>
            </div>
        </div>
        <div class="col-md">
            <div class="mb-3" style="font-size: 14px">
                <label for="" class="form-label">Safety Stock</label>
                <input type="text" class="form-control form-control-sm " name="safetystock" required>
            </div>
        </div>

        <div class="col-md">
            <div class="mb-3" style="font-size: 14px">
                <label for="" class="form-label">Remarks</label>
                <input type="text" class="form-control form-control-sm" name="remarks" required>
            </div>
        </div>
        <div class="col-md">
            <div class="mb-3" style="font-size: 14px">
                <label for="" class="form-label">Tanggal Kedatangan</label>
                <input type="date" class="form-control form-control-sm" name="tanggalbeli" required>
            </div>
        </div>
    </div>

@endif
