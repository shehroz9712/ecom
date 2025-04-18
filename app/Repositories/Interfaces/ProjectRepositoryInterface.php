<?php

namespace App\Repositories\Interfaces;

interface ProjectRepositoryInterface
{
    public function getAll($page = null); 
    public function getActiveAll($page = null);
    public function findById($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}
