<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMenuRequest extends FormRequest
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
        $yesterday = date('Y-m-d', strtotime('-1 day'));

        return [
            'title' => ['required', 'string'],
            'start_at' => ['required', 'date', 'after:' . $yesterday],
            'plan' => ['required', 'array']
        ];
    }
}
