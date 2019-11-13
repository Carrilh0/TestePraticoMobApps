<?php
namespace App\Repositories;

use App\Models\Status;

class StatusRepository 
{
    private $status;

    public function __construct(Status $status)
    {
        $this->status = $status;
    }
    
    public function status()
    {
        return $this->status->get();
    }

    public function statusPorId()
    {
        return $this->status->find($id);
    }

}