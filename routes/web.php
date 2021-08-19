<?php

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

Route::get('/painel', function () {
    return redirect()->route('painel-login');
});


//rotas da api
Route::get('/curso/{id}', 'CourseController@show');
Route::get('/categoria/{category}', 'CategoryController@show');
Route::get('/categoria', 'CategoryController@showAll');
Route::get('/curso', 'CourseController@showAll');
Route::get('/turma/{classes}', 'ClassesController@show');
Route::get('/aluno/{id}', 'StudentController@showStudent');
Route::get('/aluno', 'StudentController@show');
//fim das rodas da api


//Auth::routes();
Route::get('/painel/login', function () {
    return view('painel.login');
})->name('painel-login');
Route::get('/painel/dashboard', 'Panel\DashboardController@show')->name('painel-dashboard');

//rotas de informações pertinente aos alunos
Route::get('/painel/alunos', 'Panel\StudentController@show')->name('painel-alunos');
Route::get('/painel/alunos/adicionar', 'Panel\StudentController@formAluno')->name('adicionar-aluno');
Route::post('/painel/alunos/cadastrar', 'Panel\StudentController@cadAluno')->name('cadastrar-aluno');
Route::put('/painel/alunos/atualiza/{student}', 'Panel\StudentController@updAluno')->name('atualiza-aluno');
Route::delete('/painel/alunos/excluir/{student}', 'Panel\StudentController@destroyAluno')->name('excluir-aluno');
Route::get('/painel/alunos/{id}', 'Panel\StudentController@infoAluno')->name('informacao-aluno');

//rotas de informações pertinente às matriculas
Route::get('/painel/alunos/matricula/adicionar/{student}', 'Panel\EnrollmentController@formMatricula')->name('adicionar-matricula');
Route::post('/painel/alunos/matricula/cadastrar', 'Panel\EnrollmentController@cadMatricula')->name('cadastrar-matricula');
Route::put('/painel/alunos/matricula/atualiza/{enrollment}', 'Panel\EnrollmentController@updMatricula')->name('atualiza-matricula');
Route::delete('/painel/alunos/matricula/excluir/{enrollment}', 'Panel\EnrollmentController@destroyMatricula')->name('excluir-matricula');
Route::get('/painel/alunos/matricula/{enrollment}', 'Panel\EnrollmentController@infoMatricula')->name('informacao-matricula');

//rotas de informações pertinantes às assinaturas
Route::get('/painel/alunos/assinatura/adicionar/{student}', 'Panel\SubscriptionController@formAssinatura')->name('adicionar-assinatura');
Route::post('/painel/alunos/assinatura/cadastrar', 'Panel\SubscriptionController@cadAssinatura')->name('cadastrar-assinatura');
Route::put('/painel/alunos/assinatura/atualiza/{subscription}', 'Panel\SubscriptionController@updAssinatura')->name('atualiza-assinatura');
Route::post('/painel/alunos/assinatura/parcelar/{subscription}', 'Panel\SubscriptionController@parcelarAssinatura')->name('parcelar-assinatura');
Route::delete('/painel/alunos/assinatura/excluir/{subscription}', 'Panel\SubscriptionController@destroyAssinatura')->name('excluir-assinatura');
Route::get('/painel/alunos/assinatura/{subscription}', 'Panel\SubscriptionController@infoAssinatura')->name('informacao-assinatura');

Route::get('/painel/alunos/parcelas/{subscriptionPayment}', 'Panel\SubscriptionPaymentController@infoParcela')->name('informacao-parcela');

Route::get('/painel/cursos', 'Panel\DashboardController@show')->name('painel-cursos');
Route::get('/painel/tutoria', 'Panel\DashboardController@show')->name('painel-tutoria');
Route::get('/painel/professores', 'Panel\DashboardController@show')->name('painel-professores');
Route::get('/painel/materiais', 'Panel\DashboardController@show')->name('painel-materiais');
