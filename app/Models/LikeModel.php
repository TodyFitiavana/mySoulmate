<?php
    namespace App\Models;
    use CodeIgniter\Model;

    class LikeModel extends Model
    {
        protected $table         = 'likes';
        protected $primaryKey    = 'id';
        protected $allowedFields = ['id_utilisateur', 'id_publication','message'];

        

    }
?>