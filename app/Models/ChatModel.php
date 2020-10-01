<?php namespace App\Models;

use CodeIgniter\Model;

class ChatModel extends Model{
    protected $table = 'chat';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id_room','id_user','message','media','is_active','created'
    ];
    protected $returnType = 'App\Entities\Chat';
    protected $useTimeStamps =false;

    public function getChatsByRoom($idRoom)
    {
        $chats = $this->db->table($this->table)->where('id_room', $idRoom)->get()->getResult();
        return $chats;
    }
}