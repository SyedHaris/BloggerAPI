<?php


namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;

class Blogger extends Model
{
    protected $hidden = ['created_at', 'updated_at'];

    protected $fillable = ['first_name', 'last_name','description', 'total_blogs'];
}