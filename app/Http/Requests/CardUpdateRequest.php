<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CardUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'rfid' => ['required', 'max:255', 'string'],
            'security_key' => ['required', 'max:255', 'string'],
            'balance' => ['required', 'numeric'],
            'status' => ['required', 'in:active,inactive'],
            'student_id' => ['required', 'exists:students,id'],
        ];
    }
}
