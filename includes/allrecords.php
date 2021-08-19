<table   class="t01">
		<tr>
		<th>Prenom</th>
		<th>Nom</th>
		<th>Titre</th>
		<th>Pays</th>
		<th>Formation</th>
		<th>Niveau</th>
		<th>Age</th>
		<th>E-mail</th>
	</tr>
			<?php
			require('config.inn.php');
			$db = new db;
			$result=$db->getRecords();
			while($row=mysqli_fetch_array($result)){
				echo "<tr>
					<td>".$row['prenomUsers']."</td>
		            <td>".$row['nomUsers']."</td>
		            <td>".$row['titreUsers']."</td>
		            <td>".$row['paysUsers']."</td>
		            <td>".$row['formartionUsers']."</td>
		            <td>".$row['niveauUsers']."</td>
		            <td>".$row['emailUsers']."</td>
				</tr>";
			}
			$db->closeCon();
			?>
</table>