<?php while ( $row = mysqli_fetch_assoc( $rows ) ){ ?>
		<h3><?= $row['title'] ?></h3>
		<?= $row['body'] ?><br>
		<a href="post/<?= $row['id'] ?>">Read more</a>
		<br><br>
<?php } ?>