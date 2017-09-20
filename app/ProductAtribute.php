<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class ProductAtribute extends Model
{
  protected $guarded = [];

  public function product()
  {
    return $this->hasOne(Product::class);
  }
}
