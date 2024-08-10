<?php

namespace App\Repositories\V1;

use App\Models\V1\Company;

class CompanyRepository
{
    public function all()
    {
        return Company::all();
    }

    public function find($id)
    {
        return Company::findOrFail($id);
    }

    public function create(array $data)
    {
        return Company::create($data);
    }

    public function update(Company $company, array $data)
    {
        $company->update($data);
        return $company;
    }

    public function delete(Company $company)
    {
        $company->delete();
        return $company;
    }
}
