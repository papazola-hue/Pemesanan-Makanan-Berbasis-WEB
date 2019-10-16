<div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Detail Pemesanan <small>Atas Nama <?php foreach ($pemesanan as $row) {
                      echo $row->nama;break;
                    } ?></small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <img class="img-responsive avatar-view" src="images/picture.jpg" alt="Avatar" title="Change the avatar">
                        </div>
                      </div>
                      <h3><?php foreach ($pemesanan as $row) {
                      echo $row->nama;
                      break;
                    } ?></h3>

                      <ul class="list-unstyled user_data">
                        <li><i class="fa fa-map-marker user-profile-icon"><?php foreach ($pemesanan as $row) {
                      echo $row->alamat;
                      break;
                    } ?></i>
                        </li>
                      </ul>
                      <ul class="list-unstyled user_data">
                        <li><i class=""><?php foreach ($pemesanan as $row) {
                      ?>
                      <a href="<?php echo base_url('cetak/detail/'.$row->id_pemesan); ?>" class="btn btn-info fa fa-edit"></a>
                      <?php
                      break;
                    } ?></i>
                        </li>
                      </ul>
                      <!-- end of skills -->

                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">

                      <div class="profile_title">
                        <div class="col-md-6">
                          <h2>Data Pemesanan</h2>
                        </div>
                        
                      </div>
                      <table class="table">
                      <thead>
                        <tr>
                          <th>Makanan</th>
                          <th>Nama Makanan</th>
                          <th>Jumlah Memesan</th>
                          <th>Harga</th>
                        </tr>
                      </thead>
                      <tbody>
                                        <?php
                  foreach($pemesanan as $row){
                  ?>
                  <tr>
                    <td><img src="<?php echo base_url('assets2/img/Menu/'.$row->file_foto); ?>" alt="<?php echo $row->nama_file; ?>" width="100" height="100" /></td>
                      <td><?php echo $row->nama_menu ?></td>
                      <td><?php echo $row->jml_beli ?></td>
                      <td><?php echo $row->harga ?></td>
                      
                  </tr>
                  <?php } ?>
                      </tbody>
                    </table>
                      <!-- start of user-activity-graph -->
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>