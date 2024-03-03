<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.php">
          <span class="align-middle">Admin</span>
        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-item <?=($page=='dashboard.php'?"active":"")?>">
						<a class="sidebar-link" href="index.php">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
            </a>
					</li>
					<li class="sidebar-item <?=($page=='slideshow.php'?"active":"")?>">
						<a class="sidebar-link" href="index.php?p=slideshow">
              <i class="align-middle" data-feather="monitor"></i> <span class="align-middle">Slideshow</span>
            </a>
					</li>
					<li class="sidebar-item <?=($page=='product.php'?"class='active'":"")?>">
						<a class="sidebar-link" href="index.php?p=product">
              <i class="align-middle" data-feather="box"></i> <span class="align-middle">Products</span>
            </a>
					</li>
					<li class="sidebar-item <?=($page=='category.php'?"class='active'":"")?>">
						<a class="sidebar-link" href="index.php?p=category">
              <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Category</span>
            </a>
					</li>
					<li class="sidebar-item <?=($page=='user.php'?"class='active'":"")?>">
						<a class="sidebar-link" href="index.php?p=user">
              <i class="align-middle" data-feather="user"></i> <span class="align-middle">Users</span>
            </a>
					</li>
					<li class="sidebar-item <?=($page=='configuration.php'?"class='active'":"")?>">
						<a class="sidebar-link" href="index.php?p=configuration">
              <i class="align-middle" data-feather="settings"></i> <span class="align-middle">Configuration</span>
            </a>
					</li>

					
				</ul>
			</div>
		</nav>