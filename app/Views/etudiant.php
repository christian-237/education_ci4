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
        <h2 class="text-center mt-5 mb-3">CRUD Codigniter 4 - AJAX etudiant</h2>
        <div class="card">
            <div class="card-header">
                <button class="btn btn-outline-primary" onclick="createEtudiant()"> 
                    Ajouter Un etudiant
                </button>
            </div>
            <div class="card-body">
                <div id="alert-div">
                  
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        	<th class="text-center" width="100">#</th>
                            <th class="text-center">Nom</th>
                            <th class="text-center">prenom</th>
                            <th class="text-center">date naissance</th>
                            <th class="text-center">image</th>
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
                <h5 class="modal-title">Ajouter Un etudiant</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">                
                <form>
                    <input type="hidden" name="id_description" id="id_description">
                    <div class="form-group">
                        <label for="description">Nom etudiant</label>
                        <input type="text" class="form-control" id="nom" name="nom">
                        <label for="description">prenom etudiant</label>
                        <input type="text" class="form-control" id="prenom" name="prenom">
                        <label for="description">date naissance etudiant</label>
                        <input type="date" class="form-control" id="date_naissance" name="date_naissance">
                        <label for="description">image etudiant</label>
                        <input type="text" class="form-control" id="image" name="image">
                        <div id="error-div"></div>
                    </div>                  
                    <button type="submit" class="btn btn-outline-primary mt-3" id="saveEtudiant">Enregistrer etudiant</button>
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
                <h5 class="modal-title">Information etudiant</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <b>nom:</b>
                <p id="nom_infos"></p>
                <b>prenom:</b>
                <p id="prenom_infos"></p>
                <b>date_naissance:</b>
                <p id="date_naissance_infos"></p>
                <b>image:</b>
                <p id="image_infos"></p>
                <b>Statut:</b>
                <p id="etudiant_statut"></p>
            </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
    	showAllEtudiant();
    	/* affiche tous les etudiantx */
    	function showAllEtudiant(){
            let url = $('meta[name=app-url]').attr("content") + "/api/listeEtudiant";
            $.ajax({
                url: url,
                method: "GET",
                headers: {"Authorization": "Bearer " +localStorage.getItem("token")},
                success: function(response) {
                    $("#levelTable").html("");
                    let etudiant = response;
                    for (var i = 0; i < etudiant.length; i++) 
                    {
                        let showBtn =  '<button ' +
                            ' class="btn btn-outline-info" ' +
                            ' onclick="showEtudiant(' + etudiant[i].id_etudiant + ')">Show' +
                        '</button> ';
                        let editBtn =  '<button ' +
                            ' class="btn btn-outline-success" ' +
                            ' onclick="editEtudiant(' + etudiant[i].id_etudiant + ')">Edit' +
                        '</button> ';
                        let deleteBtn =  '<button ' +
                            ' class="btn btn-outline-danger" ' +
                            ' onclick="deleteEtudiant(' + etudiant[i].id_etudiant + ')">Delete' +
                        '</button>';
      
                        let colonne = '<tr>' +
                        	'<th class="text-center">' + (i+1) + '</th>' +
                            '<td>' + etudiant[i].nom + '</td>' +
                            '<td>' + etudiant[i].prenom + '</td>' +
                            '<td>' + etudiant[i].date_naissance + '</td>' +
                            '<td>' + etudiant[i].image + '</td>' +
                            '<td class="text-center">' + etudiant[i].statut + '</td>' +
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
    	
    	/* recuperer et afficher un etudiant dans le modale */
        function showEtudiant(id){
            $("#nom_infos").html("");
            $("#prenom_infos").html("");
            $("#date_naissance_infos").html("");
            $("#image_infos").html("");
            $("#etudiant_statut").html("");
            let url = $('meta[name=app-url]').attr("content") + "/api/unEtudiant/" + id +"";
            $.ajax({
                url: url,
                method: "GET",
                headers: {"Authorization": "Bearer " +localStorage.getItem("token")},
                success: function(response) {
                    let etudiant = response
                    $("#nom_infos").html(etudiant.nom);
                    $("#prenom_infos").html(etudiant.prenom);
                    $("#date_naissance_infos").html(etudiant.date_naissance);
                    $("#image_infos").html(etudiant.image);
                    $("#etudiant_statut").html(etudiant.statut);
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
        function deleteEtudiant(id){
            let url = $('meta[name=app-url]').attr("content") + "/api/supprimerEtudiant/" + id;
            $.ajax({
                url: url,
                method: "GET",
                headers: {"Authorization": "Bearer " +localStorage.getItem("token")},
                success: function(response) {
                    let successHtml = '<div class="alert alert-success" role="alert"><b>etudiant Supprimer avec succès</b></div>';
                    $("#alert-div").html(successHtml);
                    showAllEtudiant();
                },
                error: function(response) {
                    console.log(response.responseJSON)
                }
            });
        }

        /*
            show modal pour l'ajout d'un etudiant
            mettre les champs à vide pour effacer les anciennes valeurs 
        */
        function createEtudiant(){
            $("#alert-div").html("");
            $("#error-div").html("");   
            $("#id_description").val("");
            $("#nom").val("");
            $("#prenom").val("");
            $("#date_naissance").val("");
            $("#image").val("");
            $("#form-modal").modal('show'); 
        }

        /* Vérifier si le formulaire est soumis pour l'insertion ou modification */
        $("#saveEtudiant").click(function(event ){
            event.preventDefault();
            if($("#id_description").val() == null || $("#id_description").val() == "")
            {
                addEtudiant();
            } else {
                updateEtudiant();
            }
        })

        /* Soumission du formulaire pour les insertions */
        function addEtudiant() {   
            $("#saveEtudiant").prop('disabled', true);
            let url = $('meta[name=app-url]').attr("content") + "/api/ajouterEtudiant";
            let data = {
                nom: $("#nom").val(),
                prenom: $("#prenom").val(),
                date_naissance: $("#date_naissance").val(),
                image: $("#image").val()
            };
            $.ajax({
                url: url,
                method: "POST",
                headers: {"Authorization": "Bearer " +localStorage.getItem("token")},
                data: data,
                success: function(response) {
                    console.log(response)
                    $("#saveEtudiant").prop('disabled', false);
                    let successHtml = '<div class="alert alert-success" role="alert"><b>etudiant ajour Avec Succès</b></div>';
                    $("#alert-div").html(successHtml);
                    $("#nom").val("");
                    $("#prenom").val("");
                    $("#date_naissance").val("");
                    $("#image").val("");
                    showAllEtudiant();
                    $("#form-modal").modal('hide');
                },
                error: function(response) {
                    /*
                    show validation error
                    */
                    $("#saveEtudiant").prop('disabled', false);
                    console.log(response)
                    // $("#saveEtudiant").prop('disabled', false);
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
        function editEtudiant(id){
            let url = $('meta[name=app-url]').attr("content") + "/api/unEtudiant/" + id ;
            $.ajax({
                url: url,
                method: "GET",
                headers: {"Authorization": "Bearer " +localStorage.getItem("token")},
                success: function(response) {
                    let project = response
                    $("#alert-div").html("");
                    $("#error-div").html("");   
                    $("#id_description").val(project.id_etudiant);
                    $("#nom").val(project.nom);
                    $("#prenom").val(project.prenom);
                    $("#date_naissance").val(project.date_naissance);
                    $("#image").val(project.image);
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
        function updateEtudiant() {
            $("#saveEtudiant").prop('disabled', true);
            let id_etudiant = $("#id_description").val();
            let url = $('meta[name=app-url]').attr("content") + "/api/modifierEtudiant";
            let data = {
                id_etudiant: id_etudiant,
                nom: $("#nom").val(),
                prenom: $("#prenom").val(),
                date_naissance: $("#date_naissance").val(),
                image: $("#image").val()
            };
            $.ajax({
                url: url,
                method: "POST",
                headers: {"Authorization": "Bearer " +localStorage.getItem("token")},
                data: data,
                //contentType: 'application/json',
                success: function(response) {
                    $("#saveEtudiant").prop('disabled', false);
                    let successHtml = '<div class="alert alert-success" role="alert"><b>etudiant Modifié Avec Succès</b></div>';
                    $("#alert-div").html(successHtml);
                    $("#nom").val("");
                    $("#prenom").val("");
                    $("#date_naissance").val("");
                    $("#image").val("");
                    $("#id_description").val("");
                    showAllEtudiant();
                    $("#form-modal").modal('hide');
                },
                error: function(response) {
                    /*
                    show validation error
                    */
                    console.log(response.responseJSON)
                    $("#saveEtudiant").prop('disabled', false);
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