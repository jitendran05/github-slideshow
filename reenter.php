<?php
include("csrf.php");

$dbconnect = mysqli_connect('localhost', 'root', '', 'cafeagape');

if(isset($_POST['submit'])) {

    $email = mysqli_real_escape_string($dbconnect, $_POST['email']);
    $pass = mysqli_real_escape_string($dbconnect, $_POST['password']);
    $repass = mysqli_real_escape_string($dbconnect, $_POST['repassword']);

    $sql = "SELECT email FROM signup WHERE email='".$email."'";



        $run = mysqli_query($dbconnect, $sql);


        $row = $run->fetch_assoc();
if(mysqli_num_rows($email) == 0){
    if($pass == $repass) {
        $pass = password_hash($pass, PASSWORD_BCRYPT);
        $sql1 = "UPDATE signup SET password='$pass' WHERE email='$email'";
        
        $run1 = mysqli_query($dbconnect, $sql1);
        
        echo "<script>alert('Password Changed')";
        header("location: index.php");
    } else {
        echo "<script>alert('Password update unsuccessful!');</script>";
    }
    } 
    else {
        echo "<script>alert('User doesnot exist!');</script>";
    }
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

    <title>New Password - Cafe Agape</title>

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
                        <strong>NEW PASSWORD</strong>
                    </h2>
                    <hr>
                </div>

      <form action="reenter.php" method="post" class="register-form">
        <div class="form">
        <input type="email" name="email" placeholder="Enter E-mail ID" id="mail" autocomplete="off" required />
        <span id="email"></span>
        </div>
        <div class="form">
        <input type="password" name="password" placeholder="New Password" id="mail" autocomplete="off" required />
        <span id="email"></span>
        </div>
    <div class="form">
        <input type="password" name="repassword" placeholder="Re-enter New Password" autocomplete="off" required />
        <span id="answer"></span>
    </div>
        <div class="form">
            <input type="hidden" name="_token" class="form-control" value="<?php echo $_session['_token'];?>"/>
        <input type="submit" name="submit" value="submit" class="btn btn-signup" autocomplete="off" />
        </div>
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

    
</body>

</html>
