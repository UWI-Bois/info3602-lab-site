<?php
$name = "ajay";
$flavor = "vanilla";
//$age = 21;
$birthYear = 1998;
$currYear = date("Y");
var_dump($currYear);
$age = (int)$currYear - (int)$birthYear;
?>
<!DOCTYPE html>
<html>
<head>
    <title> My Second PHP Exercise </title>
</head>
<body>
<div>
    <h3> Today's Date: </h3>
    <p> <!--DATE--> </p>
    <h3> My name: </h3>
    <p> <?php echo $name ?> </p>
    <h3> My favourite ice cream flavour: </h3>
    <p> <?php echo $flavor ?></p>
    <h3> My age: </h3>
    <p> <?php echo $age ?></p>
</div>
</body>
</html>