<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Categories extends Migration
{
	public function up()
	{
        //'idcategory', 'description'
		$this->forge->addField([
            'idcategory' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'description' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
        ]);
        $this->forge->addKey('idcategory', true);
        $this->forge->createTable('category');
	}

	public function down()
	{
		$this->forge->dropTable('categories');
	}
}
