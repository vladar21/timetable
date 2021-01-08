<?php namespace App\Models;

use CodeIgniter\Model;

class ScheduleModel extends Model
{
    protected $table      = 'schedules';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    //protected $useSoftDeletes = true;

    protected $allowedFields = ['setting_id', 'doc_id'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    //protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
