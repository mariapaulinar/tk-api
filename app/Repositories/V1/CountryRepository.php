<?php

namespace App\Repositories\V1;

use App\Models\V1\Country;

class CountryRepository
{
    public function all()
    {
        return Country::all();
    }

    public function find($id)
    {
        return Country::findOrFail($id);
    }

    public function create(array $data)
    {
        return Country::create($data);
    }

    public function update(Country $country, array $data)
    {
        $country->update($data);
        return $country;
    }

    public function delete(Country $country)
    {
        $country->delete();
        return $country;
    }
}
