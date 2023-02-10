<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
	<meta name="app-url" content="<?php echo base_url('/');?>">

  <title>login</title>
    <script src="<?php echo base_url('vendor/jquery.js');?>"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
</head>

<body>
    <div class="container py-5">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-dark text-white" style="border-radius: 1rem;">
            <div class="card-body text-center">
              <form  action="javascript:void(0)" id="from-save">
                <input type="hidden" name="id_users " id="id_users ">
                <div class="mb-md-2 mt-md-2">
                  <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                  <p class="text-white-50 mb-5">Please enter your login and password!</p>
                  <div class="form-outline form-white mb-4">
                    <label for="email ">email</label>
                    <input type="text" class="form-control" id="email" name="email">
                  </div>
                  <div class="form-outline form-white mb-4">
                    <label class="form-label" >Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                  </div>
                    
                    <button type="submit" name="submit" class="btn btn-outline-light btn-lg px-5">connexion</button>
                  </div>
                <div>
              </form>
                <p class="mb-0"><button class="btn btn-outline-light px-5" >Register</button></p>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>


<script>
    localStorage.clear();
    $('#from-save').on('submit', function(e) {
        event.preventDefault();
        var formData = new FormData(this);
        let url = $('meta[name=app-url]').attr("content") + "/api/login";
        var email = $('#email').val();
        var password = $('#password').val();   // Attribut l'id d'un champ a une variable
      

        if(email!="" && password!=""){

            $.ajax({
                type: "POST",
                url: url,
                cache: false,
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',

                success: function(data) {

                    $("#submit").prop('disabled', false);
                    let successHtml = '<div class="alert alert-success" role="alert"><b>SUCCESS!</b></div>';
                    $("#alert-div").html(successHtml);
                    // $("#email").val("");
                    // $("#password").val(""); // permet de recuperer l'id d'un champs du formulaire

                    // stockage des params
                  localStorage.setItem('token', data.token);
                  localStorage.setItem('authorisation', 'admin');
                        window.location.href="Nivea";
                    
                },
                error: function(response) {
                  alert("erreur de connexion");
                }
                
            });
        }else{
            let successHtml = '<div class="alert alert-success" role="alert"><b>SUCCESS!</b></div>';
            $("#alert-div").html(successHtml);
        }

    });


    $(document).ready(function() {

    });
    </script>
</body>

</html>