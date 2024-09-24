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


use App\Http\Controllers\Sales\PlantController;
use App\Http\Controllers\Sales\SalesController;
use App\Http\Controllers\Sales\PriceproductController;
use App\Http\Controllers\Prodev\BoxController;
use App\Http\Controllers\Prodev\ProdevController;
use App\Http\Controllers\Sales\CustomerController;
use App\Http\Controllers\Sales\ProductsalesController;

use App\Http\Controllers\Sales\Manager\SalesmgrController;


use App\Http\Controllers\Hrd\Manager\KaryawanmanagerController;
use App\Http\Controllers\Hrd\Manager\KaryawanstaffmanagerController;
use App\Http\Controllers\Hrd\Manager\LemburmanagerController;
use App\Http\Controllers\Hrd\Manager\LemburstaffmanagerController;

use App\Http\Controllers\Hrd\Kadept\KaryawankadeptController;
use App\Http\Controllers\Hrd\Kadept\LemburkadeptController;
use App\Http\Controllers\Hrd\Kadept\KaryawanstaffkadeptController;
use App\Http\Controllers\Hrd\Kadept\LemburstaffkadeptController;
use App\Http\Controllers\User\UserLemburController;

use App\Http\Controllers\Hrd\Dept\LemburController;
use App\Http\Controllers\Hrd\Dept\KaryawanController;
use App\Http\Controllers\Hrd\Dept\LemburstaffController;
use App\Http\Controllers\Hrd\Dept\KaryawanstaffController;
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
    Route::resource('sales/priceproduct', PriceproductController::class);
    Route::resource('sales/customer', CustomerController::class);
    Route::resource('sales/plant', PlantController::class);
    Route::resource('salesdept', SalesController::class);
    Route::resource('productsales', ProductsalesController::class);
    Route::get('/sales/dashboard', [SalesController::class, 'dashboard']);
    Route::get('/get-customer-datacust/{kodecust}', [SalesController::class, 'getdatacust']);
    Route::get('/get-customer-dataplant/{plant}', [SalesController::class, 'getdataplant']);
    Route::get('/printsc/{id}', [SalesController::class, 'print'])->name('salesdept.print');
});


Route::middleware(['auth', 'roles:dept', 'departement:prodev'])->group(function () {
    Route::resource('prodev/boxes', BoxController::class);
    Route::resource('prodev/job', ProdevController::class);
    Route::get('/prodev/create/{id}/{index}', [ProdevController::class, 'createshowsc'])->name('job.createshowsc');
    Route::get('/prodev/listjob', [ProdevController::class, 'jobindex'])->name("job.jobindex");
    Route::get('/get-customer-databox/{boxname}', [ProdevController::class, 'getdatabox']);
    Route::get('/prodev/dashboard', [ProdevController::class, 'dashboard']);
    Route::get('/printjob/{id}', [ProdevController::class, 'print'])->name('job.print');
});

require __DIR__ . '/auth.php';
