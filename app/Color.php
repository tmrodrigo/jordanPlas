<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Color extends Model
{
  protected $guarded = [];

  public function products()
  {
    return $this->belongsToMany(Product::class)->withTimestamps();
  }
}
