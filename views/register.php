<?php include 'header.php'?>

<?php if ( !empty($flash['login']) ){ ?>
	<div class="alert alert-primary" role="alert">
	<?=$flash['login'][0]?>
	</div>
<?php } ?>

<?php if ( !empty($flash['password'][0]) ){ ?>
	<div class="alert alert-primary" role="alert">
	<?=$flash['password'][0]?>
	</div>
<?php } ?>

<?php if ( !empty($flash['password'][1]) ){ ?>
	<div class="alert alert-primary" role="alert">
	<?=$flash['password'][1]?>
	</div>
<?php } ?>
<?php if ( !empty($flash['email'][0]) ){ ?>
	<div class="alert alert-primary" role="alert">
	<?=$flash['email'][0]?>
	</div>
<?php } ?>

<form method="post">
	<div class="form-group">
		<label for="exampleInputEmail1">Username</label>
		<input type="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="login" placeholder="Enter username">
	</div>
	<div class="form-group">
		<label for="exampleInputEmail1">Email address</label>
		<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
	</div>
	<div class="form-group">
		<label for="exampleInputPassword1">Password</label>
		<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
	</div>
	<div class="form-group">
		<label for="exampleInputPassword1">Confirm password</label>
		<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password2">
	</div>
	<button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php include 'footer.php'?>