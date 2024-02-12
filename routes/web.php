<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TestingController;
use App\Livewire\Dashboard\VehicleOwner;
use App\Livewire\Index;
use App\Livewire\VehicleOwner\VehiclePost\VehiclePostDelete;
use App\Livewire\VehicleOwner\VehiclePost\VehiclePostEdit;
use App\Livewire\VehicleOwner\VehiclePost\VehiclePostView;
use App\Models\VehiclePost;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// testing
Route::get('/data-tables-client-side', [TestingController::class, 'dataTablesClientSide'])->name('data-tables-client-side');
Route::get('/yajra-data-tables', [TestingController::class, 'yajraDataTables'])->name('yajra-data-tables');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', Index::class)->name('dashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/vehicle-post/view/{id}', VehiclePostView::class)->name('vehicle-post.view');
    Route::get('/vehicle-post/edit/{id}', VehiclePostEdit::class)->name('vehicle-post.edit');
    Route::delete('/vehicle-post/delete/{id}', VehiclePostDelete::class)->name('vehicle-post.delete');
});