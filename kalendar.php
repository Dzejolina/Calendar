<?php

	$days_of_week = array('Nedelja', 'Ponedeljak', 'Utorak', 'Sreda', 'Cetvrtak', 'Petak', 'Subota');

	$day = date('d');
	$month = date('m');
	$year = date('Y');

	$mktoday = mktime(0, 0, 0, $month, $day, $year);
	$first_day = mktime(0, 0, 0, $month, 1, $year);

	$today = date('D', $mktoday);
	$first_day_of_week = date('D', $first_day);

	#public function makeCal() {

		// Promena dana u zavisnosti od datuma
		switch ($today) {
			case "Sun" :
				$the_day = $days_of_week[0];
				break;

			case "Mon" :
				$the_day = $days_of_week[1];
				break;

			case "Tue" :
				$the_day = $days_of_week[2];
				break;

			case "Wed" :
				$the_day = $days_of_week[3];
				break;

			case "Thu" :
				$the_day = $days_of_week[4];
				break;

			case "Fri" :
				$the_day = $days_of_week[5];
				break;

			case "Sat" :
				$the_day = $days_of_week[6];
				break;
		}

		// Promena dana
		switch ($first_day_of_week) {
			case "Sun" :
				$blank = 0;
				break;

			case "Mon" :
				$blank = 1;
				break;

			case "Tue" :
				$blank = 2;
				break;

			case "Wed" :
				$blank = 3;
				break;

			case "Thu" :
				$blank = 4;
				break;

			case "Fri" :
				$blank = 5;
				break;

			case "Sat" :
				$blank = 6;
				break;
		}

		// odstampati za svaki dan u sedmici table cell i upisati
		// ime dana, plus provera da li je to danasnji dan u kom
		// slucaju ce naziv biti boldovan
		$days_in_month = cal_days_in_month(0, $month, $year);
		echo "<table border=6 width=394>";
		echo "<tr><th colspan=60>" . $the_day . " " . $day . "." . $month . "." . $year . ".</th></tr>";
		echo "<tr>";
		foreach($days_of_week as $dof) {
			if($dof == $the_day) {
				$check = true;
			} else {
				$check = false;
			}
			echo "<td width=62>";
			if($check == true) {
				echo '<b>';
			}
			echo $dof;
			if($check == true) {
				echo '</b>';
			}
			echo "</td>";
		}
		echo "</tr>";

		// KOMENTAR
		$day_count = 1;
		echo "<tr>";
		// prazni dani ako ih ima
		while($blank > 0) {
			echo "<td></td>";
			$blank = $blank - 1;
			$day_count++;
		}
		// dani u kalendaru
		$day_num = 1;
		while ($day_num<=$days_in_month) {
			echo "<td>";
			if($day_num == $day) { echo '<b>'; }
			echo $day_num;
			if($day_num == $day) { echo '</b>'; }
			echo "</td>";
			$day_num++;
			$day_count++;

			if ($day_count>7) {
				echo "</tr><tr>";
				$day_count=1;
			}
		}
		// ostali prazni
		while ($day_count > 1 && $day_count <=7) {
			echo "<td></td>";
			$day_count++;
		}

		echo "</tr></table>";
