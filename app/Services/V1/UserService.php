<?php

namespace App\Services\V1;

use App\Repositories\V1\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function createUser(array $data)
    {
        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        $data['password'] = Hash::make($data['password']);

        $user = $this->userRepository->create($data);

        return ['user' => $user];
    }

    public function getAllUsers()
    {
        return $this->userRepository->all();
    }

    public function getUserById($id)
    {
        $user = $this->userRepository->find($id);
        if (!$user) {
            return ['error' => 'User not found'];
        }
        return ['user' => $user];
    }

    public function updateUser($id, array $data)
    {
        $validator = Validator::make($data, [
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'sometimes|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        $user = $this->userRepository->update($id, $data);

        if (!$user) {
            return ['error' => 'User not found or update failed'];
        }

        return ['user' => $user];
    }

    public function deleteUser($id)
    {
        $deleted = $this->userRepository->delete($id);
        if (!$deleted) {
            return ['error' => 'User not found or delete failed'];
        }
        return ['message' => 'User deleted successfully'];
    }

    public function updateProfile($user, array $data)
    {
        // Validar los datos recibidos
        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        // Actualizar el perfil del usuario
        return $this->userRepository->updateProfile($user, $data);
    }
}

