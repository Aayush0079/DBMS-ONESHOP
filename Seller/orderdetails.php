<?php
    require_once 'C:\xampp\htdocs\ak\project\conn.php';
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My products</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../nav.css">
    <script src="script.js"></script>
</head>
<body>
    <div class="topnav" id="myTopnav">   
        <a href="sellerhome.php">Home</a>
        <a href="addproduct.php">Add new product</a>
        <a href="myproducts.php" class="active">My products</a>
        <a href="contactcc.php">Contact CC</a>
        <a href="sellerprofile.php">Profile</a>
        <a class="right" href="../logout.php">Logout</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
          <i class="fa fa-bars"></i>
        </a>
    </div> 
    <br><br><br>
    <center>
        <?php
            try{ 
                $stmt=$conn->query("SELECT * FROM shopify.payment P,shopify.buyer B WHERE P.pid='".$_SESSION['pid']."' AND P.buyerid=B.buyerid");
                echo "";
                echo "<table border='1'><thead class='tablehead'><tr>
                <td>BuyerID</td>
                <td>PID</td>
                <td>Ordered on</td>
                <td>Buyer Name</td>
                <td>Buyer Occupation</td>
                <td>Buyer Address</td>
                <td>Buyer Contact No.</td>
                </tr></thead>";
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    // print_r($row);
                    echo "<tr class='tablerow'>";
                    echo "<td>".$row['buyerID']."</td>";
                    echo "<td>".$row['pid']."</td>";
                    echo "<td>".$row['paymentDate']."</td>";
                    echo "<td>".$row['bname']."</td>";
                    echo "<td>".$row['occupation']."</td>";
                    echo "<td>".$row['address']."</td>";
                    echo "<td>".$row['contactNo']."</td>";
                    echo "</tr>";
                }
                echo "</table>";

            }catch(PDOExcepion $e){
                echo "Connection to database failed :".$e->getMessage();
            }

            echo "<br> <br>";
            echo '<a style="text-decoration: none;" href="myproducts.php" class="btn spacebottom spacetop"> Go back to My Products </a>';
            echo "<br> <br>";
            
        ?>
        
    </center>
      
</body>
</html>