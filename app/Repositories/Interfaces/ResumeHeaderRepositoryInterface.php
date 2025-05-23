<?php

namespace App\Repositories\Interfaces;

interface ResumeHeaderRepositoryInterface
{
    public function getAll($params);
    public function getActiveAll($params);
    public function findById($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}
