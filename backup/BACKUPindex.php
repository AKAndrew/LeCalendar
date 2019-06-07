<?php
session_start();

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Home - leCalendar</title>
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

	<div class="controller">
		<div class="controller-content">
			<div class="controller-left-btn"><</div>
			<div class="controller-display">
				<select>
					<option value="" disabled selected hidden>Month</option>
					<option value="January">January</option>
					<option value="February">February</option>
					<option value="March">March</option>
					<option value="April">April</option>
	  				<option value="May">May</option>
					<option value="June">June</option>
					<option value="July">July</option>
					<option value="August">August</option>
	  				<option value="September">September</option>
					<option value="October">October</option>
					<option value="November">November</option>
					<option value="December">December</option>
				</select>
			</div>
			<div class="controller-right-btn">></div>
		</div>

		<div class="controller-content">
			<div class="controller-left-btn"><</div>
			<div class="controller-display">
				<select>
					<option value="" disabled selected hidden>Year</option>
					<option value="1989">1989</option>
					<option value="1996">1996</option>
					<option value="2003">2003</option>
					<option value="2010">2010</option>
	  				<option value="2019">2019</option>
					<option value="2020">2020</option>
					<option value="2100">2100</option>
					<option value="3000">3000</option>
	  				<option value="9999">9999</option>
				</select>
			</div>
			<div class="controller-right-btn">></div>
		</div>
	</div>

<div class="calendar-body">
	<div class="calendar-content">
		<div class="calendar-content-weekdays">
			<div>Mon</div>
			<div>Tue</div>
			<div>Wen</div>
			<div>Thu</div>
			<div>Fri</div>
      		<div class="calendar-content-weekends">Sat</div>
			<div class="calendar-content-weekends">Sun</div>
		</div>

		<div class="calendar-content-days" onclick="location.href='march.html';">
		    <div class="not-in-current-month">25</div>
		  	<div class="not-in-current-month">26</div>
		  	<div class="not-in-current-month">27</div>
		  	<div class="not-in-current-month">28</div>
			<div>1</div>
			<div>2</div>
			<div>3</div>

			<div>4</div>
			<div>5</div>
			<div>6</div>
			<div>7</div>
			<div>8</div>
			<div>9</div>
			<div>10</div>

			<div>11</div>
			<div>12</div>
			<div>13</div>
			<div>14</div>
			<div>15</div>
			<div>16</div>
			<div>17</div>

			<div>18</div>
			<div>19</div>
			<div>20</div>
			<div class="current-day">
				<a href="currentday.html">21</a>
			</div>
			<div>22</div>
			<div>23</div>
			<div>24</div>

			<div>25</div>
			<div>26</div>
			<div>27</div>
			<div>28</div>
			<div>29</div>
			<div>30</div>
			<div>31</div>
		    <div class="not-in-current-month">1</div>
		    <div class="not-in-current-month">2</div>
		    <div class="not-in-current-month">3</div>
		    <div class="not-in-current-month">4</div>
		    <div class="not-in-current-month">5</div>
		    <div class="not-in-current-month">6</div>
		    <div class="not-in-current-month">7</div>
		</div>
	</div>
	<!--<div class="calendar-content">
		<div class="calendar-content-weekdays">
			<div>Mo</div>
			<div>Tu</div>
			<div>We</div>
			<div>Th</div>
			<div>Fr</div>
			<div>Sa</div>
			<div>Su</div>
		</div>
		<div class="calendar-content-days">
			<div>r1c1</div>
			<div>r1c2</div>
			<div>r1c3</div>
			<div>r1c4</div>
			<div>r1c5</div>
			<div>r1c6</div>
			<div>r1c7</div>

			<div>r2c1</div>
			<div>r2c2</div>
			<div>r2c3</div>
			<div>r2c4</div>
			<div>r2c5</div>
			<div>r2c6</div>
			<div>r2c7</div>

			<div>r3c1</div>
			<div>r3c2</div>
			<div>r3c3</div>
			<div>r3c4</div>
			<div>r3c5</div>
			<div>r3c6</div>
			<div>r3c7</div>

			<div>r4c1</div>
			<div>r4c2</div>
			<div>r4c3</div>
			<div>r4c4</div>
			<div>r4c5</div>
			<div>r4c6</div>
			<div>r4c7</div>

			<div>r5c1</div>
			<div>r5c2</div>
			<div>r5c3</div>
			<div>r5c4</div>
			<div>r5c5</div>
			<div>r5c6</div>
			<div>r5c7</div>

			<div>r6c1</div>
			<div>r6c2</div>
			<div>r6c3</div>
			<div>r6c4</div>
			<div>r6c5</div>
			<div>r6c6</div>
			<div>r6c7</div>
		</div>
	</div>
	<div class="calendar-content">
		<div class="calendar-content-weekdays">
			<div>Mo</div>
			<div>Tu</div>
			<div>We</div>
			<div>Th</div>
			<div>Fr</div>
			<div>Sa</div>
			<div>Su</div>
		</div>
		<div class="calendar-content-days">
			<div>r1c1</div>
			<div>r1c2</div>
			<div>r1c3</div>
			<div>r1c4</div>
			<div>r1c5</div>
			<div>r1c6</div>
			<div>r1c7</div>

			<div>r2c1</div>
			<div>r2c2</div>
			<div>r2c3</div>
			<div>r2c4</div>
			<div>r2c5</div>
			<div>r2c6</div>
			<div>r2c7</div>

			<div>r3c1</div>
			<div>r3c2</div>
			<div>r3c3</div>
			<div>r3c4</div>
			<div>r3c5</div>
			<div>r3c6</div>
			<div>r3c7</div>

			<div>r4c1</div>
			<div>r4c2</div>
			<div>r4c3</div>
			<div>r4c4</div>
			<div>r4c5</div>
			<div>r4c6</div>
			<div>r4c7</div>

			<div>r5c1</div>
			<div>r5c2</div>
			<div>r5c3</div>
			<div>r5c4</div>
			<div>r5c5</div>
			<div>r5c6</div>
			<div>r5c7</div>

			<div>r6c1</div>
			<div>r6c2</div>
			<div>r6c3</div>
			<div>r6c4</div>
			<div>r6c5</div>
			<div>r6c6</div>
			<div>r6c7</div>
		</div>
	</div>-->
</div>

<footer>
	<div class="footer-content">
		&copy; Faculty of Computer Science<br/><sub>est. MMXIX</sub><br/><sup>Iași, Romania</sup>
	</div>
</footer>

</body>

</html>
