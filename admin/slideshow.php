<?php
	/*
		action
		0 - delete slideshow
		1 - add slideshow
		2 - edit slideshow
		3 - update slideshow
		4 - move up/ move down
		5 - enable/disable
	*/
	$error = -1;
	$error_message = "";
	if(isset($_GET['action'])) 
	{
		$action = $_GET['action'];
		switch($action) 
		{
			// Case delete
			case "0":
				$ssid = $_GET['ssid'];
				// delete image
				$result = dbSelect("tbl_slideshow", "img", "ssid=$ssid", "");
				$row = mysqli_fetch_array($result);
				$img = $row['img'];
				$path = "../images/$img";
				$result = dbDelete("tbl_slideshow", "ssid=$ssid");
				// check file have or not
				if(file_exists($path) && $result)
				{
					// unlink used for delete file
					unlink($path);
				}
				
			break;
			// Case Add Slideshow
			case "1":
				$title = $_POST['txttitle'];
				$subtitle = $_POST['txtsubtitle'];
				$text = $_POST['tatext'];
				$link = $_POST['txtlink'];
				$enable = "0";
				if(isset($_POST['chkenable'])) {
					$enable = "1";
				}
				$result = dbSelect("tbl_slideshow", "ssorder", "", "order by ssorder desc limit 1");
				$row = mysqli_fetch_array($result);
				$ssorder = $row['ssorder'] + 1;
				$img = "banner2.jpg";
				$data = ["title"=>"$title", "subtitle"=>"$subtitle", "text"=>$text, "link"=>$link, "enable"=>$enable, "ssorder"=>$ssorder];
				$result = dbInsert("tbl_slideshow", $data);
				if ($result) 
				{
					$error = 0;
					$error_message = "You have successfully to insert  a slideshow.";
				}
				else 
				{
					$error = 1;
					$error_message = "Failed to insert slideshow";
				}
			break;
			// Case move up/ move down
			case "4":
				$ssid = $_GET['ssid'];
				$result = dbSelect("tbl_slideshow", "ssorder", "ssid=$ssid", "");
				$row = mysqli_fetch_array($result);
				$c_ssorder = $row['ssorder'];

				if (($_GET['d'] == '0'))
				{
					$result = dbSelect("tbl_slideshow", "ssid, ssorder", "ssorder < $c_ssorder", "order by ssorder desc limit 1");
				}
				else 
				{
					$result = dbSelect("tbl_slideshow", "ssid, ssorder", "ssorder > $c_ssorder", "order by ssorder asc limit 1");
				}
				$row = mysqli_fetch_array($result);
				$n_ssid = $row['ssid'];
				$n_ssorder = $row['ssorder'];

				dbUpdate("tbl_slideshow", ['ssorder'=>$n_ssorder], "ssid=$ssid");
				dbUpdate("tbl_slideshow", ['ssorder'=>$c_ssorder], "ssid=$n_ssid");
			break;
			// Case enable / disable
			case "5" :
				$ssid = $_GET['ssid'];
				$enable = $_GET['enable'];
				// array map
				$data = ["enable"=>"$enable"];
				// Update in database
				$result = dbUpdate("tbl_slideshow", $data,"ssid=$ssid");
				// if success
				if ($result) 
				{
					$error = 0;
					$error_message = "You have enable/disable a slideshow successfully";
				}
				else 
				{
					$error = 1;
					$error_message = "Failed to enable/disable slideshow";
				}
				break;
		}
	}


	$result = dbSelect("tbl_slideshow", "*", "", "order by ssorder asc");
	$num = mysqli_num_rows($result);
	$maxperpage = MAX_PER_PAGE;
	$numpage = ceil($num/$maxperpage);
	$current_page = 1;
	if (isset($_GET['pg']))
		$current_page = $_GET['pg'];
	$offset = ($current_page - 1) * $maxperpage;
	$result = dbSelect("tbl_slideshow", "*", "", "order by ssorder asc limit $maxperpage offset $offset");

?>

<main class="content">
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3">Slideshow</h1>
		<a href="index.php?p=slideshowform" class="btn btn-primary float-end">Add New Slideshow</a>
		<div style="clear:both">
		<?php
			if($error != -1) 
			{
		?>
			<div class="alert alert-<?=($error=='1'?'danger':'success')?> alert-dismissible fade show" role="alert">
				<strong>Samnang Sanh!</strong><?= $error_message ?>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		</div>
		<?php
			}
			if($num > 0) 
			{
		?>
		<table class="table">
			<tr>
				<th>No</th>
				<th>Image</th>
				<th>Title</th>
				<th>Subtitle</th>
				<th>Text</th>
				<th>Link</th>
				<th>Action</th>
			</tr>
			<?php
				$i = 1;
				while($row = mysqli_fetch_array($result))
				{
			?>
			<tr>
				<td><?= $i + $offset ?></td>
				<td><img src="../images/<?=$row['img']?>" style="width: 100px;"></td>
				<td><?= $row['title'] ?></td>
				<td><?=$row['subtitle']?></td>
				<td><?=$row['text']?></td>
				<td><?=$row['link']?></td>
				<td>
					<a href="index.php?p=slideshow&action=4&d=0&ssid=<?=$row['ssid']?>"><i data-feather="arrow-up"></i></a>
					<a href="index.php?p=slideshow&action=4&d=1&ssid=<?=$row['ssid']?>"><i data-feather="arrow-down"></i></a>
					<a href="index.php?p=slideshow&action=5&enable=<?=($row['enable']=='0'?'1':'0')?> &ssid=<?=$row['ssid']?>"><i data-feather="<?=$row['enable']=='1'?'eye':'eye-off'?>"></i></a>
					<a href="#" data-bs-toggle="modal" data-bs-target="#ssDelModal" onclick="updateDelLink(<?=$row['ssid']?>)"><i data-feather="trash"></i></a>
					<a href="#"><i data-feather="edit"></i></a>
				</td>
			</tr>
			<?php
			 	$i++;
				}
			?>
		</table>
		<!-- pagination  -->
		<nav aria-label="Page navigation example"class="d-flex justify-content-center">
			<ul class="pagination">
				<li class="page-item">
					<a class="page-link" href="index.php?p=slideshow&pg=<?=($current_page==1)?'1':$current_page-1?>" aria-label="Previous">
						<span aria-hidden="true">&laquo;</span>
					</a>
				</li>
				<?php
					for($i=1; $i<=$numpage; $i++)
					{
				?>
				<li class="page-item <?=($i==$current_page)?'active':''?>"><a class="page-link" href="index.php?p=slideshow&pg=<?=$i?>"><?= $i ?></a></li>
				<?php
					}
					?>
				<li class="page-item">
					<a class="page-link" href="index.php?p=slideshow&pg=<?=($current_page==$numpage)?$numpage:$current_page+1?>" aria-label="Next">
						<span aria-hidden="true">&raquo;</span>
					</a>
				</li>
			</ul>
		</nav>
		<!-- end pagination  -->
		<?php
			}
			else {
				echo "<p class='text-center'>There is no slideshow</p>";
			}
		?>
	</div>
	

	<!-- Modal -->
	<div class="modal fade" id="ssDelModal" tabindex="-1" aria-labelledby="ssDelModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="ssDelModalLabel">Confirmation!</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					Are you sure you want to delete this slideshow?
				</div>
				<div class="modal-footer">
					<a href="#" class="btn btn-primary" id="linkSSDel">Yes</a>
					<a class="btn btn-secondary" data-bs-dismiss="modal">No</a>
				</div>
			</div>
		</div>
	</div>
	<!-- End Modal  -->
	<!-- add internal javascript  -->
	<script>
		function updateDelLink(ssid) 
		{
			document.getElementById("linkSSDel").href = "index.php?p=slideshow&action=0&ssid=" + ssid;
			// alert(document.getElementById("linkSSDel").href);
		}
	</script>
</main>
	