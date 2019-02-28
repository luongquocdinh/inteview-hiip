<?php
/**
 * Created by: luongquocdinh
 * Date: 2019-02-28
 */
namespace App\Business;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Facebook\Facebook;

class BusinessSocial implements BusinessInterface
{
    static protected $_instance = NULL;

    /**
     * Use singleton pattern
     *
     * @return Users object
     */
    static public function getInstance()
    {
        if (self::$_instance === NULL) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    public function facebook ($access_token)
    {
        $fb = new \Facebook\Facebook([
            'app_id' => env ( 'FB_CLIENT_ID' ),
            'app_secret' => env ( 'FB_CLIENT_SECRET' ),
            'default_graph_version' => 'v3.2',
        ]);

        try {
            $response = $fb->get('/me?fields=id,name,email,link,birthday,gender', $access_token);
            $profile = $response->getGraphUser();
            $data = [
                'facebook_id' => $profile['id'],
                'name' => $profile['name'],
                'email' => $profile['email'],
                'link' => $profile['link'],
                'birthday' => $profile['birthday'],
                'gender' => $profile['gender']
            ];

            return $data;
        } catch (Exception $e) {
            dd ($e);
        }
    }
}