<?php

namespace App\Containers\Brand\Tasks;

use App\Containers\Brand\Data\Repositories\BrandRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateBrandTask extends Task
{

    private $repository;

    public function __construct(BrandRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        try {
            return $this->repository->create($data);
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
