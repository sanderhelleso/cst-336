<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/animate.css" type="text/css" />
        <link rel="stylesheet" href="css/style.css" type="text/css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
    </head>
    <body>
        <header>
            <h1 class="long-shadow animated fadeIn">Wallif<span>y</span></h1>
            <p>Enjoy, discover and download incredible wallpapers</p>
            <a id="generate" class="no-select">Generate Wallpapers</a>
            <h5>Powered by the Unsplash API</h5>
            <div id="border" class="animated fadeIn"></div>
        </header>

        <div id='loader-cont' class="animated bounceIn">
            <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
            <p id='loading-message'>.</p>
        </div>
        <main id='gallery'>
        </main>
        
        <footer>
            <h5>Developed by Sander Hellesø as homework 2<br>for the class CST 336 Internett Programming</h5>
        </footer>
    </body>
</html>