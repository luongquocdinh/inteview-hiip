<?php

namespace App\Models\v1;
use App\Models\BaseModel;

class UserJob extends BaseModel
{
    static protected $_instance = NULL;

    /**
     * Use singleton pattern
     *
     * @return UserJob object
     */
    static public function getInstance()
    {
        if (self::$_instance === NULL) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    static public function clearInstance()
    {
        self::$_instance = null;
    }

    protected $table = 'job_user';

    protected $fillable = [
        'user_id', 'job_id'
    ];
}