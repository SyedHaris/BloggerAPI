<?php
/**
 * Created by PhpStorm.
 * User: Haris
 * Date: 3/21/2019
 * Time: 1:28 AM
 */

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