<?php

namespace App\Repositories\V1;

use App\Models\V1\Employee;

class EmployeeRepository
{
    public function getAllEmployees()
    {
        return Employee::with(['company:id,name', 'workplace:id,name', 'position:id,name', 'country:id,name'])->get();
    }

    public function find($id)
    {
        return Employee::findOrFail($id);
    }

    public function create(array $data)
    {
        return Employee::create($data);
    }

    public function update(Employee $employee, array $data)
    {
        $employee->update($data);
        return $employee;
    }

    public function delete(Employee $employee)
    {
        $employee->delete();
        return $employee;
    }
}
