window.onload = start;

function start() {
    loadGallery();
    document.querySelector('#generate').addEventListener('click', loadGallery);
}

function loadGallery()  {
    
    // disable button
    document.body.scrollTop = document.documentElement.scrollTop = 0;
    document.body.style.overflowY = 'hidden';
    const fetchDataBtn = document.querySelector('#generate');
    fetchDataBtn.removeEventListener('click', loadGallery);
    fetchDataBtn.setAttribute('disabled', true);
    fetchDataBtn.className = 'disabled';
    
    // remove old wallpapers
    const grid = document.querySelector('.grid-container');
    if (grid != null || grid != undefined) {
        let counter = 0;
        Array.from(document.querySelectorAll('.grid-item')).forEach(item => {
            
            if (counter === 3) {
                counter = 0;
            }
            
            if (counter === 0) {
                item.className = 'animated fadeOutRight grid-item';
            }
            
            else if (counter === 1) {
                item.className = 'animated fadeOut grid-item';
            }
            
            else {
                item.className = 'animated fadeOutLeft grid-item';
            }
            
            counter++;
        });
        setTimeout(() => {
            grid.remove();
        }, 750);
    }

    // display loader
    const words = ['awesome', 'amazing', 'sick', 'incredible', 'legendary', 'insane', 'cool', 'funky', 'fresh', 'clean'];
    const loaderCont = document.querySelector('#loader-cont');
    loaderCont.className = 'animated bounceIn';
    loaderCont.querySelector('p').innerHTML = `Fetching some ${words[Math.floor(Math.random() * words.length)]} wallpapers...`;

    // fetch wallpapers
    $.get('./inc/functions.php', data => {
          $("#gallery").html(data);
    })
    .done(() => {
        // add events to buttons
        Array.from(document.querySelectorAll('.download-btn')).forEach(btn => {
           btn.addEventListener('click', () => btn.querySelector('a').click()); // allow overlay btn to download
        });
        
        // fade out loader
        document.querySelector('#loader-cont').className = 'animated bounceOut';
        
        // re activate button
        fetchDataBtn.setAttribute('disabled', false);
        fetchDataBtn.className = '';
        fetchDataBtn.addEventListener('click', loadGallery);
        
        Array.from(document.querySelectorAll('.grid-item')).forEach(item => {
            setTimeout(() => {
                item.className = 'grid-item unblur';
            }, 1000);
        });
        setTimeout(() => {
            document.body.style.overflowY = 'auto';
            $("html, body").delay(200).animate({
                scrollTop: $(document.querySelector('#gallery')).offset().top - 25 
            }, 500);
        })
    });
}

