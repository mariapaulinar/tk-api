<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\CompanyRequest;
use App\Services\V1\CompanyService;
use Illuminate\Http\JsonResponse;

class CompanyController extends Controller
{
    protected $companyService;

    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    public function index(): JsonResponse
    {
        return response()->json($this->companyService->getAllCompanies());
    }

    public function show($id): JsonResponse
    {
        return response()->json($this->companyService->getCompanyById($id));
    }

    public function store(CompanyRequest $request): JsonResponse
    {
        return response()->json($this->companyService->createCompany($request->validated()), 201);
    }

    public function update(CompanyRequest $request, $id): JsonResponse
    {
        return response()->json($this->companyService->updateCompany($id, $request->validated()));
    }

    public function destroy($id): JsonResponse
    {
        $this->companyService->deleteCompany($id);
        return response()->json(null, 204);
    }
}

