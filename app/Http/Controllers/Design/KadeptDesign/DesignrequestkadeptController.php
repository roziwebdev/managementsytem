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
    if (empty($designrequest->statusa)) {
        $designrequest->statusa = $newStatusa;
    }
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
    if (empty($designrequest->statusb)) {
        $designrequest->statusb = $newStatusb;
    }
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
    if (empty($designrequest->statusc)) {
        $designrequest->statusc = $newStatusc;
    }
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
    if (empty($designrequest->statusd)) {
        $designrequest->statusd = $newStatusd;
    }
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
    if (empty($designrequest->statuse)) {
        $designrequest->statuse = $newStatuse;
    }
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
    if (empty($designrequest->statusf)) {
        $designrequest->statusf = $newStatusf;
    }
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
    if (empty($designrequest->statusg)) {
        $designrequest->statusg = $newStatusg;
    }
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
    if (empty($designrequest->statush)) {
        $designrequest->statush = $newStatush;
    }
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
    if (empty($designrequest->statusi)) {
        $designrequest->statusi = $newStatusi;
    }
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
    if (empty($designrequest->statusj)) {
        $designrequest->statusj = $newStatusj;
    }
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

    

    $designrequest->save();
    return redirect()->back()->with('success', 'file berhasil diperbarui.');
}

    


}
