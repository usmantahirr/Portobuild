<section id="main-container">
	<?php include 'php/titleBar.php'; ?>
	<div id="data-container">
		<div class="gallery" ng-controller="GalleryController">
			<a href="{{item.src}}" ng-repeat="item in galleryImages" rel="image_group" title="">
				<div class="croped">
				     <img alt="Image Thumbnail" src="{{item.src}}" class="thumb" />
				</div>
			</a>
		</div>
	</div>
</section>