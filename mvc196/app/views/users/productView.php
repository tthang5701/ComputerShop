<div class="main">
	<div class="content">
		<div class="content_top">
			<div class="heading">
				<h3>Sản phẩm mới nhất</h3>
			</div>
			<div class="clear"></div>
		</div>

		<div class="section group">
			<?php foreach ($Product_data as  $valueProduct_data) { ?>
				<div class="grid_1_of_4 images_1_of_4">
					<a href="<?= BASE_URL ?>public/imgs/<?= $valueProduct_data['image'] ?>"><img src="<?= BASE_URL ?>public/imgs/<?= $valueProduct_data['image'] ?>" alt="<?= $valueProduct_data['image'] ?>" /></a>
					<h2 style="font-weight: 900;"><?= $valueProduct_data['name'] ?></h2>
					<?= $valueProduct_data['content'] ?>
					<p style="margin-top: 20px;"><span class="price"><?= number_format($valueProduct_data['price']).'VND' ?></p>
					<div class="button" style="margin:40px auto;width:100%"><span><a href="<?= BASE_URL . "productDetail/index/" . $valueProduct_data['id'] ?>" class="details">Chi tiết</a></span></div>
				</div>
			<?php } ?>
		</div>
		<ul class="Pagination">
			<?php
			for ($num = 1; $num <= $number_page[0]; $num++) {

			?>
				<?php if ($num != $number_page[2]) { ?>
					<li class="page-item"><a class="page-link" href="<?= BASE_URL . "product/" ?>index/<?= $number_page[1] ?>/<?= $num ?>"><?= $num ?></a></li>
				<?php } else { ?>
					<strong class="current-page"><?= $num ?></strong>
				<?php } ?>
			<?php
			} ?>
		</ul>
	</div>

</div>