<!DOCTYPE html>
<html>
<head>
	<title></title>
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
        <h2 class="text-center mt-5 mb-3">CRUD Codigniter 4 - AJAX enroulement</h2>
        <div class="card">
            <div class="card-header">
                <button class="btn btn-outline-primary" onclick="createEnroulement()"> 
                    Ajouter n'enroulement
                </button>
            </div>
            <div class="card-body">
                <div id="alert-div">
                  
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        	<th class="text-center" width="100">#</th>
                            <th class="text-center">Annee_academique</th>
                            <th class="text-center">id_etudiant</th>
                            <th class="text-center">id_niveau</th>
                            <th class="text-center">id_specialite</th>
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
    <div class="modal"  id="form-modal">
        <div class="modal-dialog" >
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ajouter Un enroulement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">                
                <form>
                    <input type="hidden" name="id_enroulement" id="id_enroulement">
                    <div class="form-group">

                        <label for="Annee_academique">Annee academique</label>
                        <input type="date" class="form-control" id="Annee_academique" name="Annee_academique">
                        <div>
                            <label for=""> etudiant</label>
                            <select  class="searchetudiant form-control" id="id_etudiant" name="searchetudiant" style = "width:100%"></select>
                        </div>
                        <div>
                            <label for=""> niveau</label><br>
                            <select class="search form-control" id="id_niveau" name="search" style ="width: 100%;"></select><br>
                        </div>
                        <div>
                            <label for="">specialite</label>
                            <select class="searchspecialite form-control" id="id_specialite" name="searchspecialite" style ="width: 100%;"></select><br>
                        </div>
                        <div id="error-div"></div>
                    </div>                  
                    <button type="submit" class="btn btn-outline-primary mt-3" id="saveEnroulement">Enregistrer enroulement</button>
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
                <h5 class="modal-title">Information enroulement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <b>Annee_academique:</b>
                <p id="Annee"></p>
                <b>id_etudiant:</b>
                <p id="nom"></p>
                <b>id_niveau:</b>
                <p id="nom_niveau"></p>
                <b>id_specialite:</b>
                <p id="nom_specialite"></p>
            </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
    	showAllEnroulement();
    	/* affiche tous les enroulement */
    	function showAllEnroulement(){
            let url = $('meta[name=app-url]').attr("content") + "/api/listeEnroulement";
            $.ajax({
                url: url,
                method: "GET",
                success: function(response) {
                    $("#levelTable").html("");
                    let enroulement = response;
                    for (var i = 0; i < enroulement.length; i++) 
                    {
                        let showBtn =  '<button ' +
                            ' class="btn btn-outline-info" ' +
                            ' onclick="showEnroulement(' + enroulement[i].id_enroulement + ')">Show' +
                        '</button> ';
                        let editBtn =  '<button ' +
                            ' class="btn btn-outline-success" ' +
                            ' onclick="editEnroulement(' + enroulement[i].id_enroulement + ')">Edit' +
                        '</button> ';
                        let deleteBtn =  '<button ' +
                            ' class="btn btn-outline-danger" ' +
                            ' onclick="deleteEnroulement(' + enroulement[i].id_enroulement + ')">Delete' +
                        '</button>';
      
                        let colonne = '<tr>' +
                        	'<th class="text-center">' + (i+1) + '</th>' +
                            '<td>' + enroulement[i].Annee_academique + '</td>' +
                            '<td>' + enroulement[i].nom + '</td>' +
                            '<td>' + enroulement[i].nom_niveau + '</td>' +
                            '<td>' + enroulement[i].nom_specialite + '</td>' +
                            '<td class="text-center">' + enroulement[i].statut + '</td>' +
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
    	
    	/* recuperer et afficher un enroulement dans le modale */
        function showEnroulement(id){
            $("#Annee").html("");
            $("#nom").html("");
            $("#nom_niveau").html("");
            $("#nom_specialite").html("");
            let url = $('meta[name=app-url]').attr("content") + "/api/unEnroulement/" + id +"";
            $.ajax({
                url: url,
                method: "GET",
                success: function(response) {
                    let enroulement = response
                    $("#Annee").html(enroulement.Annee_academique);
                    $("#nom").html(enroulement.nom);
                    $("#nom_niveau").html(enroulement.nom_niveau);
                    $("#nom_specialite").html(enroulement.nom_specialite);
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
        function deleteEnroulement(id){
            let url = $('meta[name=app-url]').attr("content") + "/api/supprimerEnroulement/" + id;
            $.ajax({
                url: url,
                method: "GET",
                success: function(response) {
                    let successHtml = '<div class="alert alert-success" role="alert"><b>enroulement Supprimer avec succès</b></div>';
                    $("#alert-div").html(successHtml);
                    showAllEnroulement();
                },
                error: function(response) {
                    console.log(response.responseJSON)
                }
            });
        }

        /*
            show modal pour l'ajout d'un enroulement
            mettre les champs à vide pour effacer les anciennes valeurs 
        */
        function createEnroulement(){
            $("#alert-div").html("");
            $("#error-div").html("");   
            $("#id_enroulement").val("");
            $("#Annee_academique").val("");
            $("#id_etudiant").val("");
            $("#id_niveau").val("");
            $("#id_specialite").val("");
            $("#form-modal").modal('show'); 
        }

        /* Vérifier si le formulaire est soumis pour l'insertion ou modification */
        $("#saveEnroulement").click(function(event ){
            event.preventDefault();
            if($("#id_enroulement").val() == null || $("#id_enroulement").val() == "")
            {
                addEnroulement();
            } else {
                updateEnroulement();
            }
        })

        /* Soumission du formulaire pour les insertions */
        function addEnroulement() {   
            $("#saveEnroulement").prop('disabled', true);
            let url = $('meta[name=app-url]').attr("content") + "/api/ajouterEnroulement";
            let data = {
                Annee_academique: $("#Annee_academique").val(),
                id_enroulement : $("#id_enroulement").val(),
                id_etudiant: $("#id_etudiant").val(),
                id_niveau: $("#id_niveau").val(),
                id_specialite: $("#id_specialite").val()

            };
            $.ajax({
                url: url,
                method: "POST",
                data: data,
                success: function(response) {
                    $("#saveEnroulement").prop('disabled', false);
                    let successHtml = '<div class="alert alert-success" role="alert"><b>enroulement Crée Avec Succès</b></div>';
                    $("#alert-div").html(successHtml);
                    $("#Annee_academique").val("");
                    $("#id_etudiant").val("");
                    $("#id_niveau").val("");
                    $("#id_specialite").val("");
                    $("#description").val("");
                    //$("#id_enroulement").val("");


                    showAllEnroulement();
                    $("#form-modal").modal('hide');
                },
                error: function(response) {
                    /*
                    show validation error
                    */
                    console.log(response)
                    // $("#saveEnroulement").prop('disabled', false);
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
        function editEnroulement(id){
            let url = $('meta[name=app-url]').attr("content") + "/api/unEnroulement/" + id ;
            $.ajax({
                url: url,
                method: "GET",
                success: function(response) {
                    let project = response
                    $("#alert-div").html("");
                    $("#error-div").html("");   
                    $("#id_enroulement").val(project.id_enroulement);
                    $("#Annee_academique").val(project.Annee_academique);
                    $("#id_etudiant").val(project.nom);
                    $("#id_niveau").val(project.nom_niveau);
                    $("#id_specialite").val(project.nom_specialite);
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
        function updateEnroulement() {
            $("#saveEnroulement").prop('disabled', true);
            let id_enroulement = $("#id_enroulement").val();
            let url = $('meta[name=app-url]').attr("content") + "/api/modifierEnroulement";
            let data = {
                id_enroulement: id_enroulement,
                Annee_academique: $("#Annee_academique").val(),
                id_etudiant: $("#id_etudiant").val(),
                id_niveau: $("#id_niveau").val(),
                id_specialite: $("#id_specialite").val(),
            };
            $.ajax({
                url: url,
                method: "POST",
                data: data,
                //contentType: 'application/json',
                success: function(response) {
                    $("#saveEnroulement").prop('disabled', false);
                    let successHtml = '<div class="alert alert-success" role="alert"><b>enroulement Modifié Avec Succès</b></div>';
                    $("#alert-div").html(successHtml);
                    $("#Annee_academique").val("");
                    $("#id_etudiant").val("");
                    $("#id_niveau").val("");
                    $("#id_specialite").val("");
                    $("#id_enroulement").val("");
                    showAllEnroulement();
                    $("#form-modal").modal('hide');
                },
                error: function(response) {
                    /*
                    show validation error
                    */
                    console.log(response)
                    $("#saveEnroulement").prop('disabled', false);
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
    <script>
    url = $('meta[name=app-url]').attr("content") + "/api/SearchNiveau";
            $('.search').select2({
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

            url = $('meta[name=app-url]').attr("content") + "/api/searchetudiant";
            $('.searchetudiant').select2({
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

              url = $('meta[name=app-url]').attr("content") + "/api/searchspecialite";
            $('.searchspecialite').select2({
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
</script>
</body>

</html>