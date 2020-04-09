<!DOCTYPE html>
<HTML lang=ru>
	
	

	<head>
		<meta charset="UTF-8">
		<title>БОТОУПРАВЛЯТЕЛЬ9000</title>
		<link rel="stylesheet" href="test.css">
	</head>

	<body>
		<?php
			if($_SERVER['REQUEST_METHOD'] == "POST"){
				$f = fopen('botstat.txt', "w");
				if(isset($_POST['ENABLE']))
				{
					fwrite($f, '1');
				}
			    if(isset($_POST['FORWARD']))
				{
					fwrite($f, '2');
				}
				if(isset($_POST['BACKWARD'])){
					fwrite($f, '3');
				}
				if(isset($_POST['RIGHT']))
				{
					fwrite($f, '4');
				}
				if(isset($_POST['LEFT']))
				{
					fwrite($f, '5');
				}
				if(isset($_POST['TO_HOME']))
				{
					fwrite($f, '6');
				}
				fclose($f);
			}
		?>
		


		<center><H1>БОТОУПРАВЛЯТЕЛЬ9000</H1></center>
		

		

		<br>
		<form action="index.php" method="post">
			<table align="center" width="320" height="200" style="font-size: 30px">
				<colgroup>
					<col span="3" style="background:Khaki">
					<col style="background-color:LightCyan">
				</colgroup>
				<tr>
					<th colspan="3">Управление</th>
				</tr>
				<tr>
					<th colspan="3"><input type="submit" name="FORWARD" value="FORWARD"/></th>
				</tr>
				<tr>
					<th><input type="submit" name="LEFT" value="LEFT" /></th>
					<th>_______</th>
					<th><input type="submit" name="RIGHT" value="RIGHT" /></th>
				</tr>
				<tr>
					<th colspan="3"><input type="submit" name="BACKWARD" value="BACKWARD" /></th>
				</tr>
				<tr>
						
				</tr>
			</table>
			
			<center><img src="http://sdwad5.ru:8081" alt="Video from camera" /></center>
			
		    <input type="submit" name="ENABLE" value="ENABLE" />
		    <input type="submit" name="TO_HOME" value="TO_HOME" />
		</form>
		</br>
	</body>
</HTMP>