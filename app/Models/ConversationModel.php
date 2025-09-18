<?php

namespace App\Models;

use CodeIgniter\Model;
class ConversationModel extends Model
{
    protected $table = 'conversation';
    protected $primaryKey = 'id';
    protected $allowedFields = ['created_at', 'updated_at'];
}