<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddSettingsTable extends Migration
{
	public function up()
	{
        $this->forge->addField([
            'id'            => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'data_appointment'    => [
                'type'           => 'DATETIME',
            ],
            'start_at'    => [
                'type'           => 'DATETIME',
            ],
            'duration'    => [
                'type'           => 'int',
                'constraint'     => 5,
            ],
            'qty_appointments' => [
                'type'           => 'int',
                'constraint'     => 5,
            ],
            'created_at'        => [
                'type'           => 'DATETIME',
            ],
            'updated_at'        => [
                'type'           => 'DATETIME',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('settings', TRUE);
	}

	//--------------------------------------------------------------------

	public function down()
	{
        $this->forge->dropTable('settings', true);
	}
}
