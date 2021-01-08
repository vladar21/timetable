<?php namespace App\Models;

use CodeIgniter\Model;

class AppointmentModel extends Model
{
    protected $table      = 'appointments';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['patient_id', 'schedule_id', 'is_patient_visited'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    //protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
