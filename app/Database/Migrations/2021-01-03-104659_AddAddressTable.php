<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddAddressTable extends Migration
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
            'zipcode'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 50,
                'null'           => true,
            ],
            'country'    => [
                'type'           => 'VARCHAR',
                'constraint'     => 50,
                'null'           => true,
            ],
            'region'        => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'locality'        => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'street'        => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'house'        => [
                'type'           => 'VARCHAR',
                'constraint'     => 30,
            ],
            'apartment'        => [
                'type'           => 'VARCHAR',
                'constraint'     => 30,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('address', TRUE);
	}

	//--------------------------------------------------------------------

	public function down()
	{
        $this->forge->dropTable('address', true);
	}
}
