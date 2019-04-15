<hr class="featurette-divider">
<div class="row featurette">
	<div class="col-md-7 order-md-2">
		<h2 class="featurette-heading"><?php echo $row['PkgName'];  ?></h2>
		<p class="lead"><?php echo $row['PkgDesc']; ?></p>
	</div>
	<div class="hovereffect col-md-5 order-md-1">
		<img class="frontpage bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" src="<?php echo $row['PkgImgUrl']; ?>" width="500" height="500" preserveAspectRatio="xMidYMid slice" focusable="false">
		<div class="overlay">
			<h2>$<?php echo $row['PkgBasePrice']; ?></h2>
			<p>
				<button role="button" class="btn btn-outline-light" onclick="document.location.href='destinations.php'">BOOK NOW</button>
			</p>
		</div>
	</div>
</div>
<hr class="featurette-divider">
