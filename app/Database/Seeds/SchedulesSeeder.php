<?php namespace App\Database\Seeds;

use App\Models\DocModel;
use App\Models\SettingsModel;
use CodeIgniter\Database\Seeder;

class SchedulesSeeder extends Seeder
{
	public function run()
	{
        $modelSettings = new SettingsModel();
        $settings = $modelSettings->findAll();
        $modelDocs = new DocModel();
        $docs = $modelDocs->findAll();
        $start_times = ['08:30:00', '12:00:00', '15:00:00'];
        $i = 0;

        foreach($docs as $doc){
            foreach($settings as $setting){

                $dt = date('H:i:s', strtotime($setting["start_at"]));
                if ($dt == $start_times[$i]){
                    $created_at = date("Y-m-d H:i:s");
                    $data = [
                        'setting_id' =>  $setting['id'],
                        'doc_id' => $doc['id'],
                        'created_at' => $created_at,
                        'updated_at' => $created_at
                    ];
                    // Using Query Builder
                    $this->db->table('schedules')->insert($data);
                }
            }
            $i++;
        }
	}
}
