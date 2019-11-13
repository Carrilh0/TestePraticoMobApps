<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TarefaController extends Controller
{
    public function index()
    {
        return view('tarefas.index');
    }

    public function modalCadastrarEditar()
    {
        return view('tarefas.formulario');
    }
}
