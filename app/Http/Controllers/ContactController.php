<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Limit;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ContactController extends Controller
{
    public function index()
{
    $contacts = Contact::all();
    return view('contacts.index', compact('contacts'));
}
public function countContacts()
{
    return response()->json(['count' => Contact::count()]); // Contact modelidan foydalanib, mavjud murojaatlar sonini olish
}
    public function checkLimits()
    {
        $limit = Limit::first();
        $contactCount = Contact::count();

        $isLimitReached = false;

        if ($limit) {
            if ($limit->end_date && Carbon::now()->isAfter($limit->end_date)) {
                $isLimitReached = true;
            }

            if ($limit->max_submissions && $contactCount >= $limit->max_submissions) {
                $isLimitReached = true;
            }
        }

        return response()->json(['isLimitReached' => $isLimitReached]);
    }

    public function submitForm(Request $request)
    {
        // Limitlarni tekshirish
        $limitsResponse = $this->checkLimits();
        if ($limitsResponse->getData()->isLimitReached) {
            return response()->json(['error' => 'Limit tugagan'], 403);
        }
    
        $validatedData = $request->validate([
            'fullName' => 'required|string|max:255',
            'phoneNumber' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'city' => 'required|string|max:255',
            'birthDate' => 'required|date',
        ]);
    
        $contact = Contact::create([
            'full_name' => $validatedData['fullName'],
            'phone_number' => $validatedData['phoneNumber'],
            'email' => $validatedData['email'],
            'city' => $validatedData['city'],
            'birth_date' => $validatedData['birthDate'],
        ]);
    
        return response()->json(['message' => 'Ma\'lumotlar muvaffaqiyatli saqlandi'], 201);
    }
    public function deleteLeads(Request $request)
{
    $leadIds = $request->input('lead_ids'); // Get the array of lead IDs
    if ($leadIds) {
        Contact::destroy($leadIds); // Delete the leads
        return redirect()->back()->with('success', 'Leads deleted successfully.');
    }
    return redirect()->back()->with('error', 'No leads selected for deletion.');
}
}