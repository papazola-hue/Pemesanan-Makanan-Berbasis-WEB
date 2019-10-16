<html>
<head>
  <title>Tutorial Membuat Shopping Cart Dengan Codeigniter -CodeCoding</title>
  <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css">
  <style>
  .kotak
 {
  padding:10px;
  border:1px solid #e8e8e8;
  margin-bottom:15px;
  background:#F4F4F4;
  border-radius:5px;
 }

  </style>
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
              <li class="active"><a href="<?php echo site_url('Shopping_cart/')?>">Data Produk</a></li>
              <li><a href="<?php echo site_url('Shopping_cart/keranjang_belanja/')?>">Keranjang Belanja (<?php echo count($cart); ?>)</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="https://www.codecoding.id/artikel/kategori/codeigniter.html">Tutorial lainnya</a></li>
            </ul>
          </div>
        </div>
      </nav>
   <br><br><br><br><br>
   <div class="container">
     <div class="row">
       <?php foreach($product as $p){ ?>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="kotak">
            <a href="#"></a>
            <a href="#"><img class="img-thumbnail" src="<?php echo base_url() . 'assets/images/'.$p->gambar  ?>"/></a>
              <div class="card-body">
                <h1 class="card-title">
                  <a href="#"><?php echo $p->nama; ?></a>
                </h1>
                <h4>Rp. <?php echo number_format($p->harga,0,",","."); ?></h4>
             </div>
             <form method="post" action="<?php echo site_url('Shopping_cart/beli'); ?>">
               <input type="hidden" name="id" value="<?php echo $p->id; ?>" />
               <input type="hidden" name="nama" value="<?php echo $p->nama; ?>" />
               <input type="hidden" name="harga" value="<?php echo $p->harga; ?>" />
               <input type="hidden" name="gambar" value="<?php echo $p->gambar; ?>" />
               <input type="hidden" name="qty" value="1" />
              <div class="card-footer">
                <button type="submit" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-shopping-cart"></i> Beli</button>
              </div>
            </form>
            </div>
          </div>
        <?php } ?>
     </div>

</div> <!-- /container -->
  <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/bootstrap/js/jquery.min.js'); ?>"></script>
</body>
</html>
