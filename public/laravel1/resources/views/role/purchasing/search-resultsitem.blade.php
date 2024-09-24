@if (count($resultsitem) > 0)

    @foreach ($resultsitem as $result)
        <div class="row " style="background-color: #f1f1f6">
            <div class="col-md">
                <div class="mb-3" style="font-size: 14px">
                    <label for="" class="form-label">Specs</label>
                    <input type="text" class="form-control form-control-sm " name="specs[]" required value="{{$result->specs}}">
                </div>
            </div>
            <div class="col-md">
                <div class="mb-3" style="font-size: 14px">
                    <label for="" class="form-label">Size</label>
                    <input type="text" class="form-control form-control-sm " name="size[]" required value="{{$result->size}}">
                </div>
            </div>
        </div>
        <div class="row " style="background-color: #f1f1f6">
            <div class="col-md">
                <div class="mb-3" style="font-size: 14px">
                    <label for="" class="form-label">Qty</label>
                    <input type="text" class="form-control form-control-sm " name="qty[]" required value="">
                </div>
            </div>
            <div class="col-md">
                <div class="mb-3" style="font-size: 14px">
                    <label for="" class="form-label ">Unit</label>
                    <input type="text" class="form-control form-control-sm " name="unit[]" required value="{{$result->unit}}">
                </div>
            </div>
            <div class="col-md">
                <div class="mb-3" style="font-size: 14px">
                    <label for="" class="form-label">Serat</label>
                    <input type="text" class="form-control form-control-sm " name="podate[]" required value="{{$result->serat}}">
                </div>
            </div>
            <div class="col-md">
                <div class="mb-3" style="font-size: 14px">
                    <label for="" class="form-label">Price</label>
                    <input type="text" class="form-control form-control-sm " name="price[]" required value="{{$result->price}}" >
                </div>
            </div>
            <div class="col-md">
                <div class="mb-3" style="font-size: 14px">
                    <label for="" class="form-label">Currency</label>
                    <select name="po[]" class="form-select">
                        <option value="&nbsp;RP">&nbsp;RP</option>
                        <option value="&nbsp;%">&nbsp;%</option>
                    </select>
               
                </div>
            </div>
            <div class="col-md">
                <div class="mb-3" style="font-size: 14px">
                    <label for="" class="form-label">Eta User</label>
                    <input type="date" class="form-control form-control-sm" name="etauser[]" required value="">
                </div>
            </div>
            <div class="col-md">
                <div class="mb-3" style="font-size: 14px">
                    <label for="" class="form-label">Eta Auto</label>
                    <input type="date" class="form-control form-control-sm " name="etaauto[]" required value="">
                </div>
            </div>
              <div class="col-md">
            <div class="mb-3" style="font-size: 14px">
                <label for="" class="form-label">PO Created</label>
                <input id="tanggal2" type="date" class="form-control form-control-sm " name="tanggalitem[]" readonly>
            </div>
        </div>
        </div>
           <script>
        // Mendapatkan tanggal dan waktu sekarang
        var currentDate = new Date();

        // Mendapatkan elemen input dengan ID 'tanggal'
        var inputTanggal = document.getElementById('tanggal2');

        // Format tanggal ke format YYYY-MM-DD
        var formattedDate = currentDate.toISOString().slice(0, 10);

        // Mengatur nilai input dengan tanggal sekarang
        inputTanggal.value = formattedDate;
    </script>
    @endforeach
@else
    <div class="row " style="background-color: #f1f1f6">
        <div class="col-md">
            <div class="mb-3" style="font-size: 14px">
                <label for="" class="form-label">Specs</label>
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
    <div class="row " style="background-color: #f1f1f6">
        <div class="col-md">
            <div class="mb-3" style="font-size: 14px">
                <label for="" class="form-label">Qty</label>
                <input type="text" class="form-control form-control-sm " name="qty[]" required>
            </div>
        </div>
        <div class="col-md">
            <div class="mb-3" style="font-size: 14px">
                <label for="" class="form-label ">Unit</label>
                <input type="text" class="form-control form-control-sm " name="unit[]" required>
            </div>
        </div>
        <div class="col-md">
            <div class="mb-3" style="font-size: 14px">
                <label for="" class="form-label">Serat</label>
                <input type="text" class="form-control form-control-sm " name="podate[]" required>
            </div>
        </div>
        <div class="col-md">
            <div class="mb-3" style="font-size: 14px">
                <label for="" class="form-label">Price</label>
                <input type="text" class="form-control form-control-sm " name="price[]" required>
            </div>
        </div>
        <div class="col-md">
            <div class="mb-3" style="font-size: 14px">
                <label for="" class="form-label">Currency</label>
                <input type="text" class="form-control form-control-sm " name="po[]" required>
            </div>
        </div>
        <div class="col-md">
            <div class="mb-3" style="font-size: 14px">
                <label for="" class="form-label">Eta User</label>
                <input type="date" class="form-control form-control-sm" name="etauser[]" required>
            </div>
        </div>
        <div class="col-md">
            <div class="mb-3" style="font-size: 14px">
                <label for="" class="form-label">Eta Auto</label>
                <input type="date" class="form-control form-control-sm " name="etaauto[]" required>
            </div>
        </div>
         <div class="col-md">
            <div class="mb-3" style="font-size: 14px">
                <label for="" class="form-label">PO Created</label>
                <input id="tanggal" type="date" class="form-control form-control-sm " name="tanggalitem[]" readonly>
            </div>
        </div>
    </div>
     <script>
        // Mendapatkan tanggal dan waktu sekarang
        var currentDate = new Date();

        // Mendapatkan elemen input dengan ID 'tanggal'
        var inputTanggal = document.getElementById('tanggal');

        // Format tanggal ke format YYYY-MM-DD
        var formattedDate = currentDate.toISOString().slice(0, 10);

        // Mengatur nilai input dengan tanggal sekarang
        inputTanggal.value = formattedDate;
    </script>

@endif
