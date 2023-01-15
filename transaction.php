<?php

require_once('config/db.php');
$query = "select * from users";
$result = mysqli_query($con,$query);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  rel="stylesheet" href="css/style.css">
    <link  rel="stylesheet" href="css/table.css">
    <link href="css/footer.css" rel="stylesheet">
    <title>Transfer</title>

    <style type="text/css">
      button{
        transition: 1.5s;
      }
      button:hover{
        background-color:#30656a;
        color: white;
      }
    </style>
    
</head>
<body>


    <div class="header">
        <nav>
            <img src ="images/logo.jpeg" class="logo">
            <h1>Apna Bank</h1>
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="transaction.php">Transactions</a></li>
                <li><a href="transhistory.php">View Transactions</a></li>
            </ul>
        </nav>
    </div>

    <p style="padding: 10px; background-color: aliceblue";>
<p style="padding: 10px; background-color: aliceblue";>
<center>
    <table class="table table-hover table-striped table-condensed table-bordered">
        <tr> 
            <th>Sr. no.</th>
            <th>Name</th>
            <th>Email</th>
            <th>Balance</th>
            <th>Transfer</th>
            
        </tr>
        
        <tr>
            <?php

                while($row = mysqli_fetch_assoc($result))
                {
            ?>
                <td><?php  echo $row['id']; ?></td>
                <td><?php  echo $row['name']; ?></td>
                <td><?php  echo $row['email']; ?></td>
                <td><?php  echo $row['balance']; ?></td>
                <td><a href="transform.php?id= <?= $row['id'] ;?>"><button type="button" class="btn"> Transfer</button></a></td>
                
                
            </tr>
            <?php
                }

            ?>
    </table>
</center>

<p style="padding: 10px; background-color: aliceblue";>
<p style="padding: 10px; background-color: aliceblue";>
  
<hr>
<footer>
<p style="padding: 10px; background-color: aliceblue";>
    <p style="padding: 10px; background-color: aliceblue";>
    <div class="footer">
            <div class="col-1">
                <h3>USEFUL LINKS</h3>
                <a href="#">About</a>
                <a href="#">Services</a>
                <a href="#">Contacts</a>
            </div>
            <div class="col-2">
                <h3>NEWSLETTER</h3>
                <form>
                    <input type="text" placeholder="Email address" required>
                    <br>
                    <button type="submit">SUBSCRIBE NOW</button>
                </form>
            </div>
            <div class="col-3">
                <h3>CONTACT</h3>
                <p>213, S.V. Road, Mumbai <br>Maharashtra, India </p>
                <div class="social-icons">
                    <i class="fab fa-facebook"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-linkedin"></i>
                </div>
                
            </div>
        </div>
</footer>
</body>
</html>