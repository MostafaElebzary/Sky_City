<?php

use App\Http\Controllers\Admin\RentContractController;
use App\Http\Controllers\Admin\SellContractController;
use App\Http\Controllers\Front\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::POST('/UserLogin', [\App\Http\Controllers\Admin\AdminController::class, 'login']);
Route::group(['middleware' => 'auth'], function () {


    Route::get('/', function () {
        return view('Admin.index');
    });
    Route::get('/Admin-Panel', function () {
        return view('Admin.index');
    });

//    Sell Contract
    Route::get('/sell-contracts', [SellContractController::class, 'index'])->middleware('can:sell-contracts');
    Route::get('/create-sell-contracts', [SellContractController::class, 'create'])->middleware('can:sell-contracts');
    Route::get('/owner_data', [SellContractController::class, 'owner_data']);
    Route::get('/client_data', [SellContractController::class, 'client_data']);
    Route::get('/ad_data', [SellContractController::class, 'ad_data']);
    Route::post('/sell-contract-store', [SellContractController::class, 'store']);
    Route::get('/sell-contract-show/{id}', [SellContractController::class, 'show'])->middleware('can:sell-contracts');
    Route::get('/Delete_contract', [SellContractController::class, 'delete']);
    Route::get('/contract_Search', [SellContractController::class, 'search']);
    Route::get('/client-sell-contracts/{id}', [SellContractController::class, 'ClientContract'])->middleware('can:sell-contracts');
    Route::get('/owner-sell-contracts/{id}', [SellContractController::class, 'OwnerContract'])->middleware('can:sell-contracts');


//    Rent Contract
    Route::get('/rent-contracts', [RentContractController::class, 'index'])->middleware('can:rent-contracts');
    Route::get('/create-rent-contracts', [RentContractController::class, 'create'])->middleware('can:rent-contracts');
    Route::get('/rent_owner_data', [RentContractController::class, 'owner_data']);
    Route::get('/rent_client_data', [RentContractController::class, 'client_data']);
    Route::get('/rent_ad_data', [RentContractController::class, 'ad_data']);
    Route::post('/rent-contract-store', [RentContractController::class, 'store']);
    Route::get('/rent-contract-show/{id}', [RentContractController::class, 'show'])->middleware('can:rent-contracts');
    Route::get('/Delete_rent_contract', [RentContractController::class, 'delete']);
    Route::get('/rent_contract_Search', [RentContractController::class, 'search']);
    Route::get('/client-rent-contracts/{id}', [RentContractController::class, 'ClientContract'])->middleware('can:rent-contracts');
    Route::get('/owner-rent-contracts/{id}', [RentContractController::class, 'OwnerContract'])->middleware('can:rent-contracts');

    //  Out  Rent Contract
    Route::get('/Outrent-contracts', [RentContractController::class, 'index2'])->middleware('can:rent-contracts');


//    end Sell Contract
    Route::get('/Categories', [\App\Http\Controllers\Admin\CategoryController::class, 'index'])->middleware('can:Categories');
    Route::get('/CategoriesSearch', [\App\Http\Controllers\Admin\CategoryController::class, 'Search']);
    Route::get('/Edit_Categories', [\App\Http\Controllers\Admin\CategoryController::class, 'edit']);
    Route::post('/Create_Categories', [\App\Http\Controllers\Admin\CategoryController::class, 'store']);
    Route::get('/Delete_Categories', [\App\Http\Controllers\Admin\CategoryController::class, 'delete']);
    Route::post('/Update_Catgories', [\App\Http\Controllers\Admin\CategoryController::class, 'update']);


    Route::get('/SubCategory/{id}', [\App\Http\Controllers\Admin\SubCategoryController::class, 'index'])->middleware('can:Categories');
    Route::get('/SubCategorySearch', [\App\Http\Controllers\Admin\SubCategoryController::class, 'Search']);
    Route::get('/Edit_SubCategory', [\App\Http\Controllers\Admin\SubCategoryController::class, 'edit']);
    Route::post('/Create_SubCategory', [\App\Http\Controllers\Admin\SubCategoryController::class, 'store']);
    Route::get('/Delete_SubCategory', [\App\Http\Controllers\Admin\SubCategoryController::class, 'delete']);
    Route::post('/Update_SubCategory', [\App\Http\Controllers\Admin\SubCategoryController::class, 'update']);
//    Receipt_type
    Route::get('/ReceiptType', [\App\Http\Controllers\Admin\ReceiptTypeController::class, 'index'])->middleware('can:ReceiptType');
    Route::post('/create-ReceiptType', [\App\Http\Controllers\Admin\ReceiptTypeController::class, 'store']);
    Route::get('/edit-ReceiptType', [\App\Http\Controllers\Admin\ReceiptTypeController::class, 'edit']);
    Route::post('/update-ReceiptType', [\App\Http\Controllers\Admin\ReceiptTypeController::class, 'update']);
    Route::get('/delete-ReceiptType', [\App\Http\Controllers\Admin\ReceiptTypeController::class, 'delete']);


//    cities
    Route::get('/Cities', [\App\Http\Controllers\Admin\CityController::class, 'index'])->middleware('can:Cities');
    Route::post('/create-city', [\App\Http\Controllers\Admin\CityController::class, 'store']);
    Route::get('/edit-city  ', [\App\Http\Controllers\Admin\CityController::class, 'edit']);
    Route::post('/update-city', [\App\Http\Controllers\Admin\CityController::class, 'update']);
    Route::get('/delete-city', [\App\Http\Controllers\Admin\CityController::class, 'delete']);

//    invoices
    Route::get('/invoices', [\App\Http\Controllers\Admin\InvoiceController::class, 'index'])->middleware('can:Cities');
    Route::post('/create-invoices', [\App\Http\Controllers\Admin\InvoiceController::class, 'store']);
    Route::get('/show-invoices/{id}', [\App\Http\Controllers\Admin\InvoiceController::class, 'show']);
    Route::get('/delete-invoices', [\App\Http\Controllers\Admin\InvoiceController::class, 'update']);

//    districts
    Route::get('/District', [\App\Http\Controllers\Admin\DistrictController::class, 'index'])->middleware('can:District');
    Route::post('/create-district', [\App\Http\Controllers\Admin\DistrictController::class, 'store']);
    Route::get('/edit-district', [\App\Http\Controllers\Admin\DistrictController::class, 'edit']);;
    Route::post('/update-district', [\App\Http\Controllers\Admin\DistrictController::class, 'update']);
    Route::get('/delete-district', [\App\Http\Controllers\Admin\DistrictController::class, 'delete']);

//admins

    Route::get('/Admins', [\App\Http\Controllers\Admin\AdminController::class, 'index'])
        ->middleware('can:Admins')
    ;
    Route::get('/AdminsSearch', [\App\Http\Controllers\Admin\AdminController::class, 'search']);
    Route::get('/Edit_Admins', [\App\Http\Controllers\Admin\AdminController::class, 'edit']);
    Route::get('/UpdateStatusAdmin', [\App\Http\Controllers\Admin\AdminController::class, 'UpdateStatusUser']);
    Route::get('/Profile', [\App\Http\Controllers\Admin\AdminController::class, 'Profile']);
    Route::post('/Update_Profile', [\App\Http\Controllers\Admin\AdminController::class, 'Update_Profile']);

    Route::post('/Create_Admins', [\App\Http\Controllers\Admin\AdminController::class, 'store']);
    Route::get('/Delete_Admins', [\App\Http\Controllers\Admin\AdminController::class, 'delete']);
    Route::post('/Update_Admins', [\App\Http\Controllers\Admin\AdminController::class, 'update']);


//owners

    Route::get('/Owners', [\App\Http\Controllers\Admin\OwnerController::class, 'index'])->middleware('can:Owners');
    Route::get('/OwnersSearch', [\App\Http\Controllers\Admin\OwnerController::class, 'search']);
    Route::get('/Edit_Owners', [\App\Http\Controllers\Admin\OwnerController::class, 'edit']);
    Route::post('/Create_Owners', [\App\Http\Controllers\Admin\OwnerController::class, 'store']);
    Route::get('/Delete_Owners', [\App\Http\Controllers\Admin\OwnerController::class, 'delete']);
    Route::post('/Update_Owners', [\App\Http\Controllers\Admin\OwnerController::class, 'update']);

//Users

    Route::get('/Clients', [\App\Http\Controllers\Admin\ClientsController::class, 'index'])->middleware('can:Clients');
    Route::get('/ClientsSearch', [\App\Http\Controllers\Admin\ClientsController::class, 'search']);
    Route::get('/Edit_Clients', [\App\Http\Controllers\Admin\ClientsController::class, 'edit']);
    Route::post('/Create_Clients', [\App\Http\Controllers\Admin\ClientsController::class, 'store']);
    Route::get('/Delete_Clients', [\App\Http\Controllers\Admin\ClientsController::class, 'delete']);
    Route::post('/Update_Clients', [\App\Http\Controllers\Admin\ClientsController::class, 'update']);

//Sliders

    Route::get('/Sliders', [\App\Http\Controllers\Admin\SliderController::class, 'index'])->middleware('can:Sliders');
    Route::get('/SlidersSearch', [\App\Http\Controllers\Admin\SliderController::class, 'search']);
    Route::get('/Edit_Sliders', [\App\Http\Controllers\Admin\SliderController::class, 'edit']);
    Route::post('/Create_Sliders', [\App\Http\Controllers\Admin\SliderController::class, 'store']);
    Route::get('/Delete_Sliders', [\App\Http\Controllers\Admin\SliderController::class, 'delete']);
    Route::post('/Update_Sliders', [\App\Http\Controllers\Admin\SliderController::class, 'update']);

//faq

    Route::get('/faq', [\App\Http\Controllers\Admin\FaqController::class, 'index']);
    Route::get('/faqSearch', [\App\Http\Controllers\Admin\FaqController::class, 'search']);
    Route::get('/Edit_faq', [\App\Http\Controllers\Admin\FaqController::class, 'edit']);
    Route::post('/Create_faq', [\App\Http\Controllers\Admin\FaqController::class, 'store']);
    Route::get('/Delete_faq', [\App\Http\Controllers\Admin\FaqController::class, 'delete']);
    Route::post('/Update_faq', [\App\Http\Controllers\Admin\FaqController::class, 'update']);

//settings

    Route::post('/Update_Setting', [\App\Http\Controllers\Admin\SettingController::class, 'update']);
    Route::get('/setting', [\App\Http\Controllers\Admin\SettingController::class, 'index'])->middleware('can:setting');

//    Advertising
    Route::get('/Advertising_datatable', [\App\Http\Controllers\Admin\AdvertisingController::class, 'datatable'])->name('Advertising.datatable.data')->middleware('can:Advertising');
    Route::get('/Advertising', [\App\Http\Controllers\Admin\AdvertisingController::class, 'index'])->middleware('can:Advertising');
    Route::get('/AdvLogs/{id}', [\App\Http\Controllers\Admin\AdvertisingController::class, 'AdvLogs'])->middleware('can:Advertising');

    Route::get('/AdvertisingSearch', [\App\Http\Controllers\Admin\AdvertisingController::class, 'Search']);
    Route::get('/Edit_Advertising/{id}', [\App\Http\Controllers\Admin\AdvertisingController::class, 'edit']);
    Route::post('/Create_Advertising', [\App\Http\Controllers\Admin\AdvertisingController::class, 'store']);
    Route::get('/Delete_Advertising', [\App\Http\Controllers\Admin\AdvertisingController::class, 'delete']);
    Route::post('/Update_Advertising', [\App\Http\Controllers\Admin\AdvertisingController::class, 'update']);
    Route::get('/UpdateStatusAdvertising', [\App\Http\Controllers\Admin\AdvertisingController::class, 'UpdateStatusAdvertising']);
    Route::get('/UpdateFavoriteAdvertising', [\App\Http\Controllers\Admin\AdvertisingController::class, 'UpdateFavoriteAdvertising']);

    Route::get('/Advertising/{id}', [\App\Http\Controllers\Admin\AdvertisingController::class, 'index2']);
    Route::get('/owner-Advertising/{id}', [\App\Http\Controllers\Admin\AdvertisingController::class, 'index3']);


    Route::get('/AdvertisingImages/{id}', [\App\Http\Controllers\Admin\AdvertisingImagesController::class, 'ProductsImages']);
    Route::get('/Edit_ProductsImages', [\App\Http\Controllers\Admin\AdvertisingImagesController::class, 'Edit_ProductsImages']);
    Route::post('/Create_ProductsImages', [\App\Http\Controllers\Admin\AdvertisingImagesController::class, 'Create_ProductsImages']);
    Route::get('/Delete_ProductsImages', [\App\Http\Controllers\Admin\AdvertisingImagesController::class, 'Delete_ProductsImages']);
    Route::post('/Update_ProductsImages', [\App\Http\Controllers\Admin\AdvertisingImagesController::class, 'Update_ProductsImages']);

    Route::get('/Contact', [\App\Http\Controllers\Admin\ContactController::class, 'index'])->middleware('can:Contact');
    Route::get('/Contact/{id}', [\App\Http\Controllers\Admin\ContactController::class, 'index2'])->middleware('can:Contact');
    Route::get('/Show_contact', [\App\Http\Controllers\Admin\ContactController::class, 'edit']);
    Route::get('/Delete_Contact', [\App\Http\Controllers\Admin\ContactController::class, 'delete']);


    Route::get('out/Contact', [\App\Http\Controllers\Admin\OutContactController::class, 'index']);
    Route::get('out/Contact/{id}', [\App\Http\Controllers\Admin\OutContactController::class, 'index2']);
    Route::get('out/Show_contact', [\App\Http\Controllers\Admin\OutContactController::class, 'edit']);
    Route::get('out/Delete_Contact', [\App\Http\Controllers\Admin\OutContactController::class, 'delete']);



    Route::get('/Reviews', [\App\Http\Controllers\Admin\ReviewsController::class, 'index']);
    Route::get('/Delete_Reviews', [\App\Http\Controllers\Admin\ReviewsController::class, 'delete']);
    Route::get('/logout', [\App\Http\Controllers\Admin\AdminController::class, 'logout']);

//owners

    Route::get('/Agents', [\App\Http\Controllers\Admin\AgentsController::class, 'index']);
    Route::get('/AgentsSearch', [\App\Http\Controllers\Admin\AgentsController::class, 'search']);
    Route::get('/Edit_Agents', [\App\Http\Controllers\Admin\AgentsController::class, 'edit']);
    Route::post('/Create_Agents', [\App\Http\Controllers\Admin\AgentsController::class, 'store']);
    Route::get('/Delete_Agents', [\App\Http\Controllers\Admin\AgentsController::class, 'delete']);
    Route::post('/Update_Agents', [\App\Http\Controllers\Admin\AgentsController::class, 'update']);


//    Receipt

    Route::get('/Reciepts', [\App\Http\Controllers\Admin\ReceiptController::class, 'index2'])->middleware('can:Reciepts');
    Route::get('/receipt/{id}', [\App\Http\Controllers\Admin\ReceiptController::class, 'index'])->middleware('can:Reciepts');
    Route::get('/view/{id}', [\App\Http\Controllers\Admin\ReceiptController::class, 'view'])->middleware('can:Reciepts');
    Route::get('/printReceipt/{id}', [\App\Http\Controllers\Admin\ReceiptController::class, 'printReceipt']);
    Route::get('/ReceiptSearch', [\App\Http\Controllers\Admin\ReceiptController::class, 'search']);
    Route::get('/Edit_Receipt', [\App\Http\Controllers\Admin\ReceiptController::class, 'edit']);
    Route::post('/Create_Receipt', [\App\Http\Controllers\Admin\ReceiptController::class, 'store']);
    Route::get('/Delete_Receipt', [\App\Http\Controllers\Admin\ReceiptController::class, 'delete']);
    Route::post('/Update_Receipt', [\App\Http\Controllers\Admin\ReceiptController::class, 'update']);

    //    roles
    Route::get('/roles', [\App\Http\Controllers\Admin\RolesController::class, 'index'])->middleware('can:roles');
    Route::post('/roles/store', [\App\Http\Controllers\Admin\RolesController::class, 'store'])->name('roles.store');
    Route::get('/roles/edit', [\App\Http\Controllers\Admin\RolesController::class, 'edit'])->name('roles.edit');
    Route::post('/roles/update_permission', [\App\Http\Controllers\Admin\RolesController::class, 'update'])->name('roles.update_permission');
    Route::get('/role/delete', [\App\Http\Controllers\Admin\RolesController::class, 'delete'])->name('roles.delete_role');


});


Route::get('/logout', [\App\Http\Controllers\Admin\AdminController::class, 'logout']);


Route::get('lang/{lang}', function ($lang) {


    if (session()->has('lang')) {
        session()->forget('lang');
    }
    if ($lang == 'en') {
        session()->put('lang', 'en');
    } else {
        session()->put('lang', 'ar');
    }


    return back();
});
