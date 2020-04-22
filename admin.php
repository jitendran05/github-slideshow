<?php

if (isset($_POST['submit'])) {

        session_start();

        $name = $_POST['name'];
        $pass = $_POST['pass'];

        if($name == 'admin1' && $pass == 'password123')
        {
            header("location: admindb.php");
        } else if($name == 'admin2' && $pass == 'password123')
        {
            header("location: admindb.php");
        } else if($name == 'admin3' && $pass == 'password123')
        {
            header("location: admindb.php");
        }else
        {
            echo "<script>alert('Invalid Admin Credentials...'); </script>";
            // header("location: admin.php?error=1");
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

    <title>Login - Cafe Square</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
    <script src = "js/login.js" type = "text/javascript"/></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="brand">Cafe Square</div>
    <div class="address-bar">30 Square point |Dublin 6| 899694284</div>

    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <a class="navbar-brand" href="index.php">Cafe Square</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
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
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Cafe Square
                        <strong>ADMIN LOGIN</strong>
                    </h2>
                    <hr>
                </div>

      <form action="admin.php" method="post" class="register-form">
        <div class="form">
        <input type="text" name="name" placeholder="Type in the Admin Name" id="mail" autocomplete="off" required />
        <span id="email"></span>
        </div>
        <div class="form">
        <input type="password" placeholder="Type in the password" name="pass" id="pass" autocomplete="off" required />
        <span id="password"></span>
        </div>

        <div class="form">
        <input type="submit" name="submit" value="login" class="btn btn-signup" autocomplete="off" />
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

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    
</body>

</html>
