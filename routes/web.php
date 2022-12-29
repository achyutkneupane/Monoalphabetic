<?php

use App\Http\Livewire\Index;
use App\Models\MonoText;
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

Route::get('/', Index::class)->name('index');

Route::get('/test', function () {
    $text = new MonoText();
    $text->key = $text->generateUnicodeMap();
    return view('welcome', compact('text'));
});

Route::get('/all', function () {
    $plain = new MonoText();
    $plain->key = $plain->generateUnicodeMap();
    $plain->plain = "अच्युतAchyut";
    $plain->cipher = $plain->encryptAll();
    $plain->decrypted = $plain->decryptAll();
    dd($plain);
});
