<?php

/**
 * Created by: luongquocdinh
 * Date: 2019-02-28
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\RestApiController;
use App\Business\BusinessUser;
use Illuminate\Http\Request;
use App\Helpers\Business;
use Illuminate\Support\Facades\Input;

class AdminUserController extends RestApiController
{
    public function getListUser()
    {
        $list = BusinessUser::getInstance()->paginate();

        return self::success($list);
    }

    public function search (Request $request)
    {
        $search_type = $request->search_type;
        $keyword = $request->keyword;

        switch ($search_type) {
            case Business::SEARCH_NAME:
                $user = BusinessUser::getInstance()->searchName($keyword);
                break;

            case Business::SEARCH_ADDRESS:
                $user = BusinessUser::getInstance()->searchAddress($keyword);
                break;

            case Business::SEARCH_IDENTITY:
                $user = BusinessUser::getInstance()->searchIdentity($keyword);
                break;

            case Business::SEARCH_BANK_NUMBER:
                $user = BusinessUser::getInstance()->searchBankNumber($keyword);
                break;

            case Business::SEARCH_LOGIN_TYPE:
                $user = BusinessUser::getInstance()->searchLoginType($keyword);
                break;
        }

        return self::success($user);
    }
}