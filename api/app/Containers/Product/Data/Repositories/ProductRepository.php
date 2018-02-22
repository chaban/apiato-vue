<?php

namespace App\Containers\Product\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class ProductRepository
 */
class ProductRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name' => 'like',
        // ...
    ];

}
