<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact form</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <style>
        .header {
  background-color: var(--background-color);
  padding: 1rem;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.navbar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-left: auto;
}

.navbar a {
  color: #fff;
  text-decoration: none;
  margin: 0 1rem;
  transition: 0.3s;
}

.navbar a:hover {
  color: #6C63FF;
}

.active {
  color: #6C63FF;
}

.logo {
    font-size:2.5rem ;
    color: var(--text-color);
    font-weight:400 ;
    cursor: default;
    color:white;
    font-style:oblique;
    text-decoration: line-through;
}

.content textarea {
  background: none;
  outline: none;
  border: none;
  line-height: 1;
  font-weight: 600;
  font-size: 1.1rem;
  color: var(--background-color);
  padding: 1rem;
  width: 100%;
  height: 100%;
  border-radius: 10px;
  resize: vertical;
}

@media (max-width: 870px) {
  .content {
    max-width: 300px;
    height: 45px;
  }

  .content textarea {
    font-size: 1rem;
  }

  .header {
    padding: 0.5rem;
  }
  .navbar {
    margin-left: 0.5rem;
  }
}

/* Media query for screens with a maximum width of 570px */
@media (max-width: 570px) {
  .content {
    max-width: 250px;
    height: 35px;
  }
  .content textarea {
    font-size: 0.9rem;
  }

  .header {
    padding: 0.2rem;
  }

  .navbar {
    margin-left: 0.2rem;
  }
}

i {
    color:white;
}
    </style>
<header class="header">
        <a href="#" class="logo">CONTACT</a>
        <nav class="navbar">
        <a href="#" class="active">Home</a>
        <a href="#">About</a>
        <a href="contact_history.php">History</a>
        <a href="#contact">Contact</a>
        <a href="logout.php">Logout</a>

</nav>
    </header>
    <form action="mail.php"  method="POST" id="contact">
            <h2 class="title">Contact Us</h2>
                    <div class="content">
                     <i class="fas fa-user"></i>
                     <input type="text" placeholder="Username" name="name" required>
                    </div>
                    <div class="content">
                        <i class="fas fa-envelope"></i>
                        <input type="text" placeholder="Name@email.com" name="email" required>
                       </div>
                    <div class="content">
                     <i class="fas fa-lock"></i>
                     <input type="text" placeholder="subject" name="subject" required>
                    </div>
                    
                    <textarea name="message" cols="30" rows="10"></textarea>
                
                    <input type="submit" value="Send" class="button">
        </form>
    </div>
</body>
</html>

