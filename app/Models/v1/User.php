<?php

namespace App\Models\v1;
use App\Models\BaseModel;

class User extends BaseModel
{
    static protected $_instance = NULL;

    /**
     * Use singleton pattern
     *
     * @return User object
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

    protected $table = 'users';

    protected $fillable = [
        'name', 'phone', 'birthday', 'gender', 'email', 'address', 'link',
        'social_id', 'login_type', 'avg_interaction', 'identity_card', 
        'bank', 'bank_account_number', 'bank_account_name', 'bank_account_branch',
        'created_at', 'updated_at'
    ];
}