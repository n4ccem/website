<?php
session_start();
$conn = mysqli_connect('localhost','nassim','root','users');
$error = '';
$success = '';

if(isset($_POST['submit']))
{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $fpassword = $_POST['fpassword'];
    $spassword = $_POST['spassword'];
    if(empty($fname) || empty($lname) || empty($email) || empty($fpassword) || empty($spassword)){
        $error = 'Please fill in the blanks';
    }else{
        if($fpassword === $spassword){
            $sql = "insert into login (fname,lname,email,password) values ('$fname','$lname','$email','$fpassword')"; 
            $resulte = mysqli_query($conn, $sql);
            if($resulte){
                $success = "Your account has been register successfully . </br><p>you can back to <a style='color:green; text-decoration: underline;' href='login.php'>logIn</a></p>";
            }
        }else{
            $error = 'passwords not matche';
        }
    }

}
?>
<DOCTYPE html>
<html>
<?php include('templates/header.php'); ?>
<div class="container2">
    <form method="POST" action="">
        <h1>Register</h1>
        <input type="text" name="fname" placeholder="First Name">
        <input type="text" name="lname" placeholder="Last Name">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="fpassword" placeholder="Password">
        <input type="password" name="spassword" placeholder="Confirm Password">
        <div style="color:red; text-align: center;"><?php echo $error; ?></div>
        <div style="color:green; text-align: center;"><?php echo $success; ?></div>
        <input type="submit" name="submit" value="Register">
    </form>
    <p><strong>If you are a member please <a href="login.php">LogIn</a> .</strong><p>
</div>
<?php include('templates/footer.php'); ?>
</html>