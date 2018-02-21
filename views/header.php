<html>
	<head>
		<title><?=$title?></title>
	<link rel="stylesheet" href="/slim-app/assets/styles.css">
	</head>
<body>
<div class="menu">
	<a href="/slim-app/">Home</a>
</div>
<h1><?=$title?></h1>
<form method="get" action="/slim-app/search">
	<input type="text" name="query">
	<input type="submit">
</form>
<div class="container">