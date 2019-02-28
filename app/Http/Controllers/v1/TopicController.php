<?php

/**
 * Created by: luongquocdinh
 * Date: 2019-02-28
 */

namespace App\Http\Controllers\v1;

use App\Http\Controllers\RestApiController;
use App\Business\BusinessTopic;
use App\Business\BusinessUser;
use Illuminate\Http\Request;

class TopicController extends RestApiController
{
    public function create(Request $request)
    {
        $input = $request->all();

        $data = BusinessTopic::getInstance()->create($input);

        return self::success($data);
    }

    public function follow($user_id, Request $request)
    {
        $topic_ids = $request->topic_ids;
        $user = BusinessUser::getInstance()->getFirstCondition(['id' => $user_id]);

        $user->topics()->attach($topic_ids);

        return self::success($user);
    }
}