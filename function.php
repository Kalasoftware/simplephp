<?php
    include_once("con.php");
    $conn = $GLOBALS['conn'];
    function val_field($field, $value) {
        switch ($field) {
            case "user": 
                return preg_match("/^[0-9]{3}$/", $value); // 3-digit user ID
            case "pass": 
                return preg_match("/^[a-zA-Z0-9]{3,}$/", $value); // At least 6 alphanumeric characters
            default:
                return false;
        }
    }
    
    function check_user($user, $pass) {
        global $conn;
        $query = "SELECT COUNT(pass) FROM admintb WHERE adminid='$user' AND pass='$pass'";
        $res = mysqli_query($conn, $query);
        
        if ($res) {
            $count = mysqli_fetch_array($res)[0]; // Fetch count from the result
            return $count > 0; // Return true if user exists
        } else {
            return false; // Query failed
        }
    }

    function fillCombo()
    {
        global $conn;

        $query = "select * from coursetb";
        $res = mysqli_query($conn, $query);
       if($res) {echo "<select name='cidv'>  ";
         while($row = mysqli_fetch_array($res)) 
        {
            echo "<option value='{$row['courseid']}' > {$row['coursename']} </option>";
        }
        echo "</select>";
    }
    else
    {
        echo "Error occured";
    }
        
    }

    function insert_student($cid,$sname,$dob,$email,$img)
    {
        global $conn;
        $query = "insert into student(cid,sname,dob,email,photo) values('$cid','$sname','$dob','$email','$img')";
        $res = mysqli_query($conn, $query);
        return $res;

    }

    // it can be o[timized usng , pass kdo row bass , query koi bhi ho data display hojati ]
    function showData(){
        global $conn;
        $query = "select sid,coursename,sname,dob,email,photo from student s,coursetb c where s.cid = c.courseid order by sname ASC";
        $res = mysqli_query($conn, $query);
        echo "<table border=2> 
        <tr> 
        <td> Name </td>  
        <td> Course Name </td>
        <td> DOB </td>
        <td> Email </tb>
        <td> Photo </td>
        <td> Edit </td>
        <td> Delete </td>
        <tr> ";
        while($row = mysqli_fetch_array($res))
        {
            
            echo "<tr><td>".$row["sname"]."</td>";
            echo    "<td>".$row["coursename"]."</td>";
            echo "<td>". $row['dob']. "</td>";
            echo "<td>". $row['email']. "</td>";
          
            echo "<td> <img src='pics/{$row['photo']}' height='40px' width='40px'> 
            </img>";
            echo "<td><a href='edit.php?edit_id=" . $row['sid'] . "'>Edit</a></td>";
            echo "<td><a href='del.php?del_id=" . $row['sid'] . "'>Delete</a></td>";
            echo "</tr>";
        }

        echo "</table> ";
    }


    ?>
