<?php
$server="127.0.0.1";
$user="root";
$passwd="root";
$db="web_doctors";

$conn=mysqli_connect($server,$user,$passwd,$db) or die("Connection failed :: ".$conn->error);
?>
```

