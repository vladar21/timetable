<?php namespace App\Models;

use CodeIgniter\Model;


class AddressModel extends Model
{
    protected $table      = 'address';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['zipcode', 'country', 'region', 'locality', 'street', 'house', 'apartment'];

    protected $useTimestamps = false;
//    protected $createdField  = 'created_at';
//    protected $updatedField  = 'updated_at';
//    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
