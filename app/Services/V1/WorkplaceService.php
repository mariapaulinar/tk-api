<?php

namespace App\Services\V1;

use App\Repositories\V1\WorkplaceRepository;

class WorkplaceService
{
    protected $workplaceRepository;

    public function __construct(WorkplaceRepository $workplaceRepository)
    {
        $this->workplaceRepository = $workplaceRepository;
    }

    public function getAllWorkplaces()
    {
        return $this->workplaceRepository->all();
    }

    public function getWorkplaceById($id)
    {
        return $this->workplaceRepository->find($id);
    }

    public function createWorkplace(array $data)
    {
        return $this->workplaceRepository->create($data);
    }

    public function updateWorkplace($id, array $data)
    {
        $workplace = $this->workplaceRepository->find($id);
        return $this->workplaceRepository->update($workplace, $data);
    }

    public function deleteWorkplace($id)
    {
        $workplace = $this->workplaceRepository->find($id);
        return $this->workplaceRepository->delete($workplace);
    }
}
