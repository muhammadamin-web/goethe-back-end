<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Limit;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;
use App\Services\TimeService;

class ContactController extends Controller
{
    // Xabarlar uchun til lug'atlari
    private $messages = [
        'de' => [
            'test_not_found' => 'Test nicht gefunden',
            'test_expired' => 'Die Anmeldefrist für diesen Test ist abgelaufen',
            'test_limit_reached' => 'Die maximale Teilnehmerzahl für diesen Test wurde erreicht',
            'phone_already_registered' => 'Diese Telefonnummer wurde bereits registriert',
            'phone_already_registered_detail' => 'Diese Telefonnummer wurde bereits für einen Test registriert',
            'validation_error' => 'Validierungsfehler',
            'server_error' => 'Ein Serverfehler ist aufgetreten',
            'success' => 'Ihre Anmeldung wurde erfolgreich gespeichert',
            'test_not_started' => 'Der Test hat noch nicht begonnen'
        ],
        'ru' => [
            'test_not_found' => 'Тест не найден',
            'test_expired' => 'Срок регистрации на этот тест истек',
            'test_limit_reached' => 'Достигнуто максимальное количество участников для этого теста',
            'phone_already_registered' => 'Этот номер телефона уже зарегистрирован',
            'phone_already_registered_detail' => 'Этот номер телефона уже зарегистрирован для теста',
            'validation_error' => 'Ошибка валидации',
            'server_error' => 'Произошла ошибка на сервере',
            'success' => 'Ваша заявка успешно сохранена',
            'test_not_started' => 'Тест еще не начался'
        ],
        'uz' => [
            'test_not_found' => 'Test topilmadi',
            'test_expired' => 'Ushbu test uchun ro\'yxatdan o\'tish muddati tugagan',
            'test_limit_reached' => 'Ushbu test uchun maksimal ishtirokchilar soni to\'lgan',
            'phone_already_registered' => 'Bu telefon raqami allaqachon ro\'yxatdan o\'tgan',
            'phone_already_registered_detail' => 'Bu telefon raqami allaqachon test uchun ro\'yxatdan o\'tgan',
            'validation_error' => 'Ma\'lumotlarni tekshirishda xatolik',
            'server_error' => 'Serverda xatolik yuz berdi',
            'success' => 'Arizangiz muvaffaqiyatli saqlandi',
            'test_not_started' => 'Test hali boshlanmagan'
        ]
    ];

    // Foydalanuvchi tilini aniqlash
    private function getLocale(Request $request)
    {
        $locale = $request->header('Accept-Language');
        if ($locale) {
            // Accept-Language headeridan 2 harfli til kodini olish
            $locale = substr($locale, 0, 2);
        }
        
        // Agar til mavjud bo'lmasa yoki bizda bu til uchun xabarlar bo'lmasa, nemis tilini ishlatamiz
        if (!$locale || !isset($this->messages[$locale])) {
            $locale = 'de'; // Default til - nemis
        }
        
        return $locale;
    }

    // Xabarni qaytarish
    private function getMessage(Request $request, $key)
    {
        $locale = $this->getLocale($request);
        return $this->messages[$locale][$key];
    }

    public function index(Request $request)
    {
        $testId = $request->input('test_id');
        $query = Contact::query();
        if ($testId) {
            $query->where('test_id', $testId);
        }
        $contacts = $query->get();
        $tests = Limit::all();
        return view('contacts.index', compact('contacts', 'tests', 'testId'));
    }

    public function countContacts()
    {
        return response()->json(['count' => Contact::count()]);
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

        return response()->json(['isLimitReached' => $isLimitReached, 'limit' => $limit]);
    }

    public function submitForm(Request $request)
    {
        try {
            // Joriy vaqtni olish - server vaqti noto'g'ri bo'lsa ham ishlaydigan usul
            $currentTime = TimeService::getCurrentTime();
            
            // Limitlarni tekshirish
            $limit = Limit::find($request->test_id);
            
            if (!$limit) {
                return response()->json(['message' => $this->getMessage($request, 'test_not_found')], 404);
            }

            // Test boshlanish vaqtini tekshirish
            if ($limit->start_date && $currentTime->isBefore($limit->start_date)) {
                return response()->json(['message' => $this->getMessage($request, 'test_not_started')], 403);
            }

            if ($limit->end_date && $currentTime->isAfter($limit->end_date)) {
                return response()->json(['message' => $this->getMessage($request, 'test_expired')], 403);
            }

            $currentCount = Contact::where('test_id', $request->test_id)->count();
            if ($limit->max_submissions && $currentCount >= $limit->max_submissions) {
                return response()->json(['message' => $this->getMessage($request, 'test_limit_reached')], 403);
            }

            // Validatsiya
            $validatedData = $request->validate([
                'full_name' => 'required|string|max:255',
                'phone_number' => 'required|string|max:20',
                'email' => 'required|email|max:255',
                'city' => 'required|string|max:255',
                'birth_date' => 'required|date',
                'test_id' => 'required|integer|exists:limits,id'
            ]);

            // Telefon raqami tekshirish
            if (Contact::where('phone_number', $validatedData['phone_number'])->exists()) {
                return response()->json([
                    'message' => $this->getMessage($request, 'phone_already_registered'),
                    'errors' => [
                        'phone_number' => [$this->getMessage($request, 'phone_already_registered_detail')]
                    ]
                ], 422);
            }

            // Ma'lumotlarni saqlash
            $contact = Contact::create([
                'full_name' => $validatedData['full_name'],
                'phone_number' => $validatedData['phone_number'],
                'email' => $validatedData['email'],
                'city' => $validatedData['city'],
                'birth_date' => $validatedData['birth_date'],
                'test_id' => $validatedData['test_id']
            ]);

            return response()->json([
                'message' => $this->getMessage($request, 'success'),
                'data' => $contact
            ], 201);

        } catch (ValidationException $e) {
            return response()->json([
                'message' => $this->getMessage($request, 'validation_error'),
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $this->getMessage($request, 'server_error'),
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function deleteLeads(Request $request)
    {
        $leadIds = $request->input('lead_ids');
        if ($leadIds) {
            Contact::destroy($leadIds);
            return redirect()->back()->with('success', 'Leads deleted successfully.');
        }
        return redirect()->back()->with('error', 'No leads selected for deletion.');
    }
}