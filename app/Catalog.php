<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class Catalog extends Eloquent
{
  protected $fillable = ['name', 'user_id', 'login', '_id'];

  protected $connection = 'mongodb';
  
  protected $collection = 'catalogs';
}
