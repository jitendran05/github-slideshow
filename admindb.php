<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Book my place - Cafe Square</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
</head>

<body>

    <div class="brand">Cafe Square</div>
    <div class="address-bar">30 Square point | Dublin 6 | 866964284</div>

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

        <?php
            $dbconnect = mysqli_connect("localhost","jitendran", "VWmUmbiRKodei94K", "cafeagape");
            $result = mysqli_query($dbconnect, "SELECT * FROM book");
        ?>

    <table class = "table">
        <tr>
        <th> ID</th>
        <th> Name </th>
        <th> Email </th>
        <th> Address </th>
        <th> Seat </th>
        <th> HeadCount </th>    
        <th> Action</th>
    </tr>
    <?php
        $i = 1;

        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $name = $row['Name'];
            $email = $row['Email'];
            $add = $row['Address'];
            $seat = $row['Seat'];
            $headcount = $row['HeadCount'];
            $id = $row['id'];
        ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $name; ?></td>
                <td><?php echo $email; ?></td>
                <td><?php echo $add; ?></td>
                <td><?php echo $seat; ?></td>
                <td><?php echo $headcount; ?></td>
                <td>
                    <a href="admindb.php?delete=<?php echo $id; ?>" onclick="return confirm('Are you sure?');">Booking Taken</a>
                </td>
            </tr>

            <?php
                $i++;
            }
            if(isset($_GET['delete'])) {
                $delete_id = $_GET['delete'];

                mysqli_query($dbconnect, "DELETE FROM book WHERE id = '$delete_id'");
            }
            header("refresh: 1");
            ?>
</table>


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
