<?php

namespace App\Services\V1;

use App\Repositories\V1\CompanyRepository;

class CompanyService
{
    protected $companyRepository;

    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    public function getAllCompanies()
    {
        return $this->companyRepository->all();
    }

    public function getCompanyById($id)
    {
        return $this->companyRepository->find($id);
    }

    public function createCompany(array $data)
    {
        return $this->companyRepository->create($data);
    }

    public function updateCompany($id, array $data)
    {
        $company = $this->companyRepository->find($id);
        return $this->companyRepository->update($company, $data);
    }

    public function deleteCompany($id)
    {
        $company = $this->companyRepository->find($id);
        return $this->companyRepository->delete($company);
    }
}
