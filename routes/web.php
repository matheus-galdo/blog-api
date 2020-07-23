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

Route::get('/', function () {
    return view('welcome');
});

//@param 1 = ROTA: pega a uri acessada e chama uma controller
//@param 2 = CONTROLLER@METODO: define qual a controller a ser executada quando acessamos uma
//controleler e qual o método que deverá ser chamado dentro da controller
Route::get('/teste', 'LivroController@index');
Route::get('/ota', 'LivroController@ota');


/* ========================== TIPOS DE ROTAS =========================
* 
* Middlewares = filtros para acessar controllers = auth - autenticação
*
* Prefix = cria um prefixo para todas as URI's do grupo
*
* Namespace = acessa controllers especificas dentro de um namespace/pasta
*
* Name = define nome alternativo para acessar uma rota
*
* Group = agrupa rotas
*
* Exemplo:
* Route::VerboDeRota([values])->tipoDeRota(function(){callback})
*
* Grupos
* Rout::group(['tipo'=>'valor'], function(){callback} || controller);
*
*/