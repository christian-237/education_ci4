<?php

namespace App\Controllers;
use App\Models\Departement;  #appel du model
use CodeIgniter\RESTful\ResourceController;

class DepartementController extends ResourceController
{
    private $departement;
    private $validation;

    public function __construct(){
        $this->departement = new Departement();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $liste = $this->departement->findAll();
        return $this->respond($liste);
    }

    public function show($id = null)
    {
        $departement = $this->departement->find($id);
        if($departement){
            return  $this->respond($departement);
        }
        return $this->failNotFound('sorry! no departement found');
    }

    public function new()
    {
        //
    }

    public function create() {
        #nom_departement champ du formulaire
        #description champ du formulaire
        #nom_departement champ de la table departement de la BD
        #description champ de la table departement de la BD

        $rules = [ #regle de validation des chmaps du formulaire
            'nom_departement' => 'required|is_unique[departement.nom_departement]|min_length[3]'
        ];

        $messages = [ #Formatage des msg d'erreurs de validation
            "nom_departement" => [
                "required" => "nom_departement requis",
                "is_unique" => "Ce departement existe déjà"
            ]
        ];

        if(!$this->validate($rules,$messages)){ #test de validation
            return $this->failValidationErrors($this->validation->getErrors());
        }
        else{ #validation ok
            #Objet à inserer dans la BD
            $tab = [
                'nom_departement' => $this->request->getVar('nom_departement'),
                'description' => $this->request->getVar('description')
            ];

            $id = $this->departement->insert($tab); #insertion dans la BD

            if($id) { #succès insertion
                $data['id_departement'] = $id;
                return $this->respondCreated($data);
            }
            else{ #Ecchec insertion
                return $this->fail('Sorry! no departement created');
            }
        }
    }

    public function edit($id = null)
    {
        //
    }

    public function modifier_Departement() {
        #nom_departement et descriptionchamp du formulaire
        #nom_departement et description champ de la table departement de la BD 
        
        $rules = [ #regle de validation des chmaps du formulaire
            'nom_departement' => 'required|min_length[3]|is_unique[departement.nom_departement]',
            'id_departement' => 'required|numeric',
            'description' => 'required'
        ];
        $messages = [ #Formatage des msg d'erreurs de validation
            "nom_departement" => [
                "required" => "departement requis",
                "min_length" => "La nom_departement doit avoir au moins 2 caractères",
                "is_unique" => "Ce departement existe déjà",
                "numeric" => "id_departement du departement doit Etre numerique"
            ]
        ];
        if(!$this->validate($rules,$messages)){ #test de validation
            return $this->failValidationErrors($this->validation->getErrors());
        }
        else{  #validation ok
            $id = $this->request->getVar('id_departement'); #identifiant departement
            $departement = $this->departement->find($id); #vérifier si le departement existe
            if($departement) { #departement existe
                $tab = [ #tableau de modification
                    'id_departement' => $id,
                    'nom_departement' => $this->request->getVar('nom_departement'), #nom_departement 
                    'description' => $this->request->getVar('description') #description 
                ];
                $response = $this->departement->save($tab); #mise à jour de la description
                if($response) { #mise à jour ok
                    return $this->respond($response);
                }
                else #mise à jour non ok
                    return $this->fail('Sorry! not updated');
            }
            else{ #departement n'existe pas
                return $this->failNotFound('Sorry! no departement found');
            }
        }  
    }

    public function delete_departement($id = null) {
        $departement = $this->departement->find($id); #chercher le departement
        if($departement) { #departement trouver
            $tab = [
                'id_departement' => $id,
                'statut' => 'supprimer'
            ];
            $response = $this->departement->save($tab); #modication
            if($response) {
                return $this->respond($response);
            }
            else 
                return $this->fail('Sorry! not deleted');
        }
        else 
            return $this->failNotFound('Sorry! no ledepartementvel found');
    }
}
