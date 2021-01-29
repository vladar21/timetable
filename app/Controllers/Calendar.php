<?php namespace App\Controllers;

use App\Models\AppointmentModel;
use App\Models\DocModel;
use App\Models\ScheduleModel;


class Calendar extends BaseController
{
    public function index()
    {
        $data = [];

        $this->styles[] = 'fullcalendar/main.css';
        $this->styles[] = 'fullcalendar/custom.css';
        $this->scripts[] = 'fullcalendar/main.js';
        $this->scripts[] = 'fullCalendar.js';
        $this->js_init[] = "desk.init();";

        $content =  view('calendar/calendar.php', $data);
        return $this->layout( $content);
    }

    function load()
    {
        $patient_id = $this->session->get('patient_id');

        $appointmentModel = new AppointmentModel();
        $appointments = $appointmentModel->fetch_all_appointments();
        $appointmentsSchedules = array_column($appointments, 'schedule');
        $appointmentsScheduleIds = array_column($appointmentsSchedules, 'id');

        $scheduleModel = new ScheduleModel();
        $scheduless = $scheduleModel->fetch_all_schedule();

        $docModel = new DocModel();
        $docs = $docModel->getAllDocs();

        $event = array();

        foreach($scheduless as $schedule){
            if (in_array($schedule['id'], $appointmentsScheduleIds)){
                $patientID = $appointmentModel->getPatientIdByScheduleId($schedule['id']);
                if ($patientID == $patient_id){
                    // sign up for an appointment with the doctor
                    $event[] = array(
                        "title"           => $docs[$schedule['doc_id']]['speciality'],
                        "start"           => $schedule['start_at'],
                        "end"             => $schedule['finish_at'],
                        "schedule_id"     => $schedule['id'],
                        "patient_id"      => $patient_id,
                        "backgroundColor" => '#ffa500',
                    );
                }else {
                    // doctor's appointment time is already taken
                    $event[] = array(
                        "title"           => $docs[$schedule['doc_id']]['speciality'],
                        "start"           => $schedule['start_at'],
                        "end"             => $schedule['finish_at'],
                        "schedule_id"     => $schedule['id'],
                        "patient_id"      => $patient_id,
                        "backgroundColor" => '#d60000',
                    );
                }
            }else{
                // doctor's appointment time is still free
                $event[] = array(
                    "title"           => $docs[$schedule['doc_id']]['speciality'],
                    "start"           => $schedule['start_at'],
                    "end"             => $schedule['finish_at'],
                    "schedule_id"     => $schedule['id'],
                    "patient_id"      => $patient_id,
                    "backgroundColor" => '#05a100',
                );
            }
        }

        $this->response->setContentType('application/json');

        echo json_encode($event);
    }

    function create()
    {
        $data = [
            'patient_id'  =>  $this->request->getVar('patient_id'),
            'schedule_id' =>  $this->request->getVar('schedule_id'),
        ];

        $appointmentsModel = new AppointmentModel();
        $patientID = $appointmentsModel->getPatientIdByScheduleId($data['schedule_id']);
        if ($patientID != -1) {
            if ($patientID != $data['patient_id']){
                $msg =  'Місто вже зайнято! Спробуйте на інший час.';
            }
            else{
                $appointmentsModel->cancelAppointment($data['schedule_id']);
                $msg = 'Запис до лікаря скасовано.';
            }
        }
        else{
            if($appointmentsModel->save($data))
            {
                $msg = 'Успіх! Ви записані на прийом до лікаря.';
            }
        }

        $data = [
            'msg' => $msg,
        ];
        $this->session->set($data);

        $msg =  view('msg/message.php', $data);

        return ($msg);
    }

}
