<?php

/**
 * Created by: luongquocdinh
 * Date: 2019-02-28
 */

namespace App\Http\Controllers;

class RestApiController extends Controller
{
    public static function success($data, $additional = [])
    {
        return response()->json([
            'success' => true,
            'status' => self::SUCCESS,
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