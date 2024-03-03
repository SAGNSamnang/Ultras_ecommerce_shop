<?php
  $result = dbSelect("tbl_slideshow", "*", "enable='1'", "order by ssorder asc");
  $num = mysqli_num_rows($result);
?>

<section id="billboard" class="overflow-hidden">
  <button class="button-prev">
    <i class="icon icon-chevron-left"></i>
  </button>
  <button class="button-next">
    <i class="icon icon-chevron-right"></i>
  </button>
  <div class="swiper main-swiper">
    <div class="swiper-wrapper">
      <?php 
        while($row = mysqli_fetch_array($result)) 
          {
      ?>
      <div class="swiper-slide" style="background-image: url('images/<?=$row['img']?>');background-repeat: no-repeat;background-size: cover;background-position: center;">
        <div class="banner-content">
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <h2 class="banner-title"><?=$row['title']?></h2>
                <h3><?=$row['subtitle']?></h3>
                <p><?=$row['text']?></p>
                <div class="btn-wrap">
                  <a href="<?=$row['link']?>" class="btn btn-light btn-medium d-flex align-items-center" tabindex="0">Shop it now <i class="icon icon-arrow-io"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
        }
      ?>
    </div>
  </div>
</section>