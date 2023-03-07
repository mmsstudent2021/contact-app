<?php

namespace App\Http\Requests;

use App\Rules\GenerateTopUp;
use Illuminate\Foundation\Http\FormRequest;

class GenerateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'amount_type' => new GenerateTopUp(),
            'count' => 'required|max:30'
        ];
    }
}
