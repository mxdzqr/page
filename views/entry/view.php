<?php require_once(ROOT . '/views/layouts/header.php'); ?>
<body>
	<div class="wrapper">
		<div class="article">
			<div class="article_title">
				<h1><?php echo $entry['title']?></h1>
			</div>
			<div class="article_description">
				<span><?=$entry['description']?></span>
			</div>
			<div class="article_text">
				<p><?=$entry['text']?></p>
			</div>
			<div class="article_date">
				<span><?=date ("d.m.Y", $entry['date'])?></span>
			</div>
			<div class="article_back">
				<a href="/">На главную</a>
			</div>
		</div>
	</div>	
<?php require_once(ROOT . '/views/layouts/footer.php'); ?>