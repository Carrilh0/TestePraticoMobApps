<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TarefaRepository;
use App\RequestValidation\TarefaValidation;


class TarefaController extends Controller
{
    private $request;
    private $tarefaRepository;
    private $tarefaValidation;

    public function __constructor(Request $request, TarefaRepository $tarefaRepository, TarefaValidation $tarefaValidation){
        $this->request = $request;
        $this->tarefaRepository = $tarefaRepository;
        $this->tarefaValidation = $tarefaValidation;
    }

    public function index()
    {
        dd($this->tarefaRepository);
        $tarefas = $this->tarefaRepository->tarefas();
        return view('tarefas.index',compact('tarefas'));
    }

    public function create()
    {

    }

    public function modalCadastrarEditar()
    {
        return view('tarefas.formulario');
    }
}
