@if (count($results) > 0)
    <ul>
        @foreach ($results as $result)
            <div class=" " style="background-color: #f1f1f6">
                <div class="col-md">
                    <div class="mb-3" style="font-size: 14px">

                    <input type="text" class="form-control" placeholder="" name="cp"
                            value="{{ $result->cp }}" readonly="readonly">
                    </div>
                </div>
        @endforeach
    @else
        <p>Supplier Not Found</p>
@endif
