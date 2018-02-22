<?php

namespace App\Containers\Product\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteProductAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Product@DeleteProductTask', [$request->id]);
    }
}
