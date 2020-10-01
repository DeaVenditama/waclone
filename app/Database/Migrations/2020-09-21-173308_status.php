<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Status extends Migration
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
			'id_user' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
			],
			'caption'=>[
				'type'=>'TEXT',
				'null'=>TRUE,
			],
			'media'=>[
				'type'=>'TEXT',
				'null'=>TRUE,
			],
			'is_active'=>[
				'type'=>'INT',
				'constraint'=>1,
				'default'=>1,
			],
			'created'=>[
				'type'=>'DATETIME',
			],
			'expired'=>[
				'type'=>'DATETIME'
			]
		]);
		$this->forge->addKey('id', TRUE);
		$this->forge->addForeignKey('id_user','user','id');
		$this->forge->createTable('status');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('status');
	}
}
