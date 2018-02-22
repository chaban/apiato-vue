<?php

namespace App\Containers\Product\UI\API\Transformers;

use App\Containers\Product\Models\Product;
use App\Ship\Parents\Transformers\Transformer;

class ProductTransformer extends Transformer
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
     * @param Product $entity
     *
     * @return array
     */
    public function transform(Product $entity)
    {
        $response = [
            'object'              => 'Product',
            'id'                  => $entity->getHashedKey(),
            'category_id'         => $entity->category_id,
            'name'                => $entity->name,
            'desc'                => $entity->desc,
            'price'               => $entity->price,
            'attr'                => json_decode($entity->attr),
            'created_at'          => $entity->created_at,
            'updated_at'          => $entity->updated_at,
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
