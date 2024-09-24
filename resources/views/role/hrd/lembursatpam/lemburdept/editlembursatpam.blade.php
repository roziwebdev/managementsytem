@extends('role.purchasing.layoutsmrdept.main')
@section('main-container')

<link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
    
    <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="errorModalLabel">ERROR</h5>
                </div>
                <div class="modal-body">
                    @if($errors->any())
                            @foreach ($errors->all() as $error)
                                <p class="">{{ $error }}</p>
                            @endforeach
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    
<div class="main-panel">
    <div class=" content-wrapper" style="background-color: #f6f6fb">

        <div class="row" id='row'>
            <div class="col-12 stretch-card grid-margin" id="myForm">
                <div class="border rounded card">
                    <div class="border rounded shadow card-body">
                        <h4 class="mb-3 card-title">Form Edit SPL Satpam</h4>
                        <form class="form-sample" method="POST" action="{{ route('lembursatpam.update', $lembur->id) }}"
                            id="pricelistForm">
                            @method('PUT')
                            @csrf
                                @php
                                    $namas = json_decode($lembur->namakaryawan);
                                    $jabatans = json_decode($lembur->jabatan);
                                    $mulais = json_decode($lembur->mulai);
                                    $istirahats = json_decode($lembur->istirahat);
                                    $berakhirs = json_decode($lembur->berakhir);
                                    $outsourcings = json_decode($lembur->outsourcing);
                                    $keteranganpekerjaans = json_decode($lembur->keteranganpekerjaan);
                                    $pekerjaans = json_decode($lembur->pekerjaan);
                                    $combinedData =
                                    array_map(null,$namas,$jabatans,$outsourcings,$mulais,$istirahats,$berakhirs,$pekerjaans,$keteranganpekerjaans);
                                @endphp
                             @foreach ($combinedData as $index => $data)
                            <div data-index='{{$index}}'>
                                <div class=" row" style="background-color: #f1f1f6">
                                    <div class="mt-3 col-md ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Nama</label>
                                            <input type="text" class="form-control form-control-sm clickable" name="namakaryawan[]" required
                                                id="input1" value="{{ $data[0] }}">
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Jabatan</label>
                                            <input type="text" class="form-control form-control-sm clickable" name="jabatan[]" required
                                                id="input1" value="{{ $data[1] }}">
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Outsourcing</label>
                                            <input type="text" class="form-control form-control-sm clickable" name="outsourcing[]" required
                                                id="input1" value="{{ $data[2] }}">
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md " style="width: 24px">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Start</label>
                                            <input type="datetime-local" class="form-control form-control-sm clickable" name="mulai[]" required
                                                value="{{ $data[3] }}" id="datetime">
                                        </div>
                                    </div>
                                     <div class="mt-3 col-md">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold ">Break</label>
                                            <input class="form-control form-control-sm" name="istirahat[]" value="{{ $data[4] }}"/>
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md" style="width: 24px">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold ">End</label>
                                            <input type="datetime-local" class="form-control form-control-sm clickable" name="berakhir[]"
                                                placeholder="" required value="{{ $data[5] }}" id="datetime">
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold ">Pekerjaan</label>
                                            <input type="text" class="form-control form-control-sm clickable" name="pekerjaan[]"
                                                placeholder="" value="{{ $data[6] }}">
                                        </div>
                                    </div>
                                </div>
                                <div class=" row stretch-card" style="background-color: #f1f1f6">
                                    <div class="mt-3 col-md">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold ">Keterangan Pekerjaan</label>
                                            <textarea name="keteranganpekerjaan[]" rows="" cols="40" class="form-control">{{ $data[7] }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div>
                                <button type="submit" class="mt-2 btn-rounded btn btn-gradient-info float-end">
                                    Submit
                                </button>
                            </div>
                            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
     let counter2 = 1;
        function handleRemoveItem2(id) {
            $(`#row2${id}`).remove();
        }
    $(document).ready(function () {
        // Fungsi yang dipanggil saat nilai input pertama berubah
        $(document).on('change', 'input[name="namakaryawan[]"]', function () {
            // Mendapatkan nilai yang dipilih pada input pertama
            var selectedKaryawan = $(this).val();
            // Menemukan elemen parent dan mencari input yang diinginkan di dalamnya
            var parentElement = $(this).closest('.row');
            var inputOutsourcing = parentElement.find('input[name="outsourcing[]"]');
            var inputJabatan = parentElement.find('input[name="jabatan[]"]');
            // Melakukan Ajax request ke server untuk mendapatkan data client dan address berdasarkan namacustomer
            $.ajax({
                type: 'GET',
                url: '/get-karyawansatpam/' + selectedKaryawan, // Gantilah dengan URL endpoint yang sesuai di Laravel
                success: function (data) {
                    // Mengisi nilai pada input kedua dan ketiga
                    inputOutsourcing.val(data.outsourcing);
                    inputJabatan.val(data.jabatan);
                },
                error: function () {
                    alert('Gagal mengambil data karyawan.');
                }
            });
        });

        // Fungsi untuk menambahkan baris baru
       
        $("#rowAdder2").click(function () {
            newRowAdd2 = `
                <div id='row2${counter2}'>
                    <div class="row" style="background-color: #f1f1f6">
                        <div class="mt-3 col-md">
                            <div class="mb-3" style="font-size: 14px">
                                <label for="" class="form-label fw-bold">Nama</label>
                                <input type="text" class="form-control form-control-sm clickable" name="namakaryawan[]" required
                                    id="input1" list="kar">
                                <datalist id="kar">

                                </datalist>
                            </div>
                        </div>
                        <input type="hidden" class="form-control form-control-sm clickable" name="departement[]" required id="input2">
                        <input type="hidden" class="form-control form-control-sm clickable" name="jabatan[]" required id="input3">
                        <div class="mt-3 col-md" style="width: 24px">
                            <div class="mb-3" style="font-size: 14px">
                                <label for="" class="form-label fw-bold">Start</label>
                                <input type="datetime-local" class="form-control form-control-sm clickable" name="mulai[]" required id="datetime${counter2}">
                            </div>
                        </div>
                        <div class="mt-3 col-md">
                            <div class="mb-3" style="font-size: 14px">
                                <label for="" class="form-label fw-bold ">Break</label>
                                <input type="text" class="form-control form-control-sm clickable" name="istirahat[]"
                                    placeholder="" required>
                            </div>
                        </div>
                        <div class="mt-3 col-md" style="width: 24px">
                            <div class="mb-3" style="font-size: 14px">
                                <label for="" class="form-label fw-bold ">End</label>
                                <input type="datetime-local" class="form-control form-control-sm clickable" name="berakhir[]"
                                    placeholder="" required id="datetime${counter2}">
                            </div>
                        </div>
                        <div class="mt-3 col-md">
                            <div class="mb-3" style="font-size: 14px">
                                <label for="" class="form-label fw-bold ">Pekerjaan</label>
                                <input type="text" class="form-control form-control-sm clickable" name="pekerjaan[]" placeholder=""
                                    >
                            </div>
                        </div>
                        <div class="mt-3 col-md">
                            <div class="mb-3" style="font-size: 14px">
                                <label for="" class="form-label fw-bold ">Hasil Lembur</label>
                                <input type="text" class="form-control form-control-sm clickable" name="hasillembur[]" placeholder=""
                                    >
                            </div>
                        </div>
                        <div class="mt-3 col-md">
                            <div class="mb-3" style="font-size: 14px">
                                <label for="" class="form-label fw-bold ">Unit</label>
                                <input type="text" class="form-control form-control-sm clickable" name="unit[]" placeholder=""
                                     list="unit">
                                <datalist id="unit">
                                    <option value="PCS">PCS</option>
                                    <option value="DRIK">DRIK</option>
                                </datalist>
                            </div>
                        </div>
                    </div>
                    <div class="row stretch-card grid-margin" style="background-color: #f1f1f6">
                        <div class="mt-3 col-md">
                            <div class="mb-3" style="font-size: 14px">
                                <label for="" class="form-label fw-bold ">Keterangan Pekerjaan</label>
                                <textarea name="keteranganpekerjaan[]" rows="4" cols="40" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div  class="my-3 btn btn-gradient-danger btn-sm" onclick="handleRemoveItem2(${counter2})">Remove</div>
                    </div>
                </div>

            `;
            $("#newinput2").append(newRowAdd2);
            
            var originalRow = $('#row2').find('.row');
            var newRow = $('#row2' + counter2).find('.row');
        
            // Menyalin nilai input mulai[], berakhir[], break[], hasillembur[], unit[], dan keteranganpekerjaan[] dari row asli ke row baru
            var inputsToCopy = ['mulai[]', 'berakhir[]', 'istirahat[]', 'hasillembur[]', 'unit[]','pekerjaan[]'];
            inputsToCopy.forEach(function(inputName) {
            var originalInput = originalRow.find('input[name="' + inputName + '"]');
            var newInput = newRow.find('input[name="' + inputName + '"]');
            newInput.val(originalInput.val());
            });
        
            var originalTextarea = originalRow.find('textarea[name="keteranganpekerjaan[]"]');
            var newTextarea = newRow.find('textarea[name="keteranganpekerjaan[]"]');
            newTextarea.val(originalTextarea.val());
            
            
            $('#row2' + counter2).find('input[type="datetime-local"]').each(function(index) {
                $(this).attr('min', currentDateTime);
            });
            
            
            counter2++;
            
            var now = new Date();
            var year = now.getFullYear();
            var month = String(now.getMonth() + 1).padStart(2, '0');
            var day;
            
            if (now.getDay() === 1) { // monday
                day = String(now.getDate() - 3).padStart(2, '0');
            } else {
                day = String(now.getDate() - 1).padStart(2, '0');
            }
            
            var hours = String(now.getHours()).padStart(2, '0');
            var minutes = String(now.getMinutes()).padStart(2, '0');
            var currentDateTime = year + '-' + month + '-' + day + 'T' + hours + ':' + minutes;
            
            var datetimeInputs = document.querySelectorAll('input[type="datetime-local"]');
            datetimeInputs.forEach(function(input) {
                input.min = currentDateTime;
            });
            
            var today = new Date().toISOString().split('T')[0];
            document.getElementById('date').min = today;
        });
 
    });
</script>

<script>
    document.getElementById('exportButton').addEventListener('click', function() {
        var table = document.getElementById('myTable');
        var rows = table.querySelectorAll('tr');
        var csv = [];

        for (var i = 0; i < rows.length; i++) {
            var row = [], cols = rows[i].querySelectorAll('td, th');

            for (var j = 0; j < cols.length; j++) {
                row.push(cols[j].innerText);
            }

            csv.push(row.join(','));
        }

        // Download CSV file
        downloadCSV(csv.join('\n'), 'table.csv');
    });

    function downloadCSV(csv, filename) {
        var csvFile;
        var downloadLink;

        csvFile = new Blob([csv], {type: 'text/csv'});
        downloadLink = document.createElement('a');
        downloadLink.download = filename;
        downloadLink.href = window.URL.createObjectURL(csvFile);
        downloadLink.style.display = 'none';
        document.body.appendChild(downloadLink);
        downloadLink.click();
    }
</script>

     
     
<script type="text/javascript">
    $(document).ready(function() {
        @if($errors->any())
            $('#errorModal').modal('show');
        @endif
    });
</script>

@endsection