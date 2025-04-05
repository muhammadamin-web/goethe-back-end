<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Validation\ValidationException;

class Contact_b1 extends Model
{
    use HasFactory;

    protected $fillable = ['full_name', 'phone_number', 'email', 'city', 'module', 'birth_date'];

    protected $casts = [
        'module' => 'array',
        'birth_date' => 'date',
    ];

    // Tekshirishni qo'shamiz
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($contact) {
            // Telefon raqami mavjudligini tekshirish
            if (self::where('phone_number', $contact->phone_number)->exists()) {
                throw ValidationException::withMessages([
                    'phone_number' => 'Bu telefon raqami allaqachon mavjud.',
                ]);
            }
        });
    }
}