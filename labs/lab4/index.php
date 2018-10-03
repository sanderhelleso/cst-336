<?php

  $randomBackground = "img/sea.jpg";
  
   if ( isset($_GET['keyword'])  ) { 
  
      include 'api/pixabayAPI.php';
      $keyword = $_GET['keyword'];
      $layout = "horizontal";
      if (isset($_GET['layout'])) {
          
            $layout = $_GET['layout'];
      }
      
      if (!empty($_GET['category'])) {
            $keyword = $_GET['category'];
      }
      
      
      $imageURLs = getImageURLs($keyword, $layout);
      $randomIndex = array_rand($imageURLs);
      $randomBackground = $imageURLs[$randomIndex];
      

      echo "You searched for:  <strong> $keyword </strong>";
      shuffle($imageURLs);
  
   }

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 4: Image Slider </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
        <style type="text/css">
            body {
                
                    background-image: url(<?=$randomBackground?>);
                    background-size: cover;
                            
                }
                        
                #carouselExampleIndicators{
                            
                    width: 500px;
                    margin:0 auto;
                            
                }
        </style>
    </head>
    <body>

        <br>

        <form method="get">
            
            <input type="text" name="keyword" size="15" placeholder="Keyword" value="<?=$_GET["keyword"]?>"/>
            <input type="radio" name="layout" value="horizontal" id="hlayout" 
            
            <?php
            
              if ($_GET['layout'] == "horizontal") {
                echo " checked ";
              }
            
            ?>
            
            
            >
              <label for="hlayout"> Horizontal </label>
              
            <input type="radio" name="layout" value="vertical" id="vlayout"
            <?=(($_GET['layout'] == "vertical")?"checked":"" )?> >
              <label for="vlayout">Vertical</label>
              
              
            <select name="category">
                <option value=""> Select One </option>
                <option> Mountains </option>
                <option> Sea </option>
                <option> Sky </option>
                <option> Forest </option>
                <option value="snow"> Winter </option>
            </select>  
            
            <input type="submit" name="submitBtn" value="Go!" />
        </form>


        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <?php
              for ($i=1; $i < 10; $i++) {
                echo "<li data-target='#carouselExampleIndicators' data-slide-to='$i'></li>";
              }
            ?>

          </ol>
          <div class="carousel-inner">
            
            <?php
            for ($i=0; $i < 10; $i++) {
               echo "<div class='carousel-item "; 
               echo ($i == 0)?" active ":""; 
               
               echo "'>";
               echo "<img class=\"d-block w-100\" src=\"".$imageURLs[$i]."\" alt=\"Slide\">";
               echo "</div>";
            }
            ?>
         
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
        <h1>You must type a keyword or select a category</h1>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    </body>
</html>