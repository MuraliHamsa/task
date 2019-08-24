<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Group extends Model
{
	use Notifiable;
       protected $fillable = ['name'];
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
    public function hasUser($user_id)
    {
        foreach ($this->users as $user) {
            if($user->id == $user_id) {
                return true;
            }
        }
    }
   
}
