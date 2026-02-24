<?php

namespace App\Http\Requests;

use App\Enums\BookingStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StoreBookingRequest extends FormRequest
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
            'customer_id'  => ['required', 'exists:customers,id'],
            'service_id'   => ['required', 'exists:services,id'],
            'scheduled_at' => ['required', 'date'],
            'status' => ['sometimes', new Enum(BookingStatus::class)],
        ];
    }

    public function messages()
    {
        return [
            'status.enum' => 'The selected status is invalid'
        ];
    }
    
}
