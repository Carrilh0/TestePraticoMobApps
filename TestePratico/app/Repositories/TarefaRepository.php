<?php
namespace App\Repositories;

use App\Models\Tarefa;
use Auth;

class TarefaRepository 
{
    private $tarefa;

    public function __construct(Tarefa $tarefa)
    {
        $this->tarefa = $tarefa;
    }
    
    public function tarefas($usuarioId, $tarefaId)
    {
        return $this->tarefa->where('user_id', $usuarioId)->where('status_id', $tarefaId)->get();
    }

    public function create($dados)
    {
        $this->tarefa->create($dados);
    }
}