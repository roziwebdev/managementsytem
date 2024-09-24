@extends('role.purchasing.layoutmrkadept.main')
@section('main-container')

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
<style>
    p {
        font-family: "Inter", sans-serif;
        font-optical-sizing: auto;
        font-weight: <weight>;
        font-style: normal;
        font-variation-settings:
            "slnt" 0;
    }

    .table-responsive1 {
        overflow-y: auto;
        max-height: 400px;
        /* Atur ketinggian maksimum jika diperlukan */
    }

    /* Atur posisi dan z-index untuk thead */
    .table1 thead th {
        background-color: #F0F0F0;
        position: sticky;
        top: 0;
        z-index: 100;
        /* Atur z-index untuk memastikan thead di atas konten tabel */
    }

    /* Atur z-index konten tabel agar berada di bawah thead yang ditempel */
    .table1 tbody {
        position: relative;
        z-index: 0;
    }
</style>
<div class="main-panel">
    <div class=" content-wrapper px-3" style="background-color: #f6f6fb">
        <div class="page-header">
            <h3 class="page-title">
                <span class="text-white page-title-icon bg-gradient-info me-2">
                    <i class="mdi mdi-home"></i>
                </span> Dashboard
            </h3>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <span></span>Overview <i class="align-middle mdi mdi-alert-circle-outline icon-sm text-primary"></i>
                    </li>
                </ul>
            </nav>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <div class="row" id='row'>
            <div class="col-12 stretch-card grid-margin" id="myForm">
                <div class="border rounded card">
                    <div class="border rounded shadow card-body">
                        <div style="font-size: 25px" class="mt-3 mb-4 text-center font-bold ">FORM EDIT DOCKET</div>
                        <form class="form-sample" method="POST" action="{{route('kadeptdocketnew.update', $design->id)}}">
                            @method('put')
                            @csrf
                            <div class="row pt-4 px-4" style="background-color: #f1f1f6">
                                <!--<div class="col">-->
                                <!--    <label class="pt-2" for="input1">Docket</label>-->
                                <!--    <input style="border-radius: 10px;" list="docket" type="text" class="form-control py-2 clickable shadow-sm" name="designno" id="inputdocket" required />-->
                                <!--</div>-->
                                <div class="col">
                                    <label class="pt-2" class="pt-2" for="input2">Product</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="product" id="getProduct"
                                        required list="listproduct" value="{{$design->product}}"/>
                                    <datalist id="listproduct">
                                        @foreach($uniqueProducts as $product)
                                        <option value="{{ $product }}">{{ $product }}</option>
                                        @endforeach
                                    </datalist>
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input3">SAP</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="sap"
                                        placeholder="" required value="{{$design->sap}}">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input3">Status Design</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="statusorder"
                                        placeholder="" required value="{{$design->statusorder}}">
                                </div>
                            </div>
                            <div class="row px-4" style="background-color: #f1f1f6">
                                <div class="col-sm">
                                    <label class="pt-2" for="input1">Original</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="original" value="{{$design->original}}" list="originallist">
                                    <datalist id="originallist">
                                        <option value="ADA"></option>
                                        <option value="TIDAK"></option>
                                    </datalist>                                
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input2">Bentuk Design</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="design" placeholder="" value="{{$design->design}}" id="bentuklist">
                                    <datalist id="bentuklist">
                                      <option value="LINK FILE"></option>  
                                      <option value="CD FILE"></option>  
                                      <option value="BLANK SAMPLE"></option>  
                                      <option value="FILE"></option>  
                                    </datalist>                                
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input3">Act Color</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="actcolor" placeholder="" value="{{$design->actcolor}}" >
                                </div>
                            </div>
                            <div class="row px-4" style="background-color: #f1f1f6">
                                <div class="col-sm">
                                    <label class="pt-2" for="input1">Acuan Warna</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="acuanwarna" value="{{$design->acuanwarna}}"
                                        placeholder="">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input2">Finishing</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="finishingjob" value="{{$design->finishingjob}}" 
                                        placeholder="">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input1">Tanggal Terima</label>
                                    <input  style=" border-radius: 10px;" type="date" class="shadow-sm form-control py-2 clickable" name="tanggalterima" placeholder="" value="{{$design->tanggalterima}}">
                                </div>
                                
                            </div>
                            <div class="row px-4" style="background-color: #f1f1f6">
                                <div class="col">
                                    <label class="pt-2" for="input1">F1</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="f1" placeholder="" value="{{$design->f1}}">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input2">F2</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="f2" placeholder="" value="{{$design->f2}}">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input3">F3</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="f3" placeholder="" value="{{$design->f3}}">
                                </div>
                            </div>
                            <div class="row px-4" style="background-color: #f1f1f6">
                                <div class="col">
                                    <label class="pt-2" for="input1">F4</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable " name="f4" placeholder="" value="{{$design->f4}}">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input2">F5</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="f5" placeholder="" value="{{$design->f5}}">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input3">F6</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="f6" placeholder="" value="{{$design->f6}}">
                                </div>
                            </div>
                            <div class="row px-4" style="background-color: #f1f1f6">
                                <div class="col">
                                    <label class="pt-2" for="input1">B1</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="b1" placeholder="" value="{{$design->b1}}">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input2">B2</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="b2" placeholder="" value="{{$design->b2}}">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input3">B3</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable " name="b3" placeholder="" value="{{$design->b3}}">
                                </div>
                            </div>
                            <div class="row px-4" style="background-color: #f1f1f6">
                                <div class="col">
                                    <label class="pt-2" for="input1">B4</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="b4" placeholder="" value="{{$design->b4}}">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input2">B5</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable " name="b5" placeholder="" value="{{$design->b5}}">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input3">B6</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="b6" placeholder="" value="{{$design->b6}}">
                                </div>
                            </div>
                            <div class="row px-4" style="background-color: #f1f1f6">
                                <div class="col">
                                    <label class="pt-2" for="input1">MAT 1</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="mat1" placeholder="" value="{{$design->mat1}}" list="mat1list">
                                    <datalist id="mat1list">
                                        <option value="PAPPER GLOSSY">
                                        <option value="DPC">
                                        <option value="IVORY">
                                        <option value="ART PAPER">
                                        <option value="ART CARTON">
                                        <option value="KRAFT">
                                        <option value="SINGLE FACE">
                                        <option value="STICKER VINYL REMOVABLE">
                                        <option value="SHEET">
                                        <option value="PAPER DOBULE COATING">
                                        <option value="HVS">
                                        <option value="WHITE KRAFT">
                                    </datalist>
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input2">MAT 2</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="mat2" placeholder="" value="{{$design->mat2}}" list="mat2list">
                                    <datalist id="mat2list">
                                        <option value="PAPPER GLOSSY">
                                        <option value="DPC">
                                        <option value="IVORY">
                                        <option value="ART PAPER">
                                        <option value="ART CARTON">
                                        <option value="KRAFT">
                                        <option value="SINGLE FACE">
                                        <option value="STICKER VINYL REMOVABLE">
                                        <option value="SHEET">
                                        <option value="PAPER DOBULE COATING">
                                        <option value="HVS">
                                        <option value="WHITE KRAFT">
                                    </datalist>
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input3">MAT 3</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="mat3" placeholder="" value="{{$design->mat3}}" list="mat3list">
                                    <datalist id="mat3list">
                                        <option value="PAPPER GLOSSY">
                                        <option value="DPC">
                                        <option value="IVORY">
                                        <option value="ART PAPER">
                                        <option value="ART CARTON">
                                        <option value="KRAFT">
                                        <option value="SINGLE FACE">
                                        <option value="STICKER VINYL REMOVABLE">
                                        <option value="SHEET">
                                        <option value="PAPER DOBULE COATING">
                                        <option value="HVS">
                                        <option value="WHITE KRAFT">
                                    </datalist>
                                </div>
                            </div>
                            <div class="row px-4" style="background-color: #f1f1f6">
                                <div class="col">
                                    <label class="pt-2" for="input1">SPECS MAT 1</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="specsmat1" value="{{$design->specsmat1}}" placeholder="">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input2">SPECS MAT 2</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="specsmat2" value="{{$design->specsmat2}}" placeholder="">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input3">SPECS MAT 3</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="specsmat3" value="{{$design->specsmat3}}" placeholder="">
                                </div>
                            </div>
                            <div class="row px-4" style="background-color: #f1f1f6">
                                <div class="col">
                                    <label class="pt-2" for="input1">AS 1</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="as1" placeholder="" value="{{$design->as1}}" list="as1list">
                                    <datalist id="as1list">
                                        <option value="SERAT PANJANG"></option>
                                        <option value="SERAT PENDEK"></option>
                                    </datalist>
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input2">AS 2</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="as2" placeholder="" value="{{$design->as2}}" list="as2list">
                                    <datalist id="as1list">
                                        <option value="SERAT PANJANG"></option>
                                        <option value="SERAT PENDEK"></option>
                                    </datalist>
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input3">AS 3</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="as3" placeholder="" value="{{$design->as3}}" list="as3list">
                                    <datalist id="as1list">
                                        <option value="SERAT PANJANG"></option>
                                        <option value="SERAT PENDEK"></option>
                                    </datalist>
                                </div>
                            </div>
                            <div class="row px-4" style="background-color: #f1f1f6">
                                <div class="col">
                                    <label class="pt-2" for="input1">Application</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="aplikasi" value="{{$design->aplikasi}}" list="applicationlist"
                                        placeholder="">
                                    <datalist id="applicationlist">
                                        <option value="Machine"></option>
                                        <option value="Manual"></option>
                                        <option value="Manual & Machine"></option>
                                    </datalist>    
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input2">Layout</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="layout" value="{{$design->layout}}">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input3">UP</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="up" placeholder="" value="{{$design->up}}">
                                </div>
                            </div>
                            <div class="row px-4" style="background-color: #f1f1f6">
                                <div class="col">
                                    <label class="pt-2" for="input1">Uk Press Layout</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable " name="ukpresslayout" value="{{$design->ukpresslayout}}"
                                        placeholder="">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input2">Emboss</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable " name="emboss" placeholder="" value="{{$design->emboss}}" list="embosslist">
                                    <datalist id="embosslist">
                                        <option value="Tekanan 80">
                                        <option value="Tekanan 90">
                                        <option value="Tekanan 100">
                                        <option value="Tekanan 110">
                                        <option value="Tekanan 120">
                                        <option value="Tekanan 130">
                                        <option value="Tekanan 140">
                                        <option value="Tekanan 150">
                                        <option value="Tekanan 160">
                                        <option value="Tekanan 170">
                                        <option value="Tekanan 180">
                                        <option value="Tekanan 190">
                                        <option value="Tekanan 200">
                                        <option value="Tekanan 210">
                                        <option value="Tekanan 220">
                                        <option value="Tekanan 230">
                                        <option value="Tekanan 240">
                                        <option value="Tekanan 250">
                                    </datalist>
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input3">Citto</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable " name="citto" placeholder="" value="{{$design->citto}}" list="cittolist">
                                    <datalist id="cittolist">
                                        <option value="paper">
                                        <option value="0.4 x 1.2">
                                        <option value="0.5 x 1.5">
                                        <option value="0.5 x 1.6">
                                        <option value="0.5 x 1.7">
                                        <option value="0.6 x 1.6">
                                        <option value="0.6 x 1.7">
                                        <option value="2.3 x 2.7">
                                        <option value="3.5 x 4.0">
                                        <option value="0.8 x 2.7">
                                        <option value="0.8 x 3.0">
                                        <option value="0.8 x 4.0">
                                        <option value="0.8 x 5.0">
                                    </datalist>
                                </div>
                            </div>
                            <div class="row px-4" style="background-color: #f1f1f6">
                                 <div class="col">
                                    <label class="pt-2" for="input1">Pisau</label>
                                    <input  style=" border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="pisau" placeholder="" value="{{$design->pisau}}">
                                </div>
                                
                                <div class="col">
                                    <label class="pt-2" for="input2">No PS</label>
                                    <input style="border-radius: 10px;" list="pn" type="text" class="shadow-sm form-control py-2 clickable " name="nops" value="{{$design->nops}}"
                                        id="inputpn" placeholder="" required>
                                    <datalist id="pn">
                                        @foreach ($packaging as $packaging )
                                            <option value="{{ $packaging->pn }}">{{$packaging->boxname}}</option>
                                        @endforeach
                                    </datalist>
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input1">Packing</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable " name="packing" value="{{$design->packing}}" id="getIsibox"
                                        placeholder="">
                                </div>
                             
                            </div>
                            <div class="row px-4" style="background-color: #f1f1f6">
                                <div class="col">
                                    <label class="pt-2" for="input3">NW Box</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="nwbox" id="getNwbox" value="{{$design->nwbox}}" >
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input1">Box Name</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="boxname" value="{{$design->boxname}}"
                                        id="getBoxname">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input2">Box Specs</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="boxspecs" value="{{$design->boxspecs}}"
                                        id="getBoxspecs" placeholder="">
                                </div>
                            </div>
                            
                            <input type="hidden" name="nwpcs" id="getNwpcs" value="{{$design->nwpcs}}"/>
                            <input type="hidden" name="estimasipackaging" id="getEstimasipackaging" value="{{$design->estimasipackaging}}"/>
                            <input type="hidden" name="boxdalampanjang" id="getBoxdalampanjang" value="{{$design->boxdalampanjang}}"/>
                            <input type="hidden" name="boxdalamlebar" id="getBoxdalamlebar" value="{{$design->boxdalamlebar}}"/>
                            <input type="hidden" name="boxdalamtinggi" id="getBoxdalamtinggi" value="{{$design->boxdalamtinggi}}"/>
                            <input type="hidden" name="boxluarpanjang" id="getBoxluarpanjang" value="{{$design->boxluarpanjang}}"/>
                            <input type="hidden" name="boxluarlebar" id="getBoxluarlebar" value="{{$design->boxluarlebar}}"/>
                            <input type="hidden" name="boxluartinggi" id="getBoxluartinggi" value="{{$design->boxluartinggi}}"/>
                            <input type="hidden" name="effective" id="getEffective" value="{{$design->effective}}"/>
                            <input type="hidden" name="preparedate" id="getPreparedate" value="{{$design->preparedate}}"/>
                            <input type="hidden" name="suplier" id="getSuplier" value="{{$design->suplier}}"/>
                            <input type="hidden" name="isi" id="getIsi" value="{{$design->isi}}"/>
                            <input type="hidden" name="isiboxsap" id="getIsiboxsap" value="{{$design->isiboxsap}}"/>
                            <input type="hidden" name="sapataubendel" id="getSapataubendel" value="{{$design->sapataubendel}}"/>
                            <input type="hidden" name="susunan" id="getSusunan" value="{{$design->susunan}}"/>
                            <input type="hidden" name="gambar1" id="getGambar1" value="{{$design->gambar1}}"/>
                            <input type="hidden" name="gambar2" id="getGambar2" value="{{$design->gambar2}}"/>
                            <input type="hidden" name="gambar3" id="getGambar3" value="{{$design->gambar3}}"/>
                            <input type="hidden" name="gambar4" id="getGambar4" value="{{$design->gambar4}}"/>
                            <input type="hidden" name="gambar5" id="getGambar5" value="{{$design->gambar5}}"/>
                            <input type="hidden" name="notepackaging" id="getNotepackaging" value="{{$design->notepackaging}}"/>
                            
                            
                            
                            <div class="row px-4" style="background-color: #f1f1f6">
                               
                                <div class="col">
                                    <label class="pt-2" for="input3">Box Size</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="boxsize" id="getBoxsize" value="{{$design->boxsize}}"
                                        placeholder="">
                                </div>
                                <div class="col">
                                    <label class="pt-2" for="input3">Hotprint</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="hotprint" value="{{$design->hotprint}}"
                                        placeholder="">
                                </div>
                               
                                <div class="col">
                                    <label class="pt-2" for="input1">File Design</label>
                                    <input style="background-color:#ffffff; border-radius: 10px;" type="file" class="shadow-sm form-control py-2 clickable" name="filedesign" placeholder="">
                                </div>
                            </div>
                            <div class="row px-4" style="background-color: #f1f1f6">
                                <div class="">
                                    <label class="pt-2" for="input1">Note JOB </label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="note1" placeholder="" value="{{$design->note1}}">
                                </div>
                                <div class="">
                                    <label class="pt-2" for="input1">Note Design Request</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="notedesignrequest" placeholder="" value="{{$design->notedesignrequest}}">
                                </div>
                                <div class="pb-4">
                                    <label class="pt-2" for="input1">Note Docket</label>
                                    <input style="border-radius: 10px;" type="text" class="shadow-sm form-control py-2 clickable" name="note2" placeholder="Example : Revisi dari docket xxxxxx" value="{{$design->note2}}">
                                </div>
                            </div>
                            <div class="row px-5" style="background-color: #f1f1f6">
                                Layout
                            </div>
                          
                            <div class="row px-4" style="background-color: #f1f1f6">
                                <div class="dropdown rounded-lg mt-1 pb-4" data-control="checkbox-dropdown">
                                  <label class="dropdown-label">Select</label>
                                  <div class="dropdown-list">
                                    <label class="dropdown-option">
                                        @if($design->a != null)
                                            <div class="input-group rounded-circle">
                                              <div class="input-group-text">
                                                <input checked class="form-check-input mt-0" type="checkbox" id="a" >
                                              </div>
                                              <span class="input-group-text">Layout A</span>
                                              <input type="text" class="form-control" name="a" value="{{$design->a}}">
                                            </div>
                                        @else
                                            <div class="input-group  ">
                                              <div class="input-group-text">
                                                <input class="form-check-input mt-0" type="checkbox" id="a" >
                                              </div>
                                              <span class="input-group-text">Layout A</span>
                                              <input disabled type="text" class="form-control" name="a" value="A">
                                            </div>
                                        @endif
                                    </label>
                                    
                                    <label class="dropdown-option">
                                        @if($design->b != null)
                                            <div class="input-group rounded-circle">
                                              <div class="input-group-text">
                                                <input checked class="form-check-input mt-0" type="checkbox" id="b" >
                                              </div>
                                              <span class="input-group-text">Layout B</span>
                                              <input  type="text" class="form-control" name="b" value="{{$design->b}}">
                                            </div>
                                        @else
                                            <div class="input-group  ">
                                              <div class="input-group-text">
                                                <input class="form-check-input mt-0" type="checkbox" id="b" >
                                              </div>
                                              <span class="input-group-text">Layout B</span>
                                              <input disabled type="text" class="form-control" name="b" value="B">
                                            </div>
                                        @endif
                                    </label>
                                    
                                    <label class="dropdown-option">
                                        @if($design->c != null)
                                            <div class="input-group rounded-circle">
                                              <div class="input-group-text">
                                                <input checked class="form-check-input mt-0" type="checkbox" id="c" >
                                              </div>
                                              <span class="input-group-text">Layout C</span>
                                              <input  type="text" class="form-control" name="c" value="{{$design->c}}">
                                            </div>
                                        @else
                                            <div class="input-group  ">
                                              <div class="input-group-text">
                                                <input class="form-check-input mt-0" type="checkbox" id="c" >
                                              </div>
                                              <span class="input-group-text">Layout C</span>
                                              <input disabled type="text" class="form-control" name="c" value="C">
                                            </div>
                                        @endif
                                    </label>
                                    
                                    <label class="dropdown-option">
                                        @if($design->d != null)
                                            <div class="input-group rounded-circle">
                                              <div class="input-group-text">
                                                <input checked class="form-check-input mt-0" type="checkbox" id="d" >
                                              </div>
                                              <span class="input-group-text">Layout D</span>
                                              <input  type="text" class="form-control" name="d" value="{{$design->d}}">
                                            </div>
                                        @else
                                            <div class="input-group  ">
                                              <div class="input-group-text">
                                                <input class="form-check-input mt-0" type="checkbox" id="d" >
                                              </div>
                                              <span class="input-group-text">Layout D</span>
                                              <input disabled type="text" class="form-control" name="d" value="D">
                                            </div>
                                        @endif
                                    </label>
                                    
                                    <label class="dropdown-option">
                                        @if($design->e != null)
                                            <div class="input-group rounded-circle">
                                              <div class="input-group-text">
                                                <input checked class="form-check-input mt-0" type="checkbox" id="e" >
                                              </div>
                                              <span class="input-group-text">Layout E</span>
                                              <input  type="text" class="form-control" name="e" value="{{$design->e}}">
                                            </div>
                                        @else
                                            <div class="input-group  ">
                                              <div class="input-group-text">
                                                <input class="form-check-input mt-0" type="checkbox" id="e" >
                                              </div>
                                              <span class="input-group-text">Layout E</span>
                                              <input disabled type="text" class="form-control" name="e" value="E">
                                            </div>
                                        @endif
                                    </label>
                                    <label class="dropdown-option">
                                        @if($design->f != null)
                                            <div class="input-group rounded-circle">
                                              <div class="input-group-text">
                                                <input checked class="form-check-input mt-0" type="checkbox" id="f" >
                                              </div>
                                              <span class="input-group-text">Layout F</span>
                                              <input  type="text" class="form-control" name="f" value="{{$design->f}}">
                                            </div>
                                        @else
                                            <div class="input-group  ">
                                              <div class="input-group-text">
                                                <input class="form-check-input mt-0" type="checkbox" id="f" >
                                              </div>
                                              <span class="input-group-text">Layout F</span>
                                              <input disabled type="text" class="form-control" name="f" value="F">
                                            </div>
                                        @endif
                                    </label>
                                    
                                  
                                    
                                    <label class="dropdown-option">
                                        @if($design->g != null)
                                            <div class="input-group rounded-circle">
                                              <div class="input-group-text">
                                                <input checked class="form-check-input mt-0" type="checkbox" id="g" >
                                              </div>
                                              <span class="input-group-text">Layout G</span>
                                              <input  type="text" class="form-control" name="g" value="{{$design->g}}">
                                            </div>
                                        @else
                                            <div class="input-group  ">
                                              <div class="input-group-text">
                                                <input class="form-check-input mt-0" type="checkbox" id="g" >
                                              </div>
                                              <span class="input-group-text">Layout G</span>
                                              <input disabled type="text" class="form-control" name="g" value="G">
                                            </div>
                                        @endif
                                    </label>
                                    
                                    <label class="dropdown-option">
                                        @if($design->h != null)
                                            <div class="input-group rounded-circle">
                                              <div class="input-group-text">
                                                <input checked class="form-check-input mt-0" type="checkbox" id="h" >
                                              </div>
                                              <span class="input-group-text">Layout H</span>
                                              <input  type="text" class="form-control" name="h" value="{{$design->h}}">
                                            </div>
                                        @else
                                            <div class="input-group  ">
                                              <div class="input-group-text">
                                                <input class="form-check-input mt-0" type="checkbox" id="h" >
                                              </div>
                                              <span class="input-group-text">Layout H</span>
                                              <input disabled type="text" class="form-control" name="h" value="H">
                                            </div>
                                        @endif
                                    </label>
                                    <label class="dropdown-option">
                                        @if($design->i != null)
                                            <div class="input-group rounded-circle">
                                              <div class="input-group-text">
                                                <input checked class="form-check-input mt-0" type="checkbox" id="i" >
                                              </div>
                                              <span class="input-group-text">Layout I</span>
                                              <input  type="text" class="form-control" name="i" value="{{$design->i}}">
                                            </div>
                                        @else
                                            <div class="input-group  ">
                                              <div class="input-group-text">
                                                <input class="form-check-input mt-0" type="checkbox" id="i" >
                                              </div>
                                              <span class="input-group-text">Layout I</span>
                                              <input disabled type="text" class="form-control" name="i" value="I">
                                            </div>
                                        @endif
                                    </label>
                                    <label class="dropdown-option">
                                        @if($design->j != null)
                                            <div class="input-group rounded-circle">
                                              <div class="input-group-text">
                                                <input checked class="form-check-input mt-0" type="checkbox" id="j" >
                                              </div>
                                              <span class="input-group-text">Layout J</span>
                                              <input  type="text" class="form-control" name="j" value="{{$design->j}}">
                                            </div>
                                        @else
                                            <div class="input-group  ">
                                              <div class="input-group-text">
                                                <input class="form-check-input mt-0" type="checkbox" id="j" >
                                              </div>
                                              <span class="input-group-text">Layout J</span>
                                              <input disabled type="text" class="form-control" name="j" value="J">
                                            </div>
                                        @endif
                                    </label>
                                    
                                </div>
                            </div>
                            </div>
                            <style>
                                .dropdown {
                                  position: relative;
                                  font-size: 14px;
                                  color: #333;
                                
                                  .dropdown-list {
                                    padding: 1px;
                                    background: #fff;
                                    position: absolute;
                                    top: 30px;
                                    left: 1px;
                                    right: 1px;
                                    box-shadow: 0 1px 2px 1px rgba(0, 0, 0, .15);
                                    transform-origin: 50% 0;
                                    transform: scale(1, 0);
                                    transition: transform .15s ease-in-out .15s;
                                        max-height: 33vh;
                                    overflow-y: scroll;
                                  }
                                  
                                  .dropdown-option {
                                    display: block;
                                    padding: 8px 12px;
                                    opacity: 0;
                                    transition: opacity .15s ease-in-out;
                                  }
                                  
                                  .dropdown-label {
                                    display: block;
                                    height: 30px;
                                    background: #fff;
                                    border: 1px solid #ccc;
                                    padding: 6px 12px;
                                    line-height: 1;
                                    cursor: pointer;
                                    
                                    &:before {
                                      content: '▼';
                                      float: right;
                                    }
                                  }
                                  
                                  &.on {
                                   .dropdown-list {
                                      transform: scale(1, 1);
                                      transition-delay: 0s;
                                      
                                      .dropdown-option {
                                        opacity: 1;
                                        transition-delay: .2s;
                                      }
                                    }
                                    
                                    .dropdown-label:before {
                                      content: '▲';
                                    }
                                  }
                                  
                                  [type="checkbox"] {
                                    position: relative;
                                    top: -1px;
                                    margin-right: 4px;
                                  }
                                }
                            </style>
 
                            
                            <script>
                                (function($) {
                                      var CheckboxDropdown = function(el) {
                                        var _this = this;
                                        this.isOpen = false;
                                        this.areAllChecked = false;
                                        this.$el = $(el);
                                        this.$label = this.$el.find('.dropdown-label');
                                        this.$checkAll = this.$el.find('[data-toggle="check-all"]').first();
                                        this.$inputs = this.$el.find('[type="checkbox"]');
                                        
                                        this.onCheckBox();
                                        
                                        this.$label.on('click', function(e) {
                                          e.preventDefault();
                                          _this.toggleOpen();
                                        });
                                        
                                        this.$checkAll.on('click', function(e) {
                                          e.preventDefault();
                                          _this.onCheckAll();
                                        });
                                        
                                        this.$inputs.on('change', function(e) {
                                          _this.onCheckBox();
                                        });
                                      };
                                      
                                      CheckboxDropdown.prototype.onCheckBox = function() {
                                        this.updateStatus();
                                      };
                                      
                                      CheckboxDropdown.prototype.updateStatus = function() {
                                        var checked = this.$el.find(':checked');
                                        
                                        this.areAllChecked = false;
                                        this.$checkAll.html('Check All');
                                        
                                        if(checked.length <= 0) {
                                          this.$label.html('Select Options');
                                        }
                                        else if(checked.length === 0) {
                                          this.$label.html(checked.parent('label').text());
                                        }
                                        else if(checked.length === this.$inputs.length) {
                                          this.$label.html('All Selected');
                                          this.areAllChecked = true;
                                          this.$checkAll.html('Uncheck All');
                                        }
                                        else {
                                          this.$label.html(checked.length + ' Selected');
                                        }
                                      };
                                      
                                      CheckboxDropdown.prototype.onCheckAll = function(checkAll) {
                                        if(!this.areAllChecked || checkAll) {
                                          this.areAllChecked = true;
                                          this.$checkAll.html('Uncheck All');
                                          this.$inputs.prop('checked', true);
                                        }
                                        else {
                                          this.areAllChecked = false;
                                          this.$checkAll.html('Check All');
                                          this.$inputs.prop('checked', false);
                                        }
                                        
                                        this.updateStatus();
                                      };
                                      
                                      CheckboxDropdown.prototype.toggleOpen = function(forceOpen) {
                                        var _this = this;
                                        
                                        if(!this.isOpen || forceOpen) {
                                           this.isOpen = true;
                                           this.$el.addClass('on');
                                          $(document).on('click', function(e) {
                                            if(!$(e.target).closest('[data-control]').length) {
                                             _this.toggleOpen();
                                            }
                                          });
                                        }
                                        else {
                                          this.isOpen = false;
                                          this.$el.removeClass('on');
                                          $(document).off('click');
                                        }
                                      };
                                      
                                      var checkboxesDropdowns = document.querySelectorAll('[data-control="checkbox-dropdown"]');
                                      for(var i = 0, length = checkboxesDropdowns.length; i < length; i++) {
                                        new CheckboxDropdown(checkboxesDropdowns[i]);
                                      }
                                    })(jQuery);
                            </script>
                            
                            <div>
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
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            // Fungsi yang dipanggil saat nilai input pertama berubah
            $('#inputdocket').change(function () {
                // Mendapatkan nilai yang dipilih pada input pertama
                var selectedDocket = $(this).val();
                // Melakukan Ajax request ke server untuk mendapatkan data client dan address berdasarkan namacustomer
                $.ajax({
                    type: 'GET',
                    url: '/get-job-datadocket/' + selectedDocket, // Gantilah dengan URL endpoint yang sesuai di Laravel
                    success: function (data) {
                        // Mengisi nilai pada input kedua dan ketiga
                        $('#getProduct').val(data.product);
                    },
                    error: function () {
                        alert('Gagal mengambil data Product.');
                    }
                });
            });
        });

        $(document).ready(function () {
            // Fungsi yang dipanggil saat nilai input pertama berubah
            $('#inputpn').change(function () {
                // Mendapatkan nilai yang dipilih pada input pertama
                var selectedPackaging = $(this).val();
                // Melakukan Ajax request ke server untuk mendapatkan data client dan address berdasarkan namacustomer
                $.ajax({
                    type: 'GET',
                    url: '/get-job-datapackaging/' + selectedPackaging, // Gantilah dengan URL endpoint yang sesuai di Laravel
                    success: function (data) {
                        // Mengisi nilai pada input kedua dan ketiga
                        $('#getIsibox').val(data.isibox);
                        $('#getNwbox').val(data.boxkg);
                        $('#getBoxname').val(data.boxname);
                        $('#getBoxspecs').val(data.boxspecs);
                        $('#getBoxsize').val(data.boxsize);
                        $('#getNwpcs').val(data.nwpcs);
                        $('#getEstimasipackaging').val(data.estimasipackaging);
                        $('#getBoxdalampanjang').val(data.boxdalampanjang);
                        $('#getBoxdalamlebar').val(data.boxdalamlebar);
                        $('#getBoxdalamtinggi').val(data.boxdalamtinggi);
                        $('#getBoxluarpanjang').val(data.boxluarpanjang);
                        $('#getBoxluarlebar').val(data.boxluarlebar);
                        $('#getBoxluartinggi').val(data.boxluartinggi);
                        $('#getEffective').val(data.effective);
                        $('#getPreparedate').val(data.preparedate);
                        $('#getSuplier').val(data.suplier);
                        $('#getIsi').val(data.isi);
                        $('#getIsiboxsap').val(data.isiboxsap);
                        $('#getSapataubendel').val(data.sapataubendel);
                        $('#getSusunan').val(data.susunan);
                        $('#getGambar1').val(data.gambar1);
                        $('#getGambar2').val(data.gambar2);
                        $('#getGambar3').val(data.gambar3);
                        $('#getGambar4').val(data.gambar4);
                        $('#getGambar5').val(data.gambar5);
                        $('#getNotepackaging').val(data.notepackaging);
                    },
                    error: function () {
                        alert('Gagal mengambil data Packaging.');
                    }
                });
            });
        });
    </script>
    
    <script>
        function submitForm() {
            var formData = new FormData();
            var checkboxA = document.getElementById('a');
            var inputA = document.getElementsByName('a')[0];
            var checkboxB = document.getElementById('b');
            var inputB = document.getElementsByName('b')[0];
            var checkboxC = document.getElementById('c');
            var inputC = document.getElementsByName('c')[0];
            var checkboxD = document.getElementById('d');
            var inputD = document.getElementsByName('d')[0];
            var checkboxE = document.getElementById('e');
            var inputE = document.getElementsByName('e')[0];
            var checkboxF = document.getElementById('f');
            var inputF = document.getElementsByName('f')[0];
            var checkboxG = document.getElementById('g');
            var inputG = document.getElementsByName('g')[0];
            var checkboxH = document.getElementById('h');
            var inputH = document.getElementsByName('h')[0];
            var checkboxI = document.getElementById('i');
            var inputI = document.getElementsByName('i')[0];
            var checkboxJ = document.getElementById('j');
            var inputJ = document.getElementsByName('j')[0];

            if (checkboxA.checked) {
                formData.append('a', inputA.value);
            }
            if (checkboxB.checked) {
                formData.append('b', inputB.value);
            }
            if (checkboxC.checked) {
                formData.append('c', inputC.value);
            }
            if (checkboxD.checked) {
                formData.append('d', inputD.value);
            }
            if (checkboxE.checked) {
                formData.append('e', inputE.value);
            }
            if (checkboxF.checked) {
                formData.append('f', inputF.value);
            }
            if (checkboxG.checked) {
                formData.append('g', inputG.value);
            }
            if (checkboxH.checked) {
                formData.append('h', inputH.value);
            }
            if (checkboxI.checked) {
                formData.append('i', inputI.value);
            }
            if (checkboxJ.checked) {
                formData.append('j', inputJ.value);
            }

            fetch('{{route("kadeptdocketnew.store",$design->id)}}', { // Menggunakan route Laravel di sini
                method: 'PUT',
                body: formData
            }).then(response => {
                return response.json();
            }).then(data => {
                console.log(data); // Tanggapan dari server
            }).catch(error => {
                console.error('Error:', error);
            });
        }

        document.getElementById('a').addEventListener('change', function() {
            var inputA = document.getElementsByName('a')[0];
            inputA.disabled = !this.checked;
        });
        document.getElementById('b').addEventListener('change', function() {
            var inputB = document.getElementsByName('b')[0];
            inputB.disabled = !this.checked;
        });
        document.getElementById('c').addEventListener('change', function() {
            var inputC = document.getElementsByName('c')[0];
            inputC.disabled = !this.checked;
        });
        document.getElementById('d').addEventListener('change', function() {
            var inputD = document.getElementsByName('d')[0];
            inputD.disabled = !this.checked;
        });
        document.getElementById('e').addEventListener('change', function() {
            var inputE = document.getElementsByName('e')[0];
            inputE.disabled = !this.checked;
        });
        document.getElementById('f').addEventListener('change', function() {
            var inputF = document.getElementsByName('f')[0];
            inputF.disabled = !this.checked;
        });
        document.getElementById('g').addEventListener('change', function() {
            var inputG = document.getElementsByName('g')[0];
            inputG.disabled = !this.checked;
        });
        document.getElementById('h').addEventListener('change', function() {
            var inputH = document.getElementsByName('h')[0];
            inputH.disabled = !this.checked;
        });
        document.getElementById('i').addEventListener('change', function() {
            var inputI = document.getElementsByName('i')[0];
            inputI.disabled = !this.checked;
        });
        document.getElementById('j').addEventListener('change', function() {
            var inputJ = document.getElementsByName('j')[0];
            inputJ.disabled = !this.checked;
        });

    </script>




    @endsection