<?php
	// configuration and database libraries
	include "../config.php";
	include "../libraries/database.php";
	// default page
	$page = "dashboard.php";
	// check if p
	if(isset($_GET['p']))
	{
		$p = $_GET['p'];
		switch($p) {
			case "slideshow":
				$page = "slideshow.php";
				break;
			case "slideshowform":
				$page = "slideshowform.php";
				break;
			case "product":
				$page = "product.php";
				break;
			case "category":
				$page = "category.php";
				break;
			case "user":
				$page = "user.php";
				break;
			case "configuration":
				$page = "configuration.php";
				break;
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<?php include("includes/head.php");?>
<body>
	<div class="wrapper">
		<?php include("includes/nav.php");?>
		<div class="main">
			<?php
					include("includes/header.php");
					include $page;
					include("includes/footer.php");
			?>
			
		</div>
	</div>
	<?php include("includes/script.php") ?>
</body>
</html>