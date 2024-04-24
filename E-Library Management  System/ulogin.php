<?php
// session_start();
    //  include"database.php";
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
                <h3 id="heading">User Login Here</h3>
                <div id="center">
                <?php
                // if(isset($_POST["submit"]))
                // {
                //     echo $sql="SELECT * FROM student WHERE NAME='($_POST["name"])' and PASS='($_POST["pass"])'";
                //     echo"<p class='success'>Good</p>";
                //     $res=$db->query($sql);
                //     if($res->num_rows>0)
                //     {
                            // $row = $res->fetch_assoc();
                            // $_SESSION["AID"] = $row["AID"];
                            // $_SESSION["NAME"] = $row["NAME"];
                            // header("location:u home.php");
                //     }
                //     else
                //     {
                //         echo"<p class='error'>Invalid User Details</p>";
                //     }
                // }
                ?>
                <form action="ulogin.php" method="post">
                    <label>Name</label>
                    <input type="text" name="name" required>
                    <label>Pasword</label>
                    <input type="password" name="pass" required>
                    <button type="submit" name="submit">Login Now</button>
                </form>
                </div>
            </div>
            <div id="navi">
                <?php
                     include "sidebar.php"
                ?>
            </div>
            <div>
              <p>Copyright &copy;E-Library</p>
            </div>
        </div>    
    </body>
</html>