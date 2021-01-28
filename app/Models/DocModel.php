<?php namespace App\Models;

use CodeIgniter\Model;

class DocModel extends BaseModel
{
    protected $table      = 'docs';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    //protected $useSoftDeletes = true;

    protected $allowedFields = ['contact_id', 'speciality', 'office', 'hired_at'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    //protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getDocByContactId ($contact_id)
    {
        $doc = $this->where('contact_id', $contact_id)->first();
        $result = (isset($doc)) ? $doc['id'] : -1;
        return $result;
    }

    public function getAllDocs(){
        $this->findAll();
        $result = $this->arrayWithKeyFromValue($this->findAll());
        return $result;
    }
}
