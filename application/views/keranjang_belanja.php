<html>
<head>
  <title>Tutorial Membuat Shopping Cart Dengan Codeigniter -CodeCoding</title>
  <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css">
</head>
<body>
  <!-- INI ADALAH HEADER -->
  <nav class="navbar navbar-default navbar-fixed-top">
     <div class="container">
       <div class="navbar-header">
         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
           <span class="sr-only">Toggle navigation</span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
         </button>
         <a class="navbar-brand" href="https://www.codecoding.id">CodeCoding</a>
       </div>
       <div id="navbar" class="navbar-collapse collapse">
         <ul class="nav navbar-nav">
           <li><a href="<?php echo site_url('Shopping_cart/')?>">Data Produk</a></li>
           <li class="active"><a href="<?php echo site_url('Shopping_cart/keranjang_belanja/')?>">Keranjang Belanja (<?php echo count($cart); ?>)</a></li>
         </ul>
         <ul class="nav navbar-nav navbar-right">
           <li><a href="https://www.codecoding.id/artikel/kategori/codeigniter.html">Tutorial lainnya</a></li>
         </ul>
       </div>
     </div>
   </nav>
   <br><br><br><br><br>
   <div class="container">
     <h2 align="center">KERANJANG BELANJA</h2><br><br><br>
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Gambar</th>
            <th>Nama Produk</th>
            <th>Harga Produk</th>
            <th>QTY</th>
            <th>Subtotal</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $total = 0;
            foreach($cart as $item){
              $total += $item['subtotal'];
          ?>
          <tr>
            <td><img src="<?php echo base_url('assets/images/'.$item['gambar']) ?>" width="100"></td>
            <td><?php echo $item['name']; ?></td>
            <td>Rp <?php echo number_format($item['price'],0,',','.'); ?></td>
            <td><?php echo $item['qty']; ?></td>
            <td>Rp <?php echo number_format($item['subtotal'],0,',','.'); ?></td>
          </tr>
        <?php } ?>
        </tbody>
      </table><hr><br>
      <h4>Total Yang Harus Dibayar : Rp <?php echo number_format($total,0,',','.'); ?></h4>
   </div> <!-- /container -->
  <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/bootstrap/js/jquery.min.js'); ?>"></script>
</body>
</html>