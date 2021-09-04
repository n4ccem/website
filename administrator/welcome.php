<?php session_start();
if(!$_SESSION['email']){
    
    unset($_SESSION['email']);
    header('Location: login.php');
}else{
    $name = $_SESSION['email']; 
}
?>
<DOCTYPE html>
<html>
    <?php include('templates/header2.php'); ?>

    <h1 style="text-align:center;padding: 150px;font-size: 30px;padding-bottom: 20px;">Welcome Administartor</h1>


    </body>
    <?php include('templates/footer.php'); ?>
</html>