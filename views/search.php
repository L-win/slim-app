<br>
<ul class="list-group">
<?php while ( $row = mysqli_fetch_assoc($rows) ){ ?>
		<li class="list-group-item"><a href="/slim-app/post/<?=$row['id']?>"><?=$row['title']?></a></li>
<?php } ?>
</ul>




