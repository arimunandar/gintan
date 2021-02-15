<main id="main">
    <!-- ======= Contact Section ======= -->
    <section id="home" class="contact">
      <div class="container">
        <div class="section-title"></div>
        <div class="row">
        <div class="col-lg-5 d-flex align-items-stretch">
    <div class="info">
        <!-- form start -->
        <form action="" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                    <div class="address">
                        <i class="icofont-bank"></i>
                        <h4>Nama Bank:</h4>
                        <p>BRI</p>
                    </div>

                    <div class="email">
                        <i class="icofont-money"></i>
                        <h4>Nomor Rekening:</h4>
                        <p>12345678 a/n Gintan</p>
                    </div>
                    <div class="form-group">
                            <label>Tambah Keterangan</label>
                            <textarea class="form-control" rows="3" placeholder="Enter ..." name="description"></textarea>
                        </div>
                        <br>
                    <div class="form-group">
                        <label for="exampleInputFile">Pilih Foto Bukti Pembayaran</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile" name="foto">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                            </div>
                        </div>  
                        <br>
                        <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="transaction-add" style="width:200px;">Bayar</button>
                         </div>                
                    </div>
                    
                    <!-- /.card-body -->                
                </form>

                <?php
                    if (isset($_POST['transaction-add'])) {
                        if (!isset($_SESSION['email'])) {
                            header('Location: login.php');
                        } else {
                            $tmp_name 		= 	$_FILES["foto"]["tmp_name"];
                            $tran = new Transaction();
                            $userid = $_SESSION['id'];
                            $tran->addNewTransaction($_GET['create-order'], $userid, $_POST, $_FILES["foto"]["name"], $tmp_name);
                        }
                    }
                ?>
    </div>
</div>
        </div>
      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->