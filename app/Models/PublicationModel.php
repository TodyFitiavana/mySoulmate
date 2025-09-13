<?php
namespace App\Models;

use CodeIgniter\Model;

class PublicationModel extends Model
{
    protected $table         = 'publication';
    protected $primaryKey    = 'id';
    protected $allowedFields = ['contenu', 'image', '_date', 'id_utilisateur'];

    // Toutes les publications
    public function getAllPublications()
    {
        return $this->select('publication.*, utilisateur.prenom as userName')
                    ->join('utilisateur', 'utilisateur.id = publication.id_utilisateur')
                    ->orderBy('publication._date', 'DESC')
                    ->findAll();
    }

    // Publications d'un utilisateur précis
    public function getPublicationsByUser($userId)
    {
        return $this->select('publication.*, utilisateur.prenom as userName')
                    ->join('utilisateur', 'utilisateur.id = publication.id_utilisateur')
                    ->where('publication.id_utilisateur', $userId)
                    ->orderBy('publication._date', 'DESC')
                    ->findAll();
    }
}
