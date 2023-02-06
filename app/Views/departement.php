<!DOCTYPE html>
<html>
<head>
	<title><?= $title; ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="app-url" content="<?php echo base_url('/');?>">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>	
</head>
<body>
	<div class="container">
        <h2 class="text-center mt-5 mb-3">CRUD Codigniter 4 - AJAX departement</h2>
        <div class="card">
            <div class="card-header">
                <button class="btn btn-outline-primary" onclick="create_departement()"> 
                    Ajouter Un departement
                </button>
            </div>
            <div class="card-body">
                <div id="alert-div">
                  
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        	<th class="text-center" width="100">#</th>
                            <th class="text-center">Nom departement</th>
                            <th class="text-center">descristian</th>
                            <th class="text-center" width="240px">Statut</th>
                            <th class="text-center" width="240px">Action</th>
                        </tr>
                    </thead>
                    <tbody id="levelTable">
                          
                    </tbody>
                      
                </table>
            </div>
        </div>
    </div>
   
    <!-- Modale Pour la création et modification  -->
    <div class="modal" tabindex="-1"  id="form-modal">
        <div class="modal-dialog" >
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ajouter Un departement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">                
                <form>
                    <input type="hidden" name="id_description" id="id_description">
                    <div class="form-group">
                        <label for="description">Nom departement</label>
                        <input type="text" class="form-control" id="nom_departement" name="nom_departement"><br>
                        <label for="description">description</label>
                        <input type="text" class="form-control" id="description" name="description">
                        <div id="error-div"></div>
                    </div>                  
                    <button type="submit" class="btn btn-outline-primary mt-3" id="savedepartement">Enregistrer departement</button>
                </form>
            </div>
            </div>
        </div>
    </div>

    <!-- view record modal -->
    <div class="modal" tabindex="-1" id="view-modal">
        <div class="modal-dialog" >
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Information departement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <b>nom_departement:</b>
                <p id="departement_infos"></p>
                <b>Description:</b>
                <p id="departement_infos_1"></p>
                <b>Statut:</b>
                <p id="level_statut"></p>
            </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
    	showAllDepartement();
    	/* affiche tous les departementx */
    	function showAllDepartement(){
            let url = $('meta[name=app-url]').attr("content") + "/api/listeDepartement";
            $.ajax({
                url: url,
                method: "GET",
                success: function(response) {
                    $("#levelTable").html("");
                    let departement = response;
                    for (var i = 0; i < departement.length; i++)  {
                        let showBtn =  '<button ' + ' class="btn btn-outline-info" ' +
                            ' onclick="showdepartement(' + departement[i].id_departement + ')">Show' +
                        '</button> ';
                        let editBtn =  '<button ' +
                            ' class="btn btn-outline-success" ' +
                            ' onclick="editDepartement(' + departement[i].id_departement + ')">Edit' +
                        '</button> ';
                        let deleteBtn =  '<button ' +
                            ' class="btn btn-outline-danger" ' +
                            ' onclick="delete_departement(' + departement[i].id_departement + ')">Delete' +
                        '</button>';
      
                        let colonne = '<tr>' +
                        	'<th class="text-center">' + (i+1) + '</th>' +
                            '<td>' + departement[i].nom_departement + '</td>' +
                            '<td>' + departement[i].description + '</td>' +
                            '<td class="text-center">' + departement[i].statut + '</td>' +
                            '<td class="text-center">' + showBtn + editBtn + deleteBtn + '</td>' +
                        '</tr>';
                        $("#levelTable").append(colonne);
                    }
      
                      
                },
                error: function(response) {
                    console.log(response.responseJSON)
                }
            });
        }
    	
    	/* recuperer et afficher un departement dans le modale */
        function showdepartement(id){
            $("#departement_infos").html("");
            $("#departement_infos_1").html("");
            $("#level_statut").html("");
            let url = $('meta[name=app-url]').attr("content") + "/api/undepartement/" + id +"";
            $.ajax({
                url: url,
                method: "GET",
                success: function(response) {
                    let departement = response
                    $("#departement_infos").html(departement.nom_departement);
                    $("#departement_infos_1").html(departement.description);
                    $("#level_statut").html(departement.statut);
                    $("#view-modal").modal('show'); 
      
                },
                error: function(response) {
                    console.log(response.responseJSON)
                }
            });
        }

        /*
            delete record function
        */
        function delete_departement(id){
            let url = $('meta[name=app-url]').attr("content") + "/api/supprimerDepartement/" + id;
            $.ajax({
                url: url,
                method: "GET",
                success: function(response) {
                    let successHtml = '<div class="alert alert-success" role="alert"><b>departement Supprimer avec succès</b></div>';
                    $("#alert-div").html(successHtml);
                    showAllDepartement();
                },
                error: function(response) {
                    console.log(response.responseJSON)
                }
            });
        }

        /*
            show modal pour l'ajout d'un departement
            mettre les champs à vide pour effacer les anciennes valeurs 
        */
        function create_departement(){
            $("#alert-div").html("");
            $("#error-div").html("");   
            $("#id_description").val("");
            $("#nom_departement").val("");
            $("#description").val("");
            $("#form-modal").modal('show'); 
        }

        /* Vérifier si le formulaire est soumis pour l'insertion ou modification */
        $("#savedepartement").click(function(event ){
            event.preventDefault();
            if($("#id_description").val() == null || $("#id_description").val() == "")
            {
                adddepartement();
            } else {
                modification_departement();
            }
        })

        /* Soumission du formulaire pour les insertions */
        function adddepartement() {   
            $("#savedepartement").prop('disabled', true);
            let url = $('meta[name=app-url]').attr("content") + "/api/ajouterDepartement";
            let data = {
                description: $("#description").val(),
                nom_departement: $("#nom_departement").val()
            };
            $.ajax({
                url: url,
                method: "POST",
                data: data,
                success: function(response) {
                    $("#savedepartement").prop('disabled', false);
                    let successHtml = '<div class="alert alert-success" role="alert"><b>departement Crée Avec Succès</b></div>';
                    $("#alert-div").html(successHtml);
                    $("#description").val("");
                    $("#nom_departement").val("");
                    showAllDepartement();
                    $("#form-modal").modal('hide');
                },
                error: function(response) {
                    /*
                    show validation error
                    */
                    console.log(response)
                    // $("#savedepartement").prop('disabled', false);
                    // if(response.responseJSON.status == 400) {
                    //     let errors = response.responseJSON.messages;
                    //     console.log(response)
                    //     let descriptionValidation = "";
                    //     if (errors.description !== '') {
                    //         descriptionValidation = '<li>' + errors.description + '</li>';
                    //     }          
                    //     let errorHtml = '<div class="alert alert-danger" role="alert">' +
                    //         '<b>'+descriptionValidation+'</b>' +
                    //     '</div>';
                    //     $("#error-div").html(errorHtml);        
                    // }
                }
            });
        }

        /*
            edit record function
            it will get the existing value and show the project form
        */
        function editDepartement(id){
            let url = $('meta[name=app-url]').attr("content") + "/api/undepartement/" + id ;
            $.ajax({
                url: url,
                method: "GET",
                success: function(response) {
                    let project = response
                    $("#alert-div").html("");
                    $("#error-div").html("");   
                    $("#id_description").val(project.id_departement);
                    $("#nom_departement").val(project.nom_departement);
                    $("#description").val(project.description);
                    $("#form-modal").modal('show'); 
                },
                error: function(response) {
                    console.log(response.responseJSON)
                }
            });
        }

        /*
            soumission du formulaire pour la modification
        */
        function modification_departement() {
            $("#savedepartement").prop('disabled', true);
            let id_departement = $("#id_description").val();
            let url = $('meta[name=app-url]').attr("content") + "/api/modifierdepartement";
            let data = {
                id_departement: id_departement,
                description: $("#description").val(),
                nom_departement: $("#nom_departement").val(),
            };
            $.ajax({
                url: url,
                method: "POST",
                data: data,
                //contentType: 'application/json',
                success: function(response) {
                    $("#savedepartement").prop('disabled', false);
                    let successHtml = '<div class="alert alert-success" role="alert"><b>departement Modifié Avec Succès</b></div>';
                    $("#alert-div").html(successHtml);
                    $("#description").val("");
                    $("#nom_departement").val("");
                    $("#id_description").val("");
                    showAllDepartement();
                    $("#form-modal").modal('hide');
                },

                error: function(response) {
                    /*
                    show validation error
                    */
                    console.log(response)
                    $("#savedepartement").prop('disabled', false);
                    if(response.status == 400) {
                        let errors = response.messages;
                        console.log(response)
                        let descriptionValidation = "";
                        if (errors.description !== '') {
                            descriptionValidation = '<li>' + errors.description + '</li>';
                        }          
                        let errorHtml = '<div class="alert alert-danger" role="alert">' +
                            '<b>'+descriptionValidation+'</b>' +
                        '</div>';
                        $("#error-div").html(errorHtml);        
                    }
                }
            });
        }
    </script>
</body>
</html>