<?php


namespace App\Repository;


interface BloggerRepository
{
    public function getByID($id);

    public function getAll(array $options = []);

    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);

    public function findByName($name);
}