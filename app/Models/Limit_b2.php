<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Limit_b2 extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'start_date', 'end_date', 'max_submissions'];

    protected $casts = [
        'end_date' => 'datetime',
    ];
}
