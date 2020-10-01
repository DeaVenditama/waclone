<?php namespace App\Models;

use CodeIgniter\Model;

class RoomUserModel extends Model{
    protected $table = 'room_user';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id_room','id_user'
    ];
    protected $returnType = 'App\Entities\RoomUser';
    protected $useTimeStamps =false;
}