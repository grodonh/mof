<!DOCTYPE HTML>
<html>
	<head>
		<title>Material Order Form</title>
	</head>
	<script type="text/javascript">
		// <![CDATA[
		<?php
			$konfig = parse_ini_file("mof.ini", true);
			foreach($konfig as $key_outer => $value_outer) {
				echo "var " . $key_outer . " = {\n";
				foreach($konfig[$key_outer] as $key_inner => $value_inner) {
					echo "\"" . $key_inner . "\": \"" . $value_inner . "\",\n";
				}
				echo "}\n";
			}
		?>
		var i=1;

		function addText(size, name, value)
		{
			var td = document.createElement('td');
			var input = document.createElement('input');
			input.type = "text";
			input.size = size;
			input.name = name;
			input.value = value;
			td.appendChild(input);
			return(td);
		}

		function addSelect(name, daten)
		{
			var td = document.createElement('td');
			var input = document.createElement("select");
			input.name = name;
			for (wert in daten) {
				var option = document.createElement('option');
				option.value = wert;
				option.text = daten[wert];
				input.appendChild(option);
			}
			td.appendChild(input);
			return(td);
		}

		function addCheck(name)
		{
			var td = document.createElement('td');
			var input = document.createElement('input');
			input.type = 'checkbox';
			input.name = name;
			td.appendChild(input); return(td);
		}

		function addRow(tableId)
		{
			var tb = document.getElementById(tableId) .getElementsByTagName('tbody')[0];
			var newTr = document.createElement('tr');
			newTr.id = "tr"+i;

			td = addText(1, "lfdnr" + i, i);
			newTr.appendChild(td);

			td = addText(1, "apos" + i, "");
			newTr.appendChild(td);

			td = addText(20, "menge" + i, "");
			newTr.appendChild(td);

			td = addText(20, "lieferant" + i, "");
			newTr.appendChild(td);

			td = addText(20, "anr" + i, "");
			newTr.appendChild(td);

			td = addSelect("ladr" + i, lieferorte);
			newTr.appendChild(td);

			td = addSelect("kontakt" + i, personen);
			newTr.appendChild(td);

			td = addSelect("lieferzeit" + i, lieferzeiten);
			newTr.appendChild(td);

			td = addSelect("liefertermin" + i, liefertermine);
			newTr.appendChild(td);

			td = addText(20, "link" + i, "");
			newTr.appendChild(td);

			td = addCheck("bestellt" + i);
			newTr.appendChild(td);

			td = addCheck("geliefert" + i);
			newTr.appendChild(td);

			tb.appendChild(newTr);

			document.getElementsByName("lfdnr" + i)[0].readOnly = true;
			i++;
		}
		// ]]>
	</script>
	<body>
		<h1>Material Order Form</h1>
		<form method="GET" action="index.php">
			<table>
				<tr>
					<td>Kundennummer:</td>
					<td><input type="text" name="knr"/></td>
				</tr>
				<tr>
					<td>Projektnummer:</td>
					<td><input type="text" name="pnr"/></td>
				</tr>
				<tr>
					<td>Projektmanager:</td>
					<td><input type="text" name="pmgr"/></td>
				</tr>
			</table>
			<br/><br/><br/>
			<table id="mot" border=1>
				<thead>
					<th>lfd. Nr.</th>
					<th>Angebots-Position</th>
					<th>Menge</th>
					<th>Lieferant</th>
					<th>Artikelnummer</th>
					<th>Lieferadresse</th>
					<th>Kontakt vor Ort</th>
					<th>Lieferzeit</th>
					<th>Liefertermin</th>
					<th>Link</th>
					<th>Bestellt</th>
					<th>Geliefert</th>
				</thead>
				<tbody>
					<script type="text/javascript">
						addRow('mot');
					</script>
				</tbody>
			</table>
			<br/>
			<input type="submit" value="Speichern">
		</form>
		<br/>
		<button onclick="addRow('mot');">Zeile hinzufügen</button> //Kommentar
	</body>
</html>