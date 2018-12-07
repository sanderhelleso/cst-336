<!DOCTYPE html>
<html>
    <head>
        <title> CSUMB: Pet Shelter </title>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>   
        <style>
            body {
                text-align: center;
            }
            
            .carousel {
              position: absolute;
              top: 50%;
              left: 50%;
              transform: translate(-50%);
               min-height: 400px;
              max-height: 400px;
              max-width: 400px;
              min-width: 400px;
              margin: 3rem 0;
            }
            
        </style>
   
    </head>
    <body>
        
	<!--Add main menu here -->
	<header>
	    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="pets.php">Adoptions</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contact Us</a>
              </li>
            </ul>
          </div>
        </nav>
	</header>
        
    <div class="jumbotron">
      <h1> CSUMB Animal Shelter</h1>
      <h2> The "official" animal adoption website of CSUMB </h2>
    </div>
    
    <div class="container mb-5 mt-5">
        <a href="pets.php" class="btn btn-primary btn-lg btn-block">Adopt Now!</a>
    </div>
        
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="7"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="8"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="9"></li>
      </ol>
      
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="img/alex.jpg" alt="slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="img/bear.jpg" alt="slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="img/carl.jpg" alt="slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="img/charlie.jpg" alt="slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="img/lion.jpg" alt="slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="img/otter.jpg" alt="slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="img/sally.jpg" alt="slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="img/samantha.jpg" alt="slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="img/ted.jpg" alt="slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="img/tiger.jpg" alt="slide">
        </div>
      </div>
      
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    
    
    <script type="text/javascript" src="js/functions.js"></script>
</body>
</html>