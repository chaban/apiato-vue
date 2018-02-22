<?php

namespace App\Containers\Brand\Tasks;

use App\Containers\Brand\Data\Repositories\BrandRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllBrandsTask extends Task
{

    private $repository;

    public function __construct(BrandRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
