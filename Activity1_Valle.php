<?php

	  $students = array( 
	  	 	array("Sandru Valle", "Talomo, D.C.", 31, 25),
            array("Aljon Omandac", "Puan, D.C.", 5, 18),
            array("Martin Calunsag", "Mintal, D.C.", 24, 23),
            array("Manelyn Caliag", "Ecoland, D.C.", 17, 24),
            array("Jobelleen Condez", "Tugbok, D.C.", 17, 20),
            array("Rosalito Pinto", "Ecoland, D.C.", 3, 25),
            array("Lester Corilla", "Matina, D.C.", 30, 20),
            array("Vina Velarde", "Bago Aplaya, D.C.", 23, 20),
            array("Maejen Morena", "Ecoland, D.C.", 30, 19),
            array("Kevin Nazareno", "Tibungco, D.C.", 16, 19)
            );
	  
	  $arraycount = count($students);

echo "<html><body>
	<table border='1' align='center' valign='middle'>
		<tr>
			<td colspan='5' align='center' height='30px'><b>LIST OF IT36 STUDENT<b></td>
		</tr>
		<tr align='center'>
			<th>NAME</th>
			<th>ADDRESS</th>
			<th>BIRTH DATE</th>
			<th>AGE</th>
			<th>TOTAL</th>
		</tr>";
		 for($i = 0; $i < $arraycount; $i++){
			echo '<tr>';
				echo '<td>'.$students[$i][0].'</td>';
				echo '<td>'.$students[$i][1].'</td>';
				echo '<td align="center">'.$students[$i][2].'</td>';
				echo '<td align="center">'.$students[$i][3].'</td>';
				echo '<td align="center">';
				echo $students[$i][2] + $students[$i][3];
				echo '</td>';
			echo '<tr>';
			}
	echo "</table></body></html>"

?>