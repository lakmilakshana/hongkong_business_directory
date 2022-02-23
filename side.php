<div class="list-group">
	<a href="#" class="list-group-item list-group-item-action active">Categories</a>
	<?php 
		$result = callingQuery("select * from categories");
		foreach($result as $data):
	?>
	<a class="list-group-item list-group-item-action" href="category.php?cat=<?= $data['cat_id'];?>"><?= $data['cat_title'];?></a>
	<?php endforeach;?>
</div>
