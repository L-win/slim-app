<!doctype html>
<html lang="en">
	<head>
		<title><?=$title?></title>
		<link rel="stylesheet" href="/slim-app/assets/styles.css">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	</head>
<body>
<div class="container">
<div class="row">
<div class="col">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<br>
<nav class="navbar navbar-expand navbar-dark bg-c-nav" style="background-color: #e3f2fd;">
  <a class="navbar-brand" href="/slim-app/">Slim-App</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item"><a class="nav-link" href="/slim-app">Home</a></li>
      <li class="nav-item"><a class="nav-link" href="/slim-app/register" >Register</a></li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="/slim-app/search">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"  name="query">
      <button class="btn btn-outline-white text-dark bg-white " type="submit">Search</button>
    </form>
  </div>
</nav>
<br>
	<h3><?=$title?></h3>