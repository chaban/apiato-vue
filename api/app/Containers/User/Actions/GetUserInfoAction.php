<?php

namespace App\Containers\User\Actions;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\User\Models\User;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action;
use App\Ship\Transporters\DataTransporter;
use Illuminate\Support\Facades\Auth;

/**
 * Class GetUserInfoAction.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class GetUserInfoAction extends Action
{

    /**
     * @param \App\Ship\Transporters\DataTransporter $data
     *
     * @return  \App\Containers\User\Models\User
     */
    public function run(DataTransporter $data): User
    {
        $user = Apiato::call('User@FindUserByIdTask', [Auth::user()->id]);

        if (!$user) {
            throw new NotFoundException();
        }

        return $user;
    }

}
