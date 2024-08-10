<?php

namespace App\Repositories\V1;

use App\Models\V1\Workplace;

class WorkplaceRepository
{
    public function all()
    {
        return Workplace::all();
    }

    public function find($id)
    {
        return Workplace::findOrFail($id);
    }

    public function create(array $data)
    {
        return Workplace::create($data);
    }

    public function update(Workplace $workplace, array $data)
    {
        $workplace->update($data);
        return $workplace;
    }

    public function delete(Workplace $workplace)
    {
        $workplace->delete();
        return $workplace;
    }
}
