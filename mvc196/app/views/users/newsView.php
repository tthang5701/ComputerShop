<?php foreach ($New_array_data as $key => $value) { ?>
<div class="wapperNew">
    <div class="imgNew">
        <img src="<?= BASE_URL."public/imgs/".$value['image'] ?>" alt="<?=$value['image']?>">
    </div>
    <div class="content">
        <h2><?=$value['name'];?></h2>
        <p><?=$value['content']?></p>
        <button type="submit"> <a href="#">Đọc thêm</a></button>
    </div>
    
</div>
<?php }?>
<div class="clear"></div>