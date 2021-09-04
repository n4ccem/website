<?php

session_start();
$conn = mysqli_connect('localhost','nassim','root','users');
$errors1 = '';


if(isset($_POST['submit']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    if(!empty($email) || !empty($_POST[$password]))
    {
        $sql = "select * from admin where email = '$email' and password = '$password' ";  
        $result = mysqli_query($conn, $sql); 
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        print_r($row);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors1 = 'Email is invalid';
        }else{
            if($row)
            {
                $_SESSION['email'] = $row['email'];
                header('Location: welcome.php');
            }
            else
            {
                $errors1 = 'Email or Password is incorrect';
            }
        }

    }
    else
    {
        $errors1 = 'Email and password is required';
    }
}


?>












<DOCTYPE html>
<html>
<?php include('templates/header.php'); ?>
<div class="container">
    <form action="" method="POST">
        <h1>Admin Login </h1>
        <input type="text" class="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <div style="color:red;"><?php echo $errors1; ?></div>
        <input type="submit" name="submit" value="Login">
        <div style="color:red;"></div>
    </form>
</div>

<?php include('templates/footer.php'); ?>

</html>
