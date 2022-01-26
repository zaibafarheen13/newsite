<html>
<head><title>Sign Up</title></head>
<center><body background="bg-forcollproj5.png">
  <h2>Register Here!</h2>
  <form action="abc.php" method="post">
    <table border="1" width="300" height="150">
      <!--<tr><td>Id:</td>
          <td><input type="text" name="id"></td></tr>-->
      <tr><td>Name:</td>
          <td><input type="text" name="name"></td></tr>
      <tr><td>Password:</td>
          <td><input type="password" name="password"></td></tr>
      <tr><td>Email Id:</td>
        <td><input type="text" name="email"></td></tr>
      <tr><td colspan="5" align="center"><input type="submit" name="signup" value="signup"></td.</tr>

    </table>
</form>
</body></center>
</html>

<?php
//mysql_connect("localhost","root","") or die (mysql_error());
//mysql_select_db("mydatabse") or die (mysql_error());
//works but dont know how to run the query mysqli_connect("localhost","root","","mydatabse");
$server_name='localhost';
$user_name='root';
$password="";
$database="mydatabse";

$connection=new mysqli($server_name,$user_name,$password,$database);
//$connection=new mysqli("localhost","root","","mydatabse");
if ($connection->connect_error){
  die("Unable to connect to the database".$connection->connect_error);
}

/*$table="CREATE TABLE login(
  id int(10) UNSIGNED AUTO_INCREMENT PRIMARY_KEY,
  name VARCHAR(40),
  password VARCHAR(40),
  email VARCHAR(40)

)";
if($connection->query($table)===true){
  echo "Table created successfully";
}
else{
  echo "Error".$connection->error;
}*/

if(isset($_POST['signup']))
{
  //$id= $_POST['id'];
  $name= $_POST['name'];
  $pass= $_POST['password'];
  $email= $_POST['email'];
  /*if($id==''){
    echo "<script>alert('Please enter the id')</script>";
  }*/
if($name==''){
  echo "<script>alert('Please enter the name')</script>";
  exit();
}
if($pass==''){
  echo "<script>alert('Please enter the password')</script>";
  exit();
}
if($email==''){
  echo "<script>alert('Please enter the email')</script>";
  exit();
}

  //$query1="insert into login(name,password,email) values()";
  $query1="INSERT INTO `login`(`name`, `password`, `email`) VALUES ('$name','$pass','$email')";
  //$result=mysqli_query($connection,$query1);
//  if($result){
  if($connection->query($query1)===true){
    //echo "New record inserted successfully";
    echo "You have registered successfully!";

  }
  else{
    echo "Error: " . $query1 . "<br>".$connection->error;
  }
//connection->close();
  //does not worl-below query
  /*if(mysql_query($query)){
    echo "<h3>You have registered successfully!</h3>";
  }*/


}
?>
