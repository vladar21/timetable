<?php namespace App\Models;

use CodeIgniter\Model;


class Calendar_model extends Model
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

    function fetch_all_event()
    {
        $this->join('docs', 'doc_id = docs.id');
        //$this->join('contacts', 'docs.contact_id = contacts.id');
        return $this->findAll();
    }

//    function insert_event($data)
//    {
//        $this->db->insert('events', $data);
//    }
//
//    function update_event($data, $id)
//    {
//        $this->db->where('id', $id);
//        $this->db->update('events', $data);
//    }
//
//    function delete_event($id)
//    {
//        $this->db->where('id', $id);
//        $this->db->delete('events');
//    }
}
