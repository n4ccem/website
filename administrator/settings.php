<?php session_start();
if(!$_SESSION['email']){
    unset($_SESSION['email']);
    header('Location: login.php');

}else{
    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
}

$conn = mysqli_connect('localhost','nassim','root','users');
$error = '';
$error2 = '';
$success = '';
$success2 = '';

if(isset($_POST['esubmit'])){
    $newemail = $_POST['email'];
    if(!empty($newemail)){
        $sqlemail = "update admin set email='".$newemail."' where email='".$email."' ";
        $row = mysqli_query($conn, $sqlemail); 
        if($row){
            $success = "Email update successfull";
            header('Refresh: 2; logout.php');
        }
    }else{
        $error = 'Email field required';
    }
}


if(isset($_POST['p'])){
    $oldpassword = $_POST['password'];
    $newpassword = $_POST['npassword'];
    $newpassword2 = $_POST['rpassword'];
    if(!empty($oldpassword) || !empty($newpassword) || !empty($newpassword2)){
        if($oldpassword === $password){
            if($newpassword === $newpassword2){
                $sql2 = "update admin set password='".$newpassword."' where password='".$oldpassword."' ";
                $result2 = mysqli_query($conn, $sql2);
                if($result2){
                    $success2 = "Password changed successfull";
                    header('Refresh: 3; logout.php');
                }

            }else{
                $error2 = "New password not matche";
            }
        }else{
            $error2 = "Old password is incorrect ";
        }
    }else{
        $error2 = "All fileds required";
    }
}




?>

<!DOCTYPE html>
<html>
<?php include('templates/header2.php'); ?>
<div class="container">
    <form actions="" method="POST">
    <h1>Change Email</h1>
        <input type="email" name="email" placeholder=" Entre New Email">
        <p style="color:green;text-align:center;"><?php echo $success;?></p>
        <p style="color:red;text-align:center;"><?php echo $error;?></p>
        <input type="submit" name="esubmit" value="Change email">
    </form actions="" method="post">    
    <form action="" method="POST">   
        <h1>Change Password</h1>
        <input type="password" name="password" placeholder=" Entre Old password">
        <input type="password" name="npassword" placeholder=" Entre New password">
        <input type="password" name="rpassword" placeholder=" Entre New password">
        <p style="color:green;text-align:center;"><?php echo $success2;?></p>
        <p style="color:red;text-align:center;"><?php echo $error2;?></p>
        <input type="submit" name="p" value="Change password">
        
    </form>
</div>

<?php include('templates/footer.php'); ?>
</html>