<?php

namespace App\Containers\Brand\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class BrandRepository
 */
class BrandRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name' => 'like',
        // ...
    ];

}
