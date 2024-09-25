<?php
include ("function.php");
$sid = $_GET['del_id'];
$query = "delete from student where sid='{$sid}'";
$result = mysqli_query($conn, $query);
if($result)
{
    header('Location:admin.php');
}
else{
    echo "<script> alert('hatt bc kuch error aya'); </script>";
}

?>