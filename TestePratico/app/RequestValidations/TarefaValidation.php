<?php

namespace App\RequestValidations;

use Illuminate\Support\Facades\Validator; 

class TarefaValidation 
{
    public function cadastrarValidation($request)
    {
        return Validator::Make($request,[
            'nome' => 'required|string|max:255',
            'status_id' => 'required'
        ]);
    }
}
