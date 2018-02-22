<?php

namespace App\Containers\Brand\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllBrandsAction extends Action
{
    public function run(Request $request)
    {
        $brands = Apiato::call('Brand@GetAllBrandsTask');

        return $brands;
    }
}
