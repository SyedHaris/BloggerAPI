<?php

namespace App\Repository;

use DB;


class EloquentBloggerRatingRepository implements BloggerRatingRepository
{
    private $model;
    private $related_model;

    public function __construct($model, $related_model)
    {
        $this->model = $model;
        $this->related_model = $related_model;
    }

    public function rate($id, $stars)
    {
        $this->model->create(['rating' => $stars, 'blogger_id' => $id]);
        $avg = $this->model->where('blogger_id', $id)->avg('rating');
        return $this->related_model->where('id', $id)->update(['avg_rating' => $avg]);
    }
}