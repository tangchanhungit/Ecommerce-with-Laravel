<?php

namespace App\Repositories;

interface ProductRepositoryInterface
{
    public function create(array $data);
    public function getById($id);
    public function delete($id);
    public function getAll();
}
