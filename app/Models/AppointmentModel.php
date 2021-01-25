<?php namespace App\Models;

use CodeIgniter\Model;

class AppointmentModel extends BaseModel
{
    protected $table      = 'appointments';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    //protected $useSoftDeletes = true;

    protected $allowedFields = ['patient_id', 'schedule_id', 'is_patient_visited'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    //protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    function fetch_all_appointments() : array
    {
        $this->join('schedules', 'schedule_id = schedules.id');
        $this->join('contacts', 'patient_id = contacts.id');

        $modelSchedule = new ScheduleModel();
        $schedules = $this->arrayWithKeyFromValue($modelSchedule->findAll());

        $modelPatient = new PatientModel();
        $patients = $this->arrayWithKeyFromValue($modelPatient->findAll());

        $modelContact = new ContactModel();
        $contacts = $this->arrayWithKeyFromValue($modelContact->findAll());

        $appointments = $this->arrayWithKeyFromValue($this->findAll());

        $result = array();

        foreach($appointments as $appointment){
            $r = array();
            $r['appointment'] = $appointment;
            $r['schedule'] = $schedules[$appointment['schedule_id']];
            $r['patient'] = $patients[$appointment['patient_id']];
            $contact_id = $patients[$appointment['patient_id']]['contact_id'];
            $r['contact'] = $contacts[$contact_id];
            $result[] = $r;
        }

        return $result;
    }

    public function getScheduleIdsByPatientId($patient_id)
    {
        $this->where('patient_id', $patient_id);
        $result = $this->findColumn('schedule_id');

        return $result;
    }

    public function getPatientIdByScheduleId($schedule_id)
    {
        $result = $this->where('schedule_id', $schedule_id)->first();
        return $result['patient_id'];
    }

    public function cancelAppointment($schedule_id)
    {
        $result = $this->where('schedule_id', $schedule_id)->delete();
        return $result;
    }

}
