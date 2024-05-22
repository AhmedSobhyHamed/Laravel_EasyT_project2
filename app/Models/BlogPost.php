<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;
    protected $table = 'blogpost';
    protected $primaryKey = 'id';
    protected $connection = 'mysql';
    protected $fillable = ['title' , 'auther' , 'content'];
}
