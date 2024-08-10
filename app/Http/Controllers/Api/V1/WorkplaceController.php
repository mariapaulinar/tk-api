<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\WorkplaceRequest;
use App\Services\V1\WorkplaceService;
use Illuminate\Http\JsonResponse;

class WorkplaceController extends Controller
{
    protected $workplaceService;

    public function __construct(WorkplaceService $workplaceService)
    {
        $this->workplaceService = $workplaceService;
    }

    public function index(): JsonResponse
    {
        return response()->json($this->workplaceService->getAllWorkplaces());
    }

    public function show($id): JsonResponse
    {
        return response()->json($this->workplaceService->getWorkplaceById($id));
    }

    public function store(WorkplaceRequest $request): JsonResponse
    {
        return response()->json($this->workplaceService->createWorkplace($request->validated()), 201);
    }

    public function update(WorkplaceRequest $request, $id): JsonResponse
    {
        return response()->json($this->workplaceService->updateWorkplace($id, $request->validated()));
    }

    public function destroy($id): JsonResponse
    {
        $this->workplaceService->deleteWorkplace($id);
        return response()->json(null, 204);
    }
}

