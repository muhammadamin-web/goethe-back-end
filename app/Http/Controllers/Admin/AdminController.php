<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use App\Models\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\Limit_a2;
use App\Models\Limit_a3;
use App\Models\Limit_b1;

class AdminController extends Controller
{
    /**
     * Admin dashboard ma'lumotlarini qaytaradi.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    // public function dashboard()
    // {
    //     $totalContacts = Contact::count();
    //     $recentContacts = Contact::latest()->take(5)->get();
    //     $limit = Limit::first();

    //     return response()->json([
    //         'status' => 'success',
    //         'data' => [
    //             'totalContacts' => $totalContacts,
    //             'recentContacts' => $recentContacts,
    //             'limit' => $limit
    //         ]
    //     ]);
    // }

    /**
     * Barcha kontaktlarni qaytaradi.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    // public function index()
    // {
    //     $contacts = Contact::latest()->paginate(10);

    //     return response()->json([
    //         'status' => 'success',
    //         'data' => $contacts
    //     ]);
    // }

    /**
     * Yangi kontakt yaratadi.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    // public function store(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'full_name' => 'required|string|max:255',
    //         'phone_number' => 'required|string|max:20',
    //         'email' => 'required|email|max:255',
    //         'city' => 'required|string|max:255',
    //         'birth_date' => 'required|date',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json([
    //             'status' => 'error',
    //             'message' => 'Validation error',
    //             'errors' => $validator->errors()
    //         ], 422);
    //     }

    //     $contact = Contact::create($validator->validated());

    //     return response()->json([
    //         'status' => 'success',
    //         'message' => 'Contact created successfully',
    //         'data' => $contact
    //     ], 201);
    // }

    /**
     * Ma'lum bir kontaktni qaytaradi.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    // public function show($id)
    // {
    //     $contact = Contact::findOrFail($id);

    //     return response()->json([
    //         'status' => 'success',
    //         'data' => $contact
    //     ]);
    // }

    /**
     * Ma'lum bir kontaktni yangilaydi.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    // public function update(Request $request, $id)
    // {
    //     $contact = Contact::findOrFail($id);

    //     $validator = Validator::make($request->all(), [
    //         'full_name' => 'required|string|max:255',
    //         'phone_number' => 'required|string|max:20',
    //         'email' => 'required|email|max:255',
    //         'city' => 'required|string|max:255',
    //         'birth_date' => 'required|date',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json([
    //             'status' => 'error',
    //             'message' => 'Validation error',
    //             'errors' => $validator->errors()
    //         ], 422);
    //     }

    //     $contact->update($validator->validated());

    //     return response()->json([
    //         'status' => 'success',
    //         'message' => 'Contact updated successfully',
    //         'data' => $contact
    //     ]);
    // }

    /**
     * Ma'lum bir kontaktni o'chiradi.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    // public function destroy($id)
    // {
    //     $contact = Contact::findOrFail($id);
    //     $contact->delete();

    //     return response()->json([
    //         'status' => 'success',
    //         'message' => 'Contact deleted successfully'
    //     ]);
    // }

    /**
     * Limitlarni qaytaradi.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getLimits()
    {
        $limit = Limit::first();

        return response()->json([
            'status' => 'success',
            'data' => $limit
        ]);
    }



    public function getLimits_a2()
    {
        $limit = Limit_a2::first();

        return response()->json([
            'status' => 'success',
            'data' => $limit
        ]);
    }

    public function getLimits_b1()
    {
        $limit = Limit_b1::first();

        return response()->json([
            'status' => 'success',
            'data' => $limit
        ]);
    }

    /**
     * Limitlarni yangilaydi.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    // public function updateLimits(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'end_date' => 'nullable|date',
    //         'max_submissions' => 'nullable|integer|min:1',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json([
    //             'status' => 'error',
    //             'message' => 'Validation error',
    //             'errors' => $validator->errors()
    //         ], 422);
    //     }

    //     $limit = Limit::firstOrCreate();
    //     $limit->update($validator->validated());

    //     return response()->json([
    //         'status' => 'success',
    //         'message' => 'Limits updated successfully',
    //         'data' => $limit
    //     ]);
    // }

    /**
     * Forma ma'lumotlarini qabul qiladi.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    // public function submitData(Request $request)
    // {
    //     // Limitlarni tekshirish
    //     $currentLimit = Limit::first(); // Limitlar modelidan birinchi yozuvni olish
    //     if ($currentLimit->isExpired()) {
    //         return response()->json(['error' => 'Limit tugagan'], 403);
    //     }

    //     // Ma'lumotlarni saqlash
    //     $contact = new Contact();
    //     $contact->full_name = $request->input('fullName');
    //     $contact->phone_number = $request->input('phoneNumber');
    //     $contact->email = $request->input('email');
    //     $contact->save();

    //     return response()->json(['success' => 'Ma\'lumotlar muvaffaqiyatli saqlandi']);
    // }
}