<?php
// Configuration
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'register';

// Connect to the database
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: ". $conn->connect_error);
}

// Process the contact form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $subject = $_POST["subject"];
  $message = $_POST["message"];

  // Insert the data into the contact history table
  $history_sql = "INSERT INTO contact_history (name, email, subject, message) VALUES (?,?,?,?)";
  $history_stmt = $conn->prepare($history_sql);
  $history_stmt->bind_param("ssss", $name, $email, $subject, $message);
  $history_stmt->execute();

  // Send a confirmation email to the user
  $to = $email;
  $subject = "Thank you for contacting us";
  $body = "Dear $name,\n\nThank you for contacting us. We will get back to you soon.\n\nBest regards,\n[Your Name]";
  $headers = "From: your_email@example.com\r\n";
  mail($to, $subject, $body, $headers);

 
  echo '
           
  <script>
alert("Thank you for contacting us. We will get back to you soon.");
window.location.href = "welcome.php";

</script>
';
}

// Close the database connection
$conn->close();
?>