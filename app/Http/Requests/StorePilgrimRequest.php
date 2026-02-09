<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePilgrimRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'passport_number' => ['required', 'string', 'max:20', 'unique:pilgrims,passport_number'],
            'umrah_id' => ['required', 'string', 'max:50', 'unique:pilgrims,umrah_id'],
            'ppiu' => ['required', 'string', 'max:255'],
            'hotel_name' => ['required', 'string', 'max:255'],
            'check_in' => ['required', 'date'],
            'check_out' => ['required', 'date', 'after:check_in'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ];
    }
}
