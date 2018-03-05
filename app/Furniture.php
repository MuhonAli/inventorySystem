<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Furniture extends Model
{
	public function cses()
	{
		return $this->belongsToMany('Cse');
	}
}
