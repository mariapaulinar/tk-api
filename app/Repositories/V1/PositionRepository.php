<?php

namespace App\Repositories\V1;

use App\Models\V1\Position;

class PositionRepository
{
    public function all()
    {
        return Position::all();
    }

    public function find($id)
    {
        return Position::findOrFail($id);
    }

    public function create(array $data)
    {
        return Position::create($data);
    }

    public function update(Position $position, array $data)
    {
        $position->update($data);
        return $position;
    }

    public function delete(Position $position)
    {
        $position->delete();
        return $position;
    }
}
