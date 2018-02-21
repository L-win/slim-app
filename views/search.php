<?php while ( $row = mysqli_fetch_assoc($rows) ){ ?>
		<a href="/slim-app/post/<?=$row['id']?>"><?=$row['title']?></a><br>
<?php } ?>