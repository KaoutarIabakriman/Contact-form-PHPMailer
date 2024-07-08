<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
include 'connection.php';
if(isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
   // Hash le mot de passe
   $hashed_password = md5($password);
   
}

    $checkEmail = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($checkEmail);
    if($result->num_rows > 0){
        echo '
        <script>
           alert("Email Address Already Exists !");
            window.location.href = "home.html";
          
    </script>
    ';
    } else {
        $insertQuery = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
        if($conn->query($insertQuery) === TRUE){
            header("Location: home.html");
        } else {
            echo "Error: " . $conn->error;
        }
    }

}

?>