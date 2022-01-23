<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Admin\TaskRepository;
use App\Repositories\Api\Client\PackageRepository;
use App\Services\Admin\TaskServices;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    protected $taskRepository=false;
    protected $taskService=false;
    public function __construct(TaskServices $taskService)
    {
        $this->taskService=$taskService;
    }
  public function index(){
    $tasks=$this->taskService->showMyTasks();
    dd($tasks);
    return view('admin.tasks.index',compact('tasks'));
  }
}
