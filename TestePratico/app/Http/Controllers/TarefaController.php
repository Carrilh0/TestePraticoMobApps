<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TarefaRepository;
use App\RequestValidations\TarefaValidation;



class TarefaController extends Controller
{
    private $request;
    private $tarefaRepository;
    private $tarefaValidation;

    public function __construct
    (
        Request $request, 
        TarefaRepository $tarefaRepository,
        TarefaValidation $tarefaValidation
    )
    {
        $this->request = $request;
        $this->tarefaRepository = $tarefaRepository;
        $this->tarefaValidation = $tarefaValidation;
    }

    public function index()
    {
        $tarefasAFazer = $this->tarefaRepository->tarefas(1, 1);
        $tarefasEmAndamento = $this->tarefaRepository->tarefas(1, 2);
        $tarefasConcluidas = $this->tarefaRepository->tarefas(1, 3);
       
        return view('tarefas.index',compact('tarefasAFazer','tarefasEmAndamento','tarefasConcluidas'));
    }

    public function create()
    {
        $this->tarefaRepository->create($this->request);
    }

    public function modalCadastrarEditar()
    {
        return view('tarefas.formulario');
    }
}
