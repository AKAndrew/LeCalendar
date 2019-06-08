<?php
session_start();

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Home - leCalendar</title>
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
      <a href="about.php"><li>Home</li></a>
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
echo "Your email is: ";
echo $_SESSION["username"];
?>
<footer>
	<div class="footer-content">
		&copy; Faculty of Computer Science<br/><sub>est. MMXIX</sub><br/><sup>Iași, Romania</sup>
	</div>
</footer>

</body>
<style>

</style>
</html>
