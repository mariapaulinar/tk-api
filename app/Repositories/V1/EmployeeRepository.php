<?php

namespace App\Repositories\V1;

use App\Models\V1\Employee;

class EmployeeRepository
{
    public function all()
    {
        return Employee::all();
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
