<?php
/**
 * Created by PhpStorm.
 * User: Haris
 * Date: 3/21/2019
 * Time: 1:34 AM
 */

namespace App\Repository;

use DB;


class BloggerRepository implements BloggerRepositoryInterface
{
    private $table;

    public function __construct($table = 'bloggers')
    {
        $this->table = $table;
    }

    public function rate($stars)
    {
        // TODO: Implement rate() method.
    }

    public function getByID($id, $columns = ['*'])
    {
        // TODO: Implement getByID() method.
    }

    public function getAll($columns = ['*'])
    {
        return DB::table($this->table)->get($columns);
    }

    public function create(array $data)
    {
        // TODO: Implement create() method.
    }

    public function update(array $data, $id)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function findByName($name, $columns = ['*'])
    {
        // TODO: Implement findByName() method.
    }
}