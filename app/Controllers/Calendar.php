<?php namespace App\Controllers;

use App\Models\AppointmentModel;
use App\Models\DocModel;
use App\Models\ScheduleModel;


class Calendar extends BaseController
{

    public function __construct()
    {
       // $this->load->model("calendar_model");
    }

    public function index()
    {
        $data = [];
        if (isset($_SESSION['msg'])) {
            $data['msg'] = $_SESSION['msg'];
        }
        $content =  view('calendar/calendar.php', $data);
        return $this->layout($content);
        //echo view("calendar/index.php", array());
    }

    function load()
    {
        $faker = \Faker\Factory::create("uk_UA");

        //$eventModel = new Calendar_model();
        //$event_data = $eventModel->fetch_all_event();

        $schedulessModel = new ScheduleModel();
        $event_data = $schedulessModel->fetch_all_schedule();

        $appointmentsModel = new AppointmentModel();
        $appointments = $appointmentsModel->fetch_all_appointments();

        $docModel = new DocModel();
        $docs = $docModel->findAll();
        $docsIds = $docModel->findColumn('id');
        $docColors = array();

        foreach($docsIds as $docId){
            $docColors[$docId] = $faker->hexcolor;
        }


        foreach($event_data as $row)
        {
            $color = $docColors[$row['doc_id']];

            //$schedule_id = in_array($row['id'], array_column($appointments, 'schedule_id')) ? $row['id'] : '';
//            $description = ($schedule_id != '') ? 'reserved': 'free';

            $title = '';
            foreach($docs as $doc){
                if ($doc['id'] == $row['doc_id']) {
                    $title = $doc['speciality'];
                    break;
                }
            }

            $flag = 0;
            foreach($appointments as $appointment){
                if ($appointment['appointment']['schedule_id'] == $row['id']) {
                    $flag = 1;
                    break;
                }
            }

            if ($flag){
                $data[] = array(
                    "title" => $title,
                    "description" => $title,
                    "start" => $row['start_at'],
                    "end"   => $row['finish_at'],
                    "color" => $color,
                    "schedule_id" => $row['id'],
                    "patient_id" => '',
                    "backgroundColor" => '#ff0000',
                    "borderColor" => '#800000'
                );
            }else{
                $data[] = array(
                    "title" => $title,
                    "description" => $title,
                    "start" => $row['start_at'],
                    "end"   => $row['finish_at'],
                    "color" => $color,
                    "schedule_id" => $row['id'],
                    "patient_id" => $_SESSION['user_id'],
                    //"backgroundColor" => 'green',
                    "borderColor" => 'green'
                );
            }
        }

        $this->response->setContentType('application/json');

        echo json_encode($data);
    }

    function create()
    {
        $data = [
            'patient_id'  =>  $this->request->getVar('patient_id'),
            'schedule_id' =>  $this->request->getVar('schedule_id')
        ];

        $appointmentsModel = new AppointmentModel();

        if (!$appointmentsModel->check_exist_appointment($data['patient_id'], $data['schedule_id'])){

            if($appointmentsModel->save($data))
            {
                $msg =  'Успіх! Ви записані на прийом до лікаря.';
                $_SESSION['msg'] = $msg;
                return redirect()->to('/calendar');
            }
        }
        else{
            $msg =  'Місто вже зайнято! Спробуйте повторити на іншу дату.';
            $_SESSION['msg'] = $msg;
            return redirect()->to('/calendar');
        }


    }
//
//    function update()
//    {
//        if($this->input->post('id'))
//        {
//            $data = array(
//                'title'   => $this->input->post('title'),
//                'start_event' => $this->input->post('start'),
//                'end_event'  => $this->input->post('end')
//            );
//
//            $this->fullcalendar_model->update_event($data, $this->input->post('id'));
//        }
//    }
//
//    function delete()
//    {
//        if($this->input->post('id'))
//        {
//            $this->fullcalendar_model->delete_event($this->input->post('id'));
//        }
//    }
}
