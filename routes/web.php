<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IceCreamController;
use App\Models\IceCream;
use App\Livewire\Reports\Index as ReportIndex;
use App\Livewire\Reports\Create as ReportCreate;
use App\Livewire\Reports\Show as ReportShow; // Only if you use a show view

Route::view('/', 'welcome');

Route::get('/dashboard', function () {
    $totalIceCream = IceCream::count();
    return view('dashboard', compact('totalIceCream'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::view('profile', 'profile')->middleware(['auth'])->name('profile');

// Ice Cream routes
Route::resource('icecreams', IceCreamController::class)->middleware(['auth']);

//Report Routes
Route::middleware(['auth'])->prefix('reports')->name('reports.')->group(function () {
    Route::get('/', ReportIndex::class)->name('index');
    Route::get('/create', ReportCreate::class)->name('create');
    Route::get('/{report}', ReportShow::class)->name('show'); // Optional, if you have a show component
});

require __DIR__.'/auth.php';
