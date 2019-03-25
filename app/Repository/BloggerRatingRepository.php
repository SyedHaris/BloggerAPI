<?php


namespace App\Repository;


interface BloggerRatingRepository
{
    public function rate($id, $stars);

}