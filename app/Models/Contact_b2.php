<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Validation\ValidationException;

class Contact_b2 extends Model
{
    use HasFactory;

    protected $fillable = ['full_name', 'phone_number', 'email', 'city', 'birth_date', 'test_id'];

    protected $casts = [
        'birth_date' => 'date',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($contact) {
            // Check if phone number already exists
            if (self::where('phone_number', $contact->phone_number)->exists()) {
                throw ValidationException::withMessages([
                    'phone_number' => 'This phone number already exists.',
                ]);
            }
        });
    }
}
