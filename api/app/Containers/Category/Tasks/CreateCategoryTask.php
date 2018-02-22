<?php

namespace App\Containers\Category\Tasks;

use App\Containers\Category\Models\Category;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateCategoryTask extends Task
{

    public function run(array $data)
    {
        try {
            $category = Category::where('id', $data['id'])->first();

            return $category->children()->create(['name' => $data['name']]);
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
