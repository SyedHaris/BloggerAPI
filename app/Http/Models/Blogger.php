<?php
/**
 * Created by PhpStorm.
 * User: Haris
 * Date: 3/25/2019
 * Time: 2:32 AM
 */

namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;

class Blogger extends Model
{
    protected $hidden = ['created_at', 'updated_at'];

    protected $fillable = ['first_name', 'last_name','description', 'total_blogs'];
}