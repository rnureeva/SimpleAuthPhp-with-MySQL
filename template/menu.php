<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/functionCreator.php'); ?>
<ul class="<?=$style?>">
	<?php foreach ($array as $value): ?>
		<li class="<?php echo (makeActive($_SERVER['REQUEST_URI'],$array) == 
		$value['title'] ? "active" : "")?>">
			<a href="<?=$value['path']?>"><?=$value['title'];?></a>
		</li>
	<?php endforeach; ?>
</ul>
