<?php

namespace App\Http\Controllers\Api\V1;

use App\Services\V1\UserService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return response()->json($this->userService->getAllUsers());
    }

    public function store(Request $request)
    {
        $result = $this->userService->createUser($request->all());

        if (isset($result['errors'])) {
            return response()->json($result['errors'], 422);
        }

        return response()->json(['message' => 'User created successfully', 'user' => $result['user']], 201);
    }

    public function show($id)
    {
        $result = $this->userService->getUserById($id);

        if (isset($result['error'])) {
            return response()->json($result['error'], 404);
        }

        return response()->json($result['user']);
    }

    public function update(Request $request, $id)
    {
        $result = $this->userService->updateUser($id, $request->all());

        if (isset($result['errors'])) {
            return response()->json($result['errors'], 422);
        }

        if (isset($result['error'])) {
            return response()->json($result['error'], 404);
        }

        return response()->json(['message' => 'User updated successfully', 'user' => $result['user']]);
    }

    public function destroy($id)
    {
        $result = $this->userService->deleteUser($id);

        if (isset($result['error'])) {
            return response()->json($result['error'], 404);
        }

        return response()->json(['message' => $result['message']]);
    }
}
