<?php namespace App\Database\Seeds;

use App\Models\DocModel;
use CodeIgniter\Database\Seeder;
use DateTime;

class SchedulesSeeder extends Seeder
{
	public function run()
    {
        $faker = \Faker\Factory::create("uk_UA");

        $modelDocs = new DocModel();
        $docs = $modelDocs->findAll();

        $start_times = ['08:30:00', '12:00:00', '9:30:00'];

        $minutes_to_add = 15;

        $data_appointments = ['2021-02-01', '2021-02-02', '2021-02-03', '2021-02-04', '2021-02-05'];
        //for($j = 0; $j<3; $j++){
        //foreach ($docs as $doc) {
            foreach ($start_times as $start_time){
                $doc=$faker->unique()->randomElement($docs);
                foreach ($data_appointments as $da) {
                    //$dt = date('H:i:s', strtotime($setting["start_at"]));
                    $start_at = date('Y-m-d H:i:s', strtotime($da . ' ' . $start_time));
                    $timezone = new \DateTimeZone('Europe/Kiev');
                    $start_at = new DateTime($start_at, $timezone);

                    for ($t = 0; $t < 8; $t++) {

                        $finish_at = $start_at;
                        $sa = $start_at;
                        $sa = $sa->format("Y-m-d H:i:s");

                        $finish_at = date_add($finish_at, date_interval_create_from_date_string("+{$minutes_to_add} minutes"));
                        $fa = $finish_at;
                        $fa = $fa->format("Y-m-d H:i:s");

                        $created_at = date("Y-m-d H:i:s");
                        $data = [
                            'doc_id' => $doc['id'],
                            'data_appointment' => $da,
                            'start_at' => $sa,
                            'finish_at' => $fa,
                            'created_at' => $created_at,
                            'updated_at' => $created_at
                        ];
                        // Using Query Builder
                        $this->db->table('schedules')->insert($data);

                        //                    $start_at = $start_at->modify("+{$minutes_to_add} minutes");
                        $start_at = $finish_at;

                    }

                }

            }
        //}
	}
}
