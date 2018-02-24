<?php include 'header.php'?>
<br>
<div class="card">
  <div class="card-body">
    <h5 class="card-title"><?= $row['title'] ?></h5>
    <p class="card-text"><?= $row['body'] ?></p>
  </div>
</div>
<?php include 'related.php'?>
<?php include 'footer.php'?>