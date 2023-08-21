<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
	public function bcategory()
	{
		return $this->belongsTo(Bcategory::class);
	}

    public function uploads()
    {
    	return $this->hasMany(Upload::class);
    }
}
