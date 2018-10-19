<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;

class CaffeineSources extends Model
{

    use Notifiable;
    protected $fillable = [
        'name', 'description', 'value'
    ];
}
