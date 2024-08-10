<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class PositionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:positions,name,' . $this->route('position'),
        ];
    }
}

