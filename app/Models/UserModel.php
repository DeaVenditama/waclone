<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model{
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'screen_name','avatar'
    ];
    protected $returnType = 'App\Entities\User';
    protected $useTimeStamps =false;
}