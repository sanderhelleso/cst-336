<?php
    session_start();
    $userSign = $_SESSION["firstName"][0] . $_SESSION["lastName"][0];
    $userMessage = $_SESSION["firstName"] . " " . $_SESSION["lastName"] . " is a platinum member of club Futura";
    $ticket = "Display the following code for 50% entrance: <span>" . ticketCode() . "</span>";
    
    // redirect back if not autorized
    if (empty($_SESSION)) {
        header('Location: ./?signup');
    }
    
    function ticketCode() { 
        
        $chars = "abcdefghijkmnopqrstuvwxyz023456789"; 
        srand((double)microtime()*1000000); 
        $i = 0; 
        $pass = '' ; 
        while ($i <= 7) { 
            $num = rand() % 33; 
            $tmp = substr($chars, $num, 1); 
            $pass = $pass . $tmp; 
            $i++; 
        } 

        return $pass; 
    }
?>

<!DOCTYPE html>
<html>
    <head><meta charset="utf-8">
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
        <link rel="stylesheet" href="./css/dashboard.css" type="text/css" />
        <link rel="stylesheet" href="./css/animate.css" type="text/css" />
        
        
        <title>Futura - The nr 1 nightclub in the US</title>
        
    </head>
    <body>
        <main>
            <h2 id="avatar" class="animated bounceIn"><?php echo $userSign; ?></h2>
            <h2 id="message"><?php echo $userMessage; ?></h2>
            <h2 id="ticket"><?php echo $ticket; ?></h2>
            <a href="./">Back To Frontpage</a>
        </main>
    </body>
</html>