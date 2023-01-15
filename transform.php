<?php

require_once('config/db.php');
$query = "select * from users";
$result = mysqli_query($con,$query);


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/footer.css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <style type="text/css">

        button{
            border:none;
            background: #fff;
        }
        button:hover{
            background-color:#080008;
            transform: scale(1.1);
            color:white;
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
<div style="background-color: aliceblue;">
<div class="container-fluid">
    <!-- <h2 class="text-center pt-4">Transaction</h2> -->
   
    
    <form method="post" name="tcredit" class="tabletext" ><br>
        <div>
            <table class="tab">
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Balance</th>
                </tr>

                <?php
                    include 'config/db.php';
                    $sid=$_GET['id'];
                    $sql = "SELECT * FROM  users where id=$sid";
                    $result=mysqli_query($con,$sql);
                    if(!$result)
                    {
                        echo "Error : ".$sql."<br>".mysqli_error($con);
                    }
                    $rows=mysqli_fetch_assoc($result);
                ?>

                <tr>
                    <td class="py-2"><?php echo $rows['id'] ?></td>
                    <td class="py-2"><?php echo $rows['name'] ?></td>
                    <td class="py-2"><?php echo $rows['email'] ?></td>
                    <td class="py-2"><?php echo $rows['balance'] ?></td>
                </tr>
            </table>
        </div>
        <br><br><br>
        <label style="color:#ff3d00; font-size: 30px">Transfer To:</label>
        <select name="to" class="form-control" required>
            <option value="" disabled selected>Choose</option>
              <?php
            include 'config/db.php';
            $sid=$_GET['id'];
            $sql = "SELECT * FROM users where id!=$sid";
            $result=mysqli_query($con,$sql);
            if(!$result)
            {
                echo "Error ".$sql."<br>".mysqli_error($con);
            }
            while($rows = mysqli_fetch_assoc($result)) {
                ?> 
                <option class="table" value="<?php echo $rows['id'];?>" >

                    <?php echo $rows['name'] ;?> (Balance:
                    <?php echo $rows['balance'] ;?> )

                </option>
                <?php
            }
            ?> 
            <div>
        </select>
        <br>
        <br>
        <label style="color:#ff3d00; font-size: 30px">Amount:</label>
        <input type="number" class="form-control" name="amount" required>
        <br><br>
        <div class="text-center" >
            <button class="btn mt-3" name="submit" type="submit" id="myBtn">Transfer</button>
        </div>
    </form>
    <hr>
</div>

<!-- <p style="padding: 10px; background-color: aliceblue";></p>
<p style="padding: 10px; background-color: aliceblue";></p> -->
  

<footer style="background-color:aliceblue;">
<!-- <p style="padding: 10px; background-color: aliceblue";></p>
    <p style="padding: 10px; background-color: aliceblue";></p> -->
    <div class="footer">
            <div class="col-3">
                <h3>USEFUL LINKS</h3>
                <a href="#" style="color:#ff3d00">About</a><br>
                <a href="#" style="color:#ff3d00">Services</a><br>
                <a href="#" style="color:#ff3d00">Contacts</a><br>
            </div>
            <div class="col-6">
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
        </div>
<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> -->
</body>
</html>

<?php
include 'config/db.php';


if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from users where id=$from";
    $query = mysqli_query($con,$sql);
    $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

    $sql = "SELECT * from users where id=$to";
    $query = mysqli_query($con,$sql);
    $sql2 = mysqli_fetch_array($query);



    // constraint to check input of negative value by user
    if (($amount)<0)
    {
        ?> 
        <script>
            swal("Oops!", "Negative values cannot be transferred", "error");
        </script> 

        <?php
    }


    // constraint to check insufficient balance.
    else if($amount > $sql1['balance'])
    {

        ?>
        <script>
            swal("Insufficient Balance", "Transaction Not  Successful!", "warning");
        </script>

        <?php
    }



    // constraint to check zero values
    else if($amount == 0)
    {
        ?>
        <script>
            swal("Oops!","Zero value cannot be transferred", "error");
        </script>

        <?php
    } 


    else {

        // deducting amount from sender's account
        $newbalance = $sql1['balance'] - $amount;
        $sql = "UPDATE users set balance=$newbalance where id=$from";
        mysqli_query($con,$sql);


        // adding amount to reciever's account
        $newbalance = $sql2['balance'] + $amount;
        $sql = "UPDATE users set balance=$newbalance where id=$to";
        mysqli_query($con,$sql);

        $sender = $sql1['name'];
        $receiver = $sql2['name'];
        $sql = "INSERT INTO transactions(`sender`, `receiver`, `amount`) VALUES ('$sender','$receiver','$amount')";
        $query=mysqli_query($con,$sql);

        if($query){
            ?>
            <script>
                swal("Transaction Successful!", "success",{buttons:false});
                setTimeout(function (){
                    window.location='transhistory.php';
                },2000);
            </script>

            <?php

        }

        $newbalance= 0;
        $amount =0;
    }

}
?>