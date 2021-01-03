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
            'setting_id'    => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'doc_id'    => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'created_at'        => [
                'type'           => 'DATETIME',
            ],
            'updated_at'        => [
                'type'           => 'DATETIME',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('setting_id','settings','id');
        $this->forge->addForeignKey('doc_id','docs','id');
        $this->forge->createTable('schedules', TRUE);
	}

	//--------------------------------------------------------------------

	public function down()
	{
        $this->forge->dropTable('schedules', true);
	}
}
