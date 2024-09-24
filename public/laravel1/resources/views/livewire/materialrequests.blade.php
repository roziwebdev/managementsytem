<div>
    <main class="content">
        <div class="container-fluid p-0">
            <div class="d-flex justify-content-between">
                <h1 class="h2 mb-3"><strong>List</strong> Material Request</h1>
                <form action="/salesdev" method="GET">
                    <div class="input-group" style="margin-bottom:50px;">
                        <input name="search" type="search" class="form-control rounded" placeholder="Search"
                            aria-label="Search" aria-describedby="search-addon" />
                        <button type="submit" class="btn btn-outline-primary"><i class="align-middle"
                                data-feather="search"></i></button>
                    </div>
                </form>
            </div>
            <section class="intro">
                <div class="bg-image h-100" style="background-color: #f5f7fa;">
                    <div class="mask d-flex align-items-center h-100">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body p-0">
                                            <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true"
                                                style="position: relative; height: 600px">
                                                <table class="table table-striped mb-0">
                                                    <thead style="background-color: #1a202c" class="text-light">
                                                        <tr>
                                                            <th class="text-light" scope="col">No</th>
                                                            <th class="text-light" scope="col">MR Date</th>
                                                            <th class="text-light" scope="col">MR Number</th>
                                                            <th class="text-light" scope="col">Job/Product</th>
                                                            <th class="text-light" scope="col">Eta User</th>
                                                            <th class="text-light" scope="col">Item</th>
                                                            <th class="text-light" scope="col">Specs</th>
                                                            <th class="text-light" scope="col">Qty</th>
                                                            <th class="text-light" scope="col">Manage</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($materialrequests as $user)
                                                            <tr>
                                                                @php
                                                                    $etauserArray = json_decode($user->etauser, true);
                                                                    $itemArray = json_decode($user->item, true);
                                                                    $sizeArray = json_decode($user->size, true);
                                                                    $specsArray = json_decode($user->specs, true);
                                                                    $qtyArray = json_decode($user->qty, true);
                                                                    
                                                                    // Mengambil item pertama dari masing-masing kolom
                                                                    $firstEtauser = reset($etauserArray);
                                                                    $firstItem = reset($itemArray);
                                                                    $firstSize = reset($sizeArray);
                                                                    $firstSpecs = reset($specsArray);
                                                                    $firstQty = reset($qtyArray);
                                                                @endphp
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $user->created_at->format('d-m-y') }}</td>
                                                                <td>{{ $user->id }}</td>
                                                                <td>{{ $user->job }}</td>
                                                                <td>{{ $firstEtauser }}</td>
                                                                <td>{{ $firstItem }}</td>
                                                                <td>{{ $firstSpecs }}</td>
                                                                <td>{{ $firstQty }}</td>

                                                                <td class="d-flex">
                                                                    <div>
                                                                        <button class="btn btn-primary">
                                                                            <i class="align-middle"
                                                                                data-feather="message-square"></i>
                                                                        </button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <!-- Offcanvas untuk chat -->

                                            </div>
                                            @endforeach
                                            </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </section>
</div>
</main>
<script>
    // Fungsi untuk membuka modal berdasarkan ID
    function openModalById(id) {
        var modalId = "chatModal" + id;
        var modalElement = document.getElementById(modalId);
        var modal = new bootstrap.Modal(modalElement);
        modal.show();
    }

    // Daftar tombol chat
    var chatButtons = document.querySelectorAll(".btn-primary");

    // Menambahkan event listener untuk setiap tombol chat
    chatButtons.forEach(function(button) {
        button.addEventListener("click", function() {
            var userId = button.getAttribute("data-user-id"); // Ganti dengan atribut yang sesuai
            openModalById(userId);
        });
    });
</script>

</div>
