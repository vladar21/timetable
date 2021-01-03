<?php namespace App\Database\Seeds;

use App\Models\AddressModel;
use CodeIgniter\Database\Seeder;

class AddressSeeder extends Seeder
{
	public function run()
	{
        $faker = \Faker\Factory::create("uk_UA");
        $model = new AddressModel();

        for($i=0; $i<12; $i++){
            $data = [
                'zipcode' => "69000",
                'country' => "Україна",
                'region'  => "Запорізька область",
                'locality' => "Запоріжжя",
                'street' => $faker->streetAddress,
                'house' => $faker->buildingNumber,
                'apartment' => $faker->randomNumber(2)
            ];
            // Using Query Builder
            $this->db->table('address')->insert($data);
        }

	}
}
