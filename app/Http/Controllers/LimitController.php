<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Limit;
use Illuminate\Http\Request;
use Carbon\Carbon;
class LimitController extends Controller
{
    public function index()
    {
        $limit = Limit::first();
        return view('limits.index', compact('limit'));
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'end_date' => 'nullable|date',
            'max_submissions' => 'nullable|integer|min:1',
        ]);
    
        $limit = Limit::first() ?? new Limit();
        
        // Sanani to'g'ri formatda saqlash
        if (isset($validatedData['end_date'])) {
            $limit->end_date = Carbon::createFromFormat('Y-m-d', $validatedData['end_date']);
        }
        
        $limit->max_submissions = $validatedData['max_submissions'] ?? $limit->max_submissions;
        $limit->save();
    
        return redirect()->route('limits.index')->with('success', 'Limitlar muvaffaqiyatli yangilandi.');
    }
}