<?php

namespace App\Http\Controllers\Design;

use App\Http\Controllers\Controller;
use App\Models\Designnumber;
use App\Models\Docketnew;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DesignrequestController extends Controller
{
    public function index()
    {
        $designrequests = Docketnew::all();
        return view('role.design.dept.designrequest.listdesignrequest', compact('designrequests'));
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
        return view('role.design.dept.designrequest.detaildesignrequest', compact('designrequest'));
    }

}
