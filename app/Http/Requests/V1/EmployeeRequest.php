<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'personal_id' => 'required|string|max:255|unique:employees,personal_id,' . $this->route('employee'),
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'start_date' => 'required|date',
            'gender' => 'required|in:male,female,undefined',
            'company_id' => 'required|exists:companies,id',
            'workplace_id' => 'required|exists:workplaces,id',
            'position_id' => 'required|exists:positions,id',
            'country_id' => 'required|exists:countries,id',
        ];
    }
}

