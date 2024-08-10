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
        return $this->employeeRepository->all();
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
