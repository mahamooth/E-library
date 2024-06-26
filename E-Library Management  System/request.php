<?php
session_start();
include "database.php";

if (!isset($_SESSION["ID"])) {
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
    <div id="container">
        <div id="header">
            <h1>E-Library Management System</h1>
        </div>
        <div id="wrapper">
            <h3 id="heading">New Book Request</h3>

            <div id="center">
                <?php
                if (isset($_POST["submit"])) {
                    $sql = "insert into request (ID,MES,LOGS) values (
                        {$_SESSION["ID"]}, '{$_SESSION["ID"]}', now())";
                    $db->query($sql);
                    echo "<p class='success'>Request Sent To Admin</p>";
                }
                ?>
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                    <label>Message</label>
                    <textarea name="mess" required></textarea>
                    <button type="submit" name="submit">Send Message</button>
                </form>
            </div>
        </div>
        <div id="navi">
            <?php include "usersidebar.php" ?>
        </div>
        <div>
            <p>Copyright &copy;E-Library</p>
        </div>
    </div>
</body>

</html>