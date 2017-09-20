<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\Client;

class Budget extends Model
{
  protected $guarded = [];

	public function product()
	{
		return $this->belongsTo(Product::class);
	}

	public function clients()
	{
		return $this->belongsTo(Client::class);
	}
}
