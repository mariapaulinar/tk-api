<?php

namespace App\Services\V1;

use App\Repositories\V1\CountryRepository;

class CountryService
{
    protected $countryRepository;

    public function __construct(CountryRepository $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }

    public function getAllCountries()
    {
        return $this->countryRepository->all();
    }

    public function getCountryById($id)
    {
        return $this->countryRepository->find($id);
    }

    public function createCountry(array $data)
    {
        return $this->countryRepository->create($data);
    }

    public function updateCountry($id, array $data)
    {
        $country = $this->countryRepository->find($id);
        return $this->countryRepository->update($country, $data);
    }

    public function deleteCountry($id)
    {
        $country = $this->countryRepository->find($id);
        return $this->countryRepository->delete($country);
    }
}
