<?php


namespace App\Repositories\Admin;
use Auth;

use App\Models\Task;

class TaskRepository
{
    public function getByUser(){
        $currentUser=Auth::user()->id;
        return Task::where('user_id',$currentUser)->get();
    }
}
