<?php

namespace App\Service;

use App\Models\Task;
use App\Repository\TaskRepository;


class TaskService
{
    protected $taskRepository;

    public function __construct(TaskRepository $taskRepository){
        $this->taskRepository = $taskRepository;
    }

    public function getAllTasks(){
        
        return $this->taskRepository->getAllTasks();

    }    

    // Create a new task
    public function createTask($data)
    {
        // Pass $data to the repository's createTask method
        return $this->taskRepository->createTask($data);
    }

    public function updateTask($id, $data)
    {
        // Ensure that both the task ID and the data are passed to the repository
        return $this->taskRepository->updateTask($id, $data);
    }
    public function getTaskById($id)
{
    return Task::findOrFail($id);
}

    public function deleteTask($id)
    {
        return $this->taskRepository->deleteTask($id);
    }

}
