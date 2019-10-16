<div class="page-title">
              <div class="title_left">
                <h3>Menu</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Table Diskon <small>Admin</small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                    <table id="datatable-fixed-header" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Nama Promo</th>
                          <th>Tanggal Berlaku</th>
                          <th>Tanggal Selesai</th>
                          <th>Jumlah Potongan</th>
                          <th>Picture</th>
                          <th>Tools</th>
                        </tr>
                      </thead>
                      <tbody>
                                        <?php
                  foreach($diskon as $row){
                  ?>
                  <tr>
                    <td><?php echo $row->nama_promo ?></td>
                      <td><?php echo $row->tanggal_berlaku ?></td>
                      <td><?php echo $row->tanggal_selesai ?></td>
                      <td><?php echo $row->jumlah_promo ?></td>
                      <td><img src="<?php echo base_url('assets2/img/Diskon/'.$row->file_foto); ?>" alt="<?php echo $row->nama_file; ?>" width="100" height="100" /></td>
                  
                    <td>
                     <div class="btn-group">
                      <a href="<?php echo base_url('cdiskon/ubah/'.$row->id_promo); ?>" class="btn btn-info fa fa-edit"></a>
                      <a href="<?php echo base_url('cdiskon/delete/'.$row->id_promo); ?>" class="btn btn-danger fa fa-trash"></a>
                     </div>
                    </td>
                  </tr>
                  <?php } ?>
                                    </tbody>
                    </table>
                  </div>
                </div>
              </div>