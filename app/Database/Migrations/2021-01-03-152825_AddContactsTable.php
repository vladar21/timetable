<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddContactsTable extends Migration
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
            'address_id'    => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'first_name'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'middle_name'    => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'null'           => true,
            ],
            'last_name'        => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'phone'        => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'email'        => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'birthday'        => [
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
        $this->forge->addForeignKey('address_id','address','id');
        $this->forge->createTable('contacts', TRUE);
	}

	//--------------------------------------------------------------------

	public function down()
	{
        $this->forge->dropTable('contacts', true);
	}
}
