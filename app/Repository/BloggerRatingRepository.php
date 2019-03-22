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
    private $table;
    private $related_table;

    public function __construct($table = 'blogger_rating', $related_table = 'bloggers')
    {
        $this->table = $table;
        $this->related_table = $related_table;
    }


    public function rate($id, $stars)
    {
        DB::table($this->table)->insert(['rating' => $stars, 'blogger_id' => $id]);
        $avg = DB::table($this->table)->where('blogger_id', $id)->avg('rating');
        return DB::table($this->related_table)->where('id', $id)->update(['avg_rating' => $avg]);
    }
}