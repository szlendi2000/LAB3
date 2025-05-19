<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use WhichBrowser\Parser;

Route::get('/user-agent', function (Request $request) {
    $parser = new Parser($request->header('User-Agent'));
    return [
        'browser' => $parser->browser->name,
        'os' => $parser->os->name,
    ];
});
Route::get('/', [PageController::class, 'home']);
Route::get('/kontakt', [PageController::class, 'kontakt']);
Route::get('/oferta', [PageController::class, 'oferta']);
Route::get('/logowanie', [PageController::class, 'logowanie']);
Route::middleware('auth')->get('/profil', [PageController::class, 'profil']);
Route::post('/kontakt', [PageController::class, 'kontaktFormSubmit']);
Route::redirect('/logowanie', '/login');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
