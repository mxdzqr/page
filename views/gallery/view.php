<?php require_once(ROOT . '/views/layouts/header.php'); 
?>
<body>
	<div class="wrapper">
        <div class="upload">
            <form action="#" id="uploadImage" method="post" enctype="multipart/form-data">
                <span>Загрузить картинку</span>
                <input type="file" name="image" required >
                <button type="submit" name="btn_upload">Загрузить</button>
            </form>
        </div>
		<div class="gallery">
            <?php foreach ($showImage as $image):?>
            <div class="images">
                <img src='<?php echo Gallery::getImage($image['img_id']);?>'>
                <span><?php echo $image['date'];?></span>
            </div>
            <?php endforeach;?>
        </div>
	</div>	
<?php require_once(ROOT . '/views/layouts/footer.php'); ?>