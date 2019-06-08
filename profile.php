<?php
session_start();
$friendname="";
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Profile- leCalendar</title>
  <link href="styles.css" rel="stylesheet" type="text/css">
</head>

<body>

<header>
	<nav>
		<ul>
      <?php
      if(!empty($_SESSION))
      {
        if(isset($_SESSION["username"]))
        {
          //header('Location: index.php');
      ?>
      <a href="about.php"><p style="font-weight: bold">The leCalendar Website</p></a>
      <a href="index.php"><li>Calendar</li></a>
      <a href="register.php"><li>Sign up</li></a>
    <?php }} else{?>

      <a href="about.php"><p style="font-weight: bold">The leCalendar Website</p></a>
      <!--<a href="about.php"><li>Home</li></a>-->
      <a href="index.php"><li>Calendar</li></a>
      <a href="signin.php"><li>Sign in</li></a>
      <a href="register.php"><li>Sign up</li></a>
<?php }?>
      <?php
      if(!empty($_SESSION))
      {
        if(isset($_SESSION["username"]))
        {
          //header('Location: index.php');
      ?>
      <a href="logout.php"><li>Logout</li></a>
    <?php }} ?>
		</ul>
	</nav>
</header>
</br></br>
<?php
$username = $_SESSION["username"];
//echo "Your email is: ";
//echo $username;
?>

<?php
$usernameErr = $passwordErr = $password0Err = "";
$password = $password0 = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"])) {
    $usernameErr = "username is required";
  } else {
    //$username = test_input($_POST["username"]);

$username = $_POST["username"];
/*
    if (!preg_match("/^[_a-zA-Z1-9 ]*$/",$username)) {
      $usernameErr = "Only letters and white space allowed";
    }*/
  }

  if (empty($_POST["password"])) {
    $passwordErr = "password is required";
  } else {
    //$password = test_input($_POST["password"]);
    $password = $_POST["password"];
  }

  if (empty($_POST["password0"])) {
    $password0Err = "password is required";
  } else {
    //$password = test_input($_POST["password"]);
    $password0 = $_POST["password0"];
  }
}
/*
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}*/
?>
<div class="register-content">
	<div class="register-text">
		<p style="font-weight: bold">Change account</p>
		<p>W3Schools is optimized for learning, testing, and training. Examples might be simplified to improve reading and basic understanding. Tutorials, references, and examples are constantly reviewed to avoid errors, but we cannot warrant full correctness of all content. While using this site, you agree to have read and accepted our terms of use, cookie and privacy policy. Copyright 1999-2019 by Refsnes Data. All Rights Reserved.
			Powered by W3.CSS.</p>
	</div>

<div class="register-form">
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">


<!--
      <p>Email<br/><input type="email" placeholder="Email" /></p>
      <p>Username<br/><input type="text" placeholder="Username" /></p>
      <p>Password<br/><input type="password" placeholder="Password" /></p>
      <p>Confirm Password<br/><input type="password" placeholder="Confirm Password" /></p>
      <input type="submit" value="Register"/>
-->


<p><span class="error"><?php echo $usernameErr;?></span>
<input type="email" name="username" placeholder="New e-mail" value="<?php echo $username;?>">
</p>
<p>
<span class="error"><?php echo $passwordErr;?></span>
<input type="password" name="password" placeholder="New password" value="<?php echo $password;?>">
</p>
<p>
<span class="error"><?php echo $password0Err;?></span>
<input type="password" name="password0" placeholder="New password" value="<?php echo $password0;?>">
</p>
<?php
if($password&&$password0){
if($password==$password0){
error_reporting(E_ALL);
ini_set('display_errors', 'On');
$success = true;
$password=strtoupper(md5($password));
$query = "BEGIN lecalendar_account.create_account(:a_username, :a_password, :a_succes); END;";


$c = oci_connect("STUDENT", "STUDENT", "");

if (!$c) {
  $m = oci_error();
  trigger_error('Could not connect to database: '. $m['message'], E_USER_ERROR);
}

$s = oci_parse($c, $query);
if (!$s) {
  $m = oci_error($c);
  trigger_error('Could not parse statement: '. $m['message'], E_USER_ERROR);
}

oci_bind_by_name($s,':a_username',$username);
oci_bind_by_name($s,':a_password',$password);
oci_bind_by_name($s,':a_succes',$succes,1);

$r = oci_execute($s);
if (!$r) {
  $m = oci_error($s);
  trigger_error('Could not execute statement: '. $m['message'], E_USER_ERROR);
}

if($succes){
header('Location: signin.php');
}
else{
echo "<span class=error>User already exists.</span>";
}
}
else{
echo "<span class=error>Incorect data.</span>";
}
}
?>
<!--<hr>-->

<!--<input type="submit" name="submit" value="Delete account">-->
<input type="submit" name="submit" value="Save changes">

<!--<input type="submit" name="" value="Cancel" formaction="signin.php">-->

</div>

  </form>
</br></br>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
</br><input type="submit" name="submit" value="Delete account">
</form>
  <div class="register-form">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<span class="error"><?php echo $usernameErr;?></span>
<input type="email" name="username" placeholder="E-mail" value="<?php echo $friendname;?>">
</br></br><input type="submit" name="submit" value="Send friend request">

</form>
</div>
</br></br>
</br></br>
<div class="register-form" style="margin-top: 30px;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<span class="error"><?php echo $usernameErr;?></span>
<input type="email" name="username" placeholder="Document" value="<?php echo $friendname;?>">
</br></br><input type="submit" name="submit" value="Upload calendar">

</form>
</div>
<footer>
	<div class="footer-content">
		&copy; Faculty of Computer Science<br/><sub>est. MMXIX</sub><br/><sup>Iași, Romania</sup>
	</div>
</footer>

</body>
<style>

</style>
</html>
