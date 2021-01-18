<?php namespace App\Models;

use CodeIgniter\Model;

class BaseModel extends Model
{
    // make key array equal key in value
    public function arrayWithKeyFromValue ($array){
        $result = array();
        if (isset($array)){
            foreach($array as $key => $value){
                if (!isset($value['id'])) break;
                $result[$value['id']] = $value;
            }
        }

        return $result;
    }
}
