<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ExamenController;
use App\Http\Controllers\AddInfoController;

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
/* 
Route::get('/', [PagesController::class, 'index'])->name('/');
Route::get('/home', [PagesController::class, 'index'])->name('home');
 

//Route::get('/add', [PagesController::class, 'index'])->name('add');

 
Route::get('/index', [PagesController::class, 'index'])->name('index');
//Route::get('/studenti', [StudentController::class, 'index'])->name('studenti');
Route::get('/studenti', [StudentController::class, 'index'])->name('studenti');
Route::post('/studenti', [StudentController::class, 'index'])->name('studenti');

Route::get('form/new', [AddInfoController::class, 'index'])->name('form/new');
Route::post('form/save', [AddInfoController::class, 'saveRecord'])->name('form/save');
 */
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

//Route::get('/examene', [ExamenController::class, 'index'])->name('examene');

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



//routes 

//for all
//Route::get('/',[App\Http\Controllers\MainController::class,'getDashboard'])->name('dashboard');


Route::get('/student', [App\Http\Controllers\StudentController::class, 'index'])->name('student');
Route::get('/nota', [App\Http\Controllers\NotaController::class, 'index'])->name('nota');
Route::get('/media', [App\Http\Controllers\MedieController::class, 'index'])->name('media');
Route::get('/examen', [App\Http\Controllers\ExamenController::class, 'index'])->name('examen');
Route::get('/p4', [App\Http\Controllers\P4Controller::class, 'index'])->name('P4');
Route::get('/p5', [App\Http\Controllers\P5Controller::class, 'index'])->name('P5');
Route::get('/p6', [App\Http\Controllers\P6Controller::class, 'index'])->name('P6');
Route::get('/p7', [App\Http\Controllers\StudentController::class, 'index'])->name('P7');
Route::get('/p8', [App\Http\Controllers\P8Controller::class, 'index'])->name('P8');
Route::get('/p9', [App\Http\Controllers\P9Controller::class, 'index'])->name('P9');
Route::get('/p10', [App\Http\Controllers\P10Controller::class, 'index'])->name('P10');

//studenti
Route::get('/adaugare_student',[App\Http\Controllers\StudentController::class,'create'])->name('adaugare_student');
Route::post('/student',[App\Http\Controllers\StudentController::class,'store'])->name('student');

//disciplina
Route::get('/adaugare_disciplina',[App\Http\Controllers\DisciplinaController::class,'create'])->name('adaugare_disciplina');
Route::post('/disciplina',[App\Http\Controllers\DisciplinaController::class,'store'])->name('disciplina');

//note
Route::get('/adaugare_nota',[App\Http\Controllers\NotaController::class,'create'])->name('adaugare_nota');
Route::post('/nota',[App\Http\Controllers\NotaController::class,'store'])->name('nota');

//examen
Route::get('/adaugare_examen',[App\Http\Controllers\ExamenController::class,'create'])->name('adaugare_examen');
Route::post('/examen',[App\Http\Controllers\ExamenController::class,'store'])->name('examen');

 