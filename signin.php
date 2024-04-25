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
    max-width: 450px;
    margin: 150px auto;
    background-color: #fff;
    padding: 50px;
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

input[type="email"],
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
  <title>Sign In - CV Generator</title>
</head>
<body>
    
  <div class="container">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <h2>Sign In</h2>
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
                return $this->conn->query($sql);
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

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST['email'] ?? null;
            $password1 = $_POST['password1'] ?? null;

            if (isset($email) && isset($password1)) {
                $check_query = "SELECT * FROM signup WHERE email = '$email' AND password = '$password1'";
                $check_result = $database->executeQuery($check_query);

                if ($check_result->num_rows == 0) {
                    $email_error = "Error: Email and password do not exist. You should sign up.";
                } else {
                    header("Location: blog.php");
                    exit();
                }
            }
        }
      ?>
      <?php if(!empty($email_error)) { echo "<p>$email_error</p>"; } ?>
      <div class="input-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="input-group">
        <label for="password1">Password</label>
        <input type="password" id="password1" name="password1" required>
      </div>
      <button type="submit">Sign In</button>
      <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
    </form>
  </div>
</body>
</html>
