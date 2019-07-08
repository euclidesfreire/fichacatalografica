<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\BaseRepository;
use App\Models\Status;

class StatusRepository extends BaseRepository
{
	public function __construct(Status $status)
    {
        $this->model = $status;
    }
    
    public function getStatus($id_ficha) 
    {
    	$status = $this->model->where('id_ficha', $id_ficha)->get();
  
        return $status;
    }
    
}