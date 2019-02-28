<?php

namespace App\Http\Middleware;

use Closure;
use Facebook\Facebook;
use App\Helpers\HttpCode;

class CheckToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $fb = new \Facebook\Facebook([
            'app_id' => env ( 'FB_CLIENT_ID' ),
            'app_secret' => env ( 'FB_CLIENT_SECRET' ),
            'default_graph_version' => 'v3.2',
        ]);

        try {
            $response = $fb->get('me');
            
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            return response()->json([
                'success' => false,
                'status' => HttpCode::UNAUTHORIZED,
                'message' => $message
            ]);
        }


        return $next($request);
    }
}
