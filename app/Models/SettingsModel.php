<?php namespace App\Models;

use CodeIgniter\Model;

class SettingsModel extends Model
{
    protected $table      = 'settings';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    //protected $useSoftDeletes = true;

    protected $allowedFields = ['data_appointment', 'start_at', 'duration', 'qty_appointments'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    //protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
