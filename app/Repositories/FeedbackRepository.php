<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\BaseRepository;
use App\Models\Feedback;

class FeedbackRepository extends BaseRepository
{
	public function __construct(Feedback $feedback)
    {
        $this->model = $feedback;
    }
    
    public function getFeedback() 
    {

    }
    
}