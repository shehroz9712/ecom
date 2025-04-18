<?php

namespace App\Repositories\Interfaces;

interface SettingRepositoryInterface
{
    public function getAll($page = null);
    public function getActiveAll($page = null);
    public function findById($id);
    public function storeOrUpdate(array $data);
    public function delete($id);
}
