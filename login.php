<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include "connection.php";

  $username = $_POST["username"];
  $password = $_POST["password"];

  $username = filter_var($username, FILTER_SANITIZE_STRING);

  $query = "SELECT * FROM users WHERE username='$username' AND password='".md5($password)."'";
  $result = mysqli_query($conn, $query);
  $count = mysqli_num_rows($result);

  if ($count == 1) {
    $row = mysqli_fetch_array($result);
    // Définit les variables de session
    $_SESSION["username"] = $username;

    header("Location: welcome.php");
    exit();
  } else {
    echo '
    <script>
       alert("Username or password invalid");
        window.location.href = "home.html";
      
</script>
';
  }

  mysqli_close($conn);
}
    ?>