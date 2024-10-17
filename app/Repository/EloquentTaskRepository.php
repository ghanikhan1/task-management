<?php

namespace App\Repository;

use App\Models\Task;
use App\repository\TaskRepository;


class EloquentTaskRepository implements TaskRepository
{
    public function getAllTasks()
    {
        return Task::with('category', 'user')->get();
    }

    public function createTask($data)
    {
        return Task::create($data);
    }

    public function updateTask($id, $data)
    {
        $task = Task::find($id);
        $task->update($data);
        return $task;
    }
    
    public function deleteTask($id)
    {
        $task = Task::findOrFail($id);
        return $task->delete();
    }
    
    public function getTasksByStatus($status)
    {
        return Task::where('status', $status)->with('category', 'user')->get();
    }

    public function getTasksBySearch($search)
    {
        return Task::where('title' , 'like', '%' . $search . '%')->get();
    }

}
