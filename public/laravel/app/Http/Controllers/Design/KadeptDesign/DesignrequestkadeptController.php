<?php

namespace App\Http\Controllers\Design\KadeptDesign;

use App\Http\Controllers\Controller;
use App\Models\Docketnew;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DesignrequestkadeptController extends Controller
{
    public function index(Request $request)
    {
        $query = Docketnew::query();
        
        $statuslayout = $request->input('statuslayout', null);
        if ($statuslayout === 'null') {
            $query->whereNull('statuslayout');
        } elseif ($statuslayout !== null && $statuslayout !== '') {
            $query->where('statuslayout', $statuslayout);
        }
        
        if ($request->has('search')) {
            $query->where('id', 'LIKE', '%' . $request->search . '%')
                ->orWhere('product', 'LIKE', '%' . $request->search . '%')
                ->orWhere('sap','LIKE','%'.$request->search. '%');
        }
        
        $sortBy = $request->input('sort_by', null);
        
        if(!$sortBy){
            $query->orderBy('id','desc');
        }elseif($sortBy == 'asc'){
            $query->orderBy('id');
        }elseif($sortBy == 'desc'){
            $query->orderByDesc('id');
        }
        
        
        $designrequests = $query->paginate(15);
        return view('role.design.kadept.designrequest.listdesignrequest', compact('designrequests'));
    }

    public function update(Request $request, $id)
    {
        $designrequest = Docketnew::find($id);
        $newStatusLayout = $request->input('newStatusLayout');
        $designrequest->statuslayout = $newStatusLayout;

        $oldImageOrPdf = $designrequest->filelayout;

        if ($request->hasFile('filelayout')) {
            // Hapus file lama
            if ($oldImageOrPdf !== null) {
                Storage::delete('public/path/to/your/image/' . $oldImageOrPdf);
            }
            // Upload file baru
            $fileNameWithExt = $request->file('filelayout')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('filelayout')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            $path = $request->file('filelayout')->storeAs('public/path/to/your/image/', $fileNameToStore);
            $designrequest->filelayout = $fileNameToStore;
        }
        $designrequest->save();
        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }
    
        
    

    public function updateStatus(Request $request, $id)
    {
        $newStatus = $request->input('newStatus');
        $designrequest = Docketnew::find($id);

        $designrequest->statusdocket = $newStatus;
        $designrequest->save();
        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }

    public function show ($id){
        $designrequest = Docketnew::find($id);
        return view('role.design.kadept.designrequest.detaildesignrequest', compact('designrequest'));
    }
    
    
    
    public function updateLayout(Request $request, $id)
{
    $designrequest = Docketnew::find($id);

    // Update statusa and filea
    $newStatusa = $request->input('newStatusa');
    $designrequest->statusa = $newStatusa;
    $oldImageOrPdfa = $designrequest->filea;
    if ($request->hasFile('filea')) {
        if ($oldImageOrPdfa !== null) {
            Storage::delete('public/path/to/your/image/' . $oldImageOrPdfa);
        }
        $fileNameWithExt = $request->file('filea')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('filea')->getClientOriginalExtension();
        $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
        $path = $request->file('filea')->storeAs('public/path/to/your/image/', $fileNameToStore);
        $designrequest->filea = $fileNameToStore;
    }

    // Update statusb and fileb
    $newStatusb = $request->input('newStatusb');
    $designrequest->statusb = $newStatusb;
    $oldImageOrPdfb = $designrequest->fileb;
    if ($request->hasFile('fileb')) {
        if ($oldImageOrPdfb !== null) {
            Storage::delete('public/path/to/your/image/' . $oldImageOrPdfb);
        }
        $fileNameWithExt = $request->file('fileb')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('fileb')->getClientOriginalExtension();
        $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
        $path = $request->file('fileb')->storeAs('public/path/to/your/image/', $fileNameToStore);
        $designrequest->fileb = $fileNameToStore;
    }

    // Update statusc and filec
    $newStatusc = $request->input('newStatusc');
    $designrequest->statusc = $newStatusc;
    $oldImageOrPdfc = $designrequest->filec;
    if ($request->hasFile('filec')) {
        if ($oldImageOrPdfc !== null) {
            Storage::delete('public/path/to/your/image/' . $oldImageOrPdfc);
        }
        $fileNameWithExt = $request->file('filec')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('filec')->getClientOriginalExtension();
        $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
        $path = $request->file('filec')->storeAs('public/path/to/your/image/', $fileNameToStore);
        $designrequest->filec = $fileNameToStore;
    }

    // Update statusd and filed
    $newStatusd = $request->input('newStatusd');
    $designrequest->statusd = $newStatusd;
    $oldImageOrPdfd = $designrequest->filed;
    if ($request->hasFile('filed')) {
        if ($oldImageOrPdfd !== null) {
            Storage::delete('public/path/to/your/image/' . $oldImageOrPdfd);
        }
        $fileNameWithExt = $request->file('filed')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('filed')->getClientOriginalExtension();
        $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
        $path = $request->file('filed')->storeAs('public/path/to/your/image/', $fileNameToStore);
        $designrequest->filed = $fileNameToStore;
    }

    // Update statuse and filee
    $newStatuse = $request->input('newStatuse');
    $designrequest->statuse = $newStatuse;
    $oldImageOrPdfe = $designrequest->filee;
    if ($request->hasFile('filee')) {
        if ($oldImageOrPdfe !== null) {
            Storage::delete('public/path/to/your/image/' . $oldImageOrPdfe);
        }
        $fileNameWithExt = $request->file('filee')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('filee')->getClientOriginalExtension();
        $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
        $path = $request->file('filee')->storeAs('public/path/to/your/image/', $fileNameToStore);
        $designrequest->filee = $fileNameToStore;
    }

    // Continue the pattern for statusf to statusz and filef to filez
    $newStatusf = $request->input('newStatusf');
    $designrequest->statusf = $newStatusf;
    $oldImageOrPdff = $designrequest->filef;
    if ($request->hasFile('filef')) {
        if ($oldImageOrPdff !== null) {
            Storage::delete('public/path/to/your/image/' . $oldImageOrPdff);
        }
        $fileNameWithExt = $request->file('filef')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('filef')->getClientOriginalExtension();
        $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
        $path = $request->file('filef')->storeAs('public/path/to/your/image/', $fileNameToStore);
        $designrequest->filef = $fileNameToStore;
    }

    $newStatusg = $request->input('newStatusg');
    $designrequest->statusg = $newStatusg;
    $oldImageOrPdfg = $designrequest->fileg;
    if ($request->hasFile('fileg')) {
        if ($oldImageOrPdfg !== null) {
            Storage::delete('public/path/to/your/image/' . $oldImageOrPdfg);
        }
        $fileNameWithExt = $request->file('fileg')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('fileg')->getClientOriginalExtension();
        $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
        $path = $request->file('fileg')->storeAs('public/path/to/your/image/', $fileNameToStore);
        $designrequest->fileg = $fileNameToStore;
    }

    $newStatush = $request->input('newStatush');
    $designrequest->statush = $newStatush;
    $oldImageOrPdfh = $designrequest->fileh;
    if ($request->hasFile('fileh')) {
        if ($oldImageOrPdfh !== null) {
            Storage::delete('public/path/to/your/image/' . $oldImageOrPdfh);
        }
        $fileNameWithExt = $request->file('fileh')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('fileh')->getClientOriginalExtension();
        $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
        $path = $request->file('fileh')->storeAs('public/path/to/your/image/', $fileNameToStore);
        $designrequest->fileh = $fileNameToStore;
    }

    $newStatusi = $request->input('newStatusi');
    $designrequest->statusi = $newStatusi;
    $oldImageOrPdfi = $designrequest->filei;
    if ($request->hasFile('filei')) {
        if ($oldImageOrPdfi !== null) {
            Storage::delete('public/path/to/your/image/' . $oldImageOrPdfi);
        }
        $fileNameWithExt = $request->file('filei')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('filei')->getClientOriginalExtension();
        $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
        $path = $request->file('filei')->storeAs('public/path/to/your/image/', $fileNameToStore);
        $designrequest->filei = $fileNameToStore;
    }

    $newStatusj = $request->input('newStatusj');
    $designrequest->statusj = $newStatusj;
    $oldImageOrPdfj = $designrequest->filej;
    if ($request->hasFile('filej')) {
        if ($oldImageOrPdfj !== null) {
            Storage::delete('public/path/to/your/image/' . $oldImageOrPdfj);
        }
        $fileNameWithExt = $request->file('filej')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('filej')->getClientOriginalExtension();
        $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
        $path = $request->file('filej')->storeAs('public/path/to/your/image/', $fileNameToStore);
        $designrequest->filej = $fileNameToStore;
    }

    $newStatusk = $request->input('newStatusk');
    $designrequest->statusk = $newStatusk;
    $oldImageOrPdfk = $designrequest->filek;
    if ($request->hasFile('filek')) {
        if ($oldImageOrPdfk !== null) {
            Storage::delete('public/path/to/your/image/' . $oldImageOrPdfk);
        }
        $fileNameWithExt = $request->file('filek')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('filek')->getClientOriginalExtension();
        $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
        $path = $request->file('filek')->storeAs('public/path/to/your/image/', $fileNameToStore);
        $designrequest->filek = $fileNameToStore;
    }

    $newStatusl = $request->input('newStatusl');
    $designrequest->statusl = $newStatusl;
    $oldImageOrPdfl = $designrequest->filel;
    if ($request->hasFile('filel')) {
        if ($oldImageOrPdfl !== null) {
            Storage::delete('public/path/to/your/image/' . $oldImageOrPdfl);
        }
        $fileNameWithExt = $request->file('filel')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('filel')->getClientOriginalExtension();
        $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
        $path = $request->file('filel')->storeAs('public/path/to/your/image/', $fileNameToStore);
        $designrequest->filel = $fileNameToStore;
    }

    $newStatusm = $request->input('newStatusm');
    $designrequest->statusm = $newStatusm;
    $oldImageOrPdfm = $designrequest->filem;
    if ($request->hasFile('filem')) {
        if ($oldImageOrPdfm !== null) {
            Storage::delete('public/path/to/your/image/' . $oldImageOrPdfm);
        }
        $fileNameWithExt = $request->file('filem')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('filem')->getClientOriginalExtension();
        $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
        $path = $request->file('filem')->storeAs('public/path/to/your/image/', $fileNameToStore);
        $designrequest->filem = $fileNameToStore;
    }

    $newStatusn = $request->input('newStatusn');
    $designrequest->statusn = $newStatusn;
    $oldImageOrPdfn = $designrequest->filen;
    if ($request->hasFile('filen')) {
        if ($oldImageOrPdfn !== null) {
            Storage::delete('public/path/to/your/image/' . $oldImageOrPdfn);
        }
        $fileNameWithExt = $request->file('filen')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('filen')->getClientOriginalExtension();
        $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
        $path = $request->file('filen')->storeAs('public/path/to/your/image/', $fileNameToStore);
        $designrequest->filen = $fileNameToStore;
    }

    $newStatuso = $request->input('newStatuso');
    $designrequest->statuso = $newStatuso;
    $oldImageOrPdfo = $designrequest->fileo;
    if ($request->hasFile('fileo')) {
        if ($oldImageOrPdfo !== null) {
            Storage::delete('public/path/to/your/image/' . $oldImageOrPdfo);
        }
        $fileNameWithExt = $request->file('fileo')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('fileo')->getClientOriginalExtension();
        $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
        $path = $request->file('fileo')->storeAs('public/path/to/your/image/', $fileNameToStore);
        $designrequest->fileo = $fileNameToStore;
    }

    $newStatusp = $request->input('newStatusp');
    $designrequest->statusp = $newStatusp;
    $oldImageOrPdfp = $designrequest->filep;
    if ($request->hasFile('filep')) {
        if ($oldImageOrPdfp !== null) {
            Storage::delete('public/path/to/your/image/' . $oldImageOrPdfp);
        }
        $fileNameWithExt = $request->file('filep')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('filep')->getClientOriginalExtension();
        $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
        $path = $request->file('filep')->storeAs('public/path/to/your/image/', $fileNameToStore);
        $designrequest->filep = $fileNameToStore;
    }

    $newStatusq = $request->input('newStatusq');
    $designrequest->statusq = $newStatusq;
    $oldImageOrPdfq = $designrequest->fileq;
    if ($request->hasFile('fileq')) {
        if ($oldImageOrPdfq !== null) {
            Storage::delete('public/path/to/your/image/' . $oldImageOrPdfq);
        }
        $fileNameWithExt = $request->file('fileq')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('fileq')->getClientOriginalExtension();
        $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
        $path = $request->file('fileq')->storeAs('public/path/to/your/image/', $fileNameToStore);
        $designrequest->fileq = $fileNameToStore;
    }

    $newStatusr = $request->input('newStatusr');
    $designrequest->statusr = $newStatusr;
    $oldImageOrPdfr = $designrequest->filer;
    if ($request->hasFile('filer')) {
        if ($oldImageOrPdfr !== null) {
            Storage::delete('public/path/to/your/image/' . $oldImageOrPdfr);
        }
        $fileNameWithExt = $request->file('filer')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('filer')->getClientOriginalExtension();
        $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
        $path = $request->file('filer')->storeAs('public/path/to/your/image/', $fileNameToStore);
        $designrequest->filer = $fileNameToStore;
    }

    $newStatuss = $request->input('newStatuss');
    $designrequest->statuss = $newStatuss;
    $oldImageOrPdfs = $designrequest->files;
    if ($request->hasFile('files')) {
        if ($oldImageOrPdfs !== null) {
            Storage::delete('public/path/to/your/image/' . $oldImageOrPdfs);
        }
        $fileNameWithExt = $request->file('files')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('files')->getClientOriginalExtension();
        $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
        $path = $request->file('files')->storeAs('public/path/to/your/image/', $fileNameToStore);
        $designrequest->files = $fileNameToStore;
    }

    $newStatust = $request->input('newStatust');
    $designrequest->statust = $newStatust;
    $oldImageOrPdft = $designrequest->filet;
    if ($request->hasFile('filet')) {
        if ($oldImageOrPdft !== null) {
            Storage::delete('public/path/to/your/image/' . $oldImageOrPdft);
        }
        $fileNameWithExt = $request->file('filet')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('filet')->getClientOriginalExtension();
        $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
        $path = $request->file('filet')->storeAs('public/path/to/your/image/', $fileNameToStore);
        $designrequest->filet = $fileNameToStore;
    }

    $newStatusu = $request->input('newStatusu');
    $designrequest->statusu = $newStatusu;
    $oldImageOrPdfu = $designrequest->fileu;
    if ($request->hasFile('fileu')) {
        if ($oldImageOrPdfu !== null) {
            Storage::delete('public/path/to/your/image/' . $oldImageOrPdfu);
        }
        $fileNameWithExt = $request->file('fileu')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('fileu')->getClientOriginalExtension();
        $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
        $path = $request->file('fileu')->storeAs('public/path/to/your/image/', $fileNameToStore);
        $designrequest->fileu = $fileNameToStore;
    }

    $newStatusv = $request->input('newStatusv');
    $designrequest->statusv = $newStatusv;
    $oldImageOrPdfv = $designrequest->filev;
    if ($request->hasFile('filev')) {
        if ($oldImageOrPdfv !== null) {
            Storage::delete('public/path/to/your/image/' . $oldImageOrPdfv);
        }
        $fileNameWithExt = $request->file('filev')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('filev')->getClientOriginalExtension();
        $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
        $path = $request->file('filev')->storeAs('public/path/to/your/image/', $fileNameToStore);
        $designrequest->filev = $fileNameToStore;
    }

    $newStatusw = $request->input('newStatusw');
    $designrequest->statusw = $newStatusw;
    $oldImageOrPdfw = $designrequest->filew;
    if ($request->hasFile('filew')) {
        if ($oldImageOrPdfw !== null) {
            Storage::delete('public/path/to/your/image/' . $oldImageOrPdfw);
        }
        $fileNameWithExt = $request->file('filew')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('filew')->getClientOriginalExtension();
        $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
        $path = $request->file('filew')->storeAs('public/path/to/your/image/', $fileNameToStore);
        $designrequest->filew = $fileNameToStore;
    }

    $newStatusx = $request->input('newStatusx');
    $designrequest->statusx = $newStatusx;
    $oldImageOrPdfx = $designrequest->filex;
    if ($request->hasFile('filex')) {
        if ($oldImageOrPdfx !== null) {
            Storage::delete('public/path/to/your/image/' . $oldImageOrPdfx);
        }
        $fileNameWithExt = $request->file('filex')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('filex')->getClientOriginalExtension();
        $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
        $path = $request->file('filex')->storeAs('public/path/to/your/image/', $fileNameToStore);
        $designrequest->filex = $fileNameToStore;
    }

    $newStatusy = $request->input('newStatusy');
    $designrequest->statusy = $newStatusy;
    $oldImageOrPdfy = $designrequest->filey;
    if ($request->hasFile('filey')) {
        if ($oldImageOrPdfy !== null) {
            Storage::delete('public/path/to/your/image/' . $oldImageOrPdfy);
        }
        $fileNameWithExt = $request->file('filey')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('filey')->getClientOriginalExtension();
        $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
        $path = $request->file('filey')->storeAs('public/path/to/your/image/', $fileNameToStore);
        $designrequest->filey = $fileNameToStore;
    }

    $newStatusz = $request->input('newStatusz');
    $designrequest->statusz = $newStatusz;
    $oldImageOrPdfz = $designrequest->filez;
    if ($request->hasFile('filez')) {
        if ($oldImageOrPdfz !== null) {
            Storage::delete('public/path/to/your/image/' . $oldImageOrPdfz);
        }
        $fileNameWithExt = $request->file('filez')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('filez')->getClientOriginalExtension();
        $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
        $path = $request->file('filez')->storeAs('public/path/to/your/image/', $fileNameToStore);
        $designrequest->filez = $fileNameToStore;
    }

    $designrequest->save();
    return redirect()->back()->with('success', 'file berhasil diperbarui.');
}

    


}
