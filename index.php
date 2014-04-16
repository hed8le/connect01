<!DOCTYPE html>
<html>

<head>
	<title>...</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
	
	<?php  
		$server = 'mysql:dbname=sid;host=localhost';
		$user = 'root';
		$pw = 'root';

		try {
	/******* 1.Verbindung zur DB sid ***************************/
			$db = new PDO($server, $user, $pw);
		  // $db->query("SET NAMES 'utf8'");
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	/******* 2.Daten abfragen ***************************/
			$query=$db->query('SELECT * FROM sid');
			echo "<table border=1><tr><th width=50>ID</th><th width=50>SID</th></tr>";
			foreach ($query as $row) {
				echo "<tr>";
				echo "<td>" . $row["id"] . "</td><td>" . $row['sid'] . "</td>";
				echo "</tr>";
			}		
			$db=null;
		}
		catch(PDOException $e) {
			error_log($e->getMessage());
			die("Die Datenbankverbindung tut nicht!");
		}
	?>

</body>

</html>