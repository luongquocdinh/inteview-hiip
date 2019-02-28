<?php

/**
 * Created by: luongquocdinh
 * Date: 2019-02-28
 */

namespace App\Http\Controllers\v1;

use App\Http\Controllers\RestApiController;
use App\Business\BusinessUser;
use Illuminate\Http\Request;

class UserController extends RestApiController
{
    public function profile($user_id)
    {
        $user = BusinessUser::getInstance()->getFirstCondition(['id' => $user_id]);

        $user->topics;
        $user->jobs;

        return self::success($user);
    }

    public function update($user_id, Request $request)
    {
        $input = $request->all();

        $user = BusinessUser::getInstance()->update($user_id, $input);

        $user->topics;
        $user->jobs;

        return self::success($user);
    }
}