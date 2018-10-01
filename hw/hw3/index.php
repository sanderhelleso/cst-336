<?php
    session_start();
    include './inc/validate.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <!-- SEO META -->
        <meta name="robots" content="follow, index" />
        <meta name="publisher" content="https://github.com/sanderhelleso" />
        <meta name="description" content="Sign up to the best night of your life today - Futura">
        <meta property="og:site_name" content="Futura - The nr 1 nightclub in the USs">
        <meta name="keyword" content="nightclub, party, us, dance, fun, goodtime">
        <meta name="robots" content="index, follow">
        
        <!-- Google + -->
        <meta itemprop="[Organization]">
        <meta itemprop="name" content="Futura - The nr 1 nightclub in the US">
        <meta itemprop="description" content="Sign up to the best night of your life today - Futura">
        <meta property="og:site_name" content="Futura - The nr 1 nightclub in the US">
        <meta itemprop="image" content="img/cover.jpg">
        
        <!-- Twitter -->
        <meta name="twitter:card" content="summary">
        <meta name="twitter:title" content="Futura - The nr 1 nightclub in the US">
        <meta name="twitter:description" content="Sign up to the best night of your life today - Futura">
        <meta property="og:site_name" content="Futura - The nr 1 nightclub in the US">
        <meta name="twitter:image" content="img/cover.jpg">
        <meta name="twitter:url" content="https://sander-hellesoe-cst-336.herokuapp.com/hw/hw3">
        
        <!-- Facebook -->
        <meta property="og:title" content="Futura - The nr 1 nightclub in the US">
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://sander-hellesoe-cst-336.herokuapp.com/hw/hw3">
        <meta property="og:image" content="img/cover.jpg">
        <meta property="og:description" content="Sign up to the best night of your life today - Futura">
        <meta property="og:site_name" content="Futura - The nr 1 nightclub in the US"> 
        
        <link rel="icon" href="img/favicon.ico" type="image/gif" sizes="16x16">
        <link rel="stylesheet" href="./css/style.css" type="text/css" />
        <link rel="stylesheet" href="./css/animate.css" type="text/css" />
        <script type="text/javascript" src="./js/main.js"></script>
        
        
        <title>Futura - The nr 1 nightclub in the US</title>
    </head>
    <body>
        <main>
            <div class="grid-container">
                <div class="grid-item">
                    <div id="intro">
                        <h4 id="form-heading-intro" class="animated fadeInDown">NIGHTCLUB</h4>
                        <h1 id="form-heading" class="long-shadow animated fadeInUp">Futur<span>a</span></h1>
                        <p id="form-intro" class="animated fadeIn">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent urna velit, tincidunt ut consectetur quis, fermentum vitae purus. Curabitur sit amet dolor eu tortor tempus sodales</p>
                        <a id="form-button" class="long-shadow">Sign Up Today</a>
                        <a href="dashboard.php" id="got-account">Allready a member?</a>
                    </div>
                    <div id="form" class="animated fadeIn">
                        <h1 id="form-heading-stage2" class="animated fadeInUp long-shadow">Can you feel the energy?</h1>
                        <p>Fill out the form and get 50% off your first entry!</p>
                        <form method="POST">
                            
                            <p class="error"><?php echo $firstNameError ?></p>
                            <input type="text" placeholder="First Name" name="first-name" value="<?php echo $_POST['first-name']; ?>"/>

                            <p class="error"><?php echo $lastNameError ?></p>
                            <input type="text" placeholder="Last Name" name="last-name" value="<?php echo $_POST['last-name']; ?>"/>

                            <p class="error"><?php echo $birthDateError ?></p>
                            <input type="date" name="birth-date" value="<?php echo $_POST['birth-date']; ?>">

                            <p class="error"><?php echo $streetError ?></p>
                            <input type="text" placeholder="Street Address" name="street" value="<?php echo $_POST['street']; ?>"/>                            <select name="state">
                                <?php
                                    include './inc/selectStates.php';
                                ?>
                            </select>
                            <button id="sign-up-button" type="submit" name="sign-up"><span class="long-shadow">Sign Up</span></button>
                            <span id="disclaimer">You need to be atleast 21 years or older to sign up</span>
                            <a href="./" id="cancel">CANCEL</a>
                        </form>
                    </div>
                </div>
                <div id="form-landing-image" class="grid-item animated fadeIn">
                </div>
            </div>
            <span id="copyright">&#9400; Sander Hellesø</span>
        </main>
    </body>
</html>