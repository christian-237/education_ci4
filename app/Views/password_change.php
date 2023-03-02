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
              <form>
                <div class="mb-md-2 mt-md-2">
                  <h4 class="fw-bold mb-2 text-uppercase">mot de passe oublié</h4>
                  <p class="mb-2"><img style="border-radius: 50%; " src="<?php echo base_url('images/images.jpeg'); ?>" alt="example image"></p>
                  <div class="form-outline form-white mb-2">
                    <label for="email">Address Email</label>
                    <input type="text" class="form-control" id="email" name="email">
                  </div>
                  <div class="form-outline form-white mb-2">
                      <label for="Subject"> Subject</label>
                      <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject Message" required/>
                  </div>
                  <div class="form-outline form-white mb-2">
                      <label> Emaeil Message</label>
                      <input type="text" class="form-control" name="message" id="message" placeholder="Emaeil Message" required/>
                  </div>
                    <button id="submit"  type="button" class="form-control btn btn-outline-light btn-lg px-5" name="submit" >Reset Password</button>
                  </div>
                <div>
              </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<script type="text/javascript">

$('#submit').click(function(e) {
   //event.preventDefault();
   let url = $('meta[name=app-url]').attr("content") + "/send";
   var email = $('#email').val();
   var message = $('#message').val(); 
   var subject = $('#subject').val();// Attribut l'id d'un champ a une variable
  
   if(email!="" && subject!="" && message!=""){
      let formData = {
        email: email,
        message: message,
        subject: subject
        };
        // console.log(formData);
       $.ajax({
           type: "POST",
           url: url,
           cache: false,
           data: formData,
           dataType: 'json',
           success: function(data) {
               $("#submit").prop('disabled', false);
               let successHtml = '<div class="alert alert-success" role="alert"><b>SUCCESS!</b></div>';
               $("#alert-div").html(successHtml);
               $("#email").val("");
               $("#message").val("");
               $("#subject").val(""); // permet de recuperer l'id d'un champs du formulaire

           },
           error: function(response) {

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