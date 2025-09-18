<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table = 'utilisateur';
    protected $primaryKey = 'id';
    protected $allowedFields = ['first_name', 'last_name', 'matricule', 'email', 'password_hash', 'created_at', 'updated_at', 'name_profile', 'age', 'pdp', 'city', 'job', 'about_me', 'centre_interet', 'situation_amoureuse'];
}
