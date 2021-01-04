<?php namespace App\Database\Seeds;

use App\Models\ContactModel;
use CodeIgniter\Database\Seeder;

class PatientsSeeder extends Seeder
{
	public function run()
	{
        $faker = \Faker\Factory::create("uk_UA");
        $modelContacts = new ContactModel();
        $contactIds = $modelContacts->findColumn('id');

        for($i=0; $i<9; $i++){
            $id = $faker->unique()->randomElement($contactIds);
            $contact = $modelContacts->find($id);
            $created_at = $contact['created_at'];
            $updated_at = $faker->dateTimeBetween($created_at, 'now', 'Europe/Kiev');
            $data = [
                'contact_id' => $id,
                'medical_history' => 'медична картка №'.$faker->unique()->randomNumber(2),
                'created_at' => $created_at,
                'updated_at' => $updated_at->format('Y-m-d')
            ];
            // Using Query Builder
            $this->db->table('patients')->insert($data);
        }
	}
}
