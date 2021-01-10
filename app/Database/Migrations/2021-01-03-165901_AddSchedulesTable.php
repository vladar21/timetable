<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddSchedulesTable extends Migration
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
            'doc_id'    => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'data_appointment'    => [
                'type'           => 'DATETIME',
            ],
            'start_at'    => [
                'type'           => 'DATETIME',
            ],
            'finish_at'    => [
                'type'           => 'DATETIME',
            ],
            'created_at'        => [
                'type'           => 'DATETIME',
            ],
            'updated_at'        => [
                'type'           => 'DATETIME',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('doc_id','docs','id');
        $this->forge->createTable('schedules', TRUE);
	}

	//--------------------------------------------------------------------

	public function down()
	{
        $this->forge->dropTable('schedules', true);
	}
}
