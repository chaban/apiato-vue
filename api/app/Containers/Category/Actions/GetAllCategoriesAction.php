<?php

namespace App\Containers\Category\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllCategoriesAction extends Action
{
    public function run(Request $request)
    {
        $categories = Apiato::call('Category@GetAllCategoriesTask', $request);

        return $categories;
    }
}
