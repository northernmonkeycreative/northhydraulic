<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    use HasFactory;

    protected $fillable = [
        'start',
        'end',
        'start_date',
        'end_date',
        'title',
        'start_time',
        'end_time',
        'type'
    ];
}
