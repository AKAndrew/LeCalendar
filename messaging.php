//message sending
//cu un form preluam un string, si inseram in tabela messages un string catre un id al altui user preluat printr-un select verificand numele dorit
<?php
 
 error_reporting(E_ALL);
ini_set('display_errors', 'On');
 
$username = "STUDENT";                  // Use your username
$password = "STUDENT";             // and your password
$database = "localhost/XE";   // and the connect string to connect to your database
$c = oci_connect($username, $password, $database);
 
 
 $c_id=1;//de implementat obtinerea id-ului pentru userul conectat;
$stmt="select username from users where id=:current_id";
$s= oci_parse($c,$stmt);
 oci_bind_by_name($s,':current_id',$c_id);

oci_execute($s);
oci_fetch($s);
$sender_n_val= oci_result($s, 'USERNAME');

$q = "select * from users where username=:towards";
$cq = oci_parse($c,$q);


$towards_val = $_POST['fname'];
$msg_val = $_POST['testmsg'];
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
  
?>