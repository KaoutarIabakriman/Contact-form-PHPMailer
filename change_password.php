<?php include 'change_password_process.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
   
        
        <form action="" method="post">
          <h2 class="title">Change Password</h1>
                      <div class="content">
                        <i class="fas fa-envelope"></i>
                        <input type="email" placeholder="Name@email.com" name="email" required>
                       </div>
                       <div class="content">
                     <i class="fas fa-lock"></i>
                     <input type="password" placeholder="Password" name="new_password" required>
                    </div>
            
                    <button type="submit" class="button" name="change">Change</button>

        </form>
  
</body>
</html>