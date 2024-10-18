<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDASS21Request extends FormRequest
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
            'q1' => 'required|integer',
            'q2' => 'required|integer',
            'q3' => 'required|integer',
            'q4' => 'required|integer',
            'q5' => 'required|integer',
            'q6' => 'required|integer',
            'q7' => 'required|integer',
            'q8' => 'required|integer',
            'q9' => 'required|integer',
            'q10' => 'required|integer',
            'q11' => 'required|integer',
            'q12' => 'required|integer',
            'q13' => 'required|integer',
            'q14' => 'required|integer',
            'q15' => 'required|integer',
            'q16' => 'required|integer',
            'q17' => 'required|integer',
            'q18' => 'required|integer',
            'q19' => 'required|integer',
            'q20' => 'required|integer',
            'q21' => 'required|integer',
        ];
    }
}
