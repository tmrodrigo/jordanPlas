<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Image;

class Category extends Model
{
  public function product()
  {
    return $this->hasMany(Product::class);
  }

  public function images()
  {
    return $this->hasMany(Image::class);
  }
}
