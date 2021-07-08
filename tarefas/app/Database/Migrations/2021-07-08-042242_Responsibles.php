<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Responsibles extends Migration
{
	public function up()
	{
        //'idresponsibles', 'name'
		$this->forge->addField([
            'idresponsibles' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
        ]);
        $this->forge->addKey('idresponsibles', true);
        $this->forge->createTable('responsibles');
	}

	public function down()
	{
		$this->forge->dropTable('responsibles');
	}
}
