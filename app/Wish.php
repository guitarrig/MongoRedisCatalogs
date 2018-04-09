<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class Wish extends Eloquent
{
  protected $fillable = ['name', 'catalog_id', 'description', '_id'];

  protected $connection = 'mongodb';

  protected $collection = 'wishes';
}
