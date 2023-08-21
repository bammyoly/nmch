<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Profile extends Model
{
    protected $fillable = [
        'matric', 'bio', 'user_id'
    ];

    public function is_mentor()
    {
        if($this->mentor)
        {
            return true;
        }
        return false;
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**public function mentors()
    {
        return $this->hasMany(Mentor::class);
    }

    public function mentored()
    {
        return (bool) Mentor::where('user_id', Auth::id())
                        ->where('mentor_id', $this->id)
                        ->first();
    }**/


}
