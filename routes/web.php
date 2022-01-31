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
Route::get('', 'unypublicaController@index');
Route::get('/agendados', 'unypublicaController@agendados');
<<<<<<< HEAD
Route::get('/curso/{slug}', 'unypublicaController@curso');
=======

>>>>>>> 187ac075d21761cbbf15262f054ddfa464906447
//rotas da api
Route::get('/curso/{id}', 'CourseController@show');
Route::get('/categoria/{category}', 'CategoryController@show');
Route::get('/categoria', 'CategoryController@showAll');
Route::get('/cursos', 'CourseController@showAll');
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

//rotas de informações pertinantes ao parcelamento do pagameanto das assinaturas
Route::get('/painel/alunos/parcelas/adicionar/{subscription}', 'Panel\SubscriptionPaymentController@formParcela')->name('adicionar-parcela');
Route::post('/painel/alunos/parcelas/cadastrar', 'Panel\SubscriptionPaymentController@cadParcela')->name('cadastrar-parcela');
Route::put('/painel/alunos/parcelas/atualiza/{subscriptionPayment}', 'Panel\SubscriptionPaymentController@updParcela')->name('atualiza-parcela');
Route::delete('/painel/alunos/parcelas/excluir/{subscriptionPayment}', 'Panel\SubscriptionPaymentController@destroyParcela')->name('excluir-parcela');
Route::get('/painel/alunos/parcelas/{subscriptionPayment}', 'Panel\SubscriptionPaymentController@infoParcela')->name('informacao-parcela');

//rotas de informações pertinantes aos professores
Route::get('/painel/professores', 'Panel\TeacherController@show')->name('painel-professores');
Route::get('/painel/professores/adicionar', 'Panel\TeacherController@formProfessor')->name('adicionar-professor');
Route::post('/painel/professores/cadastrar', 'Panel\TeacherController@cadProfessor')->name('cadastrar-professor');
Route::put('/painel/professores/atualiza/{teacher}', 'Panel\TeacherController@updProfessor')->name('atualiza-professor');
Route::delete('/painel/professores/excluir/{teacher}', 'Panel\TeacherController@destroyProfessor')->name('excluir-professor');
Route::get('/painel/professores/{teacher}', 'Panel\TeacherController@infoProfessor')->name('informacao-professor');

//rotas de informações pertinantes aos materiais
Route::get('/painel/materiais', 'Panel\MaterialController@show')->name('painel-materiais');
Route::get('/painel/materiais/adicionar', 'Panel\MaterialController@formMaterial')->name('adicionar-material');
Route::post('/painel/materiais/cadastrar', 'Panel\MaterialController@cadMaterial')->name('cadastrar-material');
Route::post('/painel/materiais/inserir', 'Panel\MaterialController@inserirMaterial')->name('inserir-material');
Route::put('/painel/materiais/atualizar/{material}', 'Panel\MaterialController@updMaterial')->name('atualizar-material');
Route::match(['get', 'post'], '/painel/materiais/pesquisa', 'Panel\MaterialController@search')->name('filtra-materiais');
Route::delete('/painel/materiais/excluir/{material}', 'Panel\MaterialController@destroyMaterial')->name('excluir-material');
Route::get('/painel/materiais/{material}', 'Panel\MaterialController@infoMaterial')->name('informacao-material');

//rotas de informações pertinentes aos cursos
Route::get('/painel/cursos', 'Panel\CourseController@show')->name('painel-cursos');
Route::get('/painel/cursos/adicionar', 'Panel\CourseController@formCurso')->name('adicionar-curso');
Route::post('/painel/cursos/cadastrar', 'Panel\CourseController@cadCurso')->name('cadastrar-curso');
Route::put('/painel/cursos/atualizar/{course}', 'Panel\CourseController@updCurso')->name('atualizar-curso');
Route::match(['get', 'post'], '/painel/cursos/pesquisa', 'Panel\CourseController@search')->name('filtra-cursos');
Route::delete('/painel/cursos/excluir/{course}', 'Panel\CourseController@destroyCurso')->name('excluir-curso');
Route::get('/painel/cursos/{course}', 'Panel\CourseController@infoCurso')->name('informacao-curso');

//rotas de informações pertinentes as categoria
Route::get('/painel/categorias', 'Panel\CategoryController@show')->name('painel-categorias');
Route::get('/painel/categorias/adicionar', 'Panel\CategoryController@formCategoria')->name('adicionar-categoria');
Route::post('/painel/categorias/cadastrar', 'Panel\CategoryController@cadCategoria')->name('cadastrar-categoria');
Route::put('/painel/categorias/atualizar/{category}', 'Panel\CategoryController@updCategoria')->name('atualizar-categoria');
Route::get('/painel/categorias/{category}', 'Panel\CategoryController@infoCategoria')->name('informacao-categoria');
Route::delete('/painel/categorias/excluir/{category}', 'Panel\CategoryController@destroyCategoria')->name('excluir-categoria');



//rotas de informações pertinentes as turmas
Route::get('/painel/turmas/adicionar/{course}', 'Panel\ClassController@formTurma')->name('adicionar-turma');
Route::post('/painel/turmas/cadastrar', 'Panel\ClassController@cadTurma')->name('cadastrar-turma');
Route::get('/painel/turmas/{classes}', 'Panel\ClassController@infoTurma')->name('informacao-turma');
Route::get('/painel/turmas/excluir/{classes}', 'Panel\ClassController@destroyTurma')->name('excluir-turma');
Route::put('/painel/turmas/atualizar/{classes}', 'Panel\ClassController@updTurma')->name('atualizar-turma');

//rotas de informações pertinentes ao financeiro
Route::get('/painel/financeiro' , 'Panel\FinanceController@show')->name('painel-financeiro');
Route::get('/painel/financeiro/despesas/adicionar' , 'Panel\FinanceController@formDespesas')->name('adicionar-despesas');
Route::post('/painel/financeiro/despesas/cadastrar', 'Panel\FinanceController@cadDespesa')->name('cadastrar-despesa');
Route::delete('/painel/financeiro/despesas/excluir/{despesa}', 'Panel\FinanceController@destroyDespesa')->name('excluir-despesa');
Route::get('/painel/financeiro/fluxo-de-caixa/filtrar' , 'Panel\FinanceController@formFluxo')->name('adicionar-fluxo');
Route::get('/painel/financeiro/fluxo-de-caixa/listar' , 'Panel\FinanceController@fluxo')->name('fluxo');
Route::post('/painel/financeiro/fluxo-de-caixa/cadastrar', 'Panel\FinanceController@cadFluxo')->name('cadastrar-fluxo');
Route::delete('/painel/financeiro/fluxo-de-caixa/excluir/{fluxo}', 'Panel\FinanceController@destroyFluxo')->name('excluir-fluxo');

//rotas de informações pertinentes aos paineis
Route::get('/painel/paineis/adicionar/{class}' , 'Panel\PanelController@formPainel')->name('adicionar-painel');
Route::post('/painel/paineis/cadastrar', 'Panel\PanelController@cadPainel')->name('cadastrar-painel');
Route::get('/painel/paineis/{panel}', 'Panel\PanelController@infoPainel')->name('informacao-painel');
Route::put('/painel/paineis/atualizar/{panel}', 'Panel\PanelController@updPainel')->name('atualizar-painel');
Route::delete('/painel/painel/excluir/{panel}', 'Panel\PanelController@destroyPainel')->name('excluir-painel');


//Route::get('/painel/cursos', 'Panel\DashboardController@show')->name('painel-cursos');
Route::get('/painel/tutoria', 'Panel\DashboardController@show')->name('painel-tutoria');
