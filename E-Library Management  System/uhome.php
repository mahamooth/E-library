<?php
session_start();
 include"database.php";
function countRecord($sql, $db) {
    $res = $db->query($sql);
    return $res->num_rows;
}

if(!isset($_SESSION["ID"]))
{
    header("location:ulogin.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>E-Library</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div  id="container">
            <div id="header">
                <h1>E-Library Management System</h1>
            </div>
            <div id="wrapper">
                <h3 id="heading">Welcome <?php echo $_SESSION["NAME"]; ?></h3>
                
            </div>
            <div id="navi">
                <?php
                     include "usersidebar.php"
                ?>
            </div>
            <div>
              <p>Copyright &copy;E-Library</p>
            </div>
        </div>    
    </body>
</html>