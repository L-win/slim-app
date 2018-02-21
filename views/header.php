<html>
	<head>
		<title><?=$title?></title>
	<link rel="stylesheet" href="/slim-app/assets/styles.css">
	</head>
<body>
<h1><?=$title?></h1>
<form method="get" action="/slim-app/search">
	<input type="text" name="query">
	<input type="submit">
</form>