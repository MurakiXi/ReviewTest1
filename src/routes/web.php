<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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

// routes/web.php
Route::get('/debug/contacts/confirm', function () {
    $contact = [
        'first_name'    => '太郎',
        'last_name'     => '山田',
        'name'          => '山田 太郎',
        'gender'        => '男性',
        'email'         => 'taro@example.com',
        'tel_first'     => '080',
        'tel_second'    => '1234',
        'tel_third'     => '5678',
        'tel'           => '080-1234-5678',
        'address'       => '東京都渋谷区千駄ヶ谷1-2-3',
        'building'      => '千駄ヶ谷マンション101',
        'category_id'   => 1,
        'category_name' => '商品の交換について',
        'content'       => "サンプルの\nお問い合わせ内容です。",
    ];
    return view('confirm', compact('contact'));
});


Route::get('/', [ContactController::class, 'index'])->name('index');
Route::post('/confirm', [ContactController::class, 'confirm'])->name('confirm');
Route::post('/contacts', [ContactController::class, 'store'])->name('store');
Route::get('/thanks', [ContactController::class, 'thanks'])->name('thanks');
