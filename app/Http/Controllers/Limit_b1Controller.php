<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Limit_b1;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Services\TimeService;

class Limit_b1Controller extends Controller
{
    public function index()
    {
        $limits = Limit_b1::all(); // Retrieve all test dates
        return view('limits.index_b1', compact('limits'));
    }
    
    public function update(Request $request, int $id)
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

        $limit = Limit_b1::findOrFail($id);
        $limit->update([
            'name' => $validatedData['name'],
            'start_date' => $startDate,
            'end_date' => $endDate,
            'max_submissions' => $validatedData['max_submissions'],
        ]);

        return redirect()->route('limits_b1.index')->with('success', 'Test date updated successfully.');
    }

    public function edit($id)
    {
        $limit = Limit_b1::findOrFail($id);
        return view('limits.edit_b1', compact('limit'));
    }

    public function create()
    {
        return view('limits.create_b1');
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
        Limit_b1::create([
            'name' => $validatedData['name'],
            'start_date' => $startDate,
            'end_date' => $endDate,
            'max_submissions' => $validatedData['max_submissions'],
        ]);

        return redirect()->route('limits_b1.index')->with('success', 'New B1 test date created successfully.');
    }

    public function getAvailableTests()
    {
        $currentTime = TimeService::getCurrentTime();
        
        $availableTests = Limit_b1::where(function($query) use ($currentTime) {
            $query->where('end_date', '>', $currentTime)
                  ->where('start_date', '<=', $currentTime)
                  ->where('max_submissions', '>', function($query) {
                      $query->selectRaw('COUNT(*)')
                            ->from('contact_b1s')
                            ->whereColumn('contact_b1s.test_id', 'limit_b1s.id');
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
}