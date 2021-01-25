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

        $patient_id = $this->session->get('patient_id');

        $schedulessModel = new ScheduleModel();
        $scheduless = $schedulessModel->fetch_all_schedule();

        $appointmentsModel = new AppointmentModel();

        if ($patient_id == -1){
            // это значит, что авторизовался не пациент (доктор)
        } else{
            $docModel = new DocModel();
            $docs = $docModel->findAll();
            $docsIds = $docModel->findColumn('id');
            $docColors = array();

            foreach($docsIds as $docId){
//                $docColors[$docId] = $faker->hexcolor;
                $docColors[$docId] = $faker->unique()->randomElement(['Navy', 'Black', 'Maroon']);
            }

            foreach($scheduless as $schedule)
            {
                $color = $docColors[$schedule['doc_id']];

                $title = '';
                foreach($docs as $doc){
                    if ($doc['id'] == $schedule['doc_id']) {
                        $title = $doc['speciality'];
                        break;
                    }
                }

                $allScheduleForCurrentUser = $appointmentsModel->getScheduleIdsByPatientId($patient_id);
                if (in_array($schedule['id'], $allScheduleForCurrentUser)){
                    $event[] = array(
                        "title" => $title,
                        //"description" => $title,
                        "start" => $schedule['start_at'],
                        "end"   => $schedule['finish_at'],
                        //"color" => $color,
                        "textColor" => $color,
                        "schedule_id" => $schedule['id'],
                        "patient_id" => $patient_id,
                        "backgroundColor" => '#FF7F7F',
                    );
                }else{
                    $event[] = array(
                        "title" => $title,
                        //"description" => $title,
                        "start" => $schedule['start_at'],
                        "end"   => $schedule['finish_at'],
                        //"color" => $color,
                        "textColor" => $color,
                        "schedule_id" => $schedule['id'],
                        "patient_id" => $patient_id,
                        "backgroundColor" => '#90EE90',
                    );
                }
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
                $msg =  'Успіх! Ви записані на прийом до лікаря.';
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
