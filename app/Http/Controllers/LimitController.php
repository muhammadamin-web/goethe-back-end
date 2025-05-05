<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Limit;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Services\TimeService;

class LimitController extends Controller
{
    public function index()
    {
        $limits = Limit::all();
        return view('limits.index', compact('limits'));
    }

    public function create()
    {
        return view('limits.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'start_date_date' => 'required|date',
            'start_date_time' => 'required',
            'end_date_date' => 'required|date',
            'end_date_time' => 'required',
            'max_submissions' => 'required|integer|min:1',
        ]);

        // Combine date and time inputs
        $startDate = Carbon::createFromFormat('Y-m-d H:i', $validatedData['start_date_date'] . ' ' . $validatedData['start_date_time']);
        $endDate = Carbon::createFromFormat('Y-m-d H:i', $validatedData['end_date_date'] . ' ' . $validatedData['end_date_time']);

        // Check if end date is after start date
        if ($endDate->lte($startDate)) {
            return redirect()->back()->withErrors(['end_date_date' => 'End date and time must be after start date and time'])->withInput();
        }

        // Create the limit with combined datetime values
        Limit::create([
            'name' => $validatedData['name'],
            'start_date' => $startDate,
            'end_date' => $endDate,
            'max_submissions' => $validatedData['max_submissions'],
        ]);

        return redirect()->route('limits.index')->with('success', 'New A1 test date created successfully.');
    }

    public function edit($id)
    {
        $limit = Limit::findOrFail($id);
        return view('limits.edit', compact('limit'));
    }

    public function updateTest(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'start_date_date' => 'required|date',
            'start_date_time' => 'required',
            'end_date_date' => 'required|date',
            'end_date_time' => 'required',
            'max_submissions' => 'required|integer|min:1',
        ]);

        // Combine date and time inputs
        $startDate = Carbon::createFromFormat('Y-m-d H:i', $validatedData['start_date_date'] . ' ' . $validatedData['start_date_time']);
        $endDate = Carbon::createFromFormat('Y-m-d H:i', $validatedData['end_date_date'] . ' ' . $validatedData['end_date_time']);

        // Check if end date is after start date
        if ($endDate->lte($startDate)) {
            return redirect()->back()->withErrors(['end_date_date' => 'End date and time must be after start date and time'])->withInput();
        }

        $limit = Limit::findOrFail($id);
        $limit->update([
            'name' => $validatedData['name'],
            'start_date' => $startDate,
            'end_date' => $endDate,
            'max_submissions' => $validatedData['max_submissions'],
        ]);

        return redirect()->route('limits.index')->with('success', 'Test date updated successfully.');
    }

    public function destroy($id)
    {
        $limit = Limit::findOrFail($id);
        $limit->delete();
        return redirect()->route('limits.index')->with('success', 'Test date deleted successfully.');
    }

    // Added: Return available tests for A1
    public function getAvailableTests()
    {
        $currentTime = TimeService::getCurrentTime();
        
        $availableTests = Limit::where(function($query) use ($currentTime) {
            $query->where('end_date', '>', $currentTime)
                  ->where('start_date', '<=', $currentTime)
                  ->where('max_submissions', '>', function($query) {
                      $query->selectRaw('COUNT(*)')
                            ->from('contacts')
                            ->whereColumn('contacts.test_id', 'limits.id');
                  });
        })->get();

        if ($availableTests->isEmpty()) {
            return response()->json(['data' => [], 'hasAvailableTests' => false]);
        }

        return response()->json([
            'data' => $availableTests,
            'hasAvailableTests' => true
        ]);
    }

    // Legacy method for backward compatibility
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