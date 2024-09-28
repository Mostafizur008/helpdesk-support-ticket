<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Admin\AdminController;
use App\Http\Controllers\Backend\User\UserController;


Route::redirect('/', '/login');

Route::group(['as' => 'backend.dashboard.', 'prefix' => 'backend/dashboard', 'middleware' => ['admin']], function () {

    Route::resource('admin', AdminController::class);

});

Route::middleware(['admin'])->group(function () {
    Route::get('admin/priority', [AdminController::class, 'indexPriority'])->name('priority');
    Route::post('admin/create-priority', [AdminController::class, 'storePriority'])->name('p.add');
    Route::post('admin/store-priority', [AdminController::class, 'pStore'])->name('p.store');
    Route::get('/admin/edit-priority/{id}',[AdminController::class,'pEdit'])->name('p.edit');
    Route::put('/admin/update-priority/{id}',[AdminController::class,'pUpdate'])->name('pt');
    Route::get('admin/delete-priority/{id}', [AdminController::class, 'destroy'])->name('p.delete');

    Route::get('admin/department', [AdminController::class, 'indexDepartment'])->name('department');
    Route::post('admin/create-department', [AdminController::class, 'storeDepartment'])->name('d.add');
    Route::post('admin/store-department', [AdminController::class, 'dStore'])->name('d.store');
    Route::get('/admin/edit-department/{id}',[AdminController::class,'dEdit'])->name('d.edit');
    Route::put('/admin/update-department/{id}',[AdminController::class,'dUpdate'])->name('dt');
    Route::get('admin/delete-department/{id}', [AdminController::class, 'destroy2'])->name('d.delete');

    Route::get('admin/ticket', [AdminController::class, 'indexTicket'])->name('am.ticket');
    Route::get('admin/reply-ticket', [AdminController::class, 'replyTicket'])->name('r.ticket');
    Route::get('admin/edit-reply/{id}', [AdminController::class, 'rEdit'])->name('r.edit');
    Route::put('/admin/update-reply/{id}',[AdminController::class,'rUpdate'])->name('rt');
    Route::post('admin/store-reply', [AdminController::class, 'rStore'])->name('r.store');

    Route::get('admin/close-ticket', [AdminController::class, 'indexCloseTicket'])->name('cl.ticket');

    Route::get('admin/setting', [AdminController::class, 'indexSetting'])->name('setting.update');
    Route::post('/update',[AdminController::class,'SettingUpdate'])->name('setting.updated');

    Route::get('admin/profile', [AdminController::class, 'indexProfile'])->name('profile.view_admin');
    Route::post('admin/update',[AdminController::class,'ProfileUpdate'])->name('profile.updated');

});



Route::group(['as' => 'backend.dashboard.', 'prefix' => 'backend/dashboard', 'middleware' => ['user']], function () {

    Route::resource('user', UserController::class);

});

Route::middleware(['user'])->group(function () {
    Route::get('user/ticket', [UserController::class, 'ticket'])->name('ticket');
    Route::get('user/open-ticket', [UserController::class, 'openTicket'])->name('open.ticket');
    Route::post('user/store-ticket', [UserController::class, 'storeTicket'])->name('store.ticket');
    Route::post('/user/update-reply/{id}',[UserController::class,'reUpdate'])->name('ret');

    Route::get('user/reply/{id}', [UserController::class, 'reEdit'])->name('reEdit');

    Route::get('user/profile', [UserController::class, 'indexProfile'])->name('profile.view');
    Route::post('user/update',[UserController::class,'ProfileUpdate'])->name('profile.updated');
});

require __DIR__.'/auth.php';
