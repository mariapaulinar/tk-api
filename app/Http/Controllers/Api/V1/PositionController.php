<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\PositionRequest;
use App\Services\V1\PositionService;
use Illuminate\Http\JsonResponse;

class PositionController extends Controller
{
    protected $positionService;

    public function __construct(PositionService $positionService)
    {
        $this->positionService = $positionService;
    }

    public function index(): JsonResponse
    {
        return response()->json($this->positionService->getAllPositions());
    }

    public function show($id): JsonResponse
    {
        return response()->json($this->positionService->getPositionById($id));
    }

    public function store(PositionRequest $request): JsonResponse
    {
        return response()->json($this->positionService->createPosition($request->validated()), 201);
    }

    public function update(PositionRequest $request, $id): JsonResponse
    {
        return response()->json($this->positionService->updatePosition($id, $request->validated()));
    }

    public function destroy($id): JsonResponse
    {
        $this->positionService->deletePosition($id);
        return response()->json(null, 204);
    }
}

