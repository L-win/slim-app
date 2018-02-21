<?php while ( $row = mysqli_fetch_assoc( $rows ) ){ ?>
		<h3><?= $row['title'] ?></h3>
		<?= $row['body'] ?><br>
		<a href="/slim-app/post/<?= $row['id'] ?>">Read more</a>
		<br><br>
<?php } ?>
<div class="pages">
	<a href="/slim-app/page/1">Page 1</a>
	<a href="/slim-app/page/2">Page 2</a>
	<a href="/slim-app/page/3">Page 3</a>
</div>