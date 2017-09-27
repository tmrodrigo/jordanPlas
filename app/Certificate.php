<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Certificate extends Model
{
  protected $guarded = [];

  public function product()
  {
    return $this->belongsToMany(Product::class);
  }
}
