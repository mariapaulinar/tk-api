<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class WorkplaceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:workplaces,name,' . $this->route('workplace'),
            'company_id' => 'required|exists:companies,id',
        ];
    }
}

