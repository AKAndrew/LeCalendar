<?php
$q = $_REQUEST["q"];

echo $q;


        error_reporting(E_ALL);
        ini_set('display_errors', 'On');

        $query = "BEGIN lecalendar_events.get_events(:a_date, :a_succes); END;";


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
        oci_bind_by_name($s,':a_date',$q);
        //oci_bind_by_name($s,':a_password',$password);
        oci_bind_by_name($s,':a_succes',$succes,1);

        $r = oci_execute($s);
        if (!$r) {
            $m = oci_error($s);
            trigger_error('Could not execute statement: '. $m['message'], E_USER_ERROR);
        }

        if($succes){
        $_SESSION["username"]=$username;

        //header('Location: index.php');
        }
        else{
        echo "<span class=error>Incorect data.</span>";
        }
?>
