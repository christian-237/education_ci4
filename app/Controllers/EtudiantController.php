<?php

namespace App\Controllers;
use App\Models\Etudiant;  #appel du model
use CodeIgniter\RESTful\ResourceController;

class EtudiantController extends ResourceController
{
    private $etudiant;
    private $validation;

    public function __construct(){
        $this->etudiant = new Etudiant();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $liste = $this->etudiant->findAll();
        return $this->respond($liste);
    }

    public function show($id = null)
    {
        $etudiant = $this->etudiant->find($id);
        if($etudiant){
            return  $this->respond($etudiant);
        }
        return $this->failNotFound('sorry! no etudiant found');
    }

    public function new()
    {
        //
    }

    public function create() {
        #nom champ du formulaire et dans la BD
        #prenom champ du formulaire et dans la BD

        $rules = [ #regle de validation des chmaps du formulaire
            'nom' => 'required|min_length[1]',
            'prenom' => 'required|min_length[3]',
            'date_naissance' => 'required|min_length[8]',
            'image' => 'required|min_length[2]'
        ];

        $messages = [ #Formatage des msg d'erreurs de validation
            "nom" => [
                "required" => "nom requis",
            ]
        ];

        if(!$this->validate($rules,$messages)){ #test de validation
            return $this->failValidationErrors($this->validation->getErrors());
        }
        else{ #validation ok
            #Objet à inserer dans la BD
            $tab = [
                'nom' => $this->request->getVar('nom'),
                'prenom' => $this->request->getVar('prenom'),
                'date_naissance' => $this->request->getVar('date_naissance'),
                'image' => $this->request->getVar('image')
            ];

            $id = $this->etudiant->insert($tab); #insertion dans la BD

            if($id) { #succès insertion
                $data['id_etudiant'] = $id;
                return $this->respondCreated($data);
            }
            else{ #Ecchec insertion
                return $this->fail('Sorry! no etudiant created');
            }
        }
    }

    public function edit($id = null)
    {
        //
    }

    public function modifierEtudiant() {
        #nom et descriptionchamp du formulaire
        #prenom ; image ; date_naissance et description champ de la table etudiant de la BD 
        
        $rules = [ #regle de validation des chmaps du formulaire
            'nom' => 'required|min_length[2]|is_unique[etudiant.nom]',
            'prenom' => 'required',
            'date_naissance' => 'required',
            'image' => 'required',
            'id_etudiant' => 'required|numeric'
        ];
        $messages = [ #Formatage des msg d'erreurs de validation
            "nom" => [
                "required" => "nom etudiant requis ou existe déjà",
                "min_length" => "La nom_etudiant doit avoir au moins 2 caractères",
                "required" => "nom etudiant requis",
                "required|numeric" => "image etudiant requis",
                "required" => "id_etudiant requis"

            ]
        ];
        if(!$this->validate($rules,$messages)){ #test de validation
            return $this->failValidationErrors($this->validation->getErrors());
        }
        else{  #validation ok
            $id = $this->request->getVar('id_etudiant'); #identifiant etudiant
            $etudiant = $this->etudiant->find($id); #vérifier si l'etudiant existe
            if($etudiant) { #etudiant existe
                $tab = [ #on cree un tableau de modification
                    'id_etudiant' => $id,
                    'nom' => $this->request->getVar('nom'), #nom 
                    'prenom' => $this->request->getVar('prenom'), #prenom 
                    'date_naissance' => $this->request->getVar('date_naissance'), #date_naissance 
                    'image' => $this->request->getVar('image') #image 
                ];
                $response = $this->etudiant->save($tab); #mise à jour de l'etudiant dans la bd
                if($response) { #mise à jour ok
                    return $this->respond($response);
                }
                else #mise à jour non ok
                    return $this->fail('Sorry! not updated');
            }
            else{ #etudiant n'existe pas
                return $this->failNotFound('Sorry! no etudiant found');
            }
        }  
    }

    public function deleteEtudiant($id = null)
    {
        $etudiant = $this->etudiant->find($id); #chercher etudiant
        if($etudiant) { #etudiant trouver
            $tab = [
                'id_etudiant' => $id,
                'statut' => 'supprimer'
            ];
            $response = $this->etudiant->save($tab); #modication
            if($response) {
                return $this->respond($response);
            }
            else 
                return $this->fail('Sorry! not deleted');
        }
        else 
            return $this->failNotFound('Sorry! no leetudiantvel found');
    }
}
