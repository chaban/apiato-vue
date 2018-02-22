<?php

namespace App\Containers\Brand\UI\API\Transformers;

use App\Containers\Brand\Models\Brand;
use App\Ship\Parents\Transformers\Transformer;

class BrandTransformer extends Transformer
{

    /**
     * @var  array
     */
    protected $defaultIncludes = [

    ];

    /**
     * @var  array
     */
    protected $availableIncludes = [

    ];

    /**
     * @param Brand $entity
     *
     * @return array
     */
    public function transform(Brand $entity)
    {
        $response = [
            'object'      => 'Brand',
            'id'          => $entity->getHashedKey(),
            'name'        => $entity->name,
            'description' => $entity->description,
            'created_at'  => $entity->created_at,
            'updated_at'  => $entity->updated_at,
            'readable_created_at' => $entity->created_at->diffForHumans(),
            'readable_updated_at' => $entity->updated_at->diffForHumans(),

        ];

        $response = $this->ifAdmin([
            'real_id' => $entity->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);

        return $response;
    }
}
