<?php


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/tarefas','TarefaController@index')->name('index');
Route::get('/modalcadastrareditar/{idTarefa?}/{idStatus?}','TarefaController@modalCadastrarEditar')->name('modal.cadastrar.editar');
Route::post('/cadastrar','TarefaController@create')->name('tarefa.create');
Route::post('/editar','TarefaController@update')->name('tarefa.update');