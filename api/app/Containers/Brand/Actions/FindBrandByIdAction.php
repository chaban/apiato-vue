<?php

namespace App\Containers\Brand\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindBrandByIdAction extends Action
{
    public function run(Request $request)
    {
        $brand = Apiato::call('Brand@FindBrandByIdTask', [$request->id]);

        return $brand;
    }
}
