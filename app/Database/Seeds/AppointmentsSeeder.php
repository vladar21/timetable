<?php namespace App\Database\Seeds;

use App\Models\PatientModel;
use App\Models\ScheduleModel;
use CodeIgniter\Database\Seeder;

class AppointmentsSeeder extends Seeder
{
	public function run()
	{
        $faker = \Faker\Factory::create("uk_UA");

        $modelPatients = new PatientModel();
        $patients = $modelPatients->orderby('id')->findColumn('id');
        var_dump($patients[0]);

        $lastPatient = $patients[count($patients) - 1];
        var_dump($lastPatient);

        $modelSchedules = new ScheduleModel();
        $scheduless = $modelSchedules->findAll();

        foreach($scheduless as $schedule){

            $created_at = date("Y-m-d H:i:s");
            $data = [
                'patient_id' => $faker->numberBetween($patients[0],$lastPatient),
                'schedule_id' => $schedule['id'],
                'created_at' => $created_at,
                'updated_at' => $created_at
            ];

            // Using Query Builder
            $this->db->table('appointments')->insert($data);
        }
	}
}
