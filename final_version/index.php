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

?>
<div>
<p id=day></p>
<p id=month></p>
<p id=year></p>
</div>
<script>
//setInterval("events()", 1);
function events() {
  //document.getElementById("li-2019-06-05").innerHTML = "No";
  //return document.getElementById("li-2019-06-05").value;
  //document.getElementById("day").innerHTML = "No";
  //document.getElementById("day").value = "No";

  //document.getElementById("li-").innerHTML = document.getElementById("li-2019-06-07").innerHTML;
/*
  document.getElementsByClassName(" ").addEventListener("click", function() {
    alert("You clicked the li element!");
  }, false);*/

/*
  document.addEventListener("click", function(){
    //document.getElementById("li-").innerHTML = "Hello World";
    var x=document.getElementById("li-").value;

  document.getElementById("li-").innerHTML = x;});
*/
/*
document.addEventListener("click", function(){
   document.getElementById("li-").innerHTML = document.innerHTML;
});
*/

//document.getElementsByTagName("LI").addEventListener("click", function() {

var day = document.activeElement.innerHTML;
document.getElementById("day").innerHTML = day;
var month = document.getElementsByTagName("span")[0].innerHTML;
document.getElementById("month").innerHTML = month;

//});
}

</script>
<footer>
	<div class="footer-content">
		&copy; Faculty of Computer Science<br/><sub>est. MMXIX</sub><br/><sup>Iași, Romania</sup>
	</div>
</footer>

</body>

</html>
