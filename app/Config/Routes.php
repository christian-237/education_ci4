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
$routes->get('listeNiveau', 'NiveauController::index');
$routes->get('unNiveau/(:num)', 'NiveauController::show/$1');
$routes->post('ajouterNiveau', 'NiveauController::create');
$routes->get('supprimerNiveau/(:num)', 'NiveauController::delete/$1');
$routes->post('modifierNiveau', 'NiveauController::modifierNiveau');

//Departement
$routes->get('listeDepartement','DepartementController::index');
$routes->get('undepartement/(:num)','DepartementController::show/$1');
$routes->post('ajouterDepartement','DepartementController::create');
$routes->get('supprimerDepartement/(:num)','DepartementController::delete_departement/$1');
$routes->post('modifierdepartement','DepartementController::modifier_Departement');
//Etudiant
$routes->get('listeEtudiant', 'EtudiantController::index');
$routes->get('unEtudiant/(:num)', 'EtudiantController::show/$1');
$routes->post('ajouterEtudiant', 'EtudiantController::create');
$routes->get('supprimerEtudiant/(:num)','EtudiantController::deleteEtudiant/$1');
$routes->post('modifierEtudiant','EtudiantController::modifierEtudiant');
//Specialite
$routes->get('listeSpecialite', 'SpecialiteController::index');
$routes->get('uneSpecialite/(:num)', 'SpecialiteController::show/$1');
$routes->post('ajouterspecialite', 'SpecialiteController::create_specialite');
$routes->get('supprimerSpecialite/(:num)', 'SpecialiteController::delete_specialite/$1');
$routes->post('modifierSpecialite','SpecialiteController::modifierSpecialite');

$routes->get('AutocompleteSearch','SpecialiteController::ajaxSearch');
//Enroulement
$routes->get('listeEnroulement', 'EnroulementController::index');
$routes->get('unEnroulement/(:num)', 'EnroulementController::show/$1');

$routes->post('ajouterEnroulement', 'EnroulementController::create');
$routes->get('supprimerEnroulement/(:num)', 'EnroulementController::delete_Enroulement/$1');
$routes->post('modifierEnroulement','EnroulementController::modifierEnroulement');

$routes->get('SearchNiveau','EnroulementController::searchNiveau');
$routes->get('searchetudiant','EnroulementController::searchetudiant');
$routes->get('searchspecialite','EnroulementController::searchspecialite');
});

$routes->get('/', 'Home::index');
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
