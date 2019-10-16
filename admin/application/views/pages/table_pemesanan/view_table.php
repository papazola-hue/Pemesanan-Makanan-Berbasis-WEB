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
                    <h2>Table Pemesanan <small>Admin</small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Nama Pemesan</th>
                          <th>Tanggal memesan</th>
                          <th>Tools</th>
                        </tr>
                      </thead>
                      <tbody>
                                        <?php
                  foreach($pemesanan as $row){
                  ?>
                  <tr>
                    <td><?php echo $row->nama_pemesan ?></td>
                      <td><?php echo $row->tanggal ?></td>
                      <td><a href="<?php echo base_url('cpemesanan/detail/'.$row->id_pemesan); ?>" class="btn btn-info fa fa-edit"></a></td>
                  </tr>
                  <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
               <?php if($this->session->flashdata('success')){ ?>
        <script>
            swal({
                title: "Pesanan Diproses",
                text: "<?php echo $this->session->flashdata('flash_message'); ?>",
                
                type: 'success'
            });
        </script>
        <?php } ?>