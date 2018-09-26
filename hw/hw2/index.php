<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <!-- SEO META -->
        <meta name="robots" content="follow, index" />
        <meta name="publisher" content="https://github.com/sanderhelleso" />
        <meta name="description" content="Generate and find your next high quality wallpaper on Wallify">
        <meta property="og:site_name" content="Wallify - Hi Quality Wallpapers">
        <meta name="keyword" content="wallpapers, generator, images, unsplash">
        <meta name="robots" content="index, follow">
        
        <!-- Google + -->
        <meta itemprop="[Organization]">
        <meta itemprop="name" content="Wallify - Hi Quality Wallpapers">
        <meta itemprop="description" content="Generate and find your next high quality wallpaper on Wallify">
        <meta property="og:site_name" content="Wallify - Hi Quality Wallpapers">
        <meta itemprop="image" content="img/cover.jpg">
        
        <!-- Twitter -->
        <meta name="twitter:card" content="summary">
        <meta name="twitter:title" content="Wallify - Hi Quality Wallpapers">
        <meta name="twitter:description" content="Generate and find your next high quality wallpaper on Wallify">
        <meta property="og:site_name" content="Wallify - Hi Quality Wallpapers">
        <meta name="twitter:image" content="img/cover.jpg">
        <meta name="twitter:url" content="https://sander-hellesoe-cst-336.herokuapp.com/hw/hw2">
        
        <!-- Facebook -->
        <meta property="og:title" content="Wallify - Hi Quality Wallpapers">
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://sander-hellesoe-cst-336.herokuapp.com/hw/hw2">
        <meta property="og:image" content="img/cover.jpg">
        <meta property="og:description" content="Generate and find your next high quality wallpaper on Wallify">
        <meta property="og:site_name" content="Wallify - Hi Quality Wallpapers"> 
        
        <link rel="icon" href="img/favicon.ico" type="image/gif" sizes="16x16">
        <link rel="stylesheet" href="css/animate.css" type="text/css" />
        <link rel="stylesheet" href="css/style.css" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
        
        <title>Wallify - Hi Quality Wallpapers</title>
    </head>
    <body class="container">
        <a id="dark-mode" class="no-select">Dark Mode</a>
        <header class="container">
            <h1 class="long-shadow animated fadeInUp">Wallif<span>y</span></h1>
            <p>Enjoy, discover and download incredible wallpapers</p>
            
            <!-- INSERT SELECT AND OPTIONS -->
            <div id="select-container">
                <?php
                    include './inc/select.php';
                ?>
            </div>
            <a id="generate" class="no-select animated fadeIn">Generate Wallpapers</a>
            <h5>Powered by the Unsplash API</h5>
            <div id="border" class="animated fadeIn"></div>
            
            <!-- ANIMATION LOADER DISPLAYED WHEN FETCHING WALLPAPERS -->
            <div id='loader-cont' class="animated bounceIn">
                <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
                <p id='loading-message'>.</p>
            </div>
        </header>
        
        <!-- API DATA INSERTED HERE -->
        <main id="gallery" class="container">
        </main>
        
        <footer class="container">
            <h5><span>👋</span><br>Developed by Sander Hellesø as homework 2<br>for the class CST 336 Internett Programming</h5>
        </footer>
    </body>
</html>