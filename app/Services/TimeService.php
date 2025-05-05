<?php

namespace App\Services;

use Carbon\Carbon;

class TimeService
{
    /**
     * Joriy vaqtni olish metodi
     * Server vaqtini GMT+5 (O'zbekiston) vaqt mintaqasida qaytaradi
     * 
     * @return \Carbon\Carbon
     */
    public static function getCurrentTime()
    {
        // Server vaqtini O'zbekiston vaqt mintaqasida (GMT+5) qaytarish
        return Carbon::now('Asia/Tashkent');
    }
}
