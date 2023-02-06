<?php

namespace App\Controllers;

use App\Models\Specialite;  #appel du model
use App\Models\Departement;  #appel du model

use CodeIgniter\RESTful\ResourceController;


class SpecialiteController extends ResourceController
{
    private $specialite;
    private $validation;
    private $departement;

    public function __construct(){
        $this->specialite = new Specialite();
        $this->departement = new Departement();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $liste = $this->specialite->findAllSpecialite();
        return $this->respond($liste);
    }

    public function show($id = null)
    {
        $specialite = $this->specialite->findSpecialite($id);
        if($specialite){
            return  $this->respond($specialite);
        }
        return $this->failNotFound('sorry! no specialite found');
    }

    public function new()
    {
        //
    }

    public function create_specialite() {
        #specialite champ du formulaire
        $rules = [ #regle de validation des chmaps du formulaire
            'nom_specialite' => 'required|is_unique[specialite.nom_specialite]|min_length[2]'
        ];

        $messages = [ #Formatage des msg d'erreurs de validation
            "nom_specialite" => [
                "required" => "nom_specialite requis",
                "is_unique" => "Cette specialite existe déjà",
                "required" => "id_departement requis"
            ]
        ];
        if(!$this->validate($rules,$messages)){ #test de validation
            return $this->failValidationErrors($this->validation->getErrors());
        }
        else{ #validation ok
            $tab = [  #Objet à inserer dans la BD
                'nom_specialite'     => $this->request->getVar('nom_specialite'),
                'id_departement'     => $this->request->getVar('id_departement'),
                'description_spe'     => $this->request->getVar('description_spe')
            ];
            $id = $this->specialite->insert($tab); #insertion dans la BD

            if($id) { #succès insertion
                $data['id_specialite'] = $id;
                return $this->respondCreated($data);
            }
            else{ #Ecchec insertion
                return $this->fail('Sorry! no specialite created');
            }
        }
    }

    public function edit($id = null)
    {
        //
    }

    public function modifierSpecialite() {
        #nom_specialite et id_specialite champ du formulaire
        #nom_departement et description champ de la table specialite de la BD 
        
        $rules = [ #regle de validation des chmaps du formulaire
            'nom_specialite' => 'required|min_length[3]|is_unique[specialite.nom_specialite]',
            'id_specialite' => 'required|numeric'
        ];
        $messages = [ #Formatage des msg d'erreurs de validation
            "nom_specialite" => [
                "required" => "specialite requis",
                "min_length" => "La nom_specialite doit avoir au moins 2 caractères",
                "is_unique" => "Ce specialite existe déjà",
                "numeric" => "id_specialite du specialite doit Etre numerique"
            ]
        ];
        if(!$this->validate($rules,$messages)){ #test de validation
            return $this->failValidationErrors($this->validation->getErrors());
        }
        else{  #validation ok
            $id = $this->request->getVar('id_specialite'); #identifiant specialite
            $specialite = $this->specialite->find($id); #vérifier si le specialite existe
            if($specialite) { #specialite existe
                $tab = [ #tableau de modification
                    'id_specialite' => $id,
                    'nom_specialite' => $this->request->getVar('nom_specialite'), #nom_specialite 
                    'id_departement' => $this->request->getVar('id_departement'), #nom_specialite 
                    'description_spe' => $this->request->getVar('description_spe') #description_spe 
                ];
                $response = $this->specialite->save($tab); #mise à jour de la description_spe
                if($response) { #mise à jour ok
                    return $this->respond($response);
                }
                else #mise à jour non ok
                    return $this->fail('Sorry! not updated');
            }
            else{ #specialite n'existe pas
                return $this->failNotFound('Sorry! no specialite found');
            }
        }  
    }

    public function delete_specialite($id = null) {
        $specialite = $this->specialite->find($id); #chercher specialite
        if($specialite) { #specialite trouver
            $tab = [
                'id_specialite' => $id,
                'statut' => 'supprimer'
            ];
            $response = $this->specialite->save($tab); #modication
            if($response) {
                return $this->respond($response);
            }
            else 
                return $this->fail('Sorry! not deleted');
        }
        else 
            return $this->failNotFound('Sorry! no specialite found');
    }

    public function searchdepartement(){
       
        $data = [];
        $data = $this->specialite->searchSelect2dpt($this->request->getVar('term'));

        echo json_encode($data);
    }
}

