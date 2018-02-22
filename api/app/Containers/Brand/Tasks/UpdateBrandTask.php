<?php

namespace App\Containers\Brand\Tasks;

use App\Containers\Brand\Data\Repositories\BrandRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateBrandTask extends Task
{

    private $repository;

    public function __construct(BrandRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        try {
            return $this->repository->update($data, $id);
        }
        catch (Exception $exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
