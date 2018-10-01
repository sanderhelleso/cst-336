window.onload = start;

function start() {
    
    // check for query
    document.querySelector('#form-button').addEventListener('click', animate);
    let urlParams = new URLSearchParams(window.location.search);
    let signupParam = urlParams.get('signup');
    if (signupParam != null) {
        document.querySelector('#intro').style.display = 'none';
        document.querySelector('#form-button').click();
    }

    //document.querySelector('#form-button').click();
}

function animate() {
    updateURL();
    
    // initial fade out
    document.querySelector('#form-heading-intro').className = 'animated fadeOutUp';
    document.querySelector('#form-heading').className = 'long-shadow animated fadeOutDown';
    document.querySelector('#form-intro').className = 'animated fadeOut';
    
    // post fade out of button
    this.className = 'long-shadow animated bounceOut';
    //this.parentElement.className = 'grid-item animated fadeOutLeft';
    document.querySelector('#got-account').className = 'animated fadeOutDown';
    
    // animate image
    document.querySelector('#form-landing-image').className = 'grid-item animated fadeOut';
    
    setTimeout(() => {
        showForm();
    }, 1000);
}

function showForm() {
    document.querySelector('#intro').style.display = 'none';
    document.body.className = 'animated fadeIn dark';
    document.querySelector('#form').style.display = 'block';
    
    // manipulate cover
    const cover = document.querySelector('#form-landing-image');
    
    // mobile / desktop
    const width = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
    console.log(width);
    if (width > 800) {
        cover.style.background = 'linear-gradient(to right, rgba(226, 62, 87, 1),rgba(51, 25, 64, 0.5)),url("./img/cover2.jpg")';
    }
    
    else {
        cover.style.background = 'linear-gradient(rgba(51, 25, 64, 0.5),rgba(226, 62, 87, 1)),url("./img/cover2.jpg")';
        document.querySelector('#form').style.marginTop = '-50vh';
    }
    
    cover.style.backgroundPosition = 'center';
    cover.style.backgroundRepeat = 'none';
    cover.style.backgroundSize = 'cover';
    cover.className = 'grid-item animated fadeIn';
    setTimeout(() => {
        let timer = 100;
        Array.from(document.querySelector('form').querySelectorAll('input, select, label, button, #disclaimer')).forEach(input => {
            setTimeout(() => {
                input.className = 'animated fadeInUp';
                input.style.display = 'block';
            }, timer);
            timer += 100;
        })
    }, 250);
}

function updateURL() {
    if (history.pushState) {
        const signupUrl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?signup';
        window.history.pushState({
            path:signupUrl
        },
        '',
        signupUrl
        );
    }
}