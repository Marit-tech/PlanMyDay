<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Opdracht extends Model
{
    protected $table = 'opdracht';

    protected $fillable = [
        'klant_id',
        'titel',
        'datum',
        'duratie',
        'opdrachtomschrijving',
        'beschrijving',
    ];

    protected $casts = [
        'datum' => 'datetime',
    ];
}