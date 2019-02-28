<?php

/**
 * Created by: luongquocdinh
 * Date: 2019-02-28
 */

namespace App\Http\Controllers;

use App\Helpers\HttpCode;

class RestApiController extends Controller
{
    public static function success($data, $additional = [])
    {
        return response()->json([
            'success' => true,
            'status' => HttpCode::SUCCESS,
            'data' => $data,
            'additional' => $additional
        ]);
    }

    public static function error($code, $message)
    {
        return response()->json([
            'success' => false,
            'status' => $code,
            'message' => $message
        ]);
    }
}