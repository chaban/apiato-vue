<?php

namespace App\Containers\Brand\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteBrandAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Brand@DeleteBrandTask', [$request->id]);
    }
}
