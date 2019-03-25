<?php


namespace App\Http\Controllers;


use App\Repository\BloggerRatingRepository;
use App\Utilities\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BloggerRatingController
{
    private  $repository;

    public function __construct(BloggerRatingRepository $repository)
    {
        $this->repository = $repository;
    }

    public function rate(Request $request, $id)
    {
        Validator::make($request->all(), [
            'rating' => 'required | numeric | min:1 | max:5'
        ])->validate();

        $this->repository->rate($id, $request->rating);

        return Response::send(200);
    }

}