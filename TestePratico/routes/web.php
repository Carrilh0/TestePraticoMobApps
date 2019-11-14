<?php


Auth::routes();

Route::group([ 'middleware' => 'auth'], function()
{


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/','TarefaController@index')->name('index');
Route::get('/modalcadastrareditar/{idTarefa?}/{idStatus?}','TarefaController@modalCadastrarEditar')->name('modal.cadastrar.editar');
Route::post('/cadastrar','TarefaController@create')->name('tarefa.create');
Route::post('/editar','TarefaController@update')->name('tarefa.update');
Route::get('/deletar/{id}','TarefaController@delete')->name('tarefa.delete');
Route::get('/logout', 'HomeController@logout')->name('logout');
Route::get('/ajax/editarArrastar/{idTarefa}/{status}', 'TarefaController@editarArrastar');

});