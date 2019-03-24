<?php
/**
 * Created by PhpStorm.
 * User: gaditek
 * Date: 3/22/19
 * Time: 6:59 AM
 */

namespace App\Repository;

use DB;


class BloggerRatingRepository implements BloggerRatingRepositoryInterface
{
    private $model;
    private $related_model;

    public function __construct($model, $related_model)
    {
        $this->table = $model;
        $this->related_table = $related_model;
    }

    public function rate($id, $stars)
    {
        $this->model->create(['rating' => $stars, 'blogger_id' => $id]);
        $avg = $this->model->where('blogger_id', $id)->avg('rating');
        return $this->related_model->where('id', $id)->update(['avg_rating' => $avg]);
    }
}