<?php
/* 32. Connet the sql server and the staff database
 *      31.1 create an object of mysqli using these parameters ('localhost','root','','staff')*/

/*33.  Check whether the connection to the database occurs error or not. 
 *     32.1 If error occurs, print the error message. */

    /*Answer Here*/
    $mysqli = new mysqli('localhost','root','root','612_Restaurant'); 
    if($mysqli->connect_errno){
      echo $mysqli->connect_errno.": ".$mysqli->connect_error;
    }
    else
    {
       echo "Success";
    }
   
 ?>
