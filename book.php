<?php
include("csrf.php");
    session_start();
    $mysqli = new mysqli('localhost','jitendran','VWmUmbiRKodei94K', 'cafeagape');
    if(isset($_POST['book'])) {
    $sql = "INSERT INTO book(Name, Email, Address, Seat, HeadCount) VALUES (?,?,?,?,?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("sssss", $name, $email, $add, $seat, $head);

    $name = mysqli_real_escape_string($mysqli, $_POST['name']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $add = mysqli_real_escape_string($mysqli, $_POST['address']);
    $seat = mysqli_real_escape_string($mysqli, $_POST['seat']);
    $head = mysqli_real_escape_string($mysqli, $_POST['headcount']);
    // $types = mysqli_real_escape_string($mysqli, $_POST['types']);
      $stmt->execute();
      echo "<script>alert('Booking Successful...')</script>";
        
  } else {
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

    <title>Book my place - Cafe Square</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/business-casual.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

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
                        <a href="home.php">Home</a>
                    </li>
                    <li>
                        <a href="about.php">About</a>
                    </li>
                    <li>
                        <a href="book.php">Book my place</a>
                    </li>
                    <li>
                        <a href="contact.php">Contact</a>
                    </li>
                     <li>
                        <a href="logout.php">Logout</a>
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
                        <strong>BOOK MY PLACE</strong>
                    </h2>
                    <hr>
                </div>
                <div class="login-page">
    <div class="form">



      <form action="book.php" method="post" class="register-form">
        <input type="text" name="name" placeholder="Name" required />
        <input type="email" name="email" id="email" placeholder="Email" required />
        <input type="text" name="address" placeholder="Address" required />
        <div class="dropdown">
            <label>Select Seat</label>
        <select type="seat" name="seat" class="seat">
        <option value="Executive 1">Executive 1</option>
        <option value="Executive 2">Executive 2</option>
        <option value="Executive 3">Executive 3</option>
        <option value="Premium Cabin 1">Premium Cabin 1</option>
        <option value="Premium Cabin 2">Premium Cabin 2</option>
        <option value="cabin 1">Cabin 1</option>
        <option value="cabin 2">Cabin 2</option>
        <option value="cabin 3">Cabin 3</option>
        <option value="normal 1">Normal 1</option>
        <option value="normal 2">Normal 2</option>
        <option value="normal 3">Normal 3</option>
        <option value="normal 4">Normal 4</option>
        <option value="normal 5">Normal 5</option>
        </select>
    </div>
    
        
        <div class="dropdown">
            <label>Head Count</label>
        <select type="seat" name="headcount" class="seat">
        <option value="One">One</option>
        <option value="Two">Two</option>
        <option value="Three">Three</option>
        <option value="Four">Four</option>
        <option value="Five">Five</option>
        <option value="Six">Six</option>
        </select>
    </div>

        <input type="hidden" name="_token" class="form-control" value="<?php echo $_session['_token'];?>"/>
        <input type="submit" value="book" name="book" class="btn btn-signup"/>
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
