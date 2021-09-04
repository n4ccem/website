<?php session_start();
if(!$_SESSION['user'] || !$_SESSION['email'] || !$_SESSION['password']){
    
    unset($_SESSION['user']);
    header('Location:./../login.php');
}else{
    $name =  $_SESSION['user']; 
}
?>
<DOCTYPE html>
<html>
    <?php include('templates/header.php'); ?>

    <h1 style="text-align:center;padding: 150px;font-size: 30px;padding-bottom: 20px;">welcome Mr <?php echo $name; ?> in your account</h1>
    <button style="    border-color: #8a8a8a ;background-color: #8a8a8a;display: block;margin: 25px auto;text-align: center;border: 2px solid #8a8a8a;padding: 14px 10px;width: 150px;outline: none;color: white;border-radius: 26px;transition: 0.25s;cursor: pointer;font-size: 15px;border-bottom: 2px solid #adadad;"><a style="position: relative;margin: 0 15px;text-decoration: none;color: #fff;letter-spacing: 2px;font-weight: 500px;transition: 0.6s;" href="#">View Items</a></button>
    


    </body>
    <?php include('templates/footer.php'); ?>
</html>