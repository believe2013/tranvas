<?php

namespace App\Modules\Event;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded = [];

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
