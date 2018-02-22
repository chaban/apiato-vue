<?php

namespace App\Containers\Category\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetCategoriesAsTreeAction extends Action
{
    public function run(Request $request)
    {
        $categories = Apiato::call('Category@GetCategoriesAsTreeTask', [$request]);

        return $categories;
    }
}
