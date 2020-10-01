<?php namespace App\Models;

use CodeIgniter\Model;

class RoomModel extends Model{
    protected $table = 'room';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'name','is_group'
    ];
    protected $returnType = 'App\Entities\Room';
    protected $useTimeStamps =false;

    function getRoomByUser($userArray, $is_group=0)
    {
        $userModel = new \App\Models\UserModel();
        $roomUserModel = new \App\Models\RoomUserModel();

        $roomUserCheck = $roomUserModel->select('room.id AS roomId')
                        ->join('room', 'room.id = room_user.id_room', 'right')
                        ->whereIn('room_user.id_user', $userArray)
                        ->where('room.is_group', $is_group)
                        ->groupBy('room.id')
                        ->having('COUNT(room.id)', 2)
                        ->first();

        
        if(empty($roomUserCheck))
        {
            $roomData = [
                'name' => '',
                'is_group' => 0,
            ];

            $this->db->transStart();

            $room = $this->db->table($this->table)->insert($roomData);

            $idRoom = $this->db->insertID();

            $userData = [];

            foreach($userArray as $u)
            {
                $temp = [
                    'id_user' => $u,
                    'id_room' => $idRoom,
                ];
                array_push($userData, $temp);
            }

            $roomUserBuilder = $roomUserModel->builder();
            $roomUser = $roomUserBuilder->insertBatch($userData);

            $this->db->transComplete();

            return $this->db->table($this->table)->where('id', $idRoom)->get()->getRow();
        }
        
        $room = $this->db->table($this->table)->where('id', $roomUserCheck->roomId)->get()->getRow();

        return $room;
    }
}