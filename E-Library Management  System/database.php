<?php
     $db=new mysqli("localhost","root","","pro");
     if(!$db)
     {
        echo"Error";
     }
     else
     {
        echo"Database Connected";
     }
?>