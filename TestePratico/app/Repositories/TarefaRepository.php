<?php
namespace App\Repositories;

use App\Models\Tarefa;
use Auth;

class TarefaRepository 
{
    private $tarefa;

    public function __construct
    (
        Tarefa $tarefa
    )
    {
        $this->tarefa = $tarefa;
    }
    
    public function tarefas($usuarioId, $tarefaId)
    {
        return $this->tarefa->where('user_id', $usuarioId)->where('status_id', $tarefaId)->get();
    }

    public function tarefaPorId($id)
    {
        return $this->tarefa->find($id);
    }

    public function create(array $dados)
    {
        $this->tarefa->create($dados);
    }

    public function update(Tarefa $tarefa, array $dados)
    {
        
    }
}