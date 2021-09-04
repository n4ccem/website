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
        $sql = "select * from login where email = '$email' and password = '$password' ";  
        $result = mysqli_query($conn, $sql); 
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors1 = 'Email is invalid';
        }else{
            if($row)
            {
                $_SESSION['user'] = $row['fname'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['password'] = $row['password'];
                header('Location: account/welcome.php');
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