<?php
/**
 * Created by PhpStorm.
 * User: Haris
 * Date: 3/21/2019
 * Time: 1:33 AM
 */

namespace App\Repository;


interface BloggerRepositoryInterface extends RepositoryInterface
{
    public function rate($stars);
}