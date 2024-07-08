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

// Retrieve the contact history records
$history_sql = "SELECT * FROM contact_history ORDER BY created_at DESC";
$history_result = $conn->query($history_sql);
?>

<html>
  <head>
    <title>Contact History</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body><style>
    table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  border: 1px solid #ddd;
  padding: 8px;
  text-align: left;
}

th {
  background-color: #f0f0f0;
}
  </style>
   <center> <h2 class="title" >Contact History</h2>
    <table>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Subject</th>
        <th>Message</th>
        <th>Date</th>
      </tr>
</center>
    <?php while ($history_row = $history_result->fetch_assoc()) {?>
      <tr>
        <td><?php echo $history_row["name"];?></td>
        <td><?php echo $history_row["email"];?></td>
        <td><?php echo $history_row["subject"];?></td>
        <td><?php echo $history_row["message"];?></td>
        <td><?php echo $history_row["created_at"];?></td>
      </tr>
    <?php }?>

    </table>
  </body>
</html>

<?php
// Close the database connection
$conn->close();
?>