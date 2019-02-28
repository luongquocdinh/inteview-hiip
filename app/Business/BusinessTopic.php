<?php
/**
 * Created by: luongquocdinh
 * Date: 2019-02-28
 */
namespace App\Business;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\v1\Topic;

class BusinessTopic implements BusinessInterface
{
    static protected $_instance = NULL;

    /**
     * Use singleton pattern
     *
     * @return BusinessTopic object
     */
    static public function getInstance()
    {
        if (self::$_instance === NULL) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    /**
     * get model instance
     *
     * @param mixed $data
     *
     * @return Topic Object
     */
    public static function getModel($data = array())
    {
        $model = Topic::getInstance();
        if ($data) {
            if (is_numeric($data)) {
                $model = $model->find($data);
            } else {
                return $model;
            }
        }

        return $model;
    }

    public function update($id, $data = [])
    {
        $model = $this->getModel($id);
        if (!$model) {
            return false;
        }
        
        $model->update($data);

        return $this->getModel($id);
    }

    public function create($data)
    {
        $id = $this->getModel()->create($data)->id;

        return $this->getModel($id);
    }

    public function getByConditions($condition)
    {
        return $this->getModel()->where($condition)->get();
    }

    public function getFirstCondition($condition)
    {
        return $this->getModel()->where($condition)->first();
    }
}