<?php namespace App\Models;

use CodeIgniter\Model;

class ContactModel extends Model
{
    protected $table      = 'contacts';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
//    protected $useSoftDeletes = true;

    protected $allowedFields = ['address_id', 'first_name', 'middle_name', 'last_name', 'phone', 'email', 'birthday', 'password'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    //protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
