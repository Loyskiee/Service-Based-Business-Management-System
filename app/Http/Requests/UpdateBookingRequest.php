<?php

namespace App\Http\Requests;

use App\Enums\BookingStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class UpdateBookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
           'customer_id'  => ['sometimes', 'exists:customers,id'],
            'service_id'   => ['sometimes, exists:services,id'],
            'scheduled_at' => ['sometimes', 'date'],
            'status' => ['required', new Enum(BookingStatus::class)],
             
        ];
    }
    
}
