<?php

namespace App\Services\V1;

use App\Repositories\V1\PositionRepository;

class PositionService
{
    protected $positionRepository;

    public function __construct(PositionRepository $positionRepository)
    {
        $this->positionRepository = $positionRepository;
    }

    public function getAllPositions()
    {
        return $this->positionRepository->all();
    }

    public function getPositionById($id)
    {
        return $this->positionRepository->find($id);
    }

    public function createPosition(array $data)
    {
        return $this->positionRepository->create($data);
    }

    public function updatePosition($id, array $data)
    {
        $position = $this->positionRepository->find($id);
        return $this->positionRepository->update($position, $data);
    }

    public function deletePosition($id)
    {
        $position = $this->positionRepository->find($id);
        return $this->positionRepository->delete($position);
    }
}
