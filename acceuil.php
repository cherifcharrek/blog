<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Palestine Blog</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div  class="container">
        <div class="content">
            <h1>Bienvenue sur le Blog de la Palestine</h1>
    
            <form action="signup.php">
               
                <input type="submit" class="start-button" value="Commencer">
            </form>
        </div>
    </div>
</body>
</html>

<style>
body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background-color: #000; 
    color: #fff; 
}

.container {
    background-image: url('ak.jpg'); 
    background-size: cover;
    background-position: center;
    height: 100vh; 
    display: flex;
    justify-content: center;
    align-items: center;
}

.content {
    text-align: center;
}

h1 {
    font-size: 36px;
}

.start-button {
    padding: 10px 20px;
    font-size: 18px;
    background-color: #007bff; 
    color: #fff; 
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.start-button:hover {
    background-color: #0056b3; 
}
</style>