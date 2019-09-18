<?php
use SebastianBergmann\Environment\Console;

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

// Route::get('storage/{filename}', function ($filename) {
//     $path = storage_path('app\public') . '\\Assert\\School\\' . $filename;
//     if (!File::exists($path)) {
//         abort(404);
//     }

//     $file = File::get($path);
//     //$type = File::mimeType($path);

//     $response = Response::make($file, 200);
//     $response->header("Content-Type", "application/octet-stream");

//     return $response;
// });

Route::get('storage/{filename}', function ($filename) {

    $path = storage_path('app\public') . '\\Assert\\'.explode('-', trim($filename))[0].'\\' . $filename;
    if (!File::exists($path)) {
        abort(404);
    }



    $file = File::get($path);
    //$type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", "application/octet-stream");

    return $response;
});

// Route::get('storage/{filename}', function ($filename) {
//     $path = storage_path('app\public') . '\\Assert\\NoticeBoard\\' . $filename;
//     if (!File::exists($path)) {
//         abort(404);
//     }

//     $file = File::get($path);
//     //$type = File::mimeType($path);

//     $response = Response::make($file, 200);
//     $response->header("Content-Type", "application/octet-stream");

//     return $response;
// });

Route::any('{all}', function () {
    return \File::get(public_path() . '/index.html');
})->where('all', '.*');
