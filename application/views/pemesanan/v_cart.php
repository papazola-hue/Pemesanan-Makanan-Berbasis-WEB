<!--== 1. About us ==-->
    <section style="margin-top: 20px; margin-bottom: 70px">
        <div id="w">
            <div class="pricing-filter">
                <div class="pricing-filter-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section-header">
                                    <h2 class="pricing-title" style="height: 130px; text-align: center; margin-top: 50px">Halo <?php echo $this->session->userdata('username') ?> ingin memesan apa hari ini</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wrapper">
        <div class="container"><br/>
    <div class="row">
        <div class="col-md-8">
            <h4>Produk</h4>
            <div class="row">
            <?php foreach ($data as $row) : ?>
                <div class="col-md-4">
                    <div class="thumbnail">
                        <img width="200" src="<?php echo base_url().'assets/images/Menu/'.$row->file_foto;?>">
                        <div class="caption">
                            <h4><?php echo $row->nama_menu;?></h4>
                            <div class="row">
                                <div class="col-md-7">
                                    <h4><?php echo 'Rp '.number_format($row->harga);?></h4>
                                </div>
                                <div class="col-md-5">
                                    <input type="number" name="quantity" id="<?php echo $row->id_menu;?>" value="1" class="quantity form-control">
                                </div>
                            </div>
                            <button class="add_cart btn btn-success btn-block" data-produkid="<?php echo $row->id_menu;?>" data-produknama="<?php echo $row->nama_menu;?>" data-produkharga="<?php echo $row->harga;?>">Add To Cart</button>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
                
            </div>

        </div>
        <div class="col-md-4">
            <h4>Shopping Cart</h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Qty</th>
                        <th>Subtotal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="detail_cart">
                    <a href="<?php echo base_url('pemesanan'); ?>" class="btn-success">BAYAR</a>
                </tbody>
                
            </table>
        </div>
    </div>
</div>
</div> <!-- /.wrapper -->
</section> <!-- /#about -->
<script type="text/javascript" src="<?php echo base_url().'assets/js2/jquery-2.2.3.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js2/bootstrap.js'?>"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.add_cart').click(function(){
            var id_menu    = $(this).data("produkid");
            var nama_menu  = $(this).data("produknama");
            var harga = $(this).data("produkharga");
            var quantity     = $('#' + id_menu).val();
            $.ajax({
                url : "<?php echo base_url();?>index.php/home/add_to_cart",
                method : "POST",
                data : {id_menu: id_menu, nama_menu: nama_menu, harga: harga, quantity: quantity},
                success: function(data){
                    $('#detail_cart').html(data);
                }
            });
        });

        // Load shopping cart
        $('#detail_cart').load("<?php echo base_url();?>index.php/home/load_cart");

        //Hapus Item Cart
        $(document).on('click','.hapus_cart',function(){
            var row_id=$(this).attr("id"); //mengambil row_id dari artibut id
            $.ajax({
                url : "<?php echo base_url();?>home/hapus_cart",
                method : "POST",
                data : {row_id : row_id},
                success :function(data){
                    $('#detail_cart').html(data);
                }
            });
        });
    });
</script>
<?php if($this->session->flashdata('success')){ ?>
        <script>
            swal({
                title: "Anda Belum Memesan??",
                text: "<?php echo $this->session->flashdata('flash_message'); ?>",
                showConfirmButton: true,
                type: 'warning'
            });
        </script>
      <?php } ?>