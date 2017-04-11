<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
if(isset($_POST['submit'])){
$servername = "localhost";
$username = "napat";
$password = "mypass";
$dbname = "webtech";
$Cusid=$_POST['Cusid'];
$id=$_POST['id'];
$first=$_POST['first'];
$last=$_POST['last'];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO Customers (CustomerID ,CitizenID, Firstname, Lastname)
    VALUES ('$Cusid', '$id', '$first', '$last')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
}
?>
<form method="post">
CustomerID : <input type="text" name="Cusid"/><br /><br />
CitizenID : <input type="text" name="id"/><br /><br />
Firstname : <input type="text" name="first"/><br /><br />
Lastname : <input type="text" name="last"/><br /><br />
<input type="submit" name="submit" value="Submit">
</form>



</body>
</html>