<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ExamenController;
use App\Http\Controllers\NotaController;

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

//Studenti
Route::get('/', [StudentController::class, 'index'])->name('/');
Route::get('/home', [StudentController::class, 'index'])->name('home');
Route::get('/studenti', [StudentController::class, 'index'])->name('studenti');
Route::get('/adaugare_student',[StudentController::class,'adaugare_student'])->name('adaugare_student');
Route::post('/adaugare_student',[StudentController::class,'store'])->name('adaugare_student');
Route::get('/p4', [StudentController::class, 'show_p4'])->name('P4');
Route::get('/p5', [StudentController::class, 'show_p5'])->name('P5');
Route::get('/p6', [StudentController::class, 'show_p6'])->name('P6');
Route::get('/p8', [StudentController::class, 'show_p8'])->name('P8');
Route::post('/p8', [StudentController::class, 'calculate_p8'])->name('P8');
Route::get('/p9', [StudentController::class, 'show_p9'])->name('P9');
Route::get('/p10', [StudentController::class, 'show_p10'])->name('P10');

//Note
Route::get('/adaugare_nota', [NotaController::class, 'adaugare_note'])->name('adaugare_nota');
Route::post('/adaugare_nota', [NotaController::class,'add'])->name('adaugare_nota');
Route::get('/note', [NotaController::class,'index'])->name('note');
Route::post('/note', [NotaController::class,'store'])->name('note');



Route::get('/examen', [App\Http\Controllers\ExamenController::class, 'index'])->name('examen');
Route::post('/examen',[App\Http\Controllers\ExamenController::class,'store'])->name('examen');

Route::get('/media', [App\Http\Controllers\MedieController::class, 'index'])->name('media');
Route::post('/disciplina',[App\Http\Controllers\DisciplinaController::class,'store'])->name('disciplina');

//disciplina
Route::get('/adaugare_disciplina',[App\Http\Controllers\DisciplinaController::class,'create'])->name('adaugare_disciplina');

//examen
Route::get('/adaugare_examen',[App\Http\Controllers\ExamenController::class,'create'])->name('adaugare_examen');
