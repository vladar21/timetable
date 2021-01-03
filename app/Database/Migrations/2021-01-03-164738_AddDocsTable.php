<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddDocsTable extends Migration
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
            'speciality'    => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'office'    => [
                'type'           => 'VARCHAR',
                'constraint'     => 30,
            ],
            'hired_at'        => [
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
        $this->forge->addForeignKey('contact_id','contacts','id');
        $this->forge->createTable('docs', TRUE);
	}

	//--------------------------------------------------------------------

	public function down()
	{
        $this->forge->dropTable('docs', true);
	}
}
