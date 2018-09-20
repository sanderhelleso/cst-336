window.onload = start;

function start() {
    loadGallery();
    document.querySelector('#generate').addEventListener('click', loadGallery);
}

function loadGallery()  {
    
    const grid = document.querySelector('.grid-container');
    if (grid != null || grid != undefined) {
        grid.remove();
    }
    
    document.querySelector('#loader-cont').className = 'animated bounceIn';
    document.querySelector('#loader-cont').style.display = 'block';
    $.get('./inc/functions.php', data => {
          $("#gallery").html(data);
    })
    .done(() => {
        Array.from(document.querySelectorAll('.download-btn')).forEach(btn => {
           btn.addEventListener('click', () => btn.querySelector('a').click()); // allow overlay btn to download
        });
        document.querySelector('#loader-cont').className = 'animated bounceOut';
        setTimeout(() => {
            document.querySelector('#loader-cont').style.display = 'none';
        }, 1000);
    });
}

