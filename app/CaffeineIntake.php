<?php

namespace App;

use CaffeineSources;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class CaffeineIntake extends Model
{
    use Notifiable;
    protected $fillable = [
        'caffeine_source_id', 'units', 'user_id'
    ];

    public function caffeineSources()
    {
        return $this->hasMany('App\CaffeineSources', 'id', 'caffeine_source_id');
    }
}
