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

	public function client()
	{
		return $this->belongsTo(Client::class);
	}

	public function products()
	{
		return $this->belongsToMany(Product::class)->withPivot('amount', 'unit_price', 'unit', 'color', 'support', 'color_hexa');
	}
}
