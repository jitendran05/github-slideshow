  <?php      
  include('csrf.php');

  $mysqli = new mysqli('localhost','jitendran','VWmUmbiRKodei94K','cafeagape');


    if (isset($_POST['submit'])) {
        // session_start();
        $sql = "INSERT INTO signup(firstname, lastname, password, email, Question, Answer) VALUES (?,?,?,?,?,?)";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("ssssss", $firstname, $lastname, $password, $email, $question, $answer);

         $firstname = mysqli_real_escape_string($mysqli, $_POST['firstname']);
        $lastname = mysqli_real_escape_string($mysqli, $_POST['lastname']);
        $password = mysqli_real_escape_string($mysqli, $_POST['password']);
        $password2 = mysqli_real_escape_string($mysqli, $_POST['repassword']);
        $email = mysqli_real_escape_string($mysqli, $_POST['emailid']);
        $question = mysqli_real_escape_string($mysqli, $_POST['question']);
        $answer = mysqli_real_escape_string($mysqli, $_POST['answer']);


        if ($password == $password2) {

            $password = password_hash($password, PASSWORD_BCRYPT);
            
        $stmt->execute();
         header("location: index.php");
            
    } else {
        echo "<script>alert('Passwords doesn't match');</script>";    
    }
    $stmt->close();
    $mysqli->close();

}
?>





<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Signup - Start Bootstrap Theme</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/business-casual.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
    <script src = "js/signup.js" type = "text/javascript"/></script>

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
                <a class="navbar-brand" href="index.html">Cafe Square</a>
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
                        <strong>SIGNUP</strong>
                    </h2>
                    <hr>
                </div>
                <div class="login-page">
    
      <form action="signup.php" method="post" class="register-form" onsubmit="return validate()">
    <div class="form">
        <input type="text" placeholder="First Name" name="firstname" id="fname" autocomplete="off" required />
        <span id="firstname"></span>
    </div>
    <div class="form">
        <input type="text" placeholder="Last Name" name="lastname" id="lname" autocomplete="off" required />
        <span id="lastname"></span>
    </div>
    <div class="form">
        <input type="password" id="pass" placeholder="Enter password" name="password"  autocomplete="off" required onkeyup="checkPassword(this.value)" />
        <span id="password"></span>
        <progress value="0" max="100" id="strength" style="width: 230px"></progress>
    </div>
    <div class="form">
        <input type="password" placeholder="Re-enter password" name="repassword" id="repass" autocomplete="off" required />
        <span id="repassword"></span>
    </div>
    <div class="form">
        <input type="email" name="emailid" placeholder="Type in the email id" id="mail" autocomplete="off" required />
        <span id="emailid"></span>
    </div>
    <div class="dropdown">
            <label>Security Question</label>
        <select type="question" name="question" class="question">
        <option value="What is your birth city?">What is your birth city?</option>
        <option value="What is your pet name?">What is your pet's name?</option>
        <option value="What is your Mother name?">What is your Mother's name?</option>
        </select>
    </div>
    <div class="form">
        <input type="text" name="answer" placeholder="Type in the answer" autocomplete="off" id="ans" required />
        <span id="answer"></span>
    </div>
    <center><div class="g-recaptcha" data-sitekey="6LcFZ3sUAAAAAKn5e_K97Vgpi8H8D9J6rtgKd4_z"></div></center>

    <div class="form">
        <input type="submit" name="submit" value="submit" class="btn btn-signup" autocomplete="off" />
    </div>
    <input type="hidden" name="_token" class="form-control" value="<?php echo $_session['_token'];?>"/>
      </form>
       <script src='https://www.google.com/recaptcha/api.js'></script>
    </div>
    </div>
<!-- </div> -->
<!-- </div> -->


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

    <script src='https://www.google.com/recaptcha/api.js'></script>

    <script type="text/javascript">
    var pass = document.getElementById("pass")
    pass.addEventListening('keyup', function() {
        checkPassword(pass.value)
    })
    function checkPassword(password) {
        var strengthBar = document.getElementById("strength")
        var strength = 0;
        if (password.match(/[a-zA-Z0-9][a-zA-Z0-9]+/)) {
            strength += 1
        }
        if (password.match(/[~<>?]+/)) {
            strength += 1
        }
        if (password.match(/[!@#$%^&*()]+/)) {
            strength += 1
        }
        if (password.length > 5) {
            strength += 1
        }
        if (password.length == 0) {
            strength == 0;
        }
        switch(strength) {
            case 0:
            strengthBar.value = 0;
            break
            case 1:
            strengthBar.value = 20;
            break
            case 2:
            strengthBar.value = 40;
            break
            case 3:
            strengthBar.value = 60;
            break
        }
    }

    function validate(){

      var first = document.getElementById('fname').value;
      var last = document.getElementById('lname').value;
      var email = document.getElementById('mail').value;
      var pass = document.getElementById('pass').value;
      var repass = document.getElementById('repass').value; 
      var answer = document.getElementById('ans').value;

      if(first == ""){

        document.getElementById('firstname').innerHTML = "**Please fill the first name ".fontcolor("red");
        return false;
      }

      else if(!isNaN(first)){

        document.getElementById('firstname').innerHTML = "**Only characters are allowed".fontcolor("red");
        return false;

      }

      else if((first.length <=3) || (first.length > 20)){

        document.getElementById('firstname').innerHTML = "**Firstname's length must be between 3 and 20".fontcolor("red");
        return false; 
      }
      

      else if(last==""){

        document.getElementById('lastname').innerHTML = "**Please fill the last name".fontcolor("red");
        return false;
      }


      else if(!isNaN(last)){

        document.getElementById('lastname').innerHTML = "**Only characters are allowed".fontcolor("red");
        return false;

      }

      else if((last.length <=2) || (last.length > 20)){

        document.getElementById('lastname').innerHTML = "**Lastname's length must be between 2 and 20".fontcolor("red");
        return false; 
      }

      
      else if(email==""){

        document.getElementById('emailid').innerHTML = "**Please fill the email field".fontcolor("red");
        return false;
      }

      else if(email.indexOf('@') <= 0){

        document.getElementById('emailid').innerHTML = "** @ Position invalid".fontcolor("red");
        return false;


      }

      else if((email.charAt(email.length-4)!='.') && (email.charAt(email.length-3)!='.')){

        document.getElementById('emailid').innerHTML = "** . Position invalid".fontcolor("red");
        return false;

      }

      else if(pass==""){

        document.getElementById('password').innerHTML = "**Please fill the password field".fontcolor("red");
        return false;
      }

      else if((pass.length <=8) || (pass.length > 20)){

        document.getElementById('password').innerHTML = "**Password must be between 8 and 20".fontcolor("red");
        return false; 
      }

      else if(pass!=repass){


        document.getElementById('repassword').innerHTML = "**Passwords don't match".fontcolor("red");
        return false; 

      }

      else if(repass==""){

        document.getElementById('repassword').innerHTML = "**Please enter the password confirmation".fontcolor("red");
        return false;
      }

      else if(answer==""){
        document.getElementById('answer').innerHTML = "**Please enter the answer".fontcolor("red");
        return false;
      }
    }
</script>
</body>

</html>
