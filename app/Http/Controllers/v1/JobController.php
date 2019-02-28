<?php

/**
 * Created by: luongquocdinh
 * Date: 2019-02-28
 */

namespace App\Http\Controllers\v1;

use App\Http\Controllers\RestApiController;
use App\Business\BusinessJob;
use App\Business\BusinessUser;
use Illuminate\Http\Request;

class JobController extends RestApiController
{
    public function create(Request $request)
    {
        $input = $request->all();

        $data = BusinessJob::getInstance()->create($input);

        return self::success($data);
    }

    public function follow($user_id, Request $request)
    {
        $job_ids = $request->job_ids;
        $user = BusinessUser::getInstance()->getFirstCondition(['id' => $user_id]);

        $user->jobs()->attach($job_ids);

        return self::success($user);
    }
}