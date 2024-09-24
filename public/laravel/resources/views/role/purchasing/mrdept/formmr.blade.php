@extends('role.purchasing.layoutsmrdept.main')
@section('main-container')
    <main class="content">
        <div class="container-fluid p-0">
            <div class="mb-3">
                <h1 class="h3 d-inline align-middle">Forms</h1>
                <a class="badge bg-dark text-white ms-2" href="upgrade-to-pro.html">
                    Material Request
                </a>
            </div>
           <form method="POST" action="{{ route('deptmr.store') }}">
                @csrf
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Dept</h5>
                            </div>
                            <div class="card-body">
                                <input type="text" value=' {{ Auth::user()->departement }}' class="form-control" placeholder="Dept" name="dept" readonly>
                            </div>
                            <div class="card-header">
                                <h5 class="card-title mb-0">Type</h5>
                            </div>
                            <div class="card-body">
                                <input type="text" class="form-control" placeholder="Type" name="type" list="type" required>
                                <datalist id="type">
                                    <option value="INK">(Tinta)</option>
                                    <option value="PP">(Paper)</option>
                                    <option value="CH">(Chemical)</option>
                                    <option value="BOX">(BOX)</option>
                                    <option value="LL">(Lain - lain)</option>
                                  
                                </datalist>
                            </div>
                            
                             <div class="card-header">
                                <h5 class="card-title mb-0">JOB Number <sup class='text-danger'>(Jika kosong isi 0 ) </sup></h5>
                            </div>
                            <div class="card-body">
                                <input type="text" class="form-control" placeholder="Example : 23xxxxx" name="kosong1"
                                    required>
                            </div>


                            <div class="card-header">
                                <h5 class="card-title mb-0">Product Name <sup class='text-danger'>(Jika kosong isi - ) </sup></h5>
                            </div>
                            <div class="card-body">
                                <input type="text" class="form-control" placeholder="Product Name" name="job" required>
                            </div>
                         
                          
                            
                            <div class="card-header">
                                <h5 class="card-title mb-0">Alamat Kirim</h5>
                            </div>
                            <div class="card-body">
                                <select class="form-select" name="alamat" required>
                                    <option value="JL Mondoroko 14, Singosari">JL Mondoroko 14, Singosari</option>
                                    <option value="JL Imam Bonjol 838 Ardimulyo, Songsong">JL Imam Bonjol 838 Ardimulyo,
                                        Songsong</option>
                                </select>
                            </div>
                            
                            <div class="card-header">
                                <h5 class="card-title mb-0">Created By</h5>
                            </div>
                            <div class="card-body">
                                <input type="text" class="form-control" value='{{ Auth::user()->name }}' name="created" required readonly>
                            </div>

                            <div class="card-body">
                                <input type="hidden" class="form-control" placeholder="" value="Waiting" name="status">
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-6">
                        <div class="card">
                            <div id="row">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Item</h5>
                                </div>
                                <div class="card-body">
                                    <input type="text" id="searchitem" placeholder="Item" list="item" name="item[]" required
                                        class="form-control">
                                    <datalist id="item">
                                        @foreach ($item as $data)
                                            <option>{{ $data->item }}</option>
                                        @endforeach
                                    </datalist>
                                    <div class="pt-2" id="search-resultsitem"></div>
                                  
                                </div>
                            </div>




                            <div id="newinput"></div>
                            <div class="col">
                                <div class="card-header">
                                    <div id="rowAdder" class="btn btn-primary">Add</div>
                                </div>

                            </div>
                            
                          @auth
    @if (auth()->user()->departement === 'PPIC RM')
    <div class="row">
                 <div class="col">
                <div class="card-header">
                    <h5 class="card-title mb-0">Product</h5>
                </div>
                <div class="card-body">
                 <input type="text" name="box1[]" class="form-control"/>
                </div>
                </div>
                
                 <div class="col">
                <div class="card-header">
                    <h5 class="card-title mb-0">Detail</h5>
                </div>
                <div class="card-body">
                 <input type="text" name="box2[]" class="form-control"/>
                </div>
                </div>
                
                <div class="col">
                <div class="card-header">
                    <h5 class="card-title mb-0">Quantity</h5>
                </div>
                <div class="card-body">
                 <input type="text" name="box3[]" class="form-control"/>
                </div>
                </div>
        
    </div>
        <div id="newinputbox"></div>
        <div class="col">
            <div class="card-header">
                <div id="rowAdderbox" class="btn btn-dark">Add Note Box</div>
            </div>
        </div>
        @else

                 <input type="hidden" name="box1[]" class="form-control"/>
                 <input type="hidden" name="box2[]" class="form-control"/>
                 <input type="hidden" name="box3[]" class="form-control"/>

        @endif
@endauth
                            
                            <script>
    // Initialize counter for unique IDs
    let counterbox = 1;

    function handleRemoveItembox(id) {
        $(`#rowbox${id}`).remove();
    }

    $("#rowAdderbox").click(function() {
        newRowAddbox = `
         
            <div id="rowbox${counterbox}" class="row">
            
                <div class="col">
                <div class="card-header">
                    <h5 class="card-title mb-0">Product</h5>
                </div>
                <div class="card-body">
                 <input type="text" name="box1[]" class="form-control"/>
                </div>
                </div>
                
                 <div class="col">
                <div class="card-header">
                    <h5 class="card-title mb-0">Detail</h5>
                </div>
                <div class="card-body">
                 <input type="text" name="box2[]" class="form-control"/>
                </div>
                </div>
                
                <div class="col">
                <div class="card-header">
                    <h5 class="card-title mb-0">Quantity</h5>
                </div>
                <div class="card-body">
                 <input type="number" name="box3[]" class="form-control"/>
                </div>
                </div>
                
            <div class="px-4">
                <button class="btn btn-danger px-" onclick="handleRemoveItembox(${counterbox})">Remove</button>
            </div>
            </div>
                
            `;

        // Tambahkan elemen baru setelah elemen dengan ID "rowAdder"
        $("#newinputbox").append(newRowAddbox);


        counter++;
    });
</script>
    
    
 
                            <script>
    // Initialize counter for unique IDs
    let counter = 1;

    function handleRemoveItem(id) {
        $(`#row${id}`).remove();
    }

    $("#rowAdder").click(function() {
        newRowAdd = `
            <div id="row${counter}">
                <div class="card-header">
                    <h5 class="card-title mb-0">Item</h5>
                </div>
                <div class="card-body">
                    <input type="text" id="searchitem${counter}" placeholder="Item" required list="item" name="item[]" class="form-control">
                    <datalist id="item">
                        @foreach ($item as $data)
                            <option>{{ $data->item }}</option>
                        @endforeach
                    </datalist>
                    <div class="pt-2" id="search-resultsitem${counter}"></div>
                </div>
                <button class="btn btn-danger" onclick="handleRemoveItem(${counter})">Remove</button>
            </div>`;

        // Tambahkan elemen baru setelah elemen dengan ID "rowAdder"
        $("#newinput").append(newRowAdd);

        // Mendaftarkan fungsi handleSearchItem untuk elemen baru yang ditambahkan
        $(`#searchitem${counter}`).on('keyup', handleSearchItem);

        counter++;
    });
</script>

                            <!-- Script untuk menangani pencarian item -->
                            <script>
                                function handleSearchItem() {
                                    var query = $(this).val();
                                    if (query !== '') {
                                        $.ajax({
                                            url: '/searchitemresultmr',
                                            method: 'GET',
                                            data: {
                                                query: query
                                            },
                                            success: function(data) {
                                                $(this).nextAll(".pt-2").first().html(data);
                                            }.bind(
                                                this) // Perhatikan bind(this) untuk mempertahankan konteks elemen yang memicu pencarian
                                        });
                                    } else {
                                        $(this).nextAll(".pt-2").first().html('');
                                    }
                                }

                                // Mendaftarkan fungsi handleSearchItem untuk elemen dengan ID "searchitem"
                                $(document).ready(function() {
                                    $('#searchitem').on('keyup', handleSearchItem);
                                });
                            </script>
                        </div>

            </form>
        </div>
        <div class="container">
            <button class="btn btn-primary" type="submit" style="width: 100%">Submit</button>
        </div>
    </main>
@endsection
