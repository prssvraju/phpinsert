<?php
    $server="localhost";
    $user="root";
    $password="";
    $db="srkrit";

    $con=mysqli_connect($server,$user,$password,$db);

    if(!$con)
    {
        die("Error".mysqli_connection_error());
    }

	#$sql="INSERT INTO student VALUES ('{$_POST['roll']}','{$_POST['name']}','{$_POST['ph']}')";
$sql ="UPDATE student SET phone='{$_POST['ph']}' WHERE roll='{$_POST['roll']}'";
    $res=mysqli_query($con,$sql);
    if($res)
    {
        $displaysql="SELECT * FROM student";
        $displayres=mysqli_query($con,$displaysql);
    
        if(mysqli_num_rows($displayres) > 0)
        {
            echo "<table border='1'><tr><th>Roll</th><th>Name</th><th>Roll</th></tr> ";
            while($row = mysqli_fetch_assoc($displayres)) {
                echo "<tr>";
		         echo "<td>" . $row['roll'] . "</td>";
		        echo "<td>" . $row['name'] . "</td>";
		        echo "<td>" . $row['phone'] . "</td>";
		        echo "</tr>";
            }
            echo "</table>";  
        }
        else
        {
            echo "error".mysqli_error($con);
        }
    }
    else
    {
        echo "error".mysqli_error($con);
    }
    mysqli_close($con);
?>