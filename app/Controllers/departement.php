<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class departement extends ResourceController { 

    public function __construct(){

    }

    public function index() {
        $data['title']   = "departement List";
        //echo view('header',$data);
        return view("departement",$data);
    }
}
