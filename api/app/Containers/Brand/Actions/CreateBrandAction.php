<?php

namespace App\Containers\Brand\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateBrandAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            'name', 'description'
        ]);

        $brand = Apiato::call('Brand@CreateBrandTask', [$data]);

        return $brand;
    }
}
