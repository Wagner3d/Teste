<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php echo '<title>'.$pagecfg['Title'].'</title>'; ?>

		<!-- Import CSS -->
		<!-- Bootstrap core CSS -->
		<link href="/application/third_party/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">

		<!-- Import JS -->
		<!-- Import Jquery JSS -->
		<script src="/application/third_party/dataTable/js/jquery-3.3.1.js"></script>
		<script src="/application/third_party/bootstrap/js/bootstrap.min.js"></script>

		<!-- Script de correcao Internet Explorer -->
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<style>
			div.dataTables_length select { width: auto; display: inline-block; height: auto; }
		</style>
</head>

<body>
	<div class="container">
		<!-- abrindo Div para a pagina principal, ela é fechada no footer -->

		<header class="blog-header py-3">
			<div class="row flex-nowrap justify-content-between align-items-center">
				<div class="col-4 pt-1">

				</div>
				<div class="col-4 text-center">
					<a class="blog-header-logo text-dark" href="#">Sistema Genérico</a>
				</div>
				<div class="col-4 d-flex justify-content-end align-items-center">
					<a class="text-muted" href="" aria-label="Search">
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24" focusable="false">
							<title>Search</title>
							<circle cx="10.5" cy="10.5" r="7.5" />
							<path d="M21 21l-5.2-5.2" />
						</svg>
					</a>
					<a class="btn btn-sm btn-outline-secondary" href="#">Sign up</a>
				</div>
			</div>
		</header>