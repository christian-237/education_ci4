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
        <h2 class="text-center mt-5 mb-3">CRUD Codigniter 4 - AJAX</h2>
        <div class="card">
            <div class="card-header">
                <button class="btn btn-outline-primary" onclick="createLevel()"> 
                    Ajouter Un Niveau
                </button>
            </div>
            <div class="card-body">
                <div id="alert-div">
                  
                </div>
                <table class="table table-bordered" >
                    <thead>
                        <tr>
                        	<th class="text-center" width="100">#</th>
                            <th class="text-center">Nom</th>
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
                <h5 class="modal-title">Ajouter Un Niveau</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">                
                <form>
                    <input type="hidden" name="id_description" id="id_description">
                    <div class="form-group">
                        <label for="description">Nom Niveau</label>
                        <input type="text" class="form-control" id="description" name="description">
                        <div id="error-div"></div>
                    </div>                  
                    <button type="submit" class="btn btn-outline-primary mt-3" id="saveLevel">Enregistrer Niveau</button>
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
                <h5 class="modal-title">Information Niveau</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <b>Description:</b>
                <p id="level_infos"></p>
                <b>Statut:</b>
                <p id="level_statut"></p>
            </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
    	showAllLevel();
    	/* affiche tous les niveaux */
    	function showAllLevel(){
            let url = $('meta[name=app-url]').attr("content") + "/api/listeNiveau";
            $.ajax({
                url: url,
                method: "GET",
                success: function(response) {
                    $("#levelTable").html("");
                    let niveau = response;
                    for (var i = 0; i < niveau.length; i++) 
                    {
                        let showBtn =  '<button ' +
                            ' class="btn btn-outline-info" ' +
                            ' onclick="showLevel(' + niveau[i].id_niveau + ')">Show' +
                        '</button> ';
                        let editBtn =  '<button ' +
                            ' class="btn btn-outline-success" ' +
                            ' onclick="editLevel(' + niveau[i].id_niveau + ')">Edit' +
                        '</button> ';
                        let deleteBtn =  '<button ' +
                            ' class="btn btn-outline-danger" ' +
                            ' onclick="deleteLevel(' + niveau[i].id_niveau + ')">Delete' +
                        '</button>';
      
                        let colonne = '<tr>' +
                        	'<th class="text-center">' + (i+1) + '</th>' +
                            '<td>' + niveau[i].nom_niveau + '</td>' +
                            '<td class="text-center">' + niveau[i].statut + '</td>' +
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
    	
    	/* recuperer et afficher un niveau dans le modale */
        function showLevel(id){
            $("#level_infos").html("");
            $("#level_statut").html("");
            let url = $('meta[name=app-url]').attr("content") + "/api/unNiveau/" + id +"";
            $.ajax({
                url: url,
                method: "GET",
                success: function(response) {
                    let niveau = response
                    $("#level_infos").html(niveau.nom_niveau);
                    $("#level_statut").html(niveau.statut);
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
        function deleteLevel(id){
            let url = $('meta[name=app-url]').attr("content") + "/api/supprimerNiveau/" + id;
            $.ajax({
                url: url,
                method: "GET",
                success: function(response) {
                    let successHtml = '<div class="alert alert-success" role="alert"><b>Niveau Supprimer avec succès</b></div>';
                    $("#alert-div").html(successHtml);
                    showAllLevel();
                },
                error: function(response) {
                    console.log(response.responseJSON)
                }
            });
        }

        /*
            show modal pour l'ajout d'un niveau
            mettre les champs à vide pour effacer les anciennes valeurs 
        */
        function createLevel(){
            $("#alert-div").html("");
            $("#error-div").html("");   
            $("#id_description").val("");
            $("#description").val("");
            $("#form-modal").modal('show'); 
        }

        /* Vérifier si le formulaire est soumis pour l'insertion ou modification */
        $("#saveLevel").click(function(event ){
            event.preventDefault();
            if($("#id_description").val() == null || $("#id_description").val() == "")
            {
                addLevel();
            } else {
                updateLevel();
            }
        })

        /* Soumission du formulaire pour les insertions */
        function addLevel() {   
            $("#saveLevel").prop('disabled', true);
            let url = $('meta[name=app-url]').attr("content") + "/api/ajouterNiveau";
            let data = {
                description: $("#description").val()
            };
            $.ajax({
                url: url,
                method: "POST",
                data: data,
                success: function(response) {
                    $("#saveLevel").prop('disabled', false);
                    let successHtml = '<div class="alert alert-success" role="alert"><b>Niveau Crée Avec Succès</b></div>';
                    $("#alert-div").html(successHtml);
                    $("#description").val("");
                    showAllLevel();
                    $("#form-modal").modal('hide');
                },
                error: function(response) {
                    /*
                    show validation error
                    */
                    console.log(response.responseJSON)
                    $("#saveLevel").prop('disabled', false);
                    if(response.responseJSON.status == 400) {
                        let errors = response.responseJSON.messages;
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

        /*
            edit record function
            it will get the existing value and show the project form
        */
        function editLevel(id){
            let url = $('meta[name=app-url]').attr("content") + "/api/unNiveau/" + id ;
            $.ajax({
                url: url,
                method: "GET",
                success: function(response) {
                    let project = response
                    $("#alert-div").html("");
                    $("#error-div").html("");   
                    $("#id_description").val(project.id_niveau);
                    $("#description").val(project.nom_niveau);
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
        function updateLevel() {
            $("#saveLevel").prop('disabled', true);
            let id_niveau = $("#id_description").val();
            let url = $('meta[name=app-url]').attr("content") + "/api/modifierNiveau";
            let data = {
                id_niveau: id_niveau,
                description: $("#description").val(),
            };
            $.ajax({
                url: url,
                method: "POST",
                data: data,
                //contentType: 'application/json',
                success: function(response) {
                    $("#saveLevel").prop('disabled', false);
                    let successHtml = '<div class="alert alert-success" role="alert"><b>Niveau Modifié Avec Succès</b></div>';
                    $("#alert-div").html(successHtml);
                    $("#description").val("");
                    $("#id_description").val("");
                    showAllLevel();
                    $("#form-modal").modal('hide');
                },
                error: function(response) {
                    /*
                    show validation error
                    */
                    console.log(response.responseJSON)
                    $("#saveLevel").prop('disabled', false);
                    if(response.responseJSON.status == 400) {
                        let errors = response.responseJSON.messages;
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