<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    public function book()
    {
    	return $this->belongsTo(Book::class);
    }
}
