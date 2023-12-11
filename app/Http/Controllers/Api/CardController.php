<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Card;
use App\Models\Scanner;

class CardController extends Controller
{
    /**
     * Store a newly created card with only RFID.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addCard(Request $request)
    {
        // Validate the request data
        $data = $request->validate([
            'rfid' => 'required|string|unique:cards', // Make sure RFID is unique
        ]);

        // Create a new card with only RFID
        $card = Card::create([
            'rfid' => $data['rfid'],
            // You can set default values for other columns if needed
        ]);

        return response()->json(['message' => 'Card created successfully', 'card' => $card], 201);
    }

    /**
     * Update card balance based on RFID and scanner ID.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateCardBalance(Request $request)
    {
        // Validate the request data
        $data = $request->validate([
            'rfid' => 'required|string|exists:cards', // Check if the card with RFID exists
            'scanner_id' => 'required|exists:scanners,id',
        ]);

        // Find the card based on RFID
        $card = Card::where('rfid', $data['rfid'])->first();

        // Find the scanner
        $scanner = Scanner::find($data['scanner_id']);

        // Check if the card and scanner exist
        if (!$scanner || !$card) {
            return response()->json(['error' => 'Card or scanner not found.'], 404);
        }

        // Check if the card status is 'active'
        if ($card->status === 'active') {
            // Calculate the new balance
            $newBalance = $card->balance - $scanner->amount;
            $transaction = $scanner->amount;

            // Determine if the transaction was successful
            $isSuccess = $newBalance >= 0 ? 'yes' : 'no';

            // If the transaction was successful, update the card's balance
            if ($isSuccess === 'yes') {
                $card->update(['balance' => $newBalance]);
            }

            // Attach the card to the scanner with the result of the transaction
            $scanner->cards()->attach($card->id, [
                'is_success' => $isSuccess,
                'transaction_amount' => $transaction
            ]);

            return response()->json(['message' => 'Card balance updated successfully', 'is_success' => $isSuccess]);
        } else {
            // If the card status is 'inactive', set is_success to 'no'
            $isSuccess = 'no';
            $transaction = $scanner->amount;

            // Attach the card to the scanner with the result of the transaction
            $scanner->cards()->attach($card->id, [
                'is_success' => $isSuccess,
                'transaction_amount' => $transaction
            ]);

            return response()->json(['message' => 'Card status is inactive', 'is_success' => $isSuccess]);
        }
    }

}
