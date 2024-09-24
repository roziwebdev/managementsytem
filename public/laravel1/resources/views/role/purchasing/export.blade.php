<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <table id="data-table" class="table">
            <thead>
                <tr>
                    <th scope="col">PO</th>
                    <th scope="col">MR DATE</th>
                    <th scope="col">MR APPROVE</th>
                    <th scope="col">PO DATE</th>
                    <th scope="col">MR NUMBER</th>
                    <th scope="col">ETA USER </th>
                    <th scope="col">ETA AUTO</th>
                    <th scope="col">PRODUCT</th>
                    <th scope="col">SUPPLIER</th>
                    <th scope="col">ITEM</th>
                    <th scope="col">SPECS</th>
                    <th scope="col">SIZE</th>
                    <th scope="col">QTY</th>
                    <th scope="col">PRICE</th>
                    <th scope="col">VAT</th>
                    <th scope="col">NOTE</th>
                    <th scope="col">APPROVAL KADAEPT</th>
                </tr>
            </thead>
            <tbody>
                                                    @foreach($purchasing as $data)
                                                        @php  
                                                            $items = json_decode($data->item);
                                                            $specs = json_decode($data->specs);
                                                            $etausers = json_decode($data->etauser);
                                                            $etaauto = json_decode($data->etaauto);
                                                            $sizes = json_decode($data->size);
                                                            $qtys = json_decode($data->qty);
                                                            $units = json_decode($data->unit);
                                                            $prices = json_decode($data->price);
                                                            $currency = json_decode($data->po);
                                                            // Gabungkan semua data menjadi satu array dengan zip
                                                            $combinedData = array_map(null, $items, $specs, $etausers, $sizes, $etaauto, $qtys, $units,$prices,$currency);
                                                        @endphp
                                                        
                                                        @foreach ($combinedData as $datas)
                                                            <tr>
                                                                <td>{{ $data->id }}</td> 
                                                                <td>{{ \Carbon\Carbon::parse($data->mrtanggal)->format('j M y') }}</td> 
                                                                <td>{{ \Carbon\Carbon::parse($data->created_at)->format('j M y') }}</td>
                                                                <td>{{ \Carbon\Carbon::parse($data->updated_at)->format('j M y') }}</td>
                                                                <td>{{ $data->mrnumber }}</td> 
                                                                <td>{{ \Carbon\Carbon::parse($datas[2])->format('j M y') }}</td> {{-- ETA User --}}
                                                                <td>{{ \Carbon\Carbon::parse($datas[4])->format('j M y') }}</td> {{-- ETA Auto --}}
                                                                <td>{{ $data->product }}</td> 
                                                                <td>{{ $data->supplier }}</td> 
                                                                <td>{{ $datas[0] }}</td> {{-- Item --}}
                                                                <td>{{ $datas[1] }}</td> {{-- Specs --}}
                                                                <td>{{ $datas[3] }}</td> {{-- Size --}}
                                                                <td>{{ $datas[5]}}&nbsp;{{ $datas[6] }}</td> {{-- qty unit --}}
                                                                <td>{{ $datas[7] }}&nbsp;{{ $datas[8] }}</td> {{-- Size --}}
                                                                <td>{{$data->vat}}</td> {{-- Size --}}
                                                                <td>{{$data->ref}}</td> {{-- Size --}}
                                                                <td>{{$data->approvalkadept_at}}</td>
                                                                <!--<td>{{ \Carbon\Carbon::parse($data->approvalkadept_at)->format('j M y') }}</td> {{-- Size --}}-->
                                                                <td>{{$data->status}}</td> {{-- Size --}}
                                                            </tr>
                                                        @endforeach  
                                                   @endforeach
            </tbody>
        </table>
         <button id="export-btn">Export to Excel</button>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
                // Tambahkan event listener ke tombol ekspor
                document.getElementById('export-btn').addEventListener('click', function () {
                    exportToExcel();
                });

                // Fungsi untuk ekspor tabel ke Excel
                function exportToExcel() {
                    // Dapatkan data dari tabel HTML
                    var tableData = [];

                    // Ambil data dari thead
                    var headerRowData = [];
                    document.querySelectorAll('#data-table thead th').forEach(function (cell) {
                        headerRowData.push(cell.textContent);
                    });
                    tableData.push(headerRowData);

                    // Ambil data dari tbody
                    document.querySelectorAll('#data-table tbody tr').forEach(function (row) {
                        var rowData = [];
                        row.querySelectorAll('td').forEach(function (cell) {
                            rowData.push(cell.textContent);
                        });
                        tableData.push(rowData);
                    });

                    // Buat workbook dan worksheet
                    var wb = XLSX.utils.book_new();
                    var ws = XLSX.utils.aoa_to_sheet(tableData);

                    // Tambahkan worksheet ke workbook
                    XLSX.utils.book_append_sheet(wb, ws, 'Sheet1');

                    // Simpan workbook sebagai file Excel
                    XLSX.writeFile(wb, 'exported_data.xlsx');
                }
            });


    </script>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
     <script src="https://cdn.jsdelivr.net/npm/xlsx@0.17.3/dist/xlsx.full.min.js"></script>
</body>

</html>
