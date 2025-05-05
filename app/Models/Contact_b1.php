<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Validation\ValidationException;
use App\Models\Limit_b1;

class Contact_b1 extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'phone_number',
        'email',
        'city',
        'birth_date',
        'test_id',
        'module'
    ];

    protected $casts = [
        'birth_date' => 'date',
        'module' => 'json'
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

    public function test()
    {
        return $this->belongsTo(Limit_b1::class, 'test_id');
    }
}