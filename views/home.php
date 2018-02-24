<?php include 'header.php'?>
<?php while ( $row = mysqli_fetch_assoc( $rows ) ){ ?>
<br>
<div class="card">
  <div class="card-body">
    <h5 class="card-title"><?= $row['title'] ?></h5>
    <p class="card-text"><?= substr( $row['body'], 0, 80 ).' ...'; ?>
	</p>
    <a href="/slim-app/post/<?= $row['id'] ?>">Read more</a>
  </div>
</div>
<?php } ?>
<br>
<div class="pages">
	<ul class="pagination">
		<li class="page-item"><a class="page-link" href="/slim-app/page/1">1</a></li>
		<li class="page-item"><a class="page-link" href="/slim-app/page/2">2</a></li>
		<li class="page-item"><a class="page-link" href="/slim-app/page/3">3</a></li>
	  </ul>
</div>

<?php include 'footer.php'?>