<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IceCreamController;
use App\Http\Controllers\OrderController;
use App\Models\IceCream;
use App\Livewire\Reports\Index as ReportIndex;
use App\Livewire\Reports\Create as ReportCreate;
use App\Livewire\Reports\Show as ReportShow;

Route::view('/', 'welcome');

// Dashboard
Route::get('/dashboard', function () {
    $totalIceCream = IceCream::count();
    return view('dashboard', compact('totalIceCream'));
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile
Route::view('profile', 'profile')->middleware(['auth'])->name('profile');

// Ice Cream Routes
Route::middleware(['auth'])->group(function () {
    Route::resource('icecreams', IceCreamController::class);

    // Order-related routes (under 'icorder')
    Route::get('/icorder', [IceCreamController::class, 'order'])->name('icorder.order');
    Route::post('/order', [OrderController::class, 'store'])->name('icorder.store');
    Route::get('/order/confirmation', [OrderController::class, 'confirmation'])->name('icorder.confirmation');
    Route::get('/order/view', [OrderController::class, 'viewOrders'])->name('icorder.view');
    Route::post('/orders/{orderId}/pay', [OrderController::class, 'markAsPaid'])->name('icorder.pay');
    Route::post('/order/pay/{id}', [OrderController::class, 'processPayment'])->name('order.processPayment');
    Route::post('/order/pay/{orderId}', [OrderController::class, 'processPaymentAjax'])->name('order.pay.ajax');
});

// Reports (Livewire)
Route::middleware(['auth'])->prefix('reports')->name('reports.')->group(function () {
    Route::get('/', ReportIndex::class)->name('index');
    Route::get('/create', ReportCreate::class)->name('create');
    Route::get('/{report}', ReportShow::class)->name('show'); // Optional, if used
});

require __DIR__.'/auth.php';
