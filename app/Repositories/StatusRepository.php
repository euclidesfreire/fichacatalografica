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
    
    public function getStatus() 
    {

    }
    
}