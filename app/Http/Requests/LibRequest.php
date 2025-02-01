<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LibRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'term' => ['sometimes', 'string', 'min:3', 'max:255'],
        ];
    }

    /**
     * Return term search
     *
     * @return string|null
     */
    public function getTerm(): ?string
    {
        return $this->input('term');
    }
}
