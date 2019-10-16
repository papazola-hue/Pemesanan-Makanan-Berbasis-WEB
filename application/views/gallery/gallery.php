
<!--==  Gallery  ==-->

<section style="margin-top: 20px; margin-bottom: 70px">
    <div id="w">
        <div class="pricing-filter">
            <div class="pricing-filter-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-header">
                                <h2 class="pricing-title" style="height: 130px; text-align: center; margin-top: 50px">Gallery</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <menu class="col-md-12" style="margin-top: 30px; padding-left: 27em">
                <ul class="nav navbar-nav">
                    <li style="padding-right: 5em"><a href="<?php echo base_url('#'); ?>">RECIPE</a></li>
                    <li style="padding-right: 5em"><a href="<?php echo base_url('#'); ?>">EVENT</a></li>
                    <li style="padding-right: 5em"><a href="<?php echo base_url('#'); ?>">FOOD</a></li>
                    <li style="padding-right: 5em"><a href="<?php echo base_url('#'); ?>">DRINK</a></li>
                </ul>
            </menu>


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="menu-pricing" class="menu-price">
                    <?php foreach ($gall as $row) : ?>
                    <div class="col-lg-4">
                        <li style="color: transparent;">
                            <a href="#">
                                <a href="<?php echo base_url ("assets/images/gallery/").$row->gambar;?>" data-lightbox="mygallery"><img src="<?php echo base_url("assets/images/gallery/").$row->gambar;?>" class="img-responsive" >
                    <div class="menu-desc">
                        <span>
                            <h4 style="margin-top: 50px"><?php echo $row->deskripsi;?></h4>
                            <img class="col-md-offset-5" style="width: 50px; height: 50px; margin-top: 20px" src="<?php echo base_url("assets/images/gallery/zoom.png") ?>"class="img-responsive">
                        </span>
                    </div>
                </a>                   <!-- <h2 class="white">Rp. 3.000</h2> -->
            </li>
        </div>     
            <?php 
                endforeach;?>
    </div>
</div>
</div>            
    <div class="box-footer clearfix; col-md-6 col-md-offset-1" style="margin-top: 30px">
        <ul class="pagination pagination-sm no-margin pull-right">
            <li><a href="#" style="font-size: 25px">&laquo;</a></li>
            <li><a href="#" style="font-size: 25px">1</a></li>
            <li><a href="#" style="font-size: 25px">2</a></li>
            <li><a href="#" style="font-size: 25px">3</a></li>
            <li><a href="#" style="font-size: 25px">&raquo;</a></li>
        </ul>
    </div>

</div>

</section>