<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="./css/style.css" type="text/css" />
        <link rel="stylesheet" href="./css/animate.css" type="text/css" />
        <script type="text/javascript" src="./js/main.js"></script>
        <title>Hello World</title>
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
                        <a id="got-account">Allready a member?</a>
                    </div>
                    <div id="form" class="animated fadeIn">
                        <h1 id="form-heading-stage2" class="animated fadeInUp long-shadow">Can you feel the energy?</h1>
                        <p>Fill out the form and get 50% off your first entry!</p>
                        <form>
                            <input type="text" placeholder="First Name" name="first-name"/>
                            <input type="text" placeholder="Last Name" name="last-name"/>
                            <input type="date" name="birth-date">
                            <input type="text" placeholder="Street Address" name="street"/>
                            <select name="state">
                                <?php
                                    include './inc/selectStates.php';
                                ?>
                            </select>
                            <button id="sign-up-button" type="submit" name="sign-up"><span class="long-shadow">Sign Up</span></button>
                            <span id="disclaimer">You need to be atleast 18 years or older to sign up</span>
                        </form>
                    </div>
                </div>
                <div id="form-landing-image" class="grid-item animated fadeIn">
                </div>
            </div>
        </main>
    </body>
</html>