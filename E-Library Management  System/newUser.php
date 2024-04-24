<?php
include "database.php";
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
            <h3 id="heading">New User Registration</h3>

            <div id="center">
                <?php
                if (isset($_POST["submit"])) {
                    $sql = "insert into student(NAME,PASS,MAIL,DEP) values ('
                        {$_POST["name"]}', '{$_POST["pass"]}', '{$_POST["mail"]}', '{$_POST["dep"]}')";
                    $db->query($sql);
                    echo "<p class='success'>Book Uploaded Success</p>";

                }
                ?>
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                    <label>Name</label>
                    <input type="text" name="name" required>
                    <label>Password</label>
                    <input type="password" name="pass" required>
                    <label>Email Id</label>
                    <input type="email" name="mail" required>
                    <label>Select Department</label>
                    <select name="dep">
                        <option value="">Select</option>
                        <option value="BCA">BCA</option>
                        <option value="B.Sc">B.Sc CS</option>
                        <option value="MCA">MCA</option>
                        <option value="Others">Others</option>
                    </select>
                    <button type="submit" name="submit">Register Now</button>
                </form>
            </div>
        </div>
        <div id="navi">
            <?php include "sidebar.php" ?>
        </div>
        <div>
            <p>Copyright &copy;E-Library</p>
        </div>
    </div>
</body>

</html>