<?php
include("csrf.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login - Cafe Square</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/business-casual.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <script src = "js/login.js" type = "text/javascript"/></script>


</head>

<body>

    <div class="brand">Cafe Square</div>
    <div class="address-bar">30 Square point | Dublin 6 | 899694284</div>

    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Cafe Square</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php">Login</a>
                    </li>
                    <li>
                        <a href="admin.php">Admin Login</a>
                    </li>
                    <li>
                        <a href="signup.php">Signup</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Cafe Square
                        <strong>LOGIN</strong>
                    </h2>
                    <hr>
                </div>

      <form action="indexvalidate.php" method="post" class="register-form" onsubmit="return validation()">
        <div class="form">
        <input type="email" name="email" placeholder="Type in the email id" id="mail" autocomplete="off" required />
        <span id="emailid"></span>
        </div>
        <div class="form">
        <input type="password" placeholder="Type in the password" name="pass" id="pass" autocomplete="off" required />
        <span id="password"></span>
        </div>
        <div class="rem">
        <input type="checkbox" name="remember"> Remember Me </input>
        </div>
   <center><p id="question"></p><div class="form"><input id="ans" type="text" autocomplete="off"></div>
    <div id="message">Type correct answer to verify.</div>
    <div id="success"></div>
    <div id="fail"></div>   
    <div class="form">        
    <input type="submit" value='Login' name='operation'>
    <center><a href = "forgotpass.php">Forgot password</a></center>
  </div></center> 
      </form>
     
    </div>
    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; Cafe Square 2020</p>
                </div>
            </div>
        </div>
    </footer>
    <script src="js/jquery.js"></script>

    <script src="js/bootstrap.min.js"></script>
     <script type="text/javascript">

    function validation(){

        var email = document.getElementById('mail').value;
        var pass = document.getElementById('pass').value;

        if(email == ""){
          document.getElementById('emailid').innerHTML = "**Please fill the email_id field font-weight-bold".fontcolor("red");
          return false;

        }

        else if(email.indexOf('@') <= 0){

        document.getElementById('emailid').innerHTML = "** @ Position invalid".fontcolor("red").fontcolor("red");
        return false;


      }

      else if((email.charAt(email.length-4)!='.') && (email.charAt(email.length-3)!='.')){

        document.getElementById('emailid').innerHTML = "** . Position invalid".fontcolor("red");
        return false;

      }


        

      else if(pass == ""){
          document.getElementById('password').innerHTML = "**Please fill the password field".fontcolor("red");
          return false; 
      }


      else if((pass.length <=8) || (pass.length > 20)){

        document.getElementById('password').innerHTML = "**Password must be between 8 and 20".fontcolor("red");
        return false; 
      }

    }

      </script>
      <script type="text/javascript">
          $(document).ready(function(){

    $('input[type=submit]').attr('disabled','disabled');

    var randomNum1;
    var randomNum2;
    var maxNum = 20;
    var total;

    randomNum1 = Math.ceil(Math.random()*maxNum);
    randomNum2 = Math.ceil(Math.random()*maxNum);
    total =randomNum1 + randomNum2;

    $( "#question" ).prepend( randomNum1 + " + " + randomNum2 + "=" );

    $( "#ans" ).keyup(function() {

        var input = $(this).val();
        var slideSpeed = 200;

        $('#message').hide();

        if (input == total) {

            $('input[type=submit]').removeAttr('disabled');
            $('#success').slideDown(slideSpeed);
            $('#fail').slideUp(slideSpeed);

        }

        else {

            $('input[type=submit]').attr('disabled','disabled');
            $('#fail').slideDown(slideSpeed);
            $('#success').slideUp(slideSpeed);

        }

    });
});
      </script>
    
</body>

</html>
