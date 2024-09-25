<?php
    include_once("function.php");
    session_start();
    if(isset($_SESSION['loginYes']))
    {
        
    }else
    {
        header('Location: index.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin DashBoard</title>
</head>
<b>
    <nav>
        <a href="logout.php"> <button> Logout </button></a>
    </nav>    
<hr>
<a href="insert.php"><Button> Add Records </Button></a>
<hr>

<!-- Select Php For Showing the data of students into the table  -->
    <?php showData(); ?>
</body>
</html>