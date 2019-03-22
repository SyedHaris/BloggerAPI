<?php
/**
 * Created by PhpStorm.
 * User: Haris
 * Date: 3/21/2019
 * Time: 1:34 AM
 */

namespace App\Repository;

use DB;


class BloggerRepository implements RepositoryInterface
{
    private $table;

    public function __construct($table = 'bloggers')
    {
        $this->table = $table;
    }

    public function rate($id, $stars)
    {
        return DB::table($this->table)->where('id', $id)->update(['rating' => $stars]);
    }

    public function getByID($id, $columns = ['*'])
    {
        // TODO: Implement getByID() method.
    }

    public function getAll($columns = ['*'], array $options = [])
    {
        if($options && $options['name'])
            return $this->findByName($options['name'], $columns);
        return DB::table($this->table)->get($columns);
    }

    public function create(array $data)
    {
        return DB::table($this->table)->insertGetId([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'description' => $data['description'],
            'total_blogs' => $data['total_blogs']
        ]);
    }

    public function update(array $data, $id)
    {
        return DB::table($this->table)->where('id', $id)->update([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'description' => $data['description'],
            'total_blogs' => $data['total_blogs']
        ]);
    }

    public function delete($id)
    {
        return DB::table($this->table)->where('id', $id)->delete();
    }

    public function findByName($name, $columns = ['*'])
    {
        return DB::table($this->table)->where('first_name', 'LIKE', $name . '%')->orWhere('last_name', 'LIKE', '%' . $name )->get($columns);
    }
}