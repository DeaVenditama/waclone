<?php namespace App\Models;

use CodeIgniter\Model;

class StatusModel extends Model{
    protected $table = 'status';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id_user','media','caption','created','expired','is_active'
    ];
    protected $returnType = 'App\Entities\Status';
    protected $useTimeStamps =false;
}