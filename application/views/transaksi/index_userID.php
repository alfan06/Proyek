
              <link rel="stylesheet" href="assets/css/bootstrap.min.css">
             <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
             <link rel="stylesheet" href="assets/css/flaticon.css">


<section class="new-product-area section-padding30">
            <div class="container"> 
                <!-- Section tittle -->
                <div class="row">
                            <h2>Pesanan Saya</h2>
                </div>
            </div>
</section>
<div class="container">
            <center>
                <table class="table table-bordered" style="width:auto;margin-left:30px;margin-right:30px;">
                    <thead>
                    <tr style="background-color: lightblue;color:black">
                        <th>Kode Transaksi</th>
                        <th>Nama Fotografi</th>
                        <th>Tanggal Transaksi</th>
                        <th>Harga</th>
                        <th>Alamat Fotografi</th>
                        <th>Pembayaran</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($transaksi as $t) : ?>
                        <tr align="center" style="background-color: white;color:black">
                            <td><?php echo 'KD_T 00' . $t['id_transaksi']; ?></td>
                            <td><?php echo $t['nama']; ?></td>
                            <td><?php echo date('d-m-Y', strtotime($t['tgl_transaksi'])) ?></td>
                            <td><?php echo $t['harga']; ?></td>
                            <td><?php echo $t['alamatfotografi']; ?></td>
                            <td>
                            <a href="paypal.me/alfannoufal" title="Cara Kerja PayPal" onclick="javascript:window.open('https://www.paypal.com/id/webapps/mpp/paypal-popup?locale.x=id_ID','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;"><img src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/checkout-logo-small.png" alt="Check out dengan PayPal" /></a>
                            </td>
                         </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
            </center>
</div>
<section class="new-product-area section-padding30">
            <div class="container"> 
                <!-- Section tittle -->
                <div class="row">
                            <h2>Note:</h2>
                            <h2>Silahkan bayar ketika hari pemotretan</h2>
                </div>
            </div>
</section>
       
