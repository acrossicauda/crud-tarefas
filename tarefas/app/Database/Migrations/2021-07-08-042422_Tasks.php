<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tasks extends Migration
{
	public function up()
	{
        //protected $allowedFields = ['idtask', 'description', 'responsible', 'data_end', 'idcategory'];
		$this->forge->addField([
            'idtasks' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'description' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'idresponsible' => [
                'type' => 'INT'
            ],
            'idcategory' => [
                'type' => 'INT'
            ],
            'data_end' => [
                'type' => 'datetime'
            ],
        ]);
        $this->forge->addKey('idtasks', true);
        $this->forge->addForeignKey('idcategory', 'categories', 'idcategory');
        $this->forge->addForeignKey('idresponsible', 'responsibles', 'idresponsible');
        $this->forge->createTable('tasks');
	}

	public function down()
	{
		$this->forge->dropTable('tasks');
	}
}
