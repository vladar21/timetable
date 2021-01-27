<?php namespace App\Database\Seeds;

use App\Models\ContactModel;
use App\Models\PatientModel;
use CodeIgniter\Database\Seeder;

class DocsSeeder extends Seeder
{
	public function run()
	{
        $faker = \Faker\Factory::create("uk_UA");
        $modelContacts = new ContactModel();
        $contacts = $modelContacts->findAll();

        $modelPatients = new PatientModel();
        $patientContactIds = $modelPatients->findColumn('contact_id');

        $specialities = ['Лор', 'Педіатр', 'Хірург'];

        $countDoc = 0;
        foreach($contacts as $contact){
            if ($countDoc > 2) break;
            if (in_array($contact['id'], $patientContactIds)) continue;
            $contact_id = $contact['id'];

            $created_at = $contact['created_at'];
            $updated_at = $faker->dateTimeBetween($created_at, 'now', 'Europe/Kiev');
            $speciality = $faker->unique()->randomElement($specialities);
            $office = $faker->unique()->numberBetween(30, 200);

            $data = [
                'contact_id' => $contact_id,
                'speciality' => $speciality,
                'office' => $office,
                'hired_at' => $created_at,
                'created_at' => $created_at,
                'updated_at' => $updated_at->format('Y-m-d')
            ];
            // Using Query Builder
            $this->db->table('docs')->insert($data);
            $countDoc++;
        }
	}
}
