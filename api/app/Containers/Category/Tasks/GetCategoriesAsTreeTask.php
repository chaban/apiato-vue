<?php

namespace App\Containers\Category\Tasks;

use App\Containers\Category\Models\Category;
use App\Ship\Parents\Tasks\Task;
use App\Ship\Parents\Requests\Request;

class GetCategoriesAsTreeTask extends Task
{

    public function run(Request $request)
    {
        if ($request->has('flat')) {
            return Category::get()->toFlatTree()->map(function ($item, $key) {
                return ['id' => $item->id, 'name' => $item->name, 'attr' => $item->attr];
                })->all();
        } else {
            return Category::get()->toTree();
        }
    }
}
