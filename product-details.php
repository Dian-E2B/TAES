<?php require 'application/controllers/product-details.php'; ?>

<!DOCTYPE html>
<html lang="en">

<!-- header and links -->
<?php include 'sections/header.php'; ?>

<body>

  <!-- Top navigation bar -->
  <?php include 'sections/top-navigation-bar.php'; ?>

  <section class="ftco-section bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 mb-5 ftco-animate">
          <div>
            <img src="images/products/<?php echo $row['photo']; ?>" class="img-fluid" alt="Colorlib Template">
          </div>
        </div>
        <div class="col-lg-6 product-details pl-md-5 ftco-animate">
          <form method="post">
            <h3><?php echo $row['name']; ?></h3>
            <p class="price"><span>PHP <?php echo number_format($row['price'], 2); ?></span></p>
            <p><?php echo $row['description']; ?></p>

            <a href="index.php?add-to-cart=<?php echo $row['id']; ?>" class="add-to-cart btn btn-primary py-3 px-5">
              <span>Add to cart <i class="ion-ios-add ml-1"></i></span>
            </a>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- footer -->
  <?php include 'sections/footer.php'; ?>
  <!-- loader -->
  <?php include 'sections/loader.php'; ?>
  <!-- scripts -->
  <?php include 'sections/scripts.php'; ?>

  <script>
    $(document).ready(function() {

      var quantitiy = 0;
      $('.quantity-right-plus').click(function(e) {

        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());

        // If is not undefined
        if (quantity < 5) {
          $('#quantity').val(quantity + 1);

        }

        // Increment

      });

      $('.quantity-left-minus').click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());

        // If is not undefined

        // Increment
        if (quantity > 1) {
          $('#quantity').val(quantity - 1);
        }
      });

    });
  </script>

</body>

</html>