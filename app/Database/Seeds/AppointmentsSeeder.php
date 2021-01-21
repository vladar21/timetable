<?php namespace App\Database\Seeds;

use App\Models\AppointmentModel;
use App\Models\PatientModel;
use App\Models\ScheduleModel;
use CodeIgniter\Database\Seeder;

class AppointmentsSeeder extends Seeder
{
	public function run()
	{
        $faker = \Faker\Factory::create("uk_UA");

        $appointmentsModel = new AppointmentModel();

        $modelPatients = new PatientModel();
        $patients = $modelPatients->findColumn('id');

        $modelSchedules = new ScheduleModel();
        //$scheduleIds = $modelSchedules->findColumn('id');
        $scheduless = $modelSchedules->findAll();

        //$uniques = array();

        foreach($scheduless as $schedule)
        {
            //$uniques[] = $faker->unique()->numberBetween($scheduleIds[0], $scheduleIds[count($scheduleIds) - 1]);

            if ($faker->numberBetween(0, 1)) {
                $created_at = date("Y-m-d H:i:s");

                $patient_id = $faker->randomElement($patients);

                $allScheduleForCurrentUser = $appointmentsModel->getScheduleIdsByPatientId($patient_id);

                if (!$allScheduleForCurrentUser || !in_array($schedule['id'], $allScheduleForCurrentUser)) {
                    $data = [
                        'patient_id' => $patient_id,
                        'schedule_id' => $schedule['id'],
                        'created_at' => $created_at,
                        'updated_at' => $created_at,
                    ];

                    // Using Query Builder
                    $this->db->table('appointments')->insert($data);
                }


            }

        }

	}
}
