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
            $created_at_start = date($birthday->format('Y-m-d'), strtotime('+18 years'));
            $created_at = $faker->dateTimeBetween($created_at_start, '-3 years', 'Europe/Kiev');;
            $updated_at = $faker->dateTimeBetween($created_at, 'now', 'Europe/Kiev');
            $data = [
                'address_id' => $ma["id"],
                'first_name' => $faker->firstName($gender),
                'middle_name'  => $faker->middleName($gender),
                'last_name' => $faker->lastName($gender),
                'phone' => $faker->phoneNumber,
                'email' => $faker->email,
                'birthday' => $birthday->format('Y-m-d'),
                'password' => password_hash('password', PASSWORD_DEFAULT),
                'created_at' => $created_at->format('Y-m-d'),
                'updated_at' => $updated_at->format('Y-m-d')
            ];
            // Using Query Builder
            $this->db->table('contacts')->insert($data);
        }
	}
}
