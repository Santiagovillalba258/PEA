<?php
session_start();

// Verifica si el usuario ha iniciado sesión y tiene un role_id definido 
// if (isset($_SESSION['user_id']) && isset($_SESSION['role_id'])) {
   // $role_id = $_SESSION['role_id'];
    
    // Realiza la redirección según el role_id
  //  switch ($role_id) {
     //   case 1:
     //       header('Location: hudalumno.php');
     //       break;
     //   case 2:
     //       header('Location: hudvoluntario.php');
     //       break;
      //  case 3:
     //       header('Location: hudadmin.php');
     //       break;
     //   default:
     //       // Maneja otros roles aquí
    //      break;
 //   }
//}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="autor" content="Lospibes">
  <link rel="shortcut icon" href="favicon.png">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

		<!-- CSS Piola -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
		<link href="css/tiny-slider.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<title>PEA</title>
	</head>

	<body>

		<!-- Empieza header Nav -->
		<nav class="custom-navbar navbar navbar-expand-md navbar-dark bg-dark" aria-label="Furni navigation bar">
    <div class="container">
        <a class="navbar-brand" href="/PEA/home.php">PEA<span>.</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsFurni">
            <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                <li class="nav-item active">
                    <a class="nav-link" href="/PEA/home.php">Home</a>
                </li>
                <li><a class="nav-link" href="/PEA/about.php">Sobre nosotros</a></li>
                <li><a class="nav-link" href="contact.html">Contactanos</a></li>
                <li><a class="nav-link" href="/php-login/index.php">Iniciar sesión</a></li>
            </ul>
            <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                <?php
                if (isset($_SESSION['role_id'])) {
                    $role_id = $_SESSION['role_id'];
                    $redirect_url = "";

                    switch ($role_id) {
                        case 1:
                            $redirect_url = "hudalumno.php";
                            break;
                        case 2:
                            $redirect_url = "hudvoluntario.php";
                            break;
                        case 3:
                            $redirect_url = "hudadmin.php";
                            break;
                        // Agrega más casos según tus necesidades
                        default:
                            // Maneja otros roles aquí
                            break;
                    }

                    if (!empty($redirect_url)) {
                        echo '<li><a class="nav-link" href="/PEA/' . $redirect_url . '"><img src="images/user.svg"></a></li>';
                    }
                }
                ?>
            </ul>
        </div>
    </div>
</nav>
		<!-- Termina Header Nav -->

		<!-- Sección -->
			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Bienvenido al Proyecto<span clsas="d-block"> PEA</span></h1>
								<p class="mb-4">Transformando vidas a través de la educación.</p>
								<p><a href="/php-login/index.php" class="btn btn-secondary me-2">Empezar ahora</a></p>
							</div>
						</div>
						<div class="col-lg-7">
							<div class="hero-img-wrap">
								<img src="images/campanaIcon.png" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
			</div>
		<!-- Sección -->
<br><br>
<hr>	
		<!-- Slider empieza -->
		<div class="testimonial-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 mx-auto text-center">
						<h2 class="section-title">Comentarios</h2>
					</div>
				</div>

				<div class="row justify-content-center">
					<div class="col-lg-12">
						<div class="testimonial-slider-wrap text-center">

							<div id="testimonial-nav">
								<span class="prev" data-controls="prev"><span class="fa fa-chevron-left"></span></span>
								<span class="next" data-controls="next"><span class="fa fa-chevron-right"></span></span>
							</div>

							<div class="testimonial-slider">
								
								<div class="item">
									<div class="row justify-content-center">
										<div class="col-lg-8 mx-auto">

											<div class="testimonial-block text-center">
												<blockquote class="mb-5">
													<p>&ldquo;"Gracias al PEA Vida Abundante, finalmente pude completar mi educación secundaria. Fue un viaje transformador que cambió mi vida por completo. El apoyo de los voluntarios y la accesibilidad del programa hicieron que este logro fuera posible. Estoy enormemente agradecida."&rdquo;</p>
												</blockquote>

												<div class="author-info">
													<div class="author-pic">
														<img src="images/person-1.png" alt="Maria Jones" class="img-fluid">
													</div>
													<h3 class="font-weight-bold">Maria
													</h3>
													
												</div>
											</div>

										</div>
									</div>
								</div> 
								<!-- END item -->

								<div class="item">
									<div class="row justify-content-center">
										<div class="col-lg-8 mx-auto">

											<div class="testimonial-block text-center">
												<blockquote class="mb-5">
													<p>&ldquo;"El PEA Vida Abundante no solo me proporcionó una educación, sino también una comunidad de apoyo inigualable. Fue una experiencia enriquecedora que me ayudó a crecer tanto personal como académicamente. Ahora, estoy lista para enfrentar nuevos desafíos con confianza."&rdquo;</p>
												</blockquote>

												<div class="author-info">
													<div class="author-pic">
														<img src="images/person-1.png" alt="Maria Jones" class="img-fluid">
													</div>
													<h3 class="font-weight-bold">Claudia</h3>
													
												</div>
											</div>

										</div>
									</div>
								</div> 
								<!-- END item -->

								<div class="item">
									<div class="row justify-content-center">
										<div class="col-lg-8 mx-auto">

											<div class="testimonial-block text-center">
												<blockquote class="mb-5">
													<p>&ldquo;"El PEA Vida Abundante no solo me dio una segunda oportunidad educativa, sino que también me ayudó a descubrir mi verdadero potencial. Gracias a este programa, ahora tengo las herramientas para perseguir mis sueños y construir un futuro mejor para mí y mi familia."&rdquo;</p>
												</blockquote>

												<div class="author-info">
													<div class="author-pic">
														<img src="images/person-1.png" alt="Maria Jones" class="img-fluid">
													</div>
													<h3 class="font-weight-bold">Camila</h3>
													
												</div>
											</div>

										</div>
									</div>
								</div> 
								<!-- END item -->

							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Slider Termina -->


		<!-- Footer empieza -->
		<footer class="footer-section">
			<div class="container relative">



				<div class="row">
					<div class="col-lg-8">
						<div class="subscription-form">
							<h3 class="d-flex align-items-center"><span class="me-1"><img src="images/envelope-outline.svg" alt="Image" class="img-fluid"></span><span>Suscribite al boletin informativo</span></h3>

							<form action="#" class="row g-3">
								<div class="col-auto">
									<input type="text" class="form-control" placeholder="Enter your name">
								</div>
								<div class="col-auto">
									<input type="email" class="form-control" placeholder="Enter your email">
								</div>
								<div class="col-auto">
									<button class="btn btn-primary">
										<span class="fa fa-paper-plane"></span>
									</button>
								</div>
							</form>

						</div>
					</div>
				</div>

				<div class="row g-5 mb-5">
					<div class="col-lg-4">
						<div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">PEA<span>.</span></a></div>
						<p class="mb-4">Somos el equipo detrás del PEA Vida Abundante, un programa educativo sin fines de lucro para adultos. En funcionamiento durante 8 años, hemos impactado positivamente a unos 900 estudiantes y 150 voluntarios. Estamos transitando hacia un sistema de expediente electrónico para ser más eficientes y sostenibles. ¡Seguimos transformando vidas!</p>

						<ul class="list-unstyled custom-social">
							<li><a href="#"><span class="fa fa-brands fa-facebook-f"></span></a></li>
	
							<li><a href="#"><span class="fa fa-brands fa-instagram"></span></a></li>
		
						</ul>
					</div>

					<div class="col-lg-8">
						<div class="row links-wrap">
							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Sobre nosotros</a></li>


									<li><a href="#">Contactanos</a></li>
								</ul>
							</div>


							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
	
									<li><a href="#">Nuestro equipo</a></li>
	
									<li><a href="#">Politica de privacidad</a></li>
								</ul>
							</div>


						</div>
					</div>

				</div>

				<div class="border-top copyright">
					<div class="row pt-4">
						<div class="col-lg-6">
							<p class="mb-2 text-center text-lg-start">Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. &mdash; 
            </p>
						</div>

						<div class="col-lg-6 text-center text-lg-end">
							<ul class="list-unstyled d-inline-flex ms-auto">
								<li class="me-4"><a href="#">Terms &amp; Conditions</a></li>
								<li><a href="#">Privacy Policy</a></li>
							</ul>
						</div>

					</div>
				</div>

			</div>
		</footer>
		<!-- Footer termina -->	


		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/tiny-slider.js"></script>
		<script src="js/custom.js"></script>
	</body>

</html>
