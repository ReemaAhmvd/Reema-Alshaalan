<!DOCTYPE html>
 
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/style.css" rel="stylesheet">
  
  <title>FINAL PROJECT</title>

<style>

body {
  background-image:url("BBB.jpg");
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  font-family:georgia;
  font-size:20px;
}

.myDIV1 {
  float: center;
  width:100%;

} 

main{
    background: rgb(222,207,201,0.6);
  box-sizing: border-box;
  border-radius:30px;
  text-align:center;
  float: right;
  padding: 5px;
  width: 60%;
}

input{
    padding: 4px;
    border:1px solid gray;
    text-align:center;
    font-size:17px;
    font-family:georgia;
}

.myDIV2 {
  background: rgb(222,207,201,0.6);
  box-sizing: border-box;
  float: center;
  border-radius:30px;
  text-align:center;
  width: 30%;
  float: left;
  padding: 10px;
}

#p1{color: #CD160E ;}

#tbl{
   width: 100%;
   text-align:center;
}

#tbl th{
    width: 20%; 
    padding: 10px;
    text-align:center;
}
#submit{
    width: 90px;
    border-radius:30px;
    padding: 8px;
    
}
</style>

</head>

<!------------------------------------------------------------------------------------------------------------------------------->

<body >

<br><br>
<div class="myDIV1">

<form method="post">

<div class="myDIV2" ><br>

<img src='logo.jpg' width='200'>

<h2>SIGN UP</h2>

<?php 
    $servername = "localhost";
    $username = "root"; # MySQL user
    $password = ""; # MySQL Server root password
    $dbname='travelers'; # Database name
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT * FROM `traveler`;";
    $res=mysqli_query($conn,$sql);
    

if(empty($_POST['name']) && empty($_POST['mobileNo']) &&empty($_POST['email']) &&empty($_POST['age']) && empty($_POST['class'])){
    echo "<p id='p1'>Please fill in the fields!</p>";

}else{
    $name= $_POST['name'];
    $mobileNo=$_POST['mobileNo'];
    $email= $_POST['email'];
    $age=$_POST['age'];
    $class=$_POST['class'];

    # Insert into the database
    $query = "INSERT INTO traveler(name,mobileNo,email,age,class) VALUES ('$name',$mobileNo,'$email',$age,'$class')";
    if (mysqli_query($conn, $query)) {
        header("Location: fp1.php");
    } 
}
?>

<label for="name">Traveler's name:</label><br>
<input type="text" id="name" name="name"><br>
<label for="mobileNo">Mobile number:</label><br>
<input type="text" id="mobileNo" name="mobileNo"><br>
<label for="email"> E-mail:</label><br>
<input type="text" id="email" name="email" ><br>
<label for="age"> Age:</label><br>
<input type="text" id="age" name="age">
<BR>

<p>Select the class of the train:</p>

<input type="radio" id="Economy" name="class" value="Economy">
<label for="Economy">Economy</label><br>

<input type="radio" id="Business" name="class" value="Business">
<label for="Business">Business</label><br><br>

<input type="submit" value="submit" name="submit" id="submit">

</div>

<!--Display data-->

<main>
  <table id='tbl'>
  
  <tr>
    <th>Traveler's name</th> 
    <th>Mobile number</th> 
    <th>E-mail</th> 
    <th>Age</th> 
    <th>class</th>
  </tr>

  <?php
  while($row=mysqli_fetch_array($res)){
    echo "<tr>";
    echo "<td>".$row['name']."</td>";
    echo "<td>".$row['mobileNo']."</td>";
    echo "<td>".$row['email']."</td>";
    echo "<td>".$row['age']."</td>";
    echo "<td>".$row['class']."</td>";
    echo "</tr>";
  }
  ?>
  
  </table>
</main>

</form>

</div>

  </body>
  </html>