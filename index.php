<?php
session_start();
if(isset($_SESSION["month"])) $month=$_SESSION['month'];
error_reporting(E_ALL);
ini_set('display_errors', 'On');
//$success = true;
//$password=strtoupper(md5($password));
//lecalendar_account.create_account(:a_username, :a_password, :a_succes);
if(isset($_SESSION["username"])) $username=$_SESSION["username"];
if(isset($_SESSION["q"])) $q=$_SESSION["q"];
//echo $username;
//echo $q;
//$query = "SELECT id from users where username=':a_username';";
$query = "SELECT id from users where username=:a_username";
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

oci_define_by_name($s, 'ID', $creator);

$r = oci_execute($s);
if (!$r) {
    $m = oci_error($s);
    trigger_error('Could not execute statement: '. $m['message'], E_USER_ERROR);
}
oci_fetch($s);
$_SESSION["id_user"]=$creator;
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Calendar - leCalendar</title>
  <link href="styles.css" rel="stylesheet" type="text/css">
</head>

<body style="background-image:url(./images/<?php echo $month;?>.jpg);">
<!--width:400px;height:266px;-->

<header style="position: sticky; top:0px;">
	<nav>
		<ul>
      <?php
        if(isset($_SESSION["username"]))
        {
          //header('Location: index.php');
      ?>
      <a href="about.php"><p style="font-weight: bold">The leCalendar Website</p></a>
      <!--<a href="index.php"><li>Calendar</li></a>-->
      <a href="profile.php"><li>Profile</li></a>
      <a href="messages.php"><li>Messages</li></a>
    <?php } else{?>

      <a href="about.php"><p style="font-weight: bold">The leCalendar Website</p></a>
      <!--<a href="about.php"><li>Home</li></a>-->
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
include 'calendar.php';

$calendar = new Calendar();

echo $calendar->show();
//if(isset($_SESSION["day"])){echo $_SESSION["day"];echo "done \n";}

?>
<div class="events" style="background: #00000099;">
<div id=event><b>Select a date</b></div>
</div>
<script>
//setInterval("events()", 1);
function events(date) {


    var xhttp;
    if (date.length == 0) {
      document.getElementById("date").innerHTML = "";
      return;
    }
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("event").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "getevents.php?q="+date, true);
    xhttp.send();


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

//var day = document.activeElement.innerHTML;
//document.getElementById("day").innerHTML = date;


//var month = document.getElementsByTagName("span")[0].innerHTML;
//document.getElementById("month").innerHTML = month;

//});

}

</script>

</br></br></br></br></br></br></br></br></br></br>
<footer>
	<div class="footer-content">
		&copy; Faculty of Computer Science<br/><sub>est. MMXIX</sub><br/><sup>Iași, Romania</sup>
	</div>
</footer>

</body>
<style>
  div.events{
    text-align: center;
     background: grey;
    margin: 50px;
    padding: 25px;
    //display: flex;
    border-radius: 50px;
  }
</style>
</html>
