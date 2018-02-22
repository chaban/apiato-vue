<?php

namespace App\Containers\Product\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindProductByIdAction extends Action
{
    public function run(Request $request)
    {
        $product = Apiato::call('Product@FindProductByIdTask', [$request->id]);

        return $product;
    }
}
