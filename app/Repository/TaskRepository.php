<?php

namespace App\repository;

Interface TaskRepository{
    public function getAllTasks();
    public function createTask($data);
    public function updateTask($id,$data);
}