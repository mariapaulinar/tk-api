<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\EmployeeRequest;
use App\Services\V1\EmployeeService;
use Illuminate\Http\JsonResponse;

class EmployeeController extends Controller
{
    protected $employeeService;

    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    public function index(): JsonResponse
    {
        return response()->json($this->employeeService->getAllEmployees());
    }

    public function show($id): JsonResponse
    {
        return response()->json($this->employeeService->getEmployeeById($id));
    }

    public function store(EmployeeRequest $request): JsonResponse
    {
        return response()->json($this->employeeService->createEmployee($request->validated()), 201);
    }

    public function update(EmployeeRequest $request, $id): JsonResponse
    {
        return response()->json($this->employeeService->updateEmployee($id, $request->validated()));
    }

    public function destroy($id): JsonResponse
    {
        $this->employeeService->deleteEmployee($id);
        return response()->json(null, 204);
    }
}

