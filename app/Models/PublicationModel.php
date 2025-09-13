<?php
    namespace App\Models;

    use CodeIgniter\Model;

    class PublicationModel extends Model{
        protected $table = 'publication';
        protected $primaryKey = 'id';
        protected $allowedFields = ['contenu','image','_date'];
    }
?>
