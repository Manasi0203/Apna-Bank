

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History</title>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> -->
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <!-- <link rel="stylesheet" type="text/css" href="css/navbar.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="css/main.css"> -->
    <link href="css/style.css" rel="stylesheet">
    

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
                <link href="css/footer.css" rel="stylesheet">
            </ul>
        </nav>
    </div>



<div class="container-fluid">

	<div style="background-color:aliceblue;">
        
      
        <p style="padding: 10px; background-color: aliceblue";>
        <p style="padding: 10px; background-color: aliceblue";>
<center>
    <!-- <div class="table-responsive-sm"> -->
    <table class="table table-hover table-striped table-condensed table-bordered">
        
            <tr>
                <th class="text-center">Sr.No.</th>
                <th class="text-center">Sender</th>
                <th class="text-center">Receiver</th>
                <th class="text-center">Amount</th>
                <th class="text-center">Date & Time</th>
            </tr>
        
        <?php

            include 'config/db.php';

            $sql ="select * from transactions";

            $query =mysqli_query($con, $sql);

            while($rows = mysqli_fetch_assoc($query))
            {
        ?>

            <tr>
            <td class="py-2"><?php echo $rows['sr.no.']; ?></td>
            <td class="py-2"><?php echo $rows['sender']; ?></td>
            <td class="py-2"><?php echo $rows['receiver']; ?></td>
            <td class="py-2"><?php echo $rows['amount']; ?> </td>
            <td class="py-2"><?php echo $rows['datetime']; ?> </td>
                
        <?php
            }

        ?>
        
    </table>
        </center>
    </div>
</div>


<!-- <div class="container-fluid"> -->

<p style="padding:10px; background-color: aliceblue";></p>
<p style="padding:10px; background-color: aliceblue";></p>
  
<hr>

<p style="padding:10px; background-color: aliceblue";></p>
    <p style="padding:10px; background-color: aliceblue";></p>
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



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>