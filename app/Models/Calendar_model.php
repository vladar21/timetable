<?php namespace App\Models;

use CodeIgniter\Model;


class Calendar_model extends BaseModel
{
    protected $table      = 'schedules';
    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = ['id', 'doc_id', 'data_appointment', 'start_at', 'finish_at'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    function fetch_all_event()
    {
        $this->join('docs', 'doc_id = docs.id');
        return $this->findAll();
    }
}
