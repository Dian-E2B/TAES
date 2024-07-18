<?php

require 'application/controllers/add-to-cart.php';

if (isset($_SESSION['is_logged_in'])) {
	if ($_SESSION['user']['type'] == 1) {
		header('Location:admin');
	}
}
$includeSweetAlert = isset($_SESSION['otp']);
?>

<!DOCTYPE html>
<html lang="en">
<?php
// Include SweetAlert CSS
if ($includeSweetAlert) {
	echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">';
}
?>
<!-- header and links -->
<?php include 'sections/header.php'; ?>

<body>

	<!-- Top navigation bar -->
	<?php include 'sections/top-navigation-bar.php'; ?>

	<div class="hero-wrap js-fullheight" style="background-image: url('images/bg/cover.jpg');">
		<div class="container">
			<div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
				<h3 class="v">ThriftSthetic - Yours Truly</h3>
				<h3 class="vr">Since - 2000</h3>
				<div class="col-md-11 ftco-animate text-center">
					<h1>ThriftSthetic</h1>
					<h2><span>Online Store</span></h2>
				</div>
				<div class="mouse">
					<a href="#" class="mouse-icon">
						<div class="mouse-wheel">
							<span class="ion-ios-arrow-down"></span>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="goto-here"></div>

	<section class="ftco-section ftco-product">
		<div class="container">
			<div class="row justify-content-center mb-3 pb-3">
				<div class="col-md-12 heading-section text-center ftco-animate">
					<h1 class="big">New</h1>
					<h2 class="mb-4">New Products</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="product-slider owl-carousel ftco-animate">
						<?php

						try {
							$query = "SELECT * FROM products WHERE QuantityInStock > 0 AND product_status = 1 ORDER BY date_added DESC LIMIT 6";
							$rows = $function->selectAll($query);
							foreach ($rows as $row) { ?>
								<div class="item">
									<div class="product">
										<a href="product-details.php?product_id=<?php echo $row['id']; ?>" class="img-prod">
											<img class="img-fluid" src="images/products/<?php echo $row['photo']; ?>" alt="No Image Available">
											<span class="status">New</span>
										</a>
										<div class="text pt-3 px-3">
											<h3>
												<a href="product-details.php?product_id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a>
											</h3>
											<div class="d-flex">
												<div class="pricing">
													<p class="price">
														<span class="price-sale">PHP
															<?php echo number_format($row['price'], 2); ?></span>
													</p>
												</div>
											</div>
										</div>
									</div>
								</div>

						<?php
							}
						} catch (PDOException $e) {
							echo "There is some problem in connection: " . $e->getMessage();
						}

						?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section bg-light">
		<div class="container">
			<div class="row justify-content-center mb-3 pb-3">
				<div class="col-md-12 heading-section text-center ftco-animate">
					<h1 class="big">Products</h1>
					<h2 class="mb-4">Our Products</h2>
				</div>
			</div>
		</div>
		<div class="container-fluid">

			<?php

			try {

				$query = "SELECT * FROM products WHERE QuantityInStock > 0 AND product_status = 1 ORDER BY id DESC LIMIT 8;";
				$rows = $function->selectAll($query);
				$counter = 0;

				foreach ($rows as $row) { ?>

					<?php
					$name = $row['name'];
					$name = strlen($name) > 25 ? substr($name, 0, 25) . "..." : $name;
					if ($counter % 4 == 0) {
						echo '<div class="row">';
					}
					?>

					<div class="col-sm col-md-6 col-lg ftco-animate">
						<div class="product">

							<a href="product-details.php?product_id=<?php echo $row['id']; ?>" class="img-prod">
								<img class="img-fluid" src="images/products/<?php echo $row['photo'] ?>" alt="No Image Available">
							</a>
							<div class="text py-3 px-3">
								<h3>
									<a href="product-details.php?product_id=<?php echo $row['id']; ?>"><?php echo $name; ?></a>
								</h3>
								<div class="d-flex">
									<div class="pricing">
										<p class="price">
											<span>PHP <?php echo number_format($row['price'], 2); ?></span>
										</p>
									</div>
								</div>
								<hr>
								<p class="bottom-area justify-content-center d-flex">
									<a href="index.php?add-to-cart=<?php echo $row['id']; ?>" class="add-to-cart">
										<span>Add to cart <i class="ion-ios-add ml-1"></i></span>
									</a>
								</p>
							</div>
						</div>
					</div>

			<?php
					if ($counter % 4 == 3) {
						echo '</div>';
					}
					$counter++;
				}
			} catch (PDOException $e) {
				echo "There is some problem in connection: " . $e->getMessage();
			}

			?>

			<div class="row">
				<div class="col text-center">
					<a href="shop.php" class="btn btn-primary py-3 px-5">View More</a>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section testimony-section bg-light">
		<div class="container">
			<div class="row justify-content-center mb-3 pb-3">
				<div class="col-md-12 heading-section text-center ftco-animate">
					<h1 class="big">TEAM</h1>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-8 ftco-animate">
					<div class="row ftco-animate">
						<div class="col-md-12">
							<div class="carousel-testimony owl-carousel ftco-owl">
								<div class="item">
									<div class="testimony-wrap py-4 pb-5">
										<div class="user-img mb-4" style="background-image: url(images/profile/person_1.jpg)">
											<span class="quote d-flex align-items-center justify-content-center">
												<i class="icon-quote-left"></i>
											</span>
										</div>
										<div class="text text-center">
											<p class="name">J&L</p>
											<ul class="ftco-footer-social list-unstyled mt-5">
												<li class="ftco-animate"><a><span class="icon-twitter"></span></a></li>
												<li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
												<li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php
	if ($includeSweetAlert) {
		echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>';
		echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
    title: "Enter OTP",
    input: "number",
    inputAttributes: {
        autocapitalize: "off"
    },
    showCancelButton: false, // Disable cancel button
    confirmButtonText: "Submit",
    allowOutsideClick: false, // Disable clicking outside modal
    showLoaderOnConfirm: true,
    preConfirm: (otp) => {
        // Custom OTP validation logic
        // Example: compare input OTP with session OTP
        if (otp != ' . $_SESSION['otp'] . ') {
            Swal.showValidationMessage(
                "Invalid OTP"
            );
        }
    },
}).then((result) => {
    if (result.isConfirmed) {
        // OTP verification successful
        Swal.fire({
            title: "OTP Verified!",
            icon: "success",
            confirmButtonText: "OK"
        }).then(() => {
            // Destroy session OTP after verification
            $.ajax({
                url: "destroy_session.php",
                type: "POST",
                data: { action: "destroy_otp" },
                success: function(response) {
                    // Redirect or perform actions after destroying session
                    window.location.href = "index.php";
                }
            });
        });
    }
});

            });
        </script>';
	}
	?>

	<!-- footer -->
	<?php include 'sections/footer.php'; ?>
	<!-- loader -->
	<?php include 'sections/loader.php'; ?>
	<!-- scripts -->
	<?php include 'sections/scripts.php'; ?>

	<script>
		//Top navigation bar add/remove class
		//To change the navigation style
		$(document).ready(function() {
			$("#ftco-navbar").removeClass("ftco-navbar-light-2");
		});
	</script>

</body>

</html>