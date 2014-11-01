<?php
session_start();
require_once('lib.php');
include('database.php');
$success = false;
#Form validation
if(!empty($_POST))
{
	$username = validate_input($_POST['username']);
	$password = md5(validate_input($_POST['password']));
	$stmt = $conn->prepare('SELECT * FROM student where username = ? and password = ?');
    $stmt->execute(array($username,$password));
    $success = $stmt->fetch();
#For now, I just assume perfect user.
    if($success)
    {
        $_SESSION['user'] = $username;
        header('Location: homepage.php');
    }
}
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/login.css">
</head>


<body>
<div class = "container">
<div class = "login">
<h1>Login</h1>
<form method="post" action="">
<p><input type="text" name="username" value="" placeholder="example@encs.concordia.ca"></p>
<p><input type="password" name="password" value="" placeholder="Password"</p>
<p class="submit"><input type="submit" name="commit" value="Login"></p>
</form>
</div>
</div>

</body>
<?php
    if($success)
    {
        echo "Success!";
    }
    else
    {
        if(!empty($_POST))
        {
            echo "Username or password is incorrect";
        }
    }
?>
</html>
