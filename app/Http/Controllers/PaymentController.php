<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tarsoft\Toyyibpay\Toyyibpay as ToyyibpayToyyibpay;
use Tarsoft\Toyyibpay\ToyyibpayFacade;
use Tarsoft\Toyyibpay\ToyyibpayServiceProvider;
use Toyyibpay;

class PaymentController extends Controller
{
    public function CreateBill(Request $request, Student $student, User $user)
    {
        $category_code = config('toyyibpay.category_code');

        // Get the currently logged-in user
        $loggedInUser = Auth::user();

        // Retrieve the card associated with the student
        $card = $student->card;

        // Extract user name and email
        $user = [
            'name' => $loggedInUser->name,
            'email' => $loggedInUser->email,
            'phone_no' => $loggedInUser->phone_no,
        ];

        $amount = $request->input('amount');
        $amount *= 100;

        $bill_object = [
            'billName' => 'Card Reload',
            'billDescription' => 'testdesc',
            'billPriceSetting' => 0,
            'billPayorInfo' => 1,
            'billAmount' => $amount,
            'billExternalReferenceNo' => 'AFR341DFI',
            'billTo' => $user['name'],
            'billEmail' => $user['email'],
            'billPhone' => $user['phone_no'],
        ];

        $data = ToyyibpayFacade::createBill($category_code, (object)$bill_object);

        dd($data);

        return redirect()->route('cards.createBill');
    }
}
