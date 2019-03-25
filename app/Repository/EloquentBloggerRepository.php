<?php


namespace App\Repository;



class EloquentBloggerRepository implements BloggerRepository
{
    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }


    public function getByID($id)
    {
        return $this->model->findOrFail($id);
    }

    public function getAll(array $options = [])
    {
        if($options && $options['name'])
            return $this->findByName($options['name']);
        return $this->model->get();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id)
    {
        return $this->model->where('id', $id)->update($data);
    }

    public function delete($id)
    {
        return $this->model->where('id', $id)->delete();
    }

    public function findByName($name)
    {
        return $this->model->where('first_name', 'LIKE', '%' . $name . '%')->orWhere('last_name', 'LIKE', '%' . $name . '%' )->get();
    }
}