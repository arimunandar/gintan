<main id="main">
    <!-- ======= Contact Section ======= -->
    <section id="home" class="contact">
      <div class="container">

        <div class="section-title">
          
        </div>

        <?php
            $row = $product->getProductsById($_GET['order-product']);

            if (isset($_GET['create-order'])) {
                include_once('orderconfirm.php');
            } else {
        ?>
        <div class="row">
        <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="icofont-cart"></i>
                <h4>Nama Produk:</h4>
                <p><?php echo $row['name']; ?></p>
              </div>

              <div class="email">
                <i class="icofont-money"></i>
                <h4>Harga:</h4>
                <p>Rp <?php echo $row['price']; ?></p>
              </div>

              <div class="email">
                <i class="icofont-water-drop"></i>
                <h4>Warna:</h4>
                <p><?php echo $row['color']; ?></p>
              </div>

              <div class="email">
                <i class="icofont-envato"></i>
                <h4>Ukuran:</h4>
                <p><?php echo $row['size']; ?></p>
              </div>

              <a href="?create-order=<?php echo $_GET['order-product']; ?>" class="btn btn-primary" style="width:200px;">Beli</a>
            </div>
        </div>
        <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            <img src="<?php echo $row['image']; ?>" class="img-fluid" alt="">
        </div>
        </div>
            <?php
        }
        ?>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->