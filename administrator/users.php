<?php session_start();
if(!$_SESSION['email']){
    
    unset($_SESSION['email']);
    header('Location: login.php');
}else{
    $name = $_SESSION['email']; 
}

$conn = mysqli_connect('localhost','nassim','root','users');
$sql = "select * from login order by id";  
$result = mysqli_query($conn, $sql); 
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
$row = mysqli_num_rows($result);
$x = '';

?>
<DOCTYPE html>
<html>
    <?php include('templates/header2.php'); ?>

<table>
    <tr>
        <th>id</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Action</th>
    </tr>
    <?php for ($x = 0; $x < $row ; $x++) { ?>
    <tr>
        <td><?php print_r($data[$x]['id']); ?></td>
        <td><?php print_r($data[$x]['fname']); ?></td>
        <td><?php print_r($data[$x]['lname']); ?></td>
        <td><?php print_r($data[$x]['email']); ?></td>
        <td><form method="POST" action=""><input type="submit" name="submit<?php echo $x; ?>" value="DELETE"></form>
        <?php if(isset($_POST['submit'.$x])){ ?>
        <?php $sql2 = "delete from login where id = '".$data[$x]['id']."'";?>
        <?php $resulte = mysqli_query($conn, $sql2); ?>
        <?php header('Location: users.php'); ?>
        <?php } ?>
        </td>
    <tr>
    <?php } ?>
</table>

</body>
    <?php include('templates/footer.php'); ?>
</html>