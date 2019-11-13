<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TarefaRepository;
use App\Repositories\StatusRepository;
use App\RequestValidations\TarefaValidation;



class TarefaController extends Controller
{
    private $request;
    private $tarefaRepository;
    private $statusRepository;
    private $tarefaValidation;

    public function __construct
    (
        Request $request, 
        TarefaRepository $tarefaRepository,
        StatusRepository $statusRepository,
        TarefaValidation $tarefaValidation
    )
    {
        $this->request = $request;
        $this->tarefaRepository = $tarefaRepository;
        $this->statusRepository = $statusRepository;
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
        $dados = $this->request->all();
        $dados['user_id'] = 1;
        $this->tarefaRepository->create($dados);
        return redirect()->back();
    }

    public function update()
    {
        $tarefa = $this->tarefaRepository->tarefaPorId($id);
    }

    public function modalCadastrarEditar($idTarefa = false)
    {
        $tarefa = null;
        if($idTarefa){
            $tarefa = $this->tarefaRepository->tarefaPorId($idTarefa);
            
        }

        $statuses = $this->statusRepository->status();
        return view('tarefas.formulario',compact('statuses','tarefa'));
    }
}
