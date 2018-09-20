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
    document.querySelector('#loader-cont').style.display = 'block';
    
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
        setTimeout(() => {
            document.querySelector('#loader-cont').style.display = 'none';
        }, 1000);
        
        // re activate button
        fetchDataBtn.setAttribute('disabled', false);
        fetchDataBtn.className = '';
        fetchDataBtn.addEventListener('click', loadGallery);
    });
}

