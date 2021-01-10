<?php namespace App\Controllers;

use App\Models\AppointmentModel;
use App\Models\Calendar_model;
use App\Models\DocModel;


class Calendar extends BaseController
{

    public function __construct()
    {
       // $this->load->model("calendar_model");
    }

    public function index()
    {
        echo view("calendar/index.php", array());
    }

    function load()
    {
        $faker = \Faker\Factory::create("uk_UA");

        $eventModel = new Calendar_model();
        $event_data = $eventModel->fetch_all_event();

        $appointmentsModel = new AppointmentModel();
        $appointments = $appointmentsModel->fetch_all_appointments();

        $docModel = new DocModel();
        $docsIds = $docModel->findColumn('id');
        $docColors = array();

        foreach($docsIds as $docId){
            $docColors[$docId] = $faker->hexcolor;
        }

        foreach($event_data as $row)
        {
            $color = $docColors[$row['doc_id']];

            $schedule_id = in_array($row['id'], array_column($appointments, 'schedule_id')) ? $row['id'] : '';

            $data[] = array(
                "title" => $row['speciality'],
                "start" => $row['start_at'],
                "end"   => $row['finish_at'],
                "color" => $color,
                "schedule_id" => $schedule_id
            );
        }

        $this->response->setContentType('application/json');

        echo json_encode($data);
    }

//    function insert()
//    {
//        if($this->input->post('title'))
//        {
//            $data = array(
//                'title'  => $this->input->post('title'),
//                'start_event'=> $this->input->post('start'),
//                'end_event' => $this->input->post('end')
//            );
//            $this->fullcalendar_model->insert_event($data);
//        }
//    }
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
