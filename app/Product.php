<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Image;
use App\Color;
use App\Budget;
use App\ProductAtribute;
use App\Certificate;

class Product extends Model
{
  protected $guarded = [];

  public function category()
  {
      return $this->belongsTo(Category::class);
  }

  public function images()
  {
    return $this->hasMany(Image::class);
  }

  public function colors()
  {
    return $this->belongsToMany(Color::class)->withTimestamps();
  }

  public function atributes()
  {
    return $this->hasMany(ProductAtribute::class);
  }

  public function certificates()
  {
    return $this->hasMany(Certificate::class);
  }

  public function budgets()
  {
    return $this->belongsToMany(Budget::class);
  }

}
