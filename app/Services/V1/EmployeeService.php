<?php

namespace App\Services\V1;

use App\Repositories\V1\EmployeeRepository;

class EmployeeService
{
    protected $employeeRepository;

    public function __construct(EmployeeRepository $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    public function getAllEmployees()
    {
        $employees = $this->employeeRepository->getAllEmployees();

        return $employees->map(function ($employee) {
            return [
                'id' => $employee->id,
                'personal_id' => $employee->personal_id,
                'first_name' => $employee->first_name,
                'last_name' => $employee->last_name,
                'full_name' => $employee->full_name,
                'birth_date' => $employee->birth_date,
                'age' => $employee->age,
                'start_date' => $employee->start_date,
                'seniority' => $employee->seniority,
                'gender' => $employee->gender,
                'company' => [
                    'id' => $employee->company->id,
                    'name' => $employee->company->name,
                ],
                'workplace' => [
                    'id' => $employee->workplace->id,
                    'name' => $employee->workplace->name,
                ],
                'position' => [
                    'id' => $employee->position->id,
                    'name' => $employee->position->name,
                ],
                'country' => [
                    'id' => $employee->country->id,
                    'name' => $employee->country->name,
                ],
            ];
        });
    }

    public function getEmployeeById($id)
    {
        return $this->employeeRepository->find($id);
    }

    public function createEmployee(array $data)
    {
        return $this->employeeRepository->create($data);
    }

    public function updateEmployee($id, array $data)
    {
        $employee = $this->employeeRepository->find($id);
        return $this->employeeRepository->update($employee, $data);
    }

    public function deleteEmployee($id)
    {
        $employee = $this->employeeRepository->find($id);
        return $this->employeeRepository->delete($employee);
    }
}
