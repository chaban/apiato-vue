<?php

namespace App\Containers\Category\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteCategoryAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Category@DeleteCategoryTask', [$request->id]);
    }
}
