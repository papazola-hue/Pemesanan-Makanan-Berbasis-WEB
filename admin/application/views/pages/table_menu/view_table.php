              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Table Menu <small>Admin</small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                    <table id="datatable-fixed-header" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Nama Menu</th>
                          <th>Harga</th>
                          <th>Jenis Menu</th>
                          <th>Foto</th>
                          <th>Tools</th>
                        </tr>
                      </thead>
                      <tbody>
                  <?php
                  foreach($menu as $row){
                  ?>
                  <tr>
                    <td><?php echo $row->nama_menu ?></td>
                      <td><?php echo $row->harga ?></td>
                      <td><?php echo $row->nama_jenis ?></td>
                      <td><img src="<?php echo base_url('assets2/img/Menu/'.$row->file_foto); ?>" alt="<?php echo $row->nama_file; ?>" width="100" height="100" /></td>
                  
                    <td>
                      <div class="btn-group">
                      <a href="<?php echo base_url('cmenu/ubah/'.$row->id_menu); ?>" class="btn btn-info fa fa-edit"></a>
                      <a href="<?php echo base_url('cmenu/delete/'.$row->id_menu); ?>" class="btn btn-danger fa fa-trash delete_lead"></a>
                     </div>
                    </td>
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
                title: "Input berhasil",
                text: "<?php echo $this->session->flashdata('flash_message'); ?>",
                showConfirmButton: true,
                type: 'success'
            });
        </script>
      <?php } ?>