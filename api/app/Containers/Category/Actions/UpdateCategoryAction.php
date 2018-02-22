<?php

namespace App\Containers\Category\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateCategoryAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            'name', 'attr'
        ]);
        $data['attr'] = json_encode($data['attr']);

        $category = Apiato::call('Category@UpdateCategoryTask', [$request->id, $data]);

        return $category;
    }
}
