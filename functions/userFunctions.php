<?php function getUser($id){
	    $query=mysql_query("SELECT * FROM users WHERE id='$id'");
	    $row = mysql_fetch_array($query);
	    $name=$row['name'];
	    echo $name;
    }
    ?>