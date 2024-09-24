@extends('role.purchasing.layoutsvendor.main')
@section('main-container')
    <main class="content">
        <div class="container-fluid p-0">
            <div class="mb-5 d-flex justify-content-between">
                <div class="px-5 mx-5">

                </div>
                <div>
                    <h1 class="h1 d-inline align-middle">Form</h1>
                    <a class="badge bg-dark text-white ms-2">
                        Supplier
                    </a>
                </div>
                <div>
                    <img src="{{ URL::asset('frontend/img/photos/logo.png') }}" style="width: 130px"
                        class=" img-fluid rounded me-1" />
                </div>
            </div>
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close" id="closeModal">&times;</span>
                    <!-- Tampilkan data yang telah di-submit di sini -->
                </div>
            </div>
            <form method="POST" action="{{ route('vendor.storeekp') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="type" value="EKP">
                <div class="container-sm">
                    <div class="">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Perusahaan</h4>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Nama Perusahaan</h5>
                                    </div>
                                    <div class="card-body">
                                        <input type="text" class="form-control" placeholder="Nama Vendor"
                                            name="namavendor" required>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Alamat Perusahaan</h5>
                                    </div>
                                    <div class="card-body">
                                        <input type="text" class="form-control" placeholder="Alamat" name="alamatvendor"
                                            required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Email</h5>
                                    </div>
                                    <div class="card-body">
                                        <input type="text" class="form-control" placeholder="Email Perusahaan/sales"
                                            name="email" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">No Telp</h5>
                                    </div>
                                    <div class="card-body">
                                        <input type="text" class="form-control" placeholder="No Telp/Hp " name="telp" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Penanggung Jawab <span class="text-danger">(General
                                                Manajer / Setara)</span></h5>
                                    </div>
                                    <div class="card-body">
                                        <input type="text" class="form-control" placeholder="Penanggung Jawab"
                                            name="penanggungjawab" required>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Jabatan Penanggung Jawab <span class="text-danger">(
                                                General Manajer / Setara)</span></h5>
                                    </div>
                                    <div class="card-body">
                                        <input type="text" class="form-control" placeholder="Jabatan..." name="kosong1"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">CP</h5>
                                    </div>
                                    <div class="card-body">
                                        <input type="text" class="form-control" placeholder="CP/Sales" name="cp" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">NIB/SIUP</h5>
                                    </div>
                                    <div class="card-body ">
                                        <input type="file" class="form-control" placeholder="CP/Sales" name="iamgenib" required>
                                    </div>
                                </div>
                            </div>



                            <div class="card-header">
                                <h4>Data Bank</h4>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Nama Bank</h5>
                                    </div>
                                    <div class="card-body">
                                        <input type="text" class="form-control" placeholder="Bank" name="namabank" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">No Rekening</h5>
                                    </div>
                                    <div class="card-body">
                                        <input type="text" class="form-control" placeholder="Nomor Rekening"
                                            name="norek"required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Alamat Bank</h5>
                                    </div>
                                    <div class="card-body">
                                        <input type="text" class="form-control" placeholder="Alamat Bank"
                                            name="bankaddress" required>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">NPWP</h5>
                                    </div>
                                    <div class="card-body d-flex">
                                        <input type="text" class="form-control" placeholder="Nomor NPWP" name="kosong2">
                                        <input type="file" name="imagenpwp" 
                                            class="form-control" required/>

                                    </div>
                                </div>
                            </div>
                            <div class="card-header">
                                <h4>Data Operasional</h4>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Lead Time */ Days</h5>
                                    </div>
                                    <div class="card-body d-flex">
                                        <input type="number" class="form-control" placeholder="Lead-Time"
                                            name="leadtime" required>

                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Asuransi</h5>
                                    </div>
                                    <div class="card-body">

                                        <select class="form-select" name="asuransi">
                                            <option selected>Select Menu</option>
                                            <option value="IYA">IYA</option>
                                            <option value="TIDAK">TIDAK</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">

                                    <div class="card-header">
                                        <h5 class="card-title mb-0">GPS</h5>
                                    </div>
                                    <div class="card-body">
                                        <select class="form-select" name="gps">
                                            <option selected>Select Menu</option>
                                            <option value="IYA">IYA</option>
                                            <option value="TIDAK">TIDAK</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Driver</h5>
                                    </div>
                                    <div class="card-body">
                                        <select class="form-select" name="driver">
                                            <option selected>Select Menu</option>
                                            <option value="Mitra">Mitra</option>
                                            <option value="Karyawan">Karyawan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Pricelist *<span class="text-danger"
                                                style="font-size: 11px;">Jika ada</span>
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <input type="file" name="imagepricelist" class="form-control" />

                                    </div>
                                </div>

                                <div class="col">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">KTP / ID PIC</h5>
                                    </div>
                                    <div class="card-body">
                                        <input type="file" name="imageidpic" class="form-control" required/>

                                    </div>
                                </div>

                            </div>






                            <div class="card-header">
                                <h4>Data Kendaraan</h4>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Unit Type</h5>
                                    </div>
                                    <div class="card-body">
                                        <input type="text" name="unittype[]" placeholder="Jenis Unit"
                                            class="form-control" value="CDD Long" readonly />

                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Capacity CBM</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" name="capacitycbmmin[]" placeholder="MIN"
                                                    class="form-control" required/>
                                            </div>
                                            <div class="col">
                                                <input type="text" name="capacitycbmmax[]" placeholder="MAX"
                                                    class="form-control" required/>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Capacity TON</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" name="capacityton    in[]" placeholder="MIN"
                                                    class="form-control" required/>
                                            </div>
                                            <div class="col">
                                                <input type="text" name="capacitytonmax[]" placeholder="MAX"
                                                    class="form-control" required/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Jumlah Unit </h5>
                                    </div>
                                    <div class="card-body">
                                        <input type="text" name="unitqty[]" placeholder="Quantity Unit"
                                            class="form-control" required/>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">

                                    <div class="card-body">
                                        <input type="text" name="unittype[]" placeholder="Jenis Unit"
                                            class="form-control" value="FUSO" readonly />

                                    </div>
                                </div>
                                <div class="col">

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" name="capacitycbmmin[]" placeholder="MIN"
                                                    class="form-control" required/>
                                            </div>
                                            <div class="col">
                                                <input type="text" name="capacitycbmmax[]" placeholder="MAX"
                                                    class="form-control" required/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" name="capacitytonmin[]" placeholder="MIN"
                                                    class="form-control" required />
                                            </div>
                                            <div class="col">
                                                <input type="text" name="capacitytonmax[]" placeholder="MAX"
                                                    class="form-control" required/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">

                                    <div class="card-body">
                                        <input type="text" name="unitqty[]" placeholder="Quantity Unit"
                                            class="form-control" required />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">

                                    <div class="card-body">
                                        <input type="text" name="unittype[]" placeholder="Jenis Unit"
                                            class="form-control" value="Wing Box" readonly />
                                    </div>
                                </div>
                                <div class="col">

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" name="capacitycbmmin[]" placeholder="MIN"
                                                    class="form-control" required/>
                                            </div>
                                            <div class="col">
                                                <input type="text" name="capacitycbmmax[]" placeholder="MAX"
                                                    class="form-control" required/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" name="capacitytonmin[]" placeholder="MIN"
                                                    class="form-control" required/>
                                            </div>
                                            <div class="col">
                                                <input type="text" name="capacitytonmax[]" placeholder="MAX"
                                                    class="form-control" required/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">

                                    <div class="card-body">
                                        <input type="text" name="unitqty[]" placeholder="Jumlah Unit"
                                            class="form-control" required/>
                                    </div>
                                </div>

                            </div>
                            <div id="newinput"></div>
                            <div class="col">
                                <div class="card-header">
                                    <div id="rowAdder" class="btn btn-dark">Add More Unit</div>
                                </div>
                            </div>
                            <script type="text/javascript">
                                $("#rowAdder").click(function() {
                                    newRowAdd =

                                        '<div id="row"><div class="row"><div class="col"><div class="card-body"><input type="text" name="unittype[]" placeholder="Jenis Unit"class="form-control" /></div></div><div class="col"><div class="card-body"><div class="row"><div class="col"><input type="text" name="capacitycbmmin[]" placeholder="MIN"class="form-control" /></div><div class="col"><input type="text" name="capacitycbmmax[]" placeholder="MAX"class="form-control" /></div></div></div></div><div class="col"><div class="card-body"><div class="row"><div class="col"><input type="text" name="capacitytonmin[]" placeholder="MIN"class="form-control" /></div><div class="col"><input type="text" name="capacitytonmax[]" placeholder="MAX"class="form-control" /></div></div></div></div><div class="col"><div class="card-body"><input type="text" name="unitqty[]" placeholder="Quantity Unit"class="form-control" /></div></div></div><button class="btn btn-danger mx-3 px-4"  id="DeleteRow" type="button">Remove</button></div>';

                                    $('#newinput').append(newRowAdd);
                                });
                                $("body").on("click", "#DeleteRow", function() {
                                    $(this).parents("#row").remove();
                                })
                            </script>
                            <a class='text-primary px-3 mx-4' style="text-decoration: underline" type="button" id="viewButton" data-bs-toggle="modal"
                                data-bs-target="#viewModal">Terms &
                                Aggreement</a>
                            <a class='text-primary px-3 mx-4' style="text-decoration: underline" type="button" id="viewButton2" data-bs-toggle="modal"
                                data-bs-target="#viewModal2">Preview Checklist</a>

                            <div class="card-body text-center ">
                                <h4>Tanda Tangan disini <span class='text-danger' style='font-size:13px;'>* Wajib</span></h4>
                                <canvas class="border border-secondary" id="signatureCanvas" width="400"
                                    height="200"></canvas>
                                    <div>
                                <button type="button" class="btn btn-danger" id="clearSignature">Clear</button>
                                        
                                    </div>
                            </div>
                        </div>

                    </div>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>

                    <input type="hidden" name="signatureData" id="signatureData">
                    <script>
                        // Inisialisasi signature pad
                        var canvas = document.getElementById('signatureCanvas');
                        var signaturePad = new SignaturePad(canvas);

                        // Tombol untuk menghapus tanda tangan
                        var clearButton = document.getElementById('clearSignature');
                        clearButton.addEventListener('click', function() {
                            signaturePad.clear();
                        });

                        // Menambahkan data tanda tangan ke input tersembunyi saat formulir di-submit
                        var form = document.querySelector('form');
                        form.addEventListener('submit', function() {
                            var signatureData = signaturePad.toDataURL();
                            document.getElementById('signatureData').value = signatureData;
                        });

                        // Tambahkan kode JavaScript untuk menambahkan atau menghapus baris formulir sesuai kebutuhan Anda
                    </script>




                    <div class="container">
                        <button class="btn btn-dark" type="submit" style="width: 100%">Add Price List</button>
                    </div>
            </form>

            <div class="modal" id="viewModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">PERJANJIAN KERJASAMA</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Display data here -->
                            <div id="modalContent">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal" id="viewModal2" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Preview Checklist</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Display data here -->
                            <div id="modalContent2">
                            </div>
                        </div>
                    </div>
                </div>
            </div>





            <script>
                $(document).ready(function() {
                    $("#viewButton").click(function() {
                        const namavendor = $("input[name='namavendor']").val();
                        const alamatvendor = $("input[name='alamatvendor']").val();
                        const penanggungjawab = $("input[name='penanggungjawab']").val();
                        const cp = $("input[name='cp']").val();
                        const kosong1 = $("input[name='kosong1']").val();
                        const email = $("input[name='email']").val();
                        const telp = $("input[name='telp']").val();
                        const bank = $("input[name='bank']").val();
                        const norek = $("input[name='norek']").val();
                        const bankaddress = $("input[name='bankaddress']").val();
                        const modalContent = `

<p style='font-size:13px;'>PIHAK A<br/>
Nama: STEPHANIE NEGORO<br/>
Nama Perusahaan: PT. ARJAYA MUKTI SENTOSA<br/>
Jabatan: MANAJER UMUM<br/>
Alamat: JL. IMAM BONJOL NO. 838, ARDIMULYO, SINGOSARI, MALANG<br/>
Telepon: 0341-458268<br/>
</p>
<p style='font-size:13px;'>Selanjutnya disebut sebagai "PIHAK A"</p>
<p style='font-size:13px;'>
PIHAK B<br/>
Nama: ${penanggungjawab}<br/>
Nama Perusahaan: ${namavendor}<br/>
Jabatan: ${kosong1}<br/>
Alamat:  ${alamatvendor}<br/>
Telepon: ${telp}<br/>
</p>
<p style='font-size:13px;'>Selanjutnya disebut sebagai "PIHAK B"</p>
<p style='font-size:13px;'>Berdasarkan negosiasi, PIHAK A dan PIHAK B (selanjutnya disebut sebagai "PARA PIHAK") telah setuju untuk melakukan perjanjian kerjasama mengenai ruang lingkup jasa pengangkutan dan ekspedisi barang, berdasarkan syarat dan ketentuan berikut:</p>
<p style='font-size:13px;'>
<strong>ARTIKEL 1</strong><br/>
<strong>RUANG LINGKUP PEKERJAAN</strong><br/>
PARA PIHAK telah setuju untuk bekerja sama, di mana PIHAK B menyediakan layanan pengangkutan barang dengan harga yang disepakati melalui penawaran harga dari PIHAK B dan/atau Kesepakatan Harga (Lampiran 1).
</p>
<p style='font-size:13px;'>
<strong>ARTIKEL 2</strong><br/>
<Strong>HAK DAN KEWAJIBAN</Strong><br/>
PIHAK B harus memastikan armada yang digunakan sesuai dengan standar yang ditetapkan oleh PIHAK A (Lampiran 2).<br/>
Jika kendaraan tidak sesuai dengan standar yang ditetapkan, PIHAK A berhak menolak penggunaan kendaraan tersebut.<br/>
Kerusakan barang, seperti Kotak Basah atau Kotak Rusak karena kelalaian selama pengiriman, akan dikenakan biaya kepada PIHAK B.
Pengemudi harus menandatangani surat jalan setelah menerima barang, dan jika terdapat kekurangan barang setelah pengiriman, itu menjadi tanggung jawab PIHAK B.
PIHAK B wajib melaksanakan pekerjaan sesuai permintaan PIHAK A, termasuk pembaruan lokasi yang akurat setiap enam jam dalam kelompok koordinasi.
PIHAK B harus mengikuti persyaratan pengiriman yang disepakati dalam kelompok koordinasi, menjaga fisik dan kerahasiaan barang milik PIHAK A.
Jika ada biaya tambahan yang tidak disepakati pada awal pengiriman, PIHAK B harus meminta persetujuan terlebih dahulu kepada PIHAK A.
</p>
<p style='font-size:13px;'>
<strong>ARTIKEL 3</strong><br/>
<strong>HARGA DAN PROSEDUR PEMBAYARAN</strong><br/>
Term Of Payment (TOP) adalah 30 hari setelah PIHAK A menerima faktur untuk barang-barang sesuai dengan harga yang disepakati (Pasal 1).<br/>
Ketika mengirimkan faktur, surat jalan pengiriman yang ditagihkan harus telah diterima oleh PIHAK A.<br/>
Biaya tambahan di luar kesepakatan awal pengiriman harus dilampirkan dalam faktur sebagai bukti yang sah.<br/>
Penerimaan maksimum surat jalan asli (berwarna putih) oleh PIHAK A adalah 14 hari sejak titik terakhir pengiriman. Jika melebihi 14 hari, akan dikenakan BIAYA TELAT sebesar 2% dari total nilai per surat jalan.
</p>
<p style='font-size:13px;'>
<strong>ARTIKEL 4</strong><br/>
<strong>LAMA BERLAKU</strong><br/>
Perjanjian ini berlaku selama 12 (dua belas) bulan sejak tanggal hingga TANGGAL DI ATAS + 1 tahun.
</p>
<p style='font-size:13px;'>
<strong>ARTIKEL 5</strong><br/>
<strong>KEADAAN KAHAR (FORCE MAJEURE)</strong><br/>
PARA PIHAK dibebaskan dari tanggung jawab pelaksanaan Perjanjian ini akibat keadaan kahar, seperti perang, mobilisasi, epidemi, dan bencana alam. PARA PIHAK yang mengalami keadaan kahar harus memberitahukan pihak lainnya dalam waktu 2X24 jam.
</p>
<p style='font-size:13px;'>
<strong>ARTIKEL 6</strong><br/>
<strong>PENYELESAIAN SENGKETA</strong><br/>
Sengketa, perbedaan pendapat, atau gugatan yang timbul sehubungan dengan pelaksanaan perjanjian ini akan diselesaikan oleh PARA PIHAK melalui musyawarah dan mufakat.
</p>

<p style='font-size:13px;'>
<strong>ARTIKEL 7</strong><br/>
<strong>LAIN-LAIN</strong><br/>
Hal-hal yang belum diatur atau belum cukup diatur dalam Perjanjian ini akan diatur oleh PARA PIHAK dalam lampiran yang merupakan bagian yang tidak terpisahkan dari perjanjian ini.
</p>

<p style='font-size:13px;'>
<strong>ARTIKEL 8</strong><br/>
<strong>PENUTUP</strong><br/>
Perjanjian ini dibuat dalam dua rangkap, masing-masing diberi materai secukupnya, dan masing-masing memiliki ketentuan hukum yang sama.
</p>

<p style='font-size:13px;'>
PIHAK A<br/>
PT. ARJAYA MUKTI SENTOSA<br/>
Nama PIC untuk Pihak A: STEPHANIE NEGORO<br/>
Jabatan PIC untuk Pihak A: GENERAL  MANAJER<br/>
</p>        `;

                        $("#modalContent").html(modalContent);
                    });
                });
            </script>


            <script>
                $(document).ready(function() {
                    $("#viewButton2").click(function() {

                        const modalContent2 = `
                                <img width='750' src="{{ URL::asset('frontend/img/photos/previewcheklist.png') }}" alt="Preview Image" />
`;

                        $("#modalContent2").html(modalContent2);
                    });
                });
            </script>
        </div>
    </main>
@endsection
