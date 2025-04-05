<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
use App\Models\Limit_b1;
use Illuminate\Http\Request;
use Carbon\Carbon;
class Limit_b1Controller extends Controller
{
    public function index()
    {
        $limit = Limit_b1::first(); // Bitta limit yozuvini olish        
        return view('limits.index_b1', compact('limit'));
    }
    
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'end_date' => 'nullable|date',
            'max_submissions' => 'nullable|integer|min:1',
        ]);
    
        $limit = Limit_b1::first() ?? new Limit_b1();
        
        // Sanani to'g'ri formatda saqlash
        if (isset($validatedData['end_date'])) {
            $limit->end_date = Carbon::createFromFormat('Y-m-d', $validatedData['end_date']);
        }
        
        $limit->max_submissions = $validatedData['max_submissions'] ?? $limit->max_submissions;
        $limit->save();
    
        return redirect()->route('limits_b1.index')->with('success', 'Limitlar muvaffaqiyatli yangilandi.');
    }
}