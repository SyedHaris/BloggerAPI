<?php


namespace App\Http\Controllers;


use App\Repository\BloggerRepository;
use App\Utilities\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class BloggerController
{
    private $repository;

    public function __construct(BloggerRepository $repository)
    {
        $this->repository = $repository;
    }


    public function list(){
        $bloggers = $this->repository->getAll();

        return Response::send(200, $bloggers);
    }

    public function create(Request $request){
        Validator::make($request->all(), [
            'first_name' => 'required | string | max:50',
            'last_name' => 'string | max:50',
            'description' => 'required | string',
            'total_blogs' => 'integer'
        ]);

        $this->repository->create($request->all());

        return Response::send(201);
    }

    public function update(Request $request, $id){
        Validator::make($request->all(), [
            'first_name' => 'string | max:50',
            'last_name' => 'string | max:50',
            'description' => 'string',
            'total_blogs' => 'integer'
        ]);

        $this->repository->update($request->all(), $id);

        return Response::send(200);

    }

    public function delete(Request $request, $id)
    {
        $this->repository->delete($id);

        return Response::send(200);
    }

}