<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
//Niveau
$routes->group("api", function ($routes) {

$routes->post("login", "LoginController::index");
$routes->get("users", "UserController::index");


$routes->get('listeNiveau', 'NiveauController::index', ['filter' => 'authFilter']);
$routes->get('unNiveau/(:num)', 'NiveauController::show/$1', ['filter' => 'authFilter']);
$routes->post('ajouterNiveau', 'NiveauController::create', ['filter' => 'authFilter']);
$routes->get('supprimerNiveau/(:num)', 'NiveauController::delete/$1', ['filter' => 'authFilter']);
$routes->post('modifierNiveau', 'NiveauController::modifierNiveau', ['filter' => 'authFilter']);
//Departement
$routes->get('listeDepartement','DepartementController::index', ['filter' => 'authFilter']);
$routes->get('undepartement/(:num)','DepartementController::show/$1', ['filter' => 'authFilter']);
$routes->post('ajouterDepartement','DepartementController::create', ['filter' => 'authFilter']);
$routes->get('supprimerDepartement/(:num)','DepartementController::delete_departement/$1', ['filter' => 'authFilter']);
$routes->post('modifierdepartement','DepartementController::modifier_Departement', ['filter' => 'authFilter']);
//Etudiant
$routes->get('listeEtudiant', 'EtudiantController::index', ['filter' => 'authFilter']);
$routes->get('unEtudiant/(:num)', 'EtudiantController::show/$1', ['filter' => 'authFilter']);
$routes->post('ajouterEtudiant', 'EtudiantController::create', ['filter' => 'authFilter']);
$routes->get('supprimerEtudiant/(:num)','EtudiantController::deleteEtudiant/$1', ['filter' => 'authFilter']);
$routes->post('modifierEtudiant','EtudiantController::modifierEtudiant', ['filter' => 'authFilter']);
//Specialite
$routes->get('listeSpecialite', 'SpecialiteController::index', ['filter' => 'authFilter']);
$routes->get('uneSpecialite/(:num)', 'SpecialiteController::show/$1', ['filter' => 'authFilter']);
$routes->post('ajouterspecialite', 'SpecialiteController::create_specialite', ['filter' => 'authFilter']);
$routes->get('supprimerSpecialite/(:num)', 'SpecialiteController::delete_specialite/$1', ['filter' => 'authFilter']);
$routes->post('modifierSpecialite','SpecialiteController::modifierSpecialite', ['filter' => 'authFilter']);

$routes->get('searchdepartement','SpecialiteController::searchdepartement');
//Enroulement
$routes->get('listeEnroulement', 'EnroulementController::index', ['filter' => 'authFilter']);
$routes->get('unEnroulement/(:num)', 'EnroulementController::show/$1');

$routes->post('ajouterEnroulement', 'EnroulementController::create', ['filter' => 'authFilter']);
$routes->get('supprimerEnroulement/(:num)', 'EnroulementController::delete_Enroulement/$1');
$routes->post('modifierEnroulement','EnroulementController::modifierEnroulement');

$routes->get('SearchNiveau','EnroulementController::searchNiveau');
$routes->get('searchetudiant','EnroulementController::searchetudiant');
$routes->get('searchspecialite','EnroulementController::searchspecialite');
});

$routes->get('/', 'Home::login');
$routes->get('space', 'Home::speciality');
$routes->get('depart', 'Home::department');
$routes->get('Nivea', 'Home::level');
$routes->get('Etudian', 'Home::student');
$routes->get('Enrollemen', 'Home::enrollment');

$routes->get('log', 'Home::login');
$routes->get('email', 'Home::password_chang');
$routes->get('inscrip', 'Home::register');
$routes->get('errors', 'Home::error');

$routes->post("register", "RegisterController::index");
$routes->post("send", "RegisterController::send_email");
// $routes->match(['get', 'post'], 'SendMail/sendMail', 'SendMail::sendMail');



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
