<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Matteo Bruni">
	<meta name="app-url" content="<?php echo base_url('/');?>">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('vendor/css/particles.css');?>" rel="stylesheet"/>
    <link href="<?php echo base_url('vendor/css/auth.css');?>" rel="stylesheet"/>
    <script src="<?php echo base_url('vendor/jquery.js');?>"></script>

</head>

<body>
<div id="tsparticles"></div>
<main class="box">
    <h2>Register</h2>
    <form action="javascript:void(0)" id="from-save">
        <div class="inputBox">
            <label for="userName">email</label>
            <input type="email" id="email" name="email" placeholder="type your email" required/>
        </div>
        <div class="inputBox">
            <label for="userPassword">Password</label>
            <input type="password" name="password" id="password" placeholder="type your password"
                   required/>
        </div>
        <div class="inputBox">
            <label for="userConfirmPassword">Confirm Password</label>
            <input type="password" name="confirm_password" id="confirm_password" placeholder="confirm your password"
                   required/>
        </div>
        <button type="submit" name="submit" id="submit" >Submit</button>
        <a class="button" href="<?php echo base_url('log');?>" >Login</a>
    </form>
</main>
<footer>
</footer>

<script type="text/javascript">

 $('#from-save').on('submit', function(e) {
    event.preventDefault();
    var formData = new FormData(this);
    let url = $('meta[name=app-url]').attr("content") + "/api/register";
    var email = $('#email').val();
    var password = $('#password').val(); 
    var confirm_password = $('#confirm_password').val();// Attribut l'id d'un champ a une variable
   
    if(email!="" && confirm_password!="" && password!=""){
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
                $("#email").val("");
                $("#password").val("");
                $("#confirm_password").val(""); // permet de recuperer l'id d'un champs du formulaire

                 window.location.href="/";
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
