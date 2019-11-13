<?php

Route::get('/tarefas','TarefaController@index')->name('index');
Route::get('/cadastrareditar','TarefaController@modalCadastrarEditar')->name('cadastrarEditar');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
