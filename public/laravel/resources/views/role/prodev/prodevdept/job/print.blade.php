<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Roboto+Mono&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <style>
        html,body{
            font-family: 'Roboto Mono', monospace;
        }
        .opensans{
            font-family: 'Open Sans', sans-serif;
        }
        td{
            font-size: 16px;
        }
        .tw{
            width: 500px;
            text-wrap: wrap;
        }
    </style>
    <div class="mt-2 border">
        <div class="border d-flex align-items-center justify-content-between ">
            <div class="px-2">
                <img class="border" style="width: 115px;"
                    src="{{ URL::asset('frontend1/img/photos/logoarjaya.png') }}" />
            </div>
            <h1 style="" class="roboto">JOB ORDER</h1>
            <div class="border " style="font-size: 13px">
                <div class="px-2 border-bottom ">NO &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: FM-PDV-001</div>
                <div class="px-2 border-bottom">Revisi &nbsp;: 04</div>
                <div class="px-2 ">Tanggal : 03-01-2024</div>
            </div>
        </div>
        <div class="">
            <div  class="table-responsive">
                <table style="margin:0;" class="table table-borderless">
                    <tbody>
                        <tr class="border-bottom">
                            <td style="margin::0; width: 260px; padding-top:0; padding-bottom:0; font-size:14px;" class="py-2 text-center border-end text-wrap">{{ $job->note3 }}</td>
                            <td style="padding-top: 0; padding-bottom:0; font-size:20px;" class="py-2 text-center ">
                               JOB NUMBER : <span class="px-2 border ">{{ $job->id }}</span>
                                <br/>
                                S-CODE &nbsp;: <span class="px-2 border">{{ $job->scode }}</span>

                            </td>
                        </tr>
                        <tr class="border">
                            <td style="padding-top: 1px; padding-bottom:1px; width: 260px" class="border-end ">Sales Contract PO :</td>
                            <td class="" style="padding-top: 1px; padding-bottom:1px;">{{ $job->nosc }}</td>
                            <td style="padding-top: 1px; padding-bottom:1px;">PO :{{ $job->po }}</td>
                        </tr>
                        <tr class="border">
                            <td style="padding-top: 1px; padding-bottom:1px; width: 260px" class="border-end ">Customer :</td>
                            <td class="" style="padding-top: 1px; padding-bottom:1px;">{{ $job->customer }}</td>
                        </tr>
                        <tr class="border">
                            <td style="padding-top: 1px; padding-bottom:1px; width: 260px" class="border-end ">Date Order Confirmed :</td>
                            <td class="" style="padding-top: 1px; padding-bottom:1px;">{{ $job->tanggalterima }}</td>
                        </tr>
                        <tr class="border">
                            <td style="padding-top: 1px; padding-bottom:1px; width: 260px" class="border-end ">Due Date :</td>
                           <td class="" style="padding-top: 1px; padding-bottom:1px;">{{ $job->etauser }}</td>
                        </tr>
                        <tr class="border">
                            <td style="padding-top: 1px; padding-bottom:1px; width: 260px" class="border-end ">Alamat Kirim :</td>
                            <td class="" style="padding-top: 1px; padding-bottom:1px;">
                                {{ $job->plantcode }}
                                <br/>
                                {{ $job->address }}
                            </td>
                        </tr>
                        <tr style="margin:0;" class="border">
                            <td style="padding-top: 1px; padding-bottom:1px; width: 260px" class="border-end ">Lot Number :</td>
                            <td style="padding-top: 1px; padding-bottom:1px;">{{ $job->id }} / {{ $job->designno }} / {{ $job->nosc }} / AMS</td>
                        </tr>
                        <!-- Tambahkan baris data sesuai kebutuhan -->
                    </tbody>
                </table>
                <p class="text-center bg-secondary-subtle" style="margin-top:0; margin-bottom: 0; padding-top: 5px; padding-bottom:5px">Spesifikasi Packaging</p>
                <table style="margin: 0;" class="table table-borderless">
                    <tbody style="margin: 0">
                        <tr class="border-top">
                            <td style="padding-top: 1px; padding-bottom:1px; width: 260px"  class="border-end ">Product Name :</td>
                            <td class="" style="padding-top: 1px; padding-bottom:1px;">{{ $job->product }}</td>
                        </tr>
                        <tr class="border">
                            <td style="padding-top: 1px; padding-bottom:1px; width: 260px"  class="border-end ">SAP :</td>
                            <td class="" style="padding-top: 1px; padding-bottom:1px;">{{ $job->sap }}</td>
                        </tr>
                        <tr class="border">
                            <td style="padding-top: 1px; padding-bottom:1px; width: 260px"  class="border-end ">Original Sample :</td>
                            <td class="" style="padding-top: 1px; padding-bottom:1px;">{{ $job->original }}</td>
                        </tr>
                        <tr class="border">
                            <td style="padding-top: 1px; padding-bottom:1px; width: 260px"  class="border-end ">Design dlm Bentuk :</td>
                            <td class="" style="padding-top: 1px; padding-bottom:1px;">{{ $job->design }}</td>
                        </tr>
                        <tr class="border">
                            <td style="padding-top: 1px; padding-bottom:1px; width: 260px"  class="border-end ">Design Number :</td>
                            <td style="padding-top: 1px; padding-bottom:1px;">{{ $job->designno }}</td>
                        </tr>
                        <tr class="border">
                            <td style="padding-top: 1px; padding-bottom:1px; width: 260px"  class="border-end ">Status Design :</td>
                            <td class="" style="padding-top: 1px; padding-bottom:1px;">{{ $job->statusdesign }}</td>
                        </tr>
                        <tr class="border">
                            <td style="padding-top: 1px; padding-bottom:1px; width: 260px"  class="border-end ">Ukuran Packaging :</td>
                            <td class="" style="padding-top: 1px; padding-bottom:1px;">{{ $job->size }}</td>
                        </tr>
                        <tr class="border">
                            <td style="padding-top: 1px; padding-bottom:1px; width: 260px"  class="border-end ">Warna  :</td>
                            <td class="tw" style="padding-top: 1px; padding-bottom:1px;">{{ $job->warna }}</td>
                            <td style="padding-top: 1px; padding-bottom:1px;">Actual : {{ $job->actcolor }}</td>
                        </tr>
                        <tr class="border">
                            <td style="padding-top: 1px; padding-bottom:1px; width: 260px"  class="border-end ">Color Specs  :</td>
                            <td class="tw" style="padding-top: 1px; padding-bottom:1px;">Front</td>
                            <td style="padding-top: 1px; padding-bottom:1px;">Back</td>
                        </tr>
                        <tr class="border">
                            <td style="padding-top: 1px; padding-bottom:1px; width: 260px"  class="border-end ">1</td>
                            <td class="tw" style="padding-top: 1px; padding-bottom:1px;">{{ $job->f1 }}</td>
                            <td style="padding-top: 1px; padding-bottom:1px;">1 : {{ $job->b1 }}</td>
                        </tr>
                        <tr class="border">
                            <td style="padding-top: 1px; padding-bottom:1px; width: 260px"  class="border-end ">2</td>
                            <td class="tw" style="padding-top: 1px; padding-bottom:1px;">{{ $job->f2 }}</td>
                            <td style="padding-top: 1px; padding-bottom:1px;">2 : {{ $job->b2 }}</td>
                        </tr>
                        <tr class="border">
                            <td style="padding-top: 1px; padding-bottom:1px; width: 260px"  class="border-end ">3</td>
                            <td class="tw" style="padding-top: 1px; padding-bottom:1px;">{{ $job->f3 }}</td>
                            <td style="padding-top: 1px; padding-bottom:1px;">3 : {{ $job->b3 }}</td>
                        </tr>
                        <tr class="border">
                            <td style="padding-top: 1px; padding-bottom:1px; width: 260px"  class="border-end ">4</td>
                            <td class="tw" style="padding-top: 1px; padding-bottom:1px;">{{ $job->f4 }}</td>
                            <td style="padding-top: 1px; padding-bottom:1px;">4 : {{ $job->b4 }}</td>
                        </tr>
                        <tr class="border">
                            <td style="padding-top: 1px; padding-bottom:1px; width: 260px"  class="border-end ">5</td>
                            <td class="tw" style="padding-top: 1px; padding-bottom:1px;">{{ $job->f5 }}</td>
                            <td style="padding-top: 1px; padding-bottom:1px;">5 : {{ $job->b5 }}</td>
                        </tr>
                        <tr class="border">
                            <td style="padding-top: 1px; padding-bottom:1px; width: 260px"  class="border-end ">6.</td>
                            <td class="tw" style="padding-top: 1px; padding-bottom:1px;">{{ $job->f6 }}</td>
                            <td style="padding-top: 1px; padding-bottom:1px;">6 : {{ $job->b6 }}</td>
                        </tr>
                        <tr class="border">
                            <td style="padding-top: 1px; padding-bottom:1px; width: 260px" class="border-end ">Material :</td>
                            <td class="" style="padding-top: 1px; padding-bottom:1px;">{{ $job->material }}</td>
                        </tr>
                        <tr class="border">
                            <td style="padding-top: 1px; padding-bottom:1px; width: 260px"  class="border-end ">Finishing Specs :</td>
                            <td class="" style="padding-top: 1px; padding-bottom:1px;">{{ $job->finishing }}</td>
                        </tr>
                        <tr class="border">
                            <td style="padding-top: 1px; padding-bottom:1px; width: 260px"  class="border-end ">Actual Proses :</td>
                            <td class="" style="padding-top: 1px; padding-bottom:1px;">{{ $job->finishingjob }}</td>
                        </tr>
                        <tr class="border">
                            <td style="padding-top: 1px; padding-bottom:1px; width: 260px"  class="border-end ">Acuan :</td>
                            <td class="" style="padding-top: 1px; padding-bottom:1px;">{{ $job->acuanwarna }}</td>
                        </tr>
                        <tr class="border">
                            <td style="padding-top: 1px; padding-bottom:1px; width: 260px"  class="border-end ">Packing :</td>
                            <td class="tw" style="padding-top: 1px; padding-bottom:1px;">{{ $job->packing }}</td>
                            <td style="padding-top: 1px; padding-bottom:1px;">No.PS : {{ $job->nops }}</td>
                        </tr>
                        <tr class="border">
                            <td style="padding-top: 1px; padding-bottom:1px; width: 260px"  class="border-end ">Nama Box :</td>
                            <td class="" style="padding-top: 1px; padding-bottom:1px;">{{ $job->boxname }}</td>
                        </tr>
                        <tr class="border">
                            <td style="padding-top: 1px; padding-bottom:1px; width: 260px"  class="border-end ">Box Size :</td>
                            <td class="" style="padding-top: 1px; padding-bottom:1px;">{{ $job->boxsize }}</td>
                        </tr>
                        <tr class="border">
                            <td style="padding-top: 1px; padding-bottom:1px; width: 260px"  class="border-end "> Material Box :</td>
                            <td class="" style="padding-top: 1px; padding-bottom:1px;">{{ $job->boxspecs }}</td>
                        </tr>
                        <tr class="border">
                            <td style="padding-top: 1px; padding-bottom:1px; width: 260px"  class="border-end "> Net. Weight/Box (Kg) :</td>
                            <td class="" style="padding-top: 1px; padding-bottom:1px;">{{ $job->nwbox }}</td>
                        </tr>
                        <tr class="border">
                            <td style="padding-top: 1px; padding-bottom:1px; width: 260px"  class="border-end ">Total Order :</td>
                            <td class="tw" style="padding-top: 1px; padding-bottom:1px;">{{ $job->qty }}</td>
                            <td style="padding-top: 1px; padding-bottom:1px;">Unit : {{ $job->unit }}</td>
                        </tr>
                        <tr class="border-bottom ">
                            <td style="padding-top: 1px; padding-bottom:1px; width: 260px"  class="border-end ">Toleransi Pengiriman :</td>
                            <td class="" class="" style="padding-top: 1px; padding-bottom:1px;">{{ $job->toleransi }}</td>
                        </tr>
                    </tbody>
                </table>
                    <p style="margin-top:0; margin-bottom: 0" class="text-center bg-secondary-subtle">NOTE :</p>
                <table style="margin: 0" class="table table-borderless">
                    <tbody>
                        <tr class="border-top">
                            <td style="padding-top: 1px; padding-bottom:1px; width: 260px"  class="border-end">Application :</td>
                            <td class="" style="padding-top: 1px; padding-bottom:1px;">{{ $job->aplikasi }}</td>
                        </tr>
                        <tr class="border">
                            <td style="padding-top: 1px; padding-bottom:1px; width: 260px" class="border-end">Layout :</td>
                          <td class="tw" style="padding-top: 1px; padding-bottom:1px;">{{ $job->layout }}</td>
                        <td style="padding-top: 1px; padding-bottom:1px;">Up : {{ $job->up }}</td>
                        </tr>
                        <tr class="border">
                            <td style="padding-top: 1px; padding-bottom:1px; width: 260px"  class="border-end">Uk. Press Layout (mm)</td>
                            <td class="" style="padding-top: 1px; padding-bottom:1px;">{{ $job->ukpresslayout }}</td>
                        </tr>
                        <tr class="border">
                            <td style="padding-top: 1px; padding-bottom:1px; width: 260px"  class="border-end">Arah serat material 1 :</td>
                            <td class="tw" style="padding-top: 1px; padding-bottom:1px;">{{ $job->as1 }}</td>
                            <td style="padding-top: 1px; padding-bottom:1px;">{{ $job->mat1 }}</td>
                        </tr>
                        <tr class="border">
                            <td style="padding-top: 1px; padding-bottom:1px; width: 260px"  class="border-end">Arah serat material 2 :</td>
                            <td class="tw" style="padding-top: 1px; padding-bottom:1px;">{{ $job->as2 }}</td>
                            <td style="padding-top: 1px; padding-bottom:1px;">{{ $job->mat2 }}</td>
                            </tr>
                        </tr>
                        <tr class="border">
                            <td style="padding-top: 1px; padding-bottom:1px; width: 260px"  class="border-end">Arah serat material 3 :</td>
                            <td class="tw" style="padding-top: 1px; padding-bottom:1px;">{{ $job->as3 }}</td>
                            <td style="padding-top: 1px; padding-bottom:1px;">{{ $job->mat3 }}</td>
                            </tr>
                        </tr>
                        <tr class="border">
                            <td style="padding-top: 1px; padding-bottom:1px; width: 260px"  class="border-end">Pisau yg dipakai :</td>
                            <td class="" style="padding-top: 1px; padding-bottom:1px;">{{ $job->pisau }}</td>
                        </tr>
                        <tr class="border">
                            <td style="padding-top: 1px; padding-bottom:1px; width: 260px"  class="border-end">Citto (mm) :</td>
                            <td class="" style="padding-top: 1px; padding-bottom:1px;">{{ $job->citto }}</td>
                        </tr>
                        <tr class="border">
                            <td style="padding-top: 1px; padding-bottom:1px; width: 260px"  class="border-end">Emboss :</td>
                            <td class="tw" style="padding-top: 1px; padding-bottom:1px;">{{ $job->emboss }}</td>
                            <td style="padding-top: 1px; padding-bottom:1px;">Hotprint : {{ $job->hotprint }}</td>
                        </tr>

                    </tbody>
                </table>
                    <p class="px-2" style="margin: 0; font-size:17px "> Others : {{ $job->note2 }}</p>
                <div class="pt-2 border d-flex justify-content-around" style="font-size: 14px">
                    <div class="text-center ">
                        <p>Dibuat</p>
                        <br />
                        <p>
                            Erna
                            <br/>
                            Prodev
                        </p>

                    </div>
                    <div class="text-center ">
                        <p>Disetujui</p>
                        <br />
                        <p>
                            Yanuar
                            <br />
                            Adm Sales
                        </p>

                    </div>
                    <div class="text-center ">
                        <p>Diketahui</p>
                        <br />
                        <p>
                            Chikita
                            <br />
                            Customer Support
                        </p>
                    </div>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>
</html>
