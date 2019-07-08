<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\BaseRepository;
use App\Models\Cdu;

class CduRepository extends BaseRepository
{
	public function __construct(Cdu $cdu)
    {
        $this->model = $cdu;
    }
    
    public function getCdu() 
    {

    }
    
}