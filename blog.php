<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Free Palestine</title>
  <style>

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }


    body {
      font-family: Arial, sans-serif;
      background-color: #f7f7f7;
      color: #333;
      margin: 0;
      padding: 0;
    }

    header {
      position: relative;
      text-align: center;
    }

    header img {
      width: 98%;
      height: 50px%;
    }

    header h1 {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      color: #fff;
      font-size: 36px;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    nav ul {
      list-style-type: none;
      background-color: #008000;
      padding: 10px 0;
    }

    nav ul li {
      display: inline;
      margin-right: 20px;
    }

    nav ul li a {
      color: #fff;
      text-decoration: none;
    }

    main {
      max-width: 1500px;
      margin: 30px auto;
      padding: 5 30px; 
    }

    section {
      background-color: #fff;
      padding: 35px; 
      border-radius: 10px;
      margin-bottom: 40px; 
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
      color: #008000;
      margin-bottom: 20px;
    }

    h3 {
      color: #333;
      margin-bottom: 5px;
    }

    p {
      color: #555;
      line-height: 1.6;
    }

    footer {
      background-color: #ff0000;
      color: #fff;
      text-align: center;
      padding: 10px 0;
      position: fixed;
      bottom: 0;
      width: 100%;
    }

  
    .comment-button {
      display: block;
      margin: 20px auto;
      padding: 10px 20px;
      background-color: #008000;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    
    .comment-section {
      margin-top: 20px;
    }

    .comment-box {
      width: 100%;
      padding: 10px;
      margin-top: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      resize: none;
    }

    .comment {
      margin-bottom: 20px;
      border: 1px solid #ddd;
      padding: 10px;
      border-radius: 5px;
    }
  </style>
</head>
<body>
  <header>
    <img src="palestine.jpg" alt="Palestine" />
    <h1>Free Palestine</h1>
    <nav>
      <ul>
        <li><a href="#home">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#articles">Articles</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
    </nav>
  </header>
  
  <main>
    <section id="home">
      <h2>Welcome to Palestine Blog</h2>

      <article>
        <h3>Exploring Palestinian Cuisine</h3>
        <img src="p.jpg" alt="Palestinian Cuisine" style="width: 100px; height: 100px; float: left; margin-right: 10px;">
        <p>Delve into the rich tapestry of Palestinian cuisine with our comprehensive guide to traditional dishes, culinary customs, and regional specialties. From the aromatic spices of falafel to the delicate sweetness of knafeh, each article invites you to savor the flavors and aromas of Palestine's vibrant culinary heritage.</p>
      </article>

      <p>Embark on a journey to explore the captivating beauty, rich culture, and compelling stories of Palestine through our blog. Immerse yourself in the vibrant history, ancient traditions, and breathtaking landmarks that characterize this extraordinary region. From the bustling markets of Jerusalem to the serene landscapes of the West Bank, each article offers a unique perspective on the diverse tapestry of Palestinian life.</p>
    </section>
    
    <section id="about">
      <h2>Examining Allegations of War Crimes in the Israeli-Palestinian Conflict</h2>
      <img src="pss.jpg" alt="Palestinian Crafts" style="width: 100px; height: 100px; float: left; margin-right: 10px;">
      <p>Within the intricate fabric of the Israeli-Palestinian conflict lies a contentious discourse surrounding allegations of war crimes perpetuated by Israeli forces against the Palestinian populace. These accusations, documented by numerous reports and investigations, cast a somber shadow over the landscape of international humanitarian law.</p>
    </section>
    
    <section id="articles">
      <h2>Articles</h2>

      <article>
        <img src="ps.jpg" alt="Palestinian Landmarks" style="width: 100px; height: 100px; float: left; margin-right: 10px;">
        <h3>Iconic Landmarks of Palestine</h3>
        <p>Discover the storied history and architectural marvels of Palestine's most iconic landmarks. From the ancient walls of Jericho to the majestic domes of the Al-Aqsa Mosque, our articles offer a fascinating glimpse into the cultural, religious, and historical significance of these enduring symbols of Palestinian identity.</p>
      </article>

      <article>
        <h3>Traditional Palestinian Crafts</h3>
        <p>Explore the time-honored traditions of Palestinian craftsmanship, from intricate embroidery to exquisite olive wood carving. Through our articles, you'll gain insight into the techniques, materials, and cultural significance of these traditional crafts, which have been passed down through generations and continue to thrive in modern-day Palestine.</p>
      </article>
    </section>
    
    <section id="contact">
      <h2>Contact Us</h2>
      <p>Have questions, feedback, or suggestions? We'd love to hear from you! Contact us at <a href="mailto:info@freepalestine.com">info@freepalestine.com</a> and join the conversation. Together, we can raise awareness, promote solidarity, and advocate for justice in Palestine.</p>
    </section>

    <section id="comments" class="comment-section">
      <h2>Comments</h2>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="text" name="email" placeholder="name">
        <textarea name="comm" id="comm" class="comment-box" placeholder="Write your comment here..." rows="4"></textarea>
        <button type="submit" class="comment-button">Add Comment</button>
      </form>

      <?php
      
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $comment = htmlspecialchars($_POST['comm']);

            
            $servername = "localhost"; 
            $username = "root"; 
            $password = ""; 
            $dbname = "bd2"; 

           
            $conn = new mysqli($servername, $username, $password, $dbname);

          
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

           
            $sql = "INSERT INTO com (email, comm) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);

            if (!$stmt) {
                die("Prepare failed: " . $conn->error);
            }

            
            $stmt->bind_param("ss", $email, $comment);

          
            if ($stmt->execute() === TRUE) {
                
                echo "Comment added successfully.";

           
                $stmt->close();
            } else {
              
                if ($conn->errno == 1062) {
                    echo ".";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }

            $conn->close();
        }
      ?>

     
      <?php
        $servername = "localhost"; 
        $username = "root"; 
        $password = ""; 
        $dbname = "bd2"; 

        
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

       
        $sql = "SELECT email, comm FROM com";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        
          while($row = $result->fetch_assoc()) {
            echo "<div class='comment'>";
            echo "<strong>user:</strong> " . $row["email"] . "<br>";
            echo "<p>" . $row["comm"] . "</p>";
            echo "</div>";
          }
        } else {
          echo "No comments yet.";
        }
        $conn->close();
      ?>

    </section>
  </main>
  
  <footer>
    <p>&copy; 2024 Free Palestine</p>
  </footer>
</body>
</html>
