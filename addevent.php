<?php session_start() ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Sign up - leCalendar</title>
  <link href="styles.css" rel="stylesheet" type="text/css">
<style>
.error {color: #FF0000;}
</style>
</head>

<body>
  <?php

  $titleErr = $locationErr = $descriptionErr = $start_hourErr = $end_hourErr = $visibleErr = $tagsErr = "";

  $title = $location = $description = $start_hour = $end_hour = $visible  = $tags = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["title"])) {
      $titleErr = "field is required";
    } else {
      //$username = test_input($_POST["username"]);

  $title = $_POST["title"];
  /*
      if (!preg_match("/^[_a-zA-Z1-9 ]*$/",$username)) {
        $usernameErr = "Only letters and white space allowed";
      }*/
    }
      if (empty($_POST["location"])) {
        $locationErr = "field is required";
      } else {
        //$username = test_input($_POST["username"]);

    $location = $_POST["location"];
    /*
        if (!preg_match("/^[_a-zA-Z1-9 ]*$/",$username)) {
          $usernameErr = "Only letters and white space allowed";
        }*/
      }
      if (empty($_POST["description"])) {
        $descriptionErr = "field is required";
      } else {
        //$username = test_input($_POST["username"]);

    $description = $_POST["description"];
    /*
        if (!preg_match("/^[_a-zA-Z1-9 ]*$/",$username)) {
          $usernameErr = "Only letters and white space allowed";
        }*/
      }
        if (empty($_POST["start_hour"])) {
          $start_hourErr = "field is required";
        } else {
          //$username = test_input($_POST["username"]);

      $start_hour = $_POST["start_hour"];
      /*
          if (!preg_match("/^[_a-zA-Z1-9 ]*$/",$username)) {
            $usernameErr = "Only letters and white space allowed";
          }*/
        }
          if (empty($_POST["end_hour"])) {
            $end_hourErr = "field is required";
          } else {
            //$username = test_input($_POST["username"]);

        $end_hour = $_POST["end_hour"];
        /*
            if (!preg_match("/^[_a-zA-Z1-9 ]*$/",$username)) {
              $usernameErr = "Only letters and white space allowed";
            }*/
          }
            if (empty($_POST["visible"])) {
              $visibleErr = "field is required";
            } else {
              //$username = test_input($_POST["username"]);

          $visible = $_POST["visible"];
          /*
              if (!preg_match("/^[_a-zA-Z1-9 ]*$/",$username)) {
                $usernameErr = "Only letters and white space allowed";
              }*/
            }
            /*
              if (empty($_POST["creator"])) {
                $creatorErr = "field is required";
              } else {
                //$username = test_input($_POST["username"]);

            $creator = $_POST["creator"];
            /*
                if (!preg_match("/^[_a-zA-Z1-9 ]*$/",$username)) {
                  $usernameErr = "Only letters and white space allowed";
                }*/
              //}*/
                if (empty($_POST["tags"])) {
                  $tagsErr = "field is required";
                } else {
                  //$username = test_input($_POST["username"]);

              $tags = $_POST["tags"];
              /*
                  if (!preg_match("/^[_a-zA-Z1-9 ]*$/",$username)) {
                    $usernameErr = "Only letters and white space allowed";
                  }*/
                }
}
/*
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
  */
  /*
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }*/
  ?>
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
      <!--<a href="register.php"><li>Sign up</li></a>-->
      <a href="profile.php"><li>Profile</li></a>
    <?php }} else{?>

      <a href="about.php"><p style="font-weight: bold">The leCalendar Website</p></a>
      <!--<a href="about.php"><li>Home</li></a>-->
      <a href="index.php"><li>Calendar</li></a>
      <a href="signin.php"><li>Sign in</li></a>
      <!--<a href="register.php"><li>Sign up</li></a>-->
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

<div class="register-content">
	<!--<div class="register-text">
		<p style="font-weight: bold">Sign up</p>
		<p>W3Schools is optimized for learning, testing, and training. Examples might be simplified to improve reading and basic understanding. Tutorials, references, and examples are constantly reviewed to avoid errors, but we cannot warrant full correctness of all content. While using this site, you agree to have read and accepted our terms of use, cookie and privacy policy. Copyright 1999-2019 by Refsnes Data. All Rights Reserved.
			Powered by W3.CSS.</p>
	</div>-->
	<div class="register-form">
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">


<!--
				<p>Email<br/><input type="email" placeholder="Email" /></p>
				<p>Username<br/><input type="text" placeholder="Username" /></p>
				<p>Password<br/><input type="password" placeholder="Password" /></p>
				<p>Confirm Password<br/><input type="password" placeholder="Confirm Password" /></p>
				<input type="submit" value="Register"/>
-->

<p><span class="error"><?php echo $titleErr;?></span>
<input type="text" name="title" placeholder="Titlu" value="<?php echo $title;?>">
</p>
<p><span class="error"><?php echo $descriptionErr;?></span>
<input type="text" name="description" placeholder="Descriere" value="<?php echo $description;?>">
</p>
<p><span class="error"><?php echo $locationErr;?></span>
<input type="text" name="location" placeholder="Locatie" value="<?php echo $location;?>">
</p>
<!--
<p><span class="error"><?php// echo $usernameErr;?></span>
<input type="email" name="username" placeholder="Data inceperii (an-luna-zi)" value="<?php// echo $username;?>">
</p>

<p><span class="error"><?php// echo $usernameErr;?></span>
<input type="email" name="username" placeholder="Data incheierii (an-luna-zi)" value="<?php// echo $username;?>">
</p>
-->
<p><span class="error"><?php echo $start_hourErr;?></span>
<input type="text" name="start_hour" placeholder="Ora inceperii (ora:minut)" value="<?php echo $start_hour;?>">
</p>
<p><span class="error"><?php echo $end_hourErr;?></span>
<input type="text" name="end_hour" placeholder="Ora incheierii (ora:minut)" value="<?php echo $end_hour;?>">
</p>
<p><span class="error"><?php echo $visibleErr;?></span>
<input type="text" name="visible" placeholder="Visibil (1 sau 0)" value="<?php echo $visible;?>">
</p>

<!--ID-->
<p><span class="error"><?php echo $tagsErr;?></span>
<input type="text" name="tags" placeholder="Tags" value="<?php echo $tags;?>">
</p>


<!--add_event('titlu','descriere','locatie','2019-06-13','2019-06-13','9:00','17:00',1,327,'test');-->

<!--
<p><span class="error"><?php// echo $usernameErr;?></span>
<input type="email" name="username" placeholder="E-mail" value="<?php// echo $username;?>">
</p>
<p>
<span class="error"><?php// echo $passwordErr;?></span>
<input type="password" name="password" placeholder="Password" value="<?php// echo $password;?>">
</p>
<p>
<span class="error"><?php// echo $password0Err;?></span>
<input type="password" name="password0" placeholder="Password" value="<?php// echo $password0;?>">
</p-->
<?php
//if($password&&$password0){
//if($password==$password0){

if($title && $location && $description && $start_hour && $end_hour && $visible && $tags){
error_reporting(E_ALL);
ini_set('display_errors', 'On');
//$success = true;
//$password=strtoupper(md5($password));
//lecalendar_account.create_account(:a_username, :a_password, :a_succes);
$username=$_SESSION["username"];
$q=$_SESSION["q"];
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
//echo $creator;
/*
$ncols = oci_num_fields($r);
//echo"<tr>\n";
for ($i=1;i<=$ncols;$i++) {
  $colname = oci_field_name($s,$i);
  //echo "  <th><b>" . htmlspecialchars($colname,ENT_QUOTES|ENT_SUBSTITUTE)."</b></th>\n";
}

while (($row = oci_fetch_array($s, OCI_ASSOC+OCI_RETURN_NULLS)) !=fasle)
  foreach ($row as $item)
    $creator= $item!=null?htmlspecialchars($item,ENT_QUOTES|ENT_SUBSTITUTE):"&nbsp";
//$creator=oci_fetch($s);
echo $creator;
*/
//////////////

/*
echo $title; echo $location; echo $description; echo $start_hour; echo $end_hour; echo $visible; echo $tags;*/

///BREAKS
$query = "BEGIN add_event(:a_titlu,:a_descriere,:a_locatie,:a_current_date,:a_current_date,:a_start_hour,:a_end_hour,:a_visible,:a_creator,:a_tags); END;";

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

oci_bind_by_name($s,':a_titlu',$title);
oci_bind_by_name($s,':a_locatie',$location);
oci_bind_by_name($s,':a_descriere',$description);
oci_bind_by_name($s,':a_current_date',$q);
oci_bind_by_name($s,':a_start_hour',$start_hour);
oci_bind_by_name($s,':a_end_hour',$end_hour);
oci_bind_by_name($s,':a_visible',$visible);
oci_bind_by_name($s,':a_creator',$creator);
oci_bind_by_name($s,':a_tags',$tags);


$r = oci_execute($s);
if (!$r) {
    $m = oci_error($s);
    trigger_error('Could not execute statement: '. $m['message'], E_USER_ERROR);
}
//BREAKS*/


/*
if($succes){
header('Location: signin.php');
}
else{
echo "<span class=error>User already exists.</span>";
  }
}
else{
echo "<span class=error>Incorect data.</span>";
}*/
}
?>
<!--<hr>-->
<input type="submit" name="submit" value="Add event">
<input type="submit" name="submit" value="Back"formaction="index.php">

<!--<input type="submit" name="" value="Cancel" formaction="signin.php">-->




		</form>
    <!--
		<div class="alt-reg">
			Or register with:
			<a  href="https://google.com"><img src="./images/google.png" alt="Google"/></a>
			<a href="https://facebook.com"><img src="./images/facebook.png" alt="Facebook"/></a>
		</div>
		<hr/>
		<div class="signin">
			Already a member? <a href="signin.php">Sign in!</a>
		</div>
  -->
	</div>
</div>

<footer>
	<div class="footer-content">
		&copy; Faculty of Computer Science<br/><sub>est. MMXIX</sub><br/><sup>Iași, Romania</sup>
	</div>
</footer>

</body>

</html>
