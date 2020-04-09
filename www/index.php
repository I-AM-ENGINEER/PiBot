<!DOCTYPE html>
<html lang=ru>



	<head>
		<meta charset="UTF-8">
		<title>БОТОУПРАВЛЯТЕЛЬ9000</title>
		<!-- Bootstrap links -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="mainStyle.css"/>
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




		<div class="container-fluid">
			<div class="row p-0">
				<div class="col-sm-12 col-md-8 col-lg-7 p-0">
					<img class="videoCamera" src="http://sdwad5.ru:8081" alt="Video from camera" />
				</div>
				<div class="col bg-dark">
					<div class="row">
						<div class="col-xl-2 col-lg-3 col-md-5 col-sm-12 border-right">
							<form action="index.php" method="post">
									<div class="row">
										<div class="col col-md-12 col-lg-12 p-1">
											<button class="btn btn-light btn-block" type="submit" name="FORWARD"><img class="img-fluid forward" src="src/arrow.png"/></button>
										</div>
										<div class="col col-md-12 col-lg-12 p-1">
											<button class="btn btn-light btn-block" type="submit" name="RIGHT"><img class="img-fluid right" src="src/arrow.png"/></button>
										</div>
										<div class="col col-md-12 col-lg-12 p-1">
											<button class="btn btn-light btn-block" type="submit" name="LEFT"><img class="img-fluid left" src="src/arrow.png"/></button>
										</div>
										<div class="col col-md-12 col-lg-12 p-1">
											<button class="btn btn-light btn-block" type="submit" name="BACKWARD"><img class="img-fluid backward" src="src/arrow.png"/></button>
										</div>
									</div>

							  <button class="col-12 col-lg btn btn-success mb-1 btn-block" type="submit" name="ENABLE">ENABLE</button>
							  <button class="col-12 col-lg btn btn-secondary mb-1 btn-block" type="submit" name="TO_HOME">TO_HOME</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	</body>
</html>
