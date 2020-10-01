<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RoomUser extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'=>[
				'type'=>'INT',
				'constraint'=>11,
				'unsigned'=>TRUE,
				'auto_increment'=>TRUE,
			],
			'id_room'=>[
				'type'=>'INT',
				'constraint'=>11,
				'unsigned'=>TRUE,
			],
			'id_user'=>[
				'type'=>'INT',
				'constraint'=>11,
				'unsigned'=>TRUE,
			],
		]);

		$this->forge->addKey('id', TRUE);
		$this->forge->addForeignKey('id_room','room','id');
		$this->forge->addForeignKey('id_user','user','id');
		$this->forge->createTable('room_user');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('room_user');
	}
}
