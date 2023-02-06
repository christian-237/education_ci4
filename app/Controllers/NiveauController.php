<?php

namespace App\Controllers;
use App\Models\Niveau;  #appel du model
use CodeIgniter\RESTful\ResourceController;

class NiveauController extends ResourceController
{
    private $niveau;
    private $validation;
    
    public function __construct(){
        $this->niveau = new Niveau();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $liste = $this->niveau->findAll();
        return $this->respond($liste);
    }

    public function show($id = null)
    {
        $niveau = $this->niveau->find($id);
        if($niveau){
            return  $this->respond($niveau);
        }
        return $this->failNotFound('sorry! no level found');
    }


    public function new()
    {
        //
    }

   
    public function create() {
        #description champ du formulaire
        #desclevel champ de la table level de la BD

        $rules = [ #regle de validation des chmaps du formulaire
            'description' => 'required|is_unique[niveau.nom_niveau]|min_length[3]'
        ];

        $messages = [ #Formatage des msg d'erreurs de validation
            "description" => [
                "required" => "Niveau requis",
                "is_unique" => "Ce niveau existe déjà"
            ]
        ];

        if(!$this->validate($rules,$messages)){ #test de validation
            return $this->failValidationErrors($this->validation->getErrors());
        }
        else{ #validation ok
            #Objet à inserer dans la BD
            $tab = [
                'nom_niveau' => $this->request->getVar('description')
            ];

            $id = $this->niveau->insert($tab); #insertion dans la BD

            if($id) { #succès insertion
                $data['id_level'] = $id;
                return $this->respondCreated($data);
            }
            else{ #Ecchec insertion
                return $this->fail('Sorry! no level created');
            }
        }
    }

    public function edit($id = null)
    {
        //
    }


    public function modifierNiveau() {
        $rules = [ #regle de validation des chmaps du formulaire
            'description' => 'required|min_length[3]|is_unique[niveau.nom_niveau]',
            'id_niveau' => 'required|numeric'
        ];

        $messages = [ #Formatage des msg d'erreurs de validation
            "description" => [
                "required" => "Niveau requis",
                "min_length" => "La description doit avoir au moins 3 caractères",
                "is_unique" => "Ce niveau existe déjà"
            ]
        ];
        if(!$this->validate($rules,$messages)){ #test de validation
            return $this->failValidationErrors($this->validation->getErrors());
        }
        else{  #validation ok
            $id = $this->request->getVar('id_niveau'); #identifiant niveau
            $niveau = $this->niveau->find($id); #vérifier si le niveau existe
            if($niveau) { #niveau existe
                $tab = [ #tableau de modification
                    'id_niveau' => $id,
                    'nom_niveau' => $this->request->getVar('description') #description niveau
                ];

                $response = $this->niveau->save($tab); #mise à jour de la description
                if($response) { #mise à jour ok
                    return $this->respond($response);
                }
                else #mise à jour non ok
                    return $this->fail('Sorry! not updated');
            }
            else{ #niveau n'existe pas
                return $this->failNotFound('Sorry! no level found');
            }
        }  
    }

    public function delete($id = null) {
        $niveau = $this->niveau->find($id); #chercher le niveau
        if($niveau) { #niveau trouver
            $tab = [
                'id_niveau' => $id,
                'statut' => 'supprimer'
            ];
            $response = $this->niveau->save($tab); #modication
            if($response) {
                return $this->respond($response);
            }
            else 
                return $this->fail('Sorry! not deleted');
        }
        else 
            return $this->failNotFound('Sorry! no level found');
    }
}
