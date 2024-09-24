@if (count($resultsproductsales) > 0)

    @foreach ($resultsproductsales as $result)
                                <div class=" row" style="background-color: #f1f1f6">
                                    <div class="mt-3 col-md">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold ">Gen sc</label>
                                            <input type="text" class="form-control form-control-sm clickable" name="gensc[]" value="" required
                                                placeholder="" >
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold ">No Ref Tender</label>
                                            <input type="text" class="form-control form-control-sm clickable" name="referensi[]" value=""
                                                placeholder="" >
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold ">SAP</label>
                                            <input type="text" class="form-control form-control-sm clickable" name="sap[]" value="{{$result->sap}}"
                                                placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold ">Material</label>
                                            <input type="text" class="form-control form-control-sm clickable" name="material[]" value="{{$result->material}}"
                                                placeholder="" required>
                                        </div>
                                    </div>
                                </div>
                                <div class=" row" style="background-color: #f1f1f6">
                                    <div class="mt-3 col-md">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold ">Size</label>
                                            <input type="text" class="form-control form-control-sm clickable" name="size[]" value="{{$result->size}}"
                                                placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold ">Finishing</label>
                                            <input type="text" class="form-control form-control-sm clickable" name="finishing[]" value="{{$result->finishing}}"
                                                placeholder="" required>

                                        </div>
                                    </div>
                                    <div class="mt-3 col-md">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold ">Specs</label>
                                            <input type="text" class="form-control form-control-sm clickable" name="specs[]" value="{{$result->specs}}"
                                                placeholder="" required>
                                        </div>
                                    </div>
                                </div>

                                <div class=" row stretch-card grid-margin" style="background-color: #f1f1f6">
                                    <div class="mt-3 col-md ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">QTY</label>
                                            <input id="input111" oninput="updateResult()" name="qty[]"  type="number" class="form-control form-control-sm clickable"
                                                required>
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold ">Unit</label>
                                            <input type="text" class="form-control form-control-sm clickable " name="unit[]" value="{{$result->unit}}"
                                                placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold ">Price</label>
                                            <input id="input222" oninput="updateResult()" name="price[]" type="text" class="form-control form-control-sm clickable"
                                                placeholder="" required>
                                        </div>
                                    </div>
                                    <!--<div class="mt-3 col-md">-->
                                    <!--    <div class="mb-3" style="font-size: 14px">-->
                                    <!--        <label for="" class="form-label fw-bold ">Total</label>-->
                                    <!--        <input id="result" type="number" class="form-control form-control-sm clickable" name="total[]" value=""-->
                                    <!--            placeholder="" required>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <div class="mt-3 col-md">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold ">Eta User</label>
                                            <input type="date" class="form-control form-control-sm clickable" name="etauser[]"
                                                placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold ">Toleransi</label>
                                            <input type="text" class="form-control form-control-sm clickable " name="toleransi[]" value="{{$result->toleransi}}"
                                                placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold ">Note SC</label>
                                            <input type="text" class="form-control clickable form-control-sm " name="notesc[]" placeholder="" required>
                                            <input type="hidden" class="form-control clickable form-control-sm " name="jobsc[]" placeholder="" required>
                                            <input type="hidden"  name="statusproduct[]" value="Original" placeholder="" required>
                                        </div>
                                    </div>
    @endforeach
    @else
 
                                <div class="fw-bold p-2">No Product Found</div>

    @endif
