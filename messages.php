<?php
session_start();
?>
<html>
<title>Messages - leCalendar</title>
<link href="styles.css" rel="stylesheet" type="text/css">
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
        <!--<a href="index.php"><li>Calendar</li></a>-->
        <a href="index.php"><li>Calendar</li></a>
        <a href="profile.php"><li>Profile</li></a>
      <?php }} else{?>

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
$username=$_SESSION["username"];
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

//$c = oci_connect("STUDENT", "STUDENT", "");


 $query="select sender_name,text from messages where receiver=:a_creator";


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
oci_bind_by_name($s,':a_creator',$creator);
$r = oci_execute($s);
if (!$r) {
    $m = oci_error($s);
    trigger_error('Could not execute statement: '. $m['message'], E_USER_ERROR);
}

echo "<table border='1'>\n";
$ncols = oci_num_fields($s);
echo "<tr>\n";
for ($i = 1; $i <= $ncols; ++$i) {
    $colname = oci_field_name($s, $i);
    echo "  <th><b>".htmlspecialchars($colname,ENT_QUOTES|ENT_SUBSTITUTE)."</b></th>\n";
}
echo "</tr>\n";

while (($row = oci_fetch_array($s, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
    echo "<tr>\n";
    foreach ($row as $item) {
        echo "<td>";
        echo $item!==null?htmlspecialchars($item, ENT_QUOTES|ENT_SUBSTITUTE):"&nbsp;";
        echo "</td>\n";
    }
    echo "</tr>\n";
}
echo "</table>\n";

?>
<div class="register-form">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<!--
  <input type="text" name="fname" placeholder="Send to:">
-->
    <select name="friend" placeholder="E-mail">
        <option disabled selected>Friend</option>
        <!--<option disabled selected><?php //$result ?></option>-->

        <?php
//        $query = "select name from heroes order by name asc";

 $c_id=$_SESSION["id_user"];

 $query="select Friends from friends where id_user1=:cid";

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

        //oci_define_by_name($s, 'NAME', $name);
        oci_define_by_name($s, 'FRIENDS', $friend);
oci_bind_by_name($s,':cid',$c_id);
        $r = oci_execute($s);
        if (!$r) {
            $m = oci_error($s);
            trigger_error('Could not execute statement: '. $m['message'], E_USER_ERROR);
        }

        while (oci_fetch($s)) {
        echo '<option>';
        echo $friend;
        echo '<//option>';
        }


        ?>
    </select>





</br></br>
  <input type="text" name="testmsg" placeholder="Message:">
</br></br>
  <input type="submit">
  <input type="submit" name="submit" value="Back"formaction="index.php">
</form>
<?php
/*
 $c_id=$_SESSION["id_user"];

 $query="select Friends from friends where id_user1=:cid";
 //$query="select Friends from friends where username1=:cid";


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
oci_bind_by_name($s,':cid',$c_id);
$r = oci_execute($s);
if (!$r) {
    $m = oci_error($s);
    trigger_error('Could not execute statement: '. $m['message'], E_USER_ERROR);
}

echo "<table border='1'>\n";
$ncols = oci_num_fields($s);
echo "<tr>\n";
for ($i = 1; $i <= $ncols; ++$i) {
    $colname = oci_field_name($s, $i);
    echo "  <th><b>".htmlspecialchars($colname,ENT_QUOTES|ENT_SUBSTITUTE)."</b></th>\n";
}
echo "</tr>\n";

while (($row = oci_fetch_array($s, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
    echo "<tr>\n";
    foreach ($row as $item) {
        echo "<td>";
        echo $item!==null?htmlspecialchars($item, ENT_QUOTES|ENT_SUBSTITUTE):"&nbsp;";
        echo "</td>\n";
    }
    echo "</tr>\n";
}
echo "</table>\n";
*/
?>


</div>
</body>
</html>
<?php
if(!empty($_POST['fname'])&&!empty($_POST['testmsg'])){
  $towards_val = $_POST['fname'];
  $msg_val = $_POST['testmsg'];
error_reporting(E_ALL);
ini_set('display_errors', 'On');

$c = oci_connect("STUDENT", "STUDENT", "");


 $c_id=$creator;//implementat obtinerea id-ului pentru userul conectat;
$stmt="select username from users where id=:current_id";
$s= oci_parse($c,$stmt);
 oci_bind_by_name($s,':current_id',$c_id);
oci_execute($s);
oci_fetch($s);
//$sender_n_val= oci_result($s, 'USERNAME');
$sender_n_val= $username;
$q = "select * from users where username=:towards";
$cq = oci_parse($c,$q);
oci_bind_by_name($cq, ':towards', $towards_val);
oci_execute($cq);
oci_fetch($cq);
$rec_n_val = oci_result($cq,'USERNAME');
$rec_val = oci_result($cq,'ID');
//echo $rec_val;


$sql= "insert into messages values ( 1,:sender_n, :rec, :rec_n,:msg )";
$compiled = oci_parse($c,$sql);
oci_bind_by_name($compiled, 'sender_n', $sender_n_val);//$_SESSION["username"]
oci_bind_by_name($compiled, ':rec_n', $rec_n_val);
oci_bind_by_name($compiled, ':msg', $msg_val);
oci_bind_by_name($compiled, ':rec', $rec_val);
oci_execute($compiled);
}
?>
