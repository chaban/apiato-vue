<?php

namespace App\Containers\Category\UI\API\Transformers;

use App\Containers\Category\Models\Category;
use App\Ship\Parents\Transformers\Transformer;

class CategoryTransformer extends Transformer
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
     * @param Category $entity
     *
     * @return array
     */
    public function transform(Category $entity)
    {
        $response = [
            'object'     => 'Category',
            'hash_id'         => $entity->getHashedKey(),
            'name'       => $entity->name,
            'attr' => json_decode($entity->attr),
            'created_at' => $entity->created_at,
            'updated_at' => $entity->updated_at,

        ];

        $response = $this->ifAdmin([
            'id' => $entity->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);

        return $response;
    }
}
