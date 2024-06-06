<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\LoginForm;
use App\Livewire\Admin\Cabinet as CabinetAdmin;
use App\Livewire\Accountant\Cabinet as CabinetAccountant;
use App\Livewire\Employee\Cabinet as CabinetEmployee;
use App\Livewire\Admin\MuseumList;
use App\Livewire\Admin\StaffList;
use App\Livewire\Accountant\DraftList;
use App\Livewire\Accountant\IncomeBookList;
use App\Livewire\Accountant\IncomeBookRecordList;
use App\Livewire\Accountant\InventoryBookList;
use App\Livewire\Accountant\InventoryBookRecordList;
use App\Livewire\Accountant\RegisterIncome;
use App\Livewire\Accountant\RegisterInventory;
use App\Livewire\Accountant\RegisterSpecial;
use App\Livewire\Accountant\SpecialBookList;
use App\Livewire\Accountant\SpecialBookRecordList;
use App\Livewire\Employee\Search;

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

//Auth::routes();
Route::get('/login', LoginForm::class)->name('login');
Route::get('/logout', LoginForm::class)->name('logout');

Route::middleware('auth')->group(function () {
    //Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

    Route::middleware('role:admin')->group(function () {
        Route::get('/cabinet/admin', CabinetAdmin::class)->name('cabinet-admin');
        Route::get('/cabinet/admin/museum-list', MuseumList::class)->name('admin-museum-list');
        Route::get('/cabinet/admin/staff-list', StaffList::class)->name('admin-staff-list');
        //Route::get('/cabinet/admin/museums', Museums::class)->name('admin-museums');
    });

    Route::middleware('role:accountant')->group(function () {
        Route::get('/cabinet/accountant', CabinetAccountant::class)->name('cabinet-accountant');

        Route::get('/cabinet/accountant/register-income', RegisterIncome::class)->name('register-income');
        Route::get('/cabinet/accountant/register-inventory', RegisterInventory::class)->name('register-inventory');
        Route::get('/cabinet/accountant/register-special', RegisterSpecial::class)->name('register-special');

        Route::get('/cabinet/accountant/draft-list', DraftList::class)->name('draft-list');

        Route::get('/cabinet/accountant/income-book-list', IncomeBookList::class)->name('income-book-list');
        Route::get('/cabinet/accountant/income-book-record-list', IncomeBookRecordList::class)->name('income-book-record-list');

        Route::get('/cabinet/accountant/inventory-book-list', InventoryBookList::class)->name('inventory-book-list');
        Route::get('/cabinet/accountant/inventory-book-record-list', InventoryBookRecordList::class)->name('inventory-book-record-list');

        Route::get('/cabinet/accountant/special-book-list', SpecialBookList::class)->name('special-book-list');
        Route::get('/cabinet/accountant/special-book-record-list', SpecialBookRecordList::class)->name('special-book-record-list');
    });

    Route::middleware('role:employee')->group(function () {
        Route::get('/cabinet/employee/', CabinetEmployee::class)->name('cabinet-employee');

        Route::get('/cabinet/employee/search', Search::class)->name('cabinet-employee-search');
    });
});


/**************************************/
/*********** Design *******************/
/**************************************/


Route::get('/income', function () {
    return view('design.income_register');
});

Route::get('/inventory', function () {
    return view('design.inventory_register');
});

Route::get('/special', function () {
    return view('design.special_register');
});

Route::get('/drafts', function () {
    return view('design.drafts');
});

Route::get('/income-list', function () {
    return view('design.income_list');
});
Route::get('/income-record', function () {
    return view('design.income_record');
});

Route::get('/inventory-list', function () {
    return view('design.inventory_record');
});
Route::get('/inventory-record', function () {
    return view('design.inventory_record');
});
Route::get('/inventory-tom', function () {
    return view('design.inventory_tom');
});
Route::get('/special-list', function () {
    return view('design.special_list');
});

Route::get('/storage-groups', function () {
    return view('design.storage_groups');
});


