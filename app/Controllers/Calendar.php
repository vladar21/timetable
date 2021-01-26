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
        $faker = \Faker\Factory::create("uk_UA");

        $user_id = $this->session->get('user_id');
        $patient_id = $this->session->get('patient_id');

        $appointmentModel = new AppointmentModel();
        $appointments = $appointmentModel->fetch_all_appointments();
        $appointmentsSchedules = array_column($appointments, 'schedule');
        $appointmentsScheduleIds = array_column($appointmentsSchedules, 'id');
        $appointmentPatients = array_column($appointments, 'patient');
        $appointmentPatientsIds = array_column($appointmentPatients, 'id');

        $scheduleModel = new ScheduleModel();
        $scheduless = $scheduleModel->fetch_all_schedule();

        $docModel = new DocModel();
        $docs = $docModel->getAllDocs();

        $event = array();

        foreach($scheduless as $schedule){
            if (in_array($schedule['id'], $appointmentsScheduleIds)){
                if (in_array($patient_id, $appointmentPatientsIds)){
                    $event[] = array(
                        "title" => $docs[$schedule['doc_id']]['speciality'],
                        "start" => $schedule['start_at'],
                        "end" => $schedule['finish_at'],
                        "schedule_id" => $schedule['id'],
                        "patient_id" => $patient_id,
                        "backgroundColor" => '#089000',
                    );
                }else {
                    $event[] = array(
                        "title" => $docs[$schedule['doc_id']]['speciality'],
                        "start" => $schedule['start_at'],
                        "end" => $schedule['finish_at'],
                        "schedule_id" => $schedule['id'],
                        "patient_id" => $patient_id,
                        "backgroundColor" => '#FF7F7F',
                    );
                }
            }else{
                $event[] = array(
                    "title"           => $docs[$schedule['doc_id']]['speciality'],
                    "start"           => $schedule['start_at'],
                    "end"             => $schedule['finish_at'],
                    "schedule_id"     => $schedule['id'],
                    "patient_id"      => $patient_id,
                    "backgroundColor" => '#90EE90',
                );
            }
        }

            // красим в темно-зелений цвет существующие записи текущего пацинета
//            $schedulesIds = $appointmentsModel->getScheduleIdsByPatientId($patient_id);
//            for($i=0;$i<count($event);$i++){
//                if (in_array($event[$i]['schedule_id'], $schedulesIds)) {
//                    $event[$i]['backgroundColor'] = '#089000';
//                    $event[$i]['textColor'] = '#000000';
//                }
//            }


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
        $schedulesIds = $appointmentsModel->getScheduleIdsByPatientId($data['patient_id']);

        if (in_array($data['schedule_id'], $schedulesIds)){
            $patientID = $appointmentsModel->getPatientIdByScheduleId($data['schedule_id']);
            if ($data['patient_id'] != $patientID){
                $msg =  'Місто вже зайнято! Спробуйте на іншу дату.';
            }
            else{
                $appointmentsModel->cancelAppointment($data['schedule_id']);
                $msg = 'Запис до лікаря скасовано.';
            }

        }
        else{
            if($appointmentsModel->insert($data))
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
