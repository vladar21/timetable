<?php namespace App\Models;

use CodeIgniter\Model;

class DocModel extends Model
{
    protected $table      = 'docs';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    //protected $useSoftDeletes = true;

    protected $allowedFields = ['contact_id', 'speciality', 'office', 'hired_at'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    //protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
