<?php

namespace App\Models;

use CodeIgniter\Model;

class Enroulement extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'enroulement';
    protected $primaryKey       = 'id_enroulement';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['Annee_academique','id_etudiant','id_niveau','id_specialite','enroulement_updated_at','enroulement_create_at','statut','id_enroulement'];
    //fonction liste emroulement
    public function findAllEnroulement(){
        $builder = $this->db->table('enroulement');
        $builder->select('enroulement.*');
        $builder->where('enroulement.statut', 'active');
        $builder->join('niveau','niveau.id_niveau = enroulement.id_niveau');
        $builder->join('etudiant','etudiant.id_etudiant = enroulement.id_etudiant');
        $builder->join('specialite','specialite.id_specialite = enroulement.id_specialite');
        $builder->select('niveau.*');
        $builder->where('niveau.statut', 'active');
        $builder->select('etudiant.*');
        $builder->where('etudiant.statut', 'active');
        $builder->select('specialite.*');
        $builder->where('specialite.statut', 'active');
        $builder->orderBy("Annee_academique,nom,nom_niveau,nom_specialite",'desc');
        $query = $builder->get();
        return $query->getResult(); #getRow
    }
    public function findenroulement($id){
        $builder = $this->db->table('enroulement');
        $builder->select('enroulement.id_enroulement,Annee_academique');
        $builder->where('enroulement.statut', 'active');
        $builder->where('enroulement.id_enroulement', $id);
        $builder->join('specialite','specialite.id_specialite = enroulement.id_specialite');
        $builder->join('etudiant','etudiant.id_etudiant = enroulement.id_etudiant');
        $builder->join('niveau','niveau.id_niveau = enroulement.id_niveau');
        $builder->select('specialite.nom_specialite,description_spe');
        $builder->select('etudiant.id_etudiant,nom,prenom');
        $builder->select('niveau.nom_niveau');
        $builder->where('specialite.statut', 'active');
        $builder->where('etudiant.statut', 'active');
        $builder->where('niveau.statut', 'active');
        $builder->orderBy("Annee_academique,nom,nom_niveau,nom_specialite",'desc');
        $query = $builder->get();
        return $query->getRow();
    }

    public function searchSelect2($term) {
        $data = null;
        $builder = $this->db->table('niveau');
        if($term!=null){  
            $query = $builder->like('nom_niveau', $term)
                        ->select('id_niveau as id, nom_niveau as text')
                        ->where('statut', 'active')
                        ->limit(5)->get();
            $data = $query->getResult();
        }

        return $data;
    }

    public function searchSelect3($term) {
        $data = null;
        $builder = $this->db->table('etudiant'); 
        if($term!=null){  
            $query = $builder->like('nom', $term)
                        ->select('id_etudiant as id, nom as text')
                        ->where('statut', 'active')
                        ->limit(5)->get();
            $data = $query->getResult();
        }

        return $data;
    }

    public function searchSelect4($term) {
        $data = null;
        $builder = $this->db->table('specialite'); 
        if($term!=null){  
            $query = $builder->like('nom_specialite', $term)
                        ->select('id_specialite as id, nom_specialite as text')
                        ->where('statut', 'active')
                        ->limit(5)->get();
            $data = $query->getResult();
        }

        return $data;
    }

    
}
