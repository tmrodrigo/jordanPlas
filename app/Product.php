<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Image;
use App\Color;
use App\Budget;
use App\ProductAtribute;
use App\Certificate;
use App\SubCategory;
use App\Category;
use App\Fixation;
use App\Meassure;

class Product extends Model
{
  protected $guarded = [];

  public function category()
  {
    return $this->belongsTo(Category::class);
  }

  public function sub_category()
  {
    return $this->belongsTo(SubCategory::class);
  }

  public function images()
  {
    return $this->hasMany(Image::class);
  }

  public function colors()
  {
    return $this->belongsToMany(Color::class)->withPivot('body', 'reflective');
  }

  public function atributes()
  {
    return $this->hasMany(ProductAtribute::class);
  }

  public function certificates()
  {
    return $this->belongsToMany(Certificate::class);
  }

  public function budgets()
  {
    return $this->belongsToMany(Budget::class);
  }

  public function fixation()
  {
    return $this->belongsToMany(Fixation::class)->withPivot('amount');
  }

  public function meassures()
  {
    return $this->hasMany(Meassure::class);
  }

}
