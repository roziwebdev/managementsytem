<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <style>
        p,td,th {
            font-size: 14px
        }
    </style>
</head>
<body>
    <div class="container-xxl pt-4" >
        <div class='d-flex justify-content-between'>
            <div>
                <br />
                <h2 style="padding-top:50px">{{ $quotation->customer }}</h2>
                <p>{{$quotation->alamat}}</p>
                <p style=''><b>Ref</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{ str_pad($quotation->id, 4,
                    '0', STR_PAD_LEFT) }}/AMS/{{$quotation->created_at->format('dmY')}}
                    <br />
                    <b>Date</b>&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
                    {{$quotation->created_at->format('d/m/Y')}}
                </p>
                <p style=''><b>Hal</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Penawaran Harga</p>
            </div>
            <div style='position:relative'>
                <img style='width:210px; top:-40px; left:-170px; position:absolute;'
                    src="{{ URL::asset('frontend1/img/photos/logoalamat.png') }}" />
            </div>
        </div>
        <p>Dengan Hormat,
        <br/>
        Bersama ini kami kirimkan Penawaran Harga sebagai berikut:
        </p>
        <table class="table border">
            <thead>
                <tr style="">
                    <th scope="col">No</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Bahan</th>
                    <th scope="col">Ukuran</th>
                    <th scope="col">Spesifikasi</th>
                    <th scope="col">Kuantitas</th>
                    <th scope="col">Harga</th>
                </tr>
            </thead>
            <tbody>
                @php
                $products = json_decode($quotation->product);
                $materials = json_decode(str_replace("\r\n", "\n", $quotation->material));
                $sizes = json_decode(str_replace("\r\n", "\n", $quotation->size));
                $specs = json_decode(str_replace("\r\n", "\n", $quotation->specs));
                $qtys = json_decode($quotation->qty);
                $units = json_decode($quotation->unit);
                $prices = json_decode($quotation->price);

                // Gabungkan semua data menjadi satu array dengan zip
                $combinedData = array_map(null, $products, $materials, $sizes, $specs, $qtys, $units, $prices);

                @endphp
                @foreach ($combinedData as $index => $data)
                @php
                $linespecs= explode("\r\n", $data[3]);
                $lines = explode("\r\n", $data[6]);
                $lines2 = explode("\r\n", $data[4]);
                foreach ($lines as &$line) {
                // Trim untuk menghilangkan spasi berlebih
                $line = trim($line);
                // Periksa apakah angka negatif (ada tanda minus di depan)
                $isNegative = $line[0] === '-';
                // Hilangkan tanda minus sementara untuk memformat angka
                $number = ltrim($line, '-');
                // Ubah format angka menggunakan number_format
                $formatted_number = number_format((float)$number, 1, ',', '.');
                // Tambahkan kembali tanda minus jika angka semula negatif
                if ($isNegative) {
                $formatted_number = '-' . $formatted_number;
                }
                // Simpan hasil format kembali ke dalam array
                $line = '•Rp.' .$formatted_number ."/". $data[5]  ;
                }
                // Gabungkan array menjadi satu string dengan karakter baris baru (\r\n)


                foreach ($lines2 as &$line) {
                // Trim untuk menghilangkan spasi berlebih
                $line = trim($line);
                // Periksa apakah angka negatif (ada tanda minus di depan)
                $isNegative = $line[0] === '-';
                // Hilangkan tanda minus sementara untuk memformat angka
                $number = ltrim($line, '-');
                // Ubah format angka menggunakan number_format
                $formatted_number = number_format((float)$number, 0, ',', '.');
                // Tambahkan kembali tanda minus jika angka semula negatif
                if ($isNegative) {
                $formatted_number = '-' . $formatted_number;
                }
                // Simpan hasil format kembali ke dalam array
                $line = '•' .$formatted_number."&nbsp;".$data[5];
                }


                $linespecs = explode("\n", $data[3]);
                // Menambahkan simbol "•" di depan setiap baris
                $linespecs = array_map(function($line) {
                return '•' . $line;
                }, $linespecs);
                // Menggabungkan kembali baris-baris tersebut dengan tag <br>

                // Gabungkan array menjadi satu string dengan karakter baris baru (\r\n)
                $formattedData = implode( $linespecs);
                $formatted_value = implode("\r\n", $lines );
                $formatted_value2 = implode("\r\n", $lines2);
                @endphp
                <tr style="">
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $data[0] }}</td>
                    <td>{!! nl2br($data[1]) !!}</td>
                    <td>{!! nl2br($data[2]) !!}</td>
                    <td>{!! nl2br($formattedData) !!} </td>
                    <td>{!! nl2br($formatted_value2) !!} </td>
                    <td>{!! nl2br($formatted_value )!!}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <p>Demikian penawaran harga dari kami supaya menjadi periksa adanya. Besar Harapan kami untuk segera mendapat kabar dari Bapak/ibu. Atas perhatian dan kerjasama yang baik kami ucapakan terima kasih.</p>
        <div>
            <p class="align-items-center">Hormat kami,</p>
            <div style="position: relative;">
                        <img style="width: 150px;  " src="{{ URL::asset('frontend1/img/photos/wendy.png') }}" />
                        <img style="width: 110px; position: absolute; top: 10px; left: 10px; z-index: -1; opacity: 0.3;"
                        src="{{ URL::asset('frontend1/img/photos/logoarjaya.png') }}" />
            </div>
            @if($quotation->seller == "Wendy Negoro")
            <p>
                <b>
                    <u>{{ $quotation->seller }}</u>
                    <br/>
                    <i>Marketing Director</i>
                </b>
            </p>
            @elseif($quotation->seller == "Stephanie Negoro")
            <p>
                <b>
                    <u>{{ $quotation->seller }}</u>
                    <br/>
                    <i>Director</i>
                </b>
            </p>
            @endif
            <p>
                <b><u>Keterangan :</u></b>
                <br/>
                 - Harga diatas Belum termasuk PPN 11%
                 <br/>
                 - Harga tidak mengikat, sewaktu-waktu dapat berubah, sebelum PO dibuka mohon dikonfirmasikan terlebih dahulu secara lisan/tulis kepada kami
                 <br/>
                 - Toleransi pengiriman barang -+ 10% dari jumlah pesanan
            </p>
        </div>
    </div>
</body>
</html>