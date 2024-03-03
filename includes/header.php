<header id="header">
      <div id="header-wrap">
        <nav class="secondary-nav border-bottom">
          <div class="container">
            <div class="row d-flex align-items-center">
              <div class="col-md-4 header-contact">
                <p>Let's talk! <strong>+57 444 11 00 35</strong>
                </p>
              </div>
              <div class="col-md-4 shipping-purchase text-center">
                <p>Free shipping on a purchase value of $200</p>
              </div>
              <div class="col-md-4 col-sm-12 user-items">
                <ul class="d-flex justify-content-end list-unstyled">
                  <li>
                    <a href="login.html">
                      <i class="icon icon-user"></i>
                    </a>
                  </li>
                  <li>
                    <a href="cart.html">
                      <i class="icon icon-shopping-cart"></i>
                    </a>
                  </li>
                  <li>
                    <a href="wishlist.html">
                      <i class="icon icon-heart"></i>
                    </a>
                  </li>
                  <li class="user-items search-item pe-3">
                    <a href="#" class="search-button">
                      <i class="icon icon-search"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </nav>
        <nav class="primary-nav padding-small">
          <div class="container">
            <div class="row d-flex align-items-center">
              <div class="col-lg-2 col-md-2">
                <div class="main-logo">
                  <a href="index.php">
                    <img src="images/main-logo.png" alt="logo">
                  </a>
                </div>
              </div>
              <div class="col-lg-10 col-md-10">
                <div class="navbar">

                  <div id="main-nav" class="stellarnav d-flex justify-content-end right">
                    <ul class="menu-list">

                      <li class="menu-item"> 
                        <a href="index.php"<?=($page=="home.php"?"class='active'": "")?>
                        class="item-anchor active d-flex align-item-center" data-effect="Home">Home</a>
                      </li>

                      <li class="menu-item">
                        <a href="index.php?p=about"<?=($page=="about.php"?"class='active'": "")?> class="item-anchor" data-effect="About">About</a></li>

                      <li class="menu-item">
                        <a href="index.php?p=shop" <?=($page=="shop.php"?"class='active'": "")?>
                        class="item-anchor d-flex align-item-center" data-effect="Shop">Shop</a>
                      </li>

                      <li class="menu-item">
                        <a href="index.php?p=blog" <?=($page=="blog.php"?"class='active'": "")?> class="item-anchor d-flex align-item-center" data-effect="Blog">Blog</a>
                      </li>

                      <li><a href="index.php?p=contact" <?=($page=="contact.php"?"class='active'": "")?> class="item-anchor" data-effect="Contact">Contact</a></li>

                    </ul>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </header>