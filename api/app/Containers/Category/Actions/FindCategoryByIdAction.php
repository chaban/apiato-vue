<?php

namespace App\Containers\Category\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindCategoryByIdAction extends Action
{
    public function run(Request $request)
    {
        $category = Apiato::call('Category@FindCategoryByIdTask', [$request->id]);

        return $category;
    }
}
