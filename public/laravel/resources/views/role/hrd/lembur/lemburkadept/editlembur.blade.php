@extends('role.purchasing.layoutmrkadept.main')
@section('main-container')

<link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
<div class="main-panel">
    <div class=" content-wrapper" style="background-color: #f6f6fb">
        <div class="row" id='row'>
            <div class="col-12 stretch-card grid-margin" id="myForm">
                <div class="border rounded card">
                    <div class="border rounded shadow card-body">
                        <h4 class="mb-3 card-title">Form SPL</h4>
                        <form class="form-sample" method="POST" action="{{ route('lemburkadept.update', $lembur->id) }}" id="pricelistForm">
                            @method("PUT")
                            @csrf
                            @php
                            $namas = json_decode($lembur->namakaryawan);
                            $jabatans = json_decode($lembur->jabatan);
                            $mulais = json_decode($lembur->mulai);
                            $istirahats = json_decode($lembur->istirahat);
                            $berakhirs = json_decode($lembur->berakhir);
                            $hasillemburs = json_decode($lembur->hasillembur);
                            $departements = json_decode($lembur->departement);
                            $totaljams = json_decode($lembur->totaljam);
                            $keteranganpekerjaans = json_decode($lembur->keteranganpekerjaan);
                            $units = json_decode($lembur->unit);
                            $pekerjaans = json_decode($lembur->pekerjaan);
                            $combinedData =
                            array_map(null,$namas,$jabatans,$departements,$mulais,$istirahats,$berakhirs,$hasillemburs,$totaljams,$keteranganpekerjaans,$units,$pekerjaans);
                            @endphp
                            @foreach ($combinedData as $index => $data)
                            <div data-index='{{$index}}'>
                                <div class=" row" style="background-color: #f1f1f6">
                                    <div class="mt-3 col-md ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Nama</label>
                                            <input type="text" class="form-control form-control-sm clickable"
                                                name="namakaryawan[]" required id="input1" list="kar" value="{{ $data[0] }}">
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Jabatan</label>
                                            <input type="text" class="form-control form-control-sm clickable"
                                                name="jabatan[]" required id="input1" list="kar" value="{{ $data[1] }}">
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md ">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Departement</label>
                                            <input type="text" class="form-control form-control-sm clickable"
                                                name="departement[]" required id="input1" list="kar" value="{{ $data[2] }}">
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md " style="width: 24px">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold">Start</label>
                                            <input type="datetime-local" class="form-control form-control-sm clickable"
                                                name="mulai[]" required value="{{ $data[3] }}" id="datetime">
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
                                            <input type="datetime-local" class="form-control form-control-sm clickable"
                                                name="berakhir[]" placeholder="" required value="{{ $data[5] }}" id="datetime">
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold ">Pekerjaan</label>
                                            <input type="text" class="form-control form-control-sm clickable"
                                                name="pekerjaan[]" placeholder="" required value="{{ $data[10] }}">
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold ">Hasil Lembur</label>
                                            <input type="text" class="form-control form-control-sm clickable"
                                                name="hasillembur[]" placeholder="" required value="{{ $data[6] }}">
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold ">Unit</label>
                                            <input type="text" class="form-control form-control-sm clickable"
                                                name="unit[]" placeholder="" list="unit" value="{{ $data[9] }}">
                                            <datalist id="unit">
                                                <option value="PCS">PCS</option>
                                                <option value="DRIK">DRIK</option>
                                            </datalist>
                                        </div>
                                    </div>
                                </div>
                                <div class=" row stretch-card" style="background-color: #f1f1f6">
                                    <div class="mt-3 col-md">
                                        <div class="mb-3" style="font-size: 14px">
                                            <label for="" class="form-label fw-bold ">Keterangan Pekerjaan</label>
                                            <textarea name="keteranganpekerjaan[]" rows="" cols="40" class="form-control">{{ $data[8] }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            <div class="py-4">
                                <button class="btn btn-sm btn-gradient-danger" type="button" onclick="confirmRemove({{ $index }})">Remove</button>
                            </div>
                            </div>
                            @endforeach
                            <div>
                                <button type="submit" class="mt-2 btn-rounded btn btn-gradient-info float-end">
                                    Submit
                                </button>
                            </div>
                            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                            <script>
                                function confirmRemove(index) {
                                    if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
                                        removeData(index);
                                    }
                                }
                            
                                function removeData(index) {
                                    var element = document.querySelector(`[data-index="${index}"]`);
                                    element.parentNode.removeChild(element);
                                }
                            </script>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="successModalLabel">Success!</h5>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- JavaScript untuk menampilkan modal jika ada pesan sukses -->
<script>
    $(document).ready(function(){
        @if(session('success'))
            $('#successModal .modal-body').text('{{ session('success') }}');
            $('#successModal').modal('show');
        @endif
    });
</script>



    @endsection