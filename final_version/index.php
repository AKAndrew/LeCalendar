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
      		<a href="index.php"><p style="font-weight: bold">The leCalendar Website</p></a>
			<a href="index.php"><li>Home</li></a>
			<a href="register.php"><li>Get Started</li></a>
			<a href="about.php"><li>About</li></a>
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
include 'calendar.php';

$calendar = new Calendar();

echo $calendar->show();
//if(isset($_SESSION["day"])){echo $_SESSION["day"];echo "done \n";}

echo "test";
?>
<script>
function events() {
  document.getElementById("li-").innerHTML = document.getElementById("li-2019-06-05").innerHTML;
//document.getElementById("li-2019-06-05").innerHTML = "No";

  //return document.getElementById("li-2019-06-05").value;
  //document.getElementById("day").innerHTML = "No";
  //document.getElementById("day").value = "No";
}

</script>
<footer>
	<div class="footer-content">
		&copy; Faculty of Computer Science<br/><sub>est. MMXIX</sub><br/><sup>Iași, Romania</sup>
	</div>
</footer>

</body>

</html>
