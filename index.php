<DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8"/>
	<title> ELektroniczny dziennik ucznia </title>
	<meta name="description> content="Elektroniczny dziennik ucznia"/>
	<meta name="keywords" content="dziennik, uczeń, ucznia, elektroniczny"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	
	
	<link href ="/font/css/fontello.css" rel="stylesheet" type="text/css" />
	
	<link href="https://fonts.googleapis.com/css?family=Lato&amp;subset=latin-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans&amp;subset=latin-ext" rel="stylesheet">
	<script src="timer.js"></script>
	

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href ="style.css" rel="stylesheet" type="text/css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 480;
		height:305;
	  margin:autol
  }
  </style>

	</head>

<body onload="odliczanie()";>

	<div id="containter">
		<div class="rectangle">
			<div id="logo"> <a href="index.php" class="homepage">Dziennik Ucznia</a></div>
			<div id="zegar">12:00:00</div>
			<div style="clear:both;"></div>
		</div>
		
		<div class="square">
			<div class="tile1">
				<a href="nauczycielzaloguj.php" class="tilelink">
				<i class="icon-eye"> </i><br> 
				Nauczyciel
				</a>
			</div>
			<div class="tile1">
				<a href="rodziczaloguj.php" class="tilelink">
				<i class="icon-home"> </i> <br>
				Rodzic
				</a>
			</div>
			<div style="clear:both;"></div>
			<div class="tile2">
				<a href="uczenzaloguj.php" class="tile2link">
				<i class="icon-drupal"> </i> <br>
				Uczeń
				</a>
			</div>
		</div>
		
		<div class="square">
			<div class="tile3">
				<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

      <div class="item active">
        <img src="a.jpg" alt="Chania" >
        <div class="carousel-caption">
          
        </div>
      </div>

      <div class="item">
        <img src="szkola2.jpg" alt="Chania" width="460" height="345">
        <div class="carousel-caption">
          
        </div>
      </div>
    
      <div class="item">
        <img src="szkola3.jpg" alt="Flower" width="460" height="345">
        <div class="carousel-caption">
          
        </div>
      </div>

      <div class="item">
        <img src="szkola.jpg" alt="Flower" width="460" height="345">
        <div class="carousel-caption">
         
        </div>
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
			</div>
		</div>
		
		<div style="clear:both;"></div>
		
<!--		<div class="rectangle">
		
			<div class="fb">1</div>
			<div class="tw">1</div>
			<div class="yt">1</div>
			<div class="insta">1</div>
		</div>
-->
		<div class="rectangle">2017 &copy; Elektroniczny Dziennik Ucznia
	</div>

</body>

</html>