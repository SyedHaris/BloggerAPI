<?php


namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;

class BloggerRating extends Model
{
    protected $table = 'blogger_rating';
    protected $fillable = ['blogger_id', 'rating'];
}