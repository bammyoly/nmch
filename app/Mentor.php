<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    protected $fillable = ['mentor_id', 'user_id'];

    public function proflie()
    {
    	return $this->belongsTo(User::class);
    }
}
