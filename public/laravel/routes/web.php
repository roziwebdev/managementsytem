 <?php

use App\Http\Controllers\AlamatController;
use App\Http\Controllers\ChatceoController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ChatmanagerController;
use App\Http\Controllers\ChatpurchasingController;
use App\Http\Controllers\DeptController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\MaterialrequestController;
use App\Http\Controllers\MrceoController;
use App\Http\Controllers\NamaController;
use App\Http\Controllers\PricelistController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchasingController;
use App\Http\Controllers\PurchasingmanagerController;
use App\Http\Controllers\PurchasingmrController;
use App\Http\Controllers\PurchasingceoController;
use App\Http\Controllers\PurchaseorderdeptController;
use App\Http\Controllers\PurchaseorderkadeptController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SupplierController;
use App\Models\Materialrequest;
use App\Http\Controllers\ArrivalkadeptController;
use App\Http\Controllers\ArrivalController;
use App\Http\Controllers\ArrivalmanagerController;
use App\Http\Controllers\ArrivalpurchasingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\KadeptController;
use App\Http\Controllers\InventorymanagerController;
use App\Http\Controllers\InventorymanagerwithdrawController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\InventorydeptController;
use App\Http\Controllers\InventorydeptwithdrawController;
use App\Http\Controllers\InventorykadeptController;
use App\Http\Controllers\InventorykadeptwithdrawController;
use App\Http\Controllers\InventoryuserController;
use App\Http\Controllers\InventoryuserwithdrawController;
use App\Http\Controllers\InventorywithdrawController;
use App\Http\Controllers\Sales\QuotationController;
use App\Http\Controllers\Sales\PlantController;
use App\Http\Controllers\Sales\SalesController;
use App\Http\Controllers\Sales\PriceproductController;
use App\Http\Controllers\Prodev\BoxController;
use App\Http\Controllers\Prodev\ProdevController;
use App\Http\Controllers\Prodev\DocketController;
use App\Http\Controllers\Prodev\DesignController;
use App\Http\Controllers\Prodev\DocketnewController;
use App\Http\Controllers\Prodev\PackagingController;
use App\Http\Controllers\Sales\CustomerController;
use App\Http\Controllers\Sales\TenderController;
use App\Http\Controllers\Sales\ProductsalesController;
use App\Http\Controllers\Sales\Manager\SalesmgrController;
use App\Http\Controllers\Sales\Manager\QuotationmgrController;
use App\Http\Controllers\Sales\Manager\TendermgrController;
use App\Http\Controllers\Hrd\Manager\KaryawanmanagerController;
use App\Http\Controllers\Hrd\Manager\KaryawanstaffmanagerController;
use App\Http\Controllers\Hrd\Manager\LemburmanagerController;
use App\Http\Controllers\Hrd\Manager\LemburstaffmanagerController;
use App\Http\Controllers\Prodev\ManagerProdev\ProdevManagerController;
use App\Http\Controllers\Hrd\Kadept\KaryawankadeptController;
use App\Http\Controllers\Hrd\Kadept\LemburkadeptController;
use App\Http\Controllers\Hrd\Kadept\KaryawanstaffkadeptController;
use App\Http\Controllers\Hrd\Kadept\LemburstaffkadeptController;
use App\Http\Controllers\User\UserLemburController;
use App\Http\Controllers\Hrd\Dept\LemburController;
use App\Http\Controllers\Hrd\Dept\KaryawanController;
use App\Http\Controllers\Hrd\Dept\LemburstaffController;
use App\Http\Controllers\Hrd\Dept\KaryawanstaffController;
use App\Http\Controllers\Prodev\KadeptProdev\DocketnewKadeptController;
use App\Http\Controllers\Prodev\KadeptProdev\BoxKadeptController;
use App\Http\Controllers\Prodev\KadeptProdev\DesignKadeptController;
use App\Http\Controllers\Prodev\KadeptProdev\DocketKadeptController;
use App\Http\Controllers\Prodev\KadeptProdev\PackagingKadeptController;
use App\Http\Controllers\Prodev\KadeptProdev\ProdevKadeptController;
use App\Http\Controllers\Finance\Dept\FinanceJobController;
use App\Http\Controllers\Finance\Kadept\FinanceJobKadeptController;
use App\Http\Controllers\Sales\JobSalesController;
use App\Http\Controllers\Design\KadeptDesign\DesignrequestkadeptController;
use App\Http\Controllers\Design\DesignrequestController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|

*/

    Route::get('/get-karyawanstaff/{kodekar}', [LemburstaffController::class, 'getdatakaryawan']);
    Route::get('/get-karyawan/{kodekar}', [LemburController::class, 'getdatakaryawan']);    
    Route::get('/searchproductsales', [ProductsalesController::class, 'searchproductsales']);
    Route::get('/check-data', [DeptController::class, 'checkData']);
    Route::get('/searchitemresultinven', [InventoryController::class, 'searchitemresultinven']);
    Route::get('/searchitemresultinvenwd', [InventorywithdrawController::class, 'searchitemresultinvenwd']);
    Route::get('/searchsupplier', [PurchasingController::class, 'searchsupplier']);
    Route::get('/searchitemresult', [PurchasingController::class, 'searchitemresult']);
    Route::get('/searchitemresultmr', [PurchasingController::class, 'searchitemresultmr']);

Route::middleware(['auth', 'roles:vendor'])->group(function () {
    Route::get('/formsupplier', [VendorController::class, 'create3'])->name('vendor.3');
});

Route::middleware(['auth', 'roles:vendorpp'])->group(function () {
    Route::post('/vendorekspedisi', [VendorController::class, 'storeekp'])->name('vendor.storeekp');
    Route::get('/formsupplierkertas', [VendorController::class, 'createpp'])->name('vendor.pp');
});

Route::middleware('auth')->group(function () {
    Route::get('/showdetailpo/{id}', [MaterialrequestController::class, 'showidpo'])->name('mr.idpo');
    Route::resource('/vendor', VendorController::class);
    Route::post('/vendor', [VendorController::class, 'store'])->name('vendor.store');
        Route::get('/formmr/{id}', [MaterialrequestController::class, 'showdetailmr'])->name('mr.showdetail');
});

Route::middleware(['auth', 'roles:vendorekp'])->group(function () {
    Route::post('/vendorekspedisi', [VendorController::class, 'storeekp'])->name('vendor.storeekp');
    Route::get('/vendor/{id}/pricelist', [VendorController::class, 'editekp'])->name('vendor.editekp');
    Route::get('/formsupplierekspedisi', [VendorController::class, 'createekp'])->name('vendor.ekp');
});


Route::middleware(['auth', 'roles:purchasing'])->group(function () {
    Route::get('/export', [PurchasingController::class, 'export']);
    Route::get('/inventorylist', [InventoryController::class, 'indexitem']);
    Route::resource('/arrivalpurchasing', ArrivalpurchasingController::class);
    Route::put('/arrivalpurchasing/updatestatus/{id}', [ArrivalpurchasingController::class, 'updatestatus'])->name('arrivalpurchasing.updatestatus');
    Route::resource('/inventory', InventoryController::class);
    Route::resource('/withdraw', InventorywithdrawController::class);
    Route::get('/withdraw/update-status/{id}', [InventorywithdrawController::class, 'updateStatus'])->name('withdrawpurchasing.updateStatus');
    Route::get('/purchasing/mrdetail/{id}', [MaterialrequestController::class, 'showpo'])->name('show.po');
    Route::get('/purchasing/mrdetailwaiting/{id}', [MaterialrequestController::class, 'shownopo'])->name('show.nopo');
    Route::resource('/purchasing/purchaseorder', PurchasingController::class);
    Route::put('/purchasing/update-status/{id}', [MaterialrequestController::class, 'updateStatus'])->name('mr.updateStatus');
    Route::resource('/purchasing/mr', MaterialrequestController::class);
    Route::resource('/purchasing/supplier', SupplierController::class);
    Route::resource('/purchasing/pricelist', PricelistController::class);
    Route::get('/purchasing/purchaseorder/{id}', [PurchasingController::class, 'showdetail'])->name('purchaseorder. showdetail');
    Route::get('/purchasing/createpo', [SearchController::class, 'form'])->name('search.form');
    Route::get('/searchpo', [SearchController::class, 'search'])->name('search');
    // Route::get('/chat/{materialrequestId}', [ChatController::class, 'getChat'])->name('chat.get');
    // Route::post('/chat', [ChatController::class, 'store'])->name('chat.store');
    Route::get('/purchasing/dashboard', function () {
        return view('role.purchasing.dashboard');
    });
});
Route::get('/material-request/{id}/chats', [ChatController::class, 'getChats']);
// Route untuk menyimpan data chat
Route::post('/material-request/{id}/chats', [ChatController::class, 'saveChat']);

    Route::put('/update-status/{id}', [MaterialrequestController::class, 'updateStatus'])->name('update_status');
    Route::put('/update-statuspurchasing/{id}', [PurchasingController::class, 'updateStatus'])->name('update_statuspurchasing');
    
Route::middleware(['auth', 'roles:ceo'])->group(function () {

    Route::get('/ceo/dashboard', function () {
        return view('role.purchasing.dashboardceo');
    });
    Route::resource('/ceo/listpo', PurchasingceoController::class);
    Route::resource('/ceo/materialrequest', MrceoController::class);
    Route::get('/ceo/chat/{materialrequestId}', [ChatceoController::class, 'getChat'])->name('chat.get');
    Route::post('/ceo/chat', [ChatceoController::class, 'store'])->name('chat.store');
    Route::put('/ceo/update-status/{id}', [MrceoController::class, 'updateStatus'])->name('update_statusceo');
});


Route::middleware(['auth', 'roles:kadept'])->group(function () {
    Route::post('/arrivalpokadept/{id}', [ArrivalkadeptController::class, 'update']);
    Route::resource('/arrivalpokadept', ArrivalkadeptController::class);
    Route::resource('/purchaseorderkadept', PurchaseorderkadeptController::class);
    Route::resource('/karyawannonstaff', KaryawankadeptController::class);
    Route::resource('/staffkadept', KaryawanstaffkadeptController::class);
    Route::resource('/kadeptsplstaff', LemburstaffkadeptController::class);
    Route::resource('/lemburkadept', LemburkadeptController::class);
    Route::get('/approvespl', [LemburkadeptController::class, 'indexapprove']);
    Route::get('/splkadeptnonstaff', [LemburkadeptController::class, 'index1']);
    Route::get('/staffsplstaff', [LemburstaffkadeptController::class, 'index1']);
    Route::get('/splstaffapprove', [LemburstaffkadeptController::class, 'indexapprove']);
    Route::get('/inventorylistkadept', [InventorykadeptController::class, 'indexitem']);
    Route::resource('/inventorykadept', InventorykadeptController::class);
    Route::resource('/withdrawkadept', InventorykadeptwithdrawController::class);
    Route::get('/withdrawkadept/update-status/{id}', [InventorykadeptwithdrawController::class, 'updateStatus'])->name('withdrawkadept.updateStatus');
    Route::get('/kadept/dashboard', function () {
        return view('role.purchasing.dashboardkadept');
    });
    Route::resource('/kadept/kadeptmr', KadeptController::class);
    Route::put('/kadept/update-status/{id}', [KadeptController::class, 'updateStatuskadept'])->name('update_statuskadept');
    
      Route::put('/lemburkadept/update-status/{id}', [LemburkadeptController::class, 'updateStatuskadept'])->name('updateStatusKadept');
});
      Route::put('/lemburstaffkadept/update-status/{id}', [LemburstaffkadeptController::class, 'updateStatusstaffkadept'])->name('updateStatusstaffkadept');



Route::middleware(['auth', 'roles:user'])->group(function () {
    Route::resource('/spluser', UserLemburController::class);
     Route::get('/user/dashboard', function () {
        return view('role.purchasing.dashboarduser');
    });
    Route::resource('/inventoryuser', InventoryuserController::class);
    Route::resource('/withdrawuser', InventoryuserwithdrawController::class);
    Route::get('/withdrawuser/update-status/{id}', [InventoryuserwithdrawController::class, 'updateStatus'])->name('withdraw.updateStatus');
});

    Route::put('/nonstaffspl/update-status/{id}', [LemburController::class, 'updateStatusdepthrd'])->name('updateStatusdepthrd');
    
    
    
Route::middleware(['auth', 'roles:dept'])->group(function () {
    Route::get('/approvesplnonstaff', [LemburController::class, 'indexapprove']);
    Route::resource('splstaff', LemburstaffController::class);
    Route::resource('lembur', LemburController::class);
    Route::resource('karyawan', KaryawanController::class);
    Route::resource('staff', KaryawanstaffController::class);
    Route::get('/listlemburhrd', [LemburstaffController::class, 'index1']);
    Route::get('/nonstaffspl', [LemburController::class, 'index1']);
    
    Route::get('/inventorylistdept', [InventorydeptController::class, 'indexitem']);
    Route::resource('/inventorydept', InventorydeptController::class);
    Route::resource('/purchaseorderdept', PurchaseorderdeptController::class);
    Route::resource('/withdrawdept', InventorydeptwithdrawController::class);
    Route::get('/withdrawdept/update-status/{id}', [InventorydeptwithdrawController::class, 'updateStatus'])->name('withdrawdept.updateStatus');
    Route::get('/dept/dashboard', function () {
        return view('role.purchasing.dashboarddept');
    });
    Route::resource('/dept/deptmr', DeptController::class);
    Route::post('/arrivalpo/{id}', [ArrivalController::class, 'update']);
    Route::resource('/arrivalpo', ArrivalController::class);
});



    Route::resource('/withdrawmgr', InventorymanagerwithdrawController::class);

Route::middleware(['auth', 'roles:manager'])->group(function () {
    Route::get('/tendermgr/byref/{referensi}', [TendermgrController::class, 'showByNomerRef'])->name('tendermgr.byref');
    Route::resource('manager/tendermgr', TendermgrController::class);
    Route::resource('/mgrarrival', ArrivalmanagerController::class);
    Route::resource('/staffspl', LemburstaffmanagerController::class);
    Route::resource('/splnonstaff', LemburmanagerController::class);
    Route::resource('/staffmgr', KaryawanstaffmanagerController::class);
    Route::resource('/mgrkaryawan', KaryawanmanagerController::class);
    Route::resource('/manager/vendorlist', SupplierController::class);
    Route::resource('/manager/vendorpricelist', PricelistController::class);
    Route::get('/manager/vendorlist', [SupplierController::class, 'indexmanager']);
    Route::get('/manager/vendorpricelist', [PricelistController::class, 'indexmanager']);
    Route::get('/inventorylistmgr', [InventorymanagerController::class, 'indexitem']);
    Route::resource('/inventorymgr', InventorymanagerController::class);
    Route::get('/withdrawmgr/update-status/{id}', [InventorymanagerwithdrawController::class, 'updateStatus'])->name('withdrawmgr.updateStatus');
    Route::resource('/manager/material', ManagerController::class);
    Route::resource('/manager/purchase', PurchasingmanagerController::class);
    Route::get('/manager/material/{id}', [ManagerController::class, 'show'])->name('manager.showdetail');
    Route::get('/search', [ManagerController::class, 'search']);
    Route::get('/searchitem', [ManagerController::class, 'searchitem']);
    Route::get('/manager/chat/{materialrequestId}', [ChatmanagerController::class, 'getChat'])->name('chatmanager.get');
    Route::post('/manager/chat', [ChatmanagerController::class, 'store'])->name('chatmanager .store');
    Route::resource('/manager/sales', SalesmgrController::class);
    Route::put('/manager/update-statussc/{id}', [SalesmgrController::class, 'updateStatus'])->name('update_statussc');
    Route::get('/manager/printsc/{id}', [SalesmgrController::class, 'print'])->name('manager.print');
    Route::get('/manager/dashboard', [SalesmgrController::class, 'dashboard']);
    Route::resource('/manager/quotationmgr', QuotationmgrController::class);
    Route::get('/manager/printquotation/{id}', [QuotationmgrController::class, 'print'])->name('quotationmgr.print');
    Route::get('/manager/printscpo/{po}', [SalesmgrController::class, 'printpo'])->name('salesmgr.printpo');
    Route::resource('/manager/prodev', ProdevManagerController::class);
    Route::put('/update-statusmanager-job/{id}', [ProdevManagerController::class, 'updateStatusJobManager'])->name('updateStatusJobManager');
});
    Route::put('/update-statusmanager/{id}', [PurchasingmanagerController::class, 'updateStatus'])->name('update_statusmanager');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('role.purchasing.mr.livewire');
});
Route::get('/formpo', function () {
    return view('role.purchasing.formpo');
});

Route::middleware('auth')->group(function () {
    Route::get('/barcode/{id}', [PurchasingController::class, 'showbarcode'])->name('barcode.show');

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'roles:dept', 'departement:sales'])->group(function () {
    Route::post('import', [TenderController::class, 'import'])->name('tenders.import');
    Route::get('/tender/byref/{referensi}', [TenderController::class, 'showByNomerRef'])->name('tender.byref');
    Route::resource('sales/tender', TenderController::class);
    Route::resource('sales/quotation', QuotationController::class);
    Route::resource('sales/priceproduct', PriceproductController::class);
    Route::resource('sales/customer', CustomerController::class);
    Route::resource('sales/plant', PlantController::class);
    Route::resource('salesdept', SalesController::class);
    Route::resource('productsales', ProductsalesController::class);
    Route::resource('jobsales', JobSalesController::class);

    Route::get('/get-product-dataproduct/{product}', [QuotationController::class, 'getProduct']);
    Route::get('/sales/dashboard', [SalesController::class, 'dashboard']);
    Route::get('/get-customer-datacust/{kodecust}', [SalesController::class, 'getdatacust']);
    Route::get('/get-customer-dataplant/{plant}', [SalesController::class, 'getdataplant']);
    Route::get('/printsc/{id}', [SalesController::class, 'print'])->name('salesdept.print');
    Route::get('/printscpo/{po}', [SalesController::class, 'printpo'])->name('salesdept.printpo');
    Route::get('/quotationprint/{id}', [QuotationController::class, 'print'])->name('quotation.print');
    Route::get('/get-products-by-customer-and-product', [QuotationController::class, 'getProductsByCustomerAndProduct']);

});


Route::middleware(['auth', 'roles:dept', 'departement:Prodev'])->group(function () {
    Route::put('/prodev/update-statuslayout/{id}', [DesignController::class, 'updateStatusLayout'])->name('updateStatusLayout');
    Route::put('/prodev/update-statusdocket/{id}', [DesignController::class, 'updateStatusDocket'])->name('updateStatusDocket');
    Route::put('/prodev/update-filedesign/{id}', [DesignController::class, 'updateFileDesign'])->name('updateFileDesign');
    Route::resource('prodev/designnumber', DesignController::class);
    
    Route::put('/prodev/update-statuslayoutdocketnew/{id}', [DocketnewController::class, 'updateStatusLayout'])->name('updateStatusLayoutDocketnew');
    Route::put('/prodev/update-statusdocketnew/{id}', [DocketnewController::class, 'updateStatusDocket'])->name('updateStatusDocketnew');
    Route::put('/prodev/update-filedesigndocketnew/{id}', [DocketnewController::class, 'updateFileDesign'])->name('updateFileDesignDocketnew');
    Route::resource('prodev/docketnew', DocketnewController::class);
    
    Route::resource('prodev/packaging', PackagingController::class);
    Route::resource('prodev/boxes', BoxController::class);
    Route::resource('prodev/job', ProdevController::class);
    Route::get('/prodev/scjob', [ProdevController::class, 'indexscjob']);
    Route::get('/prodev/create/{id}/{index}', [ProdevController::class, 'createshowsc'])->name('job.createshowsc');
    Route::put('/prodev/create/{id}/{index}',  [ProdevController::class, 'updateShowSc'])->name('updateShowSc');
    Route::get('/prodev/listjob', [ProdevController::class, 'jobindex'])->name("job.jobindex");
    Route::get('/prodev/dashboard', [ProdevController::class, 'dashboard']);
    Route::get('/printjob/{id}', [ProdevController::class, 'print'])->name('job.print');
    Route::get('/download-table', [ProdevController::class, 'downloadTable']);
});

    Route::get('/get-job-datapackaging/{pn}', [DesignController::class, 'getdatapackaging']);
    Route::get('/get-job-datadocket/{nodocket}', [DesignController::class, 'getdatadocket']);
    Route::get('/get-job-datadesign/{designno}', [ProdevController::class, 'getdatadesign']);
    Route::get('/get-customer-databox/{boxname}', [ProdevController::class, 'getdatabox']);

Route::middleware(['auth', 'roles:kadept', 'departement:Prodev'])->group(function () {
    
    Route::put('/kadeptprodev/update-statuslayoutdocketnew/{id}', [DocketnewKadeptController::class, 'updateStatusLayout'])->name('kadeptupdateStatusLayoutDocketnew');
    Route::put('/kadeptprodev/update-statusdocketnew/{id}', [DocketnewKadeptController::class, 'updateStatusDocket'])->name('kadeptupdateStatusDocketnew');
    Route::put('/kadeptprodev/update-filedesigndocketnew/{id}', [DocketnewKadeptController::class, 'updateFileDesign'])->name('kadeptupdateFileDesignDocketnew');
    Route::resource('kadeptprodev/kadeptdocketnew', DocketnewKadeptController::class);
    
    
    Route::put('/kadeptprodev/update-statuslayout/{id}', [DesignKadeptController::class, 'updateStatusLayout'])->name('kadeptupdateStatusLayout');
    Route::put('/kadeptprodev/update-statusdocket/{id}', [DesignKadeptController::class, 'updateStatusDocket'])->name('kadeptupdateStatusDocket');
    Route::put('/kadeptprodev/update-filedesign/{id}', [DesignKadeptController::class, 'updateFileDesign'])->name('kadeptupdateFileDesign');
    Route::resource('kadeptprodev/kadeptdesignnumber', DesignKadeptController::class);
    
    Route::resource('kadeptprodev/kadeptdocket', DocketKadeptController::class);
    Route::resource('kadeptprodev/kadeptpackaging', PackagingKadeptController::class);
    Route::resource('kadeptprodev/kadeptboxes', BoxKadeptController::class);
    Route::resource('kadeptprodev/kadeptjob', ProdevKadeptController::class);
    Route::get('/kadeptprodev/create/{id}/{index}', [ProdevKadeptController::class, 'createshowsc'])->name('kadeptjob.createshowsc');
    Route::put('/kadeptprodev/create/{id}/{index}', [ProdevKadeptController::class, 'updateShowSc'])->name('kadeptsalesjob.update');
    Route::get('/kadeptprodev/kadeptlistjob', [ProdevKadeptController::class, 'jobindex'])->name("kadeptjob.jobindex");
    Route::get('/kadeptprodev/scjob', [ProdevKadeptController::class, 'indexscjob']);
    Route::get('/get-job-datadesignkadept/{designno}', [ProdevKadeptController::class, 'kadeptgetdatadesign']);
    Route::get('/get-customer-databoxkadept/{boxname}', [ProdevKadeptController::class, 'kadeptgetdatabox']);
    Route::get('/kadeptprodev/dashboard', [ProdevKadeptController::class, 'dashboard']);
    Route::get('/kadeptprintjob/{id}', [ProdevKadeptController::class, 'print'])->name('kadeptjob.print');
    Route::get('/get-job-datapackagingkadept/{pn}', [DesignKadeptController::class, 'kadeptgetdatapackaging']);
    Route::get('/get-job-datadocketkadept/{nodocket}', [DesignKadeptController::class, 'kadeptgetdatadocket']);
    Route::put('/update-status-job/{id}', [ProdevKadeptController::class, 'updateStatusJob'])->name('updateStatusJob');
    Route::put('/update-reqedit-job/{id}', [ProdevKadeptController::class, 'reqEditJob'])->name('reqEditJob');
    Route::get('/download-tablejobkadept', [ProdevKadeptController::class, 'downloadTable']);
});

Route::middleware(['auth', 'roles:dept', 'departement:Design'])->group(function () {
    Route::resource('design/designrequest', DesignrequestController::class);
    Route::put('/design/update-status/{id}', [DesignrequestController::class, 'updateStatus'])->name('updateStatusDesign');

});

Route::middleware(['auth', 'roles:kadept', 'departement:Design'])->group(function () {
    Route::resource('designkadept/designrequestkadept', DesignrequestkadeptController::class);
    Route::put('/design/kadeptupdate-status/{id}', [DesignrequestkadeptController::class, 'updateStatus'])->name('updateStatusDesignKadept');
    Route::put('/design/kadeptupdate-layout/{id}', [DesignrequestkadeptController::class, 'updateLayout'])->name('updateLayoutKadept');
    Route::get('/design/preview/{filelayout}', [DesignrequestkadeptController::class, 'showpdf'])->name('showpdf');

});

Route::middleware(['auth','roles:kadept','departement:FA & TAX'])->group(function(){
    
    Route::resource('financekadept/job',FinanceJobKadeptController::class);
    Route::get('/download-tablekadept',[FinanceJobKadeptController::class,'downloadTable']);
});

Route::middleware(['auth','roles:dept','departement:FA & TAX'])->group(function(){
    Route::resource('finance/job',FinanceJobController::class);
    Route::get('/download-tabledept',[FinanceJobController::class,'downloadTable']);
    
});


require __DIR__ . '/auth.php';
