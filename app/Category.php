<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Image;
use App\SubCategory;
use App\Product;

class Category extends Model
{
  public function product()
  {
    return $this->hasMany(Product::class);
  }

  public function sub_categories()
  {
    return $this->hasMany(SubCategory::class);
  }

  public function images()
  {
    return $this->hasMany(Image::class);
  }
}
