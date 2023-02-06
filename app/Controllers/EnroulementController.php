<?php

namespace App\Controllers;
use App\Models\Enroulement;  #appel du model Enroulement
use App\Models\Specialite;  #appel du model Specialite
use App\Models\Niveau;  #appel du model Niveau
use App\Models\Etudiant;  #appel du model Etudiant

use CodeIgniter\RESTful\ResourceController;

class EnroulementController extends ResourceController
{
    private $enroulement;
    private $specialite;
    private $niveau;
    private $etudiant;
    private $validation;

    public function __construct(){
        $this->enroulement = new Enroulement();
        $this->specialite = new Specialite();
        $this->niveau = new Niveau();
        $this->etudiant = new Etudiant();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $liste_enroulement = $this->enroulement->findAllEnroulement();
        return $this->respond($liste_enroulement);
    }

    public function show($id = null)
    {
        $enroulement = $this->enroulement->findenroulement($id);
        if($enroulement){
            return  $this->respond($enroulement);
        }
        return $this->failNotFound('sorry! no enroulement found');
    }

    public function new()
    {
        //
    }

    public function create() {
        #enroulement champ du formulaire

        $rules = [ #regle de validation des chmaps du formulaire
            'Annee_academique' => 'required|min_length[8]',
            'id_etudiant' => 'required|numeric',
            'id_niveau' => 'required|numeric',
            'id_specialite' => 'required|numeric'
        ];

        $messages = [ #Formatage des msg d'erreurs de validation
            "Annee_academique" => [
                "required" => "Annee_academique requis",
                "min_length" => "Annee_academique dois comporter au minimum 8 caracteres"
            ]
        ];
        if(!$this->validate($rules,$messages)){ #test de validation
            return $this->failValidationErrors($this->validation->getErrors());
        }
        else{ #validation ok
            $tab = [  #Objet à inserer dans la BD
                'Annee_academique'     => $this->request->getVar('Annee_academique'),
                'id_etudiant'          => $this->request->getVar('id_etudiant'),
                'id_niveau'            => $this->request->getVar('id_niveau'),
                'id_specialite'        => $this->request->getVar('id_specialite')
            ];

            $id = $this->enroulement->insert($tab); #insertion dans la BD

            if($id) { #succès insertion
                $data['id_enroulement'] = $id;
                return $this->respondCreated($data);
            }
            else{ #Ecchec insertion
                return $this->fail('Sorry! no enroulement created');
            }
        }
    }

    public function edit($id = null)
    {
        //
    }

    public function modifierEnroulement() {
        #nom_enroulement et id_specialite champ du formulaire
        #nom_enroulement et description champ de la table enroulement de la BD 
        
        $rules = [ #regle de validation des chmaps du formulaire
            'Annee_academique' => 'required|min_length[8]',
            'id_enroulement' => 'required|numeric',
            'id_niveau' => 'required|numeric',
            'id_specialite' => 'required|numeric'
        ];
        $messages = [ #Formatage des msg d'erreurs de validation
            "Annee_academique" => [
                "required" => "Annee_academique requis",
                "min_length" => "La nom_enroulement doit avoir au moins 2 caractères",
                "is_unique" => "Ce enroulement existe déjà",
                "numeric" => "id_enroulement  doit Etre numerique"
            ]
        ];
        if(!$this->validate($rules,$messages)){ #test de validation
            return $this->failValidationErrors($this->validation->getErrors());
        }
        else{  #validation ok
            $id = $this->request->getVar('id_enroulement'); #identifiant enroulement
            $enroulement = $this->enroulement->find($id); #vérifier si le enroulement existe
            if($enroulement) { #enroulement existe
                $tab = [ #tableau de modification
                    'id_enroulement' => $id,
                    'Annee_academique' => $this->request->getVar('Annee_academique'), #Annee_academique 
                    'id_etudiant' => $this->request->getVar('id_etudiant'), #id_etudiant 
                    'id_niveau' => $this->request->getVar('id_niveau'), #id_niveau 
                    'id_specialite' => $this->request->getVar('id_specialite') #id_specialite 
                ];
                $response = $this->enroulement->save($tab); #mise à jour de la description_spe
                if($response) { #mise à jour ok
                    return $this->respond($response);
                }
                else #mise à jour non ok
                    return $this->fail('Sorry! not updated');
            }
            else{ #enroulement n'existe pas
                return $this->failNotFound('Sorry! no enroulement found');
            }
        }  
    }

    public function delete_Enroulement($id = null){
        $enroulement = $this->enroulement->find($id); #chercher enroulement
        if($enroulement) { #enroulement trouver
            $tab = [
                'id_enroulement' => $id,
                'statut' => 'supprimer'
            ];
            $response = $this->enroulement->save($tab); #modication
            if($response) {
                return $this->respond($response);
            }
            else 
                return $this->fail('Sorry! not deleted');
        }
        else 
            return $this->failNotFound('Sorry! no enroulement found');
    }

    public function searchNiveau()
    {
        $data = [];
        $data = $this->enroulement->searchSelect2($this->request->getVar('term'));

        echo json_encode($data);
    }


    public function searchetudiant(){
       
        $data = [];
        $data = $this->enroulement->searchSelect3($this->request->getVar('term'));

        echo json_encode($data);
    }

    public function searchspecialite(){
       
        $data = [];
        $data = $this->enroulement->searchSelect4($this->request->getVar('term'));

        echo json_encode($data);
    }
}
