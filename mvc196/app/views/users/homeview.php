</div>
<div class="main">
	<div class="content">
		<div class="content_top">
			<div class="heading">
				<h3>Sản phẩm tiềm năng</h3>
			</div>
			<div class="section group">
				<?php foreach ($homeProduct_data as $key => $data) { ?>
					<div class="grid_1_of_4 images_1_of_4">
						<a href="<?= BASE_URL . "public/imgs/" . $data['image'] ?>"><img src="<?= BASE_URL . "public/imgs/" . $data['image'] ?>" alt="<?= BASE_URL . "public/imgs/" . $data['image'] ?>"></a>
						<h2><?= $data['name'] ?></h2>
						<?= $data['content'] ?>
						<p style="margin-top: 20px;"><span class="price"><?= number_format($data['price']).'VND'?></span></p>
						<div class="button" style="margin:40px auto;width:100%"><span><a href="<?= BASE_URL . "productDetail/index/" . $data['id'] ?>" class="details">Chi tiết</a></span></div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<ul class="Pagination">
	<?php
	for ($num = 1; $num <= $number_page[0]; $num++) {

	?>
		<?php if ($num != $number_page[2]) { ?>
			<li class="page-item"><a class="page-link" href="<?= BASE_URL . "home/" ?>index/<?= $number_page[1] ?>/<?= $num ?>"><?= $num ?></a></li>
		<?php } else { ?>
			<strong class="current-page"><?= $num ?></strong>
		<?php } ?>
	<?php
	} ?>
</ul>