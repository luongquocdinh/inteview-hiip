<?php

/**
 * Created by: luongquocdinh
 * Date: 2019-02-28
 */

namespace App\Http\Controllers\v1;

use App\Http\Controllers\RestApiController;
use Illuminate\Http\Request;
use App\Business\BusinessSocial;

class AuthController extends RestApiController
{
    public function facebook (Request $request)
    {
        $access_token = $request->access_token;
        $user = BusinessSocial::getInstance()->facebook($access_token);

        return self::success($user);
    }
}