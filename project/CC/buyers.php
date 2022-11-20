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
    <title>All buyers</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../nav.css">
    <script src="script.js"></script>
</head>
<body>
    <div class="topnav" id="myTopnav">   
    <a href="cchome.php">Home</a>
        <a href="transactions.php">Transactions</a>
        <a href="buyers.php" class="active">All buyers</a>
        <a href="sellers.php">All sellers</a>
        <a href="cc.php">All CC</a>
        <a href="products.php">All products</a>
        <a href="ccprofile.php">Profile</a>
        <a class="right" href="../logout.php">Logout</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
          <i class="fa fa-bars"></i>
        </a>
    </div>
    <br>
    <br><br>
    <?php
        // echo $_SESSION['userid'];
        $stmt=$conn->query("SELECT B.buyerID,B.bname,B.email,B.walletBalance,B.occupation,B.address,B.buyerRating,B.contactNo FROM shopify.buyer B");
        $count=$stmt->rowCount();
        if($count==0){
            echo "<br> <br> All buyers' details will appear here.";
        }
        else{
        echo "<center>";
        echo "<table border='1'><thead class='tablehead'><tr> <td> ID </td> <td> Buyer Name </td> <td> email </td><td> occupation </td>
         <td> address </td><td> contactNo </td></tr></thead>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr class='tablerow'>";
            echo "<td>".$row['buyerID']."</td>";
            echo "<td>".$row['bname']."</td>";
            echo "<td>".$row['email']."</td>";
            // echo "<td>".$row['walletBalance']."</td>";
            echo "<td>".$row['occupation']."</td>";
            echo "<td>".$row['address']."</td>";
            // echo "<td>".$row['buyerRating']."</td>";
            echo "<td>".$row['contactNo']."</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</center>";
        }
    ?>
      
</body>
</html>