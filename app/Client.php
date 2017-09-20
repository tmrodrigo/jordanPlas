<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Budget;

class Client extends Model
{
  protected $guarded = [];

  public function budget()
  {
    return $this->hasOne(Budget::class);
  }
}
