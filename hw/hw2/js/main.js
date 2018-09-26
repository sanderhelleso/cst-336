window.onload = start;

function start() {
    
    // get theme
    document.body.className = localStorage.getItem('mode');

    // set mode and load galley
    darkMode(1);

    // add events
    document.querySelector('#generate').addEventListener('click', loadGallery);
    document.querySelector('#dark-mode').addEventListener('click', darkMode);
}

function loadGallery()  {
    
    // scroll to top of page and disable sroll while geerating
    document.body.scrollTop = document.documentElement.scrollTop = 0;
    document.body.style.overflowY = 'hidden';
    
    // disable generate button
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
    loaderCont.style.display = 'block';
    loaderCont.className = 'animated bounceIn';
    loaderCont.querySelector('p').innerHTML = `Fetching some ${words[Math.floor(Math.random() * words.length)]} wallpapers...`;

    // fetch wallpapers from backend
    $.get('./inc/functions.php', { amount: document.querySelector('#select-amount').value }, data => {
          $("#gallery").html(data);
    })
    // activate download buttons and display images AFTER they are loaded
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
        
        // unblur images
        Array.from(document.querySelectorAll('.grid-item')).forEach(item => {
            setTimeout(() => {
                item.className = 'grid-item unblur';
            }, 1000);
        });
        // activate scrollbar and scroll to generated images
        document.body.style.overflowY = 'auto';
        $("html, body").delay(200).animate({
            scrollTop: $(document.querySelector('#gallery')).offset().top - 25 
        }, 500);
    });
}

function darkMode(start) {
    const mode = localStorage.getItem('mode');
    if (mode === null) {
        localStorage.setItem('mode', 'light');
    }
    
    else if (mode === 'dark') {
        document.querySelector('#dark-mode').innerHTML = 'Light Mode';
    }
    
    if (start === 1) {
        return;
    }
    
    if (mode === 'light') {
        document.body.className = 'dark';
        localStorage.setItem('mode', 'dark');
        this.innerHTML = 'Light Mode';
    }
    
    else {
        document.body.className = '';
        localStorage.setItem('mode', 'light');
        this.innerHTML = 'Dark Mode';
    }
}

