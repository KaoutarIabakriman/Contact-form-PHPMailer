<?php
    if(isset($_GET['code'])) {
        $code = $_GET['code'];

        $conn = new mySqli('localhost', 'root', '', 'register');
        if($conn->connect_error) {
            die('Could not connect to the database');
        }

        $verifyQuery = $conn->query("SELECT * FROM users WHERE code = '$code' and update_at >= NOW() - Interval 1 DAY");

        if($verifyQuery->num_rows == 0) {
            header("Location: home.html");
            exit();
        }

        
        if(isset($_POST['change'])) {
            $email = $_POST['email'];
            $new_password = $_POST['new_password'];
            $hashed_password = md5($new_password); // Hash the new password
        
            $changeQuery = $conn->query("UPDATE users SET password = '$hashed_password' WHERE email = '$email' and code = '$code' and update_at >= NOW() - INTERVAL 1 DAY");
        
            if($changeQuery) {
                echo '
           
                <script>
          alert("Password is sucessfully change, try to login");
           window.location.href = "home.html";
          
   </script>
   ';
            }
        }
        $conn->close();
    }
    else {
        header("Location: home.html");
        exit();
    }
?>