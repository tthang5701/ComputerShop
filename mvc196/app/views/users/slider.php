<div class="header_bottom">
	<div class="header_bottom_left">
		<div class="section group">
			<?php foreach ($TopProductBrandHome_data as  $value) { ?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						<a href="<?= BASE_URL . "public/imgs/" . $value['image'] ?>"> <img src="<?= BASE_URL . "public/imgs/" . $value['image'] ?>" /></a>
					</div>
					<div class="text list_2_of_1">
						<h2><?= $value['name'] ?></h2>
						<?= $value['content'] ?>
						<?php if (!empty($logged_in)) {
							$URL = BASE_URL . "Cart/addToCart/" . $user_id;
						} else {
							$URL = LOGIN_URL_DEFAULT;
						}
						?>
						<!-- <form action="<?= $URL ?>" method="post">
							<input type="hidden" class="buyfield" name="quanlity" min="1" value="1" />
							<input type="hidden" name="price" value="<?= $value['price'] ?>" />
							<input type="hidden" name="idsanpham" value="<?= $value['id'] ?>" />
							<button type="submit" class="buysubmit" name="submit" style="width: 100px;
              height: 24px;margin-left: 20px;background-color: #602d8d;font-size: 14px;font-weight: 800;">Mua</button>
						</form> -->
					</div>
				</div>
			<?php } ?>
		</div>
		<div class="clear"></div>
	</div>
	<div class="header_bottom_right_images">
		<!-- FlexSlider -->
		<section class="slider">
			<div class="flexslider">
				<ul class="slides">
					<?php foreach ($sliders as  $value) { ?>
						<li><img src="<?= BASE_URL ?>public/imgs/<?= $value['image'] ?>" /></li>
					<?php } ?>
				</ul>
			</div>
		</section>
		<!-- FlexSlider -->
	</div>
	<div class="clear"></div>
</div>