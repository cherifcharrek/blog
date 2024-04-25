<?php

class Database {
    private $conn;

    public function __construct($servername, $username, $password, $dbname) {
        $this->conn = new mysqli($servername, $username, $password, $dbname);
        if ($this->conn->connect_error) {
            die("La connexion a échoué : " . $this->conn->connect_error);
        }
    }

    public function executeQuery($sql) {
        $result = $this->conn->query($sql);
        if (!$result) {
            echo "Error executing query: " . $this->conn->error;
        }
        return $result;
    }

    public function fetchSingle($result) {
        return $result->fetch_assoc();
    }

    public function close() {
        $this->conn->close();
    }
}

$database = new Database("localhost", "root", "", "bd2");

$email_error = "";

$full_name = $_POST['full_name'] ?? null;
$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;

if (isset($email)) {  
    $check_query = "SELECT * FROM signup WHERE email = '$email'";
    $check_result = $database->executeQuery($check_query);

    if ($check_result instanceof mysqli_result) {
        if ($check_result->num_rows > 0) {
            $email_error = "Error: Email already exists.";
        } else {
            // Insert user data into the table
            $sql = "INSERT INTO signup (full_name, email, password) VALUES ('$full_name', '$email', '$password')";
            
            if ($database->executeQuery($sql) === TRUE) {
                // Redirect user after successful registration
                header("Location: signin.php");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $database->conn->error;
            }
        }
    } else {
        echo "Error: No result obtained from the query.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: black; 
    color: #333; 
    margin: 0;
    padding: 0;
}

.container {
    max-width: 400px; 
    margin: 150px auto; 
    background-color: #fff; 
    padding: 72px; 
    border-radius: 20px; 
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
}

form {
    display: flex;
    flex-direction: column;
}

h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #006400;
}

.input-group {
    margin-bottom: 20px;
}

label {
    font-weight: bold;
}

input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #777; 
    border-radius: 5px;
    background-color: #f0f0f0; 
    color: #333; 
}

button {
    padding: 10px;
    background-color: #006400; 
    color: #fff; 
    border: none;
    border-radius: 10px;
    cursor: pointer;
}

button:hover {
    background-color: #008000; 
}

p {
    text-align: center;
    color: #ff0000; 
}

a {
    color: #006400; 
    text-decoration: none; 
}

a:hover {
    text-decoration: underline; 
}
</style>
  <title>Sign Up - CV Generator</title>
</head>
<body>
  <div class="container">
    <form action="" method="post">
      <h2>Sign Up</h2>
      <?php if(!empty($email_error)) { echo "<p>$email_error</p>"; } ?>
      <div class="input-group">
        <label for="full_name">Full Name</label>
        <input type="text" id="full_name" name="full_name" required>
      </div>
      <div class="input-group">
        <label for="email">Email</label>
        <input type="text" id="email" name="email" required>
      </div>
      <div class="input-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
      </div>
      <button type="submit">Sign Up</button>
      <p>Already have an account? <a href="signin.php">Sign In</a></p>
    </form>
  </div>
</body>
</html>
