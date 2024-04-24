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
            <h3 id="heading">Send Your Comments</h3>

            <?php
            $sql = "SELECT * FROM BOOK WHERE BID=" . $_GET["id"];
            $res = $db->query($sql);
            if ($res->num_rows > 0) {
                echo "<table>";
                $row = $res->fetch_assoc();
                echo "
                    <tr>
                    <th>Book Name</th>
                    <td>{$row["BTITLE"]}</td>
                        <tr>
                        <tr>
                          <th>Keywords</th>
                          <td>{$row["KEYWORDS"]}</td>
                          </tr>
                          ";
                echo "</table>";
            } else {
                echo "<p class='error'>No Books Found</p>";
            }
            ?>
            <div id="center">
                <form action="<?php echo $_SERVER["REQUEST_URI"]; ?>" method="post">
                    <label>Your Comments</label>
                    <textarea name="mes" required></textarea>
                    <button type="submit" name="submit">Post now</button>
                </form>
            </div>
            <?php

            if (isset($_POST["submit"])) {
                $sql = "insert into comment(BID,SID,COMM,LOGS) values ('
                {$_GET["id"]}', '{$_SESSION["ID"]}', '{$_POST["mes"]}', now())";
                $db->query($sql);

            }

            $sql = "SELECT student.NAME, comment.COMM, FROM COMMENT INNER JOIN student ON comment.SID = student.ID
            WHERE comment.BID = {$_GET["id"]} ORDER BY comment.CID DESC";
            $res = $db->query($sql);
            if ($res->num_rows > 0) {
                while ($row = $res->fetch_assoc()) {
                    echo "<p>
                    <strong>{$row["NAME"]} : </strong>
                    {$row["COMM"]}
                    <li>{$row["LOGS"]}</li> </p>";
                }
            } else {
                echo "<p class='error'>No Comments Yet</p>";
            }
            ?>
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