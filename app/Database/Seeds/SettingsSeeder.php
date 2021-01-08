<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SettingsSeeder extends Seeder
{
	public function run()
	{
        $faker = \Faker\Factory::create("uk_UA");

        $data_appointments = ['2021-01-18', '2021-01-19', '2021-01-20', '2021-01-21', '2021-01-22'];

        // doctor 1
        foreach($data_appointments as $da){
            $start_at = date('Y-m-d H:i:s', strtotime($da.'8:30:00'));
            $created_at = date("Y-m-d H:i:s");
            $data = [
                'data_appointment' => $da,
                'start_at' => $start_at,
                'duration' => 15,
                'qty_appointments' => 16,
                'created_at' => $created_at,
                'updated_at' => $created_at
            ];
            // Using Query Builder
            $this->db->table('settings')->insert($data);
        }

        // doctor 2
        foreach($data_appointments as $da){
            $start_at = date('Y-m-d H:i:s', strtotime($da.'15:00:00'));
            $created_at = date("Y-m-d H:i:s");
            $data = [
                'data_appointment' => $da,
                'start_at' => $start_at,
                'duration' => 20,
                'qty_appointments' => 12,
                'created_at' => $created_at,
                'updated_at' => $created_at
            ];
            // Using Query Builder
            $this->db->table('settings')->insert($data);
        }

        // doctor 3
        foreach($data_appointments as $da){
            $start_at = date('Y-m-d H:i:s', strtotime($da.'12:00:00'));
            $created_at = date("Y-m-d H:i:s");
            $data = [
                'data_appointment' => $da,
                'start_at' => $start_at,
                'duration' => 30,
                'qty_appointments' => 8,
                'created_at' => $created_at,
                'updated_at' => $created_at
            ];
            // Using Query Builder
            $this->db->table('settings')->insert($data);
        }
	}
}
