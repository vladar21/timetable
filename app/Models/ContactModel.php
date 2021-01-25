<?php namespace App\Models;

use CodeIgniter\Model;

class ContactModel extends BaseModel
{
    protected $table      = 'contacts';
    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = ['address_id', 'first_name', 'middle_name', 'last_name', 'phone', 'email', 'birthday', 'password'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    function userFIO ($id)
    {
        if ($id >= 0){
            $user = $this->find($id);
            if ($user){
                $lastname = (isset($user['last_name'])) ? $user['last_name'] : '';
                $firstname = (isset($user['first_name'])) ? $user['first_name'] : '  ';
                $middlename = (isset($user['middle_name'])) ? $user['middle_name'] : '  ';
                $F = strtoupper(substr($firstname, 0, 2));
                $M = strtoupper(substr($middlename, 0, 2));
                $userFIO = $lastname.'&nbsp;'.$F.'.'.$M.'.';
                return $userFIO;
            }
        }

        return -1;
    }
}
