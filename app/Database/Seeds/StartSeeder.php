<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class StartSeeder extends Seeder
{
	public function run()
	{
        $this->call('AddressSeeder');
        $this->call('ContactsSeeder');
        $this->call('PatientsSeeder');
        $this->call('DocsSeeder');
        $this->call('SchedulesSeeder');
        $this->call('AppointmentsSeeder');
	}
}
