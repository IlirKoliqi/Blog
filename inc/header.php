<?php
    require_once "admin/autoloader.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<meta name="language" content="English">
  	<meta name="description" content="It is a website about education">
  	<meta name="keywords" content="blog,cms blog">
  	<link rel="stylesheet" href="admin/font-awesome-4.5.0/css/font-awesome.css">	
  	<link rel="stylesheet" href="admin/css/bootstrap.min.css">
  	<link rel="stylesheet" href="admin/css/style.css">
  	<title>Blog</title>
</head>
<body>
	<!-- START HERE -->
	<nav class="navbar navbar-expand-sm bg-warning navbar-dark fixed-top">
		<div class="container">
		<a href="index.php" class="navbar-brand">Blog</a>
		<button class="navbar-toggler" data-toggle="collapse" data-target="#mainNav">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="navbar-collapse collapse" id="mainNav">
			<ul class="navbar-nav ml-auto">
			<li class="nav-item">
				<a href="index.php" class="nav-link active">Home</a>
			</li>
			<li class="nav-item">
				<a href="about.php" class="nav-link">About</a>
			</li>
			<li class="nav-item">
				<a href="contact.php" class="nav-link">Contact</a>
			</li>
			</ul>

		</div>
		</div>
	</nav>
	<!-- SLIDER WITH CAPTIONS -->
	<section class="container mt-5">
		<section class="row">
			<section class="col-md-12 slider-images">
			<div id="slider" class="carousel slide mt-3  mb-1" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#slider" class="active" data-slide-to="0"></li>
					<li data-target="#slider" data-slide-to="1"></li>
					<li data-target="#slider" data-slide-to="2"></li>
					<li data-target="#slider" data-slide-to="3"></li>
				</ol>	
				<div class="carousel-inner">
					<div class="carousel-item active">
					<img class="img-fluid" src="admin/images/slideshow/01.jpg" alt="First Slide">
					<div class="carousel-caption">
						<h3>Titulli</h3>
						<p>Pershkrimi i imazhit</p>
					</div>
					</div>
					<div class="carousel-item">
					<img class="img-fluid"src="admin/images/slideshow/02.jpg" alt="Second Slide">
					<div class="carousel-caption">
						<h3>Titulli2</h3>
						<p>Pershkrimi i imazhit 2</p>
					</div>
					</div>
					<div class="carousel-item">
						<img class="img-fluid" src="admin/images/slideshow/03.jpg" alt="Third Slide">
						<div class="carousel-caption">
							<h3>Titulli 3</h3>
							<p>Pershkrimi i imazhit 3</p>
						</div>
					</div>
					<div class="carousel-item">
						<img class="img-fluid" src="admin/images/slideshow/04.jpg" alt="Third Slide">
						<div class="carousel-caption">
							<h3>Titulli 4</h3>
							<p>Pershkrimi i imazhit 4</p>
						</div>
					</div>
				</div>
				<a href="#slider" class="carousel-control-prev" data-slide="prev">
					<span class="carousel-control-prev-icon"></span>
				</a>
				<a href="#slider" class="carousel-control-next" data-slide="next">
					<span class="carousel-control-next-icon"></span>
				</a>
			</div>
			</section>
		</section>
	</section>