<?php
    require_once 'C:\xampp\htdocs\ak\project\conn.php';
    session_start();
?>
<?php
if(isset($_SESSION['email'])){?>
<?php echo $_SESSION['email']; ?> | <a href="../logout.php">Logout</a>

<?php print_r($_SESSION); } ?>

<?php
    try{
        $sql="DELETE FROM shopify.addedTo where pid='".$_SESSION['pid']."' AND buyerID='".$_SESSION['userid']."'";
        $stmt=$conn->prepare($sql);
        $stmt->execute();
        // if ($stmt->execute()){
        //     $count=$stmt->rowCount();
        //     echo "$count";
        //     echo "\nproduct removed from cart";
        // }
        unset($_SESSION['pid']);
        header("Location:cart.php");  
    }catch(PDOExcepion $e){
        echo "Connection to database failed :".$e->getMessage();
    }
?>