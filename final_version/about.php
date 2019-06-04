<?php
session_start();

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>About - leCalendar</title>
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

<div class="about-body">
	<div class="about-content">
		<a href="https://docs.google.com/document/d/1oHSS148qwFNR1Nb0C8osAib4_fL9t1h5ik3boImnvsg/edit#heading=h.q3a6qkl2d8a1">
		<h3>Muler (Multi Calendar Monitor)</h3>
		<p>Se doreste implementarea unei aplicatii si a unui serviciu Web (eventual, a unui API REST) ce monitorizeaza in timp-real calendarele disponibile online (e.g., Google Calendar) ori documentele in format iCalendar ale mai multor utilizatori -- posibili "prieteni" avand conturi in cadrul unor aplicatii sociale populare -- ale caror coordonate geografice sunt cunoscute. Se vor oferi sugestii (locatie potrivita, perioada de timp la nivel de saptamana, zi, ora etc.) privind posibile intrevederi -- e.g., intalniri de lucru la proiect, sedinte de yoga, amuzamente in grup prin oras, preluarea rudelor colegilor de la gradinita/sanatoriu,...</p></a>
		<ul><h4>Resurse suplimentare:</h4>
			<li><a href="https://tools.ietf.org/html/rfc5545">https://tools.ietf.org/html/rfc5545</a></li>
			<li><a href="http://www.programmableweb.com/apis/directory/1?apicat=Social">http://www.programmableweb.com/apis/directory/1?apicat=Social</a></li>
		</ul>
		<p>Persoane alocate: 3<br/>
      <table border='1'>
        <tr>
          <th style="padding: 10px;">Corban Cristian</th>
          <th style="padding: 10px;">Tocu Andrei</th>
          <th style="padding: 10px;">Zbant Andrei</th>
        </tr>
        </p>
	</div>
</div>

<footer>
	<div class="footer-content">
		&copy; Faculty of Computer Science<br/><sub>est. MMXIX</sub><br/><sup>Iași, Romania</sup>
	</div>
</footer>

</body>

</html>
