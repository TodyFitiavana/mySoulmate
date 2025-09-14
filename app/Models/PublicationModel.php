<?php
namespace App\Models;

use CodeIgniter\Model;

class PublicationModel extends Model
{
    protected $table         = 'publication';
    protected $primaryKey    = 'id';
    protected $allowedFields = ['contenu', 'image', '_date', 'id_utilisateur'];

    public function getAllPublications()
    {
        return $this->select('publication.*, utilisateur.prenom as userName')
                    ->join('utilisateur', 'utilisateur.id = publication.id_utilisateur')
                    ->orderBy('publication._date', 'DESC')
                    ->findAll();
    }

    public function getPublicationsByUser($userId)
    {
        return $this->select('publication.*, utilisateur.prenom as userName')
                    ->join('utilisateur', 'utilisateur.id = publication.id_utilisateur')
                    ->where('publication.id_utilisateur', $userId)
                    ->orderBy('publication._date', 'DESC')
                    ->findAll();
    }

    public function getPublicationWithUser($publicationID)
    {
            return $this->select('publication.*, utilisateur.prenom as userName')
                        ->join('utilisateur', 'utilisateur.id = publication.id_utilisateur')
                        ->where('publication.id', $publicationID)
                        ->first();
    }
}
