<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'game',
        'logo',
        'color',
        'start_date',
        'end_date',
        'logo',
    ];

    protected $dates = [
        'start_date',
        'end_date',
    ];
}
