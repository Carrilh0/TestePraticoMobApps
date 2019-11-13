<?php
namespace App\Repositories;

use App\Models\Tarefa;

class TarefaRepository 
{
    private $tarefa;

    public function __construct(Tarefa $tarefa)
    {
        $this->tarefa = $tarefa;
    }
    
    public function tarefas()
    {
        return $this->tarefa->where('user_id',Auth::user()->id)->get();
    }
}