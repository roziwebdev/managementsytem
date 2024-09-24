@if (count($resultsitem) > 0)

    @foreach ($resultsitem as $result)
        <div class="row " style="background-color: #f1f1f6">
            <div class="col-md">
                <div class="mb-3" style="font-size: 14px">
                    <label for="" class="form-label">Specs</label>
                    <input type="text" class="form-control form-control-sm " name="specs[]" value="{{ $result->specs }}" required>
                </div>
            </div>
            <div class="col-md">
                <div class="mb-3" style="font-size: 14px">
                    <label for="" class="form-label">Size</label>
                    <input type="text" class="form-control form-control-sm " name="size[]" value="{{ $result->size }}" required>
                </div>
            </div>
            @if(auth()->user()->departement === 'PPIC RM')
            <div class="col-md">
                <div class="mb-3" style="font-size: 14px">
                    <label for="" class="form-label">Panjang</label>
                    <input type="text" class="form-control form-control-sm " name="panjang[]" value="" >
                </div>
            </div>
            <div class="col-md">
                <div class="mb-3" style="font-size: 14px">
                    <label for="" class="form-label">Lebar</label>
                    <input type="text" class="form-control form-control-sm " name="lebar[]" value="" >
                </div>
            </div>
                    <input type="hidden" class="form-control form-control-sm " name="tinggi[]" value="" >

            @else
                <input type="hidden" class="form-control form-control-sm " name="panjang[]" value="" >
                <input type="hidden" class="form-control form-control-sm " name="lebar[]" value="" >
                <input type="hidden" class="form-control form-control-sm " name="tinggi[]" value="" >
            @endif
            
        </div>
        <div class="row " style="background-color: #f1f1f6">
            <div class="col-md">
                <div class="mb-3" style="font-size: 14px">
                    <label for="" class="form-label">Qty</label>
                    <input type="text" class="form-control form-control-sm " name="qty[]" required>
                </div>
            </div>
            <div class="col-md">
                <div class="mb-3" style="font-size: 14px">
                    <label for="" class="form-label">Sisa Stock</label>
                    <input type="number" class="form-control form-control-sm " name="sisastock[]" required>
                </div>
            </div>
            <div class="col-md">
                <div class="mb-3" style="font-size: 14px">
                    <label for="" class="form-label ">Unit</label>
                    <input type="text" class="form-control form-control-sm " name="kosong3[]" value="{{ $result->unit }}" required>
                </div>
            </div>
            <div class="col-md">
                <div class="mb-3" style="font-size: 14px">
                    <label for="" class="form-label">Serat</label>
                    <input type="text" class="form-control form-control-sm " name="arahseratp[]" value="{{ $result->arahserat }}" list='serat1' required >
                    <datalist id="serat1">
                        <option value="	&harr;">
                        <option value="	&#8597;">
                    </datalist>
                </div>
            </div>
            <div class="col-md">
                <div class="mb-3" style="font-size: 14px">
                    <label for="" class="form-label">Eta User</label>
                    <input type="date" class="form-control form-control-sm" name="etauser[]" required>
                </div>
            </div>
        </div>
        <div class="row " style="background-color: #f1f1f6">
            <div class="col mb-3" style="font-size:14px">
                <label class="form-label">Remark</label>
                <input class="form-control form-control-sm" name="mrdate[]" required>
            </div>
        </div>
    @endforeach
@else
    <div class="row  " style="background-color: #f1f1f6">
        <div class="col-md">
            <div class="mb-3" style="font-size: 14px">
                <label for="" class="form-label">Specs</label>
                 <input type="hidden" class="form-control form-control-sm " name="panjang[]" value="" >
                <input type="hidden" class="form-control form-control-sm " name="lebar[]" value="" >
                <input type="hidden" class="form-control form-control-sm " name="tinggi[]" value="" >
                <input type="text" class="form-control form-control-sm " name="specs[]" required>
            </div>
        </div>
        <div class="col-md">
            <div class="mb-3" style="font-size: 14px">
                <label for="" class="form-label">Size</label> 
                <input type="text" class="form-control form-control-sm " name="size[]" required>
            </div>
        </div>
    </div>
    <div class="row shadow" style="background-color: #f1f1f6">
        <div class="col-md">
            <div class="mb-3" style="font-size: 14px">
                <label for="" class="form-label">Qty</label>
                <input type="text" class="form-control form-control-sm " name="qty[]" required>
            </div>
        </div>
        <div class="col-md">
            <div class="mb-3" style="font-size: 14px">
                <label for="" class="form-label">Sisa Stock</label>
                <input type="number" class="form-control form-control-sm " name="sisastock[]" required>
            </div>
        </div>
        <div class="col-md">
            <div class="mb-3" style="font-size: 14px">
                <label for="" class="form-label ">Unit</label>
                <input type="text" class="form-control form-control-sm " name="kosong3[]" required>
            </div>
        </div>
        <div class="col-md">
            <div class="mb-3" style="font-size: 14px">
                <label for="" class="form-label">Serat</label>
            
                <input type="text" class="form-control form-control-sm " name="arahseratp[]" list="serat">
                                            <datalist id="serat">
                                                <option value="&harr;">
                                                <option value="&#8597;">
                                            </datalist>
            </div>
        </div>
        <div class="col-md">
            <div class="mb-3" style="font-size: 14px">
                <label for="" class="form-label">Eta User</label>
                <input type="date" class="form-control form-control-sm" name="etauser[]" required>
            </div>
        </div>
    </div>
    <div class="row " style="background-color: #f1f1f6">
        <div class="col mb-3" style="font-size:14px">
            <label class="form-label">Remark</label>
            <input class="form-control form-control-sm" name="mrdate[]" required />
        </div>
    </div>
@endif
