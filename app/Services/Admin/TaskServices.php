<?php


namespace App\Services\Admin;


use App\Repositories\Admin\TaskRepository;

class TaskServices
{
    protected $taskRepository=false;
    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository=$taskRepository;
    }
    //show
    public function showMyTasks(){
        $tasks=$this->taskRepository->getByUser();
        return $tasks;
    }
    //store
    public function store($request){
        try {

        }catch (\Exception $e){
            return back()->with('error', $e->getCode());
        }
    }

}
