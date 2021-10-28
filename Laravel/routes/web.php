<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ExamenController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PagesController::class, 'index'])->name('/');

Route::get('/home', [PagesController::class, 'index'])->name('home');

Route::get('/add', [PagesController::class, 'index'])->name('add');

Route::get('/index', [PagesController::class, 'index'])->name('index');

//Route::get('/studenti', [StudentController::class, 'index'])->name('studenti');

Route::get('/studenti', [StudentController::class, 'index'])->name('studenti');
Route::post('/studenti', [StudentController::class, 'index'])->name('studenti');

//Route::resource('/studenti', StudentController::class)->name('studenti');

//Pattern
//Route::get('/studenti/{name}', [StudentController::class, 'show'])->name('student')->where('name', '[a-zA-Z]+(?: [a-zA-Z]+)?');

// Route::get('/studenti/{name}/{id}', 
// [StudentController::class, 'show'])->where([
//     'name' => '[a-zA-Z]+(?: [a-zA-Z]+)?',
//     'id' => '[0-9]+'
// ]);

// Route::get('/studenti/{id}', 
// [StudentController::class, 'show'])->where('name', '[0-9]+');

// Route::get('/examene', [ExamenController::class, 'index']);

Route::get('/examene', [ExamenController::class, 'index'])->name('examene');

//Route array
/*Route::get('/users', function(){
    return ['PHP', 'HTML', 'Laravel'];
});

//Route json
Route::get('/users', function () {
    return response()->json([
        'name' => 'Name',
        'course' => 'PBD'
    ]);
});

//Route fction
Route::get('/users', function () {
    return redirect('/');
});*/
