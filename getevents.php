<?php
$q = $_REQUEST["q"];
session_start();
$_SESSION["q"]=$q;
echo $q;


        error_reporting(E_ALL);
        ini_set('display_errors', 'On');

        $query = "select to_char(start_hour,'HH24:MI')\"Start\",to_char(end_hour,'HH24:MI')\"End\", location, title, description from events where to_char(start_date,'yyyy-mm-dd') = '" . $q . "'";


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
        //$password=strtoupper(md5($password));
        //oci_bind_by_name($s,':a_date',$q);
        //oci_bind_by_name($s,':a_password',$password);
        //oci_bind_by_name($s,':a_succes',$succes,1);

        $r = oci_execute($s);

        if (!$r) {
            $m = oci_error($s);
            trigger_error('Could not execute statement: '. $m['message'], E_USER_ERROR);
        }
/*
        echo "<table border='1'>\n";
        $ncols = oci_num_fields($r);
        echo"<tr>\n";
        for ($i=1;i<=$ncols;$i++) {
          $colname = oci_field_name($s,$i);
          echo "  <th><b>" . htmlspecialchars($colname,ENT_QUOTES|ENT_SUBSTITUTE)."</b></th>\n";
        }
        echo "</tr>\n";
        while (($row = oci_fetch_array($s, OCI_ASSOC+OCI_RETURN_NULLS)) !=fasle) {
          echo"<tr>\n";
          foreach ($row as $item) {
            echo "<td>";
            echo $item!=null?htmlspecialchars($item,ENT_QUOTES|ENT_SUBSTITUTE):"&nbsp";
          }
          echo "</tr>\n";
        }
        echo "</table>\n";
*/

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
/*
        if($succes){
        $_SESSION["username"]=$username;

        //header('Location: index.php');
      }
        else{
        echo "<span class=error>Incorect data.</span>";
      }*/
?>


<form method="post" action="addevent.php<?php //echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<!--<span class="error"><?php// echo $usernameErr;?></span>
<input type="email" name="username" placeholder="E-mail" value="<?php// echo $friendname;?>">-->
</br></br><input type="submit" name="submit" value="Add event">

</form>
