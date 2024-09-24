@extends('role.purchasing.layoutmrkadept.main')
@section('main-container')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update Sales Record</div>

                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form method="POST" action="{{ route('kadeptsalesjob.update', ['id' => $sc->id, 'index' => $index]) }}">
                        @csrf
                        @method('PUT')

                        <!-- Display input fields for each attribute -->
                        <div class="form-group">
                            <label for="product">Product:</label>
                            <input type="text" name="product" id="product" class="form-control"
                                value="{{ $selectedItem['product'] }}" required>
                        </div>

                        <div class="form-group">
                            <label for="finishing">Finishing:</label>
                            <input type="text" name="finishing" id="finishing" class="form-control"
                                value="{{ $selectedItem['finishing'] }}" required>
                        </div>

                        <div class="form-group">
                            <label for="material">Material:</label>
                            <input type="text" name="material" id="material" class="form-control"
                                value="{{ $selectedItem['material'] }}" required>
                        </div>

                        <div class="form-group">
                            <label for="size">Size:</label>
                            <input type="text" name="size" id="size" class="form-control"
                                value="{{ $selectedItem['size'] }}" required>
                        </div>

                        <div class="form-group">
                            <label for="specs">Specs:</label>
                            <input type="text" name="specs" id="specs" class="form-control"
                                value="{{ $selectedItem['specs'] }}" required>
                        </div>

                        <div class="form-group">
                            <label for="qty">Quantity:</label>
                            <input type="number" name="qty" id="qty" class="form-control"
                                value="{{ $selectedItem['qty'] }}" required>
                        </div>

                        <div class="form-group">
                            <label for="sap">SAP:</label>
                            <input type="text" name="sap" id="sap" class="form-control"
                                value="{{ $selectedItem['sap'] }}" required>
                        </div>

                        <div class="form-group">
                            <label for="unit">Unit:</label>
                            <input type="text" name="unit" id="unit" class="form-control"
                                value="{{ $selectedItem['unit'] }}" required>
                        </div>

                        <div class="form-group">
                            <label for="etauser">ETA User:</label>
                            <input type="text" name="etauser" id="etauser" class="form-control"
                                value="{{ $selectedItem['etauser'] }}" required>
                        </div>

                        <div class="form-group">
                            <label for="price">Price:</label>
                            <input type="number" name="price" id="price" class="form-control"
                                value="{{ $selectedItem['price'] }}" required>
                        </div>

                        <div class="form-group">
                            <label for="total">Total:</label>
                            <input type="number" name="total" id="total" class="form-control"
                                value="{{ $selectedItem['total'] }}" required>
                        </div>

                        <div class="form-group">
                            <label for="toleransi">Toleransi:</label>
                            <input type="text" name="toleransi" id="toleransi" class="form-control"
                                value="{{ $selectedItem['toleransi'] }}" required>
                        </div>

                        <div class="form-group">
                            <label for="notesc">Notes:</label>
                            <input type="text" name="notesc" id="notesc" class="form-control"
                                value="{{ $selectedItem['notesc'] }}" required>
                        </div>

                        <div class="form-group">
                            <label for="statusproduct">Status Product:</label>
                            <input type="text" name="statusproduct" id="statusproduct" class="form-control"
                                value="{{ $selectedItem['statusproduct'] }}" required>
                        </div>

                        <div class="form-group">
                            <label for="jobsc">Job SC:</label>
                            <input type="text" name="jobsc" id="jobsc" class="form-control"
                                value="{{ $selectedItem['jobsc'] }}" required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update Sales Record</button>
                        </div>

                        <!-- Repeat the process for other attributes -->

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection