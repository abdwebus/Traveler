<div class="row featurette">
	<div class="col-md-7">
		<h2 class="featurette-heading"><?php echo $row['PkgName'];  ?></h2>
		<p class="lead"><?php echo $row['PkgDesc']; ?></p>
	</div>
	<div class="col-md-5">
		<img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" src="<?php echo $row['PkgImgUrl']; ?>" width="500" height="500" preserveAspectRatio="xMidYMid slice" focusable="false">
	</div>
</div>
<hr class="featurette-divider">