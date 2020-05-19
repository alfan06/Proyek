<?php include("includes/config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Gallery</title>
	
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/custom.css" rel="stylesheet">

	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	</head>
<body>
	<div class="container body">
			<h1>Informasi foto</h1>
			<div class="row">
				<div class="col-md-8">
					<img src="<?= base_url() ?>/uploads/foto/<?= $d['foto'] ?>" class="img-responsive">
				</div>
				<div class="col-md-4">
					<table class="table">
						<tr>
							<th width="120">Nama File</th>
							<td><? $d->foto ?></td>
						</tr>
					</table>
				</div>
			</div>
	</div>
	
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
</body>
</html>