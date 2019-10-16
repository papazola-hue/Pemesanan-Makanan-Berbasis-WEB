<img class="wave" src="<?php echo base_url();?>assets/Login/img/w.png">
    <div class="container">
        <div class="img">
            <img src="<?php echo base_url();?>assets/Login/img/bg.svg">
        </div>
        <div class="login-content">
            <form action="<?php echo base_url('login') ?>" method="post">
                <?php
           // Cetak session
          if($this->session->flashdata('sukses')) {
            echo '<p class="warning" style="margin: 10px 20px;">'.$this->session->flashdata('sukses').'</p>';
          }
          // Cetak error
          echo validation_errors('<p class="warning" style="margin: 10px 20px;">','</p>');
          ?>
                <img src="<?php echo base_url();?>assets/Login/img/avatar.svg">
                <h2 class="title">Welcome</h2>
                <div class="input-div one">
                   <div class="i">
                        <i class="fas fa-user"></i>
                   </div>
                   <div class="div">
                        <h5>Username</h5>
                        <input type="text" name="username" class="input">
                   </div>
                </div>
                <div class="input-div pass">
                   <div class="i"> 
                        <i class="fas fa-lock"></i>
                   </div>
                   <div class="div">
                        <h5>Password</h5>
                        <input type="password" name="password" class="input">
                   </div>
                </div>
                <a href="#">Forgot Password?</a>
                <input type="submit" class="btn" value="Login">
            </form>
        </div>
    </div>