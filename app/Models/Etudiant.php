<?php

namespace App\Models;

use CodeIgniter\Model;

class Etudiant extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'etudiant';
    protected $primaryKey       = 'id_etudiant';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nom','prenom','date_naissance','image','etudiant_updated_at','etudiant_create_at','statut'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

}
