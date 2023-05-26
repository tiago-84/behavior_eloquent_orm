<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = "posts";
    protected $primarykey = "id";

    public $timestamp = true;
    //public const CREATED_AT = "creation_date";
    //public const UPDATED_AT = "last_update";


    protected $fillable = ['title', 'subtitle', 'description'];
    protected $guard = [];
}
