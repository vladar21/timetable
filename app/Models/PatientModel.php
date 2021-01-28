<?php namespace App\Models;

use CodeIgniter\Model;

class PatientModel extends BaseModel
{
    protected $table      = 'patients';
    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = ['contact_id', 'medical_history'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules    = [
        'medical_history' => 'required'
    ];
    protected $validationMessages = [
        'medical_history' => [
            'required' => 'Номер вашої медичної картки обов\'язковий.'
        ],
    ];
    protected $skipValidation     = false;

    public function getPatientByContactId ($contact_id)
    {
        $patient = $this->where('contact_id', $contact_id)->first();
        $result = (isset($patient)) ? $patient['id'] : -1;
        return $result;
    }

}
