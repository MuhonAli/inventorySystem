<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cse extends Model
{
	public function furnitures()
	{
		return $this->belongsToMany('App\Furniture');
	}
}
