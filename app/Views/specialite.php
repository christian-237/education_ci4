<!DOCTYPE html>
<html>
<head>
	<title><?= $title; ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="app-url" content="<?php echo base_url('/');?>">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>	 -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
</head>
<body>
	<div class="container">
        <h2 class="text-center mt-5 mb-3">CRUD Codigniter 4 - AJAX specialite</h2>
        <div class="card">
            <div class="card-header">
                <button class="btn btn-outline-primary" onclick="create_specialite()"> 
                    Ajouter Une specialite
                </button>
            </div>
            <div class="card-body">
                <div id="alert-div">
                  
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        	<th class="text-center" width="100">#</th>
                            <th class="text-center col-md-2">nom specialite</th>
                            <th class="text-center col-md-3">description specialite</th>
                            <th class="text-center col-md-2"> nom departement</th>
                            <th class="text-center " width="240px">Statut</th>
                            <th class="text-center col-md-5" width="240px">Action</th>
                        </tr>
                    </thead>
                    <tbody id="specialiteTable">
                          
                    </tbody>
                      
                </table>
            </div>
        </div>
    </div>
   
    <!-- Modale Pour la création et modification  -->
     <div class="modal"  id="form-modal"> 
        <div class="modal-dialog" >
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ajouter Une specialite</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">                
                <form>
                    <input type="hidden" name="id_specialite" id="id_specialite">
                    <div class="form-group">
                        <div class="container mt-2 mb-2">
                            <label> departement</label>
                        
                            <select class="searchdepartement form-control" id="id_departement" name="searchdepartement" style = "width:100%"></select>

                        </div>
                        <!-- <label for="specialite"> departement</label> -->
                        <!-- <input type="text" class="form-control" id="id_departement"  name="id_departement"> -->
                        <label for="nom_specialite">nom specialite</label>
                        <input type="text" class="form-control" id="nom_specialite" name="nom_specialite"><br>
                        <label for="description">description specialite</label>
                        <input type="text" class="form-control" id="description_spe" name="description_spe">
                        <div id="error-div"></div>
                    </div>                  
                    <button type="submit" class="btn btn-outline-primary mt-3" id="savespecialite">Enregistrer specialite</button>
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
                <h5 class="modal-title">Information specialite</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <b>nom specialite:</b>
                <p id="nom_specialit"></p>
                <b>Description specialite:</b>
                <p id="description_sp"></p>
                <b>departement:</b>
                <p id="nom_departemen"></p>
                <b>Statut:</b>
                <p id="specialite_statu"></p>
            </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
    	showAllspecialite();
    	/* affiche tous les specialitex */
    	function showAllspecialite(){
            let url = $('meta[name=app-url]').attr("content") + "/api/listeSpecialite";
            $.ajax({
                url: url,
                method: "GET",
                headers: {"Authorization": "Bearer " +localStorage.getItem("token")},
                success: function(response) {
                    $("#specialiteTable").html("");
                    let specialite = response;
                    for (var i = 0; i < specialite.length; i++)  {
                        let showBtn =  '<button ' + ' class="btn btn-outline-info" ' +
                            ' onclick="showspecialite(' + specialite[i].id_specialite + ')">Show' +
                        '</button> ';
                        let editBtn =  '<button ' +
                            ' class="btn btn-outline-success" ' +
                            ' onclick="editspecialite(' + specialite[i].id_specialite + ')">Edit' +
                        '</button> ';
                        let deleteBtn =  '<button ' +
                            ' class="btn btn-outline-danger" ' +
                            ' onclick="delete_specialite(' + specialite[i].id_specialite + ')">Delete' +
                        '</button>';
      
                        let colonne = '<tr>' +
                        	'<th class="text-center">' + (i+1) + '</th>' +
                            '<td>' + specialite[i].nom_specialite + '</td>' +
                            '<td>' + specialite[i].description_spe + '</td>' +
                            '<td>' + specialite[i].nom_departement + '</td>' +
                            '<td class="text-center">' + specialite[i].statut + '</td>' +
                            '<td class="text-center">' + showBtn + editBtn + deleteBtn + '</td>' +
                        '</tr>';
                        $("#specialiteTable").append(colonne);
                    }
      
                      
                },
                error: function(response) {
                    console.log(response.responseJSON)
                }
            });
        }
    	
    	/* recuperer et afficher un specialite dans le modale */
        function showspecialite(id){
            $("#nom_departemen").html("");
            $("#nom_specialit").html("");
            $("#description_sp").html("");
            $("#specialite_statu").html("");
            let url = $('meta[name=app-url]').attr("content") + "/api/uneSpecialite/" + id +"";
            $.ajax({
                url: url,
                method: "GET",
                success: function(response) {
                    let specialite = response
                    $("#nom_specialit").html(specialite.nom_specialite);
                    $("#description_sp").html(specialite.description_spe);
                    $("#nom_departemen").html(specialite.nom_departement);
                    $("#specialite_statu").html(specialite.statut);
                    $("#view-modal").modal('show'); 
      
                },
                error: function(response) {
                    console.log(response.response)
                }
            });
        }

        /*
            delete record function
        */
        function delete_specialite(id){
            let url = $('meta[name=app-url]').attr("content") + "/api/supprimerSpecialite/" + id;
            $.ajax({
                url: url,
                method: "GET",
                success: function(response) {
                    let successHtml = '<div class="alert alert-success" role="alert"><b>specialite Supprimer avec succès</b></div>';
                    $("#alert-div").html(successHtml);
                    showAllspecialite();
                },
                error: function(response) {
                    console.log(response.responseJSON)
                }
            });
        }

        /*
            show modal pour l'ajout d'un specialite
            mettre les champs à vide pour effacer les anciennes valeurs 
        */
        function create_specialite(){
            $("#alert-div").html("");
            $("#error-div").html("");   
            $("#id_departement").val("");
            $("#nom_specialite").val("");
            $("#description_spe").val("");
            $("#form-modal").modal('show'); 
        }

        /* Vérifier si le formulaire est soumis pour l'insertion ou modification */
        $("#savespecialite").click(function(event ){
            event.preventDefault();
            if($("#id_specialite").val() == null || $("#id_specialite").val() == "")
            {
                addspecialite();
            } else {
                modification_specialite();
            }
        })

        /* Soumission du formulaire pour les insertions */
        function addspecialite() {   
            $("#savespecialite").prop('disabled', true);
            let url = $('meta[name=app-url]').attr("content") + "/api/ajouterspecialite";
            let data = {
                description_spe: $("#description_spe").val(),
                nom_specialite: $("#nom_specialite").val(),
                id_departement: $("#id_departement").val()
            };
            $.ajax({
                url: url,
                method: "POST",
                data: data,
                success: function(response) {
                    $("#savespecialite").prop('disabled', false);
                    let successHtml = '<div class="alert alert-success" role="alert"><b>specialite Crée Avec Succès</b></div>';
                    $("#alert-div").html(successHtml);
                    $("#description").val("");
                    $("#nom_specialite").val("");
                    $("#description_spe").val("");
                    $("#id_departement").val("");
                    showAllspecialite();
                    $("#form-modal").modal('hide');
                },
                error: function(response) {
                    /*
                    show validation error
                    */
                    console.log(response)
                    // $("#savespecialite").prop('disabled', false);
                    // if(response.status == 400) {
                    //     let errors = response.messages;
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
        function editspecialite(id){
            let url = $('meta[name=app-url]').attr("content") + "/api/uneSpecialite/" + id ;
            $.ajax({
                url: url,
                method: "GET",
                success: function(response) {
                    let project = response
                    $("#alert-div").html("");
                    $("#error-div").html("");   
                    $("#id_specialite").val(project.id_specialite);
                    $("#nom_specialite").val(project.nom_specialite);
                    $("#description_spe").val(project.description_spe);
                    $("#id_departement").val(project.id_departement);
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
        function modification_specialite() {
            $("#savespecialite").prop('disabled', true);
            let id_specialite = $("#id_specialite").val();
            let url = $('meta[name=app-url]').attr("content") + "/api/modifierSpecialite";
            let data = {
                id_specialite: id_specialite,
                nom_specialite: $("#nom_specialite").val(),
                description_spe: $("#description_spe").val(),
                id_departement: $("#id_departement").val(),
            };
            $.ajax({
                url: url,
                method: "POST",
                data: data,
                //contentType: 'application/json',
                success: function(response) {
                    $("#savespecialite").prop('disabled', false);
                    let successHtml = '<div class="alert alert-success" role="alert"><b>specialite Modifié Avec Succès</b></div>';
                    $("#alert-div").html(successHtml);
                    $("#id_specialite").val("");
                    $("#nom_specialite").val("");
                    $("#description_spe").val("");
                    $("#id_departement").val("");
                    showAllspecialite();
                    $("#form-modal").modal('hide');
                },
                error: function(response) {
                    /*
                    show validation error
                    */
                    console.log(response)
                    $("#savespecialite").prop('disabled', false);
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

        url = $('meta[name=app-url]').attr("content") + "/api/searchdepartement";
            $('.searchdepartement').select2({
                placeholder: '--- Search User ---',
                minimumInputLength: 1,
                selectOnClose: true,
                allowClear: true,
                ajax: {
                  url: url,
                  dataType: 'json',
                  delay: 250,
                  processResults: function(data){
                    return {
                      results: data
                    };
                  },
                  cache: true
                }
              });
    </script>
</body>
</html>