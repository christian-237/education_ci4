<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Home extends ResourceController { 

    public function __construct(){

    }

    public function index() {
        $data['title']   = "Level List";
        echo view('header',$data);
        //return view('home',$data);
        //echo view("home",$data);
        //return view('departement',$data);
        //return view('etudiant',$data);
        return view('specialite',$data);
        //return view('enroulement',$data);
        //return view('login',$data);


    }
}
