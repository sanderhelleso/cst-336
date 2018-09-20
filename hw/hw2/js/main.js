window.onload = start;

function start() {
    loadGallery();
    document.querySelector('#generate').addEventListener('click', loadGallery);
}

function loadGallery()  {
    
    // disable button
    const fetchDataBtn = document.querySelector('#generate');
    fetchDataBtn.removeEventListener('click', loadGallery);
    fetchDataBtn.setAttribute('disabled', true);
    fetchDataBtn.className = 'disabled';
    
    // remove old wallpapers
    const grid = document.querySelector('.grid-container');
    if (grid != null || grid != undefined) {
        grid.remove();
    }
    
    // display loader
    document.querySelector('#loader-cont').className = 'animated bounceIn';

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
    });
}

