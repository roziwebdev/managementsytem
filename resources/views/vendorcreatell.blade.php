@extends('role.purchasing.layoutsvendor.main')
@section('main-container')
    <main class="content">
        <div class="container-fluid p-0">
            <div class="mb-5 text-center">
                <h1 class="h1 d-inline align-middle">Form</h1>
                <a class="badge bg-dark text-white ms-2">
                    Dokumentasi Supplier ARJAYA
                </a>
            </div>
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close" id="closeModal">&times;</span>
                    <!-- Tampilkan data yang telah di-submit di sini -->
                </div>
            </div>
            <form method="POST" action="{{ route('vendor.store') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="type" value="LL">
                <div class="container-xl">
                    <div class="">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Nama Perusahaan</h5>
                            </div>
                            <div class="card-body">
                                <input type="text" class="form-control" placeholder="Nama Vendor" name="namavendor">
                            </div>
                            <div class="card-header">
                                <h5 class="card-title mb-0">Alamat Perusahaan</h5>
                            </div>
                            <div class="card-body">
                                <input type="text" class="form-control" placeholder="Alamat" name="alamatvendor">
                            </div>


                            <div class="card-header">
                                <h5 class="card-title mb-0">Penanggung Jawab <span class="text-danger">(General
                                        Manajer / Setara)</span></h5>
                            </div>
                            <div class="card-body">
                                <input type="text" class="form-control" placeholder="Penanggung Jawab"
                                    name="penanggungjawab" required>
                            </div>
                            <div class="card-header">
                                <h5 class="card-title mb-0">Jabatan Penanggung Jawab <span class="text-danger">(
                                        General Manajer / Setara)</span></h5>
                            </div>
                            <div class="card-body">
                                <input type="text" class="form-control" placeholder="Jabatan..." name="kosong1" required>
                            </div>
                            <div class="card-header">
                                <h5 class="card-title mb-0">CP</h5>
                            </div>
                            <div class="card-body">
                                <input type="text" class="form-control" placeholder="CP/Sales" name="cp">
                            </div>
                            <div class="card-header">
                                <h5 class="card-title mb-0">Email</h5>
                            </div>
                            <div class="card-body">
                                <input type="text" class="form-control" placeholder="Email Perusahaan/sales"
                                    name="email">
                            </div>
                            <div class="card-header">
                                <h5 class="card-title mb-0">No Telp</h5>
                            </div>
                            <div class="card-body">
                                <input type="text" class="form-control" placeholder="No Telp/Hp " name="telp">
                            </div>





                            <div class="card-header">
                                <h5 class="card-title mb-0">Nama Bank</h5>
                            </div>
                            <div class="card-body">
                                <input type="text" class="form-control" placeholder="Bank" name="bank">
                            </div>
                            <div class="card-header">
                                <h5 class="card-title mb-0">No Rekening</h5>
                            </div>
                            <div class="card-body">
                                <input type="text" class="form-control" placeholder="Nomor Rekening" name="norek">
                            </div>
                            <div class="card-header">
                                <h5 class="card-title mb-0">Alamat Bank</h5>
                            </div>
                            <div class="card-body">
                                <input type="text" class="form-control" placeholder="Alamat Bank" name="bankaddress">
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">PIC*</h5>
                                    </div>
                                    <div class="card-body">
                                        <input type="file" name="imageidpic" class="form-control" />

                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Pricelist</h5>
                                    </div>
                                    <div class="card-body">
                                        <input type="file" name="imagepricelist" class="form-control" />

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">NIB/SIUP</h5>
                                    </div>
                                    <div class="card-body">
                                        <input type="file" name="imagenib" placeholder="Jenis / Item yang di Supply"
                                            class="form-control" />

                                    </div>
                                </div>

                                <div class="col">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">NPWP</h5>
                                    </div>
                                    <div class="card-body">
                                        <input type="file" name="NPWP" placeholder="Toleransi %"
                                            class="form-control" />

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
                                                placeholder="Jenis / Item yang di Supply" class="form-control" />

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
                            <a style="text-decoration: underline" type="button" id="viewButton" data-bs-toggle="modal"
                                data-bs-target="#viewModal">Terms &
                                Aggreement</a>

                            <div class="card-body text-center ">
                                <canvas class="border border-secondary" id="signatureCanvas" width="400"
                                    height="200"></canvas>
                                <button type="button" class="btn btn-danger" id="clearSignature">Clear</button>
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

                            <script type="text/javascript">
                                $("#rowAdder").click(function() {
                                    newRowAdd =

                                        '<div id="row"><div class="row"><div class="col"><div class="card-header"><h5 class="card-title mb-0">Jenis Item yang di Supply</h5></div><div class="card-body"><input type="text" name="jenisygdisupply[]"placeholder="Jenis / Item yang di Supply" class="form-control" /></div></div></div><button class="btn btn-danger" style="width: 100%" id="DeleteRow" type="button">Remove</button></div>';

                                    $('#newinput').append(newRowAdd);
                                });
                                $("body").on("click", "#DeleteRow", function() {
                                    $(this).parents("#row").remove();
                                })
                            </script>

                            <button onclick="alert" class="btn btn-dark" type="submit">Submit</button>

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
                            <!-- Display data here -->
                            <div id="modalContent">
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
<p style='font-size:13px;'><strong>NOMOR PERJANJIAN : _______________</strong></p>
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
Jabatan PIC untuk Pihak A: MANAJER UMUM<br/>
</p>


<p style='font-size:13px;'><strong>TERMS AND AGREEMENT (English Version)</strong></p>

<p style='font-size:13px;'><strong>AGREEMENT NUMBER : _______________</strong></p>

<p style='font-size:13px;'>
Party A<br/>
Name: STEPHANIE NEGORO<br/>
Company Name: PT. ARJAYA MUKTI SENTOSA<br/>
Position: GENERAL MANAGER<br/>
Address: JL. IMAM BONJOL NO. 838, ARDIMULYO, SINGOSARI, MALANG<br/>
Phone: 0341-458268<br/>
</p>
<p style='font-size:13px;'>Hereinafter referred to as "PARTY A"</p>

<p style='font-size:13px;'>
Party B<br/>
Name: ${penanggungjawab }<br/>
Company Name: ${namavendor }<br/>
Position: ${kosong1}<br/>
Address: ${alamatvendor }<br/>
Phone: ${telp }<br/>
</p>

<p style='font-size:13px;'>Hereinafter referred to as "PARTY B"</p>

<p style='font-size:13px;'>Based on negotiations, PARTY A and PARTY B (hereinafter referred to as "THE PARTIES") have agreed to enter into a cooperation agreement regarding the scope of goods transportation and expedition services, under the following terms and conditions:</p>

<p style='font-size:13px;'>

    <strong>
        ARTICLE 1<br/>
SCOPE OF WORK<br/>
        </strong>

THE PARTIES have agreed to cooperate, where PARTY B provides goods transportation services at the agreed prices through a price quotation from PARTY B and/or Price Agreement (Attachment 1).
</p>

<p style='font-size:13px;'>
    <strong>
        ARTICLE 2<br/>
RIGHTS AND OBLIGATIONS<br/>
        </strong>

PARTY B must ensure that the fleet used complies with the standards set by PARTY A (Attachment 2).<br/>
If the vehicles are found not to meet the standards set, PARTY A has the right to refuse to use those vehicles.<br/>
Damage to goods, such as Wet or Damaged Boxes due to negligence during shipment, will be charged to PARTY B.<br/>
The driver must sign the waybill after receiving the goods, and if there are any shortages in the goods after delivery, it becomes PARTY B's responsibility.<br/>
PARTY B is obligated to carry out the work as requested by PARTY A, including accurate location updates every six hours in the coordination group.<br/>
PARTY B must follow the delivery requirements as agreed upon in the coordination group, maintaining the physical and confidential nature of PARTY A's goods.<br/>
If there are any additional expenses not agreed upon at the beginning of the shipment, PARTY B must obtain prior approval from PARTY A.<br/>
</p>

<p style='font-size:13px;'>
    <strong>
        ARTICLE 3<br/>
PRICE AND PAYMENT PROCEDURES<br/>
        </strong>

The Term Of Payment (TOP) is 30 days after PARTY A receives the invoice for goods at the agreed prices (Article 1).<br/>
When sending the invoice, the delivery waybill that is billed must have been received by PARTY A.<br/>
Additional costs beyond the initial shipping agreement must be attached to the invoice as valid evidence.<br/>
The maximum acceptance of the original waybill (white color) by PARTY A is 14 days from the last point of delivery. If it exceeds 14 days, a LATE CHARGE of 2% of the total value per waybill will be applied.<br/>
</p>

<p style='font-size:13px;'>
    <strong>
        ARTICLE 4<br/>
DURATION<br/>
        </strong>

This agreement is valid for a period of 12 (twelve) months from the date until the DATE ABOVE + 1 year.<br/>
</p>

<p style='font-size:13px;'>
    <strong>
        ARTICLE 5<br/>
FORCE MAJEURE<br/>
        </strong>

THE PARTIES are exempt from the responsibility of implementing this Agreement due to force majeure, such as war, mobilization, epidemics, and natural disasters. THE PARTIES experiencing force majeure must notify the other party within 2X24 hours.
</p>

<p style='font-size:13px;'>
    <strong>
        ARTICLE 6<br/>
DISPUTE RESOLUTION<br/>
        </strong>

Disputes, differences of opinion, or claims arising in connection with the implementation of this agreement will be resolved by THE PARTIES through consultation and consensus.
</p>

<p style='font-size:13px;'>
    <strong>
        ARTICLE 7<br/>
MISCELLANEOUS<br/>
        </strong>

Matters not regulated or insufficiently regulated in this Agreement will be addressed by THE PARTIES in an attachment that is an integral part of this agreement.
</p>

<p style='font-size:13px;'>
    <strong>
        ARTICLE 8<br/>
        CLOSING<br/>
        </strong>
This agreement is made in two copies, each affixed with sufficient stamp duty, and each having the same legal provisions.
</p>



<p style='font-size:13px;'>
PARTY A<br/>
PT. ARJAYA MUKTI SENTOSA<br/>
Name of PIC for Party A: STEPHANIE NEGORO<br/>
Position of PIC for Party A: GENERAL MANAGER
</p>





        `;

                        $("#modalContent").html(modalContent);
                    });
                });
            </script>

        </div>
    </main>
@endsection
