<?php

use Illuminate\Http\Request;
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

// Route::get('/blog', function () {
//     return "bonjour";
// });

// // http://127.0.0.1:8000/blog?name=jhon
// Route::get('/blog', function () {
//     return [
//         "name" => $_GET['name'],
//         "Article" => "1 article"

//     ] ;
// });



// // http://127.0.0.1:8000/blog?name=jhon&age=9

// Route::get('/blog', function (Request $request) {
//     return [
//         "name" => $request->all(),
//         "Article" => "1 article"

//     ] ;
// });


// http://127.0.0.1:8000/blog/fdsfsf-1

// Route::get('/blog', function (Request $request) {
//     return [
//         "link" => \route('blog.show', ['slug' => 'article', 'id' => 13]),
//     ] ;
// })->name('blog.index');

// Route::get('/blog/{slug}/{id}', function (Request $request, string $slug, string $id) {
//     return [
//         "slug" => $slug,
//         "id" => $id,
//         "name" => $request->input('name'),
//     ];
// })->where([

//     'id' => '[0-9]+',
//     'slug' => '[a-z0-9\-]+'

// ])->name('blog.show');


Route::prefix('/blog')->name('blog.')->group(function (){
    
    Route::get('/', function (Request $request) {
        return [
            "link" => \route('blog.show', ['slug' => 'article', 'id' => 13]),
        ] ;
    })->name('index');
    
    Route::get('/{slug}/{id}', function (Request $request, string $slug, string $id) {
        return [
            "slug" => $slug,
            "id" => $id,
            "name" => $request->input('name'),
        ];
    })->where([
    
        'id' => '[0-9]+',
        'slug' => '[a-z0-9\-]+'
    
    ])->name('show');
});




