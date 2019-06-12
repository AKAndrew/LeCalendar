<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Friend's name: <input type="text" name="fr">
  <input type="submit">
</form>
</body>
</html>


<?php


   error_reporting(E_ALL);
ini_set('display_errors', 'On');
 
$username = "STUDENT";                  // Use your username
$password = "STUDENT";             // and your password
$database = "localhost/XE";   // and the connect string to connect to your database
$c = oci_connect($username, $password, $database);
 
 
 $c_id=2;//trb sa retinem id-ul userului din sesiunea curenta cum ai facut cu creator in messages.php
 $f_user = $_POST['fr'];
 $c_user = "corci_2";//tot hardcodat trb schimbat tot ca mai sus nu stiu exact cum
 
 $sql="select id from users where username=:f_username";
 $p=oci_parse($c,$sql);
 oci_bind_by_name($p,':f_username',$f_user);
 oci_execute($p);
 oci_fetch($p);
 $id_f=oci_result($p,'ID');
 echo $id_f;
 
 
 $query="insert into friends values (:cid,:cuser,:fid,:fuser,null,null)";
 $qparse=oci_parse($c,$query);
 oci_bind_by_name($qparse,':fuser',$f_user);
 oci_bind_by_name($qparse,':cuser',$c_user);
 oci_bind_by_name($qparse,':fid',$id_f);
 oci_bind_by_name($qparse,':cid',$c_id);
 oci_execute($qparse);
 
 ?>
 
 