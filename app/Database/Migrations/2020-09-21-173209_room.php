<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Room extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE,
			],
			'name'=>[
				'type'=>'TEXT',
				'null'=>TRUE,
			],
			'is_group'=>[
				'type'=>'INT',
				'constraint'=>1,
				'default'=>0,
			],
		]);

		$this->forge->addKey('id', TRUE);
		$this->forge->createTable('room');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('room');
	}
}
