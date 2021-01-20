<?php namespace App\Models;

use CodeIgniter\Model;

class PatientModel extends BaseModel
{
    protected $table      = 'patients';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
//    protected $useSoftDeletes = true;

    protected $allowedFields = ['contact_id', 'medical_history'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
//    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getPatientByContactId ($contact_id)
    {
        $patient = $this->where('contact_id', $contact_id)->first();
        return $patient['id'];
    }
}
