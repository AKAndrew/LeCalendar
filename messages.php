<?php
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

$username = "STUDENT";
$password = "STUDENT";
$database = "";
$c = oci_connect($username, $password, $database);


 $query="select sender_name,text from messages where receiver=2";

$c = oci_connect($username, $password, $database);
if (!$c) {
    $m = oci_error();
    trigger_error('Could not connect to database: '. $m['message'], E_USER_ERROR);
}

$s = oci_parse($c, $query);
if (!$s) {
    $m = oci_error($c);
    trigger_error('Could not parse statement: '. $m['message'], E_USER_ERROR);
}
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
</br></br>
<html>
<body>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Name: <input type="text" name="fname">
  Msg: <input type="text" name="testmsg">
  <input type="submit">
  <input type="submit" name="submit" value="Back"formaction="index.php">
</form>
</body>
</html>
<?php
if(!empty($_POST['fname'])&&!empty($_POST['testmsg'])){
  $towards_val = $_POST['fname'];
  $msg_val = $_POST['testmsg'];
error_reporting(E_ALL);
ini_set('display_errors', 'On');

$username = "STUDENT";
$password = "STUDENT";
$database = "";
$c = oci_connect($username, $password, $database);


 $c_id=$creator;//implementat obtinerea id-ului pentru userul conectat;
$stmt="select username from users where id=:current_id";
$s= oci_parse($c,$stmt);
 oci_bind_by_name($s,':current_id',$c_id);
oci_execute($s);
oci_fetch($s);
$sender_n_val= oci_result($s, 'USERNAME');
$q = "select * from users where username=:towards";
$cq = oci_parse($c,$q);
oci_bind_by_name($cq, ':towards', $towards_val);
oci_execute($cq);
oci_fetch($cq);
$rec_n_val = oci_result($cq,'USERNAME');
$rec_val = oci_result($cq,'ID');
echo $rec_val;


$sql= "insert into messages values ( 1,:sender_n, :rec, :rec_n,:msg )";
$compiled = oci_parse($c,$sql);
oci_bind_by_name($compiled, 'sender_n', $sender_n_val);
oci_bind_by_name($compiled, ':rec_n', $rec_n_val);
oci_bind_by_name($compiled, ':msg', $msg_val);
oci_bind_by_name($compiled, ':rec', $rec_val);
oci_execute($compiled);
}
?>
