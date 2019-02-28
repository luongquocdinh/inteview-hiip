<?php
/**
 * Created by: luongquocdinh
 * Date: 2019-02-28
 */
namespace App\Business;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\v1\User;
use App\Helpers\HttpCode;

class BusinessUser implements BusinessInterface
{
    static protected $_instance = NULL;

    /**
     * Use singleton pattern
     *
     * @return BusinessUser object
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
     * @return User Object
     */
    public static function getModel($data = array())
    {
        $model = User::getInstance();
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

    public function paginate()
    {
        return $this->getModel()->paginate(HttpCode::PER_PAGE);
    }

    public function searchName ($keyword)
    {
        return $this->getModel()->where('name', 'LIKE', '%'. $keyword .'%')->paginate(HttpCode::PER_PAGE);
    }

    public function searchAddress ($keyword)
    {
        return $this->getModel()->where('address', 'LIKE', '%'. $keyword .'%')->paginate(HttpCode::PER_PAGE);
    }

    public function searchIdentity ($keyword)
    {
        return $this->getModel()->where('identity_card', 'LIKE', '%'. $keyword .'%')->paginate(HttpCode::PER_PAGE);
    }

    public function searchBankNumber ($keyword)
    {
        return $this->getModel()->where('bank_account_number', 'LIKE', '%'. $keyword .'%')->paginate(HttpCode::PER_PAGE);
    }

    public function searchLoginType ($keyword)
    {
        return $this->getModel()->where('login_type', 'LIKE', '%'. $keyword .'%')->paginate(HttpCode::PER_PAGE);
    }

    public function getByConditions($condition = [])
    {
        return $this->getModel()->where($condition)->get();
    }

    public function getFirstCondition($condition = [])
    {
        return $this->getModel()->where($condition)->first();
    }
}