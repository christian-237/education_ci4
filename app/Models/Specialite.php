<?php

namespace App\Models;

use CodeIgniter\Model;

class Specialite extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'specialite';
    protected $primaryKey       = 'id_specialite';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['specialite_create_at','specialite_updated_at','nom_specialite','description_spe','id_departement','statut'];

    public function findAllSpecialite(){
        $builder = $this->db->table('specialite');
        $builder->select('specialite.*');
        $builder->where('specialite.statut', 'active');
        $builder->join('departement','departement.id_departement = specialite.id_departement');
        $builder->select('departement.*');
        $builder->where('departement.statut', 'active');
        $builder->orderBy("nom_departement,nom_specialite,description_spe",'desc');
        $query = $builder->get();
        return $query->getResult(); #getRow
    }
    public function findSpecialite($id){
        $builder = $this->db->table('specialite');
        $builder->select('specialite.id_specialite,nom_specialite,description_spe,nom_departement');
        $builder->where('specialite.statut', 'active');
        $builder->where('specialite.id_specialite', $id);
        $builder->join('departement','departement.id_departement = specialite.id_departement');
        $builder->select('departement.id_departement,nom_departement');
        $builder->where('departement.statut', 'active');
        $builder->orderBy("nom_departement,nom_specialite,description_spe,id_departement,id_specialite",'desc');
        $query = $builder->get();
        return $query->getRow();
    }
 
}
