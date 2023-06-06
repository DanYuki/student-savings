<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TransactionController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/student', [StudentController::class, 'index'])->middleware(['auth', 'verified'])->name('student.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/student/add', function() {
    return view('students/add');
})->middleware(['auth', 'verified'])->name('student.add');

Route::get('/student/show/{id}', [StudentController::class, 'show'])->middleware(['auth', 'verified'])->name('student.show');

Route::post('/student/store', [StudentController::class, 'store'])->middleware(['auth', 'verified'])->name('student.store');

Route::get('/transaction/add', [TransactionController::class, 'create'])->middleware(['auth', 'verified'])->name('transaction.add');
Route::post('/transaction/store', [TransactionController::class, 'store'])->middleware(['auth', 'verified'])->name('transaction.store');

// Route::get('/test', function() {
//     return Inertia::render(('Test'));
// })->middleware(['auth', 'verified'])->name('test');

route::get('/test', [StudentController::class, 'index'])->middleware(['auth', 'verified'])->name('test');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
