<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Validation\ValidationException;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'phone_number',
        'email',
        'city',
        'birth_date',
        'test_id'
    ];

    protected $casts = [
        'birth_date' => 'date',
    ];

    public function test(): BelongsTo
    {
        return $this->belongsTo(Limit::class, 'test_id');
    }

    protected static function boot()
    {
        parent::boot();
    
        static::creating(function ($contact) {
            // Telefon raqami mavjudligini tekshirish
            if (self::where('phone_number', $contact->phone_number)->exists()) {
                throw ValidationException::withMessages([
                    'phone_number' => 'Bu telefon raqami allaqachon mavjud.',
                ])->status(350); // Set the custom error status code
            }
        });
    }
}