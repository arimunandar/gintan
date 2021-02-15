<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
        <h1 class="logo me-auto"></h1>
        <nav class="nav-menu d-none d-lg-block">
        <ul>
        <?php
            if (isset($_GET['order-product']) || isset($_GET['create-order'])) {
        ?>
            <li class="active"><a href="index.php">Home</a></li> 
        <?php
            } else {
        ?>
            <li class="active"><a href="#hero">Home</a></li>            
            <li><a href="#portfolio">Product</a></li>                
            <li><a href="#contact">Contact</a></li>
        <?php
            }
        ?>
            <?php
                if (isset($_SESSION['email'])) {
                $level = $_SESSION['level'];
                if ($level == 'admin') {
                    echo "<li><a href='dashboard/index.php'>Dashboard</a></li>";
                  } else {
                    echo "<li><a href='dashboard/transaction.php'>Dashboard</a></li>";
                  }
            ?>
            
            
            <li><a href="logout.php">Keluar</a></li>
            <?php
            
                }
            ?>
        </ul>
        </nav><!-- .nav-menu -->
        <?php
            if (!isset($_SESSION['email'])) {                
        ?>            
                <a href="login.php" class="get-started-btn scrollto">Login</a>
        <?php
        
            }
        ?>        

    </div>
</header><!-- End Header -->