<?php
session_start();
include "database.php";

if (!isset($_SESSION["AID"])) {
    header("location:alogin.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>E-Library</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div id="container">
        <div id="header">
            <h1>E-Library Management System</h1>
        </div>
        <div id="wrapper">
            <h3 id="heading">Change Password</h3>

            <div id="center">
                <?php
                if(isset($_POST["submit"])) {
                    $sql = "SELECT * from admin WHERE APASS='{$_POST["opass"]}' and AID='{$_SESSION["AID"]}'";
                    $res = $db->query($sql);
                    if($res->num_row>0) {
                        $s="update admin set APASS='{$_POST["npass"]}' WHERE AID=".$_SESSION["AID"];
                        $db->query($s);
                        echo "<p class='success'>Password Changed</p>";
                    } else {
                        echo "<p class='error'>Invalid Password</p>";
                    }
                }
                ?>
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                    <label>Old Password</label>
                    <input type="password" name="opass" required>
                    <label>New Password</label>
                    <input type="password" name="npass" required>
                    <button type="submit" name="submit">Update Password</button>
                </form>
            </div>
        </div>
        <div id="navi">
            <?php include "adminsidebar.php" ?>
        </div>
        <div>
            <p>Copyright &copy;E-Library</p>
        </div>
    </div>
</body>

</html>