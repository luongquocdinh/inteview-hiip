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
            'app_id' => '',
            'app_secret' => '',
            'default_graph_version' => 'v3.2',
        ]);

        try {
            $response = $fb->get('/me?fields=id,name,email,link,birthday', $access_token);
            dd($response->getGraphUser());
        } catch (Exception $e) {
            dd ($e);
        }
    }
}