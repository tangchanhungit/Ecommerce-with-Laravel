<?php

namespace App\Repositories;

interface CategoryRepositoryInterface
{
    public function all();

    public function getById($id);

    public function create(array $data);

    public function update($id, array $data);

    public function delete($id);
}
