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
        $content =  view('calendar/index.php', $data);
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
                if ($appointment['schedule']['id'] == $row['id']) {
                    $flag = 1;
                    break;
                }
            }


            if ($flag){
                $data[] = array(
                    "title" => $title,
//                "description" => $description,
                    "start" => $row['start_at'],
                    "end"   => $row['finish_at'],
                    "color" => $color,
                    "schedule_id" => $row['id'],
                    "backgroundColor" => '#ff0000',
                    "borderColor" => '#800000'
                );
            }else{
                $data[] = array(
                    "title" => $title,
//                "description" => $description,
                    "start" => $row['start_at'],
                    "end"   => $row['finish_at'],
                    "color" => $color,
                    "schedule_id" => '',
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
        $appointmentsModel = new AppointmentModel();

        if($appointmentsModel->input->post('title'))
        {
            $data = array(
                'title'  => $this->input->post('title'),
            );
            $appointmentsModel->insert($data);
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
