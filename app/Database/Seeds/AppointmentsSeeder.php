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

        $lastPatient = $patients[count($patients) - 1];

        $modelSchedules = new ScheduleModel();
        $scheduleIds = $modelSchedules->findColumn('id');
        $scheduless = $modelSchedules->findAll();

        $uniques = array();

        foreach($scheduless as $schedule)
        {
            $uniques[] = $faker->unique()->numberBetween($scheduleIds[0], $scheduleIds[count($scheduleIds) - 1]);

            if ($faker->numberBetween(0, 1)) {
                $created_at = date("Y-m-d H:i:s");
                $data = [
                    'patient_id' => $faker->numberBetween($patients[0], $patients[$lastPatient]),
                    'schedule_id' => $schedule['id'],
                    'created_at' => $created_at,
                    'updated_at' => $created_at,
                ];

                // Using Query Builder
                $this->db->table('appointments')->insert($data);
            }

        }
        var_dump(count($uniques));
	}
}
