<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
  protected $primaryKey = 'blog_id';
  public $incrementing = false;
}
