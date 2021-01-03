<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddAppointmentsTable extends Migration
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
            'patient_id'    => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'schedule_id'    => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'is_patient_visited'        => [
                'type'           => 'TINYINT',
                'constraint'     => 1,
                'default'        => 0,
            ],
            'created_at'        => [
                'type'           => 'DATETIME',
            ],
            'updated_at'        => [
                'type'           => 'DATETIME',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('patient_id','patients','id');
        $this->forge->addForeignKey('schedule_id','schedules','id');
        $this->forge->createTable('appointments', TRUE);
	}

	//--------------------------------------------------------------------

	public function down()
	{
        $this->forge->dropTable('appointments', true);
	}
}
