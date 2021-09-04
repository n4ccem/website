
<?php include('account/process.php'); ?>
<DOCTYPE html>
<html>
<?php include('templates/header.php'); ?>
<div class="container">
    <form action="" method="post">
        <h1>Login </h1>
        <input type="text" class="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <div style="color:red;"><?php echo $errors1;?></div>
        <input type="submit" name="submit" value="Login">
        <div style="color:red;"></div>
    </form>
    <p>If you are not a member please <a href="register.php">SignUp</a> .<p>
</div>

<?php include('templates/footer.php'); ?>

</html>
