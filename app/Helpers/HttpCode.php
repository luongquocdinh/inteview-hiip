<?php

/**
 * Created by: luongquocdinh
 * Date: 2019-02-28
 */

namespace App\Helpers;

class HttpCode
{
    const PER_PAGE = 15;

    // META HTTP CODE
    const SUCCESS = 200;

    const NOT_MODIFIED = 304;

    const BAD_REQUEST = 400;
    const UNAUTHORIZED = 401;
    const NOT_FOUND = 404;
    const FORBIDDEN = 403;

    const SERVER_ERROR = 500;
    const SERVER_UNAVAILABLE = 503;
}