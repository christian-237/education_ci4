<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Home extends ResourceController { 

    public function __construct(){

    }
    public function index() {
        return view('inscription');
     }
    public function speciality() {
        $data['title'] = "specialite List";
        echo view('header');
        return view('specialite',$data);

    }
    public function level() {
        $data['title'] = "niveau List";
        echo view('header',$data);
        return view('niveau',$data);
    }
    public function student() {
        $data['title'] = "etudiant List";
        echo view('header');
        return view('etudiant',$data);

    }
    public function department() {
        $data['title'] = "departement List";
        echo view('header');
        return view('departement',$data);

    }
    public function enrollment() {
        $data['title'] = "enroulement List";
        echo view('header');
        return view('enroulement',$data);

    }

    public function login() {
        return view('connexion');
    }

}
