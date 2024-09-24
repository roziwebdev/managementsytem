<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ URL::asset('frontend/css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Bootstrap Example</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link href="{{ URL::asset('frontend/css/app.css') }}" rel="stylesheet">
</head>

<body>


    <div class="container">
        <h1>Daftar Nama</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($namas as $nama)
                    <tr>
                        <td>{{ $nama->nama }}</td>
                        <td>
                            <button class="btn btn-primary btn-tambah-alamat" data-nama-id="{{ $nama->id }}">Tambah
                                Alamat</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Sidebar Offcanvas -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="sidebar" aria-labelledby="sidebarLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarLabel">Alamat</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <form id="alamat-form">
                @csrf
                <input type="" id="selected-nama-id" name="nama_id" value="">
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat Baru</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Alamat</button>
            </form>
            <ul id="daftar-alamat">
                <!-- Daftar alamat akan diisi oleh JavaScript -->
            </ul>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $(".btn-tambah-alamat").click(function() {
                var namaId = $(this).data('nama-id');
                $("#selected-nama-id").val(namaId);

                // Kosongkan daftar alamat dalam sidebar
                $("#daftar-alamat").empty();

                // Kirim permintaan AJAX untuk mendapatkan daftar alamat
                $.get("/alamat/" + namaId, function(data) {
                    $.each(data.alamats, function(index, alamat) {
                        // Tambahkan alamat ke daftar alamat dalam sidebar
                        $("#daftar-alamat").append("<li>" + alamat.alamat + "</li>");
                    });
                });

                // Munculkan sidebar sesuai dengan nama yang diklik
                $("#sidebar").addClass("show");
            });

            // Handle submit form input alamat
            $("#alamat-form").submit(function(e) {
                e.preventDefault();

                // Kirim permintaan AJAX untuk menyimpan alamat baru
                $.post("/alamat", $(this).serialize(), function(data) {
                    // Tambahkan alamat baru ke daftar alamat dalam sidebar
                    $("#daftar-alamat").append("<li>" + data.alamat + "</li>");
                    // Kosongkan form input alamat
                    $("#alamat").val('');
                });
            });
        });
    </script>
    <script>
        var offcanvasElement = document.getElementById('sidebar');
        var offcanvas = new bootstrap.Offcanvas(offcanvasElement);
    </script>


</body>

</html>
