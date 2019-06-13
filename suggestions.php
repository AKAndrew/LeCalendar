<?php


$username = "STUDENT";                  // Use your username
$password = "STUDENT";             // and your password
$database = "localhost/XE";   // and the connect string to connect to your database
$c = oci_connect($username, $password, $database);
 
 $c_id=1;//to be done:))
 
 //prieteni sugerati pe baza locatiei similare;
 $sql="select city from users where id=:cid";
 $p=oci_parse($c,$sql);
 oci_bind_by_name($p,':cid',$c_id);
 oci_execute($p);
 oci_fetch($p);
 $id_f=oci_result($p,'CITY');
 echo $id_f;
 
 
 
 
 
 $query="select username from users where city=:oras";
 
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
oci_bind_by_name($s,':oras',$id_f);
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
