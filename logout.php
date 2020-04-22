<?php
session_start();

// setcookie('email', $email, time()-1);
echo "You successfully logged out, Click here to <a href='index.php'> Login ";
session_destroy();
?>