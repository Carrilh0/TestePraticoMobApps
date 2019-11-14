<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TarefaRepository;
use App\Repositories\StatusRepository;
use App\RequestValidations\TarefaValidation;
use Auth;


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
        $user = Auth::user()->id;
        $tarefasAFazer = $this->tarefaRepository->tarefas($user, 1);
        $tarefasEmAndamento = $this->tarefaRepository->tarefas($user, 2);
        $tarefasConcluidas = $this->tarefaRepository->tarefas($user, 3);
       
        return view('tarefas.index',compact('tarefasAFazer','tarefasEmAndamento','tarefasConcluidas'));
    }

    public function create()
    {   
        $dados = $this->request->all();
        
        $validate = $this->tarefaValidation->cadastrarValidation($dados);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }


        $dados['user_id'] = Auth::user()->id;;
        $this->tarefaRepository->create($dados);
        return redirect()->back();
    }

    public function update()
    {
        $tarefa = $this->tarefaRepository->tarefaPorId($this->request->id);
        $dados = $this->request->all();

        $this->tarefaRepository->update($tarefa,$dados);

        return redirect()->back();
    }

    public function delete($id)
    {
        $tarefa = $this->tarefaRepository->tarefaPorId($id);

        $this->tarefaRepository->delete($tarefa);
        
        return redirect()->back();
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

    public function editarArrastar($id,$status)
    {
        $tarefa = $this->tarefaRepository->tarefaPorId($id);
        $tarefa->status_id = $status;
        $tarefa->update();
    }
}
