<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPatientsTable extends Migration
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
            'contact_id'    => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'medical_history' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'created_at'        => [
                'type'           => 'DATETIME',
            ],
            'updated_at'        => [
                'type'           => 'DATETIME',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('contact_id','contacts','id');
        $this->forge->createTable('patients', TRUE);
	}

	//--------------------------------------------------------------------

	public function down()
	{
        $this->forge->dropTable('patients', true);
	}
}
