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
            <form method="POST" action="{{ route('vendor.store') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="type" value="Papper">
                <div class="container-xl">
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
                                        <input type="text" required class="form-control" placeholder="Nama Vendor"
                                            name="namavendor">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Alamat Perusahaan</h5>
                                    </div>
                                    <div class="card-body">
                                        <input type="text" required class="form-control" placeholder="Alamat"
                                            name="alamatvendor">
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
                                        <input type="text" class="form-control" placeholder="Penanggung Jawab" required
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
                                        <h5 class="card-title mb-0">Email</h5>
                                    </div>
                                    <div class="card-body">
                                        <input type="text" class="form-control" placeholder="Email Perusahaan/sales"
                                            required name="email">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">No Telp</h5>
                                    </div>
                                    <div class="card-body">
                                        <input type="text" required class="form-control" placeholder="No Telp/Hp "
                                            name="telp">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Contact Person</h5>
                                    </div>
                                    <div class="card-body">
                                        <input required type="text" class="form-control" placeholder="CP/Sales"
                                            name="cp">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">NIB/SIUP *<span class="text-danger"
                                                style="font-size: 11px">Jika ada</span></h5>
                                    </div>
                                    <div class="card-body">
                                        <input type="file" name="imagenib" 
                                            class="form-control"  />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">KTP / ID PIC</h5>
                                    </div>
                                    <div class="card-body" >
                                        <input type="file" name="imageidpic" class="form-control"  required/>

                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Pricelist *<span class="text-danger"
                                                style="font-size: 11px">Jika ada</span></h5>
                                    </div>
                                    <div class="card-body">
                                        <input type="file" name="imagepricelist" class="form-control" />
                                    </div>
                                </div>
                            </div>




                            <div class="card-header">
                                <h4>Data Finansial</h4>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Nama Bank</h5>
                                    </div>
                                    <div class="card-body">
                                        <input type="text" class="form-control" placeholder="Bank" name="bank" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">No Rekening</h5>
                                    </div>
                                    <div class="card-body">
                                        <input type="text" class="form-control" placeholder="Nomor Rekening"
                                            name="norek" required>
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
                                        <input class="form-control" name="kosong2" type="text" placeholder="Nomor NPWP"
                                            required />
                                        <input type="file" name="imagenpwp" class="form-control" required />
                                    </div>
                                </div>
                            </div>






                            <div id="row">
                                <div class="row">
                                    <div class="col">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Jenis Item yang di Supply</h5>
                                        </div>
                                        <div class="card-body">
                                            <input type="text" name="jenisygdisupply[]"
                                                placeholder="Jenis / Item yang di Supply" class="form-control" required />
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Toleransi</h5>
                                        </div>
                                        <div class="card-body">
                                            <input type="text" name="toleransi[]" placeholder="Toleransi barang"
                                                class="form-control" required />
                                        </div>
                                    </div>



                                </div>
                            </div>




                            <div id="newinput"></div>
                            <div class="col">
                                <div class="card-header">
                                    <div id="rowAdder" class="btn btn-dark">Add More Item</div>
                                </div>

                            </div>
                            <a class='px-3 mx-4 text-primary' style="text-decoration: underline" type="button" id="viewButton" data-bs-toggle="modal"
                                data-bs-target="#viewModal">Terms &
                                Aggreement</a>

                            <div class="card-body text-center ">
                                <h4>Tanda tangan disini</h4>
                                <canvas class="border border-secondary" id="signatureCanvas" width="400"
                                    height="200"></canvas>
                                    <div>
                                        
                                <button type="button" class="btn btn-danger" id="clearSignature">Clear</button>
                                    </div>
                            </div>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>

                            <input type="hidden" name="signatureData" id="signatureData">
                            <script>
                                // Inisialisasi signature pad
                                var canvas = document.getElementById('signatureCanvas');
                                var signaturePad = new SignaturePad(canvas);

                                // Tombol clear signature
                                var clearButton = document.getElementById('clearSignature');
                                clearButton.addEventListener('click', function() {
                                    signaturePad.clear();
                                });

                                // Dapatkan formulir
                                var form = document.querySelector('form');

                                // Submit handler
                                form.addEventListener('submit', function(e) {

                                    // Dapatkan data signature
                                    var signatureData = signaturePad.toDataURL();

                                    // Validasi jika kosong
                                    if (signatureData == '') {
                                        e.preventDefault(); // cegah submit

                                        alert('Anda belum menandatangani formulir ini');

                                    } else {
                                        // Jika ada tanda tangan, kirim data
                                        document.getElementById('signatureData').value = signatureData;
                                    }

                                });
                            </script>

                            <script type="text/javascript">
                                $("#rowAdder").click(function() {
                                    newRowAdd =

                                        '<div id="row"><div class="row"><div class="col"><div class="card-header"><h5 class="card-title mb-0">Jenis Item yang di Supply</h5></div><div class="card-body"><input type="text" required name="jenisygdisupply[]"placeholder="Jenis / Item yang di Supply" class="form-control" /></div></div> <div class="col"><div class="card-header"><h5 class="card-title mb-0">Toleransi</h5></div><div class="card-body"><input type="text" name="toleransi[]" placeholder="Toleransi barang"class="form-control" required /></div></div></div><button class="btn btn-danger px-4 mx-3"  id="DeleteRow" type="button">Remove</button></div>';

                                    $('#newinput').append(newRowAdd);
                                });
                                $("body").on("click", "#DeleteRow", function() {
                                    $(this).parents("#row").remove();
                                })
                            </script>

                            <button class="btn btn-dark" type="submit">Submit</button>

                        </div>
                    </div>

            </form>
            <div class="modal" id="viewModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">SYARAT DAN PERJANJIAN</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div id="modalContent">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                $(document).ready(function() {
                    $("#viewButton").click(function() {
                        const type = $("input[name='type']").val();
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
 <p style='font-size:13px'>
<strong>PENYEDIAAN BARANG ATAU JASA<br/>
PT ARJAYA MUKTI SANTOSA<br/>
DENGAN<br/>
${namavendor}</strong>
</p>
<p style='font-size:13px'>
PT. Arjaya Mukti Santosa, suatu perseroan terbatas yang didirikan secara sah berdasarkan hukum negara Republik Indonesia, berkedudukan di Jl. Imam Bonjol No. 838, Ardimulyo, Singosari, Malang, Jawa Timur, dalam hal ini diwakili oleh:
Nama: Stephanie Negoro, <br/>
Jabatan: General Manager
</p>
<p style='font-size:13px'>dari dan karenanya sah bertindak untuk dan atas nama PT. ARJAYA MUKTI SANTOSA, untuk selanjutnya disebut ”PIHAK PERTAMA”.</p>
<p style='font-size:13px'>PT. ${namavendor} yang didirikan berdasarkan hukum negara Republik Indonesia, berkedudukan di ${alamatvendor} yang dalam hal ini diwakili oleh:<br/>
Nama: ${penanggungjawab} <br/>
Jabatan: ${kosong1}
</p>
<p style='font-size:13px'>oleh karenanya sah bertindak untuk dan atas nama PT. ${namavendor} untuk selanjutnya disebut “PIHAK KEDUA”.</p>
<p style='font-size:13px'>PIHAK PERTAMA dan PIHAK KEDUA secara bersama-sama selanjutnya disebut sebagai “PARA PIHAK” dan secara sendiri-sendiri selanjutnya disebut “PIHAK”.
</p>
<p style='font-size:13px'>PARA PIHAK sepakat untuk menunjuk PIHAK KEDUA sebagai penyedia ${type} untuk PIHAK PERTAMA.</p>
<p style='font-size:13px'>Berdasarkan hal-hal tersebut diatas, PARA PIHAK sepakat untuk membuat dan melaksanakan Perjanjian dengan syarat dan ketentuan sebagai berikut : </p>
<p style='font-size:13px'>
<strong>PASAL 1</strong><br/>
<strong>RUANG LINGKUP PEKERJAAN</strong><br/>
PIHAK KEDUA setuju dan sepakat untuk memberikan penyediaan barang atau jasa yang harga dan spesifikasinya telah disepakati pada proses penawaran kepada PIHAK PERTAMA dengan lingkup pekerjaan Sistem PO (Purchase Order) yang diterbitkan oleh PIHAK PERTAMA.
</p>
<p style='font-size:13px'>
<strong>PASAL 2</strong><br/>
<strong>JANGKA WAKTU</strong><br/>
Perjanjian ini akan tetap berlaku tanpa batas waktu, kecuali diakhiri oleh salah satu pihak dengan pemberitahuan tertulis yang diberikan minimal 90 hari sebelum tanggal pemberhentian yang diinginkan.<br/>
Perjanjian ini dapat ditinjau dan diubah sesuai persetujuan tertulis dari kedua belah pihak seperti yang diperlukan.
</p>
<p style='font-size:13px'>
    <strong>PASAL 3</strong><br/>
<strong>KETENTUAN PENYEDIA BARANG ATAU JASA</strong><br/>
PARA PIHAK setuju dan sepakat dengan ketentuan penyediaan barang atau jasa dan cara pembayaran adalah sebagai berikut :<br/>
Untuk item yang baru pertama kali di beli, harga akan di informasikan secara formal oleh PIHAK KEDUA melalui penawaran resmi yang ditandatangani dan dibubuhi stempel, dan atau melalui pesan tertulis yang dikirim melalui platform Whatsapp contact resmi Purchasing PT. Arjaya Mukti Santosa.<br/>
PIHAK KEDUA setuju untuk memberikan pemberitahuan awal kepada PIHAK PERTAMA jika ada perubahan spesifikasi untuk barang atau jasa yang disediakan.<br/>
Barang atau jasa akan disediakan sesuai dengan lead time yang telah disepakati, apabila terdapat kendala atau keterlambatan akan diberitahukan terlebih dahulu.<br/>
PIHAK KEDUA wajib mengkonfirmasi pengiriman barang maksimal H-1, dan harus melalui persetujuan PARA PIHAK.<br/>
PIHAK KEDUA setuju untuk menjamin kualitas dan melampirkan dokumen-dokumen yang diperlukan (COA dan/atau MSDS) sebagai bentuk komitmen terhadap kualitas barang yang dikirimkan.<br/>
Untuk pengiriman barang yang mudah rusak atau pecah harus dikemas dengan aman oleh PIHAK KEDUA.<br/>
PIHAK KEDUA wajib menjamin bahwa tidak ada benda asing yang terbawa dalam produk yang dikirim, maupun jasa yang disediakan dan berkomitmen akan mengambil semua tindakan yang diperlukan untuk mencegah hal ini terjadi, termasuk cleaning dan inspeksi kebersihan secara rutin.<br/>
PIHAK KEDUA bersedia menjalani audit eksternal yang mungkin diperlukan selama perjanjian ini berlaku.<BR/>
Apabila PIHAK PERTAMA berkeinginan melakukan revisi atau perubahan terhadap PO yang dikirim, PIHAK PERTAMA wajib memberitahukan perubahan PO tersebut secara tertulis kepada PIHAK KEDUA.<br/>
</p>
<p style='font-size:13px'>
    <strong>PASAL 4</strong><br/>
<strong>CARA PEMBAYARAN</strong><br/>
PARA PIHAK setuju dan sepakat dengan cara pembayaran sebagai berikut :<br/><br/>
PIHAK KEDUA akan mengirimkan invoice atau tagihan yang wajib disertai dengan copy PO yang sudah ditandatangani sebagai bentuk konfirmasi bahwa PO telah diterima dan diproses, dan PIHAK PERTAMA melakukan pembayaran pembayaran setelah diterimanya invoice atau tagihan dari PIHAK KEDUA. PIHAK PERTAMA wajib memberikan informasi pembayaran via email, fax atau telepon dengan memberikan bukti pembayaran dan mencantumkan nomor invoice PIHAK PERTAMA yang telah dibayarkan.Tagihan akan dibayarkan 30 Hari terhitung dari dokumen tagihan diterima oleh PIHAK PERTAMA<br/>
Tagihan dapat dikirimkan dengan mengirimkan softcopy (by email), diperiksa oleh PIHAK PERTAMA, dan telah menyetujui nilai dari tagihan tersebut maka PIHAK KEDUA wajib mengirimkan tagihan berbentuk fisik (hardcopy) pada alamat kantor yang telah diinformasikan oleh PIHAK PERTAMA.<br/>
Apabila ada lampiran atau Delivery Order (DO) atau Surat Jalan (SJ) hilang di PIHAK KEDUA, maka PIHAK KEDUA wajib membantu mencetak ulang (reprint) ulang lampiran atau Delivery Order (DO) atau Surat Jalan (SJ) untuk disertakan di invoice pada saat penagihan.<br/>
Apabila pembayaran lebih, maka PIHAK KEDUA wajib mengembalikan dengan cara transfer ke rekening Bank PIHAK PERTAMA :<br/>
Nama Bank	:  Bank BCA (Cab. Basuki Rahmad Malang)<br/>
No.  Rek        	:  011 3800 001<br/>
Atas Nama 	:  PT. Arjaya Mukti Santosa<br/>

Segala biaya pajak yang timbul sehubungan dengan pelaksanaan perjanjian ini menjadi tanggung jawab masing-masing pihak sesuai dengan ketentuan perundang-undangan perpajakan yang berlaku, kecuali ditentukan lain dalam perjanjian ini.<br/>
</p>
<p style='font-size:13px'>
<strong>PASAL 5</strong><br/>
<strong>PERNYATAAN DAN JAMINAN PARA PIHAK</strong><br/>
PARA PIHAK yang menandatangani perjanjian ini adalah pihak yang berwenang bertindak untuk dan atas nama PARA PIHAK dan telah memperoleh persetujuan yang diperlukan untuk mewakili masing-masing pihak termasuk untuk menandatangani dan melaksanakan Perjanjian ini.<br/>
PARA PIHAK sepakat untuk melengkapi pelaksanaan perjanjian ini dengan seluruh dokumen pendukung atau surat lainnya baik yang dipersyaratkan sesuai dengan anggaran dasar masing-masing pihak maupun ketentuan-ketentuan hukum yang berlaku.<br/>
</p>
<p style='font-size:13px'>
<strong>PASAL 6</strong><br/>
<strong>PENGALIHAN HAK DAN KEWAJIBAN</strong><br/>
PARA PIHAK dalam Perjanjian ini tidak diperkenankan untuk memindahkan hak dan kewajibannya baik sebagian maupun seluruhnya kepada pihak ketiga tanpa mendapatkan persetujuan tertulis terlebih dahulu dari pihak lainnya.
</p>
<p style='font-size:13px'>
<strong>PASAL 7</strong><br/>
<strong>KEADAAN MEMAKSA (FORCE MAJEURE)</strong><br/>
PIHAK KEDUA tidak akan wajib melaksanakan ketentuan-ketentuan penyediaan barang atau jasa kepada PIHAK PERTAMA dengan ketentuan sebagai berikut :<br/><br/>
Force Majeure merupakan segala keadaan atau peristiwa yang terjadi di luar kekuasaan PARA PIHAK termasuk namun tidak terbatas pada banjir, gempa bumi dan bencana alam lainnya, epidemi atau wabah penyakit, kebakaran, huru hara, perang, keputusan atau peraturan Pemerintah yang menghalangi PARA PIHAK secara langsung untuk melaksanakan segala kewajibannya sebagaimana yang diatur dalam perjanjian ini.<br/>
Dalam hal terjadinya peristiwa Force Majeure, PIHAK YANG MENGALAMI Force Majeure WAJIB memberitahukan kepada Pihak lainnya perihal peristiwa yang dialaminya dalam waktu selambat-lambatnya 7 (tujuh) hari kalender sejak peristiwa Force Majeure terjadi.<br/>
PARA PIHAK tidak dapat menggunakan Force Majeure ini sebagai alasan untuk membatalkan perjanjian ini.<br/>
Peristiwa Force Majeure ini harus dapat dibuktikan dan melengkapi dengan dokumen dari pada Pejabat yang berwenang, berupa laporan/berita acara dari kepolisian, syahbandar, pemberitaan media massa tentang kejadian Force Majeure tersebut dan laporan lainnya yang dapat membutikan validitas peristiwa.<br/>
Apabila terjadi Force Majeure, PARA PIHAK akan mencari penyelesaian terbaik untuk  memperoleh penggantian atas nilai barang yang rusak atau hilang yang diakibatkan oleh Force Majeure tersebut.
</p>
<p style='font-size:13px'>
<strong>PASAL 8</strong><br/>
<strong>KERAHASIAAN</strong><br/>
PARA PIHAK setuju untuk menjaga kerahasiaan data, informasi, strategi perusahaan, strategi pengembangan usaha, produk, layanan, pengetahuan, teknis, informasi lainnya termasuk isi dari perjanjian ini ("Informasi Rahasia") yang diperoleh dari PIHAK lainnya. Sehubungan dengan mana PARA PIHAK sepakat bahwa:<br/><br/>
Informasi Rahasia tidak dapat diperbanyak dan dipublikasikan tanpa izin tertulis yang berasal daripada PARA PIHAK.<br/>
Pihak Kedua setuju untuk menjaga kerahasiaan Informasi Rahasia Pihak Pertama, berlaku pula sebaliknya.<br/>
PARA PIHAK menjamin untuk tidak memberikan Informasi Rahasia kepada Pihak Ketiga lainnya, yang disebutkan atau tidak disebutkan dalam Perjanjian ini, baik selama atau setelah masa berlakunya Perjanjian ini. <br/>
Ketentuan ayat (1) dan ayat (2) Pasal ini masih berlaku walaupun perjanjian ini diakhiri.<br/>
Ketentuan-ketentuan ayat (1) dan (2) Pasal ini tidak berlaku terhadap informasi:<br/>
Yang pada saat pengungkapannya telah menjadi pengetahuan umum atau kemudian menjadi pengetahuan umum bukan karena kesalahan Pihak Penerima;<br/>
Yang sudah diketahui oleh Pihak Penerima pada tanggal pengungkapan dan pelanggaran kerahasiaan dan tidak diperoleh dari Pemberi Kerja;<br/>
Yang pada tanggal pengungkapan, sudah diketahui oleh Pihak Penerima dan/atau Pihak Lain. Namun, informasi yang dimaksud tidak berasal dari pemberi;<br/>
Yang diwajibkan oleh hukum atau oleh Pengadilan atau oleh pihak berwenang atau instansi Pemerintah atau oleh peraturan bursa saham dimana Pihak Penerima atau afiliasi bawahannya.<br/>
Jika PARA PIHAK melanggar ketentuan kerahasiaan ini, maka PIHAK yang melanggar akan dianggap lalai terhadap perjanjian ini dan PIHAK yang dirugikan dapat mengakhiri perjanjian ini dan/atau melakukan tuntutan hukum baik kepada PIHAK yang melanggar, maupun PIHAK Ketiga yang berkaitan dengan kelalaian tersebut, dengan biaya ditanggung oleh PIHAK yang melanggar, termasuk biaya pengacara.
</p>
<p style='font-size:13px'>
<strong>PASAL 9</strong><br/>
<strong>PENGAKHIRAN PERJANJIAN</strong><br/>
Perjanjian ini akan berakhir dalam hal :<br/>
Kesepakatan secara tertulis dari PARA PIHAK.<br/>
PIHAK KEDUA secara sepihak memutuskan untuk mengakhiri perjanjian tanpa adanya suatu tuntutan apapun dari PIHAK PERTAMA harus memberitahukan secara tertulis paling lambat 15 (lima belas) hari sebelum tanggal diakhirinya Perjanjian.<br/>
Pengakhiran Perjanjian oleh salah satu Pihak atas dasar wanprestasi / pelanggaran atas salah satu ketentuan dalam Perjanjian yang dilakukan oleh salah satu Pihak dalam Perjanjian.<br/>
Pemutusan Perjanjian oleh salah satu Pihak oleh karena wanprestasi sebagaimana dimaksud dalam Pasal 9 ayat 3, diawali dengan mengirimkan surat peringatan terlebih dahulu dari salah satu Pihak yang melakukan pelanggaran/wanprestasi. Apabila dalam waktu 7 (tujuh) hari kerja sejak tanggal surat peringatan tersebut, Pihak yang melakukan wanprestasi/pelanggaran tidak dapat memperbaiki kesalahannya maka Pihak lainnya berhak untuk mengakhiri/memutuskan Perjanjian ini dengan pemberitahuan tertulis kepada Pihak yang melakukan wanprestasi/pelanggaran tersebut.<br/>
Dalam hal berakhirnya Perjanjian, masing-masing Pihak tetap berkewajiban untuk memenuhi kewajiban yang belum dilaksanakan kepada pihak yang lain hingga berakhirnya Perjanjian ini.<br/>
</p>
<p style='font-size:13px'>
<strong>PASAL 10</strong><br/>
<strong>HUKUM YANG BERLAKU DAN PENYELESAIAN PERSELISIHAN</strong>><br/>
Perjanjian ini tunduk dan diatur berdasarkan hukum Negara Republik Indonesia.<br/>
Apabila terjadi perselisihan diantara PARA PIHAK, baik mengenai isi maupun teknis pelaksanaan Perjanjian maka PARA PIHAK akan menyelesaikannya dengan musyawarah untuk mufakat.
</p>
<p style='font-size:13px'>
<strong>PASAL 11</strong><br/>
<strong>PEMBERITAHUAN</strong><br/>
Semua pemberitahuan akan dilakukan secara tertulis dan dikirimkan kepada Pihak yang lainnya melalui pos/kurir atau faksimili dengan disertai bukti tanda terima dari Pihak yang menerima kepada alamat sebagai berikut :<br/>
PIHAK PERTAMA	: PT. Arjaya Mukti Santosa<br/>
Mobile			: 0822-1122-3391<br/>
Contact Person	: Stephanie Negoro<br/>
Email			: stephanie@arjayaprint.com<br/>
<br/>
PIHAK KEDUA		: ${namavendor}<br/>
Mobile			: ${telp}<br/>
Contact Person	: ${cp}<br/>
Email			: ${email}<br/>
Demikianlah perjanjian ini dibuat dan ditandatangani pada hari dan tanggal sebagaimana disebutkan di awal, bermaterai cukup dan dibuat rangkap 2 (dua) masing-masing mempunyai kekuatan hukum yang sama.
</p>
        `;
                        $("#modalContent").html(modalContent);
                    });
                });
            </script>

        </div>
    </main>
@endsection
