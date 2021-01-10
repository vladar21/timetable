<?php namespace App\Models;

use CodeIgniter\Model;

class ScheduleModel extends Model
{
    protected $table      = 'schedules';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    //protected $useSoftDeletes = true;

    protected $allowedFields = ['id', 'doc_id', 'data_appointment', 'start_at', 'finish_at'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    //protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    function fetch_all_schedule()
    {
        //$this->join('docs', 'schedules.doc_id = docs.id');
        //$this->join('contacts', 'docs.contact_id = contacts.id');
        return $this->findAll();
    }
}
