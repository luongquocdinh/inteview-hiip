<?php

namespace App\Models\v1;
use App\Models\BaseModel;
use App\Models\v1\User;

class Topic extends BaseModel
{
    static protected $_instance = NULL;

    /**
     * Use singleton pattern
     *
     * @return Topic object
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

    protected $table = 'topic';

    protected $fillable = [
        'name', 'created_at', 'updated_at'
    ];

    public function user ()
    {
        return $this->belongsToMany(User::class);
    }
}