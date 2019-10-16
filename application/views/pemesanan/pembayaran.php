
<!--== 1. About us ==-->
    <section style="margin-top: 20px; margin-bottom: 70px">
        <div id="w">
            <div class="pricing-filter">
                <div class="pricing-filter-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section-header">
                                    <h2 class="pricing-title" style="height: 130px; text-align: center; margin-top: 50px">Konfirmasi Pembayaran</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


    <div class="wrapper">
        <div class="container-fluid">
            <div class="col-md-12" style="margin-top: 40px; padding-left: 28em">
            <table class="table1">
        <tr>
            
            <th>Menu</th>
            <th>Jumlah Beli</th>
            <th>Harga</th>
            <th>subtotal</th>
        </tr>
        <tr>
            <?php
            $total=0;
            foreach($cart as $row){
                $total += $row['subtotal'];
            ?>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['qty'] ?></td>
            <td><?php echo $row['price'] ?></td>
            <td><?php echo $row['subtotal'] ?></td>
            
        </tr>
        <?php } ?>
    </table>
    <h4>Total Yang Harus Dibayar : Rp <?php echo number_format($total,0,',','.'); ?></h4>
    </div>
    </div> <!-- /.container-fluid -->
</div> <!-- /.wrapper -->
<div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                <div class="row">
    <form class="contact-form" method="post" action="<?php echo base_url('pemesanan/input/') ?>" style="margin-top: 50px">
                <h2 style="margin-bottom: 50px; text-align:center"> Konfirmasi Pembayaran </h2>
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nama :</label>
                                <input  name="nama" type="text" class="form-control" id="name" required="required" placeholder="Nama ">
                        </div>
                        <div class="form-group">
                            <label>Alamat : </label>
                            <input name="alamat" type="text" class="form-control" id="alamat" required="required" placeholder="  Alamat">
                        </div>
                        <?php
                        ?>
                        <input type="hidden" name="id_pemesan" value="<?php echo $this->session->userdata('id') ?>">
                        <input type="hidden" name="nama_pemesan" value="<?php echo $this->session->userdata('username') ?>">
                        <input type="hidden" name="total" value="<?php echo $total ?>">
                        <?php
                        foreach($cart as $data){
                            ?>
                        <input type="hidden" name="id_menu[]" value="<?php echo $data['id'] ?>">
                        <input type="hidden" name="jml_beli[]" value="<?php echo $data['qty'] ?>">
                        <input type="hidden" name="total_harga[]" value="<?php echo $data['subtotal'] ?>">
                        <?php              
                        }
                        ?>
                    </div>
                    <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                        <div class="text-center">
                            <button type="submit" id="submit" name="submit" class="btn btn-send">Send</button>
                        </div>
                    </div>
                </form>
            </div>
            </div>
        </div>
</section> <!-- /#about -->