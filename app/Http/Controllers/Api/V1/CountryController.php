<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\CountryRequest;
use App\Services\V1\CountryService;
use Illuminate\Http\JsonResponse;

class CountryController extends Controller
{
    protected $countryService;

    public function __construct(CountryService $countryService)
    {
        $this->countryService = $countryService;
    }

    public function index(): JsonResponse
    {
        return response()->json($this->countryService->getAllCountries());
    }

    public function show($id): JsonResponse
    {
        return response()->json($this->countryService->getCountryById($id));
    }

    public function store(CountryRequest $request): JsonResponse
    {
        return response()->json($this->countryService->createCountry($request->validated()), 201);
    }

    public function update(CountryRequest $request, $id): JsonResponse
    {
        return response()->json($this->countryService->updateCountry($id, $request->validated()));
    }

    public function destroy($id): JsonResponse
    {
        $this->countryService->deleteCountry($id);
        return response()->json(null, 204);
    }
}

