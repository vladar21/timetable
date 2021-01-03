<?php namespace App\Database\Seeds;

use App\Models\AddressModel;
use CodeIgniter\Database\Seeder;

class ContactsSeeder extends Seeder
{
	public function run()
	{
        $faker = \Faker\Factory::create("uk_UA");
        $modelAddress = new AddressModel();
        $addresses = $modelAddress->findAll();

        foreach($addresses as $ma){
            $gender = $faker->randomElement(['male', 'female']);
            $birthday = $faker->dateTimeBetween('-60 years', '-29 years', 'Europe/Kiev');
            $created_at = date('Y-m-d H:i:s');
            $data = [
                'address_id' => $ma["id"],
                'first_name' => $faker->firstName($gender),
                'middle_name'  => $faker->middleName($gender),
                'last_name' => $faker->lastName($gender),
                'phone' => $faker->phoneNumber,
                'email' => $faker->email,
                'birthday' => $birthday->format('Y-m-d H:i:s'),
                'created_at' => $created_at,
                'updated_at' => $created_at
            ];
            // Using Query Builder
            $this->db->table('contacts')->insert($data);
        }
	}
}
